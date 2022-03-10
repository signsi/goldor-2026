@php
    if ( in_category('89')) {
        $the_query = new WP_Query( 
        array( 
            'post_type' => 'post',
            'posts_per_page' => '5',
            'post__not_in' => array( $post->ID ),
            //'category_name' => $category->name
            'category__in' => array('89'),
        ) 
        );
    } else {
        $the_query = new WP_Query( 
        array( 
            'post_type' => 'post',
            'posts_per_page' => '5',
            'post__not_in' => array( $post->ID ),
            // exclude category "job"
            'category__not_in' => array('89'),
        ) 
        );
    }
    if ($the_query->have_posts()) {
        if ( in_category('89')) {
            printf("<div class='wp-block-group alignfull'><div class='wp-block-group__inner-container'><div class='wp-block-group alignfull bg-bright'><div class='wp-block-group__inner-container'><div class='wp-block-group alignwide row--slim'><div class='wp-block-group__inner-container'><h2>Weitere Jobangebote</h2><ul class='newest-posts'>");
        } else {
            printf("<div class='wp-block-group alignfull'><div class='wp-block-group__inner-container'><div class='wp-block-group alignfull bg-bright'><div class='wp-block-group__inner-container'><div class='wp-block-group alignwide row--slim'><div class='wp-block-group__inner-container'><h2>Ausgewählte Beiträge</h2><ul class='newest-posts'>");
        }
        while ($the_query->have_posts()) {
            $the_query->the_post();
            ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php
        }
        echo '</ul></div></div></div></div></div></div>';
    } else {
        // no posts found
    }
    wp_reset_postdata();
@endphp