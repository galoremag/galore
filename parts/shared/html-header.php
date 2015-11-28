<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!-->
<html class="no-js" lang="en"><!--<![endif]-->
	<head>

		<!-- Kissmetrics tracking snippet -->
		<script type="text/javascript">var _kmq = _kmq || [];
		var _kmk = _kmk || 'ea856667b51eeb50b8bbdfbcbce28320d0675fbd';
		function _kms(u){
		  setTimeout(function(){
		    var d = document, f = d.getElementsByTagName('script')[0],
		    s = d.createElement('script');
		    s.type = 'text/javascript'; s.async = true; s.src = u;
		    f.parentNode.insertBefore(s, f);
		  }, 1);
		}
		_kms('//i.kissmetrics.com/i.js');
		_kms('//scripts.kissmetrics.com/' + _kmk + '.2.js');
		</script>

		<!-- Google Analytics -->
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-36901236-1', 'auto');
			ga('send', 'pageview');
		</script>

		<script type="text/javascript">var _sf_startpt=(new Date()).getTime()</script>
		<?php
		if (is_home()) {
		    $blog_title = get_bloginfo('name') . " | " . get_bloginfo('description');
		} elseif (is_category()) {
			$blog_title = single_cat_title('', false) . " | " . get_bloginfo('name');
		} elseif (is_tag()) {
			$blog_title = single_tag_title('', false) . " | " . get_bloginfo('name');
		} elseif (is_author()) {
			$blog_title = get_the_author() . " | " . get_bloginfo('name');
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
		<meta name="author" content="<?php echo get_the_author() ; ?>">
		<link rel="author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"/>
		<meta property="article:author" content="<?php echo get_the_author() ; ?>" />

		<?php endwhile; endif; elseif ( (is_category()) || (is_tag()) ) : ?>
		<meta name="description" content="<?php echo single_cat_title(); ?>" />
		<meta name="author" content="Galore">
		<link rel="author" href="http://GaloreMag.com"/>
		<meta property="article:author" content="Galore" />

		<?php elseif (is_author()) : ?>
		<meta name="description" content="<?php echo get_the_author_meta( 'description' ); ?>" />
		<meta name="author" content="<?php echo get_the_author(); ?>">
		<link rel="author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"/>
		<meta property="article:author" content="<?php echo get_the_author(); ?>" />

		<?php elseif(is_home()) : ?>

		<!-- Site-wide Meta Description -->
	  	<meta name="description" content="GALORE is a media brand for the modern bombshell, speaking to the edgy, sexy and creative woman in her 20's surrounding Style, Beauty, Pop, Sex + Dating and Fitness.">
	  	<?php endif; ?>
	  	
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0, minimal-ui">
		
		<meta name="keywords" content="Galore, Galore Girls, girls, edgy, sexy, teens, teenager, pop culture, Justin Bieber, Nicki Minaj, Kanye West, entertainment">

		<?php if ( has_tag('kylie-jenner') ) : ?>

			<!-- Facebook Pixel Code -->
			<script>
			!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
			n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
			n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
			t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
			document,'script','//connect.facebook.net/en_US/fbevents.js');

			fbq('init', '1441612602832494');
			fbq('track', "PageView");</script>
			<noscript><img height="1" width="1" style="display:none"
			src="https://www.facebook.com/tr?id=1441612602832494&ev=PageView&noscript=1"
			/></noscript>
			<!-- End Facebook Pixel Code -->

		<?php endif; ?>

		<?php if ( has_tag('zendaya') ) : ?>

			<!-- Facebook Pixel Code -->
			<script>
			!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
			n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
			n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
			t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
			document,'script','//connect.facebook.net/en_US/fbevents.js');

			fbq('init', '1441612602832494');
			fbq('track', "PageView");</script>
			<noscript><img height="1" width="1" style="display:none"
			src="https://www.facebook.com/tr?id=1441612602832494&ev=PageView&noscript=1"
			/></noscript>
			<!-- End Facebook Pixel Code -->

		<?php endif; ?>

		<?php if ( is_page('thanks') ) : ?>

			<!-- Facebook Pixel Code -->
			<script>
			!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
			n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
			n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
			t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
			document,'script','//connect.facebook.net/en_US/fbevents.js');

			fbq('init', '1441612602832494');
			fbq('track', "PageView");</script>
			<noscript><img height="1" width="1" style="display:none"
			src="https://www.facebook.com/tr?id=1441612602832494&ev=PageView&noscript=1"
			/></noscript>
			<!-- End Facebook Pixel Code -->

		<?php endif; ?>

		<!-- Pinterest Verification -->
		<meta name="p:domain_verify" content="8c3f8aadea8dcff760f98a676ca9a2f7"/>

		<meta name="google-site-verification" content="9q_iilZ2axazp6DWJG9YsrsLMupyES5IOH2jc4Mm2t4" />

		<link rel="author" href="https://plus.google.com/111766775974771084195"/>

		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico"/>

		<!-- basic stylesheet -->
		<link rel="stylesheet" href="<?php echo content_url(); ?>/plugins/new-royalslider/lib/royalslider/royalslider.css">

		<?php wp_head(); ?>

		<script src='//cdn.goroost.com/roostjs/sl6otjre2knha1dhhy3trjd9y94q775x' async></script>

		<!-- Main slider JS script file --> 
		<script type='text/javascript' src='<?php echo content_url(); ?>/themes/galore/prod.js'></script>

		<!-- Create it with slider online build tool for better performance. -->
		<script src="<?php echo content_url(); ?>/plugins/new-royalslider/lib/royalslider/jquery.royalslider.min.js"></script>		


		<script type="text/javascript">

		// ( function( $ ) {
		//     $( document.body ).on( 'post-load', function () {
		//         // New posts have been added to the page.
		//     } );
		// } )( jQuery );

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

