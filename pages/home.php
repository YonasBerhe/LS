<?php

$additionalCSS = <<<EOD

    <link rel="stylesheet" href="./css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="./css/reset.css" rel="stylesheet" media="screen">
    <link rel='stylesheet prefetch' href='./css/animate.css'>
    <link rel="stylesheet" href="./css/litesprite.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="./css/owl.carousel.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="./css/owl.theme.css" rel="stylesheet" media="screen">


EOD;

$additionalJS = <<<EOD
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
  <script src="node_modules/smooth-scroll/dist/js/smooth-scroll.js"></script>
  <script src="./js/owl.carousel.min.js" type="text/javascript"></script>
  <script src="./js/customowl.js" type="text/javascript"></script>
  <script type='text/javascript' src="./js/litesprite.js"></script>


EOD;




$body = <<<EOD


<h1>Hell</h1>



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
          <h1 class="hitheir">Litesprite</h1>
        </a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a data-scroll href="#">Home</a></li>
          <li><a data-scroll href="#press">Press</a></li>
          <li><a data-scroll href="#contact">Contact</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="animated pullUp">
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>

  </nav>



  <div class="jumbotron">
    <!--<video autoplay muted loop id="video-bg">
     <source src="http://www.istockphoto.com/video_passthrough/17839538/153/17839538.mp4" type="video/mp4">
