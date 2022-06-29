@php
$email = App\getThemeOption('email');
$phone = App\getThemeOption('tel');

$buttons = [
    [
        'label' => App\getThemeOption('email'),
        'title' => 'E-Mail schreiben',
        'href' => '#',
        'icon' => ''
    ],
    [
        'label' => App\getThemeOption('tel'),
        'title' => 'Anrufen',
        'href' => '#',
        'icon' => ''
    ],
];
@endphp

<footer id="footer-1" class="footer bg-theme/30 mt-40">
    <div class="footer-top-wrapper max-w-content mx-auto">
        <div class="px-4 py-6 sm:px-6">
            <div class="grid grid-cols-4 h-[350px]">
                <div class="flex flex-col col-span-2">
                    @include('sections.footer.elements.footer-logo')
                    <div class="flex mt-auto flex-row gap-4">
                        @each('components/list/button', $buttons, 'item')
                    </div>
                </div>
                <div class="flex flex-col">
                    @php dynamic_sidebar('sidebar-footer-1') @endphp

                    <div class="flex mt-auto">
                        <a href="#" title="Impressum">Impressum</a>
                    </div>
                </div>
                <div class="flex flex-col">
                    @php dynamic_sidebar('sidebar-footer-2') @endphp

                    <div class="flex mt-auto">
                        <a href="#" title="Impressum">Made with ❤️</a>
                    </div>
                    {{-- @include('sections.footer.elements.social') --}}

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
