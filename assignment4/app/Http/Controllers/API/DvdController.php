<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Dvd;
use Response;
use Validator;

class DvdController extends Controller
{
    public function store(Request $request)
    {
      $validation = Validator::make($request->all(), [
        'title' => 'required|unique:dvds,title'
      ]);

      if($validation->passes()) {
        $dvd = new Dvd();
        $dvd->title = $request->input('title');
        $dvd->save();

        return [
          'dvd' => $dvd
        ];
      }


      return Response::json([
        'errors' => [
          'title' => $validation->errors()->get('title')
        ]
      ], 422);

    }

    public function index()
    {
      return [
        "genres" => Genre::all()
      ];
    }

    public function show($id)
    {
      $genre = Genre::find($id);

      if(!$genre) {
        return Response::json([
          'error' => 'Genre not found'
        ], 404);
      }
      return [
        "genre" => $genre
      ];
    }

    public function showAllDvds()
    {
      $dvds = Dvd::take(20)->get();
      $genres = $this->findUniqueGenres($dvds);
      $ratings = $this->findUniqueRatings($dvds);

      return [
        'dvds' => $dvds,
        'genres' => $genres,
        'ratings' => $ratings
      ];

    }

    public function showSingleDvd($id)
    {
      $dvd = Dvd::find($id);

      if(!$dvd) {
        return Response::json([
          'error' => 'DVD not found'
        ], 404);
      }

      $genres = Dvd::find($id)->genre;
      $ratings = Dvd::find($id)->rating;



      return [
        'dvd' => $dvd,
        'genres' => [$genres],
        'ratings' => [$ratings]
      ];
    }

    public function findUniqueRatings($dvds)
    {
      $added = [];
      $ratings = [];

      foreach($dvds as $dvd)
      {
        if(!array_key_exists($dvd->rating->id, $added))
        {
          $added[$dvd->rating->id] = true;
          $ratings[] = $dvd->rating;
        }
      }
      return $ratings;
    }

    public function findUniqueGenres($dvds)
    {
      $added = [];
      $genres = [];

      foreach($dvds as $dvd)
      {
        if(!array_key_exists($dvd->genre->id, $added))
        {
          $added[$dvd->genre->id] = true;
          $genres[] = $dvd->genre;
        }
      }
      return $genres;
    }

}
