<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class PostController extends Controller
{
    
    public function addcategory(){
        return view('post.add_category');
    }
    public function storecategory(Request $request){


        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:25|min:4',
            'slug' => 'required|unique:categories|max:25|min:4',
        ]);
      ;


        $data=array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $category=DB::table('categories')->insert($data);
        if($category){
            $notification=array(
                'message'=>'Successfully category Inserted',
                'alert-type'=>'success'
            );
            return Redirect()->route('all-category')->with($notification);
        }
        else{
            $notification=array(
                'message'=>'Something went wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function allcategory(){
     $category=DB::table('categories')->get();
    return view('post.all_category',compact('category'));
    }

    public function viewcategory($id){
       $singlecategory=DB::table('categories')->where('id',$id)->first();
       return view('post.category_view',compact('singlecategory'));
    }
    public function deletecategory($id){
       $delete=DB::table('categories')->where('id',$id)->delete();
       $notification=array(
        'message'=>'Successfully category Deleted',
        'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification);
     }

     public function editcategory($id){
         $category=DB::table('categories')->where('id',$id)->first();
         return view('post.edit_category',compact('category'));
      }
      public function updatecategory(Request $request,$id){
        
        $validatedData = $request->validate([
            'name' => 'required|max:25|min:4',
            'slug' => 'required|max:25|min:4',
        ]);
      ;


        $data=array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $category=DB::table('categories')->where('id',$id)->update($data);
        if($category){
            $notification=array(
                'message'=>'Successfully category Update',
                'alert-type'=>'success'
            );
            return Redirect()->route('all-category')->with($notification);
        }
        else{
            $notification=array(
                'message'=>'Nothing Upadate!',
                'alert-type'=>'error'
            );
            return Redirect()->route('all-category')->with($notification);
        }
     }

     function multidelete(Request $request){

        
        foreach($request->checkbox as $data){
            $delete= DB::table('categories')->where('id', $data)->delete();
        }

        return back();
     }
}
