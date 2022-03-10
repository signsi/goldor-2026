<?php

namespace App;

// WooCommerce

// Add short description to loop
/*add_action( 'woocommerce_after_shop_loop_item_title', function () {
global $product;
?>
<div itemprop="description">
<?php echo substr( apply_filters( 'the_content', $product->get_description() ), 0,80 ); echo '...' ?> Text-Cropping oder Kurz-Beschreibung
<?php echo apply_filters( 'woocommerce_short_description', $product->get_short_description() ) ?>
</div>
<?php
} );*/

// Define is_woocommerce_activated
function is_woocommerce_activated()
{
    return class_exists('woocommerce');
}

// Define if is login page
function is_inside_login_page()
{
    //true if login page URL is still normal
    if (in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'))) {
        return true;
    }

    //true if login page URL is changed by some security plugins
    if (has_action('login_init')) {
        return true;
    }

    //Else if nothing above happens >> return false
    return false;
}

// move woocommerce breadcrumb
add_action('woocommerce_before_main_content', function () {
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
});

add_action('woo_custom_breadcrumb', function () {
    woocommerce_breadcrumb();
});

// change sale utton text
add_filter('woocommerce_sale_flash', function () {
    return '<span class="onsale">Sale</span>';
});

// change has been added to your cart text
add_filter( 'wc_add_to_cart_message_html', function ( $message, $products ) {
    $count = 0;
    $titles = array();
    foreach ( $products as $product_id => $qty ) {
    $titles[] = ( $qty > 1 ? absint( $qty ) . ' &times; ' : '' ) . sprintf( _x( '&ldquo;%s&rdquo;', 'Item name in quotes', 'woocommerce' ), strip_tags( get_the_title( $product_id ) ) );
    $count += $qty;
    }
    $titles     = array_filter( $titles );
    $added_text = sprintf( _n(
        '%s wurde zum Warenkorb hinzugefügt.', // Singular
        '%s wurden zum Warenkorb hinzugefügt.', // Plural
    $count, // Number of products added
    'woocommerce' // Textdomain
    ), wc_format_list_of_items( $titles ) );
    $message    = sprintf( '<a href="%s" class="button wc-forward">%s</a> %s', esc_url( wc_get_page_permalink( 'cart' ) ), esc_html__( 'View cart', 'woocommerce' ), esc_html( $added_text ) );

    return $message;
}, 10, 2 );


// turn on lightbox for gallery
add_action('after_setup_theme', function () {
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
});

// Plus Minus
add_action('woocommerce_after_add_to_cart_quantity', function () {
    echo '<button type="button" class="plus" ><i class="fal fa-plus"></i></button>';
});

add_action('woocommerce_before_add_to_cart_quantity', function () {
    echo '<button type="button" class="minus" ><i class="fal fa-minus"></i></button>';
});

//* removes default woocommerce tabs from single product page
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs');

add_action('woocommerce_single_product_summary', function () {
    $tabs = apply_filters('woocommerce_product_tabs', array());
    if (!empty($tabs)):

        echo '<div class="woocommerce-tabs wc-tabs-wrapper">';
        echo '<div class="wc-prd-accordion" role="tablist">';

        foreach ($tabs as $key => $tab):
            echo '<div class="wc-prd-accordion-item">';
            echo '<div class="wc-prd-accordion-button" aria-selected="false" aria-expanded="false" role="tab">';
            echo '<span class="wc-prd-accordion-label">' . apply_filters('woocommerce_product_' . $key . '_tab_title', esc_html($tab['title']), $key) . '</span>';
            echo '<span class="wc-prd-accordion-pm"><i class="fal fa-chevron-down"></i></span>';
            echo '</div>';

            if (isset($tab['callback'])) {
                echo '<div class="wc-prd-accordion-content clearfix" aria-selected="false" aria-hidden="true" role="tabpanel">';
                call_user_func($tab['callback'], $key, $tab);
                echo '</div>';
            }
            echo '</div>';
        endforeach;

        echo '</div>';
        echo '</div>';

    endif;
}, 30);

// Add Social Share without plugin
add_action('woocommerce_single_product_summary', function () {
    echo '<div class="woocommerce-socialshare"><ul>';
    echo '<li><a target="_blank" class="fab fa-linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=' . get_permalink() . '&title=' . get_the_title() . '"></a></li>';
    echo '<li><a target="_blank" class="fab fa-twitter" href="https://twitter.com/intent/tweet?url=' . get_permalink() . '&text=' . get_the_title() . '&via=' . get_the_author() . '" title="Tweet this"></a></li>';
    echo '<li><a target="_blank" class="fab fa-facebook-f" href="https://www.facebook.com/sharer/sharer.php?u=' . get_permalink() . '" title="Share on Facebook"></a></li>';
    echo '<li><a class="fab fa-whatsapp" href="https://api.whatsapp.com/send/?phone&text=Hier ist ein Artikel, der dich interessieren könnte: *' . get_the_title() . '* - ' . get_permalink() . '." target="_blank" data-action="share/whatsapp/share" target="_blank"></a></li>';
    echo '<li><a class="fas fa-envelope" href="mailto:?subject=' . get_the_title() . '&body=Hier ist ein Artikel, der dich interessieren könnte: &#32;&#32;' . get_permalink() . '" title="Artikel weiterleiten" target="_blank"></a></li>';
    echo '</ul></div>';
}, 35);

// Add Icon Count for Mini Cart
add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {
    $fragments['div.header-cart-count'] = '<div class="header-cart-count">' . WC()->cart->get_cart_contents_count() . '</div>';
    return $fragments;
}, 10, 1);

