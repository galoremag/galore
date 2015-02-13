<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<head>
		<title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0"><!-- Remove if you're not building a responsive site. (But then why would you do such a thing?) -->
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico"/>

		<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

		<!-- basic stylesheet -->
		<link rel="stylesheet" href="<?php echo content_url(); ?>/plugins/new-royalslider/lib/royalslider/royalslider.css">

		<!-- skin stylesheet (change it if you use another) -->
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/rs-galore-skin/rs-galore.css"> 

		<!-- Perfect Scrollbar CSS -->
		<link rel='stylesheet' href='<?php echo get_stylesheet_directory_uri(); ?>/css/perfect-scrollbar.min.css' />

		<!-- Plugin requires jQuery 1.8+  -->
		<!-- If you already have jQuery on your page, you shouldn't include it second time. -->
		<script src='<?php echo content_url(); ?>/plugins/new-royalslider/lib/royalslider/jquery-1.7.2.min.js'></script>
		<script type='application/javascript' src='<?php echo content_url(); ?>/themes/galore/bower_components/jquery/dist/jquery.min.js'></script>

		<!-- BOOSTRAP -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

		<?php wp_head(); ?>

		<!-- Perfect Scrollbar JS -->
		<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/perfect-scrollbar.min.js'></script>

		<!-- Main slider JS script file --> 
		<script type='application/javascript' src='<?php echo content_url(); ?>/themes/galore/js/site.js'></script>

		<script type="text/javascript" src="//google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
		<script type="text/javascript" src="//db.tt/2utAluo3"></script>

		<!-- Create it with slider online build tool for better performance. -->
		<script src="<?php echo content_url(); ?>/plugins/new-royalslider/lib/royalslider/jquery.royalslider.min.js"></script>

		<script src="<?php echo content_url(); ?>/themes/galore/js/bootstrap-collapse.js"></script>

		<!-- REMOVE THE TAP DELAY -->
		<script type='application/javascript' src='<?php echo content_url(); ?>/themes/galore/js/fastclick.js'></script>

		<script type="text/javascript">

		( function( $ ) {
		    $( document.body ).on( 'post-load', function () {
		        // New posts have been added to the page.
		    } );
		} )( jQuery );

		</script>

		<!-- NAVBAR SHRINKING -->

		<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(window).scroll(function() {
			  if ($(document).scrollTop() > 50) {
			    $('nav').addClass('shrink');
			  } else {
			    $('nav').removeClass('shrink');
			  }
			});
		});
		</script>

		<script type="text/javascript">
			$(function() {
				FastClick.attach(document.body);
			});
		</script>
		
	</head>
	<body>

		<div id="fb-root"></div>
		<script>
		  window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '341699539354957',
		      xfbml      : true,
		      version    : 'v2.2'
		    });
		  };

		  (function(d, s, id){
		     var js, fjs = d.getElementsByTagName(s)[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement(s); js.id = id;
		     js.src = "//connect.facebook.net/en_US/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));

		</script>

		<script>
		window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
		</script>
