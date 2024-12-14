@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Stimmungsverteilung über die Zeit</h1>

    <table class="min-w-full bg-white border border-gray-300 mb-6">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">Datum</th>
                <th class="border border-gray-300 px-4 py-2">Glücklich</th>
                <th class="border border-gray-300 px-4 py-2">Neutral</th>
                <th class="border border-gray-300 px-4 py-2">Traurig</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($moodDistribution as $date => $moods)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $date }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $moods['happy'] }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $moods['neutral'] }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $moods['sad'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="text-xl font-bold mb-4">Visuelle Darstellung der Stimmungsverteilung</h2>

    <div class="mood-visualization">
        @foreach ($moodDistribution as $date => $moods)
            <div class="mood-bar" style="display: flex; align-items: center; margin-bottom: 10px;">
                <span style="width: 150px;">{{ $date }}</span>
                <div class="bar-container" style="flex: 1; display: flex;">
                    <div class="bar happy" style="width: {{ ($moods['happy'] * 10) }}px; background-color: lightgreen;"></div>
                    <div class="bar neutral" style="width: {{ ($moods['neutral'] * 10) }}px; background-color: lightgray;"></div>
                    <div class="bar sad" style="width: {{ ($moods['sad'] * 10) }}px; background-color: lightcoral;"></div>
                </div>
                <span style="margin-left: 10px;">{{ $moods['happy'] + $moods['neutral'] + $moods['sad'] }}</span>
            </div>
        @endforeach
    </div>
</div>

<style>
    .bar-container {
        display: flex;
        align-items: center;
        height: 20px;
        border: 1px solid #ddd;
    }
    .bar {
        height: 100%;
    }
</style>
@endsection
