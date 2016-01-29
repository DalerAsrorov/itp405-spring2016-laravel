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

    public function results(Request $request) {
      $movie = $request->input('movie');
      $genre_id = $request->input('genre');
      $rating_id = $request->input('rating');
      $movies;

      if(!$movie) {
        $movies = DB::table('dvds')
          ->select('title', 'genre_name', 'rating_name', 'label_name', 'sound_name', 'format_name')
          ->join('genres', 'dvds.genre_id', '=', 'genres.id')
          ->join('ratings', 'dvds.rating_id', '=', 'ratings.id')
          ->join('labels', 'dvds.label_id', '=', 'labels.id')
          ->join('sounds', 'dvds.sound_id', '=', 'sounds.id')
          ->join('formats', 'dvds.format_id', '=', 'formats.id')
          ->get();
      }
      else if($genre_id < 0 && $rating_id < 0) { // if user selects 'All' for both options
          $movies = DB::table('dvds')
            ->select('title', 'genre_name', 'rating_name', 'label_name', 'sound_name', 'format_name')
            ->join('genres', 'dvds.genre_id', '=', 'genres.id')
            ->join('ratings', 'dvds.rating_id', '=', 'ratings.id')
            ->join('labels', 'dvds.label_id', '=', 'labels.id')
            ->join('sounds', 'dvds.sound_id', '=', 'sounds.id')
            ->join('formats', 'dvds.format_id', '=', 'formats.id')
            ->where('title', 'like', "%$movie%")
            ->get();
      }
      else if($rating_id < 0) {
        $movies = DB::table('dvds')
          ->select('title', 'genre_name', 'rating_name', 'label_name', 'sound_name', 'format_name')
          ->join('genres', 'dvds.genre_id', '=', 'genres.id')
          ->join('ratings', 'dvds.rating_id', '=', 'ratings.id')
          ->join('labels', 'dvds.label_id', '=', 'labels.id')
          ->join('sounds', 'dvds.sound_id', '=', 'sounds.id')
          ->join('formats', 'dvds.format_id', '=', 'formats.id')
          ->where('title', 'like', "%$movie%")
          ->where('genre_id', '=', "$genre_id")
          // ->where('rating_id', '=', "$rating_id")
          ->get();
      }
      else if($genre_id < 0) {
          $movies = DB::table('dvds')
            ->select('title', 'genre_name', 'rating_name', 'label_name', 'sound_name', 'format_name')
            ->join('genres', 'dvds.genre_id', '=', 'genres.id')
            ->join('ratings', 'dvds.rating_id', '=', 'ratings.id')
            ->join('labels', 'dvds.label_id', '=', 'labels.id')
            ->join('sounds', 'dvds.sound_id', '=', 'sounds.id')
            ->join('formats', 'dvds.format_id', '=', 'formats.id')
            ->where('title', 'like', "%$movie%")
            // ->where('genre_id', '=', "$genre_id")
            ->where('rating_id', '=', "$rating_id")
            ->get();
      }
      else { // if the user enters the title, chooses rating and genre
          $movies = DB::table('dvds')
            ->select('title', 'genre_name', 'rating_name', 'label_name', 'sound_name', 'format_name')
            ->join('genres', 'dvds.genre_id', '=', 'genres.id')
            ->join('ratings', 'dvds.rating_id', '=', 'ratings.id')
            ->join('labels', 'dvds.label_id', '=', 'labels.id')
            ->join('sounds', 'dvds.sound_id', '=', 'sounds.id')
            ->join('formats', 'dvds.format_id', '=', 'formats.id')
            ->where('title', 'like', "%$movie%")
            ->where('genre_id', '=', "$genre_id")
            ->where('rating_id', '=', "$rating_id")
            ->get();
      }

      $noResults = false;
      if(!$movies) {
        $noResults = true;
      }

      return view('results', [
        'movie' => $movie,
        'movies' => $movies,
        'noResults' => $noResults
      ]);
    }
}
