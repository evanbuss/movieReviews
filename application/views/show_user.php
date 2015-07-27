<?php
    // var_dump($user);
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
        #move-up {
            margin-top: 7px;
        }
        .background-style {
            background: -webkit-linear-gradient(bottom, black, #4D4D4D, #4D4D4D, black);
            color: white;
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
                          <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $users['first_name']." ".$users['last_name'] ?></a>
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
                    <h1><?= $user['first_name']." ".$user['last_name'] ?></h1>
                </div>
            </div>
        </div>
    </section>
    <!-- User Info / Posted Reiews -->
    <section>
        <div class="container">
            <div class="col-md-6">
                <h2 class="text-center">User Info</h2>
                <p>Name: <?= $user['first_name']." ".$user['last_name'] ?></p>
                <p>Email: <?= $user['email']?></p>
                <p>Created At: <?= $user['created_at'] ?></p>

            </div>
            <div class="col-md-6">
                <h3 class="text-center"> Posted reviews on the following movies:</h3>
                <?php
                    $tmp = array();
                    foreach ($user_info as $movie) {
                        if (!in_array($movie['movie'], $tmp)) {
                            $unique[] = $movie;
                            $tmp[] = $movie['movie'];
                        }
                    }
                        foreach($unique as $value) {
                            echo "<p class='text-center'>".$value['movie']."</p>";
                        }
                ?>
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
     <section id="clients"  class="background-style">
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
