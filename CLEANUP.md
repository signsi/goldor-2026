# Goldor – WordPress Cleanup Guide

Analysis date: 2026-09-25 (read-only measurements on the Docker install at `/var/www/html`).
Scope: the whole WordPress installation (uploads, database, plugins), not only this theme.

**Decision already taken:** the website is *web-only*. Full-resolution print originals are not
needed on the server and may be deleted (the print workflow keeps its own masters).

---

## 1. Where the space goes

| Area | Size | Notes |
|------|-----:|-------|
| `wp-content/uploads` | **13 GB** | 67,162 files, 25,736 attachments |
| Database | **945 MB** | 2 tables ≈ 500 MB, one of them is stale WPML data |
| `wp-content/plugins` | 386 MB | 13 of 22 plugins inactive |
| `wp-content/themes` | 86 MB | 69 MB of it is this theme's `.git` |

### Uploads breakdown

| What | Files | Size |
|------|------:|-----:|
| Originals kept next to their `-scaled` version (WP ≥ 5.3 big-image handling) | 876 | **4.4 GB** |
| Image-editor backups ("Restore original image" data, `_wp_attachment_backup_sizes`) | 12,184 | **2.2 GB** |
| Smush backups `*.bak.jpg/png` (Smush is no longer installed) | 8,780 | **1.9 GB** |
| Other files unknown to the media library | ~5,100 | ~0.65 GB |
| TIFF files (not displayable in most browsers) | 85 | 1.2 GB |
| Old originals > 2560 px that were never scaled (pre-5.3 uploads) | 189 | 264 MB |
| PDFs | 809 | 1.1 GB |
| Ninja Forms uploads (`uploads/ninja-forms`) | 565 | 331 MB |
| All generated sub-sizes (`-800x600.jpg` etc.) | 41,969 | 2.5 GB |

The categories can overlap a little (for example an edited image whose backup is also the pre-scale
original), so don't just add the numbers up.

Sub-sizes by registered size (from attachment metadata; files shared by two sizes are counted twice):

| Size | Dimensions | Files | Size |
|------|-----------|------:|-----:|
| medium_large | 768 × auto | 17,927 | 925 MB |
| medium | 900 × 510 | 21,052 | 728 MB |
| large | 1800 × 1020 | 5,837 | 545 MB |
| 1536x1536 | core | 1,934 | 480 MB |
| 2048x2048 | core | 1,167 | 458 MB |
| thumbnail | 300 × 170 crop | 24,183 | 265 MB |

### Database breakdown

| Table / data | Size / rows | Notes |
|--------------|------------:|-------|
| `wp_icl_string_pages` | **254 MB**, 2.5 M rows | WPML "track where strings are used". Tracking is **already off** (`track_strings = 0`), so this is dead data |
| `wp_postmeta` | 254 MB, 605 k rows | **312 k rows belong to revisions** (ACF fields are copied on every revision) |
| `wp_posts` | 244 MB, 52 k rows | 29,739 revisions (105 MB of content), 24,474 older than 1 year; max 50 per post |
| Yoast tables (`wp_yoast_*`) | ~52 MB | Yoast SEO is installed but **inactive** |
| Defender tables (`wp_defender_*`) | ~34 MB | Plugin no longer installed |
| Smart Slider (`wp_nextend2_*`), Smush (`wp_smush_dir_images`), LiteSpeed (`wp_litespeed_*`) | small | Plugins removed or inactive |
| Ninja Forms submissions (`nf_sub`) | 7,163 posts | Since 2016-12, 1,745 older than 2 years |
| Smush postmeta (`wp-smush-*`, `wp-smpro-*`) | 18,668 rows | Plugin gone |
| `filebird_backup_*` options | 31 × 77 KB | Automatic FileBird backups, FileBird inactive |
| Orphan postmeta (post deleted) | 65 rows | |
| Table overhead (`data_free`) | 105 MB | Reclaimed by `OPTIMIZE TABLE` |

### Potential savings at a glance

| # | Measure | Est. saving | Risk | Reversible without backup? |
|---|---------|-----------:|------|:---:|
| U1 | Delete pre-scale originals | 4.4 GB | Low | No |
| U2 | Delete image-editor backups | 2.2 GB | Low | No |
| U3 | Delete Smush `.bak` files | 1.9 GB | Low | No |
| U4 | Move orphan files to quarantine | 0.65 GB | Low | Yes (quarantine) |
| U5 | Convert TIFF to JPEG | ~1.1 GB | Medium | No |
| U6 | Downscale 189 oversized originals | ~0.2 GB | Low | No |
| U7 | Recompress JPEG/PNG | ~0.5–1.5 GB (estimate) | Low–Med | No |
| U8 | Drop the `2048x2048` (and optionally `1536x1536`) sub-size | 0.45 (+0.48) GB | Low | Yes (regenerate) |
| U9 | Ninja Forms upload retention | up to 0.3 GB | Low | No |
| D1 | Empty `wp_icl_string_pages` | 254 MB | Low | – |
| D2 | Delete revisions and cap them | ~150 MB | Low | No |
| D3 | Drop leftover plugin tables | ~90 MB | Low | No |
| D4 | Ninja Forms submission retention | varies | Low | No |
| D5 | Small leftovers (Smush meta, options, transients, orphans) | ~5 MB | Low | No |
| D6 | `OPTIMIZE TABLE` | 105 MB + everything freed above | Low | – |
| P1 | Delete inactive plugins and unused themes | ~300 MB | Low | Reinstall |

