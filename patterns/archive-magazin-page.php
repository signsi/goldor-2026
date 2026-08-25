<?php
/**
 * Title: Magazin Archive Page
 * Slug: goldor/archive-magazin-page
 * Categories: goldor
 * Description: Drop this into any Page's content to list Magazin issues (used for the legacy /magazin, /aktuelle-ausgabe, /edition-actuelle pages).
 *
 * @package goldor
 */
?>
<!-- wp:query {"query":{"postType":"magazin","inherit":false,"perPage":9,"pages":0,"offset":0,"order":"desc","orderBy":"date"},"layout":{"type":"default"}} -->
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
