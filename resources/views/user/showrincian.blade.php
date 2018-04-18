<!-- show rincian rute modal -->
@foreach($rutes as $rute)
<div class="modal fade" id="showticket{{ $rute->id }}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Detail Tiket</h4>
      <div class="modal-body">
        <table class="table table-hover">
          <tr>
            <th>Rute dari</th>
            <td>{{ $rute->rute_from }}</td>
          </tr>
          <tr>
            <th>Berangkat ke</th>
            <td>{{ $rute->rute_to }}</td>
          </tr>
          <tr>
            <th>Harga</th>
            <td>Rp. {{ $rute->price }}</td>
          </tr>
          <tr>
            <th>Turun di</th>
            <td>{{ $rute->depart_at }}</td>
          </tr>
          <tr>
            <th>Tanggal release</th>
            <td>{{ $rute->created_at }}</td>
          </tr>
          <tr>
            <th>Transportasi</th>
            <td>
              <button class="btn btn-sm btn-info" data-toggle="popover" data-html="true" data-placement="top" data-content="
                <div class='scrollable'>
                  <table class='table table-hover'>
                    <tr>
                      <th>Kode Transportasi</th>
                      <td>{{$rute->transportations['code']}}</td>
                    </tr>
                    <tr>
                      <th>Jumlah tempat duduk</th>
                      <td>{{$rute->transportations['seat_qty']}}</td>
                    </tr>
                    <tr>
                      <th>Type Transportasi</th>
                      <td>{{$rute->transportations->transportation_types->description}}</td>
                    </tr>
                  </table>
                </div>
                " title="" data-original-title='<button type="button" class="close pull-right" data-dismiss="popover">&times;</button>Transportasi'>{{ $rute->transportations['description'] }}</button>
            </td>
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
