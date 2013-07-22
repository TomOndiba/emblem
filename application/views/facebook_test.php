<?php $this->load->view('page-header'); ?>




    <div class="container">

        <?php $this->load->view('main-navigation', array('active'=>'galleries', 'menudata' => $menudata)); ?>
        
    </div>
    
    <div id="main-content" role="main" class="container"> 
        
        <div class="row mbl">
            <div class="span16">
                <div class="bar clearfix">
                    <span class="pull-left">Facebook authentication test page</span>
                </div>
            </div>
        </div><!-- end .row -->
        
        <div class="row mbl">
			<div>
			  <?php if(!$fb_data['me']): ?>
			  Please login with your FB account: <a href="<?php echo $fb_data['loginUrl']; ?>">login</a>
			  <?php else: ?>
			  <img src="https://graph.facebook.com/<?php echo $fb_data['uid']; ?>/picture" alt="" class="pic" />
			  <p>Hi <?php echo $fb_data['me']['name']; ?>,<br />
			    <a href="<?php echo site_url('topsecret'); ?>">You can access the top secret page</a> or <a href="<?php echo $fb_data['logoutUrl']; ?>">logout</a> </p>
			  <?php endif; ?>
			</div>
        </div>
    
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