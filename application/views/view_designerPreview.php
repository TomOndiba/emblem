<div id='controls'>
	<section class='shareBtn'>
		<span>Share</span>
		<section class='shareWindow'>
			<a class='shareLink fb' href="http://www.facebook.com/share.php?u=http://www.google.com" target="_blank">Facebook</a>
			<a class='shareLink' href="//pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" >Pinterest</a>
		</section>
	</section> 	
	<a class='closePage link' href='<?php echo base_url('{{lang}}/{{page}}/{{subpage}}') ?>'>Close</a>
</div>

<div id="full-width-slider" class="royalSlider">
 {{#each data}}  
	  <div class="rsContent">
	    <img class="rsImg" src="<?php echo base_url('img/{{activePage}}/{{this.folder}}/{{this.src}}') ?>" alt="" />
	    <div class="infoBlock infoBlockLeftBlack rsABlock movingBlock" data-fade-effect="" data-move-offset="10" data-move-effect="bottom" data-speed="200">
	      <h4 class='movingH'>{{{this.title}}}</h4>
	    </div>
	  </div>  	
 {{/each}}	  
</div>