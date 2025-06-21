<div id="landing" class="py-8 px-4">
    <!-- Nav Bar -->
    <nav class="flex justify-between items-center gap-4">
        <div class="flex grow flex-wrap justify-between gap-x-8 items-center">
            <h1 class="text-3xl font-bold flex gap-2">
                Weather Wise
                <x-icons.logo />
            </h1>
            <h3 class="font-medium text-txt-second dark:text-gray-400">
                {{ $date }}
            </h3>
        </div>
        <button class="dark:hidden text-3xl cursor-pointer" onclick="toggleDarkMode()">
            <x-icons.moon class="fill-primary-300" />
        </button>
        <button class="hidden dark:block text-3xl cursor-pointer" onclick="toggleDarkMode()">
            <x-icons.sun class="stroke-primary-300" />
        </button>
    </nav>

    <!-- Main Section -->
    <main class="mt-4">
        <x-ui.search />
        <div class="md:mt-8 md:grid md:grid-cols-4 md:gap-4 md:grid-rows-1 mt-4">
            <!-- Main Info -->
            <div class="md:col-span-3 gap-2 bg-primary-300 flex flex-col items-center py-4 px-8 text-white rounded-lg">
                <span class="text-3xl font-medium">{{ $city }}</span>
                <span class="text-sm text-gray-200">{{ $weatherStatus }}</span>
                <span class="text-5xl">
                    <x-weather-status :status="$weatherIcon" />
                </span>
                <span class="text-4xl font-bold">{{ $degree }}</span>
            </div>

            <!-- Infos Section -->
            <div class="md:mt-0 md:col-span-1 mt-4 flex flex-col gap-2 justify-between">
                @foreach ($infos as $key => $info)
                    <div class="flex justify-between bg-gray-100 dark:bg-gray-700 px-2 py-4 rounded-lg">
                        <span class="flex items-center gap-2 text-txt-second dark:text-white font-medium">
                            @switch ($key)
                                @case('humidity')
                                    <x-icons.humidity />
                                @break

                                @case('wind')
                                    <x-icons.wind />
                                @break

                                @case('pressure')
                                    <x-icons.pressure />
                                @break
                            @endswitch
                            {{ $info['label'] }}
                        </span>
                        <span class="font-bold">
                            {{ $info['value'] }}
                        </span>
                    </div>
                @endforeach
            </div>

        </div>

        <!-- Days Section -->
        <div class="md:grid md:grid-cols-5 mt-4 flex flex-col gap-4">
            @foreach ($days as $key => $day)
                <div
                    class="md:col-span-1 flex flex-col gap-2 bg-gray-100 dark:bg-gray-700 py-2 px-4 rounded-lg items-center">
                    <span
                        class="font-medium {{ $day['isToday'] ? 'text-primary-300' : 'text-txt-second dark:text-white' }}">{{ $day['label'] }}</span>
                    <span class="text-3xl">
                        <x-weather-status :status="$day['weatherIcon']" />
                    </span>
                    <span class="font-bold">{{ $day['degreeMax'] }} / {{ $day['degreeMin'] }}</span>
                </div>
            @endforeach
        </div>
    </main>
</div>
