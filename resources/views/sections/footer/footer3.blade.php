<footer class="footer--style3">
    <div class="footer-top-wrapper padding-xlarge-tb bg-primary">
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell small-12">
                    <p>Footer nicht gestylt</p>
                    @include('partials.footer.elements.footer-logo')
                    @include('partials.footer.elements.address')
                    @include('partials.footer.elements.social')
                    {{-- @include('partials.footer.elements.search') --}}
                    @php dynamic_sidebar('sidebar-footer1') @endphp
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