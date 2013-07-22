<html>
	<head></head>
	<body>
		<div id="placeholder">Loading...</div>
		
		
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.2.min.js"><\/script>')</script>
		
	<div id="fb-root"></div>
	<script type="text/javascript"> 
	  var user;
	function addComment(){
		console.log(user.id);
		
		$.ajax({
    		type: "POST",
	        url: "index.php/ajax/post_comment",
	        dataType: "json",
	        data: "uid="+user.id+"&comment="+user.email+"&email="+user.email+"&name="+user.name,
	        cache:false,
	        success: 
	          function(data){
	           console.log(data);
	          }
    	});
			  
	}
	

	function loadCommentBox(){
		   var form = "<textarea placeholder='write your comment here'></textarea>";
		   form += "<a href='#' onclick='addComment()'>OK</a>";
		   $('#placeholder').html('').append(form);
	}

    var renderFbLogin = function(){
    	var loginbtn = $('<div id="fb-login">').html('<center><span class="bar" style="color:#333;background:white;">Too add your comments you need to login:</span></center><br/><center><fb:login-button scope="email, publish_stream">Login with Facebook</fb:login-button></center>');
	    $('#placeholder').html('').append(loginbtn);
	    setTimeout(function(){
	    	FB.XFBML.parse(document.getElementById('fb-login'));
	    },100);
    };
  
    var renderAdditionalPermissionButton = function(){
    	
    	var loginbtn = $('<div id="fb-login">').html('<a href="#" id="additional-permission" style="margin-left:20px;">login with facebook</a>');
    	$('#placeholder').html('').append(loginbtn);
		var addLoginButton = $('#additional-permission', loginbtn);
		addLoginButton.click(function(){
			FB.login(function(response) {
			   if (response.authResponse) {
			     FB.api('/me', function(response) {
				    user = response;
				    $.post(
				   		'<?php echo base_url('fblog'); ?>',
				   		{ 'uid': user.id, 'email': user.email },
				   		function(data){
				   			if(data.success){
				   				if (data.postToWall){
				   					postToWall();
				   				}
				   			} else {
				   				console.log('error stativa!');
				   			}
				   		}, 'json');
				 });
			   } else {
			   	
			   }
			 }, {scope: 'email, publish_stream'});
		});
   }
   
   function postToWall() {
        var params = {};
        params['message'] = ' I just signed up at www.voovents.co.uk, you can do the same to get exclusive updates, photos and guestlist at your local Voovents party.';
        params['name'] = 'Voovents';
        params['link'] = 'http://www.voovents.co.uk';
  		params['picture'] = 'http://www.wowphonefinder.com/voov/img/css/logo.png';
        params['description'] = 'View the latest events and pictures at your local voovent party - To do the same visit www.voovents.com!';
        
        FB.api('/me/feed', 'post', params, function(response) {
          if (!response || response.error) {
            alert('Error occured');
          } else {
          	
          }
        });
	}
    

  var connected = false;           
  window.fbAsyncInit = function() {
    FB.init({
      appId: '386006618119254', 
      cookie: true, 
      xfbml: true,
      oauth: true
    });

    FB.getLoginStatus(function(response) {
	  if (response.status === 'connected') {	  	
	  	connected = true;
	    // the user is logged in and connected to your app, and response.authResponse supplies the user’s ID, 
	    // a valid access token, a signed request, and the time the access token and signed request each expire
	    var uid = response.authResponse.userID;
	    var accessToken = response.authResponse.accessToken;
	    	  	
	    FB.api('/me', function(response) {
	  	    user = response;
		
			if (typeof user.email === "undefined") {
				renderAdditionalPermissionButton();
				return;
			} 
		   	$.post(
		   		'<?php echo base_url('fblog'); ?>',
		   		{ 'uid': uid, 'email': user.email },
		   		function(data){
		   			loadCommentBox();
		   			if(data.success){
	   					if (data.postToWall){
		   					postToWall();
		   				}
		   			} else {
		   			}
		   		}, 'json');
	  		
		});
		

	  
	  } else if (response.status === 'not_authorized') {
	  	
	    // the user is logged in to Facebook, 
	    // but not connected to the app
	    // show the login button
	    console.log('not_authorized');
	    connected = false;
	    renderFbLogin();
	    
	  } else {
	    // the user isn't even logged in to Facebook.
	    // show the fb login button
	    console.log('unknown');
	    connected = false;
	    renderFbLogin();
	    
	  }
	});
    
    
    FB.Event.subscribe('auth.login', function(response) {
    	if (!connected) {
    		connected = true;
	    	var uid = response.authResponse.userID;
		    var accessToken = response.authResponse.accessToken;	  	
		    FB.api('/me', function(response) {
		  		var user = response;				
							  
			   	$.post(
			   		'<?php echo base_url('fblog'); ?>',
			   		{ 'uid': uid, 'email': user.email },
			   		function(data){
			   			if(data.success){
				   			console.log(data);
		   					if (data.postToWall){
		   						console.log(data.postToWall);
		   						console.log('1231321');
			   					postToWall();
			   				}
			   				loadCommentBox();
			   			}
			   		}, 'json');
			});
		}
    	
    });
    
    FB.Event.subscribe('auth.logout', function(response) {
    	connected = false;
		renderFbLogin();
    });
    
  };
  
  (function() {
    var e = document.createElement('script'); e.async = true;
    e.src = document.location.protocol +
      '//connect.facebook.net/en_US/all.js';
    document.getElementById('fb-root').appendChild(e);
  }()); 
  
</script>