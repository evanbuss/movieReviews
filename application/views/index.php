<?php
    // var_dump($reviews);
    // var_dump($reviews[1]);
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
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <style>
        .background-style {
            background: -webkit-linear-gradient(bottom, black, #4D4D4D, #4D4D4D, black);
            color: white;
        }
        #move-up {
            margin-top: 7px;
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
                <a class="navbar-brand" href="#">Evan's Movie Reviews</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.html">HOME</a></li>
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
                    <h1> Evan's Movie Reviews </h1>
                </div>
            </div>
        </div>
    </section>

   <section>
     <div class="jumbotron">
       <div class="container-fluid">

         <div class="col-md-4">
            <h2 class="text-center">Log In</h2>
             <form class="form-horizontal" action='/main/login' method='post'>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Log in</button>
                    <input type='hidden' name='action' value='login'>
                  </div>
                </div>
              </form>
         </div>
        <div class="col-md-2"></div> <!-- spacer -->
         <div class="col-md-6">
            <h2 class="text-center">Register</h2>
             <form class="form-horizontal" action='/main/register' method='post'>
                <div class="form-group">
                  <label class="col-sm-3 control-label">First Name</label>
                  <div class="col-sm-9">
                    <input type="text" name="first_name" class="form-control" placeholder="First Name">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Last Name</label>
                  <div class="col-sm-9">
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Password</label>
                  <div class="col-sm-9">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Confirm</label>
                  <div class="col-sm-9">
                    <input type="password" name="confirm" class="form-control" placeholder="Confirm Password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" name="action" class="btn btn-default">Register</button>
                  </div>
                </div>
              </form>
         </div>

       </div>
     </div>
   </section>

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
        <section id="just-intro">
            <div class="container">

              <h1 class="text-center">Recent Movie Reviews</h1>
                <div class="row text-center pad-row">
                    <div class="col-md-4  col-sm-4">
                        <i class="fa fa-desktop fa-5x"></i>
                        <h4><?= $reviews[0]['movie'] ?></h4>
                        <p><?= $reviews[0]['director'] ?></p>
                        <p>Stars: <?= $reviews[0]['stars'] ?></p>
                    </div>
                    <div class="col-md-4  col-sm-4">
                        <i class="fa fa-desktop fa-5x"></i>
                        <h4><?= $reviews[1]['movie'] ?></h4>
                        <p><?= $reviews[1]['director'] ?></p>
                        <p>Stars: <?= $reviews[1]['stars'] ?></p>
                    </div>
                    <div class="col-md-4  col-sm-4">
                        <i class="fa fa-desktop fa-5x"></i>
                        <h4><?= $reviews[2]['movie'] ?></h4>
                        <p><?= $reviews[2]['director'] ?></p>
                        <p>Stars: <?= $reviews[2]['stars'] ?></p>
                    </div>
                </div>

            </div>
        </section>

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
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/plugins/bootstrap.js"></script>
  <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
