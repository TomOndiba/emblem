
    
    <div id="main-content" role="main" class="container"> 

        <div id="login" class="row mbl">
			<div class="span16">
			<?php 
			
				/* just a test ... */
				if (isset($return_url)){
					echo '<p>'.$return_url.'</p>';
				} 
			?>
			
			<a href="<?php echo $login_url; ?>">login with facebook</a>
			
			
			
			<div id="authResponse">
			</div>
			
			</div>
        </div><!-- end #galleries -->
    
    </div><!-- end #main-content -->
    
</div>


<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.js"></script>
<script>window.jQuery || document.write("<script src='<?php echo base_url('js/libs/jquery-1.6.4.min.js'); ?>'>\x3C/script>")</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.5.3/jquery-ui.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url('js/plugins/jquery.lavaNavbar.js'); ?>"></script>

<script type="text/javascript">
    $().ready(function(){
        
        $('#navigation').lavaNavbar();
    })
</script>

<script>

  
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '255528254496024', // App ID
      channelURL : '//www.voovents.co.uk/test/channel.html', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      oauth      : true, // enable OAuth 2.0
      xfbml      : true  // parse XFBML
    });

  };

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     d.getElementsByTagName('head')[0].appendChild(js);
   }(document));
</script>


</body>
</html>