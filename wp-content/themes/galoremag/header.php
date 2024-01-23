<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Galore <?php wp_title( '|' ); ?></title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="google-site-verification" content="qL7jiAsrMBiVRomcnkaKYpW041zI6AMJLjAJTo7So24" />
  <meta name="google-site-verification" content="lCrGa2sn-WgnOUHL4iQEL_2VOOe9N6zJSMnfzQmqOqY" />
  <meta name="keywords" content="galore,galore magazine,galore mag,fashion,beauty,femininity,sex advice">
  <link rel="author" href="https://plus.google.com/102816223256320293303/posts"/>

  <?php
  if (is_front_page() && is_home()) {
  echo '<meta name="description" content="Celebrating beauty, femininity, and sex appeal with a downtown sensibility.">';
  }
  ?>
  <style>
   @font-face {
     font-family: 'Yanone Kaffeesatz';
     font-style: normal;
     font-weight: 200;
     src: local('Yanone Kaffeesatz ExtraLight'), local('YanoneKaffeesatz-ExtraLight'), url(//themes.googleusercontent.com/static/fonts/yanonekaffeesatz/v5/We_iSDqttE3etzfdfhuPRUDqw7A1uQWuQSM-rfHaMOr3rGVtsTkPsbDajuO5ueQw.woff) format('woff');
   }
   @font-face {
     font-family: 'Sanchez';
     font-style: normal;
     font-weight: 400;
     src: local('Sanchez'), local('Sanchez-Regular'), url(//themes.googleusercontent.com/static/fonts/sanchez/v2/9T6om-IyqE2CuKLLQr0lcgLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
   }
  </style>

  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <link rel="shortcut icon" href="<?php echo str_replace('https://', '//', get_bloginfo('template_url')); ?>/favicon.ico">
  <link rel="apple-touch-icon" href="<?php echo str_replace('https://', '//', get_bloginfo('template_url')); ?>/apple-touch-icon.png">

  <link href='//fonts.googleapis.com/css?family=Libre+Baskerville:400,400italic' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="<?php echo str_replace('https://', '//', get_bloginfo('template_url')); ?>/style/css/style.css">
  <link rel="stylesheet" href="<?php echo str_replace('https://', '//', get_bloginfo('template_url')); ?>/style/css/style-responsive.css">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

  <!-- Optional theme -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css"> -->

  <!-- basic stylesheet -->
  <link rel="stylesheet" href="/wp-content/plugins/new-royalslider/lib/royalslider/royalslider.css">

  <!-- skin stylesheet (change it if you use another) -->
  <link rel="stylesheet" href="/wp-content/themes/galoremag/rs-galore-skin/rs-galore.css">

  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="/wp-content/themes/galoremag/style/css/font-awesome.css">

  <!-- JQUERY  -->
  <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

  <!-- Main slider JS script file -->
  <!-- Create it with slider online build tool for better performance. -->
  <script src="/wp-content/plugins/new-royalslider/lib/royalslider/jquery.royalslider.min.js"></script>

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-36901236-1', 'auto');
    ga('require', 'displayfeatures');
    ga('send', 'pageview');
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

<body <?php body_class(); ?>
      <?php
           $post_id = get_the_ID();
           ?>
      <?php if ($post_id): ?>
      data-post_id="<?php echo $post_id;?>"
      <?php endif; ?>
      >

<!-- JOIN NEWSLETTER -->

<!-- Modal -->
<!-- <div class="modal fade" id="join-modal" tabindex="-1" role="dialog" aria-labelledby="joinModal" aria-hidden="true">
  <div class="modal-dialog" id="join-box">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <div class="modal-body">
      <img src="https://galoremag.com/wp-content/uploads/2014/09/galore-meow.png">
      <form class="form" action="https://galoremag.createsend.com/t/i/s/tjcj/" method="post">
        <div class="form-group">
          <input id="fieldEmail" name="cm-name" type="text" class="form-control" value="Full Name" required>
        </div>
        <div class="form-group">
          <input id="fieldEmail" name="cm-tjcj-tjcj" type="text" class="form-control" value="Email" required>
        </div>
        <div class="form-group">
          <button type="button" class="btn btn-info pull-right" data-dismiss="modal">Subscribe</button>
        </div>
        <div>
          <h5>A weekly dose of fashion, beauty, sex, and photography. Not always in that order. #Meow</h5>
        </div>
      </form>
    </div>
  </div>
</div> -->

<!-- HEADER -->
<header>
  <div class="container">
    <a href="/"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="Galore" title-"Galore"><h1>Galore</h1></a>
  </div><!--/container-->

  <div class="navbar" role="navigation">
    <div class="navbar-inner">
      <div class="container">
        <button type="button" class="navbar-toggle btn-navbar collapsed" data-toggle="collapse" data-target="#mainNav">
          <span class="sr-only">Menu</span>
          <i class="fa fa-arrow-down"></i>
        </button>
      </div><!--/container-->
      <div id="mainNav" class="navbar-collapse collapse">
        <div class="top-nav">
          <div class="container">
            <?php //get_search_form(); ?>
            <!-- <p class="cartinfo">
              <a href="/shop/cart/">
              <i class="ss-icon">&#xE500;</i>
              <?php if (shopp('cart','hasitems')): ?>
              <?php $total_items = 0; ?>
              <?php while(shopp('cart','items')): ?>
              <?php $total_items = $total_items + 1; ?>
              <?php endwhile; ?>
              <strong><?php echo $total_items;?> <?php if ($total_items = 1) {echo'Item';} else {echo'Items';} ?></strong> (<?php shopp('cart','subtotal'); ?>)
              <?php else: ?>
              0 Items in Cart
              <?php endif; ?>
              </a>
            </p> -->
          </div><!--/container-->
        </div><!--/top-nav-->
        <div class="bottom-nav">
          <div class="container">
            <nav>
              <?php
              $category = get_the_category();
              $category_slug = $category[0]->slug;
              ?>
              <ul>
                <li><a<?php if(is_shopp_page()) { echo " class='active' "; }?> href="/shop/category/magazines/">Shop</a></li>
                <li><a<?php if($category_slug == "beauty-style") { echo " class='active' "; }?> href="/category/beauty-style" data-category="beauty-style">Beauty + Style</a></li>
                <li><a<?php if($category_slug == "models") { echo " class='active' "; }?> href="/category/models/" data-category="models">Models</a></li>
                <li><a<?php if($category_slug == "sex-advice") { echo " class='active' "; }?> href="/category/sex-advice" data-category="sex-advice">Sex + Advice</a></li>
                <li><a<?php if($category_slug == "mag"  && !(is_front_page() && is_home())) { echo " class='active' "; }?> href="/category/mag" data-category="mag">Mag</a></li>
                <li><a<?php if($category_slug == "pop") { echo " class='active' "; }?> href="/category/pop/" data-category="pop">Pop</a></li>
                <li><a<?php if($category_slug == "tv") { echo " class='active' "; }?> href="/category/tv/" data-category="tv">TV</a></li>
              </ul>
            </nav>
          </div><!--/container-->
        </div><!--/bottom-nav-->
      </div><!--/nav-collapse-->
    </div><!--/navbar-inner-->
  </div><!--/navbar-->

  </div><!--/container-->
  <div id="newsletter-signup" style="display:none">
    <i class="ss-icon ss-standard">&#x2421;</i>
    <div class="container">
      <div class="content">

        <h3>Sign up for our Newsletter!</h3>
        <form action="//galoremag.createsend.com/t/i/s/tjcj/" method="post" id="subForm">
          <input type="text" name="cm-tjcj-tjcj" id="tjcj-tjcj" placeholder="Your email address..."/>
          <button type="submit" class="btn btn-pink">Join</button>
        </form>

      </div><!--/content-->
    </div><!--/container-->
  </div><!--/newsletter-signup-->
</header>

<div class="container">
