<?php 
/**
 * 
 * Outputs the individual columns for Competitor Comparison table. 
 * 
 */

function competitor_columns( $column ){

    // Determines which query to use based on column position 
    if ( $column == 'features' ){
        $the_query = new WP_Query( 
            array(
                'post_type'  	    => 'competitors',
                'posts_per_page'    => 1,
            ) 
        );  
    }elseif ( $column == 'flaunt-sites' ){ 
        $the_query = new WP_Query( 
            array(
                'post_type'  	    => 'competitors', 
                'posts_per_page'    => 1,
                'p'                 => '79',
            )
        );
    }elseif ( $column == '' ){
        $the_query = new WP_Query( 
            array(
                'post_type'  	    => 'competitors', 
                'post__not_in'      => array(79),
            )
        );       
    }

    // Start loop
    if ( $the_query->have_posts() ) : ?>
        <!-- the loop -->
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <div class="competitor">

                <h3><!-- The Title  -->
                    <?php if ( $column == 'features' ) { 
                        echo  'Features';
                    }elseif ( $column == 'flaunt-sites' ){
                        echo get_the_title();
                    }elseif ( $column == '' ){
                        echo get_the_title();
                    }?>
                </h3>
                
                <ul><!-- The List of Features -->  

                    <?php if ( $column == 'features' ){

                        $features = get_field_objects(); 

                        foreach( $features as $feature  ): ?>
                            <li><?php echo $feature[ 'label' ]; ?></li>
                        <?php endforeach;

                    }else{

                        $features = get_field_objects();

                        foreach ( $features as $feature ):
                            $value = $feature['value'];
                            $label = $feature['choices'][ $value ]; ?>

                            <li style="color:<?php echo $value; ?>;"><?php echo $label; ?></li>
                            <?php endforeach;
                    }?>

                </ul>
            </div>

        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>

        <?php else : ?>
        <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>

    <?php endif; ?>                        

<?php }

