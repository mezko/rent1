<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\flat;
use App\slider;
use App\city;
use App\blog;
use App\user;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Image;
use DB;
class FlatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //////////////////////////////////////////////////add Falt /////////////////////////////////////////////////////////////////
    /////////////////////add flat page/////////////
    public function add_flat_page()
    {
        $cities=DB::table('cities')->get();

        return view('admin.Addflat')->with('cities',$cities);
    }
    ///////////////////////////add_flat_function///////////////
   public function add_flat(Request $request)
   {

    //    dd($request->img);
    $flat=new flat();
    $flat->city=$request->city;
    $flat->ar_name=$request->ar_name;
    $flat->en_name=$request->en_name;
    $flat->price=$request->Price;
    $flat->address=$request->address;
    $flat->address_ar=$request->address_ar;
    $flat->info=$request->info;
    $flat->info_ar=$request->info_ar;
    $flat->area=$request->area;
    //distinic
    $flat->distinic=$request->distinic;
    $flat->area_ar=$request->area_ar;
    $flat->type=$request->type;
    $flat->room=$request->room;
    $flat->bath=$request->bath;
    if($request->vip==null){
        $flat->vip=0;
    }else{
        $flat->vip=1;
    }

    /////file
    $file=$request->file('img');
      $name=time().$file->getClientOriginalName();
      $path= base_path() . '/public/flat/'.$name;
    //upload
   Image::make($file->getRealPath())->resize(361, 436)->insert(public_path('watermark/so.png'),'bottom-right', 10, 10)->save($path);
   $flat->img=$name;
    ///////////////////////////////
    //save to DB
   $flat->save();
    return back()->with('success-message', 'Done');
   }
   //////////////////////////////////////////////////End Add Flat ///////////////////////////////////////////////////////////////////////////
   /*////////////////////////////////////////////////////////////////////////*///////////////////////////////////////////////////////////////
      /*////////////////////////////////////////////////////////////////////////*///////////////////////////////////////////////////////////////
      /*////////////////////////////////////////////////////////////////////////*///////////////////////////////////////////////////////////////
    /*////////////////////////////////////////////////////////////////////////*///////////////////////////////////////////////////////////////
    ////////////////////////////////////////// Show flat page ////////////////////////////////////////

     //////////////////////////////////////////////////End Flat Page ///////////////////////////////////////////////////////////////////////////
   /*////////////////////////////////////////////////////////////////////////*///////////////////////////////////////////////////////////////
      /*////////////////////////////////////////////////////////////////////////*///////////////////////////////////////////////////////////////
      /*////////////////////////////////////////////////////////////////////////*///////////////////////////////////////////////////////////////
    /*////////////////////////////////////////////////////////////////////////*///////////////////////////////////////////////////////////////
    ////////////////////////////////////////// Show All flats in admin panel ////////////////////////////////////////
    public function all_flats_table()
    {
        $flats=DB::table('flats')->paginate(7);
        return view('admin.AllFlats')->with('flats',$flats);
    }
         //////////////////////////////////////////////////End Flat table ///////////////////////////////////////////////////////////////////////////
   /*////////////////////////////////////////////////////////////////////////*///////////////////////////////////////////////////////////////
      /*////////////////////////////////////////////////////////////////////////*///////////////////////////////////////////////////////////////
      /*////////////////////////////////////////////////////////////////////////*///////////////////////////////////////////////////////////////
    /*////////////////////////////////////////////////////////////////////////*///////////////////////////////////////////////////////////////
    ///////////////////////////////delete flat
    public function delete_flat($id)
{
    $delflat=flat::find($id);
  ///////////////////////delet all slider //////////////
    $sliders=DB::table('sliders')->where('flat_id',$delflat->f_id)->get();

    if(count($sliders)>1){
        foreach($sliders as $delslid ){
            unlink(public_path('/upload pic/'.$delslid->name));
        }
    }
    else{
        unlink(public_path('/upload pic/'.$delslid->name));
    }
    ///////////////////////////////After Delete sliders////////////////////
    unlink(public_path('/flat/'.$delflat->img));
    flat::find($id)->delete();
    return back()->with('delete-message', 'course Removed');
}
         /////////////////////////////////////////////////End Edit Flat ///////////////////////////////////////////////////////////////////////////
   /*////////////////////////////////////////////////////////////////////////*///////////////////////////////////////////////////////////////
      /*////////////////////////////////////////////////////////////////////////*///////////////////////////////////////////////////////////////
      /*////////////////////////////////////////////////////////////////////////*///////////////////////////////////////////////////////////////
    /*////////////////////////////////////////////////////////////////////////*///////////////////////////////////////////////////////////////
    ///////////////////////////////Edit Flat page
    public function Edit_flat_page($id)
    {
        $flats=DB::table('flats')->where('f_id',$id)->first();
        $cities=DB::table('cities')->get();
        return view('admin.EditFlat')->with('flats',$flats)->with('cities',$cities);
    }
    ////////////////////////////////////////Edit Flat
    public function Edit_flat($id ,Request $request)
    {
        $flat=flat::find($id);

    $flat->city=$request->city;
    $flat->address=$request->address;
    $flat->address_ar=$request->address_ar;
    $flat->info=$request->info;
    $flat->info_ar=$request->info_ar;
    $flat->area=$request->area;
    $flat->area_ar=$request->area_ar;
    $flat->distinic=$request->distinic;
    $flat->type=$request->type;
    $flat->room=$request->room;
    $flat->bath=$request->bath;
    if($request->vip==null){
        $flat->vip=0;
    }else{
        $flat->vip=1;
    }
    /////file
    $file=$request->file('img');
      $name=time().$file->getClientOriginalName();
      $path= base_path() . '/public/flat/'.$name;
    //upload
   Image::make($file->getRealPath())->resize(361, 436)->insert(public_path('watermark/so.png'),'bottom-right', 10, 10)->save($path);
   $flat->img=$name;
    ///////////////////////////////
    //save to DB
   $flat->save();
    return back()->with('success-message', 'Edit Done');

    }
    //////////////////////////////Show Search Page
    public function get_search_table()
    {

        return view('admin.SearchResult');
    }
    ///////////////////////////////////////////////////////////////search function
    public function all_search_table(Request $request )
    {
        $flats=DB::table('flats')->Where('ar_name','like', '%' .$request->search. '%')->get();
        if(count($flats)==0){
            $flats=DB::table('flats')->Where('en_name','like', '%' .$request->search. '%')->get();
        }

        // dd($flats);
        return view('admin.SearchResult')->with('flats',$flats);
        // return redirect('/SearchResult')->with('flat',$flats);
    }
    ///////////////////////////////////////////////////End Search Function/////
    //////////////////////////////// upload slider page
    public function Upload_Slider($id)
    {
        return view('admin.UploadSlider');
    }
    ////////////////////////////fun
    public function Upload_fun_Slider(Request $request ,$id)
    {
        $files=$request->file("img");
        foreach($files as $file){
            $slider=new slider();
            $slider->catagory=$request->type;
            ///////////upload 247*165
            $slider->flat_id=$id;
            $name=time().$file->getClientOriginalName();
            $path=public_path('/upload pic/'.$name);
            Image::make($file->getRealPath())->resize(247, 165)->insert(public_path('watermark/so.png'),'bottom-right', 10, 10)->save($path);
            $slider->name=$name;
            $slider->save();
        }



        // dd($slider);



        return back()->with('success-message', 'Edit Done');


    }
    ////////////////////////////////////////slider delete page
    public function deletslider($id)
    {
        $slider=DB::table('sliders')->where('flat_id',$id)->get();
        return view('admin.AllSlider')->with('slider',$slider);
    }

    public function deletslide($id)
    {    $delslid=slider::find($id);
        //////////////////////////////////////////////////
        // dd($delslid->name);
        unlink(public_path('/upload pic/'.$delslid->name));
        slider::find($id)->delete();
        return back()->with('delete-message', 'slider Removed');
    }
    ////////////////////////////////////////////////////////////////////////city/////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function show_city()
    {
        return view('admin.AddCity');
    }
    ///////////////////////////add city
    public function AddCity(Request $request)
    {
      $city=new city();
      $city->city=$request->name_ar;
      $city->city_en=$request->name_en;
      $city->save();
      return back()->with('success-message', 'City Added');

    }
    /////////////////////////////////////city table
    public function all_cities()
    {
        $cities=DB::table('cities')->get();
        return view('admin.AllCity')->with('cities',$cities);
    }
    /////////////////////////update city/////////////////////////
    public function show_update_city($id)
    {
        $city=city::find($id);
        return view('admin.UpdateCity')->with('city',$city);

    }
    /////////////////////////update function of city
    public function update_city($id,Request $request)
    {
        $city=city::find($id);
        $city->city=$request->name_ar;
        $city->city_en=$request->name_en;
        $city->save();
        return redirect('all_cities')->with('success-message', 'City updated');
    }
