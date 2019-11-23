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
     $flats=DB::table('flats')->where('city',$request->city)->Where('type',$request->type)
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
        $blog=DB::table('news')->orderBy('created_at', 'desc')->first();
        $blogs=DB::table('news')->orderBy('created_at', 'desc')->skip(1)->take(3)->get();
        return view('welcome')->with('blog',$blog)->with('blogs',$blogs);
    }
}
