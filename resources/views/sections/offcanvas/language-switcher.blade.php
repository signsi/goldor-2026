<!-- Language Switcher -->
<div class="reveal languageSwitcher" id="modal-languageswitcher" data-reveal data-animation-in="fade-in">
    <h3 class="reveal-title">{!! App\pl_e('Welche Sprache möchtest du nutzen?') !!}</h3>
        <ul class="lang-switcher ">
            @php pll_the_languages([
                    'show_flags' => 0,
                    'show_names' => 1,
                    'hide_current' => 0,
                    'no_translation' => 1,
                ]);
            @endphp
        </ul>
    <button class="close-button-2" data-close aria-label="{!! App\pl_e('Schliesse Sprachauswahl') !!}" type="button">
        <i class="fal fa-times"></i>
    </button>

    <div class="wp-block-buttons">
        <div class="wp-block-button"><a class="wp-block-button__link" data-close aria-label="{!! App\pl_e('Schliesse Sprachauswahl') !!}">{!! App\pl_e('Abbrechen') !!}</a></div>
    </div>

</div>
<!-- Language Switcher END -->
