<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\User;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function index()
    {
    	$groups = Group::get();

    	return view('group.index', ['groups' => $groups]);
    }

    public function create()
    {
		return view('group.create');
    }

    public function store(Request $request)
    {
	    $newgroup = new Group();
	    $newgroup->owner_id = Auth::id();
	    $newgroup->title = $request->title;
	    $newgroup->about = $request->about;
	    $newgroup->save();

	    return redirect('group.view')->with('message', 'Your group successfully created!');

    }

    public function group($id)
    {
		$showgroup = Group::find($id);

		return view('group.view', ['showgroup' => $showgroup]);
    }

    public function delete($id)
    {
		$deleteGroup = Group::find($id);
		$deleteGroup->delete();

		return redirect('group')->with('message', 'You successfully deleted your group');

    }

    public function update(Request $request)
    {

    }

    public function changeowner($id)
    {

    }

    public function invite($id)
    {

    }

    public function kill($id)
    {

    }
}
