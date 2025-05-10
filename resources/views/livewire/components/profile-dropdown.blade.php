<div class="relative inline-block text-left" x-data="{ open: false }">
    <div>
        <button @click="open = !open" type="button" class="flex items-center focus:outline-none">
            @if ($user->avatar_url)
                <img src="{{ $user->avatar_url }}" alt="Avatar"
                    class="h-8 w-8 rounded-full object-cover border-2 border-white">
            @else
                <div
                    class="h-8 w-8 rounded-full bg-gray-400 flex items-center justify-center
                            text-white font-semibold text-sm uppercase">
                    {{ $initials }}
                </div>
            @endif
        </button>
    </div>

    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
        <div class="py-1">
            <a href="/profile" class="flex items-center px-4 py-2 text-sm hover:bg-gray-100">
                Profile
            </a>
            <div class="flex items-center justify-between px-4 py-2 text-sm hover:bg-gray-100">
                <span>Credit Score</span>
                <span class="font-semibold ">
                    {{ $creditScore }}
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-coins-icon lucide-coins"><circle cx="8" cy="8" r="6"/><path d="M18.09 10.37A6 6 0 1 1 10.34 18"/><path d="M7 6h1v4"/><path d="m16.71 13.88.7.71-2.82 2.82"/></svg>
            </div>
            <button wire:click="logout" class="w-full text-left px-4 py-2 text-sm hover:bg-gray-100">
                Logout
            </button>
        </div>
    </div>
</div>
