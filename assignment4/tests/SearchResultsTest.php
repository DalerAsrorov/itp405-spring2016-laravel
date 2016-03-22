<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SearchResultsTest extends TestCase
{
    public function testSearchResultsPage()
    {
      $this
        ->visit('/dvds/search')
        ->type('die hard', 'movie')
        ->press('Search')
        ->seePageIs('/dvds?genre=-1&movie=die%20hard&rating=-2');
    }
}
