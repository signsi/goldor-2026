<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="utf-8">
  <?php wp_head(); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="theme-color" content="#FFF" />
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <?php do_action('get_header'); ?>


  <div id="app">
    <div id="smooth-wrapper">
      <div id="smooth-content">
        <?php echo view(app('sage.view'), app('sage.data'))->render(); ?>
      </div>
    </div>
  </div>

  <?php do_action('get_footer'); ?>
  <?php wp_footer(); ?>
</body>

</html>