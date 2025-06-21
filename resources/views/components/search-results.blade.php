<ul id="search-res" x-show="open"
    class="absolute mt-2 w-full border-gray-300 dark:border-gray-500 bg-white dark:bg-gray-700 rounded-lg border px-4 py-2">
    @if (count($items) > 0)
        @foreach ($items as $item)
            <li hx-trigger="click"
                hx-get="/api/get-data?lng={{ $item['longitude'] }}&lat={{ $item['latitude'] }}&city={{ $item['name'] }}&countryCode={{ $item['country_code'] }}"
                hx-swap="outerHTML" hx-target="#landing"
                class="py-2 px-2 rounded-md cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-500 items-start flex gap-2">
                <div class="py-1">
                    <img src="https://hatscripts.github.io/circle-flags/flags/{{ strtolower($item['country_code']) }}.svg"
                        width="32" />
                </div>
                <div class="flex flex-col">
                    <span>{{ $item['name'] }}</span>
                    <span class="text-txt-second dark:text-gray-400">{{ $item['country'] }}</span>
                </div>
            </li>
        @endforeach
    @else
        <li class="py-8 text-txt-second dark:text-gray-400 text-center">No city/country found</li>
    @endif
</ul>
