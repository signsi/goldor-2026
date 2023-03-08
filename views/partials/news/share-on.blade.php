@php
    $postUrl = 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    $ulClasses = 'flex mb-0 ml-0 pl-0 list-none';
    $liClasses = 'm-0 mr-3 p-0 before:hidden';
    $aClasses = 'text-primary hover:text-font transition duration-300 ease-out'
@endphp

<div class="wp-block-group has-grey-background-color has-background is-style-layout-full">
  <div class="wp-block-group is-style-layout-small">
        <h3>Share on</h3>
        @include('partials.social.social-share', [
            'list_classes' => 'menu nav-icons icon-left',
            'useSquare' => true,
            'icon_classes' => 'fa-2x',
            'list_classes' => $ulClasses,
            'listitem_classes' => $liClasses,
            'achnor_classes' => $aClasses
        ])
    </div>
</div>