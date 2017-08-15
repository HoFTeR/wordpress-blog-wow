<?php get_header(); ?>
	<body class="search-page">
		<div class="container-fluid delete-padding">
			<!-- <h1 class="search-result">Параметри пошуку: "<?php //echo $_GET['s'];?>"</h1> -->
			<?php if (have_posts()) :?>
			<h1 class="search-result">Параметри пошуку: "<?php echo $_GET['s'];?>"</h1>
			<?php while (have_posts()) : the_post(); ?>
				<!-- <h1 class="search-result">Параметри пошуку: "<?php echo $_GET['s'];?>"</h1> -->
				<div class="col-xs-12 col-sm-4 col-md-3">
					<a href="<?php the_permalink();?>">
						<div class="post">
							<?php the_post_thumbnail('full'); ?>
							<h1><?php the_title(); ?></h1>
						</div>
					</a>
				</div>
			<?php endwhile;	
			else: ?>
				<div class="no-posts hidden-xs">
					<img class="main-img" src="<?php bloginfo('template_url');?>/img/WoWScrnShot_070116_212143.jpg">
					<div class="speech-bubble">
						<img src="<?php bloginfo('template_url');?>/img/speech.png">
						<h3>Ні-і-і... У нас такого немає!</h3>
					</div>
				</div>
				<div class="no-posts-mobile hidden-sm hidden-md hidden-lg">
					<h3>Ні-і-і... У нас такого немає!</h3>
				</div> 
			<?php endif;?>
		</div>
	</body>
<?php get_footer(); ?>