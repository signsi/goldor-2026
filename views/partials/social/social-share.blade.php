@php
$postUrl = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$isLinkedin = isset($showLinkedin) ? $showLinkedin : true;
$isTwitter = isset($showTwitter) ? $showTwitter : true;
$isWhatsapp = isset($showWhatsapp) ? $showWhatsapp : true;
$isFacebook = isset($showFacebook) ? $showFacebook : true;
$isMail = isset($showMail) ? $showMail : true;
$useSquare = $useSquare ?? false;

$list_classes = $list_classes ?? '';
$listitem_classes = $listitem_classes ?? '';
$achnor_classes = $achnor_classes ?? '';
$icon_classes = $icon_classes ?? '';

if ($useSquare) {
    $linkedinIcon = 'fab fa-linkedin';
    $twitterIcon = 'fab fa-twitter-square';
    $whatsappIcon = 'fab fa-whatsapp-square';
    $facebookIcon = 'fab fa-facebook-square';
    $emailIcon = 'fas fa-envelope-square';
} else {
    $linkedinIcon = 'fab fa-linkedin';
    $twitterIcon = 'fab fa-twitter';
    $whatsappIcon = 'fab fa-whatsapp';
    $facebookIcon = 'fab fa-facebook-f';
    $emailIcon = 'fas fa-envelope';
}
@endphp

<ul class="{{ $list_classes }}">
    @if ($isLinkedin)
        <li class="{{ $listitem_classes }}">
            <a  class="{{ $achnor_classes }}" href="https://www.linkedin.com/shareArticle?mini=true&url={{ $postUrl }}&title={{ the_title() }}"
                title="{{ App\pl__('Social Share - LinkedIn') }}" alt="{{ App\pl__('Social Share - LinkedIn') }}"
                rel="noreferrer" target="_blank">
                <i class="{{ $linkedinIcon }} {{ $icon_classes }}" title="LinkedIn"></i>
            </a>
        </li>
    @endif
    @if ($isTwitter)
        <li class="{{ $listitem_classes }}">
            <a  class="{{ $achnor_classes }}" href="https://twitter.com/intent/tweet?url={{ $postUrl }}&text={{ the_title() }}"
                title="{{ App\pl__('Social Share - Twitter') }}" alt="{{ App\pl__('Social Share - Twitter') }}"
                rel="noreferrer" target="_blank">
                <i class="{{ $twitterIcon }} {{ $icon_classes }}" title="Twitter"></i>
            </a>
        </li>
    @endif
    @if ($isWhatsapp)
        <li class="{{ $listitem_classes }}">
            <a class="{{ $achnor_classes }}" href="https://api.whatsapp.com/send/?phone&text={{ App\pl__('Social Share - Meldung') }} *{{ the_title() }}* - {{ $postUrl }}."
                title="{{ App\pl__('Social Share - Whatsapp') }}" alt="{{ App\pl__('Social Share - Whatsapp') }}"
                rel="noreferrer" target="_blank">
                <i class="{{ $whatsappIcon }} {{ $icon_classes }}" title="WhatsApp"></i>
            </a>
        </li>
    @endif
    @if ($isFacebook)
        <li class="{{ $listitem_classes }}">
            <a  class="{{ $achnor_classes }}" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $postUrl; ?>"
                title="{{ App\pl__('Social Share - Facebook') }}" alt="{{ App\pl__('Social Share - Facebook') }}"
                rel="noreferrer" target="_blank">
                <i class="{{ $facebookIcon }} {{ $icon_classes }}" title="Facebook"></i>
            </a>
        </li>
    @endif
    @if ($isMail)
        <li class="{{ $listitem_classes }}">
            <a  class="{{ $achnor_classes }}" href="mailto:?subject=<?php echo the_title(); ?>&body={{ App\pl__('Social Share - Meldung') }} &#32;&#32;{{ $postUrl }}"
                title="{{ App\pl__('Social Share - Mail') }}" alt="{{ App\pl__('Social Share - Mail') }}"
                rel="noreferrer" target="_blank">
                <i class="{{ $emailIcon }} {{ $icon_classes }}" title="Mail"></i>
            </a>
        </li>
    @endif
</ul>
