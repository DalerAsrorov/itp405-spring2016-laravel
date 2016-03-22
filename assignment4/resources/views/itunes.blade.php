@extends('layout')

@section('content')
<div class="container">
  <div class="">
    <h1> Music Videos </h1>
  </div>
    <ul class="list-group">
        @foreach($artists as $artist)
            <li class="list-group-item">
                <div class="sub-group">
                    <div class="col-lg-8">
                        <strong>Artist</strong>: {{$artist->artistName}}
                        <br>
                        <strong>Song</strong>: {{$artist->trackName}}
                        <br>
                        <strong>Price</strong>: ${{$artist->trackPrice}}
                        <br>
                        <strong>Genre</strong>: {{$artist->primaryGenreName}}
                    </div>
                    <div>
                      <a href="{{$artist->previewUrl}}" target="_blank">
                        <video  src="{{$artist->previewUrl}}" style="width: 200px; height: 200px;">
                          <source src="{{$artist->previewUrl}}" type="video/m4v">
                          <source src="{{$artist->previewUrl}}" type="video/webm">
                        </video>
                      </a>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
