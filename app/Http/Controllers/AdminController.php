<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Music;
use App\User;
use DB;
use Hash;
use Illuminate\Support\Facades\URL;
use Validator;
use Illuminate\Support\Facades\App;

class AdminController extends Controller
{
    /*
     * Get the login page
     * @param
     * @return
     * */
    public function getLogin()
    {
    	return view('admin.login');
    }

    /*
     * handle the user login request
     * @param Illuminate\Http\Request $request
     * @return mixed
     * */
    public function postLogin(Request $request)
    {
        /*
         *  Gather the login
         *  credentials
         * */
    	$username = $request->input('username');
    	$password = $request->input('password');

        /*Attempting to log user in*/
    	$attempt = Auth::attempt(['username' => $username, 'password' => $password]);
    	if ($attempt) {
    		/*Check the login credentials
    		 */
    		return redirect()->route('admin_dashboard')
                        ->with(array(
                            'musics'=>count(Music::all()),
                            'mods'=>count(User::all())
                        ));
    	}

        /* return back to login page */
    	return redirect()
    	       ->route('admin_login')
    	           ->with(['error'=>'Invalid Username/Password',
                       'truelogin'=>$attempt]);
    }

    /*
     * Display the admin dashboard
     * @param
     * @return mixed
     * */
    public function getDashboard()
    {
        if (!Auth::check())
        {
            return redirect()->route('admin_login');
        }

        return view('admin.index')
                        ->with(array(
                            'musics'=>count(Music::all()),
                            'mods'=>count(User::all())
                        ));
    }

    /**
     * Helper for checking if a user is logged in
     * @param
     * @return
     * */
    public function checkLogin()
    {
        if (!Auth::check())
        {
            return redirect()->route('admin_login');
        }
    }

    /**
     * Logout the user
     * @param null
     * @return void
     * */
    public function logout()
	{
		Auth::logout();		/*Destroy the user session*/
		return redirect()->route('admin_login');
	}

	/**
	 * Display all musics in DB to User
	 * @param null
	 * @return null
	 * */
	public function viewMusic()
    {
        $musics = Music::paginate(2);
        return view('admin.viewmusic')
                ->with(array(
                   'musics'=>$musics,
                    'title'=>'All Musics'
                ));
    }

    /**
     * Get the page for adding new moderator
     * @param null
     * @return mixed
     * */
    public function getAddMod()
    {
        return view('admin.addmod');
    }

    /**
     * post request for adding new moderator
     * @param \Illuminate\Http\Request $request
     * @return mixed
     **/
    public function addmod(Request $request)
    {
        /*Validate income user data*/
        $validator = Validator::make($request->all(),array(
           'username'=>'required | min:4 | unique:users',
            'pass'=>'required | min:4',
            'repass'=>'required | same:pass'
        ));

        /*Check if the validation fails*/
        if ($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('getAddMod')->withErrors($validator);
        }

        /*gather the validated data*/
        $username = $request->input('username');
        $password = $request->input('pass');

        $user = new User();
        $user->username = $username;
        $user->password = Hash::make($password);
        $user->save();

        return redirect()->route('getAddMod')
            ->with('success','Moderator successfully added');
    }

    /**
     * post request to add new music
     * @param \Illuminate\Http\Request  $request
     * @param string | $id
     * @return mixed
     */

    public function addmusic(Request $request)
    {
        $validator = Validator::make($request->all(),array(
           'title'=>'required',
            'artist'=>'required',
            'album'=>'required',
            'genre'=>'required',
            'file'=>'required'
        ));

        /*check if the validation fails*/
        if ($validator->fails())
        {
            return redirect('admin/dashboard/addmusic')
                ->with('upload_err','An error occur while uploading music. Try again');
            /*return response()->json(array(
                'err_msg'=>'An error occur while adding. Please check your form.'
            ));*/
        }
        $title = $request->input('title');
        $artist = $request->input('artist');
        $album = $request->input('album');
        $genre = $request->input('genre');

        $file = $request->file('file');
        $file->move('uploads',$file->getClientOriginalName());

        $music = new Music();
        $music->title = $title;
        $music->album = $album;
        $music->artist = $artist;
        $music->genre = $genre;
        $music->file_name = $file->getClientOriginalName();

        $music->save();
         return redirect('admin/dashboard/addmusic')
                ->with('upload_success','Music uploaded successfully');
         /*return response()->json(array('success'=>'Music added successfully'));*/

    }
}

