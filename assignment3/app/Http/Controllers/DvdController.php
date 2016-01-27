<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class DvdController extends Controller
{
    public function search()
    {
      //get the list of genres and formats
      $genres = DB::table('genres')
        ->select('*')
        ->get();

      $ratings = DB::table('ratings')
        ->select('*')
        ->get();


      return view('search', [
        'genres' => $genres,
        'ratings' => $ratings
      ]);
    }

    public function results() {
      return view('results');
    }
}
