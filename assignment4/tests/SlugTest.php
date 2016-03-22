<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookSearch extends TestCase
{
  // Test 1
  public function testCaseIfMatches()
  {
    $books = [
      [ 'title' => 'Introduction to HTML and CSS', 'pages' => 432 ],
      [ 'title' => 'Learning JavaScript Design Patterns', 'pages' => 32 ],
      [ 'title' => 'Object Oriented JavaScript', 'pages' => 42 ],
      [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ],
      [ 'title' => 'PHP Object Oriented Solutions', 'pages' => 80 ],
      [ 'title' => 'PHP Design Patterns', 'pages' => 300 ],
      [ 'title' => 'Head First Java', 'pages' => 200 ]
  ];

    // Arrange
    $search = new \App\Services\BookSearch($books);

    // Act
    $results = $search->find('javascript', False); // getting subset
    $titles = array_column($books, 'title'); // getting array of titles of the books array
    $if_subset = $search->isSubset($results, $titles);

    // Assert
     $this->assertTrue($if_subset);
  }

  // Test 2
  public function testCaseIfExact()
  {
    $books = [
      [ 'title' => 'Introduction to HTML and CSS', 'pages' => 432 ],
      [ 'title' => 'Learning JavaScript Design Patterns', 'pages' => 32 ],
      [ 'title' => 'Object Oriented JavaScript', 'pages' => 42 ],
      [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ], // testing
      [ 'title' => 'PHP Object Oriented Solutions', 'pages' => 80 ],
      [ 'title' => 'PHP Design Patterns', 'pages' => 300 ],
      [ 'title' => 'Head First Java', 'pages' => 200 ]
  ];

    // Arrange
    $search = new \App\Services\BookSearch($books);

    // Act
    $results = $search->find('javascript web applications', True); // getting subset

    // Assert

    $this->assertEquals($results['title'], $books[3]['title']); // books[3] = [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ]
  }

  // Test 3
  public function testCaseIfExists()
  {
    $books = [
      [ 'title' => 'Introduction to HTML and CSS', 'pages' => 432 ],
      [ 'title' => 'Learning JavaScript Design Patterns', 'pages' => 32 ],
      [ 'title' => 'Object Oriented JavaScript', 'pages' => 42 ],
      [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ], // testing
      [ 'title' => 'PHP Object Oriented Solutions', 'pages' => 80 ],
      [ 'title' => 'PHP Design Patterns', 'pages' => 300 ],
      [ 'title' => 'Head First Java', 'pages' => 200 ]
    ];

    // Arrange
    $search = new \App\Services\BookSearch($books);

    // Act
    $results = $search->find('The Definitive Guide to Symfony', True); // getting subset

    // Assert

    $this->assertEquals($results, False); 
  }


}
