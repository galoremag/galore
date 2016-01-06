<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!-->
<html class="no-js" lang="en"><!--<![endif]-->
	<head>

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

		<script type="text/javascript">
		(function(n,a,t,i,v,e,ai){n['NativeAIObject']=v;n[v]=n[v]||function(){
		(n[v].q=n[v].q||[]).push(arguments)},n[v].l=1*new
		Date();e=a.createElement(t),
		ai=a.getElementsByTagName(t)[0];e.async=1;e.src=i+"?"+parseInt(n[v].l/604800000);
		ai.parentNode.insertBefore(e,ai)})
		(window,document,'script','https://api.native.ai/js/current/nativeai.js','nativeAI');
		nativeAI('create','9bd8568d-6ad3-4d6a-955a-0d8a7779328e',isTestMode);
		</script>
		
	</head>
	<body>

		<script type="text/javascript">
			var isMobile = false; //initiate as false
			// device detection
			if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
			|| /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;

			

		</script>