add_filter('sage-woocommerce/templates', function ($paths) {
    $paths[] = WP_PLUGIN_DIR . '/woocommerce-subscriptions/templates/';
    return $paths;
});

// change woocommerce thumbnail image size 4x3
// add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function ( $size ) {
//     // Gallery thumbnails: proportional, max width 200px
//     return array(
// 		'width'  => 180,
//         'height' => 135,
//         'crop'   => 1,
//     );
// } );

// Replace Text-Strings in WooCommerce
add_filter('gettext', function ($translated) {
    $text = array(
        'vorrätig' => 'Artikel an Lager',
        'Nicht Artikel an Lager' => 'Auf Anfrage',
        'View cart' => 'Warenkorb ansehen',
        'removed.' => 'wurde aus dem Warenkorb entfernt. ',
        'Undo?' => 'Rückgängig machen?',
        'Cart updated.' => 'Warenkorb aktualisiert',
        'Product' => 'Artikel',
        'Quantity' => 'Menge',
        'Price' => 'Preis',
        'Subtotal' => 'Zwischensumme',
        'Shipping' => 'Lieferadresse',
        'Payment method' => 'Zahlungsmethode',
        'Billing address' => 'Rechnungsadresse',
        'You can access your account area to view your orders and change your password' => 'Du kannst auf deinen Kontobereich zugreifen, um deine Bestellungen einzusehen und dein Passwort zu ändern',
        'View Account' => 'Konto ansehen',
        'For your reference, your order details are shown below.' => 'Zu deinen Information finden du nachstehend die Einzelheiten deiner Bestellung.',
        'Reset Password' => 'Passwort zurücksetzen',
        'Vielen Dank. Ihre Bestellung ist eingegangen.' => 'Vielen Dank für deine Bestellung',
        'Invalid username or email.' => 'Ungültiger Benutzername oder E-Mail.',
        'This password reset key is for a different user account. Please log out and try again.' => 'Dieser Schlüssel zum Zurücksetzen des Passworts ist für ein anderes Benutzerkonto. Bitte melden Sie sich ab und versuchen Sie es erneut.',
        'Passwords do not match.' => 'Die Kennwörter stimmen nicht überein.',
        'Incorrect username or password.' => 'Falscher Benutzername oder falsches Passwort.',
        'attempts remaining.' => 'verbleibende Versuche.',
        'attempt remaining.' => 'verbleibender Versuch.',
        'An account is already registered with your email address.' => 'Es ist bereits ein Konto mit Ihrer E-Mail-Adresse registriert.',
        'Please provide a valid email address.' => 'Bitte geben Sie eine gültige E-Mail Adresse an.',
        'Please log in.' => 'Bitte melden Sie sich an.',
        'Username is required' => 'Benutzername ist erforderlich',
        'The password field is empty' => 'Das Passwortfeld ist leer',
        'January' => 'Januar',
        'February' => 'Februar',
        'March' => 'März',
        'April' => 'April',
        'May' => 'Mai',
        'June' => 'Juni',
        'July' => 'Juli',
        'August' => 'August',
        'September' => 'September',
        'October' => 'Oktober',
        'November' => 'November',
        'December' => 'Dezember',
        'Mehrwertsteuer' => 'MwSt.',
        'Pay for this order' => 'Für diese Bestellung bezahlen',
        'Ausführung wählen' => 'Zum Artikel',
        'Weiterlesen' => 'Zum Artikel',
        'The card number is incomplete' => 'Die Kartennummer ist unvollständig',
        'Card number' => 'Kartennummer',
        'Card Code' => 'Prüfziffer',
        'Expiry Date' => 'Verfallsdatum',
        'Save payment information to my account for future purchases.' => 'Zahlungsinformationen für zukünftige Einkäufe auf meinem Konto speichern.',
        'The card\'s expiration date is incomplete.' => 'Das Verfallsdatum der Karte ist unvollständig.',
        'Verfügbar bei Nachlieferung' => 'Lieferrückstand: Verfügbar bei Nachlieferung',
    );
    $translated = str_ireplace(array_keys($text),  $text,  $translated);
    return $translated;
}, 20);


// Add Product Category Class and Parent Category Class to body
add_filter( 'body_class', function ( $classes ){
    $custom_terms = get_the_terms(0, 'product_cat');
    if ($custom_terms) {
      foreach ($custom_terms as $custom_term) {

        // Check if the parent category exists:
        if( $custom_term->parent > 0 ) {
            // Get the parent product category:
            $parent = get_term( $custom_term->parent, 'product_cat' );
            // Append the parent class:
            if ( ! is_wp_error( $parent ) )
                $classes[] = 'product_parent_cat_' . $parent->slug;
        }

        $classes[] = 'product_cat_' . $custom_term->slug;
      }
    }
    return $classes;
} );

// Versandtarife ausblenden, wenn kostenloser Versand möglich ist.
add_filter( 'woocommerce_package_rates', function ( $rates, $package ) {
    // Only unset rates if free_shipping is available
    if ( isset( $rates['free_shipping:2'] ) ) {
         unset( $rates['flat_rate:1'] );
    }
    return $rates;
}, 10, 2 );

// Auswahl der Varianten ausgrauen, wenn der Lagerstatus auf nicht verfügbar ist
add_filter( 'woocommerce_variation_is_active', function ( $active, $variation ) {
    if( ! $variation->is_in_stock() ) {
    return false;
    }
    return $active;
}, 10, 2 );

// Öffne auf der Kassenseite den AGB-Link in einem neuen Tab, wenn when clicked on the checkout page
add_action( 'wp', function () {
    remove_action( 'woocommerce_checkout_terms_and_conditions', 'wc_terms_and_conditions_page_content', 30 );
} );