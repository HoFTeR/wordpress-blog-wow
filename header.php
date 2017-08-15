<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
    	<meta charset="utf-8" />
    	<title><?php wp_title("", true,"-"); ?> <?php bloginfo('name'); ?></title>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta charset="utf-8">
    	<?php wp_head()?>
	</head>
	<body>
	    <nav class="navbar navbar-default" role="navigation">
	        <div class="col-sm-1 col-md-2 new-padding">
	            <div class="navbar-header">
	            	<button type="button" class="navbar-toggle toogle1 collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"></button>
	            	<a class="navbar-brand" href="<?php bloginfo('url')?>"><?php the_custom_logo(); ?></a>
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-11 col-md-10 delete-padding">
	            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	            	<div class="container-fluid">
	                	<?php
						wp_nav_menu( array(
			                'menu'              => 'primary',
			                'theme_location'    => 'primary',
			                'depth'             => 0,
			                'container'         => '',
			                'menu_class'        => 'nav navbar-nav menu',
			                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			                'walker'            => new wp_bootstrap_navwalker())
			            );
			            ?>
			            <ul class="nav navbar-nav">
	                    	<li class="hidden-sm hidden-md hidden-lg">
	                    		<h3 class="menu-caption">Твій логін</h3>
	                    	</li>
	                    	<li class="user delete-padding col-sm-4 col-md-4">
	                    		<div class="avatar-container delete-padding">
	                    			<?php if (get_currentuserinfo()->user_login == null){?>
									    <div class="registration">
									    	<div class="registration-button">
										    	<a class="col-xs-8" href="<?php echo get_settings('siteurl'); ?>/wp-register.php">Реєстрація</a>
										    </div>
									    </div>
									    <div class="login">
									    	<div class="login-button">
										        <a class="col-xs-4" href="<?php echo get_settings('siteurl'); ?>/wp-login.php">Вхід</a>
										    </div>
									    </div>
									<?php 
										}
									    else{?>
									    	<div class="user-photo col-sm-3">
			                    				<?php echo get_avatar( get_current_user_id(), 64 );
			                    				?>
			                    				<img src="<?php bloginfo('template_url'); ?>/img/photo_background.png" alt="">
			                    			</div>
									        <!-- //робоче - виводить ім'я, яке вказав чувак у адмін панелі: -->
									       	<p class="user-name"><?php echo 'Вітаю, ' . get_currentuserinfo()->user_login;?></p>
									       	<a class="exit-button" href="<?php echo wp_logout_url( home_url() ); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
									       	<?php
									    }
									?>
	                    			<!-- тут стояв той код -->
	                    		</div>
	                    	</li>
	                    	<li class="separator hidden-sm hidden-md hidden-lg">
	                    		<img src="<?php bloginfo('template_url'); ?>/img/separator.png" alt="">
	                    	</li>
	                    	<li class="separator hidden-sm hidden-md hidden-lg">
	                    		<h3 class="menu-caption">Мої соцмережі</h3>       		
	                    		<div class="col-xs-4">
									<a href="https://www.facebook.com/alex.havanchuk">
										<div class="sn-facebook"></div>
									</a>
	                    		</div>
	                    		<div class="col-xs-4">
	                    			<a href="https://www.instagram.com/alex.hofter">
	                    				<div class="sn-insta"></div>
	                    			</a>
	                    		</div>
	                    		<div class="col-xs-4">
	                    			<a href="https://www.twitter.com/HoFTeR_">
	                    				<div class="sn-twitter"></div>
	                    			</a>
	                    		</div>
	                    		<img src="<?php bloginfo('template_url'); ?>/img/separator.png" alt="">
	                    	</li>
	                	</ul>
	            	</div>
	          	</div>
	        </div>
	    </nav>

	    <div class="search-box">
	    	<div class="container-fluid">
				<form class="form-search" action="<?php bloginfo( 'url' ); ?>" method="get">
					<div class="input-append">
						<p>
							<input type="search" name="s" class="span2 search-query" placeholder="Напиши і знайдеш" value="<?php if(!empty($_GET['s'])){echo $_GET['s'];}?>">
						</p>
			    		<p><button type="submit" class="btn">Знайти</button></p>
			  		</div>
			  	</form>
			</div>
		</div>