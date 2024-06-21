@php
    $generalColStyles = 'flex flex-col gap-y-medium';
@endphp

{{-- verfügbare Komponenten:
@relativeInclude('elements.logo')
@relativeInclude('elements.address')
@relativeInclude('elements.copyright')
@relativeInclude('elements.mailchimp')
@relativeInclude('elements.socialmedia-nav')
@if (has_nav_menu('footer_navigation_1'))
    @relativeInclude('elements.navigation', ['menu_location' => 'footer_navigation_1', 'list_style' => 'is-style-liststyle-icon-start--arrow-right-long', 'listItem_style' => 'translate-x-0 transition-all origin-center hover:translate-x-1.5 [&_svg]:hidden'])
@endif
@if(is_active_sidebar('sidebar-footer-1'))
    @php dynamic_sidebar('sidebar-footer-1') @endphp
@endif --}}

<footer id="siteFooter" aria-labelledby="footer-heading">
    <div class="bg-primary text-white px-gutter [&_p]:text-xs [&_address]:text-xs [&_li]:text-xs [&_a:hover]:text-secondary">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="max-w-content-footer py-3xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter [&_*]:my-0">
                <div class="{{ $generalColStyles }}">
                    @relativeInclude('elements.logo')
                </div>
                <div class="{{ $generalColStyles }}">
                    @relativeInclude('elements.address')
                </div>
                <div class="{{ $generalColStyles }}">
                    @if(is_active_sidebar('sidebar-footer-3'))
                        @php dynamic_sidebar('sidebar-footer-3') @endphp
                    @endif
                </div>
                <div class="{{ $generalColStyles }}">
                    @if (has_nav_menu('primary_navigation'))
                        @relativeInclude('elements.navigation', ['menu_location' => 'primary_navigation', 'list_style' => 'is-style-liststyle-icon-start--arrow-right-long', 'listItem_style' => 'translate-x-0 transition-all origin-center hover:translate-x-1.5 [&_svg]:hidden'])
                    @endif
                    @relativeInclude('elements.socialmedia-nav')
                </div>
            </div>
        </div>
    </div>
    <div class="bg-secondary text-white px-gutter" aria-labelledby="footer-bottom">
        <h2 id="footer-bottom" class="sr-only">Footer bottom</h2>
        <div class="footerDisclaimer max-w-content-footer py-2.5 mx-auto">
            @relativeInclude('elements.disclaimer')
        </div>
    </div>
</footer>