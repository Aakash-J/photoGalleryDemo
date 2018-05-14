
function deleteImageModal(id,fileName) {

	  console.log(fileName);
	  $('#deleteImage_id').val(id);
	  $('#deleteFileName').val(fileName);
	  //console.log(serialNumber);

	  $('#confirmModal').modal('show');


}

function deleteAlbumModal(id) {

	  
	  $('#deleteAlbum_id').val(id);
	  $('#confirmModal2').modal('show');


}

