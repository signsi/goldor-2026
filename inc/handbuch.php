<?php
/**
 * "Handbuch": the editors' manual, as a page in the admin that ships with the
 * theme. It describes what the theme does with what the editors enter —
 * every field, switch and convention named the way the backend names it —
 * and shows the live state where that helps (today's top story, the
 * homepage settings, the service bar).
 *
 * When a feature changes, change its section here. The ad placements have
 * their own page (inc/werbung-anleitung.php), linked from the ad section.
 *
 * @package goldor
 */

const GOLDOR_HANDBUCH_SLUG = 'goldor-handbuch';

function goldor_handbuch_menu() {
	add_menu_page(
		'Handbuch',
		'Handbuch',
		'edit_posts',
		GOLDOR_HANDBUCH_SLUG,
		'goldor_handbuch_page',
		'dashicons-book-alt',
		3
	);
}
add_action( 'admin_menu', 'goldor_handbuch_menu' );

function goldor_handbuch_url( $section = '' ) {
	return admin_url( 'admin.php?page=' . GOLDOR_HANDBUCH_SLUG ) . ( $section ? '#' . $section : '' );
}

function goldor_handbuch_assets( $hook ) {
	if ( 'toplevel_page_' . GOLDOR_HANDBUCH_SLUG !== $hook ) {
		return;
	}
	wp_enqueue_style( 'goldor-fonts', goldor_fonts_url(), array(), null );
	wp_add_inline_style( 'goldor-fonts', goldor_handbuch_css() );
}
add_action( 'admin_enqueue_scripts', 'goldor_handbuch_assets' );

/**
 * A pointer from the dashboard, so the manual is found without looking.
 */
function goldor_handbuch_dashboard_widget() {
	wp_add_dashboard_widget(
		'goldor_handbuch',
		'Gold’Or Handbuch',
		function () {
			$links = array(
				'startseite' => 'Startseite steuern',
				'beitraege'  => 'Beiträge schreiben',
				'muster'     => 'Musterbeitrag',
				'bilder'     => 'Bilder',
				'rubriken'   => 'Rubriken',
				'werbung'    => 'Werbung',
			);
			echo '<p>So setzt das Theme um, was ihr im Backend eingebt.</p><ul>';
			foreach ( $links as $id => $label ) {
				printf( '<li><a href="%s">%s</a></li>', esc_url( goldor_handbuch_url( $id ) ), esc_html( $label ) );
			}
			echo '</ul>';
		}
	);
}
add_action( 'wp_dashboard_setup', 'goldor_handbuch_dashboard_widget' );

/**
 * "Wo:" — where in the backend a thing lives.
 */
function goldor_handbuch_where( $text ) {
	return '<p class="gd-hb__where"><span>Wo</span> ' . wp_kses_post( $text ) . '</p>';
}

/**
 * The sections, in reading order: id, title, HTML.
 *
 * @return array<int, array{id: string, title: string, body: string}>
 */
