@php
    $postUrl = 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    $isLinkedin = isset($showLinkedin) ? $showLinkedin: true;
    $isTwitter = isset($showTwitter) ? $showTwitter : true;
    $isWhatsapp = isset($showWhatsapp) ? $showWhatsapp : true;
    $isFacebook = isset($showFacebook)  ? $showFacebook : true;
    $isMail = isset($showMail) ? $showMail : true;
    $useSquare = $useSquare ?? false;

    $list_classes = $list_classes ?? '';
    $iconSize = $iconSize ?? 'fa-4x';

    if($useSquare){
        $linkedinIcon = 'fab fa-linkedin';
        $twitterIcon = 'fab fa-twitter-square';
        $whatsappIcon = 'fab fa-whatsapp-square';
        $facebookIcon = 'fab fa-facebook-square';
        $emailIcon = 'fas fa-envelope-square';
    }
    else{
        $linkedinIcon = 'fab fa-linkedin';
        $twitterIcon = 'fab fa-twitter';
        $whatsappIcon = 'fab fa-whatsapp';
        $facebookIcon = 'fab fa-facebook-f';
        $emailIcon = 'fas fa-envelope';
    }
@endphp

<ul class="{{ $list_classes }}">
    @if($isLinkedin)
        <li>
            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ $postUrl }}&title={{ the_title() }}" rel="noreferrer" target="_blank">
                <i class="{{ $linkedinIcon }} {{ $iconSize }}"></i>
            </a>
        </li>
    @endif
    @if($isTwitter)
        <li>
            <a href="https://twitter.com/intent/tweet?url={{ $postUrl }}&text={{ the_title() }}" title="{!! App\pl_e('Tweet this') !!}" rel="noreferrer" target="_blank">
                <i class="{{ $twitterIcon }} {{ $iconSize }}"></i>
            </a>
        </li>
    @endif
    @if($isWhatsapp)
        <li>
            <a href="https://api.whatsapp.com/send/?phone&text={!! App\pl_e('Hier ist ein Beitrag, der dich interessieren könnte:') !!} *{{ the_title() }}* - {{ $postUrl }}." rel="noreferrer" target="_blank">
                <i class="{{ $whatsappIcon }} {{ $iconSize }}"></i>
            </a>
        </li>
    @endif
    @if($isFacebook)
        <li>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $postUrl; ?>" title="{!! App\pl_e('Teile auf Facebook') !!}" rel="noreferrer" target="_blank">
                <i class="{{ $facebookIcon }} {{ $iconSize }}"></i>
            </a>
        </li>
    @endif
    @if($isMail)
        <li>
            <a href="mailto:?subject=<?php echo the_title(); ?>&body={!! App\pl_e('Hier ist ein Beitrag, der dich interessieren könnte:') !!} &#32;&#32;{{ $postUrl }}" title="{!! App\pl_e('Beitrag weiterleiten') !!}" rel="noreferrer" target="_blank">
                <i class="{{ $emailIcon }} {{ $iconSize }}"></i>
            </a>
        </li>
    @endif
</ul>