**Estimated total: roughly 10–11 GB of the 14 GB.** The staging run below shows the real figure for
U1–U3 is much lower, because many "originals" and "backups" are still used by other attachments.

### Staging run 2026-09-25 (U1, U2, U3, U4, U6 done)

| | Before | After |
|---|---:|---:|
| `uploads` | 12.51 GB, 67,162 files | **9.07 GB**, 54,656 files |
| `uploads-quarantine` (U4, delete after a few weeks) | – | 1.12 GB, 1,817 files |
| Permanently deleted (U1–U3) | | **2.18 GB**, 10,689 files |

- The first versions of the U1/U2 scripts also deleted files that other attachments still used as their main
  file or sub-size (922 files, including 192 originals of 1.3 GB). They were restored from the backup the same
  day. The scripts in this document are fixed and skip such files, so their dry-run numbers are now realistic.
- After the restore, no file referenced by the media library or linked in content is missing. The 1,333
  "missing" entries the audit still reports were already missing before the cleanup.
- 183 oversized images (U6) were downscaled to 2560 px.
- Backup of this run: `/var/www/cleanup-backup/` (DB dump + uploads tar, inside the container).

---

## 2. Step 0: Safety first (required)

1. **Do everything on staging first** (this Docker copy), check the site, then repeat on production.
2. **Back up the database:**
   ```bash
   # wp db export doesn't work here: the MariaDB client insists on SSL, the server has none
   mariadb-dump --skip-ssl -h"$WORDPRESS_DB_HOST" -u"$WORDPRESS_DB_USER" -p"$WORDPRESS_DB_PASSWORD" \
     --single-transaction "$WORDPRESS_DB_NAME" | gzip > ~/goldor-db-$(date +%F).sql.gz
   ```
3. **Back up uploads off the server** (rsync to NAS/other disk or `tar`). The disk has 52 GB free, so a
   local copy also fits:
   ```bash
   tar -C /var/www/html/wp-content -cf ~/goldor-uploads-$(date +%F).tar uploads
   ```
4. Keep both backups until the site has run cleanly for a few weeks.
5. Optionally turn on maintenance mode during the heavy steps: `wp maintenance-mode activate`.

### Conventions used below

- `wp` means `wp --allow-root --path=/var/www/html`.
- DB access: `wp db query` / `wp db size` **fail** (SSL error). Use `wp eval` / `wp eval-file`, or
  `mysql --skip-ssl -h"$WORDPRESS_DB_HOST" -u"$WORDPRESS_DB_USER" -p"$WORDPRESS_DB_PASSWORD" "$WORDPRESS_DB_NAME"`
  (shortened to `SQL` below).
- Every script is a **dry run by default** and only changes things when called with the extra argument
  `apply`: `wp eval-file script.php apply`.
- 🔴 = destructive, 🟢 = read-only.

---

## 3. Uploads

Recommended order: U1 → U2 → U3 → U4 → U6 → U5 → U8 → U7 → U9.
Run the audit script (Appendix A) before and after to check the numbers.

### U1 🔴 Delete pre-scale originals (4.4 GB)

Since WP 5.3, uploads larger than 2560 px are saved as `name-scaled.jpg`. The untouched original
stays next to it and is referenced as `original_image` in the metadata. The site never serves it.
After this step the `-scaled` file becomes the attachment's source (for regenerating, too).

