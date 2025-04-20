@extends('layouts.main')

@section('content')
    <div class="py-8 px-4">
        <!-- Nav Bar -->
        <nav class="flex flex-wrap justify-between gap-x-8 items-center">
            <h1 class="text-3xl font-bold flex gap-2">
                Weather Wise
                <x-icons.logo />
            </h1>
            <h3 class="font-medium text-txt-second">
                {{ $date }}
            </h3>
        </nav>

        <!-- Main Section -->
        <main class="mt-4">
            <x-ui.search />
            <!-- Main Info -->
            <div data-name="main-info"
                class="gap-2 mt-8 bg-primary-300 flex flex-col items-center py-4 px-8 text-white rounded-lg">
                <span class="text-3xl font-medium">{{ $city }}</span>
                <span class="text-sm text-gray-200">{{ $status }}</span>
                <span class="text-5xl">
                    <x-weather-status :status="$weather" />
                </span>
                <span class="text-4xl font-bold">{{ $degree }}</span>
            </div>

            <!-- Infos Section -->
            <div class="mt-4">
                @foreach ($infos as $key => $info)
                    <div class="flex justify-between bg-gray-100 mt-2 px-2 py-4 rounded-lg">
                        <span class="flex items-center gap-2 text-txt-second font-medium">
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

            <!-- Days Section -->
            <div class="mt-4 flex flex-col gap-4">
                @foreach ($days as $key => $day)
                    <div class="flex flex-col gap-2 bg-gray-100 py-2 px-4 rounded-lg items-center">
                        <span
                            class="font-medium {{ $day['isToday'] ? 'text-primary-300' : 'text-txt-second' }}">{{ $key }}</span>
                        <span class="text-3xl">
                            <x-weather-status :status="$day['weather']" />
                        </span>
                        <span class="font-bold">{{ $day['degree'] }}</span>
                    </div>
                @endforeach
            </div>
        </main>
    </div>
@endsection
