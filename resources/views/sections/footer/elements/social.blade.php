@php
    $socialMedia = [
        'LinkedIn' => App\getThemeOption('linkedin'),
        'Twitter' => App\getThemeOption('twitter'),
        'Xing' => App\getThemeOption('xing'),
        'Facebook' => App\getThemeOption('facebook'),
        'Instagram' => App\getThemeOption('instagram'),
        'Youtube' => App\getThemeOption('youtube'),
        'Google Plus' => App\getThemeOption('google_plus'),
    ];
    $anchorClass = 'text-white hover:text-font';
@endphp

<div class="footer-social">
    @php
        $hasSidebar = is_active_sidebar('sidebar-footer-social');
    @endphp
    @if ($hasSidebar)
        @php dynamic_sidebar('sidebar-footer-social') @endphp
    @else
        <div class="flex flex-col">
            <p class="!mb-rp-10 text-xs font-bold">{{ App\pl__('Folge uns') }}</p>
            <div class="grid grid-cols-[repeat(auto-fill,1em)] gap-2 max-w-xs w-full text-icon-big">
                @foreach ($socialMedia as $mediaName => $mediaLink)
                    @include('partials.social.social-link', [
                        'media_name' => $mediaName,
                        'media_link' => $mediaLink,
                        'icon_classes' => 'fab fa-' . strtolower(str_replace(' ', '-', $mediaName)) . '-square',
                        'anchor_classes' => $anchorClass,
                        'noListitem' => true,
                    ])
                @endforeach
            </div>
        </div>
    @endif
</div>
