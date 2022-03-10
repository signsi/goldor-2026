<footer class="footer--style1">
    <div class="footer-top-wrapper padding-xlarge-tb bg-primary">
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell small-12 large-4">
                    @include('partials.footer.elements.footer-logo')
                    @include('partials.footer.elements.address')
                </div>
                <div class="cell small-12 large-5">
                    @php dynamic_sidebar('sidebar-footer1') @endphp
                </div>
                <div class="cell small-12 large-3">
                    @php dynamic_sidebar('sidebar-footer2') @endphp
                    @include('partials.footer.elements.social')

                </div>
            </div>
        </div>
    </div>
    @if (has_nav_menu('disclaimer_navigation'))
        <div class="footer-bottom-wrapper">
            <div class="grid-container">
                <div class="grid-x grid-margin-x">
                    <div class="cell small-12">
                        @include('partials.footer.elements.disclaimer')
                    </div>
                </div>
            </div>
        </div>
    @endif
</footer>
