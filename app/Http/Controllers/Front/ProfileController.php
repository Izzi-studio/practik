<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (User::getUserRoleID() == 1){
            return view('front.student.profile_student')->with(['additional_info'=>User::getAdittionalInfo()]);
        }
        if (User::getUserRoleID() == 2){
            return view('front.employer.profile_employer')->with(['additional_info'=>User::getAdittionalInfo()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $storage = $file->store(env('STORAGE_USERIMAGE_PATH'));
            $name_file = explode('/', $storage);
            $image = env('STORAGE_USERIMAGE_URL').$name_file[2];
            $request->request->add(['avatar'=>$image]);
        }

        User::updateUser($request, Auth::ID());
        return redirect(route('profile_view'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function help()
    {
        return view('front.help');
    }
}
