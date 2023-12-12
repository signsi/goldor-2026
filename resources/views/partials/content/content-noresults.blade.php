<x-container w="default">

	<h2>{{ App\pl__('Suche') }}</h2>
	<h1 class="mt-0">{{ App\pl__('Suche ohne Resultate - Titel') }}</h1>
	<p class="mb-xl">{{ App\pl_e('Suche ohne Resultate - Meldung') }}</p>
	<div class="p-gutter bg-greylight mt-0">
		<p>{{ App\pl_e('Suche mit Resultate - Meldung weitere Suche') }}</p>
		@include('forms.search')
	</div>
	@include('components.backtophome')

</x-container>