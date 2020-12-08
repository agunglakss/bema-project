<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="{{ asset('assets-admin/js/stisla.js') }}"></script>

<!-- Libraries -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="{{ asset('assets-admin/js/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('assets-admin/js/jquery.uploadPreview.min.js') }}"></script>
<script src="{{ asset('assets-admin/js/bootstrap-tagsinput.min.js') }}"></script>

<!-- Template JS File -->
<script src="{{ asset('assets-admin/js/scripts.js') }}"></script>
<script src="{{ asset('assets-admin/js/custom.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('assets-admin/js/page/features-post-create.js') }}"></script>

<!-- function for multiple upload image -->
<script type="text/javascript">
	$(document).ready(function() {
		let wrapper = $("#wrapper");
		let buttonAdd = $(".btnAdd");

		$(buttonAdd).click(function(e) {
			e.preventDefault();
			$(wrapper).append(`
				<div class="input-group col-sm-10 offset-2 mt-2">
				<input type="file" class="form-control" name="upload_img[]" style="padding:7px 0 0 5px;">
				<span class="input-group-append">
					<button class="btn btn-danger btnRemove"><i class="fa fa-times"></i> Hapus</button>
				</span>
				</div>
			`);
		});

		$(wrapper).on("click", ".btnRemove", function(e) {
			e.preventDefault();
			$(this).parents('.input-group').remove();
		});
	});
</script>

<script>

	// delete banner
	$(document).on('click', '#idHapusBanner', function() {
		const urlHapusBanner = $(this).data('url');
		$('#formHapusBanner').attr('action', urlHapusBanner);
	});

	// delete kategori motor
	$(document).on('click', '#idHapusKategori', function() {
		const urlHapusKategori = $(this).data('url');
		$('#formHapusKategori').attr('action', urlHapusKategori);
	});

	// delete tipe motor
	$(document).on('click', '#idHapusTipe', function() {
		const urlHapusTipe = $(this).data('url');
		$('#formHapusTipe').attr('action', urlHapusTipe);
	});

	// delete motor
	$(document).on('click', '#idHapusMotor', function() {
		const urlHapusMotor = $(this).data('url');
		$('#formHapusMotor').attr('action', urlHapusMotor);
	});

	// delete all pricelist
	$(document).on('click', '#idHapusSemuaPricelist', function() {
		$('.modal-title').text('Yakin ingin menghapus semua Pricelist Motor ini?');
		const urlHapusSemuaPricelist = $(this).data('url');
		$('#formHapusPricelist').attr('action', urlHapusSemuaPricelist);
	})
	
	// delete pricelist
	$(document).on('click', '#idHapusPricelist', function() {
		$('.modal-title').text('Yakin ingin menghapus Pricelist Motor ini?');
		const urlHapusPricelist = $(this).data('url');
		$('#formHapusPricelist').attr('action', urlHapusPricelist);
	});

	// delete testimonial
	$(document).on('click', '#idHapusTestimonial', function(){
		const urlHapusTestimonial = $(this).data('url');
		$('#formHapusTestimonial').attr('action', urlHapusTestimonial);
	});
	
</script>

<script>
	function detailHrg(id)
	{
		const formatRupiah = new Intl.NumberFormat();
		$.ajax({
			type: "get",
			url: '/motor/pricelists/'+id+'',
			dataType: 'json',
			success:function(result){
				const data = result[0];
				$('#trHarga td').remove();
				$('#detailHargaLabel').html(data.nama_motor +' </br> Harga OTR : Rp '+ formatRupiah.format(data.harga_otr));
				$.each(data.pricelists, function(i, data) {
					console.log()
					$('#tableHarga').append(`
						<tr id="trHarga">
							<td>Rp `+formatRupiah.format(data.uang_muka)+`</td>
							<td>Rp `+formatRupiah.format(data.diskon)+`</td>
							<td>Rp `+formatRupiah.format(data.bulan_11)+`</td>	
							<td>Rp `+formatRupiah.format(data.bulan_17)+`</td>
							<td>Rp `+formatRupiah.format(data.bulan_23)+`</td>
							<td>Rp `+formatRupiah.format(data.bulan_27)+`</td>
							<td>Rp `+formatRupiah.format(data.bulan_33)+`</td>
							<td>Rp `+formatRupiah.format(data.bulan_35)+`</td>
						</tr>
					`);
				});
			},
			error:function(respone){
				console.log(respone);
			}
		});
  }
</script>