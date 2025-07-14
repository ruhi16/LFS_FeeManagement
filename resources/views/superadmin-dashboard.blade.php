
<x-app-layout>
    @section('header')
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ 'Dashboard: ' . auth()->user()->name  .': ' . auth()->user()->teacher->name }}
        </h2>    
    @endsection

    <div class="min-w-full min-h-screen flex flex-col md:flex-row gap-2 p-2">
        <aside class="w-full md:w-1/4 lg:w-1/5 bg-gray-200 p-4">
            <div class="bg-white shadow rounded-lg p-6 mb-4">
                <h3 class="text-lg font-semibold mb-4">Super Admin Menu</h3>
                    
            </div>          
        </aside>
        
        <main class="flex-1 p-4 bg-yellow-100">
            <div class="bg-white shadow rounded-lg p-6 mb-2">
                <h3 class="text-xl font-bold mb-2">Welcome to the Super Admin Dashboard</h3>
                <p class="text-gray-600">Here you can manage all aspects of the application.</p>
            </div>
            {{-- @livewire('fee06-catelog-comp') --}}
            {{-- @livewire('fee08-structure-detail-comp') --}}
            @livewire('fee10-collection-detail-comp')
        </main>

    </div>
        {{-- @livewire('home') --}}


</x-app-layout>







