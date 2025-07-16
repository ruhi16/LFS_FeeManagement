
<x-app-layout>
    @section('header')
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ 'Dashboard: ' . auth()->user()->name  .': ' . auth()->user()->teacher->name }}
        </h2>    
    @endsection


    
    @livewire('fee00-management-main-layout-comp')

    {{-- @livewire('home') --}}


</x-app-layout>







