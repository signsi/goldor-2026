<footer class="footer--style2">
    <div class="footer-top-wrapper padding-xlarge-tb bg-primary">
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell small-12 large-2">
                    @include('partials.footer.elements.footer-logo')
                </div>
                <div class="cell small-12 large-auto">
                    @include('partials.footer.elements.address')
                </div>
                <div class="cell small-12 large-auto">
                    @php dynamic_sidebar('sidebar-footer1') @endphp
                </div>
                <div class="cell small-12 large-auto">
                    @php dynamic_sidebar('sidebar-footer2') @endphp
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