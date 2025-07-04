<div class="relative">
    <input name="search" hx-get="/api/search" hx-trigger="keyup changed delay:300ms" hx-target="#search-container"
        class="w-full outline-0 border-gray-300 dark:border-gray-500 dark:bg-gray-700 rounded-lg border pl-8 pr-4 py-2 placeholder:text-gray-400"
        placeholder="Search for a city...">
    <x-icons.search class="fill-gray-400 absolute translate-y-1/2 bottom-1/2 left-2" />
    <span id="search-container"></span>
</div>
