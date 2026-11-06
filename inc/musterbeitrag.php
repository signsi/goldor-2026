<?php
/**
 * The "Musterbeitrag": one Fachartikel that shows every building block the
 * site renders — lead, headings, lists, quote, picture with caption, gallery,
 * video, table, small print and the slider gallery — each explained in its
 * own words. It is the editors' template and a source of ideas.
 *
 * It ships as code, not content: the Handbuch creates it on request, with
 * pictures picked from the site's own media library, so it works the same on
 * every installation. It is private (only logged-in editors see it) and dated
 * far back, so it never surfaces among the newest entries. "Als Vorlage
 * verwenden" copies it into a new draft.
 *
 * @package goldor
 */

const GOLDOR_MUSTER_OPTION = 'goldor_musterbeitrag_id';

function goldor_musterbeitrag_id() {
	$id = (int) get_option( GOLDOR_MUSTER_OPTION, 0 );
	return $id && get_post( $id ) && 'trash' !== get_post_status( $id ) ? $id : 0;
}

/**
 * Pictures from the media library for the template: a large landscape one for
 * the featured image, one for the text, a set for the galleries.
 *
 * @return array{hero: int, inline: int, gallery: int[]}
 */
function goldor_musterbeitrag_pick_images() {
	$ids = get_posts(
		array(
			'post_type'      => 'attachment',
			'post_status'    => 'inherit',
			'post_mime_type' => array( 'image/jpeg', 'image/png', 'image/webp' ),
			'posts_per_page' => 400,
			'fields'         => 'ids',
			'no_found_rows'  => true,
		)
	);

	$hero    = 0;
	$picked  = array();
	foreach ( $ids as $id ) {
		$meta = wp_get_attachment_metadata( $id );
		if ( empty( $meta['width'] ) || empty( $meta['height'] ) || goldor_is_cutout_image( $id ) ) {
			continue;
		}
		$ratio = $meta['width'] / $meta['height'];
		if ( ! $hero && goldor_titelbild_suits_full_width( $id ) ) {
			$hero = $id;
			continue;
		}
		if ( $meta['width'] >= 1000 && $ratio >= 1.2 && $ratio <= 1.8 ) {
			$picked[] = $id;
		}
		if ( $hero && count( $picked ) >= 7 ) {
			break;
		}
	}

	return array(
		'hero'    => $hero ? $hero : ( $picked ? array_shift( $picked ) : 0 ),
		'inline'  => $picked ? array_shift( $picked ) : 0,
		'gallery' => array_slice( $picked, 0, 6 ),
	);
}

/**
 * The template's text. Classic HTML first (as the editors write in the
 * "Klassisch" block), then the slider gallery as a block, then the small print.
 */
