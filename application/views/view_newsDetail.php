<div class="row-fluid fittext newsHolder fullHeight" data-fit='50' data-max='20' data-min='8'>
	<div class='span12 fullHeight'>	
	
	{{#if data.images}}
		<div class='span6 fullHeight fixed fullHeight'>		
			<div id='slideshow{{this.id}}' class='slideshow fullHeight' data-bg='{{#each data.images}}<?php echo base_url('img/news/{{this.src}}') ?>,{{/each}}'></div>		
		</div>		
		<div class='span6 rightCol newsContent'>
		
			<section class='date fittext' data-max='32' data-min='12' data-fit='{{dateSize this}}'>
				<span>{{data.date}}</span>
				<a class='closePage link' href='<?php echo base_url('{{lang}}/{{page}}') ?>'>Close</a>
				<section class='shareBtn'>
					<span>Share</span>
					<section class='shareWindow'>
						<a class='shareLink fb' href="http://www.facebook.com/share.php?u=http://www.google.com" target="_blank">Facebook</a>
						<a class='shareLink' href="//pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" >Pinterest</a>
					</section>
				</section> 
			</section>
			
			<h1>{{data.headline}}</h1>
			<p>{{data.text}}</p>
		</div>
	{{else}}
	
		<div class='span12 newsContent'>
			
			<section class='date fittext' data-max='32' data-min='12' data-fit='{{dateSize this}}'>
				<span>{{data.date}}</span>
				<a class='closePage link' href='<?php echo base_url('{{lang}}/{{page}}') ?>'>Close</a>
				<section class='shareBtn'>
					<span>Share</span>
					<section class='shareWindow'>
						<a class='shareLink fb' href="http://www.facebook.com/share.php?u=http://www.google.com" target="_blank">Facebook</a>
						<a class='shareLink' href="//pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" >Pinterest</a>
					</section>
				</section> 
			</section>
			
			<h1>{{data.headline}}</h1>
			<p>{{data.text}}</p>
		</div>
	{{/if}}
		
	</div>
</div>	 
