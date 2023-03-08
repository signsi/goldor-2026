@php
$company_name = App\getThemeOption('company_name');
$current_year = date("Y");
@endphp

<div class="cell small-4 footer--copyright">
    <span>Copyright © {{$current_year}} {{$company_name}}</span>
</div>
