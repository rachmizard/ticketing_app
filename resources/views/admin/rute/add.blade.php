<!-- add rute modal -->
<div class="modal fade" id="addrute" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add rute</h4>
      </div>
      <div class="modal-body">
        <form action="/admin/rute" method="POST">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="depart_at">Turun Di</label>
            <input type="text" name="depart_at" class="form-control" id="depart_at" placeholder="Ketik disini...">
          </div>
          <div class="form-group">
            <label for="rute_from">Rute Dari</label>
            <input type="text" class="form-control" id="rute_from" name="rute_from" placeholder="Ketik disini...">
          </div>
          <div class="form-group">
            <label for="rute_to">Rute Ke</label>
            <input type="text" id="rute_to" class="form-control" id="rute_to" name="rute_to" placeholder="Ketik disini...">
          </div>            
          <div class="form-group">
            <label for="price">Harga</label>
            <input id="price" class="form-control" id="price" name="price" placeholder="Ketik disini...">
          </div>            
          <div class="form-group">
            <label for="transportation_id">Transportasi</label>
            <select class="form-control" id="transportation_id" name="transportation_id">
              <option disabled selected>-- Pilih Transportasi --</option>
              @foreach($trans as $tran)
              <option value="{{ $tran->id }}">{{ $tran->description }} - {{ $tran->transportation_types['description'] }}</option>
              @endforeach
            </select>
          </div>            
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Save changes</button>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
