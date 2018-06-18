<?php if( have_rows('partner') ): ?>

    <div class="partner-carousel">

    <?php while ( have_rows('partner') ) : the_row(); ?>

        <figure>
            <?php 
                $image = get_sub_field('partner_logo');
                echo wp_get_attachment_image( $image['ID'], 'large', false, '' );  
            ?>
            <figcaption>
                <?php the_sub_field('partner_description'); ?>
            </figcaption>
        </figure>

    <?php endwhile; ?>
    </div>
<?php else : ?>

<?php endif; ?>