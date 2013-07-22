<div class="navbar visible-phone navbar-inverse navbar-fixed-top">
	  <div class="navbar-inner transition">
	    <div class="container-fluid">
	      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="brand hidden-desktop" href="#">Emblem</a>
	      <div class="nav-collapse collapse">
	      	<section id='subnav'>
		      	<h1 class='pageInfo'>{{{this.pageInfo}}}</h1>
	      	</section>
	        <ul class="nav transition">
	         {{#each data}}   
	         	<li><a class="link" href="<?php echo base_url('{{language}}/{{this.title}}') ?>">{{this.title}}</a></li>
	         {{/each}}
	        </ul>
	      </div><!--/.nav-collapse -->
	    </div>
	  </div>
</div>

<div class='container hidden-phone'>
	<ul class='mainNav'>
	 {{#each mainNav}}   
	 	<li><a class="link" href="<?php echo base_url('{{language}}/{{this.title}}') ?>">{{this.title}}</a></li>
	 {{/each}}
	</ul>
	
	<ul class='subNav'>
	  {{#each subNav}}  
	  	<div data-page='{{this.name}}' class='sub'>
		  	{{#each this.pages}}
		  		<li><a class="link" href="<?php echo base_url('{{language}}/{{this.title}}') ?>">{{this.title}}</a></li>
		  	{{/each}}
	  	</div> 	 	
	  {{/each}}
	</ul>
	
</div>