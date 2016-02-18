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
      background: green;
      color: white;
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

    .create-dvd-form {

    }
  </style>
</head>
<body>

  <!-- If the form is submitted successfully. -->
  <?php if(Session::has('flash_message')) : ?>
    <div id="success">
       <h2><?php echo Session::get('flash_message') ?></h2>
    </div>
  <?php endif ?>

  <!-- If the form is submitted with errors. -->
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

  <!-- form -->
  <div id="form-div">
    <form class="create-dvd-form" action="/dvds" method="post">
      <div class="box form-section">
        <h2 class="form-title">New DVD</h2>
        <form method="post" action="/dvds">
          <?php echo csrf_field() ?>

            <fieldset class="form-group">
             <label for="formGroupExampleInput">Title</label>
             <input type="text" class="form-control" value="<?php echo old('title') ?>" id="title" name="title" placeholder="Enter DVD Title">
           </fieldset>
           <fieldset class="form-group">
            <label for="formGroupExampleInput">Label</label>
            <select class="label-options" name="label">
                <?php foreach($labels as $label) : ?>
                  <option value="<?php echo $label->id ?>" <?php echo old("label_name") == $label->label_name ? "selected" : "" ?>> <?php echo $label->label_name ?></option>
                <?php endforeach; ?>
            </select>
          </fieldset>
          <fieldset class="form-group">
           <label for="formGroupExampleInput">Sound</label>
           <select class="label-options" name="sound">
               <?php foreach($sounds as $sound) : ?>
                 <option value="<?php echo $sound->id ?>" <?php echo old("sound_name") == $sound->sound_name ? "selected" : "" ?>> <?php echo $sound->sound_name ?></option>
               <?php endforeach; ?>
           </select>
         </fieldset>
         <fieldset class="form-group">
          <label for="formGroupExampleInput">Genre</label>
          <select class="label-options" name="genre">
              <?php foreach($genres as $genre) : ?>
                <option value="<?php echo $genre->id ?>" <?php echo old("genre_name") == $genre->genre_name ? "selected" : "" ?>> <?php echo $genre->genre_name ?></option>
              <?php endforeach; ?>
          </select>
        </fieldset>
        <fieldset class="form-group">
         <label for="formGroupExampleInput">Rating</label>
         <select class="label-options" name="rating">
             <?php foreach($ratings as $rating) : ?>
               <option value="<?php echo $rating->id ?>" <?php echo old("rating_name") == $rating->rating_name ? "selected" : "" ?>> <?php echo $rating->rating_name ?></option>
             <?php endforeach; ?>
         </select>
       </fieldset>
       <fieldset class="form-group">
        <label for="formGroupExampleInput">Format</label>
        <select class="label-options" name="format">
            <?php foreach($formats as $format) : ?>
              <option value="<?php echo $format->id ?>" <?php echo old("format_name") == $format->format_name ? "selected" : "" ?>> <?php echo $format->format_name ?></option>
            <?php endforeach; ?>
        </select>
      </fieldset>

        <fieldset class="form-group center-align">
          <button type="submit" name="submit" class="btn btn-default" >Submit</button>
        </fieldset>
        </form>
      </div>
    </form>
  </div>


<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>
