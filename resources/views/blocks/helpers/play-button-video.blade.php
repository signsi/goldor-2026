@php
    $useNoLink = $useNoLink ?? false;
    $background_url = $background_url ?? false;

    $tag = $useNoLink ? 'div' : 'a';
@endphp


<div class="control-container absolute inset-0 flex items-center justify-center @if( $background_url ) bg-contain bg-center bg-no-repeat bg-black" style="background-image: url('{{ $background_url }}') @endif">
    <{{ $tag }} class="play flex items-center justify-center text-center z-20 text-white text-[16px] md:text-[calc(16px+20*((100vw-768px)/256))] lg:text-[36px] no-underline text-primary transition-all duration-300 ease-in-out cursor-pointer hover:scale-110 group-hover:scale-110">
        <i class="fa-duotone fa-circle-play text-[3em] md:text-[2.5em] lg:text-[2em]  "></i>
    </{{ $tag }}>
</div>