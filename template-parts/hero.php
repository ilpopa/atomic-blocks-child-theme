<section class="hero is-fullheight-with-navbar is-large is-bold is-primary has-background">
<?php $image = get_field('background_image');	?>

		<div class="hero-body" style="background-image: url('<?php if( $image ) { echo $image['url']; }  ?>');">
			<div class="hero-container">
                <div class="hero-text-container <?php the_field('content_align'); ?>">
                    <h1 class="title"><?php the_field('headline'); ?></h1>
                    <p class="subtitle"><?php the_field('paragraph'); ?></p>

                    <?php if( have_rows('large_button') ): ?>
                        <?php while( have_rows('large_button') ): the_row(); ?>
                            <a class="button is-primary" href="<?php the_sub_field('button_link');?>"><?php the_sub_field('button_title');?></a>
                        <?php endwhile; ?>
                    <?php endif; ?>
            </div>
		</div>
	</div>
		
</section>