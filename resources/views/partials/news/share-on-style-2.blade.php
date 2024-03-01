@php
    $postUrl = 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    $ulClasses = 'relative flex justify-center mb-0 ml-0 pl-0 list-none before:content-[""] before:absolute before:inset-x before:top-1/2 before:border-dotted before:border-b before:border-b-primary before:h-[1px] before:w-full before:-z-10 before:-translate-y-1/2';
    $liClasses = 'bg-quaternary m-0 first:pl-6 last:pr-6 px-3 p-0 before:hidden';
    $aClasses = 'text-primary hover:text-font transition duration-300 ease-out'
@endphp

<x-container w="default" class="bg-quaternary !pt-0">
    <div class="text-center max-w-content-medium mx-auto px-gutter">
        <p class="text-primary text-sm mt-0 mb-2">{{ App\pl__('Teilen auf') }}</p>
        @include('partials.social.social-share', [
            'list_classes' => 'menu nav-icons icon-left',
            'useSquare' => true,
            'icon_classes' => 'fa-lg',
            'list_classes' => $ulClasses,
            'listitem_classes' => $liClasses,
            'achnor_classes' => $aClasses
        ])
    </div>

</x-container>