<x-container w="default">

    <h2>{{ App\pl__('Error 404 - 404') }}</h2>
    <h1 class="mt-0">{{ App\pl__('Error 404 - Titel') }}</h1>
    <p class="mb-xl">{{ App\pl_e('Error 404 - Info') }}</p>
    @include('forms.search')
    @include('components.backtophome')

</x-container>