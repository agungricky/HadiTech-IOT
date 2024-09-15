<div class="container">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">MAPS Lokasi Pengguna</p>
                    <p class="font-weight-500">Lokasi Anda saat ini diperbarui menggunakan data sensor GPS. Peta di bawah
                        akan terus menampilkan posisi terbaru Anda sesuai dengan data yang diterima dari sensor.
                        Pastikan sensor GPS Anda aktif untuk mendapatkan hasil yang akurat.</p>
                    {{-- <div id="map" class="border"></div> --}}
                    <div id="map" style="height: 500px; width: 100%; position: relative;"></div>
                    <p id="location-info" class="mt-1">Menunggu data GPS...</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toDMS(deg, isLat) {
        const absolute = Math.abs(deg);
        const degrees = Math.floor(absolute);
        const minutesNotTruncated = (absolute - degrees) * 60;
        const minutes = Math.floor(minutesNotTruncated);
        const seconds = Math.floor((minutesNotTruncated - minutes) * 60);

        const direction = deg >= 0 ?
            (isLat ? 'N' : 'E') :
            (isLat ? 'S' : 'W');

        return `${degrees}°${minutes}'${seconds}" ${direction}`;
    }

    // Inisialisasi peta
    var map = L.map('map').setView([0, 0], 2);

    // Tambahkan tile layer dari OpenStreetMap
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);


    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: "https://haditech-4016a-default-rtdb.asia-southeast1.firebasedatabase.app/sensor.json",
            dataType: "JSON",
            success: function(response) {
                if (response && response.lat && response.lng) {
                    let lat = response.lat;
                    let lng = response.lng;

                    let latDMS = toDMS(lat, true);
                    let lngDMS = toDMS(lng, false);

                    // Update lokasi peta dan tambahkan marker
                    map.setView([lat, lng], 13);

                    var marker = L.marker([lat, lng]).addTo(map)
                        .bindPopup(`Lokasi GPS: Lat ${lat}, Lng ${lng}`)
                        .openPopup();

                    // Update teks lokasi di atas peta
                    $('#location-info').text(`Lokasi saat ini: ${latDMS} ${lngDMS}`);
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
