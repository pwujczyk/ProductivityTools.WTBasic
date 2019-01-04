<!DOCTYPE html>
<html	<?php	language_attributes();	?>>
<head>
	<meta charset="<?php	bloginfo('charset');	?>">
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<title>
		<?php bloginfo('name'); ?>
	</title>
		<header>
			<div class="content">
			<a href="/"><h1><?php bloginfo('name'); ?></h1></a>
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
		<div class="content">
			
			<?php if(have_posts()):	?>
				<?php while(have_posts()): the_post(); ?>
					<article class="post">
						<?php if(has_post_thumbnail()): ?>
							<div class="post-thumbnail">
								<?php the_post_thumbnail();	?>
							</div>
						<?php endif;?>	
						<h3>
							<a href="<?php the_permalink(); ?>">
								<?php the_title();?>
							</a>
						</h3>
						<div class="meta">Created: <?php the_date('Y.m.d'); ?></div>
						<?php the_content();?>
					</article>
				<?php endwhile;?>
			<?php else: ?>
				<?php echo wpautop('Sorry, No posts were found');?>
			<?php	endif;	?>
		</div>
	</body>
</html>