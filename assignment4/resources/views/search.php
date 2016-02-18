
<!DOCTYPE>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <title> DVD Search </title>

  <style media="screen">
    body {
      margin:0;
      padding:0;
    }

    .center {
      float: none;
      display: block;
      margin: 0 auto;
    }

    .search-container {
      border: 1px solid grey;
    }

    .form-search {
      border-radius: 5px;
      border: 1px solid lightgrey;
    }

    .header-text {
      text-align: center;
    }

    .form-container {
        margin-top: 250px;
    }

    .full {
      width: 100%;
    }

    .option-name {
      background: #5bc0de;
      padding: 6px;
      border: 1px solid grey;
      color: white;
    }

    .options-container {
      padding: 0;
    }

    .sidebar {
      position: absolute;
      left: 0;
      width: 200px;
      height: 100%;
      background: #000033;
      color: #ccddff;
      padding: 5px;
    }

    .sidebar h3 {
      text-align: center;
    }

    .sidebar ul {
      list-style-type:none;
    }

  </style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="sidebar">
      <h3>Genres</h3>
      <div class="list">
        <ul>
          <?php foreach($genresEloquent as $genreEl) : ?>
            <li>
              <a href=<?php echo "/genres/$genreEl->id/dvds" ?>> <?php echo $genreEl->genre_name ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <div id="form-search center">
      <form action="/dvds" class="col-lg-6 center form-container" method="get">
        <span class="header-text"> <h2> DVD Search </h2> </span>
        <div class="input-group search-container full">
          <input type="text" class="form-control full" name="movie" placeholder="Enter DVD title">
          <div class="options-div">
            <div class="option-name col-lg-3">
              Genres:
            </div>
            <div class="options-container col-lg-9">
              <select class="form-control" name="genre">
                <option value="-1">All </option>
                <?php foreach($genres as $genre) : ?>
                  <option value=<?php echo $genre->id; ?>><?php echo $genre->genre_name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="options-div">
            <div class="option-name col-lg-3">
              Ratings:
            </div>
            <div class="options-container col-lg-9">
              <select class="form-control" name="rating">
                <option value="-2">All </option>
                <?php foreach($ratings as $rating) : ?>
                  <option value=<?php echo $rating->id; ?>><?php echo $rating->rating_name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>
        <div class=" full">
          <button class="btn btn-info full" type="submit" style="width: 100%;">Search</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>
