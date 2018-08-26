<?php

namespace App\Http\Controllers;

use App\Traits\CandidatesHelper;
use Illuminate\Support\Facades\Mail;
use Log;
use App\CoreSettings;
use App\History;
use App\Openings;
use Gate;
use App\Traits\Hollidays;
use Auth;
use Event;
use App\User;
use App\Candidate;
use App\Profile;
use App\Messages;
use App\Events\onAddCandidateEvent;
use App\Listeners\AddCandidateListener;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    use CandidatesHelper;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $days = Hollidays::checkdate(date('d.m'));
        $c = Candidate::paginate(20);

        $tg = [
            'HTML',
            'JS',
            'PHP',
            'MySQL',
            'JAVA',
            'AngularJS',
            'Angular (2.x/4.x)',
            'ReactJS',
            'VueJS',
            'iOS',
            'Android',
            'PS'
        ];

        $user = User::find(Auth::id());
        $newCandidates = Candidate::where('viewed', '=', '0')->get();
        $newMessages = Messages::where('viewed', '=', '0')->get();
        $nc = CandidatesHelper::showNewNotif('candidates');

        return view('admin.dash', [
            'c' => $c,
            'tg' => $tg,
	        'days' => $days,
	        'user' => $user,
	        'newCandidates' => $newCandidates,
            'newMessages' => $newMessages,
            'nc' => $nc
        ]);
    }

    /**
     * @param Request $request
     */
    public function gloablSearch(Request $request)
    {
    	$text = $request->only('keywords');

    	$stext = explode(' ', $text);

    	foreach($stext as $value) {
    		$result = Candidate::leftJoin('openings','')->get();
	    }

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function history()
    {
    	$history = History::orderBy('id', 'DESC')->paginate(20);

    	return view('admin.history.history', compact('history'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function msg()
    {
    	$messages = Messages::paginate(20);

    	return view('admin.messages', compact('messages'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function msgRead(Request $request)
    {
        if($request->id !== null && $request->id != '') {
            if($findThisMsg = Messages::findOrFail($request->id)) {
                $findThisMsg->viewed = 1;
                $findThisMsg->save();

                return response()->json(['message' => 'The message are read.'], 200);
            }
            return response()->json(['error' => 'Message not found'], 404);
        }
        return response()->json(['error' => 'id doesn\'t matched'],201);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function replyToCandidate(Request $request)
    {
        Log::info('request: ', [$request->all()]);
        if($request->sender != '' && $request->body != '') {
            $mm = $request->all();
            if(Mail::send('admin.replyMsg', $mm, function($msg) use ($mm) {
                $msg->to($mm['sender'])->subject('Testing msg!');
            })) {
                Log::info('Info', ['result' => 'success', 'info' => [$request->sender, $request->body]]);
                return redirect('admin/msg')->with(['message' => 'Your reply, successfully send!']);
            }

            return redirect('admin/msg')->with(['error' => 'Error occurred while sending the message.']);
        }

        return redirect('admin/msg')->with(['error' => 'Field Email or Message are required!']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function settings()
    {
    	$settings_all = CoreSettings::get();

    	function title($str) {
    	    $str = explode('_', $str);
    	    $newStr = implode(' ', $str);
    	    return $newStr;
        }

    	$settings = [];
    	if(!$settings_all->isEmpty()) {
    	    foreach($settings_all as $items) {
    	        if(!in_array($items, $settings)) {
    	            $items['key'] = title($items['key']);
    	            array_push($settings, $items);
                }
            }
        }

    	return view('admin.settings', ['settings' => $settings]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function settingsUpdate(Request $request)
    {
        $newrequest = $request->except('_method', '_token');

    	foreach($newrequest as $key => $value) {
    	    CoreSettings::where('key', $key)->update(['value' => $value]);
        }

	    return redirect('/admin/settings')->with(['message' => 'Settings updated!', 'alert-type' => 'info']);
    }
}
