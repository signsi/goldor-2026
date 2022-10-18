@php
    $postUrl = 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
@endphp

<div class="wp-block-group has-grey-background-color has-background is-style-layout-full share-on">
  <div class="wp-block-group is-style-layout-small">
        <h2>Share on</h2>
        @include('partials.social-share', [
            'list_classes' => 'menu nav-icons icon-left',
            'useSquare' => true,
            'icon_classes' => 'fa-4x'
        ])
    </div>
</div>