</video> -->

    <div>
      <div class="container">
        <div class="col-md-12">
        <img id="imgDown" class="animated fadeInUp _1" src="./images/litespritepara.png"/>
          <h3 id="colorText" class="animated fadeInUp _3">By combining proven medical treatments with the joy of games,
            <br class="visible-lg"/> we build experiences that help people improve their health.</h3>
          <hr style="width:25%;text-align:left;margin:30px 0; border:2.5px solid #fff;" />
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-8">
  </div>


  <div class="pagedown3">
    <div class="container">
      <section class="chap">
        <br/>
        <br/>
      </section>
      <div class="row">
        <div class="col-sm-6 patDown">
          <div class="embed-responsive embed-responsive-16by9">
          <iframe width="280" height="158" src="https://www.youtube.com/embed/2FDpm2GjZsQ" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
        <div class="col-sm-6">
            <h3 class="subtitle">
              <h3 id="colorUp">Here is a sneak peek at our first game.
              <br/>

                Sinasprite - it helps you manage stress.</h3>
            </h3>
          </div>

          <section id="action"  data-speed="6" data-type="background">
              <!-- Begin trailer content -->
              <div class="container">
                  <div class="text-center">
                      <br>
                      <h1>Join our Beta!</h1>
                      <br>
                      Email Address: <input type='text' id='txtEmail'/>
                      <input type='submit' id='btnValidate' Value='Subscribe' />
                      <span  hidden><img height=30 width=30 src="./images/loader.gif"/></span>
                      <div></div>
                      <br>
                  </div>
              </div>
          </section>


      </div>
    </div>
  </div>



  <section id="press">

  <div class="pagedown1">
    <div class="container">
      <section class="chap">
        <br/>
        <br/>
        <h1 class="animated">Press</h1>
        <hr>
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
  </section>

  <div id="owl-demo">

    <div class="item"><a href="http://www.seattletimes.com/business/technology/new-local-hub-examines-health-care-innovation/" target="_blank"><img class="logopix img-responsive" src="./images/seattletimes.png" alt="The Seattle Times"/></a></div>
    <div class="item"><a href="http://venturebeat.com/2015/09/16/litesprite-uses-mobile-games-to-treat-chronic-stress-problems/" target="_blank"><img class="logopix img-responsive" src="./images/venturebeat.png" alt="venturebeat"/></a></div>
    <div class="item"><a href="http://www.thelawofstartups.com/podcast/2015/7/30/episode-22-swatee-surve-ceo-and-founder-of-litesprite" target="_blank"><img class="logopix img-responsive" src="./images/lawofstartups.png" alt="The Law of Starups Podcast"/></a></div>
    <div class="item"><a href="http://425business.com/calling-all-startups-its-time-to-acquire-customers/" target="_blank"><img class="logopix img-responsive" src="./images/425.png" alt="425 Business"/></a></div>
    <div class="item"><a href="http://www.bizjournals.com/seattle/news/2015/03/20/founder-s-answer-to-tech-world-stress-play-a-game.html?page=all" target="_blank"><img class="logopix img-responsive" src="./images/psbj.png" alt="Puget Sound Business Journal"/></a></div>
    <div class="item"><a href="http://www.seattletimes.com/business/technology/new-local-hub-examines-health-care-innovation/" target="_blank"><img class="logopix img-responsive" src="./images/seattletimes.png" alt="The Seattle Times"/></div>
    <div class="item"><a href="http://venturebeat.com/2015/09/16/litesprite-uses-mobile-games-to-treat-chronic-stress-problems/" target="_blank"><img class="logopix img-responsive" src="./images/venturebeat.png" alt="venturebeat"/></div>
    <div class="item"><a href="http://www.thelawofstartups.com/podcast/2015/7/30/episode-22-swatee-surve-ceo-and-founder-of-litesprite" target="_blank"><img class="logopix img-responsive" src="./images/lawofstartups.png" alt="The Law of Starups Podcast"/></div>


      <div class="item"><a href="http://www.ibtimes.com/tinnitus-help-3d-printed-tissue-anxiety-relief-highlight-digital-health-startups-sxsw-1850358" target="_blank"><img class="logopix img-responsive" src="./images/ibt.png" alt="International Business Times"/></a></div>
      <div class="item"><a href="http://venturebeat.com/2015/03/07/health-app-developers-face-their-biggest-obstacle-privacy-regulations/" target="_blank"><img class="logopix img-responsive" src="./images/venturebeat.png" alt="venturebeat"/></a></div>
      <div class="item"><a href="http://www.seattlemet.com/news-and-profiles/articles/video-game-therapy-january-2015" target="_blank"><img class="logopix img-responsive" src="./images/seamet.png" alt="Seattle Met Magazine"/></a></div>
      <div class="item"><a href="http://issuu.com/casualconnect/docs/casualconnectwinter2014" target="_blank"><img class="logopix img-responsive" src="./images/cc.png" alt="Casual Connect December 2014"/></a></div>
      <div class="item"><a href="http://kuow.org/post/feeling-blue-play-game-socks-fox" target="_blank"><img class="logopix img-responsive" src="./images/kuow.png" alt="KUOW 94.9"/></a></div>


      <div class="item"><a href="http://seriousgamesmarket.blogspot.com/2014/04/serious-games-as-alternative-to.html" target="_blank"><img class="logopix img-responsive" src="./images/sgm.png" alt="Serious Games"/></a></div>
      <div class="item"><a href="http://www.king5.com/story/tech/2014/08/05/13398102" target="_blank"><img class="logopix img-responsive" src="./images/king5.png" alt="King-5 News"/></a></div>
      <div class="item"><a href="http://www.geekwire.com/2014/northwest-social-venture-fund" target="_blank"><img class="logopix img-responsive" src="./images/geekwire.png" alt="geekwire"/></a></div>
      <div class="item"><a href="http://www.bizjournals.com/portland/blog/sbo/2014/02/instove-lite-sprite-win-fast-pitch.html" target="_blank"><img class="logopix img-responsive" src="./images/bpj.png" alt="geekwire"/></a></div>
      <div class="item"><a href="http://www.sustainablebusinessoregon.com/articles/2014/02/fast-pitch-portland-meet-9-startups.html" target="_blank"><img class="logopix img-responsive" src="./images/fastpitch.png" alt="Portland Fast Pitch"/></a></div>


  </div>


  </div>


  <div class="jumbotron2">

    <!--<video autoplay muted loop id="video-bg">
     <source src="http://www.istockphoto.com/video_passthrough/17839538/153/17839538.mp4" type="video/mp4">
  </video> -->



  <div class="row">
  <div class= "container">
        <div class="col-md-3 text-center center-Up">
              <h1>The Law of Startups the full Podcast Interview</h1>
              <hr style="text-align:left;margin:30px 0; border:2.5px solid #fff;">
              <audio controls>
                <source src="http://static1.squarespace.com/static/54b5799be4b09314f3367ad2/t/55ba9bf5e4b00bb94e142244/1438293043422/Law+of+Startups+%2322+-+Swatee+Survee.mp3/original/Law+of+Startups+%2322+-+Swatee+Survee.mp3" type="audio/mp3">
              Your browser does not support the audio element.
              </audio>
      </div>


              <div class="col-md-3 text-center center-Up">
                  <h1>Empowered Patient Radio Interview ft. Karen Jagoda</h1>
                  <hr style="text-align:left;margin:30px 0; border:2.5px solid #fff;">
                  <audio controls>
                    <source src="http://bit.ly/1vpvj8q" type="audio/mp3">
                  Your browser does not support the audio element.
                  </audio>
              </div>

          <div class="col-md-3 text-center center-Up ">
              <h1>NPR KUOW 94.9 Radio Interview by Bill Radke</h1>
                  <hr style="text-align:left;margin:30px 0; border:2.5px solid #fff;">
              <audio controls>
                <source src="http://cpa.ds.npr.org/kuow/audio/2014/10/20141021_br_litesprite.mp3" type="audio/mp3">
              Your browser does not support the audio element.
              </audio>
          </div>
  </div>
  </div>
  </div>
<section id="contact">
  <div class="pagedown2">
    <div class="container">
    <div class="row">
      <div class="col-md-4">
        <ul class="touchUp">
          <li><a href="mailto:socks@litesprite.com" title="socks@litesprite.com">socks@litesprite.com</a></li>
          <li><a href="tel://1-209-677-7483" title="Litesprite Business Phone number">209.677.7483</a></li>
          <li><a href="https://twitter.com/Litespritegames" title="Litesprite Games Twitter" target="_blank"><i class="fa fa-twitter"></i> Twitter</a></li>
          <li><a href="https://www.facebook.com/litesprite" title="Litesprite Facebook" target="_blank"><i class="fa fa-facebook"></i> Facebook</a></p>

          </li>
        </ul>
      </div>
      <div class="col-md-8"><

    </div>
  </div>
  <script type='text/javascript' src="./js/init.js"></script>
    </div>
  </div>
  </section>

  <footer>
  <p class="">Copyright &copy; <a href="https://www.litesprite.com">Litesprite.com</a>
  </footer>

EOD;



?>
