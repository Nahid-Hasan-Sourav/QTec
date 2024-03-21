<!-- Modal -->
<div class="modal fade" id="editNoteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 100%">
      <div class="modal-content">
        <div class="modal-header" style="background: #088F8F !important">
          <h1 class="modal-title fs-3 text-white"  id="exampleModalLabel">Edit Note</h1>
          <button type="button" class="btn-close btn btn-sm closeModal" aria-label="Close">X</button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" value="" class="form-control" id="titleE" aria-describedby="emailHelp">
            </div>

            <div class="form-floating">
                <label for="floatingTextarea2">Description</label>

                <textarea class="form-control" id="descriptionE" style="height: 100px"></textarea>
            </div>
        </div>



        <div class="modal-footer">
          <button type="button" class="btn btn-secondary closeModal">Close</button>
          <button type="button" value="" class="btn btn-primary" id="updateNoteBtn">UPDATE</button>
        </div>
      </div>
    </div>
  </div>
