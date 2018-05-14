	 <!-- Confirmation Modal  delete image-->

	  <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
	<form method="get" action="resources/templates/ajaxCalls.php">
	   <div class="modal-content">
          <div class="modal-header">
		      <h5 class="modal-title">Delete Photo</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">Are you sure you want to delete the Image?</div>
          <div class="modal-footer">
		     <input type="hidden" id = "deleteImage_id" name = "deleteImage_id">
			 <input type="hidden" id = "deleteFileName" name = "deleteFileName">
			 <input type="hidden" id = "functionName" name = "functionName" value = 'deleteImage'>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
			<input type="submit" class="btn btn-primary " value="Yes">
           </div>
        </div>

        </form>
      </div>
    </div>

	 <!-- Confirmation Modal  delete image-->

	  <div class="modal fade" id="confirmModal2" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
	<form method="get" action="resources/templates/ajaxCalls.php">
	   <div class="modal-content">
          <div class="modal-header">
		      <h5 class="modal-title">Delete Album</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">Are you sure you want to delete all the photos and the Album?</div>
          <div class="modal-footer">
		     <input type="hidden" id = "deleteAlbum_id" name = "deleteAlbum_id">
			 <input type="hidden" id = "functionName" name = "functionName" value = 'deleteAlbum'>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
			<input type="submit" class="btn btn-primary " value="Yes">
           </div>
        </div>

        </form>
      </div>
    </div>
