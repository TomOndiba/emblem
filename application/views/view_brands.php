<div class="row-fluid">

	{{#if subpage}}
	  {{! brand infowindow }}
	  <div class="span3 box black infoBox">
		  <div class='resizible' style='height:{{boxHeight}}'>
			<h1 class='fittext' data-fit='8'>{{this.model.brand}}</h1>
			<p class='fittext' data-fit='14'>{{this.model.description}}</p>
	
			<section data-fit='8' class='fitHolder fittext'>
				<a href='{{this.model.link}}' class='whiteBg' target='_blank'>Visit site</a>	
			</section>			
		  </div>	  	
	  </div>
	  
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
	{{else}}
	<div class="span3 box logoBox">
		  <div class='resizible' style='height:{{boxHeight}}'>
			  <div class='vCenter'>
			  	<div class='vCenterKid'>
				  	<h1 id='logoBox'>Dreamhouse</h1>
			  	</div>
		  	</div>	  
		  </div>	  	
	  </div>
	{{/if}}
		
	{{#each data}}  
	
	{{! specific brand grid view }}
      {{#if this.src}} 
	   <div class="span3 box">
	   	  <div id='slideshow{{this.id}}' style='height:{{boxHeight}}' class='slideshow resizible' data-bg='<?php echo base_url('img/{{activePage}}/{{this.folder}}/thumbs/{{this.src}}') ?>,'></div>
		  <a href='<?php echo base_url('{{language}}/{{activePage}}/{{this.folder}}/preview#image-{{this.order}}') ?>' class='hoverBox transition link'>
		  	<canvas class='hoverCanvas {{rotate}}' id='canvas{{this.id}}'></canvas>
		  	<div class='vCenter'>
			  	<div class='vCenterKid'>
				  	 <h4>{{this.title}}</h4>
			  	</div>
		  	</div>
		  </a>		  
	  </div>
	  {{/if}}	
	
	{{#if this.brand}}
	<div class="span3 box">
		  <div id='slideshow{{this.id}}' style='height:{{boxHeight}}' class='slideshow resizible' data-bg='{{#each thumbs}}<?php echo base_url('img/{{activePage}}/{{this.folder}}/{{this.src}}') ?>,{{/each}}'></div>
	  <a href='<?php echo base_url('{{language}}/{{activePage}}/{{this.folder}}') ?>' target="_blank" class='hoverBox transition link'>
	  	<canvas class='hoverCanvas {{rotate}}' id='canvas{{this.id}}'></canvas>
	  	<div class='vCenter'>
		  	<div class='vCenterKid'>
			  	 <h4>{{this.brand}}</h4>
			  	 <p class='brandDescription'>{{this.description}}</p>
		  	</div>
	  	</div>
	  </a>		  
	</div>
	{{/if}}
	
	{{/each}}
	
	{{fakeBoxes missing}}
</div>