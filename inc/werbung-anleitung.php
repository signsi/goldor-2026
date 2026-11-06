<?php
/**
 * "Werbung → Anleitung": how ads are placed, as a page in the admin.
 *
 * The schema of the homepage is live — each slot says which ad runs in it
 * today or that it is empty (and the section disappears). The slots and their
 * order mirror templates/front-page.html; change one, change the other.
 *
 * @package goldor
 */

function goldor_ad_guide_menu() {
	add_submenu_page(
		'edit.php?post_type=werbung',
		'Anleitung Werbung',
		'Anleitung',
		'edit_posts',
		'goldor-werbung-anleitung',
		'goldor_ad_guide_page'
	);
}
add_action( 'admin_menu', 'goldor_ad_guide_menu' );

function goldor_ad_guide_assets( $hook ) {
	if ( 'werbung_page_goldor-werbung-anleitung' !== $hook ) {
		return;
	}
	wp_enqueue_style( 'goldor-fonts', goldor_fonts_url(), array(), null );
	wp_add_inline_style( 'goldor-fonts', goldor_ad_guide_css() );
}
add_action( 'admin_enqueue_scripts', 'goldor_ad_guide_assets' );

/**
 * One slot of the schema: its format, size and what runs there today.
 */
function goldor_ad_guide_slot( $type, $label, $class = '' ) {
	$formats = goldor_ad_formats();
	$size    = isset( $formats[ $type ] ) ? $formats[ $type ]['width'] . '×' . $formats[ $type ]['height'] : '';
	$ad      = goldor_block_get_active_ad( $type );
	$running = $ad && ! empty( $ad['image'] );
	?>
	<div class="gd-guide__slot <?php echo esc_attr( $class . ( $running ? ' is-running' : ' is-empty' ) ); ?>">
		<strong><?php echo esc_html( $label ); ?></strong>
		<?php if ( $size ) : ?>
			<span class="gd-guide__size"><?php echo esc_html( $size ); ?></span>
		<?php endif; ?>
		<span class="gd-guide__now">
			<?php if ( $running ) : ?>
				<a href="<?php echo esc_url( get_edit_post_link( $ad['id'] ) ); ?>">● <?php echo esc_html( $ad['title'] ); ?></a>
			<?php else : ?>
				○ leer
			<?php endif; ?>
		</span>
	</div>
	<?php
}

function goldor_ad_guide_section( $label, $class = '' ) {
	printf( '<div class="gd-guide__section %s">%s</div>', esc_attr( $class ), esc_html( $label ) );
}

