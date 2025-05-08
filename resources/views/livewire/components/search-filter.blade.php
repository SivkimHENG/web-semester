<div class="flex flex-col md:flex-row md:space-x-4 space-y-4 md:space-y-0">
    <!-- Search input -->
    <div class="flex-1">
        <input type="text" wire:model.live.debounce.100ms="search" id="search"
            class="block w-89 pl-3 pr-12 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
            placeholder="Search by name or description…" />
    </div>

</div>
