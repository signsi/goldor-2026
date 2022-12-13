@php
    $linkedin = App\getThemeOption('linkedin');
    $twitter = App\getThemeOption('twitter');
    $xing = App\getThemeOption('xing');
    $facebook = App\getThemeOption('facebook');
    $instagram = App\getThemeOption('instagram');
    $youtube = App\getThemeOption('youtube');
    $google_plus = App\getThemeOption('google_plus');
@endphp

<div class="social-media-navigation">
    <ul>
        @include('blocks.helpers.social-link',['media_name' => 'LinkedIn', 'media_link' => $linkedin, 'icon_classes' => 'fab fa-linkedin'])
        @include('blocks.helpers.social-link',['media_name' => 'Twitter', 'media_link' => $twitter, 'icon_classes' => 'fab fa-twitter'])
        @include('blocks.helpers.social-link',['media_name' => 'Xing', 'media_link' => $xing, 'icon_classes' => 'fab fa-xing'])
        @include('blocks.helpers.social-link',['media_name' => 'Facebook', 'media_link' => $facebook, 'icon_classes' => 'fab fa-facebook-f'])
        @include('blocks.helpers.social-link',['media_name' => 'Instagram', 'media_link' => $instagram, 'icon_classes' => 'fab fa-instagram'])
        @include('blocks.helpers.social-link',['media_name' => 'Youtube', 'media_link' => $youtube, 'icon_classes' => 'fab fa-youtube'])
        @include('blocks.helpers.social-link',['media_name' => 'Google Plus', 'media_link' => $google_plus, 'icon_classes' => 'fab fa-google-plus'])
    </ul>
</div>