function goldor_musterbeitrag_content( $images ) {
	$inline = '';
	if ( $images['inline'] ) {
		$id      = $images['inline'];
		$large   = wp_get_attachment_image_src( $id, 'large' );
		$full    = wp_get_attachment_image_url( $id, 'full' );
		$inline  = sprintf(
			'[caption id="attachment_%1$d" align="alignnone" width="%2$d"]<a href="%3$s"><img class="size-large wp-image-%1$d" src="%4$s" alt="Beispielbild" width="%2$d" height="%5$d" /></a> Bildlegende: Sie steht unter dem Bild. Weil das Bild auf die Mediendatei verlinkt ist, öffnet ein Klick es gross.[/caption]',
			$id,
			$large[1],
			esc_url( $full ),
			esc_url( $large[0] ),
			$large[2]
		);
	}

	$gallery = $images['gallery'] ? '[gallery ids="' . implode( ',', $images['gallery'] ) . '" columns="3"]' : '';

	$slider = '';
	if ( $images['gallery'] ) {
		$figures = '';
		foreach ( array_slice( $images['gallery'], 0, 4 ) as $n => $id ) {
			$src      = wp_get_attachment_image_url( $id, 'large' );
			$figures .= "<!-- wp:image {\"id\":{$id},\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n"
				. '<figure class="wp-block-image size-large"><img src="' . esc_url( $src ) . '" alt="" class="wp-image-' . $id . '"/><figcaption class="wp-element-caption">Bild ' . ( $n + 1 ) . ' der Bildfolge, mit eigener Legende.</figcaption></figure>' . "\n"
				. "<!-- /wp:image -->\n\n";
		}
		$slider = "<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Bildfolge als Slider</h2>\n<!-- /wp:heading -->\n\n"
			. "<!-- wp:paragraph -->\n<p>Für eine Bildstrecke im Text: Block <strong>„Galerie“</strong> einfügen, Bilder wählen und rechts unter <strong>Stile</strong> „Slider“ anklicken. Die Bilder laufen dann eins nach dem anderen, mit Pfeilen und Wischen; ein Klick öffnet sie gross.</p>\n<!-- /wp:paragraph -->\n\n"
			. "<!-- wp:gallery {\"linkTo\":\"none\",\"className\":\"is-style-slider\"} -->\n"
			. '<figure class="wp-block-gallery has-nested-images columns-default is-cropped is-style-slider">' . $figures . "</figure>\n"
			. "<!-- /wp:gallery -->\n\n";
	}

	$home    = esc_url( home_url( '/' ) );
	$classic = <<<HTML
<p><em>Das ist der Lead: der erste Absatz, ganz kursiv und höchstens 400 Zeichen lang. Die Website setzt ihn gross unter den Titel, über das Bild. Er sagt in zwei, drei Sätzen, worum es geht und warum es die Leserin interessiert.</em></p>

<p>Hier beginnt der Text. Ein Absatz trägt einen Gedanken. Wörter lassen sich <strong>fett</strong> oder <em>kursiv</em> hervorheben, und ein <a href="{$home}">Link</a> führt weiter. Lange Wörter wie Schmuckgestalterinnenausbildung werden auf der Website automatisch getrennt, damit der Text ruhig läuft.</p>

<p>Dieser Musterbeitrag zeigt alle Bausteine, die die Website gestaltet. Er ist privat: Nur Angemeldete sehen ihn. Über „Als Vorlage verwenden“ im Handbuch entsteht daraus ein neuer Entwurf.</p>

<h2>Zwischentitel – Format „Überschrift 2“</h2>

<p>Zwischentitel gliedern einen längeren Text in Abschnitte. Sie sind kurz und sagen, was folgt. Im Editor wählt ihr im Klassik-Block das Format <strong>„Überschrift 2“</strong>.</p>

<h3>Kleinerer Zwischentitel – „Überschrift 3“</h3>

<p>Für eine zweite Ebene innerhalb eines Abschnitts, etwa für die einzelnen Preisträger einer Auszeichnung.</p>

<h2>Listen</h2>

<p>Aufzählungen für Gleichrangiges:</p>

<ul>
<li>Gelbgold, Weissgold und Roségold</li>
<li>Farbedelsteine aus Sri Lanka und Madagaskar</li>
<li>Uhren mit Handaufzug</li>
</ul>

<p>Nummerierte Listen für Reihenfolgen:</p>

<ol>
<li>Entwurf zeichnen</li>
<li>Wachsmodell fertigen</li>
<li>Giessen, versäubern, polieren</li>
</ol>

<h2>Zitat</h2>

<blockquote>
<p>«Ein Schmuckstück muss eine eigene Idee, eine erkennbare Haltung und Authentizität besitzen.»</p>
<p>Name Vorname, Funktion</p>
</blockquote>

<p>Ein Zitat hebt eine Aussage aus dem Text heraus. Im Klassik-Block: Text markieren und das Anführungszeichen-Symbol wählen.</p>

<h2>Bild im Text</h2>

{$inline}

<p>Bilder im Text stehen in der Textbreite. Ist ihr Link auf <strong>„Mediendatei“</strong> gesetzt, öffnet ein Klick sie gross; mehrere solche Bilder und das Titelbild lassen sich dann durchblättern.</p>

<h2>Galerie</h2>

<p>Mehrere Bilder als Raster. Ein Klick öffnet ein Bild gross, dann lässt sich mit Pfeilen, Tastatur oder Wischen blättern.</p>

{$gallery}

<h2>Video</h2>

<p>Ein YouTube- oder Vimeo-Link allein auf einer Zeile wird zum Video in voller Textbreite. YouTube setzt erst beim Abspielen Cookies.</p>

https://www.youtube.com/watch?v=k66pvCUjjIM

<h2>Tabelle</h2>

<p>Für Zahlen und Vergleiche. Im Klassik-Block über das Tabellen-Symbol.</p>

<table>
<thead>
<tr><th>Edelstein</th><th>Härte (Mohs)</th><th>Herkunft</th></tr>
</thead>
<tbody>
<tr><td>Saphir</td><td>9</td><td>Sri Lanka</td></tr>
<tr><td>Smaragd</td><td>7,5–8</td><td>Kolumbien</td></tr>
<tr><td>Turmalin</td><td>7–7,5</td><td>Brasilien</td></tr>
</tbody>
</table>
HTML;

	$small = <<<HTML

<h5>Titelbild: So steht ein Bildnachweis. Format „Überschrift 5“ – die Website setzt es als Anmerkung, nicht als Überschrift.</h5>

<h5><strong>Über den Autor</strong>
Name Vorname schreibt über Schmuckdesign und junge Ateliers. Auch Hinweise zu einer Serie oder zur Quelle stehen so.</h5>
HTML;

	return $classic . "\n\n" . $slider . $small;
}

