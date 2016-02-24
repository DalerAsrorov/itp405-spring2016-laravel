<?php

namespace App\Services\API;

class SoundCloud
{
    protected $cleintID;
    //
    public function __construct(array $config=[])
    {
      $this->clientID = $config['clientID'];
    }

    public function tracks($profileURL)
    {
      $profile = $this->profile($profileURL);
      var_dump($profile);
    }

    protected function profile($url)
    {
      $clientID = $this->clientID;
      $url = "http://api.soundcloud.com/resolve.json?url=$url&cllient_id=$clientID";

      $jsonString = file_get_contents($url);
    }
}
