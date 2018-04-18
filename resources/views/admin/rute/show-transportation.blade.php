<!-- show trans modal -->
@foreach($trans as $tran)
<div class="modal fade" id="showtrans{{ $tran->id }}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Detail Transportasi</h4>
      <div class="modal-body">
        <table class="table table-hover">
          <tr>
            <td colspan="5"><img src="/img/{{ $tran->photo }}" width="100" height="100" alt=""></td>
          </tr>
          <tr>
            <th>Kode Transportasi</th>
            <td>{{ $tran->code }}</td>
          </tr>
          <tr>
            <th>Jenis Transportasi</th>
            <td>{{ $tran->description }}</td>
          </tr>
          <tr>
            <th>Jumlah tempat duduk</th>
            <td>{{ $tran->seat_qty }}</td>
          </tr>
          <tr>
            <th>Type Transportasi</th>
            <td>{{ $tran->transportation_types['description'] }}</td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
@endforeach
