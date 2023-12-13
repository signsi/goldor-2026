@php
    $postUrl = 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    $ulClasses = 'flex mb-0 ml-0 pl-0 list-none';
    $liClasses = 'm-0 mr-3 p-0 before:hidden';
    $aClasses = 'text-primary hover:text-font transition duration-300 ease-out'
@endphp

<x-container w="default" class="bg-quaternary !pt-0">
    <hr>
    <h4>{{ App\pl__('Teilen auf') }}</h4>
    @include('partials.social.social-share', [
        'list_classes' => 'menu nav-icons icon-left',
        'useSquare' => true,
        'icon_classes' => 'fa-lg',
        'list_classes' => $ulClasses,
        'listitem_classes' => $liClasses,
        'achnor_classes' => $aClasses
    ])
</x-container>