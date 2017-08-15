<?php get_header()?>

<div class="container-fluid">
	    	<div class="body">
	    		<?php
				if ( have_posts() ) : // если имеются записи в блоге.
				  // query_posts('cat=5');   // указываем ID рубрик, которые необходимо вывести.
				  // while (have_posts()) : the_post();  // запускаем цикл обхода материалов блога
				  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				  $args = array( 'paged' => $paged ,'cat' => '5', 'posts_per_page' => '4' );
				 
				  $loop = new WP_Query( $args );
				  while ($loop->have_posts()) : $loop->the_post();  // запускаем цикл обхода материалов блога
				?>
	    		<div class="col-xs-12 col-sm-6 <?php memoirs_reviews_add_class(); ?>">
			    	<a href="<?php the_permalink(); ?>">
			    		<div class="single-link-review">
			    				<div class="col-xs-12 col-sm-12">
			    					<div class="single-link-review-image">
			    						<?php the_post_thumbnail('full'); ?>
			    					</div>
			    				</div>
			    				<div class="col-xs-12 col-sm-12">
			    					<h1><?php the_title(); ?></h1>
		    						<div class="hidden-xs"><?php the_excerpt()?></div>
			    				</div>
			    		</div>
					</a>
				</div>
				<?php
				  endwhile;?>
				  <div class="col-xs-12 col-sm-6 col-sm-offset-3">
					<?php wp_pagenavi( array( 'query' => $loop ) );?>
				  </div>
				<?php endif;

				// wp_reset_query();                
				?>
	    	</div>
	    </div>

<?php get_footer() ?>