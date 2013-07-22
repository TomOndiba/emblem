<?php
    $controller = $this->router->class;
    
    function setActive($nav, $controller)
    {
        if($nav == $controller)
            echo 'active';
    }

?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Missouri::<?php echo $this->router->class; ?></title>
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.css">
    <link rel="stylesheet" href="css/style.css">

	<!-- BOOKING SYSTEM -->
	<link rel="stylesheet" type="text/css" href="BookingCalendar/css/jquery.dop.BookingCalendar.css" />
	<link rel="stylesheet" type="text/css" href="BookingCalendar/css/style.css" />

  <!-- CSS: datatable -->
  <link rel="stylesheet" href="css/datatable/demo_table_jui.css">
  <!-- CSS: jQuery UI theme --> 
  <link rel="stylesheet" href="css/smoothness/jquery-ui-1.8.16.custom.css">
  <!-- CSS: date time picker jQuery ui add-on --> 
  <link rel="stylesheet" href="css/jquery-ui-timepicker-addon.css">
	<link rel="stylesheet" type="text/css" href="css/style1.css" />

	<link href="<?php echo base_url('css/smoothness/jquery-ui-1.8.16.custom.css'); ?>" rel="stylesheet">

    <script src="js/libs/modernizr-2.5.3-respond-1.1.0.min.js"></script>
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.2.min.js"><\/script>')</script>
</head>
<body id='page'>	
	     <ul class="cb-slideshow">
            <li><span>Image 01</span></li>
            <li><span>Image 02</span></li>
            <li><span>Image 03</span></li>
            <li><span>Image 04</span></li>
            <li><span>Image 05</span></li>
            <li><span>Image 06</span></li>
            <li><span>Image 07</span></li>
        </ul>
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <div class="navbar-wrapper">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li class="<?php setActive('home', $controller); ?>"><a href="home">HOME</a><span class="separator">/</span></li>
                            <li class="<?php setActive('gallery', $controller); ?>"><a href="gallery">GALLERY</a><span class="separator">/</span></li>
                            <li class="<?php setActive('themansion', $controller); ?>"><a href="themansion">THE MANSION</a><span class="separator">/</span></li>
                            <li class="<?php setActive('weather', $controller); ?>"><a href="weather">WEATHER</a><span class="separator">/</span></li>
                            <li class="<?php setActive('whattodo', $controller); ?>"><a href="whattodo">WHAT TO DO</a><span class="separator">/</span></li>
                            <li class="<?php setActive('localarea', $controller); ?>"><a href="localarea">LOCAL AREA</a><span class="separator">/</span></li>
                            <li class="<?php setActive('booking', $controller); ?>"><a href="booking">BOOKING</a><span class="separator">/</span></li>
                            <li class="<?php setActive('contact', $controller); ?>"><a href="contact">CONTACT</a></li>
                        </ul>
                        <div class="social-button">
                            <div class="fb-like" data-href="https://www.facebook.com/MissouriMansion" data-send="false" data-width="225" data-show-faces="false"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
    </div>
	
	
    <div class="container">
        <?php echo $content; ?>
    </div> <!-- /container -->
    
   <script>
   	$(document).ready(function() {
		if($.browser.webkit && !!window.chrome && $.browser.version < 537.1) {
		// do not use web GL
		} else {
		/*
		* Forces fullscreen CSS3 slideshow to use WebGL if browser is able to,
		* because it creates smoother transitions
		*/
		$(".slideshow li").addClass('use-web-gl');
		}
		});
   </script>

    <!-- scripts concatenated and minified via ant build script-->
    <script src="js/bootstrap/bootstrap.min.js"></script>
	
	
    <script src="js/script.js"></script>
    <!-- end scripts-->

    <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>

    <!-- FB script -->
    <div id="fb-root"></div>
    <script>
    window.fbAsyncInit = function() {
        FB.init({
        appId      : 'YOUR_APP_ID', // App ID
        channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel File
        status     : true, // check login status
        cookie     : true, // enable cookies to allow the server to access the session
        xfbml      : true  // parse XFBML
        });

        // Additional initialization code here
    };

    // Load the SDK Asynchronously
    (function(d){
        var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement('script'); js.id = id; js.async = true;
        js.src = "//connect.facebook.net/en_US/all.js";
        ref.parentNode.insertBefore(js, ref);
    }(document));
    </script>

</body>
</html>
