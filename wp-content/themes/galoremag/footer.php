</div><!--/container-->

<footer>
  <div class="row">
    <div class="diaries">
      <div class="container">
        <div class="carousel jcarousel" id="diarieCarousel">
          <div class="row">
            <div class="span12" id="kitten-logo"></div>
          </div>
          <div class="diaries-nav">
            <a data-slide="prev" href="#diarieCarousel"><i class="ss-icon">&#x25C5;</i></a>
            <a data-slide="next" href="#diarieCarousel"><i class="ss-icon">&#x25BB;</i></a>
          </div>
          <hr/>
          <div class="carousel-inner">
            <div class="item active">
              <div class="row">
                <a id="kittens" href="/kitten">
                  <div class="span2">
                    <img src="https://galoremag.com/wp-content/uploads/2014/10/ashley.jpg"> <span>Ashley Moore</span>
                  </div>
                  <div class="span2">
                    <img src="https://galoremag.com/wp-content/uploads/2014/10/anastasia.jpg"> <span>Anastasia Ashley</span>
                  </div>
                  <div class="span2">
                    <img src="https://galoremag.com/wp-content/uploads/2014/10/bo.jpg"> <span>Bo Koehler</span>
                  </div>
                  <div class="span2">
                    <img src="https://galoremag.com/wp-content/uploads/2014/10/charlotte.jpg"> <span>Charlotte McKinney</span>
                  </div>
                  <div class="span2">
                    <img src="https://galoremag.com/wp-content/uploads/2014/10/cheyenne.jpg"> <span>Cheyenne Tozzi</span>
                  </div>
                  <div class="span2">
                    <img src="https://galoremag.com/wp-content/uploads/2014/10/giza.jpg"> <span>Giza Lagarce</span>
                  </div>
                  <div class="span2">
                    <img src="https://galoremag.com/wp-content/uploads/2014/10/gia.jpg"> <span>Gia Genevieve</span>
                  </div>
                  <div class="span2">
                    <img src="https://galoremag.com/wp-content/uploads/2014/10/jenah.jpg"> <span>Jenah Yamamoto</span>
                  </div>
                  <div class="span2">
                    <img src="https://galoremag.com/wp-content/uploads/2014/10/jocelyn.jpg"> <span>Jocelyn Chew</span>
                  </div>
                  <div class="span2">
                    <img src="https://galoremag.com/wp-content/uploads/2014/10/lisa.jpg"> <span>Lisa Ramos</span>
                  </div>
                  <div class="span2">
                    <img src="https://galoremag.com/wp-content/uploads/2014/10/rachel.jpg"> <span>Rachel Barnes</span>
                  </div>
                  <!-- <div class="span2">
                    <a href="/kitten"><img src="https://galoremag.com/wp-content/uploads/2014/10/ashley.jpg"> <span>Sophie Simmons</span></a>
                  </div> -->
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="foot-nav">
      <div class="container">
        <!-- <ul>
        <li><a href="">About</a></li>
        <li><a href="">Terms</a></li>
        <li><a href="">Privacy</a></li>
        <li><a href="">Contact</a></li>
        </ul> -->
        <p class="moreinfo">For editorial, advertising, or partnership inquiries please contact <a href="mailto:hey@galoremag.com">hey@galoremag.com</a><br>
          View our <a href="/what-we-do">creative services and recent projects</a>.<br>
          Check out <a href="//galoremag.com/kitten" target="blank">Kitten</a>, our modeling and talent agency <a href="//galoremag.com/kitten" target="blank">here</a>.
        </p>
        <p class="copy">Copyright &copy; <?php echo date("Y"); ?> Galore Media LLC<br/><span class="right"><a href="/dmca-policy">DMCA policy</a></span></p>
      </div><!--/container-->
    </div><!--/foot-nav-->
  </div><!--/row-->
</footer>

<script>window.jQuery || document.write('<script src="<?php echo str_replace('https://', '//', get_bloginfo('template_url')); ?>/js/jquery-1.9.0.min.js"><\/script>')</script>
<script src="<?php echo str_replace('https://', '//', get_bloginfo('template_url')); ?>/js/script-min.js"></script>
<?php wp_footer(); ?>

<!-- SET COOKIE -->

<!-- I TRIED MOVING THE COOKIE SCRIPT TO THE HEADER AND THE COOKIE/MOBILE DETECTION TO SCRIPT.JS, BUT IT BROKE THE MODAL -->

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.0/jquery.cookie.min.js">
  </script>

  <script type="text/javascript">
    $(document).on('click.nav','.navbar-collapse.in',function(e) {
        if( $(e.target).is('a') ) {
            $(this).removeClass('in').addClass('collapse');
        }
    });
  </script>

  <script type="text/javascript">
    // $(document).ready(function() {

    //   var isMobile = {
    //     Android: function() {
    //         return navigator.userAgent.match(/Android/i);
    //     },
    //     BlackBerry: function() {
    //         return navigator.userAgent.match(/BlackBerry/i);
    //     },
    //     iOS: function() {
    //         return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    //     },
    //     Opera: function() {
    //         return navigator.userAgent.match(/Opera Mini/i);
    //     },
    //     Windows: function() {
    //         return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
    //     },
    //     any: function() {
    //         return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    //     }
    //   };

    //   if (isMobile.any()) {
    //     $('#join-modal').modal('hide');
    //   } else if ($.cookie('newsletter') == null && window.location.pathname === "/") {
    //     $('#join-modal').modal('show');
    //     $.cookie('newsletter', '999');
    //   }
    // });
  </script>

  <script>
  //   (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  //   (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  //   m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  //   })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  //   ga('create', 'UA-36901236-1', 'auto');
  //   ga('send', 'pageview');
  </script>

</body>
</html>
