@php
    $linkedin = App\getThemeOption('linkedin');
    $twitter = App\getThemeOption('twitter');
    $xing = App\getThemeOption('xing');
    $facebook = App\getThemeOption('facebook');
    $instagram = App\getThemeOption('instagram');
    $youtube = App\getThemeOption('youtube');
    $google_plus = App\getThemeOption('google_plus');
    $anchorClass = 'text-white hover:text-font'
@endphp

<div class="flex flex-col">
    <p class="mb-2 lg:mb-4 font-bold">{{ App\pl__('Folge uns') }}</p>
    <div class="flex space-x-4 justify-start text-icon-big">
        @include('partials.social.social-link',['media_name' => 'LinkedIn', 'media_link' => $linkedin, 'icon_classes' => 'fab fa-linkedin', 'anchor_classes' => $anchorClass, 'noListitem' => true])
        @include('partials.social.social-link',['media_name' => 'Facebook', 'media_link' => $facebook, 'icon_classes' => 'fab fa-facebook-square', 'anchor_classes' => $anchorClass, 'noListitem' => true])
        @include('partials.social.social-link',['media_name' => 'Twitter', 'media_link' => $twitter, 'icon_classes' => 'fab fa-twitter-square', 'anchor_classes' => $anchorClass, 'noListitem' => true])
        @include('partials.social.social-link',['media_name' => 'Instagram', 'media_link' => $instagram, 'icon_classes' => 'fab fa-instagram-square', 'anchor_classes' => $anchorClass, 'noListitem' => true])
        @include('partials.social.social-link',['media_name' => 'Google Plus', 'media_link' => $google_plus, 'icon_classes' => 'fab fa-google-plus-square', 'anchor_classes' => $anchorClass, 'noListitem' => true])
        @include('partials.social.social-link',['media_name' => 'Xing', 'media_link' => $xing, 'icon_classes' => 'fab fa-xing-square', 'anchor_classes' => $anchorClass, 'noListitem' => true])
        @include('partials.social.social-link',['media_name' => 'Youtube', 'media_link' => $youtube, 'icon_classes' => 'fab fa-youtube-square', 'anchor_classes' => $anchorClass, 'noListitem' => true])
    </div>
</div>