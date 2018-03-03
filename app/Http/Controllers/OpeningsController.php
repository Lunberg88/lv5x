<?php

namespace App\Http\Controllers;

use Auth;
use Gate;
use Event;
use Log;
use Intervention\Image\Facades\Image;
use App\UserFavs;
use App\Events\onAddCandidateEvent;
use App\Listeners\AddCandidateListener;
use App\Openings;
use Illuminate\Http\Request;

class OpeningsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
		$openings = Openings::orderByDesc('id')->paginate(16);

		return view('admin.openings', [
			'openings' => $openings,
		]);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $openings = new Openings();

	    return view('admin.openings.create', [
		    'openings' => $openings,
	    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $openings = new Openings();
	    if($request->user()->can('createO', $openings)){
		    $openings->title = $request->title;
		    $openings->location = $request->location;
		    $openings->salary = $request->salary;
		    $openings->description = $request->description;
		    $openings->status = $request->status;
		    $openings->user_id = Auth::id();
		    if($request->file('imgFile')) {
		    	$image = $request->file('imgFile');
		    	$filename = time().'.'.$image->getClientOriginalExtension();
		    	$path = public_path('images/openings/'.$filename);
		    	$imgPoster = Image::make($image->getRealPath())->resize(320, 180)->save($path);
		    	$openings->img = $filename;
		    }
		    $openings->save();

		    /** To do... **/
		    /*
		    if($request->file()) {

		        $image = $request->file('imgFile');
			    //$image = Input::file('image');
			    $filename  = time() . '.' . $image->getClientOriginalExtension();

			    $path = public_path('images/openings/' . $filename);


			    Image::make($image->getRealPath())->resize(200, 200)->save($path);
			    //$user->image = $filename;
			    //$user->save();
		    }
		    */

		    //Event::fire(new onAddCandidateEvent(Auth::user(), $candidate));
		    Event::fire('onAddCandidate', [Auth::user(), $openings]);

		    return redirect('admin/openings')->with(['message' => 'New candidate successfully added!', 'alert-type' => 'success']);
	    } else {
		    return redirect('admin/openings')->with(['error' => 'Access dined for you!', 'alert-type' => 'danger']);
	    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	    if($openings = Openings::find($id)) {

		    return view('admin.openings.show', ['openings' => $openings,]);

	    } else {
		    return redirect('admin/openings')->with(['message' => 'Opening with this ID: '.$id.' not found.', 'alert-type' => 'danger']);
	    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    if($openings = Openings::find($id)) {

		    return view('admin.openings.edit', [
			    'openings' => $openings,
		    ]);
	    } else {
		    return redirect('admin/openings')->with(['message' => 'Opening with this ID: '.$id.' not exists!', 'alert-type' => 'danger']);
	    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
	    if($openings = Openings::find($id)) {

		    if ($request->user()->can('updateO', $openings)) {

			    $data = $request->except('_token');

			    $openings->title = $data['title'];
			    $openings->location = $data['location'];
			    $openings->salary = $data['salary'];
			    $openings->description = $data['description'];
			    $openings->status = $data['status'];
			    $openings->user_id = Auth::id();
			    if($request->file('editImgFile') && $request->file('editImgFile') != '') {
				    $image = $request->file('editImgFile');
				    $filename = time().'-'.$openings->id.'.'.$image->getClientOriginalExtension();
				    $path = public_path('images/openings/'.$filename);
				    $imgPoster = Image::make($image->getRealPath())->resize(320, 180)->save($path);
				    $openings->img = $filename;
			    }

			    $openings->save();

			    return redirect('admin/openings')->with(['message' => 'Opening successfully updated!', 'alert-type' => 'info']);
		    }

		    return redirect('admin/openings')->with(['message' => 'Access denied, you don\'t have such permission!', 'alert-type' => 'danger']);
	    } else {
		    return redirect('admin/openings')->with(['message' => 'Opening with this ID: '.$id.' not exists!', 'alert-type' => 'danger']);
	    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    if($openings = Openings::find($id)) {
		    $openings->delete();

		    return redirect('admin/openings')->with(['message' => 'The Opening was deleted from DataBase.', 'alert-type' => 'success']);
	    } else {
		    return redirect('admin/openings')->with(['message' => 'This ID: '.$id.' not exists!', 'alert-type' => 'danger']);
	    }
    }

	/**
	 * @param $stext
	 * @return \Illuminate\Http\Response
	 */
    public function search(Request $request, $stext = null)
    {
	    $stext = $request->only('search');

	    if($stext == null) {
		    return view('admin.search-empty');
	    } else {
		    foreach($stext as $key => $value) {

			    $openings = Openings::where('title', 'LIKE', '%'.$value.'%')->orWhere('location', 'LIKE', '%'.$value.'%')->orWhere('salary', 'LIKE', '%'.$value.'%')->orWhere('status', 'LIKE', '%'.$value.'%')->get();

		    }

		    return view('admin.openings.search_result', [
			    'openings' => $openings,
		    ]);
	    }
    }

	/**
	 * @param Request $request
	 *
	 * @return array|\Illuminate\Http\JsonResponse
	 */
	public function addfav(Request $request)
	{
		if($request->id == null || empty($request->id)) {
			return ['error' => 'id does not set!'];
		}

		if(Auth::user() !== false) {
		   $ifexist = UserFavs::where([
		   	['user_id', '=', Auth::id()],
		    ['opening_id', '=', $request->id],
		   ])->get();
		   if($ifexist->isEmpty()) {
			   $fav = new UserFavs();
			   $fav->user_id = Auth::id();
			   $fav->opening_id = $request->id;
			   $fav->save();

			   return response()->json(['message' => 'Successfully added!']);
		   } else {
			   foreach($ifexist as $item) {

				   if($item->opening_id != $request->id) {

					   $fav = new UserFavs();
					   $fav->user_id = Auth::id();
					   $fav->opening_id = $request->id;
					   $fav->save();

					   return response()->json(['message' => 'Successfully added!']);
				   } else {
				   	   $deleted_fav = UserFavs::where('opening_id','=',$request->id)->first()->delete();
					   return response()->json(['message' => 'Fav removed!']);
				   }
			   }
		   }
		}
	}

	public function removeFav(Request $request)
	{
		$delete = UserFavs::where('user_id', '=', Auth::user()->id)
		                  ->andWhere('opening_id', '=', $request->id)
		                  ->get();
		if($delete->isEmpty()) {
			return response()->json(['status' => 'error', 'message' => 'opening with this id not found'], 200);
		} else {
			foreach($delete as $item) {
				UserFavs::delete($item->opening_id);
				return response()->json(['status' => 'success', 'message' => 'opening was successfully removed']);
			}
		}

	}
}
