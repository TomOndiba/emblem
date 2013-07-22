<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<!--
Filip Arneric
 _             _   _______ _____ _____  _   _  _____ _   _ 
| |           | | / /_   _|_   _/  __ \| | | ||  ___| \ | |
| |__  _   _  | |/ /  | |   | | | /  \/| |_| || |__ |  \| |
| '_ \| | | | |    \  | |   | | | |    |  _  ||  __|| . ` |
| |_) | |_| | | |\  \_| |_  | | | \__/\| | | || |___| |\  |
|_.__/ \__, | \_| \_/\___/  \_/  \____/\_| |_/\____/\_| \_/
        __/ |                                              
       |___/                                                                                                                               
-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Emblem - <?php echo ucfirst($page); ?></title>
        
        <!-- open graph tags -->
        <meta property="og:title" content="<?php echo $title ?>"/>
		<meta property="og:type" content="website" />
		<meta property="og:site_name" content="Dreamhouse"/>
		<meta property="og:description" content="<?php echo $description ?>"> 
		<meta property="og:image" content="<?php echo $image ?>">
		<meta property="og:locale" content="en_us" />
        
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="<?php echo base_url('css/main.css')?>">            
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

		<!-- navigation -->
		<div id='navigation'></div>
		
		<!-- main -->
		<div id="main" class="<?php echo $page; ?>"></div>
		
        <script data-main="/~filip/emblem/js/load" src="<?php echo base_url('js/vendor/require.js')?>"></script>	
        
        
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>