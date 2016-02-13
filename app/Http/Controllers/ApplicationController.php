<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Aplikasi;

use Illuminate\Http\Request;

class ApplicationController extends Controller {

    public function apiIndex(){
        $aplikasi = Aplikasi::all();
        return $aplikasi;
    }

	public function getTambahAplikasi(){
	    return view('aplikasi.tambah');
	}

}
