<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CRUDController extends Controller {

	/** to get data just use the /api/vx/data **/
	/*** from ApiController@getData ***/

	/** add new Model **/
	public function getAdd(){
	    \Eloquent::unguard();
	    $input = \Input::except(['model', 'btm']);

        // Get the query params
        $modelClass = \Input::get('model');
        $modelClass = ucfirst($modelClass);
        $modelClass = 'App\\Models\\'.$modelClass;



        $result = [];

        if($objectModel = $modelClass::create($input)){

            // if this has belongs to many relationship
            if(\Input::get('btm')){

                // btm is belongsToMany, the value is model of belong and its ids
                $btm = \Input::get('btm');
                foreach($btm as $owner => $ids){
                    $objectModel->tags()->attach($ids);
                }
            }

            $result['message'] = 'Berhasil membuat '.\Input::get('model');
            $result['error'] = FALSE;
            $result['success'] = TRUE;
            return $result;
        } else {
            $result['message'] = 'Terjadi kesalahan! '.\Input::get('model');
            $result['error'] = TRUE;
            $result['success'] = FALSE;
            return $result;
        }
	}

}
