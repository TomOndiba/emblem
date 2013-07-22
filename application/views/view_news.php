<div class="row-fluid fittext" data-fit='50' data-max='20' data-min='8'>
	{{#each data}}   
	
	{{#if images}}
	<div class="span{{this.size}} box">
		<div class='span6 article' style="height:{{newsHeight}}">
	    	<div id='slideshow{{this.id}}' data-bg='{{#each images}}<?php echo base_url('img/news/thumbs/{{this.src}}') ?>,{{/each}}' class='slideshow'></div>
		</div>
		<div style="height:{{newsHeight}}" class='span6 newsContent article'>	
		
			<section class='date fittext' data-max='32' data-min='12' data-fit='{{dateSize this}}'>
				<span>{{this.date}}</span>
				<section class='shareBtn'>
					<span>Share</span>
					<section class='shareWindow'>
						<a class='shareLink fb' href="http://www.facebook.com/share.php?u=http://www.google.com" target="_blank">Facebook</a>
						<a class='shareLink' href="//pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" >Pinterest</a>
					</section>
				</section> 
			</section>
			
			<h3 class='fittext' data-max='32' data-min='12' data-fit='{{this.size}}'>
				<a title='read more' class='link' href='<?php echo base_url('{{language}}/{{activePage}}/{{this.id}}') ?>'>{{this.headline}}</a>
			</h3>
			<p class='text'>{{shortText this}}</p>		
			<a href='<?php echo base_url('{{language}}/{{activePage}}/{{this.id}}') ?>' class='blackBg link linkBtn'>Read More</a>
		</div>
	</div>
	
	{{else}}
	 <div class="span{{this.size}} box">
		<div style="height:{{newsHeight}}" class='span12 newsContent article'>	
		
			<section class='date fittext' data-max='32' data-min='12' data-fit='12'>
				<span>{{this.date}}</span>
				<section class='shareBtn'>
					<span>Share</span>
					<section class='shareWindow'>
						<a class='shareLink fb' href="http://www.facebook.com/share.php?u=http://www.google.com" onclick="return fb_like()" target="_blank">Facebook</a>
						<a class='shareLink' href="//pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" >Pinterest</a>
					</section>
				</section> 
			</section>
			
			<h3 class='fittext'  data-max='32' data-min='12' data-fit='12'>
				<a title='read more' class='link' href='<?php echo base_url('{{language}}/{{activePage}}/{{this.id}}') ?>'>{{this.headline}}</a>
			</h3>
			<p class='text'>{{shortText this}}</p>	
			<a href='<?php echo base_url('{{language}}/{{activePage}}/{{this.id}}') ?>' class='blackBg link linkBtn'>Read More</a>	
		</div>
	</div>	
	{{/if}}	
	
	{{/each}}	
</div>	 
