@php
    $socialMedia = [
        'LinkedIn' => ['link' => App\getThemeOption('linkedin'), 'icon' => 'fa-linkedin'],
        'Facebook' => ['link' => App\getThemeOption('facebook'), 'icon' => 'fa-square-facebook'],
        'Twitter' => ['link' => App\getThemeOption('twitter'), 'icon' => 'fa-square-x-twitter'],
        'Instagram' => ['link' => App\getThemeOption('instagram'), 'icon' => 'fa-square-instagram'],
        'Xing' => ['link' => App\getThemeOption('xing'), 'icon' => 'fa-square-xing'],
        'Youtube' => ['link' => App\getThemeOption('youtube'), 'icon' => 'fa-square-youtube'],
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
                @foreach ($socialMedia as $mediaName => $mediaProp)
                    @include('partials.social.social-link', [
                        'media_name' => $mediaName,
                        'media_link' => $mediaProp['link'],
                        'icon_classes' => 'fab ' . $mediaProp['icon'],
                        'anchor_classes' => $anchorClass,
                        'noListitem' => true,
                    ])
                @endforeach
            </div>
        </div>
    @endif
</div>
