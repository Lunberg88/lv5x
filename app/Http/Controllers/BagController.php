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

		$item = [];

		if(($clothes = Charbag::where('char_id', '=', Auth::id())->get()) !== null) {

			foreach($clothes as $cloth) {
				$items = Objects::where('id','=', $cloth->obj_id);
				$item[] = $items;
			}

			dd($item);

			return view( 'battle.bag', [
				'clothes' => $clothes,
				'items' => $item,
			] );

		} else {

			return view('battle.bag')->with('message', 'Your bag is empty.');

		}
	}
}
