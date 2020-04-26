<!DOCTYPE html>
<html	<?php	language_attributes();	?>>
<head>
	<meta charset="<?php bloginfo('charset');	?>">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<link rel="shortcut icon" href="http://cdn.productivitytools.tech/images/PT/ProductivityTools_green_40px_3.png" type="image/x-icon">
	<?php wp_head(); ?>
	<title>
		<?php bloginfo('name'); ?>
	</title>
		<header>
			<div class="middleColumn">
				<div class="topLogo">
					<img src="http://cdn.productivitytools.tech/images/PT/ProductivityTools_white_transparent_53px_2.png">
				</div>
				<div class="textLogo">
					<h1><a href="/"><?php bloginfo('name'); ?></a></h1>
					<small><?php bloginfo('description'); ?></small>
				</div>
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
	<div class="middleColumn" id="content">
		<div class="articles">
			<?php if(have_posts()):	?>
				<?php while(have_posts()): the_post(); ?>
					<article class="post">
						<p class="article-category">
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

						<h3>
							<a href="<?php the_permalink(); ?>">
								<?php the_title();?>
							</a>
						</h3>
						<?php the_content("(...)"); ?>
					</article>
					
				<?php endwhile;?>			
			<?php else: ?>
				<?php echo wpautop('Sorry, No posts were found');?>
			<?php	endif;	?>

			<?php echo do_shortcode('[ajax_load_more container_type="div" post_type="post" scroll="false" button_label="More" offset="5"]'); ?>
		</div>
		<div class="sidebar">
			<?php	if(is_active_sidebar('sidebar'))	:	?>
				<?php dynamic_sidebar('sidebar');	?>
			<?php endif;	?>
		</div>
		
	

	</div>
	<?php wp_footer(); ?>
</body>
</html>