<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
      //  parent::$data["myWaredCount"]=Post::myWaredCount();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    function download(Request $request){
        if(Storage::exists($request->id)){
            $ext = pathinfo(storage_path().$request->id, PATHINFO_EXTENSION);
//            header("Content-Disposition:attachment;filename='downloaded.".$ext."'");
            return Storage::download($request->id);
        }
        echo "file not exists";
    }
    
}
