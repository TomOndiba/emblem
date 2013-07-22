		<div id='comments'>
			<div id='commentph'>
				<h2 class='orange middletext'><?php echo lang("room.comments"); ?></h2>
				<div id="wrapper">
					<div id="scroller">
						<?php if(count($comments)>0){ foreach($comments as $com){ ?>
						<div class='komentarph'>
							<p class='orange name'><?php echo $com->name; ?></p>
							<p class='komentar'><?php echo $com->comment; ?></p>
						</div>
						<?php } } ?>
					</div>
				</div>
				<div id='commentBtn'>
					<p><?php echo lang("room.leave"); ?></p>
					<img class='ring btnRotate1' src='<?php echo base_url('img/menu/commentbtn.png')?>' />
					<img class='ring btnRotate2' style="z-index: 3" src='<?php echo base_url('img/menu/orangeComment.png')?>' />
				</div>
			</div>
			
			<div id='leaveComment'>
				<div id='lc1' class='lc vCenter'>
					<div class='vCenterKid'>
						<h2 class='orange'><?php echo lang('sliders.fbmsg'); ?></h2>
						<div id="placeholder">Loading...</div>
					</div>
				</div>
				
				<div id='lc2' class='lc'>
					<div class='vCenter'>
						<div class="vCenterKid renderForm"></div>
					</div>
				</div>
				
				<div id='lc3' class='lc'>
					<div class='vCenter'>
						<div class="vCenterKid">
							<h2 class="orange"><?php echo lang('sliders.thank'); ?><span id='uName'></span>,<br/><?php echo lang('sliders.thank2'); ?></h2>
						</div>
					</div>
				</div>
				
				<div id='sscalering2' class='scaleFix2'>
					<img class='keepRotating ring' src='<?php echo base_url('img/sliders/ring2/orange1.png')?>' />
					<img class='keepRotatingReverse ring' src='<?php echo base_url('img/sliders/ring2/orange2.png')?>' />
				</div>
				
				<div id='sscalering1' class='scaleFix1'>
					<img class='keepRotating ring' src='<?php echo base_url('img/menu/ring5/orange.png')?>' />
					<img class='keepRotatingReverse ring' src='<?php echo base_url('img/sliders/ring/brn.png')?>' />
				</div>
			</div>
			
			<div id='commentsBtn' class='vCenter'>
				<p class='vCenterKid'><?php echo lang("room.comments"); ?></p>
				<img class='ring btnRotate1' src='<?php echo base_url('img/menu/info/black.png')?>' />
			</div>
		</div>