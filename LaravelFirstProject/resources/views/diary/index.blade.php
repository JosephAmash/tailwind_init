<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mein Digitales Tagebuch</title>
    <link href="<https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css>" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <form action="{{ route('diary.search') }}" method="GET" class="mb-4">
        <input type="text" name="query" placeholder="Suche..." class="border rounded py-2 px-3">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Suchen</button>
    </form>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Mein Digitales Tagebuch</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                {{ session('success') }}
            </div>

        @endif

        @if(isset($moodFilter))
                <p>Gefiltert nach Stimmung: {{ ucfirst($moodFilter) }}</p>
                <a href="{{ route('diary.index') }}" class="text-blue-500 hover:text-blue-700">Filter zurücksetzen</a>
        @endif

        <a href="{{ route('diary.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Neuer Eintrag</a>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($entries as $entry)
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $entry['title'] }}</h2>
                    <p class="text-gray-600 mb-2">{{ $entry['date'] }}</p>
                    <p class="mb-4">{{ Str::limit($entry['content'], 100) }}</p>
                    <div class="flex justify-between">
                        <a href="{{ route('diary.show', $entry['id']) }}" class="text-blue-500 hover:text-blue-700">Mehr lesen</a>
                        <span class="text-{{ $entry['mood'] === 'happy' ? 'green' : ($entry['mood'] === 'sad' ? 'red' : 'yellow') }}-500">
                            {{ $entry['mood'] === 'happy' ? '😊' : ($entry['mood'] === 'sad' ? '😢' : '😐') }}
                        </span>
                    </div>
                </div>
            @endforeach
            <div class="mb-4">
                <a href="{{ route('diary.filterByMood', 'happy') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Glücklich</a>
                <a href="{{ route('diary.filterByMood', 'neutral') }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Neutral</a>
                <a href="{{ route('diary.filterByMood', 'sad') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Traurig</a>
            </div>
        </div>
    </div>
</body>
</html>
