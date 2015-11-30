<?php

$additionalCSS = <<<EOD
    <link rel="stylesheet" href="./css/reset.css" rel="stylesheet" media="screen">
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css'>
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans:400,300'>
    <link rel="stylesheet" href="./css/style.css" rel="stylesheet" media="screen">

EOD;

$additionalJS = <<<EOD

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>

EOD;




$body = <<<EOD

  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
          <img  src="./images/litespritenav.png"/>
        </a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="#">Home</a></li>
          <li><a href="#press">Press</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="animated rubberBand">
            <a href="https://www.angelmd.co/startups/litesprite" target="_blank">
              <img src="https://www.angelmd.co/assets/visit_angelMD.png" alt="visit us on angelMD" width="167" height="33" border="0">
            </a>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>

  </nav>



  <div class="jumbotron">

    <div id="black">

    </div>
    <!--<video autoplay muted loop id="video-bg">
     <source src="http://www.istockphoto.com/video_passthrough/17839538/153/17839538.mp4" type="video/mp4">
</video> -->

    <div>
      <div class="container">
        <div class="col-md-12 inImage">
        <img id="imgDown" src="./images/litespritepara.png"/>


          <h3>By combining proven medical treatments with the joy of games,
            <br class="visible-lg " /> we build experiences that help people improve their health.</h3>
          <hr style="width:25%;text-align:left;margin:30px 0; border:2.5px solid #fff;" />
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <h3 class="subtitle">
      <h3>Here is a sneak peek at our first game.
        <br/>Sinasprite - it helps you manage stress.</h3>
    </h3>
  </div>





  <div class="container" id="main-wrapper">
    <div class="col-md-7 main-content">
      <section id="sinasprite" class="bg-1" data-speed="6" data-type="background">
        <!-- Begin trailer content -->
        <div class="container topedge">
          <div class="text-center videorow">
            <div class="embed-responsive embed-responsive-16by9 properSize">
              <iframe width="280" height="158" src="https://www.youtube.com/embed/2FDpm2GjZsQ" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </section>
      <!-- /. End White Box 0-->
    </div>
  </div>


  <div class="pagedown1">
    <div class="container" id="press">
      <section class="chap">
        <br/>
        <br/>
        <h1>Press</h1>
      </section>
      <div class="row">
        <div class="col-sm-6 patDown">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe width="640" height="360" src="https://www.youtube.com/embed/tJ29lb-ZXdA" frameborder="0" allowfullscreen></iframe>

          </div>
        </div>
        <div class="col-sm-6">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe width="640" height="360" src="https://www.youtube.com/embed/qo1LCNqcgBU" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="jumbotron2">
    <div id="black">
    </div>
    <!--<video autoplay muted loop id="video-bg">
     <source src="http://www.istockphoto.com/video_passthrough/17839538/153/17839538.mp4" type="video/mp4">
  </video> -->



  <div class="row col-lg-12">
  <div class= "container">
        <div class="col-md-3 col-md-4 text-center centerup ">
              <h1>The Law of Startups Podcast Interview</h1>
              <hr>
              <audio controls>
                <source src="http://static1.squarespace.com/static/54b5799be4b09314f3367ad2/t/55ba9bf5e4b00bb94e142244/1438293043422/Law+of+Startups+%2322+-+Swatee+Survee.mp3/original/Law+of+Startups+%2322+-+Swatee+Survee.mp3" type="audio/mp3">
              Your browser does not support the audio element.
              </audio>
      </div>


              <div class="col-md-3 col-md-4 text-center centerup">
                  <h1>Empowered Patient Radio Interview ft. Karen Jagoda</h1>
                  <hr>
                  <audio controls>
                    <source src="http://bit.ly/1vpvj8q" type="audio/mp3">
                  Your browser does not support the audio element.
                  </audio>
              </div>

          <div class="col-md-3 col-md-4 text-center centerup ">
              <h1>NPR KUOW 94.9 Radio Interview by Bill Radke</h1>
              <hr>
              <audio controls>
                <source src="http://cpa.ds.npr.org/kuow/audio/2014/10/20141021_br_litesprite.mp3" type="audio/mp3">
              Your browser does not support the audio element.
              </audio>
          </div>
  </div>
  </div>
  </div>

  <div class="pagedown2">
    <div class="container">
      <h1></h1>
    </div>
  </div>
<br/>
<br/>

<br/>
<div id="contact" class="container">
    <footer>
      <div class="container">© 2015 Your Company LLC. All rights reserved.
        <div class="row">
          <div class="col-md-4">
            <ul>
              <li><a href="mailto:socks@litesprite.com" title="socks@litesprite.com">socks@litesprite.com</a></li>
              <li><a href="tel://1-209-677-7483" title="Litesprite Business Phone number">209.677.7483</a></li>
              <li><a href="https://twitter.com/Litespritegames" title="Litesprite Games Twitter" target="_blank"><i class="fa fa-twitter"></i> Twitter</a></li>
              <li><a href="https://www.facebook.com/litesprite" title="Litesprite Facebook" target="_blank"><i class="fa fa-facebook"></i> Facebook</a></p>
                <p class="">Copyright &copy; <a href="https://www.litesprite.com">Litesprite.com</a>
              </li>
            </ul>
          </div>

          <div class="col-md-8"></div>

        </div>
      </div>
    </footer>
  </div>
EOD;
?>
