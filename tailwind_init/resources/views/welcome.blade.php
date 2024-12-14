<!-- Ersetze den bestehenden Inhalt im body-Tag mit Folgendem: -->

<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="text-xl font-bold text-gray-800">
                    NASA APOD Explorer
                </div>
                <div class="hidden md:flex space-x-4">
                    <a href="#" class="text-gray-600 hover:text-blue-500">Home</a>
                    <a href="#" class="text-gray-600 hover:text-blue-500">Über uns</a>
                    <a href="#" class="text-gray-600 hover:text-blue-500">Kontakt</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-blue-600 text-white">
        <div class="max-w-6xl mx-auto px-4 py-16">
            <h1 class="text-4xl font-bold mb-4">
                Willkommen zum NASA APOD Explorer
            </h1>
            <p class="text-xl mb-8">
                Entdecke das Astronomy Picture of the Day
            </p>
            <button onclick="loadData()"
                class="bg-white text-blue-600 px-6 py-2 rounded-lg hover:bg-gray-100 transition-colors">
                APOD-Daten laden
            </button>
        </div>
    </div>

    <!-- Results Section -->
    <div class="max-w-6xl mx-auto px-4 py-12">
        <div id="results" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Hier werden die APOD-Ergebnisse angezeigt -->
        </div>
        <div id="loading" class="hidden text-center py-8">
            <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-gray-900"></div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <p>© 2024 NASA APOD Explorer. Alle Rechte vorbehalten.</p>
        </div>
    </footer>

    <script>
        async function loadData() {
            const resultsDiv = document.getElementById('results');
            const loadingDiv = document.getElementById('loading');

            loadingDiv.classList.remove('hidden');
            resultsDiv.innerHTML = '';

            try {
                const response = await fetch('/api/apod');
                const data = await response.json();

                data.forEach(apod => {
                    const card = document.createElement('div');
                    card.className = 'bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow';
                    card.innerHTML = `
                        <img src="${apod.url}" alt="${apod.title}" class="w-full h-48 object-cover mb-4 rounded">
                        <h2 class="text-xl font-bold mb-2 text-gray-800">${apod.title}</h2>
                        <p class="text-sm text-gray-600 mb-4">${apod.date}</p>
                        <p class="text-gray-600">${apod.explanation.substring(0, 150)}...</p>
                        <div class="mt-4">
                            <a href="${apod.hdurl}" target="_blank" class="text-blue-600 hover:text-blue-800">HD-Bild ansehen →</a>
                        </div>
                    `;
                    resultsDiv.appendChild(card);
                });
            } catch (error) {
                resultsDiv.innerHTML = `
                    <div class="col-span-full text-center text-red-600">
                        Fehler beim Laden der APOD-Daten. Bitte versuche es später erneut.
                    </div>
                `;
                console.error('Error:', error);
            }

            loadingDiv.classList.add('hidden');
        }
    </script>
</body>
