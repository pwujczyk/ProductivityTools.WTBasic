<!DOCTYPE html>
<html	<?php	language_attributes();	?>>
<head>
	<meta charset="<?php bloginfo('charset');	?>">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<?php wp_head(); ?>
	<title>
		<?php bloginfo('name'); ?>
	</title>
		<header>
			<div class="content">
					<h1><?php bloginfo('name'); ?></h1>
					<small><?php bloginfo('description'); ?></small>
			</div>
		</header>
		<nav class="main-nav">
			<div class="container content">
				<?php $args	=	array('theme_location'	=>	'primary');	?>
				<?php	wp_nav_menu($args);	?>
			</div>
		</nav>
		
</head>
<body>
	<div class="content" id="content">
			<?php if(have_posts()):	?>
				<?php while(have_posts()): the_post(); ?>
					<article class="post">
						<h3>
							<a href="<?php the_permalink(); ?>">
								<?php the_title();?>
							</a>
						</h3>
						<div class="meta">Created: <?php the_date('Y.m.d'); ?></div>
						<?php the_excerpt(); ?>
					</article>
					
				<?php endwhile;?>			
			<?php else: ?>
				<?php echo wpautop('Sorry, No posts were found');?>
			<?php	endif;	?>
			<div class="navigation"><p><?php posts_nav_link(); ?></p></div>
			<div class="sidebar">
				Test
			</div>
			<?php echo do_shortcode('[ajax_load_more container_type="div" post_type="post" scroll="false"]'); ?>

	</div>
	<?php wp_footer(); ?>
</body>
</html>