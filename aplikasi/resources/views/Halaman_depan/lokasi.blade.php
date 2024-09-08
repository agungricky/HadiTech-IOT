<div class="col-md-6 grid-margin stretch-card">
    <div class="card tale-bg">
        <div class="card-people mt-auto">
            <img src="{{ asset('public/Asset/images/dashboard/people.svg') }}" alt="people">
            <div class="weather-info">
                <div class="d-flex">
                    <div>
                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i><span
                                id="temp"></span><sup>C</sup></h2>
                    </div>
                    <div class="ml-2">
                        <h4 class="location font-weight-normal" id="posisi"></h4>
                        <h6 class="font-weight-normal" id="negara"></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: "https://haditech-4016a-default-rtdb.asia-southeast1.firebasedatabase.app/sensor.json",
            dataType: "JSON",
            success: function(response) {
                let lat = response.lat
                let lng = response.lng

                $.ajax({
                    type: "GET",
                    url: `https://api-bdc.net/data/reverse-geocode-client?latitude=${lat}&longitude=${lng}&localityLanguage=id`,
                    dataType: "JSON",
                    success: function (response) {
                        $('#negara').text(response.countryName)
                        $('#posisi').text(response.locality)
                    }
                });

                $.ajax({
                    type: "GET",
                    url: `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lng}&appid=67d2396e10c8e07c54e6b719ffabdf2f&units=metric`,
                    dataType: "JSON",
                    success: function(response) {
                        if (response) {
                            let lokasi = Math.floor(response.main.temp);;
                            $('#temp').text(lokasi);
                        }
                    }
                });
            }
        });
    });
</script>
