<div class="modal fade" tabindex="-1" role="dialog" id="modalImportHarga">
   <div class="modal-dialog" role="document">

      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Import Harga Motor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>

         <div class="modal-body">
            <form method="POST" action="{{ url('/pricelists/importExcel') }}" enctype="multipart/form-data">
               {{ csrf_field() }}
               <div class="form-group">
                  <label>Impor File</label>
                  <div class="input-group">
                     <input type="file" class="form-control" name="file">
                  </div>
               </div>
               <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Import</button>
               </div>
            </form>
         </div>


      </div>
   </div>
</div>