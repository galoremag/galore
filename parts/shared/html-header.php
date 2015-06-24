<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<head>
		<script type="text/javascript">var _sf_startpt=(new Date()).getTime()</script>
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
	  	
	  	<!-- Post Meta Description -->
		<?php if ( (is_page()) || (is_single()) ) : if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<meta name="description" content="<?php echo get_the_excerpt(); ?>" />
		<?php endwhile; endif; elseif(is_home()) : ?>

		<!-- Site-wide Meta Description -->
	  	<meta name="description" content="GALORE is a media brand for the modern bombshell, speaking to the edgy, sexy and creative woman in her 20's surrounding Style, Beauty, Pop, Sex + Dating and Fitness.">
	  	<?php endif; ?>
	  	
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
		
		<meta name="keywords" content="Galore, Galore Girls, girls, edgy, sexy, teens, teenager, pop culture, Justin Bieber, Nicki Minaj, Kanye West, entertainment">
		<meta name="author" content="Galore Girl">

		<!-- Pinterest Verification -->
		<meta name="p:domain_verify" content="8c3f8aadea8dcff760f98a676ca9a2f7"/>

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
		<!-- <script src='<?php echo content_url(); ?>/plugins/new-royalslider/lib/royalslider/jquery-1.7.2.min.js'></script> -->
		<script type='application/javascript' src='<?php echo content_url(); ?>/themes/galore/bower_components/jquery/dist/jquery.min.js'></script>

		<!-- BOOSTRAP -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

		<?php wp_head(); ?>

		<script src="//use.typekit.net/uqi4yop.js"></script>
		<script>try{Typekit.load();}catch(e){}</script>

		<!-- Main slider JS script file --> 
		<script type='application/javascript' src='<?php echo content_url(); ?>/themes/galore/prod.js'></script>

		<!-- Create it with slider online build tool for better performance. -->
		<script src="<?php echo content_url(); ?>/plugins/new-royalslider/lib/royalslider/jquery.royalslider.min.js"></script>		


		<script type="text/javascript">

		( function( $ ) {
		    $( document.body ).on( 'post-load', function () {
		        // New posts have been added to the page.
		    } );
		} )( jQuery );

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

		<script type="text/javascript">
			var isMobile = false; //initiate as false
			// device detection
			if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
			|| /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;

			$(function() {
				if (isMobile == true) {
					$('a#superhero').css({'display' : 'table'});
					// document.getElementById('superhero').style.display = 'table';
				} else {
					$('a#superhero').css({'display' : 'none'});
				}
			});
		</script>
