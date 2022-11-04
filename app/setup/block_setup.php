<?php

use function Roots\bundle;

add_filter( 'genesis_custom_blocks_default_fields', function($default_fields){

    $default_fields['spacings']  = ['type' => 'object'];
    $default_fields['hideElement']  = ['type' => 'boolean'];
    $default_fields['hoverGroup']  = ['type' => 'boolean'];
    $default_fields['animation']  = ['type' => 'string'];
    $default_fields['layoutWidth']  = ['type' => 'string'];
    $default_fields['isLayoutOffset']  = ['type' => 'string'];
    $default_fields['gap']  = ['type' => 'string'];

    return $default_fields;
});

add_filter( 'genesis_custom_blocks_get_block_attributes', function($attributes){

    $attributes['spacings']  = [
        'type' => 'object',
        'default' => [
            'p' => [
                't' => '',
                'r' => '',
                'b' => '',
                'l' => '',
            ],
            'm' => [
                't' => '',
                'r' => '',
                'b' => '',
                'l' => '',
            ],
        ]
    ];
    $attributes['hideElement']  = [
        'type' => 'boolean' ,
        'default' => false
    ];
    $attributes['hoverGroup']  = [
        'type' => 'boolean' ,
        'default' => false
    ];
    $attributes['animation']  = [
        'type' => 'string' ,
        'default' => '-'
    ];
    $attributes['layoutWidth']  = [
        'type' => 'string' ,
        'default' => 'is-style-layout-default'
    ];
    $attributes['isLayoutOffset']  = [
        'type' => 'string' ,
        'default' => '-'
    ];
    $attributes['gap']  = [
        'type' => 'string' ,
        'default' => '-'
    ];

    return $attributes;
} );

add_action('genesis_custom_blocks_render_template_rocketpager-text-image-list', function () {
    bundle('block.text-image-list')->enqueue();
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-audio-image-box', function () {
    bundle('block.audio-image')->enqueue();
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-accordion', function () {
    bundle('block.accordion')->enqueue();
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-hero-slider', function () {
    bundle('block.hero-slider')->enqueue();
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-content-slider', function () {
    bundle('block.content-slider')->enqueue();
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-carousel-slider', function () {
    wp_enqueue_script('youtube-iframe-api', 'https://www.youtube.com/iframe_api', ['block.videoelement/1'], null, true);
    bundle('block.carousel-slider')->enqueue();
    bundle('block.videoelement')->enqueue();
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-carousel-header', function () {
    bundle('block.carousel-header')->enqueue();
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-testimonial-slider', function () {
    bundle('block.testimonial-slider')->enqueue();
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-modal', function () {
    bundle('block.modal')->enqueue();
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-videoelement', function () {
    wp_enqueue_script('youtube-iframe-api', 'https://www.youtube.com/iframe_api', ['block.videoelement/1'], null, true);
    bundle('block.videoelement')->enqueue();
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-google-maps', function () {
    $API_KEY = App\getThemeOption('google_api_key');
    bundle('block.google-maps')->enqueue()->localize('google_api_key', ['google_api_key' => $API_KEY]);
}, 10, 3);

add_action('genesis_custom_blocks_render_template_rocketpager-news-list', function () {
    $ajax_url = admin_url('admin-ajax.php');
    bundle('ajax')->enqueue()->localize('load_more_posts', [
        'ajaxurl' => esc_url($ajax_url),
        'theme_directory_uri' => get_template_directory_uri()
    ]);
}, 10, 3);

if (!function_exists('rocket_ajax_load_more')):
    function rocket_ajax_load_more() {
        $args = json_decode(wp_unslash($_POST['json_data']), true);

        $query_args = $args['query_args'];
        $block_args = $args['block_args'];

        $ajax_query = new WP_Query($query_args);

        // Determine which preview to use based on the post_type
        $post_type = $ajax_query->get('post_type');

        // Default to the "post" post type for previews
        if (!$post_type || is_array($post_type)) {
            $post_type = 'post';
        }

        // Calculate the current offset
        $iteration = intval($ajax_query->query['posts_per_page']) * intval($ajax_query->query['paged']);
        $project_index = $iteration;
        $post_data = [];
        $index = 0;
        if ($ajax_query->have_posts()):
            while ($ajax_query->have_posts()): $ajax_query->the_post();

                global $post;

                $iteration++;
                // subtract the already shown projects
                $project_index = $iteration - $ajax_query->query['posts_per_page'];

                /**
                 * Fires before output of a grid item in the posts loop.
                 *
                 * Allows output of custom elements within the posts loop, like banners.
                 * To add markup spanning the entire width of the posts grid, wrap it in the following element:
                 * <div class="grid-item col-1">[Your content]</div>
                 * @param int   $post_id     Post ID.
                 * @param int   $iteration     The current iteration of the loop.
                 */

                //do_action('rocket_posts_loop_before_grid_item', $post->ID, $iteration);
                // Variables
                $categories = get_the_category();
                $first_cat = $categories[0]->name;
                $first_cat_url = get_category_link($categories[0]->term_id);
                // path to theme root
                // lass="cell animate__animated animate__fadeInUp <?php echo $delays[$index]
                ob_start();

                $blade_path = $block_args['element_path'];
                echo \Roots\view($blade_path, $block_args)->render();

                /**
                 * Fires after output of a grid item in the posts loop.
                 */

                //do_action('rocket_posts_loop_after_grid_item', $post->ID, $iteration);
                $out = ob_get_clean();
                $post_data[] = [
                    "content" => trim($out),
                    "index" => $project_index,
                ];
                $index++;
            endwhile;
            print_r(json_encode($post_data));
        endif;

        wp_die();
    }
    add_action('wp_ajax_nopriv_rocket_ajax_load_more', 'rocket_ajax_load_more');
    add_action('wp_ajax_rocket_ajax_load_more', 'rocket_ajax_load_more');
endif;

if (!function_exists('rocket_ajax_get_max_num_pages')):
    function rocket_ajax_get_max_num_pages(){

        $query_args = json_decode(wp_unslash($_POST['json_data']), true);

        $the_query = new WP_Query($query_args);

        print_r($the_query->max_num_pages);

        wp_die();
    }
    add_action('wp_ajax_nopriv_rocket_ajax_get_max_num_pages', 'rocket_ajax_get_max_num_pages');
    add_action('wp_ajax_rocket_ajax_get_max_num_pages', 'rocket_ajax_get_max_num_pages');
endif;