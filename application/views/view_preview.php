<div class='container'>
    <section class='row' id='masonry'>
        {{#each data}}         		 	
    		 <div class='span12 parallax mediaBox'>
                 <div class="flip-container">
					<div class="flipper">
						<div class="front nopadding  {{#if video}} fitvid {{/if}}{{#unless video}} liquid {{/unless}} ">
							 {{#if video}}
							 <iframe width="560" height="315" src="http://www.youtube.com/embed/{{this.video}}" frameborder="0" allowfullscreen></iframe>
							 {{/if}}
							 {{#unless video}}
							<img style="width:100%!important" src='<?php echo base_url("img/works/{{this.src}}") ?>' />
							 {{/unless}}
						</div>
						<div class="back">
							{{backBoxes 24}}
						</div>
					</div>
				</div>
			</div>						 													 
		 {{/each}}
		 
    </section>
</div>