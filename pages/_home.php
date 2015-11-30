<?php

$additionalCSS = <<<EOD
    <link href="./css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="./css/bootstrap-social.css" rel="stylesheet" media="screen">
    <link href="./css/bootstrap-litesprite.css" rel="stylesheet" media="screen">
EOD;

$additionalJS = <<<EOD
	<script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script type='text/javascript' src="./js/init.js"></script>
	<script type='text/javascript' src="./js/litesprite.js"></script>
EOD;




$body = <<<EOD
<!-- Wrap all page content here -->
<div id="wrap">
	<!-- position fix for Home Nav-->   
	<div id="home"></div>

<!-- Begin Header Section -->
<header class="masthead">
    <section class="intro">
        <div class="row row-sm-height">
            <div class="col-xs-1 col-sm-height"></div>
            <div class="col-xs-12 col-sm-4 col-sm-height col-middle">
                <div class="item">
                    <div class="content">
                        <img id="logoimg" class="" src="./images/litespritelogo.png"/>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-sm-height col-middle">
                <div class="item">
                    <div class="content introtag">
                        <h1>By combining proven medical treatments with the joy of games, we build experiences that help people improve their health.</h1>
                    </div>
                </div>
            </div>
            <div class="col-xs-1 col-sm-height"></div>
        </div>
