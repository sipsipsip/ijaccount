<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	protected $connection = 'siasni';
	protected $primaryKey = 'nip';
	protected $table = 'users';
    // protected $connection = 'local_accounts';
    // protected $table = 'users';

	public $timestamps = false;



	public function datadiri(){
	    return $this->hasOne('App\Models\Pegawai', 'nip', 'nip');
	}

	public function roles(){
	    return $this->belongsToMany('App\Models\Role','role_user', 'nip','role_id');
	}





	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


	 /**
      * Overrides the method to ignore the remember token.
      */
     public function setAttribute($key, $value)
     {
       $isRememberTokenAttribute = $key == $this->getRememberTokenName();
       if (!$isRememberTokenAttribute)
       {
         parent::setAttribute($key, $value);
       }
     }

}
