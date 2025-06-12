<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Operasional TPS - Kota Bandung</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>

<body class="bg-gray-50">
    <?php include(APPPATH . 'Views/landing-page/navbar.php'); ?>

    <main class="pt-20 pb-16 lg:pt-24 lg:pb-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col gap-8">
                <!-- Header Section -->
                <div class="text-center">
                    <h1 class="text-4xl font-bold text-gray-900 mb-4">Jadwal Operasional TPS</h1>
                    <p class="text-lg text-gray-600">Temukan lokasi dan jadwal operasional TPS di Kota Bandung</p>
                </div>

                <!-- Map Section -->
                <div class="w-full h-96 rounded-lg overflow-hidden shadow-lg" id="map"></div>

                <!-- Search and Filter Section -->
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <div class="w-full md:w-96">
                        <form class="flex items-center" id="searchForm">
                            <label for="location-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="text" id="location-search" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Cari lokasi...">
                            </div>
                        </form>
                    </div>
                    <div class="flex gap-4">
                        <select id="status-filter" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                            <option selected value="all">Semua Status</option>
                            <option value="open">Buka</option>
                            <option value="closed">Tutup</option>
                        </select>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">Nama TPS</th>
                                <th scope="col" class="px-6 py-3">Alamat</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                                <th scope="col" class="px-6 py-3">Jam Operasional</th>
                            </tr>
                        </thead>
                        <tbody id="locations-table-body">
                            <!-- Table content will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <?php include(APPPATH . 'Views/landing-page/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', async function() {
            // Initialize map
            const map = L.map('map').setView([-6.9175, 107.6195], 12); // Bandung coordinates
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Fetch locations data
            const response = await fetch('<?= base_url("assets/dataset/locations.json") ?>');
            const locations = await response.json();

            // Transform location data to match our display format
            locations.forEach(location => {
                location.NamaLokasi = location.Nama;
            });
            let markers = [];

            // Function to check if a location is currently open
            function isLocationOpen(schedule) {
                const now = new Date();
                const day = now.toLocaleDateString('id-ID', {
                    weekday: 'long'
                });
                const time = now.getHours() * 100 + now.getMinutes();

                const schedulePattern = /([^|]+):\s*(\d{2}\.\d{2})–(\d{2}\.\d{2})/;
                const schedules = schedule.split('|').map(s => s.trim());

                for (let schedule of schedules) {
                    if (schedule.includes(day)) {
                        if (schedule.includes('Tutup')) return false;

                        const match = schedule.match(schedulePattern);
                        if (match) {
                            const [_, __, start, end] = match;
                            const startTime = parseInt(start.replace('.', ''));
                            const endTime = parseInt(end.replace('.', ''));
                            return time >= startTime && time <= endTime;
                        }
                    }
                }
                return false;
            }

            // Function to update table and markers
            function updateLocationsDisplay() {
                const searchTerm = document.getElementById('location-search').value.toLowerCase();
                const statusFilter = document.getElementById('status-filter').value;
                const tableBody = document.getElementById('locations-table-body');
                tableBody.innerHTML = '';

                // Clear existing markers
                markers.forEach(marker => map.removeLayer(marker));
                markers = [];

                locations.forEach(location => {
                    const isOpen = isLocationOpen(location.Deskripsi);
                    if (
                        (statusFilter === 'all' ||
                            (statusFilter === 'open' && isOpen) ||
                            (statusFilter === 'closed' && !isOpen)) &&
                        (location.Nama.toLowerCase().includes(searchTerm) ||
                            location.Alamat.toLowerCase().includes(searchTerm))
                    ) {
                        // Add table row
                        const row = document.createElement('tr');
                        row.className = 'bg-white border-b hover:bg-gray-50';
                        row.innerHTML = `
                            <td class="px-6 py-4 font-medium text-gray-900">${location.Nama}</td>
                            <td class="px-6 py-4">${location.Alamat}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 rounded-full text-xs font-medium ${isOpen ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}">
                                    ${isOpen ? 'Buka' : 'Tutup'}
                                </span>
                            </td>
                            <td class="px-6 py-4">${location.Deskripsi}</td>

                        `;
                        tableBody.appendChild(row);

                        // Add marker
                        const marker = L.marker([location.Latitude, location.Longitude])
                            .bindPopup(`
                                <div class="text-center">
                                    <h3 class="font-bold">${location.Nama}</h3>
                                    <p class="text-sm">${location.Alamat}</p>
                                    <p class="text-sm mt-2">
                                        <span class="${isOpen ? 'text-green-600' : 'text-red-600'} font-medium">
                                            ${isOpen ? 'Buka' : 'Tutup'}
                                        </span>
                                    </p>
                                </div>
                            `)
                            .addTo(map);
                        markers.push(marker);
                    }
                });
            }

            // Add event listeners
            document.getElementById('location-search').addEventListener('input', updateLocationsDisplay);
            document.getElementById('status-filter').addEventListener('change', updateLocationsDisplay);

            // Initial display
            updateLocationsDisplay();
        });
    </script>
</body>

</html>