function goldor_ad_guide_page() {
	$new_url   = admin_url( 'post-new.php?post_type=werbung' );
	$list_url  = admin_url( 'edit.php?post_type=werbung' );
	$home_url  = admin_url( 'admin.php?page=goldor-startseite' );
	$home_post = function_exists( 'goldor_home_settings_id' ) ? goldor_home_settings_id() : 0;
	if ( $home_post ) {
		$home_url = get_edit_post_link( $home_post );
	}
	$column_ad = function_exists( 'goldor_home_column_shows_ad' ) && goldor_home_column_shows_ad();
	?>
	<div class="wrap gd-guide">
		<header class="gd-guide__head">
			<h1>Die Werbeplätze der Startseite</h1>
			<p class="gd-guide__kicker">Werbung · Anleitung · <a href="<?php echo esc_url( goldor_handbuch_url() ); ?>">Zum Handbuch</a></p>
		</header>

		<div class="gd-guide__map">
			<div class="gd-guide__page" aria-label="Startseite von oben nach unten">
				<div class="gd-guide__row gd-guide__row--hero">
					<?php goldor_ad_guide_section( 'Top-Story' ); ?>
					<?php
					if ( $column_ad ) {
						goldor_ad_guide_slot( 'Halfpage', 'Halfpage', 'is-tall' );
					} else {
						goldor_ad_guide_section( 'Spalte: News (oder Halfpage)', 'is-tall' );
					}
					?>
				</div>
				<?php goldor_ad_guide_section( 'News' ); ?>
				<?php goldor_ad_guide_slot( 'Billboard', 'Billboard' ); ?>
				<?php goldor_ad_guide_section( 'Aus dem Fachmagazin' ); ?>
				<?php goldor_ad_guide_section( 'Abo-Band', 'is-deep' ); ?>
				<div class="gd-guide__row gd-guide__row--three">
					<?php goldor_ad_guide_section( 'Jobs' ); ?>
					<?php goldor_ad_guide_slot( 'MediumRectangle News', 'Medium Rectangle' ); ?>
					<?php goldor_ad_guide_section( 'Marktplatz' ); ?>
				</div>
				<?php goldor_ad_guide_slot( 'Leaderboard', 'Leaderboard' ); ?>
				<?php goldor_ad_guide_section( 'Personen & Messen' ); ?>
				<?php goldor_ad_guide_section( 'Von der Redaktion empfohlen' ); ?>
			</div>

			<div class="gd-guide__side">
				<?php goldor_ad_guide_slot( 'Skyscraper', 'Skyscraper', 'is-sky' ); ?>
			</div>

			<dl class="gd-guide__notes">
				<div>
					<dt>Billboard</dt>
					<dd>Zwischen den News und dem Fachmagazin. Mit eigenem Mobil-Bild 300×250 für Handys. Läuft keins, springt dort das Mobil-Bild des Skyscrapers ein, wo der Skyscraper selbst nicht zu sehen ist.</dd>
				</div>
				<div>
					<dt>Skyscraper</dt>
					<dd>Rechts neben der Seite, direkt unter dem Header – auf der Startseite, den Übersichten und normalen Seiten, nicht in einzelnen Beiträgen (dort würde er das Bild verdecken). Erst ab einem Bildschirm von 1561&nbsp;px Breite sichtbar. Mitlaufen beim Scrollen ist pro Anzeige schaltbar.</dd>
				</div>
				<div>
					<dt>Halfpage</dt>
					<dd>Ersetzt die drei Beiträge rechts neben der Top-Story – nur, wenn unter <a href="<?php echo esc_url( $home_url ); ?>">Startseite</a> „Werbung“ gewählt ist und eine Halfpage läuft. Sonst bleiben die Beiträge.</dd>
				</div>
				<div>
					<dt>Leerer Platz</dt>
					<dd>Läuft auf einem Platz nichts, entfällt die Sektion. Es bleibt keine Lücke. Neben Jobs und Marktplatz teilen sich die zwei Listen dann die Breite.</dd>
				</div>
			</dl>
		</div>

		<div class="gd-guide__text">
			<section>
				<h2>Eine Anzeige schalten</h2>
				<ol>
					<li><a href="<?php echo esc_url( $new_url ); ?>">Neue Werbung erstellen</a> und einen Titel vergeben, z.&nbsp;B. Kunde und Kampagne. Er erscheint nur hier im Backend.</li>
					<li><strong>Typ</strong> wählen: Er bestimmt den Platz (siehe Schema).</li>
					<li><strong>Werbemittel</strong> hochladen, im Format des Platzes. Doppelte Grösse (z.&nbsp;B. 1940×500 für das Billboard) wird auf hochauflösenden Bildschirmen schärfer. Stimmt das Seitenverhältnis nicht, warnt das Feld.</li>
					<li><strong>URL</strong> eintragen: Dorthin führt ein Klick. Die Anzeige öffnet sich in einem neuen Fenster.</li>
					<li><strong>Start</strong> und <strong>Ende</strong> setzen, wenn die Kampagne befristet ist. Ohne Start läuft sie sofort, ohne Ende, bis „Aktiv“ abgewählt wird.</li>
					<li>Beim <strong>Billboard</strong> ein <strong>Mobil-Bild</strong> 300×250 für Handys hochladen. Beim <strong>Skyscraper</strong> entscheiden, ob er beim Scrollen <strong>mitläuft</strong>; sein Mobil-Bild 300×250 erscheint auf kleineren Bildschirmen anstelle eines Billboards, wenn keins gebucht ist.</li>
					<li><strong>Aktiv</strong> anhaken und veröffentlichen. Die Startseite zeigt die Anzeige sofort.</li>
				</ol>
			</section>

			<section>
				<h2>Gut zu wissen</h2>
				<ul>
					<li><strong>Pro Platz läuft genau eine Anzeige.</strong> Sind mehrere desselben Typs gleichzeitig aktiv, erscheint die zuletzt erstellte. Für einen Wechsel also die alte beenden oder Start und Ende so setzen, dass sie sich nicht überschneiden.</li>
					<li><strong>Start und Ende wirken von selbst:</strong> Eine geplante Anzeige erscheint am Starttag, eine abgelaufene verschwindet nach dem Endtag. Den Stand jeder Anzeige zeigt die <a href="<?php echo esc_url( $list_url ); ?>">Liste</a>.</li>
					<li>Jede Anzeige trägt auf der Website das Label <strong>„Anzeige“</strong>; das lässt sich nicht abschalten.</li>
					<li>Bilder als JPEG, höchstens etwa 60&nbsp;KB (Halfpage, Billboard), damit die Startseite schnell bleibt.</li>
					<li>Der Typ <strong>„MediumRectangle Stellengesuche“</strong> ist zurzeit auf keiner Seite platziert. Eine Anzeige dieses Typs erscheint nirgends.</li>
				</ul>
			</section>
		</div>
	</div>
	<?php
}

