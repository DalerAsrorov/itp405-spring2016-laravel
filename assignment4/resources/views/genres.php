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

    .genre-title {
      text-align: center;
    }

    .thead {
      font-weight: 800;
      font-size: 20px;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="row">
      <h1 class="genre-title"> <?php echo $genre->genre_name ?> </h1>
          <div class="list-of-movies class="table-responsive"">
            <table class="table">
              <thead class="thead">
                <tr>
                <td>Title</td>
                <td>Rating</td>
                <td>Genre</td>
                <td>Label</td>
              </tr>
              </thead>
              <?php foreach($dvds as $dvd) : ?>
                <tr>
                  <td><?php echo $dvd->title ?></td>
                  <td><?php echo $dvd->rating_id ?></td>
                  <td><?php echo $dvd->genre_id ?></td>
                  <td><?php echo $dvd->label_id ?></td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>

      </div>
    </div>
  </div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>
