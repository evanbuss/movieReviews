<?php
// var_dump($reviews);
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
    <title>Movies Reviews</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- PRETTYPHOTO STYLE CSS -->
    <link href="/assets/css/prettyPhoto.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="/assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <style>
        .background-style {
            background: -webkit-linear-gradient(bottom, black, #4D4D4D, #4D4D4D, black);
            color: white;
        }
        #height-control {
            height: auto;
            max-height: 650px;
            overflow: auto;
        }
        #move-down {
            margin-top: 45px;
        }
        #move-up {
            margin-top: 33px;
        }
        #movie-text {
            color: black;
            font-size: 25px;
            font-family: 'Helvetica';
            text-shadow: 2px 1px grey;
        }
        #user-text {
            color: black;
            font-size: 15px;
            font-family: 'Helvetica';
            text-shadow: 1px 0px maroon;
        }
        .grow {
            display: inline-block;
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
            -webkit-transition-property: -webkit-transform;
            transition-property: transform;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            -webkit-transform: translateZ(0);
            -ms-transform: translateZ(0);
            transform: translateZ(0);
            box-shadow: 0 0 1px rgba(0, 0, 0, 0);
        }
            .grow:hover {
                -webkit-transform: scale(1.1);
                -ms-transform: scale(1.1);
                transform: scale(1.1);
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
                <a class="navbar-brand" href="#">Movie Reviews</a>
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
                    <li><a href="/main/add_movie">Add Movie</a></li>
                    <li><a href="/main/add">Add Review</a></li>
                    <li><a href="/main/logout">Log Out</a></li>
                </ul>
            </div>

        </div>
    </div>
   <!--/.NAVBAR END-->

      <section id="home" class="head-main-img">
        <div class="container">
          <div class="row text-center pad-row" >
            <div class="col-md-12">
              <h1> Movie Reviews </h1>
            </div>
          </div>
        </div>
      </section>
    <!--/.HEADING END-->

 <section id="port-sec">
       <div class="container">
           <div class="row pad-row" >

              <div class="col-md-6 col-sm-6">
               <h2 class="text-center">Recent Reviews</h2>
                <div class="jumbotron" id="height-control">

                <?php
                    foreach (array_reverse($reviews) as $review) {
                        echo '<a class="grow" id="movie-text" href="/main/show_single/'.$review['movie_id'].'"><h5 id="movie-text">'.$review['movie'].'</h5></a>';
                        $stars = $review['stars'];
                        $blackstar = '&#9733';
                        $whitestar = '&#9734';
                        echo  '<br>Rating: ';
                        for ($i=0; $i < $stars; $i++) {
                            echo $blackstar;
                        }
                        for ($i=0; $i < (5-$stars); $i++) {
                            echo $whitestar;
                        }
                        echo '<br>';
                        echo 'Author: <a class="grow" id="user-text" href="/main/show_user/'.$review['user_id'].'">'.$review['first_name']." ".$review['last_name'].'</a>';
                        echo '<br><h4><b>Review: </b>'.$review['review'].'</h4>';
                        'Posted On: <p>'.$review['created_at'].'</p><br>';
                    }
                 ?>

                </div>
              </div>

               <div class="col-md-6 col-sm-6">
                 <h2 class="text-center">Other Movies with Reviews</h2>
                    <div id="height-control">
                    <?php
                        $tmp = array();
                        foreach ($reviews as $movie) {
                            if (!in_array($movie['movie'], $tmp)) {
                                $unique[] = $movie;
                                $tmp[] = $movie['movie'];
                            }
                        }
                        foreach($unique as $value) {
                            ?>
                            <?php
                               echo '<ul class="portfolio-items col-3">
                                        <li class="portfolio-item">
                                            <div class="item-main">
                                                <div class="portfolio-image">
                                                    <img src="/assets/img/movie.png" height="100" width="100" alt="movie">
                                                    <div class="overlay">
                                                        <a class="btn btn-primary" id="move-down" href="/main/show_single/'.$value['movie_id'].'">View Review</a>
                                                    </div>
                                                </div>
                                                   <p class="padding text-center">'.$value['movie']. '</p>
                                            </div>
                                        </li>
                                    </ul>';
                        }
                    ?>
                    </div>
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
                  <h3 id="move-up">Evan's Movie Reviews</h3><br>
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
