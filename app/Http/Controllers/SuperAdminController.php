<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();
class SuperAdminController extends Controller
{

    public function __construct()
    {
        $id = Session::get('id');
        if ($id == NULL) {
            return Redirect::to('/login')->send();
        }
    }

    public function index()
    {
        $dashboard = view('admin.pages.dashboard');
        return view('admin.master')
            ->with('content', $dashboard);
    }

    public function logout()
    {
        Session::put('id', '');
        Session::put('admin_name', '');
        Session::put('message', 'Your are Logged out');
        return Redirect::to('/login');
    }

    public function add_category(){
        $add_category = view('admin.pages.add_category');
        return view('admin.master')
                ->with('content',$add_category);
    }

    public function save_category(Request $request)
    {
//        $data = array();
//        $data['category_name']= $request->category_name;
//        $data['category_status']= $request->category_status;
//
//        DB::table('tbl_category')
//            ->insert($data);
//
//        Session::put('message','Category Add Successfully');
//        return Redirect::to('/add_category');

        $data = array();
        $image = $request->file('photo');

        if ($image) {
            $image_name = str_random(20);
            $image_ext = strtolower($image->getClientOriginalExtension());
            $image_join_name = $image_name . '.' . $image_ext;

            $image_upload_path = 'galary_image/';
            if ($image_ext == 'jpg' || $image_ext == 'png' || $image_ext == 'gif' || $image_ext == 'jpeg') {
                $image_url = $image_upload_path . $image_join_name;
                $success = $image->move($image_upload_path, $image_join_name);
                if ($success) {
                    $data['category_name'] = $request->category_name;
                    $data['category_status'] = $request->category_status;
                    $data['photo'] = $image_url;


                    DB::table('tbl_category')
                        ->insert($data);

                    Session::put('message', 'Category Add Successfully');
                    return Redirect::to('/add_category');
                } else {
                    Session::put('message', 'Image Upload not successfull');
                    return Redirect::to('/add_category');
                }
            } else {
                Session::put('message', 'Image file Not Support..Only jpg,jpeg,png,gif format allowed');
                return Redirect::to('/add_category');
            }
        }
    }
    public function manage_category(){

        $all_category = DB::table('tbl_category')
            ->select('*')
            ->orderBy('id','desc')
            ->get();

        $manage_category = view('admin.pages.manage_category')
                         ->with('all_category',$all_category);;
        return view('admin.master')->with('content',$manage_category);
    }

    public function unpublishedToPublished($id){
        DB::table('tbl_category')
            ->where('id',$id)
            ->update(['category_status' => 1]);
        Session::put('published','Category Published Successfully');
        return Redirect::to('/manage_category');
    }

    public function publishedToUnpublished($id){
        DB::table('tbl_category')
            ->where('id',$id)
            ->update(['category_status' => 0]);
        Session::put('unpublished','Category Unpublished Successfully');
        return Redirect::to('/manage_category');
    }

    public function delete_category($id){
        DB::table('tbl_category')
            ->where('id',$id)
            ->delete();
        Session::put('delete','Category Delete Successfully');
        return Redirect::to('/manage_category');
    }

    public function edit_category($id){
       $edit_category = DB::table('tbl_category')
            ->where('id',$id)
            ->first();
        $category = view('admin.pages.edit_category')->with('edit_category',$edit_category);
        return view('admin.master')->with('content',$category);

    }
    public function update_category(Request $request){

//        $data = array();
//        $id = $request->id;
//        $data['category_name']          = $request->category_name;
//        $data['category_description']    = $request->category_description;
//        $data['category_status']        = $request->category_status;
//
//        DB::table('tbl_category')
//            ->where('id',$id)
//            ->update($data);
//        return Redirect::to('/manage_category');
        $id = $request->id;
        $data = array();
        $image=$request->file('photo');
        if ($image) {
            $image_name             = str_random(20);
            $image_ext              = strtolower($image->getClientOriginalExtension());
            $image_join_name        = $image_name.'.'.$image_ext;
            $image_upload_path      ='galary_image/';
            $url                    =$image_upload_path.$image_join_name;
            $success                =$image->move($image_upload_path,$image_join_name);
            if ($success) {
                $data['category_name'] = $request->category_name;
                $data['category_status'] = $request->category_status;
                $data['photo'] = $url;


                DB::table('tbl_category')
                    ->where('id',$id)
                    ->update($data);
                Session::put('message','Category Update Successfully');
                return Redirect::to('/manage_category');


            }else{
                Session::put('message','Something Went Wrong');
                return Redirect::to('/manage_category');
            }
        }

    }

