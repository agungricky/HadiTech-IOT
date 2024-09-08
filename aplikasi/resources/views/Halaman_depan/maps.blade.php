{{-- <style>
    .container {
        width: 100%;
        padding: 15px;
        /* Pastikan padding cukup */
    }

    #map {
        height: 100vh;
        /* Atur tinggi peta sesuai dengan kontainer */
        width: 100%;
        overflow: hidden;
        /* Hindari overflow */
    }
</style> --}}

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">MAPS Lokasi Pengguna</p>
                    <p class="font-weight-500">Lokasi Anda saat ini diperbarui menggunakan data sensor GPS. Peta di bawah akan terus menampilkan posisi terbaru Anda sesuai dengan data yang diterima dari sensor. Pastikan sensor GPS Anda aktif untuk mendapatkan hasil yang akurat.</p>
                    {{-- <div id="map" class="border"></div> --}}
                    <div id="map" style="height: 500px; width: 100%; position: relative;"></div>
                    <p id="location-info">Menunggu data GPS...</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script>
    // Inisialisasi peta
    var map = L.map('map').setView([0, 0], 2);

    // Tambahkan tile layer dari OpenStreetMap
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);


    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "https://haditech-4016a-default-rtdb.asia-southeast1.firebasedatabase.app/sensor.json",
            dataType: "JSON",
            success: function(response) {
                if (response && response.lat && response.lng) {
                    var lat = response.lat;
                    var lng = response.lng;

                    // Update lokasi peta dan tambahkan marker
                    map.setView([lat, lng], 13);

                    var marker = L.marker([lat, lng]).addTo(map)
                        .bindPopup(`Lokasi GPS: Lat ${lat}, Lng ${lng}`)
                        .openPopup();

                    // Update teks lokasi di atas peta
                    $('#location-info').text(`Lokasi saat ini: Lat ${lat}, Lng ${lng}`);
                } else {
                    $('#location-info').text('Data GPS tidak ditemukan.');
                }
            },
            error: function() {
                $('#location-info').text('Gagal mengambil data GPS.');
            }
        });
    });
        

</script>

