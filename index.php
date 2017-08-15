<?php get_header()?>

		<div class="container-fluid">
	    	<div class="body">
	    		<div class="main-caption">
		        	<h1>Рекомендовано</h1>
		        	<img src="<?php bloginfo('template_url'); ?>/img/separator.png" alt="">
		        </div>
		        <div class="col-xs-12 col-sm-6 delete-padding">
		        	<?php
					$popularpost = new WP_Query(
												array( 
													  'posts_per_page' => 1, 
													  'cat' => '6',
													  'meta_key' => 'post_views_count', 
													  'orderby' => 'post_views_count',
													  'order' => 'DESC' 
													  ) 
												);
					while ( $popularpost->have_posts() ) : $popularpost->the_post();?>
		        	<a href="<?php the_permalink(); ?>">
		        		<img class="first-card-image" src="<?php the_post_thumbnail('full'); ?>">
	      				<div class="first-main-card">
							<h1><?php the_title(); ?></h1>
		       			</div>
		        	</a>
		        	<?php endwhile;
				?>
		        </div>
				
				<div class="col-xs-12 col-sm-6 delete-padding">
				<?php
					$popularpost = new WP_Query(
												array( 
													  'posts_per_page' => 4, 
													  'meta_key' => 'post_views_count', 
													  'orderby' => 'post_views_count',
													  'order' => 'DESC' 
													  ) 
												);
					while ( $popularpost->have_posts() ) : $popularpost->the_post();?>

						<div class="col-xs-12 col-sm-6 delete-padding-right delete-padding-left">
							<a href="<?php the_permalink(); ?>">
				  				<div class="second-main-card">
					   				<img class="second-card-image" src="<?php the_post_thumbnail('full'); ?>">
									<h1><?php the_title(); ?></h1>
					       		</div>
			        		</a>
						</div>
 
					<?php endwhile;
				?>
				</div>

				<div class="col-xs-12">
					<div class="main-caption">
		        		<h1>Деякі новини</h1>
		        		<img src="<?php bloginfo('template_url');?>/img/separator.png" alt="">
		        	</div>
				</div>
				<div class="col-xs-12 delete-padding">
					<?php
					$lastnews = new WP_Query(
												array( 
													  'posts_per_page' => 4, 
													  'category_name' => 'news' 
													  ) 
												);
					while ( $lastnews->have_posts() ) : $lastnews->the_post();?>
						<a href="<?php the_permalink(); ?>">
				    		<div class="news-container">
				    			<div class="col-xs-12 col-sm-3 delete-padding">
				    				<div class="news-container-image">
				    					<?php the_post_thumbnail(); ?>
				    				</div>
				   				</div>
				   				<div class="col-xs-12 col-sm-9">
				    				<h1><?php the_title(); ?></h1>
				    				<div class="hidden-xs">
										<?php
										the_excerpt();
										?>
				    					<!-- <?php //the_excerpt(); ?> -->
					   				</div>
				    			</div>
				    		</div>
						</a>
					<?php endwhile;
					?>
				</div>

		        <div class="col-xs-12">
		        	<div class="main-caption">
		        		<h1>Деякі огляди</h1>
		        		<img src="<?php bloginfo('template_url'); ?>/img/separator.png" alt="">
		        	</div>
		        </div>

		        <?php
					$lastreviews = new WP_Query(
												array( 
													  'posts_per_page' => 6, 
													  'category_name' => 'reviews' 
													  ) 
												);
					while ( $lastreviews->have_posts() ) : $lastreviews->the_post();?>
			        <div class="col-xs-12 col-sm-4 <?php promote_posts_add_class(); ?>">
			        	<a href="<?php the_permalink(); ?>">
			        		<div class="some-review-card">
					   			<img class="some-review-image" src="<?php the_post_thumbnail(); ?>">
								<h1><?php the_title(); ?></h1>
			   				</div>
			   			</a>
			        </div>
			    	<?php endwhile;
				?>
				<!-- </div> -->
		        

		        <div class="col-xs-12">
		        	<div class="main-caption">
		        		<h1>Деякі мемуари</h1>
		        		<img src="<?php bloginfo('template_url'); ?>/img/separator.png" alt="">
		        	</div>
		        </div>

		        <?php
					$lastmemoirs = new WP_Query(
												array( 
													  'posts_per_page' => 4, 
													  'category_name' => 'memoirs' 
													  ) 
												);
					while ( $lastmemoirs->have_posts() ) : $lastmemoirs->the_post();?>
			        <div class="col-xs-12 col-sm-6 <?php posts_add_class(); ?>">
			        	<a href="<?php the_permalink(); ?>">
			        		<div class="some-text-card">
					   			<img class="some-text-image" src="<?php the_post_thumbnail(); ?>">
								<h1><?php the_title(); ?></h1>
			   				</div>
			   			</a>
			        </div>
			        <?php endwhile;
				?>
	    	</div>
	    </div>

<?php get_footer()?>
