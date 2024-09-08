<div class="col-md-6 grid-margin transparent">
    <div class="row">

        <div class="col-md-12 mb-4 stretch-card transparent">
            <div class="card card-tale">
                <div class="card-body d-md-flex flex-column justify-content-center align-items-center text-start text-md-center">
                    <p class="mb-3">Selamat datang</p>
                    <p class="fs-30 mb-2" id="nama"></p>
                    <p>Semoga Hari ini menyenangkan</p>
                </div>
            </div>
        </div>
        

        {{-- <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
                <div class="card-body">
                    <p class="mb-4">Total Bookings</p>
                    <p class="fs-30 mb-2">61344</p>
                    <p>22.00% (30 days)</p>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="row">
        {{-- Sensor Getar --}}
        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-blue">
                <div class="card-body">
                    <p class="mb-4">Sensor Getar</p>
                    <p class="fs-30 mb-2" id="sensor-getar"></p>
                    <p id="kondisi"></p>
                </div>
            </div>
        </div>

        {{-- Sensor Gps --}}
        <div class="col-md-6 stretch-card transparent">
            <div class="card card-light-danger">
                <div class="card-body">
                    <p class="mb-4">Sensor GPS</p>
                    <p class="fs-30 mb-2" id="sensor-gps"></p>
                    <p id="keterangan"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function getSensorData() {
        $.ajax({
            url: "https://haditech-4016a-default-rtdb.asia-southeast1.firebasedatabase.app/sensor.json",
            method: "GET",
            success: function(data) {
                if (data) {
                    let Sensor_getar = data.vib;
                    let lat = data.lat;
                    let lng = data.lng;

                    if (Sensor_getar == true) {
                        $('#sensor-getar').text('AMAN');
                        $('#kondisi').text('Kondisi saat ini Sangat Baik');
                    } else {
                        $('#sensor-getar').text('Kurang Baik');
                        $('#kondisi').text('Kondisi dalam Kurang Baik');
                    }

                    if ((lat == 0) && (lng == 0)) {
                        $('#sensor-gps').text('OFFLINE');
                        $('#keterangan').text('Tidak ada data');
                    } else {
                        $('#sensor-gps').text('ONLINE');
                        $('#keterangan').text('lat : ' + lat + ' & lng : ' + lng);
                    }
                } else {
                    $('#sensor-data').text('No sensor data found.');
                    $('#sensor-lat').text('No sensor data found.');
                    $('#sensor-lng').text('No sensor data found.');
                }
            },
            error: function() {
                $('#sensor-data').text('Request data Error.');
            }
        });

        $.ajax({
            type: "GET",
            url: "https://haditech-4016a-default-rtdb.asia-southeast1.firebasedatabase.app/datadiri.json",
            dataType: "JSON",
            success: function(response) {
                if (response) {
                    $('#nama').text(response.Nama)
                }
            }
        });
    }

    // Panggil fungsi untuk mendapatkan data secara berkala (real-time effect)
    setInterval(getSensorData, 1000); // Update setiap 1 detik
</script>
