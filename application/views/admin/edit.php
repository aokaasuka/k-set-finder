<main>
    <div class="container-fluid px-4">
        <h1 class="my-4"><?= $title; ?></h1>
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div id="map" style="width: 100%; height: 100vh;"></div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <?= $this->session->flashdata('message');
                                ?>
                                <?php $this->session->unset_userdata('message'); ?>
                                <?= form_open_multipart('admin/editdata'); ?>
                                <input type="hidden" class="form-control" id="id" name="id" value="<?= $location['id']; ?>">
                                <div class="mb-3">
                                    <label for="drama_title">Drama title:</label>
                                    <input type="text" class="form-control" id="drama_title" name="drama_title" value="<?= $location['drama_title']; ?>">
                                    <?= form_error('drama_title', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="location_name">Location name:</label>
                                    <input type="text" class="form-control" id="location_name" name="location_name" value="<?= $location['location_name']; ?>">
                                    <?= form_error('location_name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="scene">Scene:</label>
                                    <textarea class="form-control" id="scene" name="scene" style="height: 100px"><?= $location['scene']; ?></textarea>
                                    <?= form_error('scene', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="location_address">Location address:</label>
                                    <textarea class="form-control" id="location_address" name="location_address" style="height: 100px"><?= $location['location_address']; ?></textarea>
                                    <?= form_error('location_address', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="latitude">Latitude:</label>
                                    <input type="text" class="form-control" id="latitude" name="latitude" value="<?= $location['latitude']; ?>">
                                    <?= form_error('latitude', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="longitude">Longitude:</label>
                                    <input type="text" class="form-control" id="longitude" name="longitude" value="<?= $location['longitude']; ?>">
                                    <?= form_error('longitude', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="street_view">Street view:</label>
                                    <input type="text" class="form-control" id="street_view" name="street_view" value="<?= $location['street_view']; ?>">
                                    <?= form_error('street_view', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="image">Image:</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    var OpenStreetMap_Mapnik = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });

    var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
    });

    var map = L.map('map', {
        center: [<?= $location['latitude']; ?>, <?= $location['longitude']; ?>],
        zoom: 7.4,
        layers: [OpenStreetMap_Mapnik]
    });

    const baseLayers = {
        'OpenStreetMap': OpenStreetMap_Mapnik,
        'Esri': Esri_WorldImagery,
    };

    const layerControl = L.control.layers(baseLayers, null, {
        collapse: false
    }).addTo(map);

    // get coordinat
    var latInput = document.querySelector("[name=latitude]");
    var lngInput = document.querySelector("[name=longitude]");
    var currentLocation = [<?= $location['latitude']; ?>, <?= $location['longitude']; ?>];
    map.attributionControl.setPrefix(false);

    var marker = new L.marker(currentLocation, {
        draggable: true
    });

    // mengambil coordinat saat marker di pindah/geser
    marker.on('dragend', function(e) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            currentLocation
        }).bindPopup(position).update();
        latInput.value = position.lat;
        lngInput.value = position.lng;
    });

    // mengambil coordinat saat map di klik
    map.on('click', function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;
        if (!marker) {
            marker = L.marker(e.latlng).addTo(map);
        } else {
            marker.setLatLng(e.latlng);
        }
        latInput.value = lat;
        lngInput.value = lng;
    })

    map.addLayer(marker);
</script>