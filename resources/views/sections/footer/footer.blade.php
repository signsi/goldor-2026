<footer id="siteFooter" aria-labelledby="footer-heading">
    <div class="has-primary-background-color has-background">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="max-w-content-hf px-gutter py-2xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter">
                <!-- Footer Sidebar 1 -->
                <div class="footerSidebar-1 flex flex-col gap-y-medium">
                    @if(is_active_sidebar('sidebar-footer-1'))
                        @php (dynamic_sidebar('sidebar-footer-1'))
                    @else
                        @relativeInclude('elements.logo')
                        @relativeInclude('elements.address')
                    @endif
                </div>
                <!-- Footer Sidebar 2 -->
                <div class="footerSidebar-2 flex flex-col gap-y-medium">
                    @if(is_active_sidebar('sidebar-footer-2'))
                        @php (dynamic_sidebar('sidebar-footer-2'))
                    @else
                        @relativeInclude('elements.navigation', ['menu_location' => 'footer_navigation_1'])
                    @endif
                </div>
                <!-- Footer Sidebar 3 -->
                <div class="footerSidebar-3 flex flex-col gap-y-medium">
                    @if(is_active_sidebar('sidebar-footer-3'))
                        @php (dynamic_sidebar('sidebar-footer-3'))
                    @else
                        @relativeInclude('elements.navigation', ['menu_location' => 'footer_navigation_2'])
                    @endif
                </div>
                <!-- Footer Sidebar 4 -->
                <div class="footerSidebar-4 flex flex-col gap-y-medium">
                    @if(is_active_sidebar('sidebar-footer-4'))
                        @php (dynamic_sidebar('sidebar-footer-4'))
                    @else
                        @relativeInclude('elements.navigation', ['menu_location' => 'footer_navigation_3', 'list_style' => 'is-style-liststyle-icon--download'])
                        @relativeInclude('elements.socialmedia-nav')
                        @relativeInclude('elements.mailchimp')
                        @if(is_active_sidebar('sidebar-footer-cta'))
                            @php (dynamic_sidebar('sidebar-footer-cta'))
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom Section -->
    <div class="has-secondary-background-color has-background" aria-labelledby="footer-bottom">
        <h2 id="footer-bottom" class="sr-only">Footer bottom</h2>
        <div class="footerDisclaimer max-w-content-hf px-gutter py-2.5 mx-auto">
            <nav>
                @relativeInclude('elements.disclaimer')
            </nav>
        </div>
    </div>
</footer>
