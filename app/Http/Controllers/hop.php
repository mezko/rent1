<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class hop extends Controller
{
public function mmm(Request $request)
{
    // $x=explode( 'ss', $request->info ) ;
//   dd($x);
echo nl2br($request->info);

}
}
