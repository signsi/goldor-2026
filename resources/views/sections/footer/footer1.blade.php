@php
$email = App\getThemeOption('email');
$phone = App\getThemeOption('tel');
$firmenname = App\getThemeOption('firmenname');
$aktuellesJahr = date('Y');

$buttons = [
    [
        'label' => App\getThemeOption('email'),
        'title' => 'E-Mail schreiben',
        'href' => '#',
        'icon' => '',
    ],
    [
        'label' => App\getThemeOption('tel'),
        'title' => 'Anrufen',
        'href' => '#',
        'icon' => '',
    ],
];
@endphp

<footer class="bg-white" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="max-w-default mx-auto px-gutter py-element">
        <div class="xl:grid xl:grid-cols-3 xl:gap-8">
            <div class="grid grid-cols-2 gap-8 xl:col-span-2">
                <div class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        @php dynamic_sidebar('sidebar-footer-1') @endphp
                    </div>
                    <div class="mt-12 md:mt-0">
                        @php dynamic_sidebar('sidebar-footer-2') @endphp

                    </div>
                </div>
                <div class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        @php dynamic_sidebar('sidebar-footer-3') @endphp
                    </div>
                    <div class="mt-12 md:mt-0">
                        @php dynamic_sidebar('sidebar-footer-4') @endphp

                    </div>
                </div>
            </div>
            <div class="mt-8 xl:mt-0">
                @php dynamic_sidebar('sidebar-footer-cta') @endphp

            </div>
        </div>
        <div class="mt-8 border-t border-gray-200 pt-8 md:flex md:items-center md:justify-between">
            <div class="flex space-x-6 md:order-2">
                @php dynamic_sidebar('sidebar-footer-social') @endphp
            </div>
            <p class="mt-8 text-base text-gray-400 md:mt-0 md:order-1">&copy; {{ $aktuellesJahr }}
                {{ $firmenname }}.
                Alle Rechte
                vorbehalten.
            </p>
        </div>
    </div>
</footer>
