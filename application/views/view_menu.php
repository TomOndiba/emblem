<div class='visible-phone'>
	<div id="header">
		<a href="#menu"></a>
		<h2 class='logoPurple'>Emblem</h2>	
		
		<ul class='langs'>
			<li><a href='#'>EN</a></li>
			<li><a href='#'>CZ</a></li>
			<li><a href='#'>RU</a></li>
		</ul>
		
	</div>

	<nav id="menu">
		<ul>	
			{{#each mainNav}}   
		 	<li>
		 		<a class='firstLevel'>{{this.title}}</a>
		 		{{#if this.subpages}}
		 		<ul>
			 		{{#each this.subpages}}
			 			<li><a href="#">{{menuText this}}</a></li>			
			 		{{/each}}
		 		</ul>
		 		{{/if}}
		 	</li>	 			 	
		 	{{/each}}
		</ul>
	</nav>
</div>	

<div class='hidden-phone'>

	<div class='bgWhite'>
		<div class='container hidden-phone'>
			<ul class='mainNav'>
			 {{#each mainNav}}   
			 	<li><a class="openSub" href="#">{{this.title}}</a></li>
			 {{/each}}
				 <ul class='langs'>
					<li><a href='#'>EN</a></li>
					<li><a href='#'>CZ</a></li>
					<li><a href='#'>RU</a></li>
				</ul>
			</ul>	
			
		</div>
	</div>
	
	<div class='subNav'>
		<div class='container hidden-phone'>
		  {{#each subNav}}  
		  	<ul data-page='{{this.name}}' class='sub'>
			  	{{#each this.pages}}
			  		<li><a class="link" href="<?php echo base_url('{{language}}/{{this.title}}') ?>">{{menuText this}}</a></li>
			  	{{/each}}
		  	</ul> 	 	
		  {{/each}}
		</div>
	</div>
	
</div>