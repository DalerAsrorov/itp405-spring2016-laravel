
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
  </style>
</head>
<body>

<div class="container">
  <div class="row">
    <div id="form-search center">
      <form action="/dvds" class="col-lg-6 center form-container" method="get">
        <span class="header-text"> <h2> DVD Search </h2> </span>
        <div class="input-group search-container full">
          <input type="text" class="form-control full" name="movie" placeholder="Enter DVD title">
          <div class="options-div">
            <select class="form-control">
              <option value="-2">All </option>
              <?php foreach($genres as $genre) : ?>
                <option value=<?php echo $genre->id; ?>><?php echo $genre->genre_name; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="options-div">
            <select class="form-control">
              <option value="-2">All </option>
              <?php foreach($ratings as $rating) : ?>
                <option value=<?php echo $rating->id; ?>><?php echo $rating->rating_name; ?></option>
              <?php endforeach; ?>
            </select>
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
