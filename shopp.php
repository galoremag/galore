<?php
 /*
 Template Name: Shop

 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="container-fluid">
	<div class="row-fluid">
		<div id="content" class="col-sm-10 col-sm-offset-1">
			<?php if ( have_posts() ): ?>
			<h2 class="text-center"><i class="fa fa-moon-o"></i> Shop <i class="fa fa-moon-o"></i></h2>
			<hr>

			<?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>

			<?php the_content();?>
			<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>

			<?php endwhile; endif; ?>
			<?php else: ?>
			<h2>No posts to display in <?php echo single_cat_title( '', false ); ?></h2>
			<?php endif; ?>

			<!-- <div id="post-nav">
				<ul>
					<li id="page-left" class="alignleft pull-left"><?php previous_posts_link( '<h4><i class="fa fa-chevron-left"></i> &nbsp; PREV</h4>' ); ?></li>
					<li id="page-right" class="alignright pull-right"><?php next_posts_link( '<h4>NEXT &nbsp; <i class="fa fa-chevron-right"></i></h4>', '' ); ?></li>
				</ul>
			</div> -->
			<div class="text-center">
				<p>Having trouble? Feel free to hit us up: <a href="mailto:help@galoremag.com">help@galoremag.com</a>. You could also <a href="" onClick="$('#habla_window_div #habla_topbar_div').click();">chat with us</a>.</p>
			</div>
			<div class="spacer40"></div>
		</div>
	</div>
</div>

<!-- begin olark code -->
<script data-cfasync="false" type='text/javascript'>/*<![CDATA[*/window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){
f[z]=function(){
(a.s=a.s||[]).push(arguments)};var a=f[z]._={
},q=c.methods.length;while(q--){(function(n){f[z][n]=function(){
f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={
0:+new Date};a.P=function(u){
a.p[u]=new Date-a.p[0]};function s(){
a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){
hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){
return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){
b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{
b.contentWindow[g].open()}catch(w){
c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{
var t=b.contentWindow[g];t.write(p());t.close()}catch(x){
b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({
loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
/* custom configuration goes here (www.olark.com/documentation) */
olark.identify('7622-511-10-6620');/*]]>*/</script><noscript><a href="https://www.olark.com/site/7622-511-10-6620/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>
<!-- end olark code -->

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
