<?php

namespace App\Http\Controllers;

use App\Music;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class HomeController extends Controller
{
    /*
     * get the homepage
     * @param
     * @return void*/
	public function index()
	{
		return view('pages.index');
	}

	/*
	 * Class constructor
	 * */

	public function __construct()
    {
        //$this->middleware('searh',)
    }
	/**
	 * search the database for music
	 * @param  Request $request
	 * @return \Illuminate\Contracts\View\View;
	 * */
	public function search(Request $request)
	{
	    $query = $request->input('query');
//		$titles = DB::table('musics')->where('title','LIKE','%'.$query.'%');
        $artist = DB::table('musics')->where('artist','LIKE','%'.$query.'%');
        $album = DB::table('musics')->where('album','LIKE','%'.$query.'%');
        $genre = DB::table('musics')->where('genre','LIKE','%'.$query.'%');

        $musics = DB::table('musics')->where('title','LIKE','%'.$query.'%')
                        ->union($artist)
                        ->union($album)->union($genre)->get();
		return view('pages.search')->with('musics',$musics);
	}

	/**
	 * handling music download
	 * @param int $id
     * @param string $title
     * @return \Illuminate\Contracts\Routing\Response;
     */

	public function download($id,$title)
    {
        $to_download = Music::find($id);
        $filename = $to_download->file_name;
        $file = public_path().'/uploads/'.$filename;
        $headers = array(
            'Content-type:audio/mpeg'
        );
        return response()->download($file,$filename,$headers);
        /*response()->stream(function (){

        });*/
    }
}
