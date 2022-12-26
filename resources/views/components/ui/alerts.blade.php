@if (session()->has('success'))
    <div x-data="{open: true}" x-init="setTimeout(() => {open = false }, 3000)" x-show="open" class="flex items-center p-2 mb-4 text-white bg-green-600 rounded">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 pt-1 mr-3">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>
            {{ session('success') }}
        </span>
    </div>
@endif

@if (session()->has('error'))
    <div x-data="{open: true}" x-init="setTimeout(() => {open = false }, 3000)" x-show="open" class="flex items-center p-2 mb-4 text-white bg-red-400 rounded">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 pt-1 mr-3">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
        </svg>

        </svg>
        <span>
            {{ session('error') }}
        </span>
    </div>
@endif