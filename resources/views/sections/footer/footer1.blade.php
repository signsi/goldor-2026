<footer class="footer">
    <div class="footer-top-wrapper max-w-content mx-auto">
        <div class="px-4 py-6 sm:px-6">
            <div class="grid grid-cols-4">
                <div class="bg-theme">
                    @include('sections.footer.elements.footer-logo')
                </div>
                <div class="">
                    @include('sections.footer.elements.address')
                </div>
                <div class="">
                    @php dynamic_sidebar('sidebar-footer-1') @endphp
                </div>
                <div class="">
                    @php dynamic_sidebar('sidebar-footer-2') @endphp
                    @include('sections.footer.elements.social')

                </div>
            </div>
        </div>
    </div>
    @if (has_nav_menu('disclaimer_navigation'))
        <div class="footer-bottom-wrapper">
            <div class="grid-container">
                <div class="grid-x grid-margin-x">
                    <div class="cell small-12">
                        @include('sections.footer.elements.disclaimer')
                    </div>
                </div>
            </div>
        </div>
    @endif
</footer>
