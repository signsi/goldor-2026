@php
    $postUrl = 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    $ulClasses = 'flex mb-0 ml-0 pl-0 list-none';
    $liClasses = 'm-0 mr-3 p-0 before:hidden';
    $aClasses = 'text-primary hover:text-font transition duration-300 ease-out'
@endphp

<x-container w="wide">
    <h3>{{ App\pl__('Teilen auf') }}</h3>
    @include('partials.social.social-share', [
        'list_classes' => 'menu nav-icons icon-left',
        'useSquare' => true,
        'icon_classes' => 'fa-2x',
        'list_classes' => $ulClasses,
        'listitem_classes' => $liClasses,
        'achnor_classes' => $aClasses
    ])
</x-container>