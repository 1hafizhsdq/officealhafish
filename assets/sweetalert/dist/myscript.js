const flashData = $('.flash-data').data('flashdata');

if(flashData){
	Swal.fire({
		title: 'Berhasil',
		text: 'Data' +flashData,
		type: 'success'
	});
}

// $('.tombol-hapus').on('click', function(e){
// 	e.preventDefault();
// 	const href = $(this).attr('href');
// 	Swal.fire({
// 		title: 'Apakah anda yakin?',
// 		text: "Data" +flashdata,
// 		icon: 'warning',
// 		showCancelButton: true,
// 		confirmButtonColor: '#3085d6',
// 		cancelButtonColor: '#d33',
// 		confirmButtonText: 'Hapus'
// 	}).then((result) => {
// 		if (result.value) {
// 			document.location.href = href;
// 		}
// 	})
// });