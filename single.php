<!DOCTYPE html>
<html	<?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<?php wp_head(); ?>
	<title>
		<?php bloginfo('name'); ?>
	</title>
		<header>
			<div class="middleColumn">
			<a href="/"><h1><?php bloginfo('name'); ?></h1></a>
					<small><?php bloginfo('description'); ?></small>
			</div>
		</header>
		<?php if(has_nav_menu('primary')): ?>
			<nav class="main-nav">
				<div class="container middleColumn">
					<?php $args	= array('theme_location' =>	'primary');	?>
					<?php wp_nav_menu($args);	?>
				</div>
			</nav>
		<?php endif;?>
</head>
	<body>
		<div class="middleColumn">
			<?php if(have_posts()):	?>
				<?php while(have_posts()): the_post(); ?>
					<article class="post">
						<div>
							<p class="full-article-published">Published: <?php the_date('Y.m.d'); ?></p>
							<p class="full-article-category">
								<?php
									$categories	=	get_the_category();
									$separator	=	",	";
									$output	=	'Category: ';
									if($categories){
										foreach($categories	as	$category){
											$output	.=	'<a	href="'.get_category_link($category->term_id).'">'.
											$category->cat_name.'</a>'.$separator;
										}
									}
								echo trim($output,	$separator);
								?>
							</p>
						</div>

						<?php if(has_post_thumbnail()): ?>
							<div class="post-thumbnail">
								<?php the_post_thumbnail();	?>
							</div>
						<?php endif;?>	
						<h3 class="full-article-title">
							<a href="<?php the_permalink(); ?>">
								<?php the_title();?>
							</a>
						</h3>
						
						<?php the_content();?>
					</article>
				<?php endwhile;?>
			<?php else: ?>
				<?php echo wpautop('Sorry, No posts were found');?>
			<?php	endif;	?>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>