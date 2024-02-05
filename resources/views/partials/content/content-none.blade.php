<x-container w="default">

    <h2>{{ App\pl__('Error 404 - 404') }}</h2>
    <h1 class="mt-0">{{ App\pl__('Error 404 - Titel') }}</h1>
    <p class="mb-xl">{{ App\pl_e('Error 404 - Info') }}</p>
    <div class="p-gutter bg-greylight mt-0">
        @include('forms.search')
    </div>
    @include('components.backtophome')

</x-container>