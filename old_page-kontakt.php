<?php
/**
 *
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package goldor
 */
?>

<?php
//If the form is submitted
if(isset($_POST['submitted'])) {
 //If there is no error, send the email

 if(!isset($hasError)) {

 }
} ?>

<?php get_header(); ?>

<script type="text/javascript">

</script>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

      <!-- #form -->

      <form action="" method="post" name="Kontaktform">

        <label for="firma">Firma*:</label><input id="firma" type="text" name="firma" required />
        <label for="vorname">Vorname*:</label><input id="vornname" type="text" name="vorname" />
        <label for="name">Name*:</label><input id="name" type="text" name="name" />

        <label for="strasse">Strasse*:</label><input id="strasse" type="text" name="strasse" />
        <label for="plz">PLZ*:</label><input id="plz" type="text" name="plz" />
        <label for="Ort">Ort*:</label><input id="ort" type="text" name="Ort" />
        <label for="land">Land*:</label><select id="land" type="text" name="land" />
          <option value="de">Deutschland</option>
          <option value="at">&Ouml;stereich</option>
          <option value="ch" selected >Schweiz</option>
        </select>

        <label for="telefon">Firma*:</label><input id="telefon" type="text" name="telefon" />
        <label for="email">Firma*:</label><input id="email" type="text" name="email" />
        <label for="mitteilung">Ihre Mitteilung:</label><textarea id="mitteilung" type="text" name="mitteilung" /></textarea>
				<input type="hidden" name="submitted" id="submitted" value="true" />

				<input type="submit" value="Submit" />

</form>

Vielen Dank für Ihre Anfrage. Wir melden uns schnellstmöglich bei Ihnen.

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
