<?php $this->load->view('page-header'); ?>
    
    <div class="container">
        
        <?php $this->load->view('main-navigation', array('active'=>'galleries', 'menudata' => $menudata)); ?>
        
    </div>
    
    <div id="main-content" role="main" class="container"> 

        <div id="login" class="row mbl">
			<div class="span16">

				<?php if ($user_profile) { ?>
			      Your user profile is 
			      <pre>            
			        <?php print htmlspecialchars(print_r($user_profile, true)) ?>
			      </pre> 
			    <?php } else { ?>
			      <fb:login-button></fb:login-button>
			    <?php } ?>
			    
			    <?php if ($error) {echo '<pre>'.htmlspecialchars(print_r($e, true)).'</pre>';}  ?>

			</div>
        </div><!-- end #galleries -->
    
    </div><!-- end #main-content -->
    
</div>

<?php $this->load->view('html-footer'); ?>

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
      appId: '255528254496024', 
      cookie: true, 
      xfbml: true,
      oauth: true
    });
    FB.Event.subscribe('auth.login', function(response) {
      window.location.reload();
    });
    FB.Event.subscribe('auth.logout', function(response) {
      window.location.reload();
    });
  };
  (function() {
    var e = document.createElement('script'); e.async = true;
    e.src = document.location.protocol +
      '//connect.facebook.net/en_US/all.js';
    document.getElementById('fb-root').appendChild(e);
  }());
</script>

</body>
</html>