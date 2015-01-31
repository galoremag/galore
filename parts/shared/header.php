<header>
	<div class="container">
		<div class="row">
			<div class="top-social col-sm-2 col-sm-offset-10">
				<ul class="tab">
					<li><a href="/"><i class="fa fa-tumblr"></i></a></li>
					<li><a href="/"><i class="fa fa-instagram"></i></a></li>
					<li><a href="/"><i class="fa fa-facebook"></i></a></li>
					<li><a href="/"><i class="fa fa-twitter"></i></a></li>
					<li><a href="/"><i class="fa fa-youtube"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
	
	<div class="container-fluid">
		<!-- Fixed navbar -->
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="<?php bloginfo('url') ?>"><span><?php bloginfo('name') ?></span></a>
		    </div>
		    <div class="main-cats navbar-collapse collapse">
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'navbar-collapse collapse', 'items_wrap' => ' <div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">%3$s  </ul>
		    </div><!--/.nav-collapse -->' ) ); ?>
		</nav>
	</div>

</header>
