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

    .review {
      margin-top: -35px;
      /* padding: 10px; */
      margin-right: 10px;
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
  </style>
</head>
<body>

<div class="query">
  <h1>
    <?php echo "You searched for '" . $movie . "'"; ?>
  </h1>
</div>

<?php foreach($movies as $movie) : ?>
  <div class="box">
    <div class="panel panel-default no-margins header-text">
      <h3>
        <?php echo $movie->title ?>
      </h3>
      <div class="pull-right review">
        <a href=<?php echo "/dvds/" . $movie->id ?>> Review </a>
      </div>
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
      </table>
    </div>
  </div>
<?php endforeach; ?>


<div class="not-found">
  <?php
    // Show the following if the query
    // does not return any results
    if($noResults) {
      echo "<h1>No Records Found. </h1> <br>";
      echo "<p><a href='/dvds/search' class='not-found-p'> Go back to search. </a> </p>";
    }
  ?>
</div>


<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>