function goldor_handbuch_sections() {
	$home_id    = function_exists( 'goldor_home_settings_id' ) ? goldor_home_settings_id() : 0;
	$home_link  = $home_id ? get_edit_post_link( $home_id ) : '';
	$home_a     = $home_link ? '<a href="' . esc_url( $home_link ) . '">Startseite</a>' : 'Startseite';
	$top_id     = function_exists( 'goldor_top_story_id' ) ? goldor_top_story_id() : 0;
	$top_now    = $top_id ? '<a href="' . esc_url( get_edit_post_link( $top_id ) ) . '">' . esc_html( get_the_title( $top_id ) ) . '</a>' : '–';
	$reading    = '<a href="' . esc_url( admin_url( 'options-reading.php' ) ) . '">Einstellungen → Lesen</a>';
	$ads_guide  = '<a href="' . esc_url( admin_url( 'edit.php?post_type=werbung&page=goldor-werbung-anleitung' ) ) . '">Werbung → Anleitung</a>';
	$service_on = function_exists( 'goldor_service_bar_enabled' ) && goldor_service_bar_enabled();
	$bg_on      = function_exists( 'goldor_page_background_enabled' ) && goldor_page_background_enabled();
	$profile    = '<a href="' . esc_url( admin_url( 'profile.php' ) ) . '">Benutzer → Profil</a>';
	$picks_url  = function_exists( 'goldor_empfohlen_url' ) ? goldor_empfohlen_url() : home_url( '/empfohlen/' );

	return array(
		array(
			'id'    => 'startseite',
			'title' => 'Startseite steuern',
			'body'  => '
				<p>Die Startseite füllt sich zum grössten Teil selbst aus den neuesten Beiträgen. Drei Stellen bestimmt ihr.</p>
				<h3>Top-Story</h3>
				<p>Der grosse Aufmacher oben. Es ist der Beitrag (News oder Fachartikel) mit dem Häkchen <strong>„zuoberst auf der Homepage anzeigen“</strong>; ohne Häkchen der neueste. Über dem Titel steht die Dachzeile, siehe <a href="#beitraege">Obertitel</a>.</p>
				' . goldor_handbuch_where( 'Im Beitrag, Seitenleiste, Box „_Top-Story“.' ) . '
				<p class="gd-hb__now">Heute: ' . $top_now . '</p>
				<h3>Spalte neben der Top-Story</h3>
				<p>Wählt <strong>Beiträge</strong>, um drei News oder Fachartikel selbst zu setzen (leere Plätze zeigen automatisch die neuesten News), oder <strong>Werbung</strong>, damit eine Halfpage-Anzeige die drei Beiträge ersetzt. Läuft keine Halfpage, erscheinen wieder die Beiträge.</p>
				' . goldor_handbuch_where( 'Menü ' . $home_a . ' → „Rechte Spalte neben der Top-Story“.' ) . '
				<h3>Von der Redaktion empfohlen</h3>
				<p>Ganz unten drei Beiträge eurer Wahl, auch ältere, per Ziehen geordnet. Ohne Auswahl erscheint der Bereich nicht. Jede Empfehlung wird zusätzlich in der Übersicht <a href="' . esc_url( $picks_url ) . '" target="_blank" rel="noopener">„Alle Empfehlungen“</a> gesammelt, die neueste zuerst.</p>
				' . goldor_handbuch_where( 'Menü ' . $home_a . ' → „Von der Redaktion empfohlen“.' ) . '
				<h3>Was sich selbst füllt</h3>
				<ul>
					<li><strong>News</strong> und <strong>Aus dem Fachmagazin</strong>: die neuesten Beiträge; was oben schon steht, wird übersprungen. Die Reiter Jewellery, Watches, Stones und Trade führen zu den Kategorien.</li>
					<li><strong>Jobs</strong> und <strong>Marktplatz</strong>: die neuesten drei Inserate.</li>
					<li><strong>Personen &amp; Messen</strong>: links der Personen-Beitrag mit Häkchen <strong>„auf der Homepage anzeigen“</strong> (sonst der neueste), rechts die nächsten vier Termine aus dem Kalender. Eine Messe, die gerade läuft, trägt „Läuft gerade“.</li>
					<li><strong>Abo-Band</strong>: zeigt immer das Cover der neuesten Magazin-Ausgabe.</li>
				</ul>
				<p>Gespeicherte Änderungen sind sofort sichtbar.</p>',
		),
		array(
			'id'    => 'beitraege',
			'title' => 'Beiträge schreiben',
			'body'  => '
				<p>Gilt für News, Fachartikel und Personen. Was ihr wie gewohnt eingebt, setzt das Theme so um:</p>
				<h3>Obertitel (Dachzeile)</h3>
				<p>Eine kurze Zeile über dem Titel, z.&nbsp;B. „Die Spuren der Zeit (24)“ oder „100 Jahre Cibjo“. Sie steht über der Top-Story auf der Startseite und über dem Titel im Beitrag. Leer gelassen erscheint nichts – die Kategorie steht ohnehin schon da.</p>
				' . goldor_handbuch_where( 'Im Beitrag, Feld „Obertitel“ (Fachartikel, Print, Personen; News haben das Feld nicht).' ) . '
				<h3>Lead</h3>
				<p>Beginnt der Text mit einem <strong>kursiven Absatz</strong> von höchstens 400 Zeichen, setzt das Theme ihn als Einleitung gross unter den Titel, über das Bild. Ohne kursiven ersten Absatz beginnt der Beitrag direkt mit dem Text.</p>
				<p class="gd-hb__note">Das gilt für Beiträge im klassischen Editor, wie sie heute alle geschrieben sind. Im Block-Format wird der Lead nicht erkannt.</p>
				<h3>Kleingedrucktes</h3>
				<p>Bildnachweise („Titelbild: …“), Hinweise zur Serie oder „Über den Autor“ formatiert ihr wie bisher als <strong>Überschrift 5</strong>. Sie erscheinen als ruhige Anmerkung unter einer feinen Linie, nicht als Überschrift.</p>
				<h3>Paywall</h3>
				<p>Mit dem Häkchen <strong>PayWall</strong> sehen Gäste die ersten rund 700 Zeichen nach dem Lead und ein Login. Abonnentinnen und Abonnenten lesen alles. Auf Karten trägt der Beitrag das Badge „Abo“. Nur bei Fachartikeln.</p>
				' . goldor_handbuch_where( 'Im Beitrag, Feld „PayWall“.' ) . '
				<h3>Ausgabe</h3>
				<p>Ein Fachartikel, der einer Magazin-Ausgabe zugeordnet ist, erscheint auf deren Ausgabenseite im Band seiner Kategorie.</p>
				' . goldor_handbuch_where( 'Im Beitrag, Feld „Ausgabe“.' ) . '
				<h3>Galerien, Bilder im Text, Videos</h3>
				<ul>
					<li>Galeriebilder öffnen sich gross in einer Lightbox zum Durchblättern. Mit dem Galerie-Stil <strong>„Slider“</strong> läuft die Galerie als Bildfolge im Text.</li>
					<li>Ein einzelnes Bild im Text öffnet gross, wenn sein Link auf <strong>„Mediendatei“</strong> steht. Es lässt sich dann zusammen mit dem Titelbild durchblättern.</li>
					<li>YouTube- und Vimeo-Links füllen die Textbreite. YouTube setzt erst beim Abspielen Cookies.</li>
				</ul>
				<h3>Felder ohne Wirkung auf der Website</h3>
				<p><strong>Bildlegende</strong>, <strong>Box</strong>, <strong>Anmerkungen</strong> und <strong>Lektoriert</strong> dienen der Printproduktion und dem Ablauf in der Redaktion. Sie erscheinen nicht auf der Website – auch bisher nicht. Bei Kalender-Terminen und Lieferanten hat das Häkchen <strong>„auf der Homepage anzeigen“</strong> zurzeit keine Wirkung; es zählt nur bei Personen. Eine Bildlegende für das Titelbild gehört in die <strong>Beschriftung</strong> des Bildes in der Mediathek.</p>
				<h3>Für Word kopieren</h3>
				<p>Der Button oben im Editor kopiert Titel und Text mit Formatierung. In Word wird der Titel zur Überschrift 1.</p>',
		),
		array(
			'id'    => 'muster',
			'title' => 'Musterbeitrag',
			'body'  => function_exists( 'goldor_musterbeitrag_section_html' ) ? goldor_musterbeitrag_section_html() : '',
		),
		array(
			'id'    => 'bilder',
			'title' => 'Bilder',
			'body'  => '
				<h3>Titelbild im Beitrag</h3>
				<p>Das Feld <strong>Titelbild → Darstellung</strong> steht auf <strong>Automatisch</strong>: Ein grosses Querformat-Bild (ab 1600&nbsp;px Breite) läuft randlos über die ganze Seite, zugeschnitten auf ein Breitformat. Jedes andere Bild – Hochformat, quadratisch, kleiner – steht ganz und unbeschnitten in Textbreite. So wird nichts hochskaliert und kein Kopf abgeschnitten.</p>
				<ul>
					<li><strong>Volle Breite</strong> erzwingt randlos. Mit <strong>Bildausschnitt</strong> (Oben / Mitte / Unten) bestimmt ihr, welcher Teil beim Zuschnitt sichtbar bleibt.</li>
					<li><strong>Textbreite</strong> zeigt das Bild immer ganz.</li>
					<li><strong>Nicht oben zeigen</strong>: Das Bild erscheint nur in den Karten und Listen, nicht über dem Beitrag.</li>
				</ul>
				' . goldor_handbuch_where( 'Im Beitrag, Seitenleiste, Box „Titelbild“.' ) . '
				<p>Ein Klick aufs Titelbild öffnet es gross. Die <strong>Beschriftung</strong> aus der Mediathek steht darunter.</p>
				<h3>Freigestellte Produktbilder</h3>
				<p>Enthält der Dateiname <strong>„freigestellt“</strong> oder <strong>„freisteller“</strong>, zeigen die Karten das Bild ganz auf Weiss mit Luft rundherum, statt es auf das Kartenformat zuzuschneiden. Lieferanten-Logos werden immer so gezeigt.</p>
				<h3>Gute Grössen</h3>
				<ul>
					<li>Titelbild für die volle Breite: mindestens 1600&nbsp;px breit, besser 2400&nbsp;px, Querformat.</li>
					<li>Porträts für Personen: Hochformat 3:4, sie werden so gezeigt.</li>
					<li>Alternativtext ausfüllen: Er beschreibt das Bild für Screenreader und Suchmaschinen.</li>
				</ul>
				<p class="gd-hb__note">Die Website hat einen dunklen Modus, den Leserinnen und Leser einschalten können. Bilder mit weissem Hintergrund wirken dort hell. Das ist gewollt, Freisteller brauchen nichts Besonderes.</p>',
		),
		array(
			'id'    => 'rubriken',
			'title' => 'Rubriken',
			'body'  => '
				<p>Jede Rubrik beginnt mit einem Kopf aus Titel und Einleitung. Die Einleitung einer Kategorie ist ihre <strong>Beschreibung</strong> im Backend; ist sie leer, steht der allgemeine Text der Rubrik.</p>
				<h3>Kalender</h3>
				<p><strong>Startdatum</strong>, <strong>Enddatum</strong> und <strong>Ort</strong> ergeben Datumszeile und „In Kalender eintragen“. Vergangene Termine verschwinden aus den Vorschauen von selbst. Die Startseite zeigt die nächsten Termine in zeitlicher Reihenfolge.</p>
				<h3>Jobs und Marktplatz</h3>
				<p>Die Listen zeigen Titel, Ort, Pensum und Datum. Ort und Pensum liest das Theme aus Titel und Text, wenn keine eigenen Felder ausgefüllt sind – ein klarer Titel wie „Goldschmied/in 80–100&nbsp;% in Zürich“ hilft.</p>
				<h3>Personen</h3>
				<p>Porträts stehen im Hochformat 3:4. Mit <strong>„auf der Homepage anzeigen“</strong> erscheint ein Beitrag auf der Startseite unter Personen &amp; Messen.</p>
				<h3>Lieferanten</h3>
				<p>Firmenname, Adresse, Website, E-Mail und Telefon erscheinen als Kontaktblock. Das Bild ist das Logo und wird nie beschnitten.</p>
				<h3>Magazin</h3>
				<p>Pro Heft eine Ausgabe mit <strong>Erscheinungsdatum</strong> und <strong>ePaper Link</strong>. Die Ausgabenseite sammelt alle zugeordneten Fachartikel; das E-Paper sehen nur Angemeldete. Die neueste Ausgabe erscheint im Abo-Band auf jeder Seite.</p>
				<h3>Branchen-Lexikon und Links</h3>
				<p>Begriffe erscheinen alphabetisch und nach Kategorie. Bei Links wird die URL als Button mit der Domain gezeigt.</p>',
		),
		array(
			'id'    => 'autoren',
			'title' => 'Autorinnen und Autoren',
			'body'  => '
				<p>Unter jedem Beitrag steht eine Autorenbox mit Bild, Kurzbio und „Alle Beiträge von …“. Jede Person hat eine Profilseite, alle stehen in der Übersicht <code>/autorinnen/</code>.</p>
				<ul>
					<li><strong>Bild</strong>: ein Bild aus der Mediathek, sonst Gravatar.</li>
					<li><strong>Überschrift der Autorenbox</strong>: „Über den Autor“ oder „Über die Autorin“. Ohne Wahl steht nur der Name.</li>
					<li><strong>Biografische Angaben</strong>: die Kurzbio.</li>
				</ul>
				' . goldor_handbuch_where( $profile . ' (oder Benutzer → bearbeiten).' ),
		),
		array(
			'id'    => 'werbung',
			'title' => 'Werbung',
			'body'  => '
				<p>Pro Platz läuft genau eine Anzeige, mit <strong>Start</strong> und <strong>Ende</strong> von selbst. Ein leerer Platz hinterlässt keine Lücke. Jede Anzeige trägt das Label „Anzeige“.</p>
				<p>Die Plätze der Startseite, ihre Formate und was gerade wo läuft, zeigt ' . $ads_guide . ' als Schema, mit Schritt-für-Schritt-Anleitung.</p>',
		),
		array(
			'id'    => 'sprachen',
			'title' => 'Deutsch und Französisch',
			'body'  => '
				<p>Inhalte übersetzt ihr wie gewohnt mit WPML. Die festen Texte der Website – Buttons, Sektionstitel, Footer – sind im Theme übersetzt.</p>
				<ul>
					<li>Links aus Header und Footer führen auf die französische Seite, sobald sie <strong>veröffentlicht</strong> ist. Ist sie nur ein Entwurf, führt der Link auf die deutsche Seite.</li>
					<li>Ein Beitrag ohne Übersetzung erscheint auf der französischen Seite in Deutsch, markiert mit „DE“ (umgekehrt „FR“).</li>
					<li>Der Obertitel wird pro Sprache gepflegt.</li>
					<li>Empfehlungen und die Beiträge in der Spalte neben der Top-Story wählt ihr einmal. Auf der französischen Seite erscheint jeweils die Übersetzung; gibt es keine, entfällt der Beitrag dort.</li>
				</ul>',
		),
		array(
			'id'    => 'einstellungen',
			'title' => 'Darstellung und Einstellungen',
			'body'  => '
				<h3>Das Design steht im Theme</h3>
				<p>Im Editor lassen sich Blöcke verschieben und befüllen, Farben, Schriften und Abstände aber nicht ändern. So bleibt jede Seite im Gold’Or-Layout.</p>
				<h3>Service-Leiste</h3>
				<p>Die petrolfarbene Leiste über dem Header mit „Aktuelle Ausgabe“, „Stelleninserate“ und „Inserat aufgeben“. Ist sie aus, erscheint „Anmelden“ wieder im Header.</p>
				' . goldor_handbuch_where( $reading . ' → Service-Leiste.' ) . '
				<p class="gd-hb__now">Heute: ' . ( $service_on ? 'eingeschaltet' : 'ausgeschaltet' ) . '</p>
				<h3>Seitenhintergrund</h3>
				<p>Das Bild hinter der Seite auf breiten Bildschirmen, ein- und ausschaltbar und austauschbar.</p>
				' . goldor_handbuch_where( $reading . ' → Seitenhintergrund.' ) . '
				<p class="gd-hb__now">Heute: ' . ( $bg_on ? 'eingeschaltet' : 'ausgeschaltet' ) . '</p>
				<h3>FAQ</h3>
				<p>Neue Fragen fügt ihr auf der Seite FAQ mit dem Block <strong>„Details“</strong> hinzu: Die Frage ist die Zusammenfassung, die Antwort der Inhalt.</p>
				<h3>Dunkler Modus</h3>
				<p>Leserinnen und Leser können oben rechts (Mond/Sonne) auf ein dunkles Design wechseln; ohne Wahl folgt die Seite der Einstellung ihres Geräts. Für euch gibt es nichts zu tun.</p>',
		),
	);
}

