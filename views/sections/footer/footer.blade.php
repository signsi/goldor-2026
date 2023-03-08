<footer id="siteFooter" aria-labelledby="footer-heading">
    <div class="has-secondarydark-background-color has-background">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="max-w-large 2xl:max-w-xlarge px-gutter py-element mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 2xl:grid-cols-4 gap-gutter">
                <div class="footerSidebar-1 flex flex-col gap-y-gutter">
                    @if(is_active_sidebar('sidebar-footer-1'))
                        @php (dynamic_sidebar('sidebar-footer-1'))
                    @else
                        @relInclude('elements.logo')
                        @relInclude('elements.address')
                    @endif
                </div>
                <div class="footerSidebar-2 flex flex-col gap-y-gutter">
                    @if(is_active_sidebar('sidebar-footer-2'))
                        @php (dynamic_sidebar('sidebar-footer-2'))
                    @else
                        @relInclude('elements.navigation', ['menu_location' => 'footer_navigation_1'])
                        @relInclude('elements.navigation', ['menu_location' => 'footer_navigation_2'])
                    @endif
                </div>
                <div class="footerSidebar-3 flex flex-col gap-y-gutter">
                    @if(is_active_sidebar('sidebar-footer-3'))
                        @php (dynamic_sidebar('sidebar-footer-3'))
                    @else
                        @relInclude('elements.navigation', ['menu_location' => 'footer_navigation_3', 'list_style' => 'is-style-liststyle-icon--download'])
                    @endif
                </div>
                <div class="footerSidebar-4 md:col-span-3 2xl:col-span-1 grid grid-cols-1 md:grid-cols-3 2xl:flex 2xl:flex-col gap-gutter">
                    @if(is_active_sidebar('sidebar-footer-4'))
                        @php (dynamic_sidebar('sidebar-footer-4'))
                    @else
                        @relInclude('elements.socialmedia-nav')
                        @relInclude('elements.mailchimp')
                        @if(is_active_sidebar('sidebar-footer-cta'))
                            @php (dynamic_sidebar('sidebar-footer-cta'))
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="has-secondary-background-color has-background" aria-labelledby="footer-bottom">
        <h2 id="footer-bottom" class="sr-only">Footer bottom</h2>
        <div class="footerDisclaimer max-w-large 2xl:max-w-xlarge px-gutter py-2.5 mx-auto">
            <nav>
                @relInclude('elements.disclaimer')
            </nav>
        </div>
    </div>
</footer>