`drop-originals.php`:
```php
<?php
global $wpdb;
$apply = in_array( 'apply', $args, true );
$n = 0; $bytes = 0;
// An "original" is often the main file of another attachment (re-uploads, WPML copies) – keep those
$upload = wp_get_upload_dir()['basedir'];
$mains  = array_flip( $wpdb->get_col( "SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = '_wp_attached_file'" ) );
$ids = $wpdb->get_col( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '_wp_attachment_metadata' AND meta_value LIKE '%original_image%'" );
foreach ( $ids as $id ) {
	$meta = wp_get_attachment_metadata( $id );
	if ( empty( $meta['original_image'] ) ) {
		continue;
	}
	$original = path_join( dirname( get_attached_file( $id ) ), $meta['original_image'] );
	if ( isset( $mains[ ltrim( substr( $original, strlen( $upload ) ), '/' ) ] ) ) {
		continue; // still in use, leave file and metadata alone
	}
	if ( file_exists( $original ) ) {
		$n++;
		$bytes += filesize( $original );
		if ( $apply ) {
			wp_delete_file( $original );
		}
	}
	if ( $apply ) {
		unset( $meta['original_image'] );
		wp_update_attachment_metadata( $id, $meta );
	}
}
WP_CLI::success( sprintf( '%s %d originals, %.0f MB', $apply ? 'Deleted' : 'Would delete', $n, $bytes / 1048576 ) );
```
WPML Media creates one attachment per language that shares the same file. The script handles that:
it deletes the file once and cleans the metadata of every copy.

### U2 🔴 Delete image-editor backups (2.2 GB)

When someone crops or rotates an image in WordPress, the previous version is kept (the `-e1234567890`
files and the original names in `_wp_attachment_backup_sizes`). This powers "Restore original image".
With a web-only site that button isn't needed.

`drop-editor-backups.php`:
```php
<?php
global $wpdb;
$apply  = in_array( 'apply', $args, true );
$upload = wp_get_upload_dir()['basedir'];
// Every file an attachment currently uses: main file, sub-sizes, pre-scale original.
// Backups often share names with current sub-sizes (e.g. name-300x170.jpg) – those must stay.
$in_use = array_flip( $wpdb->get_col( "SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = '_wp_attached_file'" ) );
foreach ( $wpdb->get_col( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '_wp_attachment_metadata'" ) as $id ) {
	$meta = wp_get_attachment_metadata( $id );
	$dir  = dirname( (string) get_post_meta( $id, '_wp_attached_file', true ) );
	foreach ( $meta['sizes'] ?? [] as $size ) {
		$in_use[ "$dir/{$size['file']}" ] = true;
	}
	if ( ! empty( $meta['original_image'] ) ) {
		$in_use[ "$dir/{$meta['original_image']}" ] = true;
	}
}
$n = 0; $bytes = 0;
foreach ( $wpdb->get_col( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '_wp_attachment_backup_sizes'" ) as $id ) {
	$dir = dirname( get_post_meta( $id, '_wp_attached_file', true ) );
	foreach ( (array) get_post_meta( $id, '_wp_attachment_backup_sizes', true ) as $size ) {
		$rel = $dir . '/' . ( $size['file'] ?? '' );
		// Never delete a file that any attachment still uses
		if ( empty( $size['file'] ) || isset( $in_use[ $rel ] ) || ! file_exists( "$upload/$rel" ) ) {
			continue;
		}
		$n++;
		$bytes += filesize( "$upload/$rel" );
		if ( $apply ) {
			wp_delete_file( "$upload/$rel" );
		}
	}
	if ( $apply ) {
		delete_post_meta( $id, '_wp_attachment_backup_sizes' );
	}
}
WP_CLI::success( sprintf( '%s %d backup files, %.0f MB', $apply ? 'Deleted' : 'Would delete', $n, $bytes / 1048576 ) );
```

### U3 🔴 Delete Smush backups (1.9 GB)

> **Staging run 2026-09-25:** Smush had registered its `.bak` files as editor backups, so U2 already
> deleted all of them but one. U2 + U3 together freed 2.2 GB, not 4.1 GB. On production, U3 is only a
> final sweep.

Smush saved each original as `name.bak.jpg`. Smush has been removed, so nothing references them anymore
(the audit script confirms they aren't in the media library or in any content).
```bash
cd /var/www/html/wp-content/uploads
# 🟢 count (expected: 8,780 files, ~1,933 MB)
find 20?? -type f -regextype posix-extended -regex '.*\.bak\.(jpe?g|png|gif)$' -printf '%s\n' \
  | awk '{s+=$1;n++} END {printf "%d files, %.0f MB\n", n, s/1048576}'
# 🔴 delete
find 20?? -type f -regextype posix-extended -regex '.*\.bak\.(jpe?g|png|gif)$' -delete
```

### U4 🔴 Orphan files → quarantine (~0.65 GB)

These are files in `uploads/20xx/` that no attachment, size, backup or original points to: leftovers
from deleted attachments, FTP uploads, old plugins. Only 9 of them are still linked from content,
options or meta. The audit script (Appendix A) keeps those and **moves** the rest to
`wp-content/uploads-quarantine/` with the same folder structure:
```bash
wp eval-file media-audit.php            # report only
wp eval-file media-audit.php quarantine # move orphans (after U1–U3)
```
Check the site for a few weeks, then `rm -rf wp-content/uploads-quarantine`.
To undo, `rsync -a uploads-quarantine/ uploads/`.

### U5 🔴 Convert TIFF to JPEG (~1.1 GB)

85 TIFF files (152 attachments, including WPML copies), up to 99 MB each. No TIFF is used as a featured
image and only one post links to a `.tif` in its content. Browsers other than Safari can't show TIFF at all.
Options:
- **a) Convert** (recommended): turn each TIFF into a 2560 px JPEG and point the attachment at it.
- **b) Delete twins only**: 11 TIFFs (275 MB) already have a JPEG with the same name next to them
  (e.g. `2021/02/Stones_Jaime-les-inclusions_01-Portrait.tif/.jpg`).

