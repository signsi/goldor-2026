@php
    $newsletter_url = App\getThemeOption('newsletter_url') ?? false;
@endphp
@if($mailchimp_url != '')
    <div class="footer-newsletter">
        <p class="mb-0"><strong>{{ __('Newsletter abonnieren', 'rocketpager') }}</strong></p>
        <div class="mailchimpWrapper">
            <form action="{{$mailchimp_url}}" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="flex items-center justify-between relative group validate" target="_blank" novalidate>
                <label for="email-address" class="sr-only">{{ __('E-Mail', 'rocketpager') }}</label>
                <input type="email" value="" name="EMAIL" id="mce-EMAIL" class="input-newsletter required email pl-0 border-b border-b-white pr-8 md:pr-10 w-full outline-none bg-transparent border-t-0 border-x-0 focus:ring-0 focus:border-b-font placeholder:text-white opacity-75 focus:opacity-100 focus:placeholder:text-font transition-colors" placeholder="{{ __('E-Mail', 'rocketpager') }}" required />
                <button value="Subscribe" name="subscribe" id="mc-embedded-subscribe" type="submit" class="absolute right-0 flex items-center bg-transparent pl-5 text-base" aria-label="{{ __('Submit') }}">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path id="submitArrowRight" class="fill-white transition-colors" d="M509.7 261.7c3.125-3.125 3.125-8.188 0-11.31l-152-152C356.1 96.78 354.1 95.1 352 95.1s-4.094 .7813-5.656 2.344c-3.125 3.125-3.125 8.188 0 11.31l138.3 138.3H8c-4.406 0-8 3.578-8 8C0 260.4 3.594 263.1 8 263.1h476.7l-138.3 138.3c-3.125 3.125-3.125 8.188 0 11.31s8.188 3.125 11.31 0L509.7 261.7z"/></svg>
                </button>
                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;" aria-hidden="true">
                    <input type="text" name="b_b753ec0b9f3c479e8e090a41f_3ac20255df" tabindex="-1" value="">
                </div>
            </form>
            <div id="mce-responses" class="clear foot mt-4 text-sm text-white">
                <div class="response" id="mce-error-response" style="display:none"></div>
                <div class="response" id="mce-success-response" style="display:none"></div>
            </div>
            <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
            <script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
        </div>
    </div>
@endif