<script type="text/javascript">
	// var map = L.map('mapid').setView([-6.596819, 106.805927], 15);

	// L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	// 	attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>'
	// }).addTo(map);
	let latLng = [-6.596819, 106.805927];
	var map = L.map('mapid').setView(latLng, 16);
	var Layer = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
	});
	map.addLayer(Layer);


	// lokasi awal
	// getLocation();

	// function getLocation() {
	// 	if (navigator.geolocation) {
	// 		navigator.geolocation.getCurrentPosition(showPosition);
	// 	} else {
	// 		x.innerHTML = "Geolocation is not supported by this browser.";
	// 	}
	// }

	// function showPosition(position) {
	// 	$("[name=latNow]").val(position.coords.latitude);
	// 	$("[name=lngNow]").val(position.coords.longitude);
	// }





	// marker icons
	var iconCostum = L.icon({
		iconUrl: '<?= base_url('assets/maps-icons/market.png') ?>',
		iconAnchor: [22, 28],
		iconSize: [38, 44],
		popupAnchor: [0, -30]
	});

	<?php foreach ($toko as $t) : ?>
		L.marker([<?= $t['latitude'] ?>, <?= $t['longitude'] ?>], {
			icon: iconCostum
		}).bindPopup(`<div class="col">
                                        <div class="card m-b-30">
                                            <div class="card-body">
                                            <h4 class="card-title font-16 mt-0">Nama Toko : <?= $t['nama_toko']; ?></h4>
											<btn href="" id="" class="btn btn-primary btn-lg waves-effect waves-light mb-3 ml-0" onclick='return keSini(<?= $t['latitude'] ?>, <?= $t['longitude'] ?>)'>Ke sini</btn>
											
                                    </div>
                                    </div>
                                    </div>`).addTo(map);
	<?php endforeach; ?>

	// rute
	var control = L.Routing.control({
		waypoints: [
			latLng
		],
		geocoder: L.Control.Geocoder.nominatim(),
		routeWhileDragging: false,
		reverseWaypoints: true,
		showAlternatives: true,
		altLineOptions: {
			styles: [{
					color: 'black',
					opacity: 0.15,
					weight: 9
				},
				{
					color: 'white',
					opacity: 0.8,
					weight: 6
				},
				{
					color: 'blue',
					opacity: 0.5,
					weight: 2
				}
			]
		}
	})
	control.addTo(map);

	function keSini(latitude, longitude) {
		let latLng = L.latLng(latitude, longitude);
		control.spliceWaypoints(control.getWaypoints().length - 1, 1, latLng);
	}



	// $(document).on("click", ".dariSini", function() {
	// 	let latLng = [$("[name=latNow]").val(), $("[name=lngNow]").val()];
	// 	control.spliceWaypoints(0, 1, latLng);
	// 	map.panTo(latLng);
	// })
</script>
