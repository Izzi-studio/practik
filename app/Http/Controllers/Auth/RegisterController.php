<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\Front\Countries;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $countries = Countries::getCountries();
        return view('auth.register')->with(['countries'=>$countries]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorRegisterEmployer(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed']
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorRegisterStudent(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed']
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorEmail(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function createStudent(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'type_account' => $data['type_account'],
            'additional_info' => json_encode($data['additional_info'],JSON_UNESCAPED_UNICODE),
            'email' => $data['email'],
            'avatar' => $data['avatar'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function createEmployer(array $data)
    {
        return User::create([
            'type_account' => $data['type_account'],
            'additional_info' => json_encode($data['additional_info'],JSON_UNESCAPED_UNICODE),
            'email' => $data['email'],
            'avatar' => $data['avatar'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {

        if($request->type == 'employer'){

            $validator = $this->validatorRegisterEmployer($request->all());
            if ($validator->fails()) {
                $validator->after(function ($validator) {
                    $validator->errors()->add('form_type', 'employer');
                });
            }
            $validator->validate();
            $request->request->add(['type_account'=>2]);
        }

        if($request->type == 'student'){

            $validator = $this->validatorRegisterStudent($request->all());
            if ($validator->fails()) {
                $validator->after(function ($validator) {
                    $validator->errors()->add('form_type', 'student');
                });
            }
            $validator->validate();
            $request->request->add(['type_account'=>1]);
        }

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $storage = $file->store(env('STORAGE_USERIMAGE_PATH'));
            $name_file = explode('/', $storage);
            $image = env('STORAGE_USERIMAGE_URL').$name_file[2];
        }else{
            $image = '';
        }
        $request->request->add(['avatar'=>$image]);

        if($request->type == 'employer') {
            event(new Registered($user = $this->createEmployer($request->all())));
        }

        if($request->type == 'student') {
            event(new Registered($user = $this->createStudent($request->all())));
        }


        $this->guard()->login($user);

        return redirect($this->redirectPath());
    }

    public function existsEmail(Request $request){
        $validator = $this->validatorEmail($request->all());

        if ($validator->fails()) {
            return response('false',200);
        }

        return response('true',200);

    }
}
