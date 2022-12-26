<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <x-slot name="nav">
        <div class="space-x-4">
            {{-- Index --}}
            <x-jet-nav-link href="{{ route('post.index') }}" :active="request()->routeIs('post.index')">
                {{ __('Index') }}
            </x-jet-nav-link>

            {{-- Create --}}
            <x-jet-nav-link href="{{ route('post.create') }}" :active="request()->routeIs('post.create')">
                {{ __('Create') }}
            </x-jet-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6">
                    <form action="{{ route('post.update', $post) }}" method="POST">
                        @csrf
                        @method('put')
                        <div>
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$category->name" required autofocus autocomplete="name" />
                            <span class="mt-2 text-xs text-gray-400">Maximum 80 characters</span>
                            <x-jet-input-error for="name" class="mt-2"/>
                        </div>
    
                        <x-jet-button class="mt-8">
                            {{ __('Update') }}
                        </x-jet-button>
                            
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
