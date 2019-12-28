<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
 use DB;
 use App\contactus;
class PageOfUsers extends Controller
{
    //////////////////show Properties page
    public function show_flat()
    {
        
        $flats=DB::table('flats')->where('vip','0')->join('cities', 'flats.city', '=', 'cities.id')->get();
        $cities=DB::table('cities')->get();

       return view('Property')->with('flats',$flats)->with('cities',$cities);
    }
    ////////////////////////////////vip flats
    public function show_flat_vip()
    {
        $flats=DB::table('flats')->where('vip','1')->leftjoin('distinics','flats.distinc_id','=','distinics.dis_id')
        ->join('cities','flats.city','cities.id')->get();
        $cities=DB::table('cities')->get();

       return view('Property')->with('flats',$flats)->with('cities',$cities);
    }

    ////////////////////show flat page //////////////////////
    public function show_ur_flat($id)
    {
        // dd(str_replace('en', 'ar', url()->current()));/
        $flats=DB::table('flats')->where('f_id',$id)
        ->leftjoin('distinics','flats.distinc_id','=','distinics.dis_id')
        ->first();
        $city=DB::table('cities')->where('id',$flats->city)->first();
        $sliders=DB::table('sliders')->where('flat_id',$id)->get();
       return view('FlatPage')->with('flat',$flats)->with('sliders',$sliders)->with('city',$city);
    }
    ////////////////////////////SearchFlat
    public function SearchFlat(Request $request)
    {
        
     $range=explode(";",$request->my_range);
      $test =$range[1];
    //   dd($test);
     if($test=='0'){
       
        $flats=DB::table('flats')
        ->where('city',$request->city)
        ->get();
        

     }else{
//   dd($range);
     $flats=DB::table('flats')
     ->where('city',$request->city)
     ->whereBetween('price',[$range[0],[$range[1]]])
     ->get();
    }
    $city=DB::table('cities')->where('id',$request->city)->first();

     $cities=DB::table('cities')->get();
    
    return view('SearchProperty')->with('flats',$flats)->with('cities',$cities)->with('ci',$city);

    }
    //////////Blog Page
    public function show_blog($id)
    {
        $blogs =DB::table('news')->where('id',$id)->first();
        return view("blog")->with('blogs',$blogs);
    }
    ////////////////////////////////////////////////////////welcome page //////////////////
    public function welcome()
    {
        $flats=DB::table('flats')->where('home_state','1')->join('cities', 'flats.city', '=', 'cities.id')->get();
        $cities=DB::table('cities')->get();
        $blog=DB::table('news')->orderBy('created_at', 'desc')->first();
        $blogs=DB::table('news')->orderBy('created_at', 'desc')->skip(1)->take(3)->get();
        $homesliders=DB::table("homesliders")->get();
        $count_homeslider=DB::table("homesliders")->count();
        // dd($count_homeslider)
        return view('welcome')
        ->with('blog',$blog)->with('blogs',$blogs)
        ->with('flats',$flats)->with('cities',$cities)
        ->with('homesliders',$homesliders)
        ->with('count_homesliders',$count_homeslider);
    }
    //////////////////////navbar search
    public function nav_search(Request $request)
    {
       
         $cities=DB::table('cities')->where('city','like',$request->search.'%')
         ->orwhere('city_en','like',$request->search.'%')
         ->first();
         if($cities !=null){
            $flats=DB::table('flats')->where('city',$cities->id)->get();

        }else{
            return back();
        }
       
        // dd($flats);
        $city=DB::table('cities')->get();

          return redirect('Properties')->with('flats',$flats)->with('cities',$city);

     

    }
    ////////////////////////////////////////////////////////////////////
    public function residence()
    {
        $residences=DB::table("residences")->first();
        return view("residences")->with('residences',$residences);
    }
    ///////////////////////////////////////////////////////////////////
    public function AboutUS()
    {
        $aboutus=DB::table("aboutuses")->first();
        return view("aboutus")->with('aboutus',$aboutus);
    }
    ////////////////////////////////////////////////////////////////////
    public function Establishing()
    {
        $Establishing=DB::table("establish_companies")->first();
        return view("Establishing")->with('Establishing',$Establishing);
    }
    ////////////////////////////////////////////////////////////////////
    ////////////////////Contact us//////////////////////////////////////
    ////////////////////////////////////////////////////////////////////
    public function ContactUsPage()
    {
        return view("ContactUs");
    }
    //function of ContactUs//////////////
    public function ContactUs(Request $request)
    {
        /////validation////
        $this->validate($request, [
            'email' => 'email',
        ]);
       //////////////////// 
      $con=new contactus();
      $con->username=$request->username;
      $con->email=$request->email;
      $con->message=$request->message;
      $con->save();
      if(App::getLocale()=="en"){
      return back()->with('success-message', 'Done');
    }
    else{
        return back()->with('success-message', 'تم الارسال بنجاح'); 
        }
    }
    ////////////////////searchflats
    public function searchflats()
    {
        $flats=DB::table('flats')->join('cities', 'flats.city', '=', 'cities.id')->get();
        $distinics=DB::table('distinics')->get();

       return view('searchflats')->with('flats',$flats)->with('distinics',$distinics);
    }
    ////fun of searchflat
    public function SearchFlats_fun(Request $request)
    {
    
        
        $distinics=DB::table('distinics')->get();
    //    dd($request->name); 
        if($request->name ==null and $request->dis==0){
            $flats=DB::table('flats')->join('cities', 'flats.city', '=', 'cities.id')->get();
            

         
        }

        elseif($request->dis==0 and $request->name != null)
        {
            $flats=DB::table('flats')
            ->where('ar_name','LIKE','%'.$request->name.'%')
            ->orwhere('en_name','LIKE','%'.$request->name.'%')
            ->join('cities', 'flats.city', '=', 'cities.id')->get();            
        } else{
            
            $flats=DB::table('flats')
            ->where('distinc_id',$request->dis)
            ->where('ar_name','LIKE','%'.$request->name.'%')
            ->orwhere('en_name','LIKE','%'.$request->name.'%')
            ->join('cities', 'flats.city', '=', 'cities.id')->get();
            


        }
       
        if($flats !=null){

            return view('searchflats')->with('flats',$flats)->with('distinics',$distinics);
        }
        else{
            if(App::getLocale()=="en"){
            return back()->with('delete-message', 'Not Found');
        }
        else{
            return back()->with('delete-message', 'لا يوجد');

        }

        }


    }
 
    //////////////////////blog page
    public function blogPage()
    {
        $blogs=DB::table('news')->orderBy('created_at', 'desc')->get();
       return view("allblogs")->with('blogs',$blogs);
    }


}
