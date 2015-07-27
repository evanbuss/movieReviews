<?php
    // var_dump($avgStars);
    // die();
 ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Movie Reviews</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="/assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <style>
        #height-control {
            height: auto;
            max-height: 600px;
            overflow: auto;
        }
        .background-style {
            background: -webkit-linear-gradient(bottom, black, #4D4D4D, #4D4D4D, black);
            color: white;
        }
        #move-up {
            margin-top: 7px;
        }
        #big-stars {
            font-size: 45px;
            color: gold;
        }
    </style>

</head>
<body >

    <div class="navbar navbar-inverse navbar-fixed-top" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/main/wall">Movie Reviews</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                          <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $user['first_name']." ".$user['last_name'] ?></a>
                            <ul class="dropdown-menu">
                                <li><a href="/main/wall">Back to the Reviews</a></li>
                                <li><a href="/main/add_movie">Add a Movie</a></li>
                                <li><a href="/main/add">Add a Review</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="/main/settings">Settings</a></li>
                                <li><a href="/main/logout">Log Out</a></li>
                            </ul>
                    </li>
                    <li><a href="/main/wall">Back to the Reviews</a></li>
                    <li><a href="/main/add_movie">Add Movie</a></li>
                    <li><a href="/main/add">Add a Review</a></li>
                    <li><a href="/main/logout">Log Out</a></li>
                </ul>
            </div>

        </div>
    </div>
   <!--/.NAVBAR END-->
    <!-- Spacer -->
    <section id="home" class="head-main-img">
        <div class="container">
            <div class="row text-center pad-row" >
                <div class="col-md-12">
                    <h1> <?= $movie['movie'] ?> </h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Movie Info -->
    <section>
       <div class="container-fluid jumbotron">
           <div class="col-md-12 text-center">
                <h2><?= $movie['movie'] ?></h2>
                 <p><b>Director:</b> <?= $movie['director'] ?></p>
                 <p><b>Average Rating:</b><b id="big-stars">
                    <?php
                        foreach ($reviews as $review) {
                            if($id == $review['reviews_id']) {
                                $stars = floor($avgStars[0]['avgStars']);
                                $blackstar = '&#9733';
                                $whitestar = '&#9734';
                                for ($i=0; $i < $stars; $i++) {
                                    echo $blackstar;
                                }
                                for ($i=0; $i < (5-$stars); $i++) {
                                    echo $whitestar;
                                }
                            }
                        }
                     ?>
                </b></p>
           </div>
       </div>
    </section>
    <!-- Reviews / Add A Review -->
    <section>
        <div class="container">
            <div class="col-md-6" id="height-control">
                <h2 class="col-sm-offset-4">Reviews</h2>
                <?php
                    foreach ($reviews as $review) {
                        if($id == $review['movie_id']) {
                                $stars = $review['stars'];
                                $blackstar = '&#9733';
                                $whitestar = '&#9734';
                                echo  '<h6>Rating:</h6>';
                                for ($i=0; $i < $stars; $i++) {
                                    echo $blackstar;
                                }
                                for ($i=0; $i < (5-$stars); $i++) {
                                    echo $whitestar;
                                }
                            echo '<br><a href="/main/show_user/'.$review['user_id'].'">'.$review['first_name'].'</a> '.$review['review'].'<p> Posted on '.$review['created_at'].'<br><hr>';
                        }
                    }
                ?>

            </div>
            <div class="col-md-6">
                <h2 class="col-sm-offset-4"> Add A Review </h2>
                    <form class="form-horizontal" action="/main/add_review" method="post">
                    <input type="hidden" name="title" value="<?= $movie['movie'] ?>">
                    <input type="hidden" name="director" value="<?= $movie['director']?>">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Review</label>
                        <div class="col-sm-10">
                          <textarea type="text" name="review" class="form-control" placeholder="Your Review"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Rating</label>
                        <div class="col-sm-10">
                          <input type="number" name="stars" min="0" max="5" class="form-control" placeholder="0">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default pull-right">Add Movie Reiew</button>
                        </div>
                      </div>
                    </form>
            </div>
        </div>
    </section>


        <!--/. END PORTFOLIO SECTION-->
         <section  class="note-sec" >
        <div class="container">
            <div class="row text-center pad-row" >
                <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 ">
                    <p>Evan's movie reviews is quietly becoming the best source of quality reviews on the web today. In a few years you will forget that rotten tomatoes ever existed. This collection of movie reviews could be the greatest contribution to the film industry since HD technology.</p>
                </div>
           </div>
        </div>
    </section>
    <!--/.NOTE END-->
     <section id="clients" class="background-style">
        <div class="container">
            <div class="row text-center pad-bottom" >
                <div class="col-md-12">
                  <h3 id="move-up">Evan's Movie Reviews</h3>
                </div>
           </div>
        </div>
    </section>
     <!--/.CLIENTS END-->
    <section id="footer-sec" >
        <div class="container">
            <div class="row  pad-bottom" >
                <div class="col-md-4">
                    <h4> <strong>About this project</strong> </h4>
                    <p>This project was built with PHP and Codeigniter. I used a MySQL database and  bootstrap for design on the front-end. </p>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                 <i class="fa fa-desktop fa-5x"></i>
                    <p> Your best source for movie reviews on the web!</p>
                    <p> Site built by Evan Buss 2015 ® </p>
                </div>
               </div>
            </div>
    </section>
    <!--/.FOOTER END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="/assets/plugins/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="/assets/plugins/bootstrap.js"></script>
    <!-- PRETTYPHOTO SCRIPTS  -->
    <script src="/assets/plugins/jquery.prettyPhoto.js"></script>
  <!-- CUSTOM SCRIPTS  -->
    <script src="/assets/js/custom.js"></script>
</body>
</html>
