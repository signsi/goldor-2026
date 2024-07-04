<?php
$args = array(
    'post_type' => array('post', 'artikel'),
    'posts_per_page' => 1,
    'meta_query' => array(
        array(
            'key' => 'topstory',
            'value' => '1',
            'compare' => '=='
        )
    )
);

$loop = new WP_Query($args);

while ($loop->have_posts()):
    $loop->the_post();
    $thumb_id = get_post_thumbnail_id();
    $thumb_url = wp_get_attachment_image_src($thumb_id, 'large', true);
    $categories = get_the_category();
    $link = get_post_permalink();
    ?>
    <!-- style="background-image:url(<?php echo $thumb_url[0]; ?>)" -->
    <div class="top-story" onclick="location.href='<?php echo $link; ?>'">
        <div class="top-story-img">
            <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail('large');
            } else {
                echo '<img src="' . get_template_directory_uri() . '/img/placeholder.png" />';
            }
            ?>
        </div>
        <div class="top-story-text">
            <div class="top-story-title">
                <h1><a href="<?php echo $link ?>"><?php the_title(); ?></a></h1>
            </div>
            <!-- <div class="top-story-excerpt"><?php the_excerpt(); ?></div> -->
        </div>
    </div><!-- .top-story -->
<?php endwhile;

