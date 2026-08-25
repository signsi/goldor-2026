<?php
/**
 * Title: Lieferanten Archive Page
 * Slug: goldor/archive-lieferant-page
 * Categories: goldor
 * Description: Drop this into any Page's content for a filterable Lieferanten directory (used for the legacy /lieferanten, /fournisseurs pages).
 *
 * @package goldor
 */
?>
<!-- wp:goldor/taxonomy-filter-links {"postType":"lieferant"} /-->

<!-- wp:query {"query":{"postType":"lieferant","inherit":false,"perPage":16,"pages":0,"offset":0,"order":"desc","orderBy":"date"},"layout":{"type":"default"}} -->
<div class="wp-block-query">
	<!-- wp:group {"className":"grid-container lieferanten","layout":{"type":"default"}} -->
	<div class="wp-block-group grid-container lieferanten">
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
