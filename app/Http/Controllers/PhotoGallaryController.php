<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PhotoGallaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = DB::table('tbl_category')
            ->select('*')
            ->where('category_status',1)
            ->get();
        $jumbotron = view('pages.jumbotron');
        $main_content = view('pages.content_body')->with('category',$category);
        return view('master')
            ->with('jumbotron',$jumbotron)
            ->with('content',$main_content);
    }

    public function home(){
        return Redirect::to('/');
    }

    public function gallery($id){
       $info = DB::table('tbl_category')
            ->select('*')
            ->where('id',$id)
            ->first();
        $getPhoto = DB::table('tbl_galary')
            ->where('category_id',$id)
            ->where('photo_status',1)
            ->orderBy('id','desc')
            ->paginate(3);
        $jumbotron = view('pages.category_jumbotron')->with('info',$info);
        $gallary = view('pages.gallery')->with('Photo',$getPhoto);
        return view('master')
            ->with('jumbotron',$jumbotron)
            ->with('content',$gallary);
    }

    public function search(){
        $searchterm = \Request::get('search_query');

            $result = DB::table('tbl_galary')
                ->where('photo_title', 'LIKE', '%'. $searchterm .'%')
                ->orWhere('category_id', 'LIKE', '%'. $searchterm .'%')
                ->orWhere('short_description', 'LIKE', '%'. $searchterm .'%')
                ->orderBy('id')
                ->get();

            if ($result){
                $search_page = view('pages.search')->with('result',$result);
                $search_jumbotron = view('pages.search_jumbotron');
                return view('master')
                    ->with('jumbotron',$search_jumbotron)
                    ->with('content',$search_page);
            }else{
                $search_page = view('pages.search_error');
                $search_jumbotron = view('pages.search_jumbotron');
                return view('master')
                    ->with('jumbotron',$search_jumbotron)
                    ->with('content',$search_page);
            }



    }
}
