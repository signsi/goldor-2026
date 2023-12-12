@extends('wrapper.containter-default')

@section('container')
    <h2>{{ App\pl__('Error 404 - 404') }}</h2>
    <h1>{{ App\pl__('Error 404 - Titel') }}</h1>
    <p class="mb-xl">{{ App\pl_e('Error 404 - Info') }}</p>
    @include('forms.search')
    @include('components.backtophome')
@endsection