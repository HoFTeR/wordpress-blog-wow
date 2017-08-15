<?php get_header()?>

<div class="container-fluid">
	    	<div class="body">
				<?php
				if ( have_posts() ) : // если имеются записи в блоге.
				  // query_posts('cat=4');   // указываем ID рубрик, которые необходимо вывести.
				  while (have_posts()) : the_post();  // запускаем цикл обхода материалов блога
				?>
				<a href="<?php the_permalink(); ?>">
		    		<div class="single-link">
		    				<div class="col-xs-12 col-sm-4">
		    					<div class="single-link-image">
		    						<img src="<?php the_post_thumbnail('full'); ?>" alt="">
		    					</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-8">
			    				<h1><?php the_title(); ?></h1>
		    					<div class="hidden-xs"><?php the_excerpt()?></div>
		    				</div>
		    		</div>
		    	</a>
				<?php
				  endwhile;
				endif;
				wp_reset_query();                
				?>
				
				<div class="col-xs-12">
					<div class="page-pagination">
						<ul>
							<a href="#"><li class="active-button">1</li></a>
							<a href="#"><li>2</li></a>
							<a href="#"><li>3</li></a>
							<a href="#"><li>4</li></a>
							<a href="#"><li>999</li></a>
						</ul>
					</div>
				</div>
	    	</div>
	    </div>

<?php get_footer()?>