`convert-tiff.php` (option a):
```php
<?php
require_once ABSPATH . 'wp-admin/includes/image.php';
global $wpdb;
$apply = in_array( 'apply', $args, true );
$done  = [];
foreach ( $wpdb->get_col( "SELECT ID FROM $wpdb->posts WHERE post_type = 'attachment' AND post_mime_type = 'image/tiff'" ) as $id ) {
	$tif = get_attached_file( $id );
	if ( ! file_exists( $tif ) && ! isset( $done[ $tif ] ) ) {
		WP_CLI::warning( "#$id missing file $tif" );
		continue;
	}
	$jpg = preg_replace( '/\.tiff?$/i', '.jpg', $tif );
	if ( file_exists( $jpg ) && ! isset( $done[ $tif ] ) ) {
		$jpg = preg_replace( '/\.jpg$/', '-tif.jpg', $jpg ); // don't overwrite an existing twin
	}
	WP_CLI::log( "#$id " . basename( $tif ) . ' -> ' . basename( $jpg ) );
	if ( ! $apply ) {
		continue;
	}
	if ( ! isset( $done[ $tif ] ) ) { // WPML copies share the file: convert only once
		$editor = wp_get_image_editor( $tif );
		if ( is_wp_error( $editor ) ) {
			WP_CLI::warning( $editor->get_error_message() );
			continue;
		}
		$editor->resize( 2560, 2560, false );
		$editor->set_quality( 82 );
		$saved = $editor->save( $jpg, 'image/jpeg' );
		if ( is_wp_error( $saved ) ) {
			WP_CLI::warning( $saved->get_error_message() );
			continue;
		}
		$done[ $tif ] = $saved['path'];
	}
	$old = wp_get_attachment_metadata( $id );
	update_attached_file( $id, $done[ $tif ] );
	wp_update_post( [ 'ID' => $id, 'post_mime_type' => 'image/jpeg' ] );
	$new = wp_generate_attachment_metadata( $id, $done[ $tif ] );
	wp_update_attachment_metadata( $id, $new );
	// Remove old sub-sizes, unless the new JPEG sizes got the same file name
	$new_files = wp_list_pluck( $new['sizes'] ?? [], 'file' );
	foreach ( $old['sizes'] ?? [] as $size ) {
		$f = path_join( dirname( $tif ), $size['file'] );
		if ( ! in_array( $size['file'], $new_files, true ) && file_exists( $f ) ) {
			wp_delete_file( $f );
		}
	}
}
if ( $apply ) {
	foreach ( array_keys( $done ) as $tif ) {
		wp_delete_file( $tif );
	}
}
```
Afterwards:
- Find the one content link to a TIFF and fix it in the editor:
  `wp post list --post_type=any --s=".tif" --fields=ID,post_title`
- Spot-check colours: print TIFFs are often **CMYK**, and Imagick does not convert them to sRGB, so colours
  can look off. Re-export problem images from the master as sRGB JPEG and use "Replace media".

### U6 🔴 Downscale oversized originals (~0.2 GB)

189 images uploaded before WP 5.3 are still > 2560 px and are served as "full" (the templates use
`sizeSlug: full` for featured images, so this also speeds up the frontend).

