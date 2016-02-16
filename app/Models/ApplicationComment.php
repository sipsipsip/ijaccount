<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationComment extends Model {

	protected $table = 'application_comments';

	public function application(){
	    return $this->belongsTo('App\Models\Aplikasi');
	}

}
