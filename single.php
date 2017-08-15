<?php get_header() ?>

			<div class="container-fluid delete-padding">
	    	<div class="body">
	    		<div class="container-for-photo">
		    		<img class="single-main-image" src="<?php the_post_thumbnail(); ?>">
		    		<div class="image-shadow"></div>
		      		<div class="image-box">
		      			<div class="caption-box">
							<h1><?php the_title()?></h1>
							<p><?php the_time('j F Y року, H:i'); ?><p> 
							<p>
								<span><i class="fa fa-eye icon" aria-hidden="true"></i>
									<?php setPostViews(get_the_ID()); ?>
									<?php echo getPostViews(get_the_ID()); ?>
								</span>
								<span><i class="fa fa-comment icon" aria-hidden="true"></i><?php comments_number(' 0',' 1',' %'); ?></span>
							</p>
						</div>
			       	</div>
		       	</div>
		       	<div class="container">
			       	<div class="content-box">
			       		<?php the_post(); ?>
			       		<?php the_content(); ?>
			       	</div>
		       	</div>
		       	<div class="container-fluid">
		       		<div class="main-caption">
		        		<h1>Схожі публікації</h1>
		        		<img src="<?php bloginfo('template_url'); ?>/img/separator.png" alt="">
		        	</div>
		        	<div class="proposition-container">
		        	<?php
					$categories = get_the_category($post->ID);
					if ($categories) {
						$category_ids = array();
						foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
						$args=array(
							'category__in' => $category_ids,
							'post__not_in' => array($post->ID),
							'showposts' => '3',
							'orderby' => 'rand',
							'ignore_sticky_posts' => '0');
						$my_query = new wp_query($args);
						if( $my_query->have_posts() ) {
							while ($my_query->have_posts()) {
								$my_query->the_post();
								?>
								<div class="col-xs-12 col-sm-4 <?php promote_posts_add_class(); ?>">
									<a href="<?php the_permalink() ?>">
				        				<div class="similiar-single">
				        					<img class="similiar-single-image" src="<?php the_post_thumbnail('full'); ?>">
											<h1><?php the_title(); ?></h1>
				        				</div>
				        			</a>
				        		</div>
				        		<?php
							}
						}
						else{ ?>
							<div class="col-xs-12">
								<div class="container-block">
									<div class="nothing-was-found">
										<h1>Нажаль, нічого не було знайдено...</h1>
									</div>
								</div>
				        	</div>
						<?php 
						}
						wp_reset_query();
					}
					?>
					</div>
		        	<div class="main-caption">
		        		<h1>Коментарі</h1>
		        		<img src="<?php bloginfo('template_url'); ?>/img/separator.png" alt="">
		        	</div>
		        	<?php 
		        	if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
					?>
		       	</div>
	    	</div>
	    </div>

<?php get_footer() ?>