/**
 * Creates or refreshes the template, then returns to the Handbuch.
 */
function goldor_musterbeitrag_create() {
	if ( ! current_user_can( 'edit_posts' ) || ! check_admin_referer( 'goldor_musterbeitrag' ) ) {
		wp_die( esc_html__( 'Keine Berechtigung.', 'goldor' ) );
	}

	goldor_musterbeitrag_build();
	wp_safe_redirect( goldor_handbuch_url( 'muster' ) );
	exit;
}
add_action( 'admin_post_goldor_musterbeitrag', 'goldor_musterbeitrag_create' );

/**
 * Builds the template (or rebuilds it in place) and returns its id.
 */
function goldor_musterbeitrag_build() {
	$images = goldor_musterbeitrag_pick_images();
	$data   = array(
		'post_type'      => 'artikel',
		'post_status'    => 'private',
		'post_title'     => 'Musterbeitrag: alle Bausteine auf einen Blick',
		'post_content'   => goldor_musterbeitrag_content( $images ),
		'post_excerpt'   => 'Der Musterbeitrag zeigt alle Bausteine, die die Website gestaltet – als Vorlage und zur Ideengebung.',
		'post_date'      => '2001-01-01 08:00:00',
		'comment_status' => 'closed',
	);

	$id = goldor_musterbeitrag_id();
	if ( $id ) {
		$data['ID'] = $id;
		wp_update_post( $data );
	} else {
		$data['post_author'] = get_current_user_id();
		$id                  = wp_insert_post( $data );
		update_option( GOLDOR_MUSTER_OPTION, $id, false );
	}

	if ( $id && ! is_wp_error( $id ) ) {
		update_post_meta( $id, 'obertitel', 'Musterbeitrag' );
		update_post_meta( $id, 'titelbild_darstellung', 'auto' );
		update_post_meta( $id, 'topstory', '0' );
		if ( $images['hero'] ) {
			set_post_thumbnail( $id, $images['hero'] );
		}
	}

	return $id;
}

/**
 * "Als Vorlage verwenden": a new draft with the template's text, featured
 * image and fields, opened in the editor.
 */
function goldor_musterbeitrag_copy() {
	$source = goldor_musterbeitrag_id();
	if ( ! $source || ! current_user_can( 'edit_posts' ) || ! check_admin_referer( 'goldor_musterbeitrag_copy' ) ) {
		wp_die( esc_html__( 'Keine Berechtigung.', 'goldor' ) );
	}

	$post = get_post( $source );
	$id   = wp_insert_post(
		array(
			'post_type'    => 'artikel',
			'post_status'  => 'draft',
			'post_title'   => 'Neuer Beitrag (aus Vorlage)',
			'post_content' => $post->post_content,
			'post_author'  => get_current_user_id(),
		)
	);

	if ( $id && ! is_wp_error( $id ) ) {
		update_post_meta( $id, 'obertitel', '' );
		update_post_meta( $id, 'titelbild_darstellung', 'auto' );
		$thumb = get_post_thumbnail_id( $source );
		if ( $thumb ) {
			set_post_thumbnail( $id, $thumb );
		}
		wp_safe_redirect( get_edit_post_link( $id, 'raw' ) );
		exit;
	}

	wp_safe_redirect( goldor_handbuch_url( 'muster' ) );
	exit;
}
add_action( 'admin_post_goldor_musterbeitrag_copy', 'goldor_musterbeitrag_copy' );

