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

      {{#if subpage}} 
		<div class="span3 box black infoBox resizible" style='height:{{boxHeight}}'>
		  	<div class='vCenter'>
			  	<div class='vCenterKid padding'>
				  	 <h1 class='fittext' data-fit='8'>{{model.name}}</h1>
				  	 <p class="brandDescription">{{model.description}}</p>
			  	</div>
		  	</div>	  
		</div>
	  {{else}}
	  <div class="span3 box logoBox black">
		  <div class='resizible' style='height:{{boxHeight}}'>
			  <div class='vCenter'>
			  	<div class='vCenterKid'>
				  	<h1 id='logoBoxAnim'>Dreamhouse</h1>
			  	</div>
		  	</div>	  
		  </div>	  	
	  </div>
	  {{/if}}	
	
	 {{#each data}}   
	 
{{! main grid view }}
	 	{{#if this.category}} 
		  <div class="span3 box">
			  <div id='slideshow{{this.id}}' class='slideshow resizible' style='height:{{boxHeight}}' data-bg='{{#each thumbs}}<?php echo base_url('img/{{activePage}}/{{this.folder}}/thumbs/{{this.src}}') ?>,{{/each}}'></div>
			  <a href='<?php echo base_url('{{language}}/{{activePage}}/{{this.folder}}') ?>' class='hoverBox transition link'>
			   	<section class='canvasHolder'>
				   	<canvas class='hoverCanvas' id='canvas{{this.id}}'></canvas>
			   	</section>		  
			  	<div class='vCenter onTop'>
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
			  	<section class='canvasHolder'>
				   	<canvas class='hoverCanvas' id='canvas{{this.id}}'></canvas>
			   	</section>	
			  	<div class='vCenter onTop'>
				  	<div class='vCenterKid'>
					  	 <h4>{{this.title}}</h4>
				  	</div>
			  	</div>
			  </a>	
		  </div>
		  {{/if}}	
		  
	 {{/each}}	
	 
	 {{fakeBoxes missing}}
	 
</div> 