//////////////////////delete
public function deletcity($id)
{
    city::find($id)->delete();

    return back()->with('delete-message', 'city Removed');
}
/////////////////////////////////////////////////////////////////////////////////////Blog
/////////////////////////addBlog
public function addBlog()
{
    return view('admin.Addnew');
}
//////////////////////////////////////////fun//////////////////////////////////////////////////
public function addBlogfun(Request $request)
{
    $blog=new blog();
    $blog->heading_ar=$request->heading_ar;
    $blog->p_ar=$request->p_ar;
    $blog->heading_en=$request->heading_en;
    $blog->p_en=$request->p_en;
    ///////////////////////image
   $file=$request->file('img');
    $name=time().$file->getClientOriginalName();
    $path=public_path('/news pic/'.$name);
    Image::make($file->getRealPath())->resize(653, 367)->insert(public_path('watermark/so.png'),'bottom-right', 10, 10)->save($path);
    $blog->img=$name;
    $blog->save();
    return back()->with('success-message', 'Blog Added');
 }
 /////////////////////////////////////all Blogs
 public function Blogs()
 {
     $blogs =DB::table('news')->paginate(7);
     return view('admin.News')->with('blogs',$blogs);
 }
 ///////////////////////////delet_Blog
 public function delet_Blog($id)
 {
    blog::find($id)->delete();
    return back()->with('delete-message', 'blog Removed');
 }
 //////////////////////////////upload blog
 ////////////////page
 public function edit_blog($id)
 {
    $blogs =DB::table('news')->where('id',$id)->first();
    return view('admin.Editnew')->with('blog',$blogs);
 }
 /////////////////upload fun
 public function edit_blog_fun($id,request $request)
 {
    $blog=blog::find($id);
    $blog->heading_ar=$request->heading_ar;
    // $blog->p_ar=$request->p_ar;
    $blog->heading_en=$request->heading_en;
    // $blog->p_en=$request->p_en;
    ///////////////////////image
   $file=$request->file('img');
    $name=time().$file->getClientOriginalName();
    $path=public_path('/news pic/'.$name);
    Image::make($file->getRealPath())->resize(653, 367)->insert(public_path('watermark/so.png'),'bottom-right', 10, 10)->save($path);
    $blog->img=$name;
    $blog->save();
    return back()->with('success-message', 'Blog Added');
 }

 /////////////////////////////////////////////////////////users///////////////////////////////////
 //////////////add user//////////////////////////////////////////
 public function AddUserPage()
 {
     return view("admin.AddUser");
 }
////////////////////////////////////////////////////
////////////////////add user function//////////////
public function Adduser(Request $request)
{
    /////////////////Request validation
    $this->validate($request, [
        'name' => 'required|min:3|max:50',
        'email' => 'email',
        'vat_number' => 'max:13',
        'password' => 'required|confirmed|min:6',
    ]);
    /////////////////////////////////
   $user= new user();
   $user->name=$request->name;
   $user->email=$request->email;
   $user->premission=$request->premission;
   $password = Hash::make($request->password);
   $user->password=$password;
   $user->save();
   return back()->with('success-message', 'Account Added');

}
}

