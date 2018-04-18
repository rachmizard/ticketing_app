@foreach($rutes as $edit)
<!-- edit rute modal -->
<div class="modal fade" id="editrute{{ $edit->id }}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit rute</h4>
      </div>
      <div class="modal-body">
        <form action="/admin/rute/{{ $edit->id }}" method="POST">
            {{ csrf_field() }}
          <div class="form-group has-success">
            <label for="depart_at">Turun Di</label>
            <input type="text" name="depart_at" class="form-control" id="depart_at" placeholder="Ketik disini..." value="{{ $edit->depart_at }}">
          </div>
          <div class="form-group has-success">
            <label for="rute_from">Rute Dari</label>
            <input type="text" class="form-control" id="rute_from" name="rute_from" placeholder="Ketik disini..." value="{{ $edit->rute_from }}">
          </div>
          <div class="form-group has-success">
            <label for="rute_to">Rute Ke</label>
            <input type="text" id="rute_to" class="form-control" id="rute_to" name="rute_to" placeholder="Ketik disini..." value="{{ $edit->rute_to }}">
          </div>            
          <div class="form-group has-success">
            <label for="price">Harga</label>
            <input id="price" class="form-control" id="price" name="price" placeholder="Ketik disini..." value="{{ $edit->price }}">
          </div>            
          <div class="form-group has-success">
            <label for="transportation_id">Transportasi</label>
            <select class="form-control" id="transportation_id" name="transportation_id">
              <option disabled selected>-- Pilih Transportasi --</option>
              @foreach($trans as $tran)
              <option value="{{ $tran->id }}" @if($tran->id == $edit->transportation_id) selected @endif >{{ $tran->description }}</option>
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
@endforeach
