{{#if subpage}}
	<div id='controls'>
		<section class='shareBtn'>
			<span>Share</span>
			<section class='shareWindow'>
				<a class='shareLink fb' href="http://www.facebook.com/share.php?u=http://www.google.com" target="_blank">Facebook</a>
				<a class='shareLink' href="//pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" >Pinterest</a>
			</section>
		</section> 	
		<a class='closePage link' href='<?php echo base_url('{{lang}}/{{page}}') ?>'>Close</a>
	</div>
{{/if}}


<div id='scroller' class="row-fluid">
	 {{#each data}}   
	 
{{! main grid view }}
	 	{{#if this.category}} 
		  <div class="span3 box">
			  <div id='slideshow{{this.id}}' class='slideshow resizible' style='height:{{boxHeight}}' data-bg='{{#each objects}}<?php echo base_url('img/{{activePage}}/{{this.folder}}/thumbs/{{this.src}}') ?>,{{/each}}'></div>
			  <a href='<?php echo base_url('{{language}}/{{activePage}}/{{this.folder}}') ?>' class='hoverBox transition link'>
			  	<div class='vCenter'>
				  	<div class='vCenterKid'>
					  	 <h4>{{this.name}}</h4>
				  	</div>
			  	</div>		 
			  </a>		  
		  </div>
		  {{/if}}	
	  
{{! specific artist/designer grid view }}
	      {{#if this.src}} 
		   <div class="span3 box">		  
		   	  <div id='slideshow{{this.id}}' style='height:{{boxHeight}}' class='slideshow resizible' data-bg='<?php echo base_url('img/{{activePage}}/{{this.folder}}/thumbs/{{this.src}}') ?>,'></div>  
		
 			 <a href='<?php echo base_url('{{language}}/{{activePage}}/{{this.folder}}/preview#image-{{this.order}}') ?>' class='hoverBox transition link'>
			  	<div class='vCenter'>
				  	<div class='vCenterKid'>
					  	 <h4>{{this.title}}</h4>
				  	</div>
			  	</div>
			  </a>	
		  </div>
		  {{/if}}	
		  
	 {{/each}}	
</div> 