// Tombol Hapus
$('.tombol-hapus').on('click', function (e) {
	e.preventDefault();

	const href = $(this).attr('href');
	Swal.fire({
		title: 'Apakah Yakin Untuk Menghapus !',
		text: "Data Akan Dihapus",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtomText: 'Hapus Data !'
	}).then((result) => {
		if (result.value) {
			Swal.fire({
				title: 'Deleted!',
				text: 'Your file has been deleted.',
				type: 'success',
				showConfirmButton: false,
				timer: 8000
			});
			document.location.href = href;
		}
	});
});

// Tombol Tambah
$('.tombol-tambah').on('click', function () {
	Swal.fire({
		type: 'success',
		title: 'Data Berhasil di Tambah',
		showConfirmButton: false,
		timer: 1500
	});
});
