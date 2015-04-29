<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<head>
		<?php
		if (is_home()) {
		    $blog_title = get_bloginfo('name') . " | " . get_bloginfo('description');
		} else {
			$blog_title = get_the_title() . " | " . get_bloginfo('name');
		}
		?>
		<title>
		<?php echo $blog_title; ?>
		</title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	  	
	  	<meta name="description" content="GALORE is a media brand for the modern bombshell, speaking to the edgy, sexy and creative women in her 20's surrounding Style, Beauty, Pop, Sex + Dating and Fitness.">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
		<meta name="keywords" content="Galore, Galore Girls, girls, edgy, sexy, teens, teenager, pop culture, Justin Bieber, Nicki Minaj, Kanye West, entertainment">
		<meta name="author" content="Galore Girl">

		<link rel="author" href="https://plus.google.com/111766775974771084195"/>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico"/>

		<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

		<!-- basic stylesheet -->
		<link rel="stylesheet" href="<?php echo content_url(); ?>/plugins/new-royalslider/lib/royalslider/royalslider.css">

		<!-- skin stylesheet (change it if you use another) -->
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/rs-galore-skin/rs-galore.css"> 

		<!-- Perfect Scrollbar CSS -->
		<link rel='stylesheet' href='<?php echo get_stylesheet_directory_uri(); ?>/css/perfect-scrollbar.min.css' />

		<!-- Plugin requires jQuery 1.8+  -->
		<!-- If you already have jQuery on your page, you shouldn't include it second time. -->
		<!-- <script src='<?php echo content_url(); ?>/plugins/new-royalslider/lib/royalslider/jquery-1.7.2.min.js'></script> -->
		<script type='application/javascript' src='<?php echo content_url(); ?>/themes/galore/bower_components/jquery/dist/jquery.min.js'></script>

		<!-- BOOSTRAP -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

		<?php wp_head(); ?>

		<!-- Perfect Scrollbar JS -->
		<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/perfect-scrollbar.min.js'></script>

		<!-- Main slider JS script file --> 
		<script type='application/javascript' src='<?php echo content_url(); ?>/themes/galore/js/site.js'></script>

		<!-- Create it with slider online build tool for better performance. -->
		<script src="<?php echo content_url(); ?>/plugins/new-royalslider/lib/royalslider/jquery.royalslider.min.js"></script>

		

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

		<!-- PERFORMANCE MONITORING -->
		<script>
		var _prum = [['id', '55284752abe53d0d1f35d79a'],
		             ['mark', 'firstbyte', (new Date()).getTime()]];
		(function() {
		    var s = document.getElementsByTagName('script')[0]
		      , p = document.createElement('script');
		    p.async = 'async';
		    p.src = '//rum-static.pingdom.net/prum.min.js';
		    s.parentNode.insertBefore(p, s);
		})();
		</script>
		
	</head>
	<body>

		<!-- Google Analytics -->
		<script>
			// (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			// (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			// m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			// })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			// ga('create', 'UA-36901236-1', 'auto');
			// ga('send', 'pageview');
		</script>

		<!-- Google Tag Manager -->
		<noscript>
		<!-- <iframe src="//www.googletagmanager.com/ns.html?id=GTM-P5KW4R"
		height="0" width="0" style="display:none;visibility:hidden">
		</iframe> -->
		</noscript>
		<script>
		// (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		// new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		// j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		// '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		// })(window,document,'script','dataLayer','GTM-P5KW4R');
		</script>
		<!-- End Google Tag Manager -->

		<!-- Google Tag Manager Plugin -->
		<?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>


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