<!-- Facebook Conversion Code for Socks -->
<script>(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', '6024454422256', {'value':'0.01','currency':'USD'}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6024454422256&amp;cd[value]=0.01&amp;cd[currency]=USD&amp;noscript=1" /></noscript>        
    </section>
</header>
<!-- End Header Section -->

<!-- Sticky navbar -->
<div id="nav" class="navbar navbar-custom navbar-inverse navbar-static-top" >
    <a id="navlogo" class="navbar-brand unstuck" rel="home" href="#" title="Litesprite"><img style="max-height:30px; " src="./images/litesprite.png"></a>  
    <div class="navbar-inner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/#home">Home</a></li>
                    <li><a href="/#sinasprite">Sinasprite</a></li>
                    <li><a href="/#press">Press</a></li>
                    <li><a href="/#awards">Awards</a></li>
                    <!--<li><a href="#sectionabout">About</a></li>-->
                    <li height="33"><a href="/#sectioncontact">Contact</a></li>
                </ul>
                <p class="navbar-text navbar-right"><a href="https://www.angelmd.co/startups/litesprite" target="_blank"><img src="https://www.angelmd.co/assets/visit_angelMD.png" alt="visit us on angelMD" width="167" height="33" border="0"></a></p>
            </div><!--/.nav-collapse -->
        </div><!--/.container -->
    </div><!--/.navbar-inner -->
</div><!--/.navbar -->
<!-- / Sticky navbar -->

<!-- position fix for Sinasprite Nav--> 
<section id="sinasprite" class="bg-1" data-speed="6" data-type="background">  
   <div class="section-header text-center">
        <h1>Sinasprite</h1>
    </div>
    <!-- Begin trailer content -->  
    <div class="container topedge">
        <div class="text-center videorow">
            <h1>Here is a sneak peek at our first game. <br/>Sinasprite - it helps you manage stress.</h1> 
            <div class="embed-responsive embed-responsive-16by9">   
            <iframe class="embed-responsive-item" width="560" height="315" src="//www.youtube.com/embed/2FDpm2GjZsQ?rel=0" frameborder="0" allowfullscreen class="video"></iframe>
            </div>
        </div>
    </div>
</section>
<!-- End Sinasprite content -->  

<!-- position fix for Sinasprite Nav--> 
<section id="action" class="bg-1 altcolor" data-speed="6" data-type="background">  
    <!-- Begin trailer content -->  
    <div class="container ">
        <div class="text-center">
            <br>
            <h1>Join our Beta!</h1>
            <br>
            Email Address: <input type='text' id='txtEmail'/>
            <input type='submit' id='btnValidate' Value='Subscribe' />
            <span id="loading" hidden><img height=30 width=30 src="./images/loader.gif"/></span>
            <div id="emailjoin"></div>
            <br>
        </div>
    </div>
</section>
<!-- End Sinasprite content --> 


<!-- position fix for press Nav-->  
<section id="press">
    <div class="section-header text-center">
        <h1>Press</h1>
    </div>
    <!-- Begin news content -->  
    <div class="container topedge">

        <div class="row text-center videorow">
            <h1>The Law of Startups Podcast Interview</h1>
            <audio controls>
              <source src="http://static1.squarespace.com/static/54b5799be4b09314f3367ad2/t/55ba9bf5e4b00bb94e142244/1438293043422/Law+of+Startups+%2322+-+Swatee+Survee.mp3/original/Law+of+Startups+%2322+-+Swatee+Survee.mp3" type="audio/mp3">
            Your browser does not support the audio element.
            </audio>
        </div>

        <div class="row text-center videorow">
            <h1>NPR KUOW 94.9 Radio Interview by Bill Radke</h1>
            <audio controls>
              <source src="http://cpa.ds.npr.org/kuow/audio/2014/10/20141021_br_litesprite.mp3" type="audio/mp3">
            Your browser does not support the audio element.
            </audio>
        </div>

        <div class="row text-center videorow">
            <h1>Empowered Patient Radio Interview with Karen Jagoda</h1>
            <audio controls>
              <source src="http://bit.ly/1vpvj8q" type="audio/mp3">
            Your browser does not support the audio element.
            </audio>
        </div>
        

        <div class="row text-center videorow embed-responsive embed-responsive-16by9">
            <h1>NBC King 5 Tech Talk features Litesprite</h1>
            <iframe class="embed-responsive-item" width="560" height="315" src="//www.youtube.com/embed/tJ29lb-ZXdA?rel=0" frameborder="0" allowfullscreen class="video"></iframe>
        </div>
        <div class="row text-center videorow embed-responsive embed-responsive-16by9">
            <h1>Kauffman Foundation</h1>    
            <iframe class="embed-responsive-item" width="560" height="315" src="//www.youtube.com/embed/qo1LCNqcgBU?rel=0" frameborder="0" allowfullscreen class="video"></iframe>
        </div>
    <div class="row">
    <div class="col-sm-offset-2 col-sm-10">
    <div class="col-sm-2 col-xs-6 text-center"><a href="http://www.seattletimes.com/business/technology/new-local-hub-examines-health-care-innovation/" target="_blank"><img class="logopix img-responsive" src="./images/seattletimes.png" alt="The Seattle Times"/>October 28, 2015</a></div>
    <div class="col-sm-2 col-xs-6 text-center"><a href="http://venturebeat.com/2015/09/16/litesprite-uses-mobile-games-to-treat-chronic-stress-problems/" target="_blank"><img class="logopix img-responsive" src="./images/venturebeat.png" alt="venturebeat"/>September 16, 2015</a></div>
    <div class="col-sm-2 col-xs-6 text-center"><a href="http://www.thelawofstartups.com/podcast/2015/7/30/episode-22-swatee-surve-ceo-and-founder-of-litesprite" target="_blank"><img class="logopix img-responsive" src="./images/lawofstartups.png" alt="The Law of Starups Podcast"/>July 30, 2015</a></div>
    <div class="col-sm-2 col-xs-6 text-center"><a href="http://425business.com/calling-all-startups-its-time-to-acquire-customers/" target="_blank"><img class="logopix img-responsive" src="./images/425.png" alt="425 Business"/>July 15, 2015</a></div>
    <div class="col-sm-2 col-xs-6 text-center"><a href="http://www.bizjournals.com/seattle/news/2015/03/20/founder-s-answer-to-tech-world-stress-play-a-game.html?page=all" target="_blank"><img class="logopix img-responsive" src="./images/psbj.png" alt="Puget Sound Business Journal"/>March 20, 2015</a></div>
    
    </div>
    <div class="col-sm-offset-2 col-sm-10">
    <div class="col-sm-2 col-xs-6 text-center"><a href="http://www.ibtimes.com/tinnitus-help-3d-printed-tissue-anxiety-relief-highlight-digital-health-startups-sxsw-1850358" target="_blank"><img class="logopix img-responsive" src="./images/ibt.png" alt="International Business Times"/>March 18, 2015</a></div>
    <div class="col-sm-2 col-xs-6 text-center"><a href="http://venturebeat.com/2015/03/07/health-app-developers-face-their-biggest-obstacle-privacy-regulations/" target="_blank"><img class="logopix img-responsive" src="./images/venturebeat.png" alt="venturebeat"/>March 7, 2015</a></div>
    <div class="col-sm-2 col-xs-6 text-center"><a href="http://www.seattlemet.com/news-and-profiles/articles/video-game-therapy-january-2015" target="_blank"><img class="logopix img-responsive" src="./images/seamet.png" alt="Seattle Met Magazine"/>January 5, 2015</a></div>
    <div class="col-sm-2 col-xs-6 text-center"><a href="http://issuu.com/casualconnect/docs/casualconnectwinter2014" target="_blank"><img class="logopix img-responsive" src="./images/cc.png" alt="Casual Connect December 2014"/>December 2014</a></div>
    <div class="col-sm-2 col-xs-6 text-center"><a href="http://kuow.org/post/feeling-blue-play-game-socks-fox" target="_blank"><img class="logopix img-responsive" src="./images/kuow.png" alt="KUOW 94.9"/>October 21, 2014</a></div>
    
    </div>
    <div class="col-sm-offset-2 col-sm-10">
    <div class="col-sm-2 col-xs-6 text-center"><a href="http://seriousgamesmarket.blogspot.com/2014/04/serious-games-as-alternative-to.html" target="_blank"><img class="logopix img-responsive" src="./images/sgm.png" alt="Serious Games"/>April 26, 2014</a></div>
    <div class="col-sm-2 col-xs-6 text-center"><a href="http://www.king5.com/story/tech/2014/08/05/13398102" target="_blank"><img class="logopix img-responsive" src="./images/king5.png" alt="King-5 News"/>March 12, 2014</a></div>
    <div class="col-sm-2 col-xs-6 text-center"><a href="http://www.geekwire.com/2014/northwest-social-venture-fund" target="_blank"><img class="logopix img-responsive" src="./images/geekwire.png" alt="geekwire"/>February 19, 2014</a></div>
    <div class="col-sm-2 col-xs-6 text-center"><a href="http://www.bizjournals.com/portland/blog/sbo/2014/02/instove-lite-sprite-win-fast-pitch.html" target="_blank"><img class="logopix img-responsive" src="./images/bpj.png" alt="geekwire"/>February 19, 2014</a></div>
    <div class="col-sm-2 col-xs-6 text-center"><a href="http://www.sustainablebusinessoregon.com/articles/2014/02/fast-pitch-portland-meet-9-startups.html" target="_blank"><img class="logopix img-responsive" src="./images/fastpitch.png" alt="Portland Fast Pitch"/>February 11, 2014</a></div>
    
    
    </div>
    <div class="col-sm-offset-2 col-sm-10">
    <div class="col-sm-2 col-xs-6 text-center"><a href="http://www.imedicalapps.com/2014/01/design-video-games-health-insights-rwj-foundation-award-winning-litesprite" target="_blank"><img class="logopix img-responsive" src="./images/imedicalapps.png" alt="iMedical Apps"/>January 24, 2014</a></div>
    <!--<div class="col-sm-2 col-xs-6 text-center"><a href="http://www.entrepreneurship.org/en/ID8/Seattle/DRIVERS/Too-Big-for-Their-Britches.aspx" target="_blank"><img class="logopix img-responsive" src="./images/kauffman.png" alt="Kauffman Foundation"/>JANUARY 21, 2014</a></div>-->
    <div class="col-sm-2 col-xs-6 text-center"><a href="http://www.marketplace.org/topics/tech/breaking-through-competitive-app-market" target="_blank"><img class="logopix img-responsive" src="./images/marketplace.png" alt="Marketplace"/>September 30, 2013</a></div>
    <div class="col-sm-2 col-xs-6 text-center"><a href="http://www.geekwire.com/2013/meet-class-win-reactor-interactive-media-accelerator" target="_blank"><img class="logopix img-responsive" src="./images/geekwire.png" alt="geekwire"/>July 17, 2013</a></div>
    <div class="col-sm-2 col-xs-6 text-center"><a href="http://www.medgadget.com/2013/07/behavioral-health-a-big-focus-at-games-for-health-conference.html" target="_blank"><img class="logopix img-responsive" src="./images/medgadget.png" alt="MedGadget"/>July 9, 2013</a></div>
    <div class="col-sm-2 col-xs-6 text-center"><a href="http://www.women2.com/female-founders-to-watch-seattle-edition" target="_blank"><img class="logopix img-responsive" src="./images/women20.png" alt="Women 2.0"/>April 5, 2013</a></div>
    
    </div>
    <div class="col-sm-offset-2 col-sm-10">
    <div class="col-sm-2 col-xs-6 text-center"><a href="http://www.geekwire.com/2013/litesprite" target="_blank"><img class="logopix img-responsive" src="./images/geekwire.png" alt="geekwire"/>April 10, 2013</a></div>
            </div>
        </div>
    </div>
</section>
<!-- End press content -->


<!-- position fix for press Nav-->
<section id="awards">
    <div class="section-header text-center">
        <h1>Awards</h1>
    </div>
    <!-- Begin news content -->
    <div class="container topedge">
        <div class="row text-center videorow">
            <h1>Recognition for Litesprite</h1>
        </div>
        <div class="row">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="col-sm-2 col-xs-6 text-center"><a href="http://sxsw.com/interactive/2015-sxsw-accelerator-finalists" target="_blank"><img class="logopix img-responsive" src="./images/sxswa.png" alt="2015 SXSW Accelerator® Finalist"/>Finalist : 2015 SXSW Accelerator</a></div>
                <div class="col-sm-2 col-xs-6 text-center"><a href="http://www.health2con.com/devchallenge/robert-wood-johnson-foundation-aligning-forces-games-to-generate-data-challenge/" target="_blank"><img class="logopix img-responsive" src="./images/rwjf.png" alt="Robert Wood Johnson Foundation"/>Winner: Robert Wood Johnson Foundation</a></div>
                <div class="col-sm-2 col-xs-6 text-center"><a href="http://socialventuresociety.org/2014/02/19/fast-pitch-finals-congrats-instove-litesprite" target="_blank"><img class="logopix img-responsive" src="./images/svs.png" alt="Social Venture Society"/>Winner: Social Venture Society</a></div>
                <div class="col-sm-2 col-xs-6 text-center"><a href="http://bigc.livestrong.org/#/project/e8b96332-4bc1-5574-5d08-31211af91558" target="_blank"><img class="logopix img-responsive" src="./images/bigc.png" alt="The Big C powered by LiveStrong"/>Finalist: Livestrong Big C Competition</a></div>
                <div class="col-sm-2 col-xs-6 text-center"><a href="http://exponential.singularityu.org/medicine/medy-awards/" target="_blank"><img class="logopix img-responsive" src="./images/exmed.png" alt="Singularity University/Exponential Medicine"/>Finalist: Singularity University/Exponential Medicine Medy Award</a></div>
                
            </div>
            <div class="col-sm-offset-2 col-sm-10">
                <div class="col-sm-2 col-xs-6 text-center"><a href="http://www.extremetechchallenge.com" target="_blank"><img class="logopix img-responsive" src="./images/xtc.png" alt="Extreme Tech Challenge"/>Finalist: Extreme Tech Challenge </a></div>
                <div class="col-sm-2 col-xs-6 text-center"><a href="http://www.socialventurepartners.org/seattle/2013/10/04/2013-semifinalists" target="_blank"><img class="logopix img-responsive" src="./images/svp.png" alt="SVP Seattle Fast Pitch"/>Semifinalist: SVP Seattle Fast Pitch</a></div>
                <div class="col-sm-2 col-xs-6 text-center"><a href="http://www.echoinggreen.org/blog/2014-echoing-green-fellowships-semi-finalists" target="_blank"><img class="logopix img-responsive" src="./images/eg.png" alt="Echoing Green Fellowship"/>Finalist: Echoing Green</a></div>
            </div>
        </div>
    </div>
    <p>&nbsp;</p>
</section>
<!-- End press content -->  

<!-- position fix for Contact Nav-->  
<section id="sectioncontact">
    <div class="section-header text-center">
        <h1>Contact Us</h1>
    </div>
    <!-- Begin Contact content -->  
    <div class="container topedge">

    <div class="continer">
        <div class="row text-center">
            <div class="col-sm-4"></div><!--/col-->
            <div class="col-sm-4 text-center">
                <h3>Litesprite, Inc.</h3>
                <p><a href="https://www.litesprite.com" title="Litesprite Website">www.litesprite.com</a></p>
                <p><a href="mailto:socks@litesprite.com" title="socks@litesprite.com">socks@litesprite.com</a></p>
                <p><a href="tel://1-209-677-7483" title="Litesprite Business Phone number">209.677.7483</a></p>
                <p><a href="https://twitter.com/Litespritegames" title="Litesprite Games Twitter" target="_blank"><i class="fa fa-twitter"></i> Twitter</a></p>
                <p><a href="https://www.facebook.com/litesprite" title="Litesprite Facebook" target="_blank"><i class="fa fa-facebook"></i> Facebook</a></p>
            </div><!--/col-->
            <div class="col-sm-4"></div><!--/col-->
        </div>
    </div>
    </div>
</section>
<!-- End Contact content -->  


</div><!--/wrap-->

<!--footer-->
<div id="footer">
  <div class="text-center">
    <p class="">Copyright &copy; <a href="https://www.litesprite.com">Litesprite.com</a></p>
  </div>
</div><!--/footer-->
EOD;
?>