/**
 * The page's look: the site's own system (Arvo titles over a 2px rule, sand
 * for content, ink outlines for the bookable slots), not the admin's.
 */
function goldor_ad_guide_css() {
	return <<<'CSS'
.gd-guide { --ink:#16181d; --sand:#efece6; --muted:#5a5f66; --line:#e5e2dc; --magenta:#c30069; --deep:#0e3742; max-width:1180px; font-family:Inter,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif; color:var(--ink); }
.gd-guide h1, .gd-guide h2, .gd-guide dt { font-family:Arvo,Rockwell,Georgia,serif; font-weight:700; color:var(--ink); }
.gd-guide__head { display:flex; justify-content:space-between; align-items:baseline; gap:16px; flex-wrap:wrap; margin:18px 0 28px; padding-bottom:14px; border-bottom:2px solid var(--ink); }
.gd-guide__head h1 { margin:0; padding:0; font-size:clamp(1.6rem,3vw,2.4rem); line-height:1.1; }
.gd-guide__kicker { margin:0; color:var(--magenta); font-size:.95rem; font-weight:500; }
.gd-guide__map { display:grid; grid-template-columns:minmax(0,1fr) 150px minmax(240px,.7fr); gap:20px; align-items:stretch; }
.gd-guide__page { display:grid; gap:10px; }
.gd-guide__row { display:grid; gap:10px; }
.gd-guide__row--hero { grid-template-columns:2fr 1fr; }
.gd-guide__row--three { grid-template-columns:repeat(3,minmax(0,1fr)); }
.gd-guide__section, .gd-guide__slot { display:flex; flex-direction:column; align-items:center; justify-content:center; gap:3px; min-height:58px; padding:10px 12px; text-align:center; font-size:.95rem; }
.gd-guide__section { background:var(--sand); color:var(--muted); }
.gd-guide__section.is-tall, .gd-guide__slot.is-tall { min-height:126px; }
.gd-guide__section.is-deep { background:var(--deep); color:#fff; }
.gd-guide__slot { background:#fff; border:1.5px solid var(--ink); }
.gd-guide__slot strong { font-size:1rem; }
.gd-guide__size { font-variant-numeric:tabular-nums; font-weight:600; }
.gd-guide__now { font-size:.8125rem; color:var(--muted); }
.gd-guide__slot.is-running .gd-guide__now a { color:var(--magenta); text-decoration:none; font-weight:500; }
.gd-guide__slot.is-running .gd-guide__now a:hover { text-decoration:underline; }
.gd-guide__slot.is-empty { border-style:dashed; }
.gd-guide__side { display:flex; }
.gd-guide__slot.is-sky { flex:1; }
.gd-guide__notes { margin:0; }
.gd-guide__notes > div { padding:14px 0 16px; border-top:1px solid var(--line); }
.gd-guide__notes dt { font-size:1.2rem; margin:0 0 6px; }
.gd-guide__notes dd { margin:0; color:var(--muted); font-size:.9375rem; line-height:1.55; }
.gd-guide__notes a, .gd-guide__text a { color:var(--magenta); }
.gd-guide__text { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:40px; margin-top:44px; }
.gd-guide__text h2 { margin:0 0 12px; padding-bottom:10px; font-size:1.35rem; border-bottom:2px solid var(--ink); }
.gd-guide__text ol, .gd-guide__text ul { margin:0; padding-left:1.3em; }
.gd-guide__text ul { list-style:disc; }
.gd-guide__text li { margin:0 0 10px; font-size:.9375rem; line-height:1.6; }
@media (max-width:1100px) { .gd-guide__map { grid-template-columns:minmax(0,1fr) 120px; } .gd-guide__notes { grid-column:1 / -1; display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); column-gap:24px; } .gd-guide__text { grid-template-columns:minmax(0,1fr); } }
@media (max-width:640px) { .gd-guide__map { grid-template-columns:minmax(0,1fr); } .gd-guide__side { order:-1; } .gd-guide__slot.is-sky { min-height:80px; } .gd-guide__notes { grid-template-columns:minmax(0,1fr); } .gd-guide__row--three, .gd-guide__row--hero { grid-template-columns:minmax(0,1fr); } }
CSS;
}
