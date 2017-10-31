<?php

namespace App\Http\Controllers;

use App\Objects;
use Auth;
use App\Charbag;
use App\User;
use Illuminate\Http\Request;

class BagController extends Controller
{
	public function index()
	{
		if(($items = Charbag::where('char_id', '=', Auth::id())->get()) !== null) {

			return view('battle.bag', [
				'items' => $items,
			]);

		} else {

			return redirect('battle.bag')->with('message', 'Your bag is empty.');

		}
	}
}