/**
 * The Handbuch section: what the template holds and the buttons for it.
 */
function goldor_musterbeitrag_section_html() {
	$id     = goldor_musterbeitrag_id();
	$create = wp_nonce_url( admin_url( 'admin-post.php?action=goldor_musterbeitrag' ), 'goldor_musterbeitrag' );
	$copy   = wp_nonce_url( admin_url( 'admin-post.php?action=goldor_musterbeitrag_copy' ), 'goldor_musterbeitrag_copy' );

	$html = '<p>Ein Fachartikel, der alle Bausteine zeigt, die die Website gestaltet – jeder mit einem kurzen Satz, wie ihr ihn im Editor setzt. Als Vorlage für neue Beiträge und zur Ideengebung.</p>'
		. '<ul class="gd-hb__list">'
		. '<li>Obertitel, Lead und Titelbild (automatische Darstellung)</li>'
		. '<li>Text mit Hervorhebungen und Link, Zwischentitel 2 und 3</li>'
		. '<li>Aufzählung und nummerierte Liste, Zitat</li>'
		. '<li>Bild im Text mit Legende, Galerie, Bildfolge als Slider – alle mit Lightbox</li>'
		. '<li>Video, Tabelle, Bildnachweis und „Über den Autor“ als Kleingedrucktes</li>'
		. '</ul>';

	if ( $id ) {
		$html .= '<p class="gd-hb__actions">'
			. '<a class="button button-primary" href="' . esc_url( get_permalink( $id ) ) . '" target="_blank" rel="noopener">Musterbeitrag ansehen</a> '
			. '<a class="button" href="' . esc_url( $copy ) . '">Als Vorlage verwenden</a> '
			. '<a class="button" href="' . esc_url( get_edit_post_link( $id ) ) . '">Im Editor öffnen</a> '
			. '<a class="button-link" href="' . esc_url( $create ) . '">Neu aufbauen</a>'
			. '</p>'
			. '<p class="gd-hb__note">Der Musterbeitrag ist privat: Nur Angemeldete sehen ihn, er erscheint in keiner Liste der Website. „Als Vorlage verwenden“ legt einen neuen Entwurf mit Text und Titelbild an. „Neu aufbauen“ stellt den Musterbeitrag wieder her, falls er verändert wurde.</p>';
	} else {
		$html .= '<p class="gd-hb__actions"><a class="button button-primary" href="' . esc_url( $create ) . '">Musterbeitrag anlegen</a></p>'
			. '<p class="gd-hb__note">Legt den Musterbeitrag privat an, mit Bildern aus eurer Mediathek. Er erscheint auf keiner öffentlichen Seite.</p>';
	}

	return $html;
}

/**
 * Private entries show up in lists for logged-in editors; the template is
 * kept out of every list and query on the site, reachable only at its own
 * address.
 */
function goldor_musterbeitrag_exclude( $query ) {
	if ( is_admin() || $query->is_singular() ) {
		return;
	}
	$id = (int) get_option( GOLDOR_MUSTER_OPTION, 0 );
	if ( $id ) {
		$query->set( 'post__not_in', array_merge( (array) $query->get( 'post__not_in' ), array( $id ) ) );
	}
}
add_action( 'pre_get_posts', 'goldor_musterbeitrag_exclude' );

/**
 * WordPress prefixes private titles with "Privat:"; the template's title is
 * its own name.
 */
function goldor_musterbeitrag_title_format( $format, $post ) {
	return $post && (int) $post->ID === (int) get_option( GOLDOR_MUSTER_OPTION, 0 ) ? '%s' : $format;
}
add_filter( 'private_title_format', 'goldor_musterbeitrag_title_format', 10, 2 );
