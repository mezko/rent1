<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use DB;
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
        $flats=DB::table('flats')->where('vip','1')->join('cities', 'flats.city', '=', 'cities.id')->get();
        $cities=DB::table('cities')->get();

       return view('Property')->with('flats',$flats)->with('cities',$cities);
    }

    ////////////////////show flat page //////////////////////
    public function show_ur_flat($id)
    {
        // dd(str_replace('en', 'ar', url()->current()));/
        $flats=DB::table('flats')->where('f_id',$id)->first();
        $city=DB::table('cities')->where('id',$flats->city)->first();
        $sliders=DB::table('sliders')->where('flat_id',$id)->get();
       return view('FlatPage')->with('flat',$flats)->with('sliders',$sliders)->with('city',$city);
    }
    ////////////////////////////SearchFlat
    public function SearchFlat(Request $request)
    {
     $range=explode(";",$request->my_range);
    //  dd($range);
     $flats=DB::table('flats')->where('city',$request->city)
     ->whereBetween('price',[$range[0],[$range[1]]])->get();
     $cities=DB::table('cities')->get();

    //
     ////////////->where('city',$request->city)->where('type',$request->type)
    //  dd($flats);
    return view('SearchProperty')->with('flats',$flats)->with('cities',$cities);

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
       
         $cities=DB::table('cities')->where('city','like',$request->search.'%')->orwhere('city_en','like',$request->search.'%')->first();
         if($cities !=null){
            $flats=DB::table('flats')->where('city',$cities->id)->get();

        }else{
            return back();
        }
       
        // dd($flats);
        $city=DB::table('cities')->get();

          return view('SearchProperty')->with('flats',$flats)->with('cities',$city);

     

    }
    ////////////////////////////////////////////////////////////////////
 
    ////////////////////////////////////////////////////////////////////
    public function Establishing()
    {
        $Establishing=DB::table("establish_companies")->first();
        return view("Establishing")->with('Establishing',$Establishing);
    }
}
