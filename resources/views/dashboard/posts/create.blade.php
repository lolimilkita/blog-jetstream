<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <x-slot name="nav">
        <div class="space-x-4">
            {{-- Index --}}
            <x-jet-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                {{ __('Index') }}
            </x-jet-nav-link>

            {{-- Create --}}
            <x-jet-nav-link href="{{ route('posts.create') }}" :active="request()->routeIs('posts.create')">
                {{ __('Create') }}
            </x-jet-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6">

                    <x-form action="{{ route('posts.store') }}" has-files>

                        <div class="space-y-6">
                            
                            {{-- Cover Image --}}
                            <div>
                                <x-jet-label for="cover_image" value="{{ __('Cover Image') }}" />
                                <input type="file" name="cove_image" id="cover_image">
                                <span class="mt-2 text-xs text-gray-400">File type:jpg & png only</span>
                                <x-jet-input-error for="cover_image" class="mt-2"/>
                            </div>
                            
                            {{-- Title --}}
                            <div>
                                <x-jet-label for="title" value="{{ __('Title') }}" />
                                <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                                <span class="mt-2 text-xs text-gray-400">Maximum 80 characters</span>
                                <x-jet-input-error for="title" class="mt-2"/>
                            </div>

                            {{-- Category --}}
                            <div>
                                <x-jet-label for="category_id" value="{{ __('Categories') }}"/>
                                <select name="category_id" id="category_id" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                    <option value="">Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="title" class="mt-2"/>
                            </div>

                            {{-- Body --}}
                            <div>
                                <x-jet-label for="body" value="{{ __('Body') }}"/>
                                <x-trix name="body" styling="overflow-y-scroll h-96"></x-trix>
                                <x-jet-input-error for="body" class="mt-2"/>
                            </div>
                            
                            {{-- Tags --}}
                            <div>
                                <x-tags :tags="$tags" />
                            </div>
                            
                            {{-- Schedule --}}
                            <div>
                                <x-jet-label for="published_at" value="{{ __('Published At') }}"/>
                                <x-pikaday name="published_at" />
                                {{-- <input type="date" name="published_at" id="published_at"> --}}
                            </div>
                            
                            {{-- Meta Description --}}
                            <div>
                                <x-jet-label for="meta_description" value="{{ __('Meta Description') }}"/>
                                <x-trix name="meta_description" styling="overflow-y-scroll h-42"></x-trix>
                                <x-jet-input-error for="meta_description" class="mt-2"/>
                            </div>

                        </div>
    
                        <x-jet-button class="mt-8">
                            {{ __('Create') }}
                        </x-jet-button>
                    </x-form>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
