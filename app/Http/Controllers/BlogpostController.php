<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class BlogpostController extends Controller
{
    public function writepost(){
        $category=DB::table('categories')->get();
        return view('post.writeposts',compact('category'));
    }

    // write post insert
    public function storepost(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|max:200',
            'details' => 'required',
            'image' => 'required | mimes:jpeg,jpg,png,PNG | max:100000',
        ]);

        $data=array();
        $data['title']=$request->title;
        $data['details']=$request->details;
        $data['categories_id']=$request->categories_id;
        $image=$request->file('image');
        if($image){
           $image_name=hexdec(uniqid());
           $ext=strtolower($image->getClientOriginalExtension());
           $image_full_name=$image_name.'.'.$ext;
           $upload_path='public/frontend/postimage/';
           $image_url=$upload_path.$image_full_name;
           $success=$image->move($upload_path,$image_full_name);
           $data['image']=$image_url;
           DB::table('posts')->insert($data);
           $notification=array(
            'message'=>'Successfully Post Inserted',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
        }
        else{
            DB::table('posts')->insert($data);
           $notification=array(
            'message'=>'Successfully Post Inserted',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
        }



    }
   //for all post
    public function allpost(){
        $post=DB::table('posts')
        ->join('categories','posts.categories_id','categories.id')
        ->select('posts.*','categories.name')
        ->get();
        return view('post.all_post',compact('post'));
    }
   //for single view post
    public function singlepost($id){
        $post=DB::table('posts')
        ->join('categories','posts.categories_id','categories.id')
        ->select('posts.*','categories.name')
        ->where('posts.id',$id)
        ->first();
        return view('post.singleview_post',compact('post'));
    }

    // for edit post
    public function editpost($id){
        $category=DB::table('categories')->get();
        $post=DB::table('posts')->where('id',$id)->first();
        return view('post.edit_post',compact('category','post'));

    }

    //for update post
    public function updatepost(Request $request,$id ){
     
        $validatedData = $request->validate([
            'title' => 'required|max:200',
            'details' => 'required',
            'image' => ' mimes:jpeg,jpg,png,PNG | max:100000',
        ]);

        $data=array();
        $data['title']=$request->title;
        $data['details']=$request->details;
        $data['categories_id']=$request->categories_id;
        $image=$request->file('image');
        if($image){
           $image_name=hexdec(uniqid());
           $ext=strtolower($image->getClientOriginalExtension());
           $image_full_name=$image_name.'.'.$ext;
           $upload_path='public/frontend/postimage/';
           $image_url=$upload_path.$image_full_name;
           $success=$image->move($upload_path,$image_full_name);
           $data['image']=$image_url;
           unlink($request->old_photo);
           DB::table('posts')->where('id',$id)->update($data);
           $notification=array(
            'message'=>'Successfully Post Updated',
            'alert-type'=>'success'
        );
        return Redirect()->route('all-post')->with($notification);
        }
        else{
            $data['image']=$request->old_photo;
            DB::table('posts')->where('id',$id)->update($data);
           $notification=array(
            'message'=>'Successfully Post Updated',
            'alert-type'=>'success'
        );
        return Redirect()->route('all-post')->with($notification);
        }

    }

    //for delete post
    public function deletepost($id){
        $post=DB::table('posts')->where('id',$id)->first();
        $image=$post->image;
        $delete=DB::table('posts')->where('id',$id)->delete();
        if($delete){
         unlink($image);
         $notification=array(
            'message'=>'Successfully Deleted!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
        }
        else{
            $notification=array(
                'message'=>'something is wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }



}
