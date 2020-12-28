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
<!--  isotope js library  -->
<script src="<?= base_url('assets-frontend/'); ?>front-end/vendor/isotope/isotope.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="<?= base_url('assets-frontend/'); ?>front-end/scripts/main.js"></script>
<script>
	// Start jQuery function after page is loaded
	$(document).ready(function() {
		// Start jQuery click function to view Bootstrap modal when view info button is clicked
		$('.view_data').on('click', function() {
			// Get the id
			var produkData = $(this).attr('id');
			// Start AJAX function
			$.ajax({
				// Path for controller function which fetches selected phone data
				url: "<?php echo base_url('User/detailProduk'); ?>",
				// Method of getting data
				method: "POST",
				// Data is sent to the server
				data: {
					produkData: produkData
				},
				success: function(data) {
					$('#produk_result').html(data);
					// Display the Bootstrap modal
					$('#produkModal').modal('show');
				}
			});
			// End AJAX function
		});
	});
	$(document).ready(function($) {
		"use strict";
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
</script>
</body>

</html>
