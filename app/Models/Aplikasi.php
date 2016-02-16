<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aplikasi extends Model {

	protected $table = 'applications';


	/*
	 ** APPLICATION belongs to many APPTAG
	 */
	 public function tags()
	 {
	    return $this->belongsToMany('App\Models\AppTag', 'application_apptags', 'application_id', 'apptags_id');
	 }


	 /*
	  * APPLICATION has many APLICATIONCOMMENTS
	  *
	  */
	  public function comments(){
	    return $this->hasMany('App\Models\ApplicationComments');
	  }

}
