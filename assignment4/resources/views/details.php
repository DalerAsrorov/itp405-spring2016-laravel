<!DOCTYPE>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <title> DVD Search </title>

  <style media="screen">
  html {
    margin: 0;
    padding: 0;
  }

    body {
      background: #00ace6;
    }

    #form-search {
      padding: 50px;
      background: linear-gradient(360deg, #0073e6, white); /* Standard syntax */
      width: 40%;
      text-align: center;
      border-radius: 10px;
      float: none;
      display: block;
      margin: 300px auto;
    }

    .btn.submit-button {
      margin-top: 20px;
    }

    .box {
      width: 50%;
      background: grey;
      padding: 5px;
      float: none;
      display: block;
      margin: 20px auto;
      border-radius: 5px;
    }

    .header-text {
      padding: 3px;
    }

    .content {
      padding: 10px;
      margin: 0;
      background: lightblue;
    }

    .no-margins {
      margin: 0;
    }

    .left {
      font-weight: bold;
    }

    .not-found {
      width: 50%;
      float: none;
      display: block;
      padding: 5px;
      margin: 280px auto;
      text-align: center;
    }

    .not-found h1 {
      font-size: 22px;
      color: blue;
      font-weight: bold;
    }

    .not-found-p {
      font-size: 20px;
      position: relative;
      top: -20px;
    }

    .query {
      padding: 5px;
      width: 50%;
      display: block;
      float: none;
      margin: 10px auto;
      color: black;
      text-align: center;
    }

    .form-section {
      background: white;
      color: grey;
    }

    .form-title {
      text-align: center;
    }

    .center-align {
      text-align: center;
    }

    #errors {
      width: 50%;
      margin: 0 auto;
      color: red;
    }
    #success {
      width: 50%;
      margin: 0 auto;
      color: green;
      background: lightblue;
      padding: 5px;
      text-align: center;
      font-size: 26px;
    }

    .reviews-section {
      width: 50%;
      margin: 0 auto;
      background: white;
    }

    .review-rating {
      color: blue;
      font-weight: 800;
    }

    .review-header {
      background: lightgrey;
    }
  </style>
</head>
<body>


  <?php if(Session::has('flash_message')) : ?>
    <div id="success">
       <h2><?php echo Session::get('flash_message') ?></h2>
    </div>
  <?php endif ?>


    <?php if (count($errors) > 0) : ?>
      <div id="errors">
        <ul>
            <?php foreach ($errors->all() as $error) : ?>
                <li>
                    <?php echo $error ?>
                </li>
            <?php endforeach ?>
        </ul>
      </div>
  <?php endif ?>


  <?php foreach($movie as $movie) : ?>
    <div class="box">
      <div class="panel panel-default no-margins header-text">
        <h3>
          <?php echo $movie->title ?>
        </h3>
      </div>
      <div class="content">
        <table class="table">
          <tr>
            <td><span class="left"> Rating: </span></td>
            <td><span> <?php echo $movie->rating_name ?> </span></td>
          </tr>
          <tr>
            <td><span class="left"> Genre: </span></td>
            <td><span> <?php echo $movie->genre_name ?> </span></td>
          </tr>
          <tr>
            <td><span class="left"> Format: </span></td>
            <td><span> <?php echo $movie->format_name ?> </span>
          </tr>
          <tr>
            <td><span class="left"> Label: </span></td>
            <td><span> <?php echo $movie->label_name ?> </span>
          </tr>
          <tr>
            <td><span class="left"> Sound: </span></td>
            <td><span> <?php echo $movie->sound_name ?> </span>
          </tr>
          <tr>
            <td><span class="left"> Format: </span></td>
            <td><span> <?php echo $movie->format_name ?> </span>
          </tr>
          <tr>
            <td><span class="left"> Award Received: </span></td>
            <td><span> <?php echo $movie->award ?> </span>
          </tr>
          <tr>
            <td><span class="left"> Release Date: </span></td>
            <td>
              <span> <?php
              $release_date = new DateTime($movie->release_date);
              $formatted = date_format($release_date, 'd-m-Y');
              echo $formatted;
              ?>
            </span>
          </tr>
        </table>
      </div>
    </div>
  <?php endforeach; ?>

  <div class="box form-section">
    <h2 class="form-title">Your Movie Review</h2>
    <form method="post" action="/dvds">
      <?php echo csrf_field() ?>
      <fieldset class="form-group">
       <label for="formGroupExampleInput">Rating</label>
       <select class="c-select" name="review_rating"  value="<?php echo old('review_rating') ?>">
         <?php for($x = 1; $x <= 10; ++$x) : ?>
            <option value="<?php echo $x ?>" <?php echo old("review_rating") == $x ? "selected" : "" ?>> <?php echo $x ?></option>
         <?php endfor; ?>
      </select>
     </fieldset>
      <fieldset class="form-group">
       <label for="formGroupExampleInput">Title</label>
       <input type="text" class="form-control" value="<?php echo old('review_title') ?>" id="reviewTitle" name="review_title" placeholder="Enter Review's Title">
       <input type="hidden" name="dvd_id" value="<?php echo $movie->id ?>">
     </fieldset>
     <fieldset class="form-group">
      <label for="formGroupExampleInput">Description</label>
        <textarea class="form-control" placeholder="" id="reviewTitle" name="review_description" rows="8" cols="40"><?php echo trim(old('review_description')) ?></textarea>
    </fieldset>
    <fieldset class="form-group center-align">
      <button type="submit" name="submit" class="btn btn-default" >Submit</button>
    </fieldset>
    </form>
  </div>

  <div class="reviews-section">
    <?php foreach($reviews as $review) : ?>
      <div class="review">
        <div class="panel panel-heading no-margins review-header">

          <strong><?php echo $review->title ?> </strong> |
          <span class="review-rating">
            <?php echo $review->rating ?>
          </span>
        </div>
        <div class="panel-body" >
          <p> <?php echo $review->description ?> </p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>


<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>
