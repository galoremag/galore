<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]-->
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!-->
<html class="no-js" lang="en"><!--<![endif]-->
	<head>

		<!-- Device scaling -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0, minimal-ui">

		<!-- Pinterest Verification -->
		<meta name="p:domain_verify" content="ce4daefc546feb856b7627a5bfcd4d51"/>

		<meta name="google-site-verification" content="9q_iilZ2axazp6DWJG9YsrsLMupyES5IOH2jc4Mm2t4" />

		<link rel="author" href="https://plus.google.com/111766775974771084195"/>

		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico"/>

		<!-- basic stylesheet -->
		<link rel="stylesheet" href="<?php echo content_url(); ?>/plugins/new-royalslider/lib/royalslider/royalslider.css">

		<!-- Datepicker stylesheet -->
		<!-- <link rel="stylesheet" href="<?php echo content_url(); ?>/themes/galore/datepicker.css"> -->

		<?php wp_head(); ?>

		<!-- Google Analytics -->
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-36901236-1', 'auto');
			ga('send', 'pageview');
		</script>

		<!-- Event tracking, outbound links mostly -->
		<script type="text/javascript">
		    function _gaLt(event) {
		        /* If GA is blocked or not loaded then don't track */
		        if (!ga.hasOwnProperty("loaded") || ga.loaded != true) {
		            return;
		        }

		        var el = event.srcElement || event.target;

		        /* Loop up the DOM tree through parent elements if clicked element is not a link (eg: an image inside a link) */
		        while (el && (typeof el.tagName == 'undefined' || el.tagName.toLowerCase() != 'a' || !el.href)) {
		            el = el.parentNode;
		        }

		        /* if a link has been clicked */
		        if (el && el.href) {

		            var link = el.href;

		            /* Only if it is an external link */
		            if (link.indexOf(location.host) == -1 && !link.match(/^javascript\:/i)) {
		                /* Is target set and not _(self|parent|top)? */
		                var target = (el.target && !el.target.match(/^_(self|parent|top)$/i)) ? el.target : false;

		                var hbrun = false; // tracker has not yet run

		                /* HitCallback to open link in same window after tracker */
		                var hitBack = function() {
		                    /* run once only */
		                    if (hbrun) return;
		                    hbrun = true;
		                    window.location.href = link;
		                };

		                /* If target opens a new window then just track */
		                if (el.target && !el.target.match(/^_(self|parent|top)$/i)) {
		                    ga(
		                        "send", "event", "Outgoing Links", link,
		                        document.location.pathname + document.location.search
		                    );
		                } else {
		                    /* send event with callback */
		                    ga(
		                        "send", "event", "Outgoing Links", link,
		                        document.location.pathname + document.location.search, {
		                            "hitCallback": hitBack
		                        }
		                    );

		                    /* Run hitCallback if GA takes too long */
		                    setTimeout(hitBack, 1000);

		                    /* Prevent standard click */
		                    event.preventDefault ? event.preventDefault() : event.returnValue = !1;
		                }
		            }
		        }
		    }

		    /* Attach the event to all clicks in the document after page has loaded */
		    var w = window;
		    w.addEventListener ? w.addEventListener("load", function() {
		        document.body.addEventListener("click", _gaLt, !1)
		    }, !1) : w.attachEvent && w.attachEvent("onload", function() {
		        document.body.attachEvent("onclick", _gaLt)
		    });
		</script>

		<!-- Facebook Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
		n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
		document,'script','https://connect.facebook.net/en_US/fbevents.js');

		fbq('init', '1441612602832494');
		fbq('track', 'PageView');
		fbq('track', 'Search');
		fbq('track', 'ViewContent');
		</script>
		<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=1441612602832494&ev=PageView&noscript=1"
		/></noscript>
		<!-- End Facebook Pixel Code -->

		<script src='//cdn.goroost.com/roostjs/sl6otjre2knha1dhhy3trjd9y94q775x' async></script>

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

		<!-- <script type="text/javascript">
		(function(n,a,t,i,v,e,ai){n['NativeAIObject']=v;n[v]=n[v]||function(){
		(n[v].q=n[v].q||[]).push(arguments)},n[v].l=1*new
		Date();e=a.createElement(t),
		ai=a.getElementsByTagName(t)[0];e.async=1;e.src=i+"?"+parseInt(n[v].l/604800000);
		ai.parentNode.insertBefore(e,ai)})
		(window,document,'script','https://api.native.ai/js/current/nativeai.js','nativeAI');
		nativeAI('create','9bd8568d-6ad3-4d6a-955a-0d8a7779328e',isTestMode);
		</script> -->

		<!-- Begin comScore Tag -->
		<script>
			var _comscore = _comscore || [];
			_comscore.push({ c1: "2", c2: "22114619" });
			(function() {
			var s = document.createElement("script"), el = document.getElementsByTagName("script")[0]; s.async = true;
			s.src = (document.location.protocol == "https:" ? "https://sb" : "http://b") + ".scorecardresearch.com/beacon.js";
			el.parentNode.insertBefore(s, el);
			})();
		</script>
		<noscript>
		 <img src="http://b.scorecardresearch.com/p?c1=2&c2=22114619&cv=2.0&cj=1" />
		</noscript>
		<!-- End comScore Tag -->

		<!-- Quantcast Tag -->
		<script type="text/javascript">
		var _qevents = _qevents || [];

		(function() {
		var elem = document.createElement('script');
		elem.src = (document.location.protocol == "https:" ? "https://secure" : "http://edge") + ".quantserve.com/quant.js";
		elem.async = true;
		elem.type = "text/javascript";
		var scpt = document.getElementsByTagName('script')[0];
		scpt.parentNode.insertBefore(elem, scpt);
		})();

		_qevents.push({
		qacct:"p-RPUQSmtUvJejp"
		});
		</script>

		<noscript>
		<div style="display:none;">
		<img src="//pixel.quantserve.com/pixel/p-RPUQSmtUvJejp.gif" border="0" height="1" width="1" alt="Quantcast"/>
		</div>
		</noscript>
		<!-- End Quantcast Tag -->

		<!-- DFP script -->
		<script type='text/javascript'>
		  var googletag = googletag || {};
		  googletag.cmd = googletag.cmd || [];
		  (function() {
		    var gads = document.createElement('script');
		    gads.async = true;
		    gads.type = 'text/javascript';
		    var useSSL = 'https:' == document.location.protocol;
		    gads.src = (useSSL ? 'https:' : 'http:') +
		      '//www.googletagservices.com/tag/js/gpt.js';
		    var node = document.getElementsByTagName('script')[0];
		    node.parentNode.insertBefore(gads, node);
		  })();
		</script>

		<script type='text/javascript'>

			var isMobile = false; //initiate as false
			// device detection
			if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
			|| /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;
			console.log(isMobile);

		  googletag.cmd.push(function() {
				googletag.defineSlot('/60899964/Home_300x250', [300, 250], 'div-gpt-ad-1465835581876-9').addService(googletag.pubads());
		    googletag.defineSlot('/60899964/Article_300x250_970x250', [[970, 250], [300, 250]], 'div-gpt-ad-1465835581876-0').addService(googletag.pubads());
		    googletag.defineSlot('/60899964/Article_300x250_970x250_pos2', [[970, 250], [300, 250]], 'div-gpt-ad-1465835581876-1').addService(googletag.pubads());
		    googletag.defineOutOfPageSlot('/60899964/Article_Interstitial', 'div-gpt-ad-1465835581876-2').addService(googletag.pubads());
    		googletag.defineOutOfPageSlot('/60899964/Article_OOP', 'div-gpt-ad-1467924264305-1').addService(googletag.pubads());
		    googletag.defineSlot('/60899964/Home_300x250_970x250_pos2', [[970, 250], [300, 250]], 'div-gpt-ad-1465835581876-10').addService(googletag.pubads());
		    googletag.defineSlot('/60899964/Home_300x250_970x250_pos3', [[970, 250], [300, 250]], 'div-gpt-ad-1465835581876-11').addService(googletag.pubads());
				googletag.defineSlot('/60899964/Home_300x250_970x250_pos4', [[300, 250], [970, 250]], 'div-gpt-ad-1467230007625-0').addService(googletag.pubads());
		    googletag.defineOutOfPageSlot('/60899964/Home_Interstitial', 'div-gpt-ad-1465835581876-12').addService(googletag.pubads());
		    googletag.defineOutOfPageSlot('/60899964/Home_OOP', 'div-gpt-ad-1467924264305-3').addService(googletag.pubads());

				googletag.defineSlot('/60899964/Galore_Medium_Native', ['fluid'], 'div-gpt-ad-1470080205208-0').addService(googletag.pubads());
				googletag.defineSlot('/60899964/Galore_Small_Native', [[240, 340], [260, 360]], 'div-gpt-ad-1486418137570-0').addService(googletag.pubads());

				// Mobile ad units
				if (isMobile) {
					googletag.defineSlot('/60899964/Galore_Mobile_Wallpaper', ['fluid'], 'div-gpt-ad-1470080205208-1').addService(googletag.pubads());
					googletag.defineSlot('/60899964/Article_Mobile_300x250', [300, 250], 'div-gpt-ad-1465835581876-3').addService(googletag.pubads());
					googletag.defineSlot('/60899964/Article_Mobile_300x250_pos2', [300, 250], 'div-gpt-ad-1465835581876-4').addService(googletag.pubads());
					googletag.defineOutOfPageSlot('/60899964/Article_Mobile_Interstitial', 'div-gpt-ad-1465835581876-5').addService(googletag.pubads());
					googletag.defineSlot('/60899964/Article_Mobile_Leaderboard', [[300, 50], [320, 50]], 'div-gpt-ad-1465835581876-6').addService(googletag.pubads());
					googletag.defineOutOfPageSlot('/60899964/Article_Mobile_OOP', 'div-gpt-ad-1467924264305-0').addService(googletag.pubads());
					googletag.defineSlot('/60899964/Home_Mobile_300x250', [300, 250], 'div-gpt-ad-1465835581876-13').addService(googletag.pubads());
					googletag.defineSlot('/60899964/Home_Mobile_300x250_pos2', [300, 250], 'div-gpt-ad-1465835581876-14').addService(googletag.pubads());
					googletag.defineSlot('/60899964/Home_Mobile_300x250_pos3', [300, 250], 'div-gpt-ad-1465835581876-15').addService(googletag.pubads());
					googletag.defineSlot('/60899964/Home_Mobile_300x250_pos4', [300, 250], 'div-gpt-ad-1467230007625-1').addService(googletag.pubads());
					googletag.defineOutOfPageSlot('/60899964/Home_Mobile_Interstitial', 'div-gpt-ad-1465835581876-16').addService(googletag.pubads());
					googletag.defineSlot('/60899964/Home_Mobile_Leaderboard', [[300, 50], [320, 50]], 'div-gpt-ad-1465835581876-17').addService(googletag.pubads());
					googletag.defineOutOfPageSlot('/60899964/Home_Mobile_OOP', 'div-gpt-ad-1467924264305-2').addService(googletag.pubads());
				}

		    googletag.pubads().enableSingleRequest();
		    googletag.pubads().collapseEmptyDivs();
		    googletag.pubads().setTargeting('Category', ['beauty', 'pop', 'fashion', 'health', 'sex-dating']);
		    googletag.enableServices();
		  });
		</script>
		<!-- END DFP script -->

		<!-- reCAPTCHA forms -->
		<script src='https://www.google.com/recaptcha/api.js'></script>

		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script>
		  (adsbygoogle = window.adsbygoogle || []).push({
		    google_ad_client: "ca-pub-6300084900738168",
		    enable_page_level_ads: true
		  });
		</script>

	</head>
	<body>
