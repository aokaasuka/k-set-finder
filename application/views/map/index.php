<main>
    <div class="container-fluid px-4">
        <h1 class="my-4">K-Set Finder</h1>
        <h5 class="mb-4 text-secondary">Find filming locations for your favorite Korean dramas</h5>
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 order-md-first order-sm-last">
                        <div id="map" style="width: 100%; height: 100vh;"></div>
                    </div>
                    <div class="col-md-4 order-md-last order-sm-first">
                        <div class="card">
                            <div class="card-body">
                                <form action="<?= base_url('map/index') ?>" method="get" class="mb-3">
                                    <div class="input-group">
                                        <input class="form-control" type="text" placeholder="Drama title" name="keyword" id="input-box" autocomplete="off" />
                                        <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </form>
                                <div class="result-box">
                                </div>

                                <div class="detail"></div>

                                <?php if ($this->input->get('keyword')) : ?>
                                    <div id="location-found">
                                        <p class="small text-secondary"><?= count($location) ?> locations founds</p>

                                        <div class="result-box">
                                            <ul>
                                                <?php foreach ($location as $l) : ?>
                                                    <a href="#" data-target class="map-link" data-lat="<?= $l['latitude']; ?>" data-lng="<?= $l['longitude']; ?>">
                                                        <li><?= $l['location_name']; ?></li>
                                                    </a>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endif; ?>

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

    // Variabel map telah didefinisikan sebelumnya
    var map = L.map('map', {
        center: [36.55486506323537, 127.8547037445218],
        zoom: 2,
        layers: [OpenStreetMap_Mapnik]
    });


    const baseLayers = {
        'OpenStreetMap': OpenStreetMap_Mapnik,
        'Esri': Esri_WorldImagery,
    };

    const layerControl = L.control.layers(baseLayers, null, {
        collapse: false
    }).addTo(map);


    // autcompleted search-box
    <?php
    $availableKeywords = [];
    foreach ($location as $l) {
        $availableKeywords[] = $l['drama_title'];
    }
    ?>

    // Menggunakan Set untuk menghilangkan duplikat
    let uniqueKeywords = [...new Set(<?php echo json_encode($availableKeywords); ?>)];


    const resultsBox = document.querySelector('.result-box');
    const inputBox = document.getElementById('input-box');

    inputBox.onkeyup = function() {
        let result = [];
        let input = inputBox.value;
        if (input.length) {
            result = uniqueKeywords.filter((keyword) => {
                return keyword.toLowerCase().includes(input.toLowerCase());
            });
            console.log(result);
        }
        display(result);

        if (!result.length) {
            resultsBox.innerHTML = '';
        }
    }

    function display(result) {
        const content = result.map((list) => {
            return "<li onclick=selectInput(this)>" + list + "</li>";
        });

        resultsBox.innerHTML = "<ul>" + content.join('') + "</ul>";
    }

    function selectInput(list) {
        inputBox.value = list.innerHTML;
        resultsBox.innerHTML = '';
    }


    <?php
    // Periksa apakah ada parameter 'keyword' dalam query string
    if ($this->input->get('keyword')) {

        foreach ($location as $l) :
    ?>

            var marker<?= $l['id'] ?> = L.marker([<?= $l['latitude'] ?>, <?= $l['longitude'] ?>]).addTo(map);
            marker<?= $l['id'] ?>.bindPopup("<h5 class='text-center'><?= $l['location_name'] ?></h5>").openPopup();

            // Tambahkan event listener untuk menangani klik pada marker
            marker<?= $l['id'] ?>.on('click', function(e) {
                document.getElementById('location-found').style.display = 'none'; // Menyembunyikan elemen

                // Ambil data detail dari marker yang diklik
                var detailData = {
                    image: '<?= base_url('assets/images/' . $l['image']); ?>',
                    drama_title: "<?= $l['drama_title'] ?>",
                    location_name: "<?= $l['location_name'] ?>",
                    scene: "<?= $l['scene'] ?>",
                    location_address: "<?= $l['location_address'] ?>",
                    street_view: "<?= $l['street_view'] ?>",
                    // Tambahkan data lain yang Anda butuhkan dari marker
                };

                // Tampilkan detail data di dalam div "detail"
                document.querySelector('.detail').innerHTML = `
            <div class='card mb-3'>
                <div class="card-body">
                    <img src="${detailData.image}" alt="${detailData.location_name} Image" width="100%" class="mb-3">
                    <h4 class="mb-3">${detailData.location_name}</h4>
                    <p><i class="fas fa-fw fa-clapperboard" style="color: blue"></i> Drama: ${detailData.drama_title}</p>
                    <p><i class="fas fa-fw fa-camera" style="color: blue"></i> Scene: ${detailData.scene}</p>
                    <p><i class="fas fa-fw fa-location-dot" style="color: blue"></i> Location:  ${detailData.location_address}</p>
                    <?php if (!empty($l['street_view'])) : ?>
                        <p><i class="fas fa-fw fa-street-view" style="color: blue"></i> <a target="_blank" href="<?= $l['street_view']; ?>">StreetView</a></p>
                    <?php endif; ?>                    <h6 class="mt-4 text-secondary">Other relevant places</h6>
                    <ul class="other-locations">
                        <?php foreach ($location as $l) : ?>
                            <li>
                                <a href="#" class="map-link" data-lat="<?= $l['latitude']; ?>" data-lng="<?= $l['longitude']; ?>">
                                    <?= $l['location_name']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        `;
                relevanPlaces();
            });
    <?php
        endforeach;
    }
    ?>


    function relevanPlaces() {
        document.querySelectorAll('.map-link').forEach(item => {
            item.addEventListener('click', function(event) {
                event.preventDefault();
                // Dapatkan koordinat latitude dan longitude dari atribut data
                var lat = parseFloat(this.getAttribute('data-lat'));
                var lng = parseFloat(this.getAttribute('data-lng'));
                // Gerakkan peta ke lokasi yang sesuai
                map.setView([lat, lng], 15);
            });
        });
    }

    relevanPlaces();





    // Buat ngezoom wilayahnya
    // Mendefinisikan array untuk menyimpan posisi marker
    var markerPositions = [];

    <?php
    if ($this->input->get('keyword')) {
        foreach ($location as $l) :
            // Tambahkan posisi marker ke array
    ?>
            markerPositions.push([<?= $l['latitude'] ?>, <?= $l['longitude'] ?>]);
    <?php
        endforeach;
    }
    ?>

    // Mendapatkan pusat dari semua marker
    var bounds = L.latLngBounds(markerPositions);
    var center = bounds.getCenter();

    // Menentukan zoom level agar semua marker tetap terlihat
    var zoom = map.getBoundsZoom(bounds);

    // Set pusat dan zoom level
    map.setView(center, zoom);

    // Tetapkan zoom level minimum agar pengguna tidak bisa zoom out terlalu jauh
    map.options.minZoom = zoom;
</script>