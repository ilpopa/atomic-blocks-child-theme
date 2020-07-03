<section class="hero is-fullheight-with-navbar is-large is-bold is-primary has-background">
    <?php $image = get_field('bg_image');	?>
    <?php $video = get_field('background_video');	?>
    <!-- Videotesti -->
    <div class="hero-body" style="background-image: url('<?php if( $image ) { echo $image; }  ?>');">
    
    <?php if( get_field('use_video') ) : ?>
        <div class="homepage-hero-module">
            
            <div class="video-container">
                <div class="filter"></div>
                    <video autoplay loop muted playsinline src="<?php if( $video ) { echo $video; }  ?>" class="fillWidth"></video>
                </div>
            </div>
            <div class="hero-text-container <?php the_field('content_align'); ?>">
                <h2 class="title"><?php the_field('headline'); ?></h2>
                <p class="subtitle"><?php the_field('paragraph'); ?></p>

                <?php if( have_rows('large_button') ): ?>
                    <?php while( have_rows('large_button') ): the_row(); ?>
                        <a class="button is-primary" href="<?php the_sub_field('button_link');?>"><?php the_sub_field('button_title');?></a>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>

    <?php else: ?>
        <div class="hero-container">
            <div class="hero-wrapper">
                <div class="hero-text-container <?php the_field('content_align'); ?>">
                    <h2 class="title"><?php the_field('headline'); ?></h2>
                    <p class="subtitle"><?php the_field('paragraph'); ?></p>

                    <?php if( have_rows('large_button') ): ?>
                        <?php while( have_rows('large_button') ): the_row(); ?>
                            <a class="button is-primary" href="<?php the_sub_field('button_link');?>"><?php the_sub_field('button_title');?></a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
	</div>
		
</section>