<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\flat;
use App\slider;
use App\city;
use App\blog;
use App\user;
use App\homeslider;
use App\establish_company;
use App\residence;
use App\contactus;
use App\aboutus;
use App\distinic;
use Illuminate\Support\Facades\Mail;
use App\Mail\message;
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
        $distinics=DB::table('distinics')->get();
        return view('admin.Addflat')->with('cities',$cities)->with('distinics',$distinics);
    }
    ///////////////////////////add_flat_function///////////////
   public function add_flat(Request $request)
   {
    
    // dd($request->distinics);
  
    $flat=new flat();
    $flat->city=$request->city;
    $flat->ar_name=$request->ar_name;
    $flat->en_name=$request->en_name;
    $flat->price=$request->Price;
    // $flat->address=$request->address;
    // $flat->address_ar=$request->address_ar;
    // $flat->info=$request->info;
    $flat->info_ar=$request->info_ar;
    $flat->area=$request->area;
    //distinic
    $flat->distinc_id=$request->distinics;
    // $flat->area_ar=$request->area_ar;
    // $flat->type=$request->type;
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
    //->insert(public_path('watermark/so.png'),'bottom-right', 10, 10)
   Image::make($file->getRealPath())->save($path);
   $flat->img=$name;
    ///////////////////////////////
    //save to DB
   $flat->save();
     $newflat=DB::table('flats')->where('img',$name)->first();
    //  dd($newflat->f_id);  
    // return back()->with('success-message', 'Done');
    return redirect('/add/en/flat/'.$newflat->f_id);

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
        $flats=DB::table('flats')
        ->leftjoin('distinics','flats.distinc_id','=','distinics.dis_id')
        ->join('cities','flats.city','cities.id')
        ->orderBy('f_id','desc')
        ->paginate(7);
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

    if(count($sliders)>=1){
        foreach($sliders as $delslid ){
            unlink(public_path('/upload pic/'.$delslid->name));
        }
    }
    
    ///////////////////////////////After Delete sliders////////////////////
    // dd($delflat->img);
    unlink(public_path('/flat/'.$delflat->img));
    $delflat->delete();
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
        $flats=DB::table('flats')->where('f_id',$id)
        ->leftjoin('distinics','flats.distinc_id','=','distinics.dis_id')
        ->join('cities','flats.city','cities.id')
        ->first();
        // dd($flats);
        $cities=DB::table('cities')->get();
        $distinics=DB::table('distinics')->get();
        return view('admin.EditFlat')->with('flats',$flats)->with('cities',$cities)
        ->with('distinics',$distinics);
    }
    ////////////////////////////////////////Edit Flat
    public function Edit_flat($id ,Request $request)
    {
    $flat=flat::find($id);
    $flat->city=$request->city;
    $flat->ar_name=$request->ar_name;
    $flat->en_name=$request->en_name;
    $flat->price=$request->Price;
    $flat->info=$request->info;
    $flat->info_ar=$request->info_ar;
    $flat->area=$request->area;
    //distinic
    $flat->distinc_id=$request->distinics;
    $flat->room=$request->room;
    $flat->bath=$request->bath;  
      if($request->vip==null){
        $flat->vip=0;
    }else{
        $flat->vip=1;
    }
       ///////////////////////////////
    //delete img file 
    unlink(public_path('/flat/'.$flat->img));
    /////file
    $file=$request->file('img');
      $name=time().$file->getClientOriginalName();
      $path= base_path() . '/public/flat/'.$name;
    //upload
    //->insert(public_path('watermark/so.png'),'bottom-right', 10, 10)
   Image::make($file->getRealPath())->save($path);
//    ->resize(361, 436)
   $flat->img=$name;
 
    /////////////////////
    //save to DB
   $flat->save();
   $newflat=DB::table('flats')->where('img',$name)->first();
//    dd($newflat->f_id);  
    // return back()->with('success-message', 'Edit Done');
    return redirect('/add/en/flat/'.$newflat->f_id);

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
            //->insert(public_path('watermark/so.png'),'bottom-right', 10, 10)
            Image::make($file->getRealPath())->save($path);
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
    //->resize(653, 367)->insert(public_path('watermark/so.png'),'bottom-right', 10, 10)
    Image::make($file->getRealPath())->save($path);
    $blog->img=$name;
    $blog->save();
    // dd($name);
    $newblog=DB::table('news')->where('img',$name)->first();
    // dd($newblog->id);
    // return back()->with('success-message', 'Blog Added');
    return redirect('add/en/blog/'.$newblog->id);
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
    $blog->p_ar=$request->p_ar;
    $blog->heading_en=$request->heading_en;
     $blog->p_en=$request->p_en;
    ///////////////////////image
   $file=$request->file('img');
    $name=time().$file->getClientOriginalName();
    $path=public_path('/news pic/'.$name);
    //->resize(653, 367)->insert(public_path('watermark/so.png'),'bottom-right', 10, 10)
    Image::make($file->getRealPath())->save($path);
    $blog->img=$name;
    $blog->save();
    $newblog=DB::table('news')->where('img',$name)->first();
    // return back()->with('success-message', 'Blog Added');
    return redirect('edit/en/blog/'.$newblog->id);
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
        'email' => 'email|unique:users,email',
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
/////////////////////////////////////////////////////////
////////////////////////////////////////////////////////
////////////////////////////////////////////////////////
//////////////All User/////////////////////////////////
public function AllUser()
{
    $users=DB::table("users")->get();
    return view("admin.Alluser")->with("users",$users);
}
///////////////////////delete user
public function DeleteUser($id)
{
    $userinfo=user::find($id);
    if($userinfo['id']==1){
        return back()->with('delete-message', 'Cant removed the super admin ');
    }
    $userinfo->delete();

    return back()->with('delete-message', 'user Removed');

}
///////////update user page
public function EditUserPage($id)
{
    $user=DB::table("users")->where('id',$id)->first();
    return view("admin.EditUser")->with("user",$user);
}
///////////update user
public function EditUser(Request $request ,$id)
{


    $user=user::find($id);
      /////////////////Request validation
      $this->validate($request, [
        'name' => 'required|min:3|max:50',
        'email' => 'email',
        'vat_number' => 'max:13',
        'password' => 'required|confirmed|min:6',
    ]);
    $user->name=$request->name;
    $user->email=$request->email;
    $user->premission=$request->premission;
    $password = Hash::make($request->password);
    $user->password=$password;
    $user->save();
    return back()->with('success-message', 'Account Edited');

}
/////////////////////pages page
public function pages()
{
  return view("admin.page1");
}
//////show edit page
public function edit_page($ln)
{
  return view("admin.Addpage")->with('ln',$ln);
}
//fill establish company
public function establish_company(Request $request , $ln)
{
    $establish_company=DB::table('establish_companies')->first();
    ///1 - check if my table have any data because i used only 1 row

////if have a data i will edit
    if($establish_company==NULL){
    $establish_company=new establish_company;
}
else {
    $establish_company=establish_company::find($establish_company->id);

}

    if($ln=="ar"){

        $establish_company->p_ar=$request->Page_ar;
        $establish_company->ar_state=1;
        $establish_company->save();
        return redirect("/pages")->with('success-message', 'Done');
       }
       else if($ln=="en"){

        $establish_company->p_en=$request->page_en;
        $establish_company->en_state=1;
        $establish_company->save();
        return redirect("/pages")->with('success-message', 'Done');

       }
}
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////Residence_//////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////
public function Residence(Request $request , $ln)
{
    $residence=DB::table('residences')->first();
    // dd($residence->id);
    ///1 - check if my table have any data because i used only 1 row

////if have a data i will edit
    if($residence==NULL){
    $residence=new residence;
}
else {
    $residence=residence::find($residence->id);

}

    if($ln=="ar"){
   
        $residence->p_ar=$request->Page_ar;
        $residence->ar_state=1;
        // dd($residence->p_ar);
        $residence->save();
        return redirect("/pages")->with('success-message', 'Done');
       }
       else if($ln=="en"){

        $residence->p_en=$request->page_en;
        $residence->en_state=1;
        $residence->save();
        return redirect("/pages")->with('success-message', 'Done');

       }
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////Home slider/////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////
public function HomeSliderPage()
{
   $homesliders=DB::table("homesliders")->get();
   return view("admin.AllHomeSlider")->with('homesliders',$homesliders); 
}
///////////////////////////////////////////////////////////////////////////////////////////
/////add home slider 
//add home slider page
public function AddHomeSliderPage()
{
    return view("admin.Addhomeslider");
}
//home slider fun
public function HomeSlider(Request $request)
{
    $homeslider=new HomeSlider();
            $path=public_path("homepic");
             /////Arabic slider
             $pic1=$request->file('AR_slider');
             $picname1=time()."ar".$pic1->getClientOriginalName();
             $homeslider->AR_slider=$picname1;

             /////english slider
             $pic2=$request->file('EN_slider');
             $picname2=time()."En".$pic2->getClientOriginalName();
             $homeslider->EN_slider=$picname2;

             //upload
             $pic1->move($path,$picname1);
             $pic2->move($path,$picname2);
  
 
    $homeslider->save();
    return redirect("/homeslider")->with('success-message', 'Slider Added');


}
/////Edit Home Slider Page
public function EditHomeSliderPage($id)
{
    $homeslider=HomeSlider::find($id);
    return view("admin.Edithomeslider")->with('homeslider',$homeslider);
}

 ////Edit Home Slider
 public function EdiHomeSlider($id,Request $request)
 {
     $homeslider=HomeSlider::find($id);
     $path=public_path("homepic");
          /////Arabic slider
          $pic1=$request->file('AR_slider');
          $picname1=time()."ar".$pic1->getClientOriginalName();
          $homeslider->AR_slider=$picname1;

          /////english slider
          $pic2=$request->file('EN_slider');
          $picname2=time()."En".$pic2->getClientOriginalName();
          $homeslider->EN_slider=$picname2;

          //upload
          $pic1->move($path,$picname1);
          $pic2->move($path,$picname2);


         $homeslider->save();
         return redirect("/homeslider")->with('success-message', 'Slider Edited');

 }
 //// Delete Slider
 public function DeleteSlider($id)
 {
     $delhomeslider=HomeSlider::find($id);
     unlink(public_path('/homepic/'.$delhomeslider->AR_slider));
     unlink(public_path('/homepic/'.$delhomeslider->EN_Slider));
     $delhomeslider->delete();
     

     return redirect("/homeslider")->with('delete-message', 'Slider Edited');

 }
    //////////////////////////////homeflat//////////////////////////////
    ////////////////////////////////////////////////////////////////////
    public function ShowHomeFlat()
    {
        $flats=DB::table("flats")->get();
        return view("admin.homeflat")->with('flats',$flats);

    }
    ////////fun of homeflat////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////
   public function FunHomeFlat(Request $request)
   {
       if(count($request->home)>3){
        return back()->with('delete-message', 'You Should Select only 3 flats');
       }
       else{
           $f_ids=$request->home;
           $flat=DB::table('flats')->update(array('home_state' => '0'));
        //    dd("hhhhh");
           foreach($f_ids as $f_id){
           flat::where('f_id',$f_id)->update(['home_state' => '1']);
           }
        
           return redirect("/home")->with('success-message', 'Done');

       }
   }
   //////////////////////////////////////////////////////////////////////
   ////////////////contact us///////////////////////////////////////////
   /////////////////////////////////////////////////////////////////////
   public function MessagesPage()
   {
       $messages=DB::table("contactuses")->where('reply',0)
       ->orderBy('id','desc')
       ->paginate(10);
       return view("admin.AllMessages")->with('messages',$messages);
   }
   // reply message page
   public function ReplyMessagesPage($id)
   {
    $messages=DB::table("contactuses")->where('id',$id)->first();
      return view("admin.ReplyMessage")->with('messages',$messages);
   }
   //reply fun
   public function ReplyMessages($id ,Request $request )
   {
       $message= contactus::find($id);
       $message->message_reply=$request->reply;
       $message->reply=1;
      
       
    //    dd($message->email);
       Mail::to($message->email)->send(new message($request->reply));
       $message->save();
       return redirect("/messages")->with('success-message', 'Reply Sent!');
   }
   //About
   public function About(Request $request , $ln)
   {
    $aboutus=DB::table('aboutuses')->first();
    ///1 - check if my table have any data because i used only 1 row

////if have a data i will edit
    if($aboutus==NULL){
    $aboutus=new aboutus;
}
else {
    $aboutus=aboutus::find($aboutus->id);

}

    if($ln=="ar"){

        $aboutus->p_ar=$request->Page_ar;
        $aboutus->ar_state=1;
        $aboutus->save();
        return redirect("/pages")->with('success-message', 'Done');
       }
       else if($ln=="en"){

        $aboutus->p_en=$request->page_en;
        $aboutus->en_state=1;
        $aboutus->save();
        return redirect("/pages")->with('success-message', 'Done');

       }
}
////////////////////////////distinics
 public function all_distinics()
 {
     $cities=DB::table('distinics')->get();
     return view('admin.Alldistinics')->with('cities',$cities);
 }
 ////////////////
 public function show_update_dis($dis_id)
 {
     $city=distinic::find($dis_id);
     $cities=DB::table("cities")->get();
     return view('admin.Updatedis')->with('city',$city)->with('cities',$cities);

 }
 ////////upload
 public function update_dis($dis_id,Request $request)
 {
    $dis=distinic::find($dis_id);
     $dis->dis_ar=$request->name_ar;
     $dis->dis_en=$request->name_en;
     $dis->city_id=$request->city;
     $dis->save();
     return redirect('all_distinics')->with('success-message', 'distinic updated');
 }
 ///////////////////////delete
 public function deletedis($dis_id)
{
    // dd(city::find($dis_id));
    distinic::find($dis_id)->delete();

    return back()->with('delete-message', 'city Removed');
}

////////////////////add dis
public function show_dis()
{
    $cities=DB::table("cities")->get();
    return view('admin.Adddis')->with('cities',$cities);
}
///add dis function

public function Adddis(Request $request)
{
  $dis=new distinic();
  $dis->dis_ar=$request->name_ar;
  $dis->dis_en=$request->name_en;
  $dis->city_id=$request->city;
  $dis->save();
  return redirect("/all_distinics")->with('success-message', 'Distinics Added');

}
//////////////////////////Replied
public function RepliedPage()
{
    $messages=DB::table("contactuses")->where('reply',1)
    ->orderBy('id','desc')
    ->paginate(10);
    return view("admin.AllReplied")->with('messages',$messages);
}

//////////////////////ShowReplied
public function ShowReplied($id)
{
    $messages=contactus::find($id);
   
    return view("admin.ShowReplied")->with('messages',$messages);
}


///////////////////english textarea

public function EnglishText($id)
{
    return view("admin.EnglishTextArea");
}


public function EnglishTextFun($id,request $request)
{
   $blog=blog::find($id);
    $blog->heading_en=$request->heading_en;
     $blog->p_en=$request->p_en;
     $blog->save();
     return redirect('/All/blog')->with('success-message', 'Blog Edited');
}


//////flat english

public function English($id)
{
    $flat=DB::table('flats')->where('f_id',$id)->first();
    return view("admin.EnglishText")->with('flat',$flat);
    
}


public function EditEnglishFlat($id,Request $request)
{
   
    $flat=flat::find($id);
    // dd($flat->f_id);
    $flat->info=$request->info;
    // dd($flat->info);
    $flat->save();
    return redirect('/Allflats')->with('success-message', 'Blog Edited');
}








}

