<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chat') }}
        </h2>
    </x-slot>
    <div class="container" id="app">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <chat :user="{{ Auth::user() }}"/>
            </div>
        </div>
    </div>
</x-app-layout>
