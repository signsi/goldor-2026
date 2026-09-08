<?php
/**
 * Title: Kleinanzeigen Archive Page
 * Slug: goldor/archive-kleinanzeige-page
 * Categories: goldor
 * Description: Drop this into any Page's content for a filterable Marktplatz listing (used for the legacy /anzeigen, /annonces pages).
 *
 * @package goldor
 */
?>
<!-- wp:goldor/taxonomy-filter-links {"postType":"kleinanzeige"} /-->

<!-- wp:query {"query":{"postType":"kleinanzeige","inherit":false,"perPage":15,"pages":0,"offset":0,"order":"desc","orderBy":"date"},"layout":{"type":"default"}} -->
<div class="wp-block-query">
	<!-- wp:post-template {"className":"entry-list"} -->
		<!-- wp:template-part {"slug":"entry-row","theme":"goldor-2026"} /-->
	<!-- /wp:post-template -->
	<!-- wp:query-pagination -->
		<!-- wp:query-pagination-previous /-->
		<!-- wp:query-pagination-numbers /-->
		<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->
	<!-- wp:query-no-results -->
		<!-- wp:paragraph {"className":"archive-empty"} -->
		<p class="archive-empty">Zu dieser Auswahl sind zurzeit keine Einträge vorhanden.</p>
		<!-- /wp:paragraph -->
	<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
