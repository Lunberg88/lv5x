<?php

namespace App\Http\Controllers;

use Socialite;
use Illuminate\Routing\Controller;

class FbController extends Controller
{
  /**
   * Переадресация пользователя на страницу аутентификации GitHub.
   *
   * @return Response
   */
  public function redirectToProvider()
  {
    return Socialite::driver('facebook')->redirect();
  }

  /**
   * Получение информации о пользователе от GitHub.
   *
   * @return Response
   */
  public function handleProviderCallback()
  {
    $user = Socialite::driver('facebook')->user();

   // echo $user->getName()."<br />";
   // echo "<img width=\"45\" src=\"".$user->getAvatar()."\"><br />";
    // $user->token;
    return redirect('/home');
  }
}
