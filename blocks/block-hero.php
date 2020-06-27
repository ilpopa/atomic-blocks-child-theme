<style>
    .block-hero {
        background-size: cover;
    }
    .block-hero_container {
        max-width: 1080px;
        margin: auto;
        display: flex;
        min-height: 90vh;
        align-items: center;
        justify-content: space-between;
        padding: 40px 20px;
    }
    .block-hero_wrapper { 
        max-width: 600px;
    }
    .block-hero_heading { 
        color: #fff;
    }
    .block-hero_heading:after { 
        color: #fff;
    }
    .block-hero_text { 
        color: #fff;
        margin-bottom: 40px;
    }
    .block-hero_button-1,
    .block-hero_button-2 {
        display: inline-block;
        background-color: #fff;
        padding: 8px 24px;
        border-radius: 3px;
        color: #333;
        border-radius: 0;
        border: solid #fff 2px;
        background-color: transparent;
        color: #fff;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 10px
    }
    .block-hero_button-1 {
        margin-right: 10px;
        background-color: #fff;
        color: inherit;
    }
</style>
<?php
    $background_alpha = block_value( 'background-darken') / 100;
    $heading_size = block_value( 'heading-size') / 10 + 2;
    $orientation = block_value( 'orientation' );
    $text_color = block_value( 'text-color' );

    if ( $text_color == 'dark' ) {
        $font_color = '#272c30';
    } else {
        $font_color = "#fff";

    }
    if ( $orientation == 'left' ) {
        $justify_content = 'flex-start';
    } elseif ( $orientation == 'center' ) {
        $justify_content = 'center';
    } else {
        $justify_content = 'flex-end';
    }
?>
<section class="block-hero" style="background-image: url('<?php block_field( 'background-image'); ?>'); background-color: <?php block_field( 'background-color' ) ?>;">
    <div class="block-hero_background-darken" style="background-color: rgba(0,0,0, <?php echo $background_alpha ?>);">
        <div class="block-hero_container" style="justify-content: <?php echo $justify_content; ?>">
            <div class="block-hero_wrapper" style="text-align:<?php echo $orientation; ?>">
                <h1 class="block-hero_heading" style="font-size: <?php echo $heading_size; ?>em; color:<?php echo $font_color; ?>"><?php block_field( 'heading');?></h1>
                <p class="block-hero_text" style="color:<?php echo $font_color; ?>"><?php block_field( 'text'); ?></p>
               
                <?php
                $url1 = block_field( 'button-1-url', false );
                $url2 = block_field( 'button-2-url', false ); ?>

                <div>
                <?php if( !empty( $url1 ) || !empty( $url2 )  ) : ?> 
                    <?php
                    if( !empty( $url1 ) ) : ?>   
                        <a class="block-hero_button-1" href="<?php block_field( 'button-1-url'); ?>"><?php block_field( 'button-1-text'); ?></a> 
                    <?php endif; ?>
                    <?php
                    if( !empty( $url2 ) ) : ?>   
                        <a class="block-hero_button-2" style="color:<?php echo $font_color; ?>" href="<?php block_field( 'button-2-url'); ?>"><?php block_field( 'button-2-text'); ?></a>
                    <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>   
    </div>
</section>