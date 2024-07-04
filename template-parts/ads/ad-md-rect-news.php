<?php

$loop = $loopWerbung;
while ($loop->have_posts()):
    $loop->the_post();
    $thumb_id = get_post_meta(get_the_ID(), 'werbemittel', true);
    $thumb_url = wp_get_attachment_image_src($thumb_id, 'full');
    $link = get_post_meta(get_the_ID(), 'url', true); ?>
    <div class="grid-item">
        <a href="<?php echo str_replace('http://http://', 'http://', 'http://' . $link); ?>" target="_blank"><img
                class="ad-news" width="300" height="250" class="ad" src="<?php echo $thumb_url[0]; ?>"
                title="<?php the_title(); ?>" class="item-image"></a>
    </div>
<?php endwhile; ?>