</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

</div>
<!-- END wrapper -->

<!-- jQuery  -->
<script src="<?= base_url('assets/') ?>js/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/') ?>js/metismenu.min.js"></script>
<script src="<?= base_url('assets/') ?>js/jquery.slimscroll.js"></script>
<script src="<?= base_url('assets/') ?>js/waves.min.js"></script>
<!-- Required datatable js -->
<script src="<?= base_url('assets/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?= base_url('assets/'); ?>plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables/jszip.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables/pdfmake.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables/vfs_fonts.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables/buttons.print.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables/buttons.colVis.min.js"></script>
<!-- Required datatable js -->
<script src="<?= base_url('assets/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables/dataTables.bootstrap4.min.js"></script>


<!-- Sweet-Alert  -->
<script src="<?= base_url('assets/'); ?>plugins/sweet-alert2/sweetalert2.min.js"></script>
<script src="<?= base_url('assets/'); ?>pages/sweet-alert.init.js"></script>
<script src="<?= base_url('assets/') ?>sweetalert/my-script.js"></script>



<!-- App js -->
<script src="<?= base_url('assets/') ?>js/app.js"></script>
<!-- tinymce -->
<script src="<?= base_url('assets/'); ?>plugins/tinymce/tinymce.min.js"></script>
<script>
	$(document).ready(function() {
		if ($("#elm1").length > 0) {
			tinymce.init({
				selector: "textarea#elm1",
				theme: "modern",
				height: 300,
				plugins: [
					"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
					"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					"save table contextmenu directionality emoticons template paste textcolor"
				],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
				style_formats: [{
						title: 'Bold text',
						inline: 'b'
					},
					{
						title: 'Red text',
						inline: 'span',
						styles: {
							color: '#ff0000'
						}
					},
					{
						title: 'Red header',
						block: 'h1',
						styles: {
							color: '#ff0000'
						}
					},
					{
						title: 'Example 1',
						inline: 'span',
						classes: 'example1'
					},
					{
						title: 'Example 2',
						inline: 'span',
						classes: 'example2'
					},
					{
						title: 'Table styles'
					},
					{
						title: 'Table row 1',
						selector: 'tr',
						classes: 'tablerow1'
					}
				]
			});
		}
	});
</script>

<script>
	$(document).ready(function() {
		$('#datatable').DataTable({
			"language": {
				"lengthMenu": " Tampilkan _MENU_ Data Per Halaman",
				"zeroRecords": "Data tidak ditemukan",
				"info": "Menampilkan halaman _PAGE_ dari _PAGES_",
				"infoEmpty": "Tidak ada data satupun yang ditemukan",
				"infoFiltered": "(berdasrkan filter data yang ada)",
				"search": "Cari:",
				"paginate": {
					"first": "Awal",
					"last": "Akhir",
					"next": "Selanjutnya",
					"previous": "Sebelumnya"
				},
			}
		});
	});
</script>



<script>
	$('.custom-file-input').on('change', function() {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	});
</script>


</body>

</html>