function goldor_handbuch_page() {
	$sections = goldor_handbuch_sections();
	?>
	<div class="wrap gd-hb">
		<header class="gd-hb__head">
			<h1>Handbuch</h1>
			<p class="gd-hb__kicker">So setzt das Theme um, was ihr im Backend eingebt.</p>
		</header>

		<div class="gd-hb__layout">
			<nav class="gd-hb__toc" aria-label="Inhalt">
				<ol>
					<?php foreach ( $sections as $section ) : ?>
						<li><a href="#<?php echo esc_attr( $section['id'] ); ?>"><?php echo esc_html( $section['title'] ); ?></a></li>
					<?php endforeach; ?>
				</ol>
			</nav>

			<div class="gd-hb__body">
				<?php foreach ( $sections as $section ) : ?>
					<section id="<?php echo esc_attr( $section['id'] ); ?>" class="gd-hb__section">
						<h2><?php echo esc_html( $section['title'] ); ?></h2>
						<?php echo wp_kses_post( $section['body'] ); ?>
					</section>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<?php
}

/**
 * The manual reads like the site: Arvo titles over a 2px rule, Inter text on
 * a reading measure, magenta only for links.
 */
function goldor_handbuch_css() {
	return <<<'CSS'
.gd-hb { --ink:#16181d; --muted:#5a5f66; --line:#e5e2dc; --sand:#f6f4f0; --magenta:#c30069; max-width:1180px; font-family:Inter,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif; color:var(--ink); }
.gd-hb h1, .gd-hb h2, .gd-hb h3 { font-family:Arvo,Rockwell,Georgia,serif; font-weight:700; color:var(--ink); }
.gd-hb__head { margin:18px 0 32px; padding-bottom:14px; border-bottom:2px solid var(--ink); }
.gd-hb__head h1 { margin:0 0 6px; padding:0; font-size:clamp(1.8rem,3vw,2.6rem); line-height:1.1; }
.gd-hb__kicker { margin:0; color:var(--muted); font-size:1rem; }
.gd-hb__layout { display:grid; grid-template-columns:220px minmax(0,1fr); gap:48px; align-items:start; }
.gd-hb__toc { position:sticky; top:52px; }
.gd-hb__toc ol { margin:0; padding:0; list-style:none; border-top:1px solid var(--line); }
.gd-hb__toc li { margin:0; border-bottom:1px solid var(--line); }
.gd-hb__toc a { display:block; padding:10px 0; color:var(--ink); font-size:.9375rem; font-weight:500; text-decoration:none; }
.gd-hb__toc a:hover, .gd-hb__toc a:focus { color:var(--magenta); box-shadow:none; }
.gd-hb__body { max-width:720px; }
.gd-hb__section { margin:0 0 56px; scroll-margin-top:48px; }
.gd-hb__section h2 { margin:0 0 18px; padding-bottom:10px; font-size:1.6rem; line-height:1.15; border-bottom:2px solid var(--ink); }
.gd-hb__section h3 { margin:28px 0 8px; font-size:1.15rem; line-height:1.25; }
.gd-hb__section p, .gd-hb__section li { font-size:.9875rem; line-height:1.65; }
.gd-hb__section p { margin:0 0 12px; }
.gd-hb__section ul { margin:0 0 14px; padding-left:1.2em; list-style:disc; }
.gd-hb__section li { margin:0 0 6px; }
.gd-hb__section a { color:var(--magenta); }
.gd-hb__where { display:flex; gap:10px; align-items:baseline; margin:4px 0 14px !important; padding:10px 14px; background:var(--sand); font-size:.9rem !important; }
.gd-hb__where span { flex:none; font-weight:600; font-size:.75rem; text-transform:none; color:var(--muted); }
.gd-hb__now { color:var(--muted); font-size:.875rem !important; }
.gd-hb__now a { font-weight:500; }
.gd-hb__actions { display:flex; flex-wrap:wrap; gap:8px 10px; align-items:center; margin:16px 0 10px !important; }
.gd-hb__actions .button-link { color:var(--magenta); }
.gd-hb__note { padding-left:12px; border-left:2px solid var(--line); color:var(--muted); font-size:.9rem !important; }
@media (max-width:900px) { .gd-hb__layout { grid-template-columns:minmax(0,1fr); gap:24px; } .gd-hb__toc { position:static; } .gd-hb__toc ol { display:flex; flex-wrap:wrap; gap:0 18px; border:0; } .gd-hb__toc li { border:0; } .gd-hb__toc a { padding:6px 0; } }
CSS;
}
