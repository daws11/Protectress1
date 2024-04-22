// Inisialisasi peta Leaflet pada div dengan id 'map-container'
var map = L.map('map-container').setView([-6.2088, 106.8456], 13); // Koordinat dan zoom awal (sesuaikan dengan koordinat yang diinginkan)

// Tambahkan layer tile dari OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// Tambahkan marker pada peta dengan koordinat tertentu
var marker = L.marker([-6.2088, 106.8456]).addTo(map); // Koordinat yang diinginkan untuk penempatan marker (misalnya: Monas, Jakarta)
marker.bindPopup("<b>Monas</b><br>Monumen Nasional").openPopup(); // Teks pada popup untuk marker pertama

// Anda juga bisa menambahkan marker lain dengan koordinat yang berbeda jika diperlukan
var marker2 = L.marker([-6.1754, 106.8272]).addTo(map); // Koordinat yang diinginkan untuk penempatan marker kedua (misalnya: Istana Merdeka)
marker2.bindPopup("<b>Istana Merdeka</b><br>Istana Kepresidenan Republik Indonesia").openPopup(); // Teks pada popup untuk marker kedua