    public function add_photo(){
        $get_category = DB::table('tbl_category')
            ->where('category_status',1)
            ->get();
        $add_photo = view('admin.pages.add_photo')->with('get_category',$get_category);
        return view('admin.master')
            ->with('content',$add_photo);
    }

    public function save_photo(Request $request)
    {

        $data = array();
        $image = $request->file('photo');

        if ($image) {
            $image_name = str_random(20);
            $image_ext = strtolower($image->getClientOriginalExtension());
            $imate_join_name = $image_name . '.' . $image_ext;

            $image_upload_path = 'galary_image/';
            if ($image_ext == 'jpg' || $image_ext == 'png' || $image_ext == 'gif' || $image_ext == 'jpeg') {
                $image_url = $image_upload_path . $imate_join_name;
                $success = $image->move($image_upload_path, $imate_join_name);
                if ($success) {
                    $data['category_id'] = $request->category_id;

                    $data['photo_title'] = $request->photo_title;

                    $data['short_description'] = $request->short_description;

                    $data['photo'] = $image_url;
                    $data['photo_status'] = $request->photo_status;

                    DB::table('tbl_galary')
                        ->insert($data);

                    Session::put('insert_photo', 'Photo Published Successfully');
                    return Redirect::to('/add_photo');
                } else {
                    Session::put('insert_photo', 'Image Upload not successfull');
                    return Redirect::to('/add_photo');
                }
            } else {
                Session::put('insert_message', 'Image file Not Support..Only jpg,jpeg,png,gif format allowed');
                return Redirect::to('/add_photo');
            }

        }

    }


    public function manage_photo(){
        $get_manage_photo = DB::table('tbl_galary')
            ->join('tbl_category','tbl_galary.category_id', '=','tbl_category.id')
            ->select('tbl_galary.*','tbl_category.category_name')
            ->orderBy('id','desc')
            ->get();
        $manage_photo = view('admin.pages.manage_photo')->with('get_manage_photo',$get_manage_photo);
        return view('admin.master')
            ->with('content',$manage_photo);
    }

    public function delete_photo($id){
        $path =  DB::table('tbl_galary')
            ->where('id',$id)
            ->first();
        $path_image = $path->photo;
        unlink($path_image);
        DB::table('tbl_galary')
            ->where('id',$id)
            ->delete();
        Session::put('delete_photo','Delete Photo Successfully');
        return Redirect::to('/manage_photo');

    }

    public function edit_photo($id){

        $getPhotoInfo = DB::table('tbl_galary')
            ->join('tbl_category','tbl_galary.category_id', '=','tbl_category.id')
            ->select('tbl_galary.*','tbl_category.category_name')
            ->where('tbl_galary.id',$id)
            ->first();
        $edit_photo_page = view('admin.pages.edit_photo')->with('getPhotoInfo',$getPhotoInfo);
        return view('admin.master')
            ->with('content',$edit_photo_page);
    }

    public function save_edit_photo(Request $request){
        $id = $request->id;
        $data = array();
        $image=$request->file('photo');
        if ($image) {
            $image_name             = str_random(20);
            $image_ext              = strtolower($image->getClientOriginalExtension());
            $image_join_name        = $image_name.'.'.$image_ext;
            $image_upload_path      ='galary_image/';
            $url                    =$image_upload_path.$image_join_name;
            $success                =$image->move($image_upload_path,$image_join_name);
            if ($success) {
                $data['category_id'] = $request->category_name;
                $data['photo_title'] = $request->photo_title;
                $data['short_description'] = $request->short_description;
                $data['photo'] = $url;


                DB::table('tbl_galary')
                    ->where('id',$id)
                    ->update($data);
               Session::put('message','Photo Update Successfully');
                return Redirect::to('/manage_photo');


            }else{
                Session::put('message','Something Went Wrong');
                return Redirect::to('/manage_photo');
            }
        }
    }

    public function unpublishedToPublishedphoto($id){
        DB::table('tbl_galary')
            ->where('id',$id)
            ->update(['photo_status' => 1]);
        Session::put('message','Gallery Image Published Successfully');
        return Redirect::to('/manage_photo');
    }

    public function publishedToUnpublishedphoto($id){
        DB::table('tbl_galary')
            ->where('id',$id)
            ->update(['photo_status' => 0]);
        Session::put('message','Gallery Image Unpublished Successfully');
        return Redirect::to('/manage_photo');
    }

}
