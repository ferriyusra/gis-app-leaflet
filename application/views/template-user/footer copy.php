	<!-- footer -->
	<footer class="section-footer mt-5 mb-4 border-top">
		<div class="container-fluid">
			<div class="row border-top justify-content-center align-items-center pt-4">
				<div class="col-auto text-gray-500 font-weight-light">
					<img src="<?= base_url('assets-frontend/'); ?>front-end/img/logo/logo-sm.svg" alt="logo" />
					<span>Rancang Bangun Peta Penyebaran Toko Oleh - Oleh Makanan Khas
						Bogor <img src="<?= base_url('assets-frontend/'); ?>front-end/img/logo/logo-sm.svg" alt="logo" /></span>
				</div>
			</div>
		</div>
	</footer>
	<!-- end footer -->
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="<?= base_url('assets-frontend/'); ?>front-end/libraries/bootstrap_v4/js/jquery-3.4.1.min.js"></script>
	<script src="<?= base_url('assets-frontend/'); ?>front-end/libraries/bootstrap_v4/js/bootstrap.js"></script>
	<script src="<?= base_url('assets-frontend/'); ?>front-end/libraries/owlcarousel/owl.carousel.min.js"></script>
	<!-- aos -->
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<!--  isotope js library  -->
	<script src="<?= base_url('assets-frontend/'); ?>front-end/vendor/isotope/isotope.min.js"></script>

	<!--  Magnific popup script file  -->
	<script src="<?= base_url('assets-frontend/'); ?>front-end/vendor/Magnific-Popup/dist/jquery.magnific-popup.min.js"></script>
	<script src="<?= base_url('assets-frontend/'); ?>front-end/scripts/main.js"></script>
	<script>
		$(document).ready(function() {
			$('.detail').click(function() {

				var id = $(this).attr('relid');

				$.ajax({
					url: "<?= base_url('User/detailProduk'); ?>",
					data: {
						id: id
					},
					method: "GET",
					dataType: "json",
					succes: function(response) {
						$('#img_prdk').html(response.img);
						$('#nama_prdk').html(response.name);
						$('#hrg_prdk').html(response.hrg);
						$('#desk_prdk').html(response.desk);
						$('#show-modal').modal({
							backdrop: 'static',
							keyboard: true,
							show: true
						});
					}
				});
			});
		});

		$(document).ready(function($) {
			"use strict";
			//  TESTIMONIALS CAROUSEL HOOK
			$("#customers-testimonials").owlCarousel({
				center: true,
				items: 3,
				margin: 0,
				autoplay: true,
				dots: true,
				autoplayTimeout: 8500,
				smartSpeed: 450,
				responsive: {
					0: {
						items: 1,
					},
					768: {
						items: 2,
					},
					1170: {
						items: 3,
					},
				},
			});
		});

		AOS.init();
	</script>
	</body>

	</html>
