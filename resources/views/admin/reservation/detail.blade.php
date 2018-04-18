@extends('master')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            @if(session('messages'))
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Success!</strong> {{ session('messages') }}
                </div>
            @endif
            <div class="panel panel-warning">
                <div class="panel-heading"><a href="{{ URL::previous() }}" class="btn btn-warning btn-sm"><span class="glyphicons glyphicons-circle-arrow-left"></span>Kembali</a> Detail Pemesanan <strong>{{ $detail->customers['name'] }}</strong></div>

                <div id="showFadeIn" class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-hover table-striped">
                      <tbody>
                        <tr>
                          <th>Kode Reservasi</th>
                          <td>{{ $detail->reservation_code }}</td>
                        </tr>
                        <tr>
                          <th>Tanggal Reservasi</th>
                          <td>{{ $detail->reservation_date }}</td>
                        </tr>
                        <tr>
                          <th>Nama Kustomer</th>
                          <td>{{ $detail->customers['name'] }}</td>
                        </tr>
                        <tr>
                          <th>Rute</th>
                          <td>{{ $detail->rutes['rute_from'] }} ke {{ $detail->rutes['rute_to'] }}</td>
                        </tr>
                        <tr>
                          <th>Pemesan</th>
                          <td>{{ $detail->users['name'] }}</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
                <div class="panel-footer">

                </div>
            </div>
        </div>
    </div>
</div>




















<!-- detail Detail of Reservation modal -->
<div class="modal fade" id="detailDetail of Reservation{{ $detail->id }}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">detail Detail of Reservation</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
