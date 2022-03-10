@php
    $postUrl = 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
@endphp

<div class="wp-block-group alignfull bg-white share-on">
    <div class="wp-block-group__inner-container">
        <div class="wp-block-group alignwide row--slim">
             <div class="wp-block-group__inner-container container">
                <h2>Share on</h2>
                @include('partials.social-share', [
                    'list_classes' => 'menu nav-icons icon-left',
                    'useSquare' => true,
                    'iconSize' => 'fa-4x'
                ])
            </div>
        </div>
    </div>
</div>