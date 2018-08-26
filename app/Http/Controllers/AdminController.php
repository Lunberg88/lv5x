<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminProfileRequest;
use Illuminate\Support\Facades\Mail;
use Gate;
use Auth;
use Illuminate\Http\Request;

class AdminController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dash', [
            'c' => $this->candidate->getCandidateByQnt(20),
	        'user' => $this->user->getCurrentUserId(Auth::id()),
            'adminService' => $this->adminService
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function markAsReadNotification(Request $request)
    {
        $notif = $this->user->getAllNotifications(Auth::id());
            foreach($notif as $not) {
                if($not->id == $request->uid) {
                    $not->markAsRead();
                    return response()->json(['status' => 'success', 'message' => 'Notification marked as read!', 'alert-type' => 'info'], 200);
                }
                return response()->json(['status' => 'error', 'message' => 'Error while reading notification :/'], 403);
            }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function history()
    {
    	return view('admin.history.history', ['history' => $this->history->getLatestByLimit(20)]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function msg()
    {
    	return view('admin.messages', ['messages' => $this->message->getLatestByLimit(20)]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function msgRead(Request $request)
    {
        if($request->id !== null && $request->id != '') {
            if(($this->message->find((int)$request->id))->update(['viewed' => 1])) {
                return response()->json(['message' => 'The message has been readed.'], 200);
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
        if($request->sender != '' && $request->body != '') {
            $mm = $request->all();
            if(Mail::send('admin.replyMsg', $mm, function($msg) use ($mm) {
                $msg->to($mm['sender'])->subject('Testing msg!');
            })) {
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
    	return view('admin.settings', ['settings' => $this->coreSettings->getAllSettings()]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function settingsUpdate(Request $request)
    {
        if($this->coreSettings->updateSetting($request)) {
            return redirect('/admin/settings')->with(['message' => 'Settings updated!', 'alert-type' => 'info']);
        }
	    return back()->with(['message' => 'Error filling the fields!', 'alert-type' => 'danger']);
    }

    /**
     * Show Admin Profile
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAdminProfile()
    {
        return view('admin.profile.profile', ['user' => $this->user->find((int)Auth::id())]);
    }

    /**
     * @param AdminProfileRequest $adminProfileRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function adminProfileUpdate(AdminProfileRequest $adminProfileRequest)
    {
        if($this->user->updateAdminProfile($adminProfileRequest, Auth::id())) {
            return back()->with(['message' => 'You info updated', 'alert-type' => 'info']);
        }
        return back()->with(['message' => 'Missed required fields!']);
    }
}
