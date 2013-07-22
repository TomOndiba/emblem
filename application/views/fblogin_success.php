<?php $this->load->view('page-header'); ?>
    
    <div class="container">
        
        <?php $this->load->view('main-navigation', array('active'=>'galleries', 'menudata' => $menudata)); ?>
        
    </div>
    
    <div id="main-content" role="main" class="container"> 

        <div id="login" class="row mbl">
			<div class="span16">	
			<?php if(isset($oauthToken)) : ?>
				<p>Success! oAuth tolken is:</p>
			    <p><?php echo $oauthToken; ?></p>
			<?php endif; ?>
			<?php if(isset($returnurl)) : ?>
				<p>Success! return url:</p>
			    <p><?php echo $returnurl; ?></p>
			<?php endif; ?>
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


</body>
</html>