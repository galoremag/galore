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

		<!-- DFP header scripts moved to Ad Switcher plugin -->

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