`downscale-originals.php`:
```php
<?php
global $wpdb;
$apply = in_array( 'apply', $args, true );
$ids   = $wpdb->get_col( "SELECT ID FROM $wpdb->posts WHERE post_type = 'attachment' AND post_mime_type IN ('image/jpeg','image/png')" );
$done  = [];
foreach ( $ids as $id ) {
	$meta = wp_get_attachment_metadata( $id );
	if ( empty( $meta['width'] ) || max( $meta['width'], $meta['height'] ) <= 2560 || ! empty( $meta['original_image'] ) ) {
		continue;
	}
	$file = get_attached_file( $id );
	if ( ! file_exists( $file ) ) {
		continue;
	}
	WP_CLI::log( "#$id " . basename( $file ) . " {$meta['width']}x{$meta['height']}" );
	if ( ! $apply ) {
		continue;
	}
	if ( ! isset( $done[ $file ] ) ) { // WPML copies share the file
		$editor = wp_get_image_editor( $file );
		if ( is_wp_error( $editor ) ) {
			continue;
		}
		$editor->resize( 2560, 2560, false );
		$editor->set_quality( 82 );
		$done[ $file ] = $editor->save( $file );
	}
	if ( ! is_wp_error( $done[ $file ] ) ) {
		$meta['width']    = $done[ $file ]['width'];
		$meta['height']   = $done[ $file ]['height'];
		$meta['filesize'] = filesize( $file );
		wp_update_attachment_metadata( $id, $meta );
	}
}
```
The dry run lists 183 JPEG/PNG attachments; the remaining few of the 189 are TIFFs (U5).
The existing sub-sizes stay valid, so nothing needs regenerating.

### U7 🔴 Recompress remaining JPEG/PNG (estimate 0.5–1.5 GB)

Many originals are print exports at quality 95–100 (e.g. 42 MB JPEGs). Lossy recompression to quality
82 can't be seen on screen. `jpegoptim` and `optipng` are **not** installed in the container
(`apt-get` installs don't survive a container rebuild, which is fine for a one-off run):
```bash
apt-get update && apt-get install -y jpegoptim optipng
cd /var/www/html/wp-content/uploads
# 🟢 dry run: shows what would be saved
find 20?? -type f \( -iname '*.jpg' -o -iname '*.jpeg' \) -size +300k -print0 \
  | xargs -0 jpegoptim --max=82 --noaction --quiet --totals
# 🔴 apply: keeps timestamps, strips metadata except the colour profile
find 20?? -type f \( -iname '*.jpg' -o -iname '*.jpeg' \) -size +300k -print0 \
  | xargs -0 jpegoptim --max=82 --strip-all --keep-icc --preserve --all-progressive --totals
# 🔴 PNG is lossless, slow but safe
find 20?? -type f -iname '*.png' -size +300k -print0 | xargs -0 -P4 -n20 optipng -o2 -quiet -preserve
```
- `--strip-all` also removes IPTC/EXIF (photographer credit, copyright). If those must stay, use
  `--strip-com --strip-exif` instead. The exact `--keep-*` flags depend on the jpegoptim version, so
  check `jpegoptim --help`.
- The `filesize` stored in the metadata will be out of date afterwards. That's harmless.
- PDFs (1.1 GB) can be shrunk the same way with Ghostscript (installed): `gs -sDEVICE=pdfwrite
  -dPDFSETTINGS=/ebook -o out.pdf in.pdf`. Only replace the file if it actually got smaller and still looks fine.

### U8 🔴 Drop unused sub-sizes (0.45–0.93 GB)

The theme only references `full`, `medium` and `large` (theme.json, templates). `thumbnail`,
`medium_large`, `1536x1536` and `2048x2048` are only used by the browser's `srcset`. Since every image
is capped at 2560 px and `large` is already 1800 px, **`2048x2048` is redundant**. `1536x1536` is
optional to drop (the browser then picks 1800 instead of 1536).

1. Add to `functions.php`:
   ```php
   add_action( 'after_setup_theme', function () {
   	remove_image_size( '2048x2048' );
   	// remove_image_size( '1536x1536' );
   } );
   ```
2. Delete the files of sizes that are no longer registered (wp-cli ≥ 2.x):
   ```bash
   wp media regenerate --delete-unknown --yes   # only deletes, creates nothing
   ```
3. Undo: remove the code and run `wp media regenerate --only-missing --yes`.

Don't remove `medium_large`/`thumbnail`. Old article content refers to them via `size-medium_large`
classes and the admin uses them.

### U9 🔴 Ninja Forms uploads (up to 331 MB)

502 of the 557 upload records are older than 2 years. Decide on a retention period (also a
data-protection matter under the Swiss FADP/nDSG, since these are files sent in by users), e.g.
**2 years**. Delete the submissions (D4). Check in Ninja Forms › Settings › File Uploads whether the
installed version removes files together with the submission. If not, delete old files in
`uploads/ninja-forms/<form-id>/` by date:
```bash
find /var/www/html/wp-content/uploads/ninja-forms -type f -mtime +730 -print   # 🟢
find /var/www/html/wp-content/uploads/ninja-forms -type f -mtime +730 -delete  # 🔴
```

### Also look at (no automatic cleanup)

- **482 attachments whose main file is missing** (plus sub-size entries without files). The audit
  script lists them. Delete the attachment post only if it's not used (featured image / ACF field /
  content). Otherwise re-upload the file.
