<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppTag extends Model {

    protected $table = "apptags";

	// Tag has many Applications
	public function applications(){
	    return $this->belongsToMany('App\Models\Aplikasi', 'application_apptags', 'apptags_id', 'application_id');
	}

}
