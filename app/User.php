<?php

namespace App;

use Throwable;
use App\Http\Models\Front\Vacancy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use App\Http\Models\Front\CandidateToVacancy;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'additional_info','avatar','email', 'password','type_account',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getAdittionalInfoJSON(){
       return Auth::user()->additional_info;
    }

    public static function getAdittionalInfo($key = false){
        $additional_info = json_decode(Auth::user()->additional_info);
        if (!$key){
            return (array)$additional_info;
        }
        try {
            return $additional_info->$key;
        }catch (Throwable $e){
            return 'No data for this key';
        }
    }

    public static function getUserRoleID(){
        return Auth::user()->type_account;
    }

    public static function updateUser($request, $user_id){
        $data = $request->except('_token','_method','photo','email');
        $data['additional_info'] =  json_encode($data['additional_info'],JSON_UNESCAPED_UNICODE);

        User::find($user_id)->update($data);
    }

	 public static function getStudents($order_by = 'users.created_at', $ordering = 'ASC'){

		 $users = User::where('type_account',1)->orderBy($order_by, $ordering)->paginate(10);
		 return $users;
	 }

	 public function vacancies(){
         return $this->hasMany(Vacancy::class);
     }

     public function candidates(){
        return $this->hasMany(CandidateToVacancy::class);
    }
}