- **7,454 "unattached" attachments** (`post_parent = 0`). Don't bulk-delete them: WordPress
  "attachment" only means the image was uploaded from that post. Images used via ACF fields,
  galleries, WPML copies or other posts also count as unattached, and deleting an attachment deletes
  its files for every language. Only delete them after an individual check.
- Very large single files: `find wp-content/uploads -type f -size +20M -exec ls -lh {} +`
  (e.g. a 58 MB `swisstransfer_….zip`, a 40 MB MP4). Better hosted on Vimeo/YouTube, or deleted.

---

## 4. Database

Run the SQL through `SQL` (see conventions) or `wp eval`. Table prefix: `wp_`.

### D1 🔴 Empty WPML string tracking (254 MB)

String tracking is already disabled (WPML › Settings › String Translation: "Track where strings
appear" is off), so the table only holds old data.
```sql
TRUNCATE TABLE wp_icl_string_pages;
TRUNCATE TABLE wp_icl_string_urls;   -- 4 MB, same feature
```

### D2 🔴 Delete revisions and cap them (~150 MB)

29,739 revisions, and each one carries ~10 ACF meta rows (312 k rows in total).
```bash
# 🟢 count
wp post list --post_type=revision --format=count
# 🔴 delete in batches (wp_delete_post also removes their postmeta)
wp post list --post_type=revision --format=ids | tr ' ' '\n' | xargs -n 500 wp --allow-root --path=/var/www/html post delete --force --quiet
```
Alternative: keep recent history and delete only revisions older than 1 year (24,474):
```bash
wp eval 'global $wpdb; echo implode(" ", $wpdb->get_col("SELECT ID FROM $wpdb->posts WHERE post_type=\"revision\" AND post_date < NOW() - INTERVAL 1 YEAR"));' \
  | tr ' ' '\n' | xargs -n 500 wp --allow-root --path=/var/www/html post delete --force --quiet
```

Then add to `wp-config.php` (currently unlimited):
```php
define( 'WP_POST_REVISIONS', 5 );
```

### D3 🔴 Drop leftover plugin tables (~90 MB)

Only do this for plugins that are **removed for good** (see P1). Dropping the table loses that
plugin's data.

| Plugin | Status | Tables |
|--------|--------|--------|
| Defender | not installed | `wp_defender_antibot, _audit_log, _email_log, _lockout, _lockout_log, _quarantine, _scan, _scan_item, _unlockout` |
| Smart Slider 3 | not installed | `wp_nextend2_image_storage, _section_storage, _smartslider3_generators, _smartslider3_sliders, _smartslider3_sliders_xref, _smartslider3_slides` |
| Smush | not installed | `wp_smush_dir_images` |
| LiteSpeed Cache | inactive | `wp_litespeed_url, wp_litespeed_url_file, wp_litespeed_avatar` |
| Yoast SEO | inactive | `wp_yoast_indexable, _indexable_hierarchy, _seo_links, _seo_meta, _primary_term, _migrations, _expiring_store` |
| FileBird | inactive | `wp_fbv, wp_fbv_attachment_folder` (media folder structure: gone if dropped) |

```sql
-- 🟢 list the candidates with their size
SELECT table_name, ROUND((data_length+index_length)/1048576) AS mb
FROM information_schema.tables WHERE table_schema = DATABASE()
  AND table_name REGEXP '^wp_(defender|nextend2|smush|litespeed|yoast|fbv)';
-- 🔴 generate the DROP statements, review them, then run them
SELECT CONCAT('DROP TABLE `', table_name, '`;') FROM information_schema.tables
WHERE table_schema = DATABASE() AND table_name REGEXP '^wp_(defender|nextend2|smush|litespeed)';
```
Yoast: if SEO is no longer done with Yoast, also delete its postmeta
(`DELETE FROM wp_postmeta WHERE meta_key LIKE '\_yoast\_%';`) and options (`wpseo%`, including the
363 KB `wpseo-gsc-issues-web-not_found`).

`wp_actionscheduler_*`: don't drop. Only clear finished jobs and logs:
```sql
DELETE FROM wp_actionscheduler_actions WHERE status IN ('complete','failed','canceled');
TRUNCATE TABLE wp_actionscheduler_logs;
```

### D4 🔴 Ninja Forms submissions retention

7,163 submissions since 2016, 1,745 older than 2 years. Ninja Forms stores them as `nf_sub` posts:
```bash
wp eval 'global $wpdb; echo implode(" ", $wpdb->get_col("SELECT ID FROM $wpdb->posts WHERE post_type=\"nf_sub\" AND post_date < NOW() - INTERVAL 2 YEAR"));' \
  | tr ' ' '\n' | xargs -n 500 wp --allow-root --path=/var/www/html post delete --force --quiet
```
Export them first if needed (Ninja Forms › Submissions › Export CSV).

### D5 🔴 Small leftovers

```sql
-- Smush postmeta (18,668 rows)
DELETE FROM wp_postmeta WHERE meta_key LIKE 'wp-smush%' OR meta_key LIKE 'wp-smpro%';
-- Smush options
DELETE FROM wp_options WHERE option_name LIKE 'wp-smush%' OR option_name LIKE 'skip-smush%' OR option_name LIKE 'smush%';
-- FileBird automatic backups (31 × 77 KB)
DELETE FROM wp_options WHERE option_name LIKE 'filebird\_backup\_%';
-- postmeta without a post
DELETE pm FROM wp_postmeta pm LEFT JOIN wp_posts p ON p.ID = pm.post_id WHERE p.ID IS NULL;
-- term relationships without a post
DELETE tr FROM wp_term_relationships tr LEFT JOIN wp_posts p ON p.ID = tr.object_id
  LEFT JOIN wp_links l ON l.link_id = tr.object_id WHERE p.ID IS NULL AND l.link_id IS NULL;
```
```bash
wp transient delete --all          # transients rebuild themselves
wp post list --post_status=trash --post_type=any --format=ids | xargs -r wp --allow-root --path=/var/www/html post delete --force   # 36+ trashed posts
```

### D6 🟢/🔴 Reclaim disk space

InnoDB only gives the space back after a rebuild:
```sql
OPTIMIZE TABLE wp_posts, wp_postmeta, wp_options, wp_icl_string_pages, wp_term_relationships, wp_usermeta;
```
Then check the size:
```sql
SELECT ROUND(SUM(data_length+index_length)/1048576) AS mb FROM information_schema.tables WHERE table_schema = DATABASE();
```

---

## 5. Plugins & themes (P1)

Active (keep): WPML (+ Media, String Translation), ACF, Admin Columns Pro, PublishPress Capabilities,
Gmail SMTP, Ninja Forms (+ File Uploads).

Inactive, candidates for deletion (`wp plugin delete <slug>`):

| Plugin | Size | Note |
|--------|-----:|------|
| `filester` | – | **File manager in the browser: security risk, delete first** |
| `hostinger`, `hostinger-ai-assistant`, `hostinger-easy-onboarding`, `hostinger-reach` | ~100 MB | Hosting company adds them. Check whether production reinstalls them automatically |
| `wordpress-seo` (Yoast) | 23 MB | Decide together with D3 |
| `litespeed-cache` | – | Only useful on a LiteSpeed server. If production runs on Hostinger/LiteSpeed, **activate** it rather than delete it |
| `filebird` | – | Media folders; decide together with D3 |
| `admin-site-enhancements-pro` | 25 MB | |
| `gallery-slideshow`, `_gallery-slideshow` | – | Duplicate, the one with `_` is a disabled copy |
| `duplicate-post`, `tinymce-advanced` (Classic editor, useless with the block theme), `wordpress-importer`, `notification` | – | |

Themes: delete `twentytwentythree` and `twentytwentyfour`, keep `twentytwentyfive` as a fallback:
`wp theme delete twentytwentythree twentytwentyfour`.

Other: `uploads/cache` (2.3 MB), `uploads/smush`, `uploads/wp-defender`, `uploads/_notes`: leftovers of
removed plugins and Dreamweaver, can be deleted.

---

## 6. Prevent it from growing again

1. **Revisions:** `define( 'WP_POST_REVISIONS', 5 );` in `wp-config.php` (D2).
2. **Smaller uploads:** in `functions.php`:
   ```php
   // Largest stored image: 2000 px instead of 2560 (templates show at most ~1800 px)
   add_filter( 'big_image_size_threshold', fn() => 2000 );
   // JPEG quality for generated sizes (WP default 82, set explicitly for clarity)
   add_filter( 'jpeg_quality', fn() => 80 );
   // Don't keep the untouched original next to the -scaled version (see U1)
   add_filter( 'wp_generate_attachment_metadata', function ( $meta, $id ) {
   	if ( ! empty( $meta['original_image'] ) ) {
   		wp_delete_file( path_join( dirname( get_attached_file( $id ) ), $meta['original_image'] ) );
   		unset( $meta['original_image'] );
   	}
   	return $meta;
   }, 10, 2 );
   ```
   With the last filter, the "Restore original" function of the image editor has no full original anymore.
   This is intended.
3. **Limit upload size** for editors (php `upload_max_filesize` e.g. 20M), so 100 MB TIFFs can't be uploaded.
4. **Editor guidelines:** export web images as sRGB JPEG, max. 2500 px long edge, quality ~80,
   no TIFF/BMP, no ZIP/video in the media library.
5. **Ninja Forms:** delete submissions older than the agreed retention period regularly (D4 as a cron job
   or quarterly).
6. **Recheck every six months** with the audit script (Appendix A) and the size queries in D3/D6.

---

## Appendix A – `media-audit.php` 🟢 (optional 🔴 `quarantine`)

Lists orphan files, missing files and pre-scale originals. `wp eval-file media-audit.php` only reports.
`wp eval-file media-audit.php quarantine` moves orphan files to `wp-content/uploads-quarantine/`.

```php
<?php
global $wpdb;
$quarantine = in_array( 'quarantine', $args, true );
$upload     = wp_get_upload_dir()['basedir'];
$target     = WP_CONTENT_DIR . '/uploads-quarantine';

// 1. Every file the media library knows: main file, sub-sizes, pre-scale original, editor backups
$known = [];
foreach ( $wpdb->get_col( "SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = '_wp_attached_file'" ) as $f ) {
	$known[ $f ] = true;
}
$rows = $wpdb->get_results( "SELECT post_id, meta_key, meta_value FROM $wpdb->postmeta WHERE meta_key IN ('_wp_attachment_metadata','_wp_attachment_backup_sizes')" );
foreach ( $rows as $row ) {
	$meta = maybe_unserialize( $row->meta_value );
	if ( ! is_array( $meta ) ) {
		continue;
	}
	$dir = dirname( (string) get_post_meta( $row->post_id, '_wp_attached_file', true ) );
	if ( ! empty( $meta['original_image'] ) ) {
		$known[ "$dir/{$meta['original_image']}" ] = true;
	}
	$sizes = '_wp_attachment_metadata' === $row->meta_key ? ( $meta['sizes'] ?? [] ) : $meta;
	foreach ( $sizes as $size ) {
		if ( ! empty( $size['file'] ) ) {
			$known[ "$dir/{$size['file']}" ] = true;
		}
	}
}

// 2. Text in which a file could still be linked directly
$haystack  = implode( "\n", $wpdb->get_col( "SELECT post_content FROM $wpdb->posts WHERE post_type NOT IN ('revision','attachment')" ) );
$haystack .= implode( "\n", $wpdb->get_col( "SELECT meta_value FROM $wpdb->postmeta WHERE meta_value LIKE '%uploads/%'" ) );
$haystack .= implode( "\n", $wpdb->get_col( "SELECT option_value FROM $wpdb->options WHERE option_value LIKE '%uploads/%'" ) );

// 3. Walk the year folders
$orphans = [ 'count' => 0, 'bytes' => 0 ];
$linked  = [];
$files   = new RecursiveIteratorIterator( new RecursiveDirectoryIterator( $upload, FilesystemIterator::SKIP_DOTS ) );
foreach ( $files as $file ) {
	$rel = substr( $file->getPathname(), strlen( $upload ) + 1 );
	if ( ! preg_match( '#^20\d\d/#', $rel ) || isset( $known[ $rel ] ) ) {
		continue;
	}
	if ( false !== strpos( $haystack, $rel ) ) {
		$linked[] = $rel;
		continue;
	}
	$orphans['count']++;
	$orphans['bytes'] += $file->getSize();
	if ( $quarantine ) {
		wp_mkdir_p( dirname( "$target/$rel" ) );
		rename( $file->getPathname(), "$target/$rel" );
	}
}

// 4. Known files that don't exist
$missing = [];
foreach ( array_keys( $known ) as $rel ) {
	if ( ! file_exists( "$upload/$rel" ) ) {
		$missing[] = $rel;
	}
}

WP_CLI::log( sprintf( 'Orphan files: %d, %.0f MB%s', $orphans['count'], $orphans['bytes'] / 1048576, $quarantine ? ' (moved to quarantine)' : '' ) );
WP_CLI::log( sprintf( 'Unknown to the library but linked in content (kept): %d', count( $linked ) ) );
foreach ( $linked as $rel ) {
	WP_CLI::log( "  $rel" );
}
WP_CLI::log( sprintf( 'Referenced but missing on disk: %d', count( $missing ) ) );
file_put_contents( WP_CONTENT_DIR . '/media-audit-missing.txt', implode( "\n", $missing ) );
WP_CLI::log( 'List written to wp-content/media-audit-missing.txt' );
```

## Appendix B – quick size checks 🟢

```bash
du -sh /var/www/html/wp-content/{uploads,plugins,themes}
du -sh /var/www/html/wp-content/uploads/* | sort -h | tail
find /var/www/html/wp-content/uploads -type f -size +5M | wc -l
```
```sql
SELECT table_name, ROUND((data_length+index_length)/1048576) AS mb, table_rows
FROM information_schema.tables WHERE table_schema = DATABASE() ORDER BY mb DESC LIMIT 20;

SELECT post_type, COUNT(*) FROM wp_posts GROUP BY post_type ORDER BY 2 DESC;
```
