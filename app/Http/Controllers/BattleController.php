<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Slots;
use App\User;
use App\Chars;

class BattleController extends Controller
{
    public function index()
    {
		$chars = Chars::where('user_id', '=', Auth::id())->get();

		return view('battle.index', [
			'chars' => $chars
		]);
    }
}
