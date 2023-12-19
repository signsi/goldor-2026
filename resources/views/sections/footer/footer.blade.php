<footer id="siteFooter" aria-labelledby="footer-heading">
    <div class="bg-primary text-white px-gutter">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="max-w-content-hf py-3xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter [&_*]:my-0 [&_a:hover]:text-secondary">
                <!-- Footer Sidebar 1 -->
                <div class="footerSidebar-1 flex flex-col gap-y-medium">
                    @if(is_active_sidebar('sidebar-footer-1'))
                        @php (dynamic_sidebar('sidebar-footer-1'))
                    @else
                        @relativeInclude('elements.logo')
                    @endif
                </div>
                <!-- Footer Sidebar 2 -->
                <div class="footerSidebar-2 flex flex-col gap-y-medium">
                    @if(is_active_sidebar('sidebar-footer-2'))
                        @php (dynamic_sidebar('sidebar-footer-2'))
                    @else
                        @if (has_nav_menu('footer_navigation_1'))
                            @relativeInclude('elements.navigation', ['menu_location' => 'footer_navigation_1'])
                        @else
                            @relativeInclude('elements.address')
                        @endif
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
                    <nav>
                        @if (has_nav_menu('primary_navigation'))
                            @php(wp_nav_menu([
                                'theme_location' => 'primary_navigation',
                                'menu_class' => 'is-style-liststyle-icon-start--arrow-right-long',
                                'walker' => new SubmenuWrap(),
                            ]))
                        @endif
                    </nav>
                </div>
            </div>
            @relativeInclude('elements.copyright')
        </div>
    </div>
    <!-- Footer Bottom Section -->
    <div class="bg-secondary text-white px-gutter" aria-labelledby="footer-bottom">
        <h2 id="footer-bottom" class="sr-only">Footer bottom</h2>
        <div class="footerDisclaimer max-w-content-hf py-2.5 mx-auto">
            <nav>
                @relativeInclude('elements.disclaimer')
            </nav>
        </div>
    </div>
</footer>