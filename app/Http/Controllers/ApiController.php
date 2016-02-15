<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Aplikasi;

class ApiController extends Controller {

    public function apiApplications(){
        $aplikasi = Aplikasi::all();
        return $aplikasi;
    }


    public function apiCurrentUser(){
        $user = [];
        $user = \Auth::user();
        $user['roles'] = ['mls'=>'teknisi'];

        return $user;
    }

    public function apiApplicationsAdd(){
        \Eloquent::unguard();
        $aplikasi = new \App\Models\Aplikasi();
        $aplikasi->nama_aplikasi = \Input::get('namaAplikasi');
        $aplikasi->url = \Input::get('urlAplikasi');
        $aplikasi->deskripsi = \Input::get('deskripsi');


        if(\Input::hasFile('image')){
            $image = \Input::file('image');
            $filename = rand(777,999999999).rand(111,44444444);
            $extension = $image->getClientOriginalExtension();
            $image->move('images/ikon_aplikasi/',$filename);
            $uploadedPath = $image->getRealPath();
            $aplikasi->icon_url = 'images/ikon_aplikasi/'.$filename;
        }



        if($aplikasi->save()){
           return 1;
        } else {
           return 0;
        }

    }


    public function apiApplicationsUpdate($application_id){
        \Eloquent::unguard();
        $aplikasi = Aplikasi::findOrFail($application_id);
        $aplikasi->nama_aplikasi = \Input::get('namaAplikasi');
        $aplikasi->url = \Input::get('urlAplikasi');
        $aplikasi->deskripsi = \Input::get('deskripsi');

        // kalo ubah gambar juga
        if(\Input::hasFile('image')){
            $image = \Input::file('image');
            $filename = rand(777,999999999).rand(111,44444444);
            $extension = $image->getClientOriginalExtension();
            $image->move('images/ikon_aplikasi/',$filename);
            $uploadedPath = $image->getRealPath();
            $aplikasi->icon_url = 'images/ikon_aplikasi/'.$filename;
        }




        if($aplikasi->save()){
           return 1;
        } else {
           return 0;
        }

    }

    public function apiApplicationsDelete($id){

        $application = Aplikasi::find($id);

        if(!$application){
            return 0;
        }

        if($application->delete()){
            return 1;
        } else {
            return 0;
        }
    }


    public function apiApplicationsFind($id){
        $application = Aplikasi::findOrFail($id);

        return $application;
    }




}
