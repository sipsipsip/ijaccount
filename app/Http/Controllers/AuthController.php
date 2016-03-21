<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Aplikasi;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AuthController extends Controller {

	public function getLogin(){
	    if(\Auth::check()){
	        return \Redirect::to('/');
	    }
		return view('auth.ldap');
	}

	public function postLogin(){

		$username = \Request::get('username');
		$username_kemenkeu = "kemenkeu\\".$username;
		$password = \Request::get('password');

		$ldapconn = ldap_connect ('kemenkeu.go.id') or die('can not connect');

		if($ldapconn){
			$ldapbind = ldap_bind($ldapconn, $username_kemenkeu, $password) or die(' wrong credential');

			if($ldapbind){
				// search username where muhammad.azamuddin
				// log in the user
				$user = User::where('email', $username)->first();
				\Auth::loginUsingId($user->nip);
				if(\Request::get('ggl')){
				    return \Redirect::to(rtrim(base64_decode(\Request::get('ggl')), '/'));
				}
				return \Redirect::to('/');
			}
		}
	}



	public function checkAuth(){
	    $key = \Request::get('key');
	    $return_url = \Request::get('return_url');
	    $remote_auth = \Request::get('remote_auth');
	    if(\Auth::check()){
	        $user = \App\User::find(\Auth::user()->nip);
            $kemenkeu = $user->email;
            return \Redirect::to($remote_auth.'?identifier='.$kemenkeu.'&login_key='.$key);
        } else {
            $return_url = base64_encode($return_url);
            return \Redirect::to('/login?ggl='.$return_url);
        }
	}


	public function getLogout(){

	    // log every app
        $client = new Client([
            // Base URI is used with relative requests
            // You can set any number of default request options.
        ]);

//        $response = $client->get('http://localhost:3000/kantor/pola-karir/public/remote-logout');
( $client->get('http://apps-itjen.kemenkeu.go.id/staging/talent/public') );
        \Auth::logout();
        return \Redirect::to('/');
	}

}
