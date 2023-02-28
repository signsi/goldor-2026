@php
    $newsletter_url = App\getThemeOption('newsletter_url') ?? false;
@endphp

@if($newsletter_url)
    <div class="footer-newsletter">
        <p class="mb-2 lg:mb-4 font-bold">{{ __('Newsletter abonnieren', 'rocketpager') }}</p>
        <div class="wp-block-button">
            <a class="wp-block-button__link is-style-outline text-xs hover:text-primary" href="{{ $newsletter_url }}" target="_blank" rel="noreferrer noopener">{{ __('Hier abonnieren', 'rocketpager') }}</a>
        </div>
    </div>
@endif