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

<!-- wp:query {"query":{"postType":"kleinanzeige","inherit":false,"perPage":9,"pages":0,"offset":0,"order":"desc","orderBy":"date"},"layout":{"type":"default"}} -->
<div class="wp-block-query">
	<!-- wp:group {"className":"grid-container","layout":{"type":"default"}} -->
	<div class="wp-block-group grid-container">
		<!-- wp:post-template -->
			<!-- wp:template-part {"slug":"post-card","theme":"goldor-2026"} /-->
		<!-- /wp:post-template -->
	</div>
	<!-- /wp:group -->
	<!-- wp:query-pagination -->
		<!-- wp:query-pagination-previous /-->
		<!-- wp:query-pagination-numbers /-->
		<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->
</div>
<!-- /wp:query -->
