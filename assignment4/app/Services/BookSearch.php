<?php

namespace App\Services;

class BookSearch {
  protected $books;
  public function __construct($books)
  {
    $this->books = $books;
  }

  public function find($str, $exact)
  {
    $result;
    $found = False;
    $array = $this->books;
    $token = $str;

    if($exact) {
      foreach($array as $a) {
        if(strtolower($a['title']) == strtolower($token)) {
          $found = True;
          $result = $a;
        }
      }
      
      if($found == False)
        $result = $found;
    }
    else  {
      $searchword = $str;
      $array_of_titles = array_column($array, 'title');
      $result = $matches = array_filter($array_of_titles, function($var) use ($searchword) { return preg_match("/\b$searchword\b/i", $var); });
    }

    return $result;
  }

  // Method that checks if one array
  // is a subset of another array.
  // Returns True if it is so.
  public function isSubset($child_array, $parent_array)
  {
    $is_sub = False;
    $c = count(array_intersect($child_array, $parent_array));

    if ($c == count($child_array)) {
        $is_sub = True;
    }
    return $is_sub;
  }
}
