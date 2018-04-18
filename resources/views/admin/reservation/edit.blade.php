@foreach($reservations as $edit)
<!-- edit reservation modal -->
<div class="modal fade" id="editReservation{{ $edit->id }}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Reservation</h4>
      </div>
      <div class="modal-body">
        <form action="/admin/reservation/{{ $edit->id }}" data-validate="parsley" method="POST">
            {{ csrf_field() }}
          <div class="form-group has-success">
            <label for="reservation_code">Reservation Code</label>
            <input type="text" name="reservation_code" class="form-control" id="reservation_code" placeholder="Reservation code" data-required="true" value="{{ $edit->reservation_code }}">
          </div>
          <div class="form-group has-success">
            <label for="reservation_date">Reservation Date</label>
            <input type="date" id="reservation_date" class="form-control" id="reservation_date" name="reservation_date" placeholder="Reservation Date" data-required="true" value="{{ $edit->reservation_date }}">
          </div>            
          <div class="form-group has-success">
            <label for="customer_id">Customer Name</label>
            <select id="customer_id" class="form-control" id="customer_id" name="customer_id" placeholder="Customer Name">
              @foreach($customers as $customer)
                <option value="{{$customer->id}}" @if($customer->id == $edit->customer_id) selected @endif>{{$customer->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group has-success">
            <label for="seat_code">Seat Code</label>
            <input type="text" id="seat_code" class="form-control" id="seat_code" name="seat_code" placeholder="Seat Code" data-required="true" value="{{ $edit->seat_code }}">
          </div>
          <div class="form-group has-success">
            <label for="rute_id">Rute</label>
            <select id="rute_id" class="form-control" id="rute_id" name="rute_id" placeholder="Rute">
              @foreach($rutes as $rute)
                <option value="{{$rute->id}}" @if($edit->rute_id == $rute->id)selected @endif>{{$rute->rute_from}} to {{$rute->rute_to}}</option>
              @endforeach
            </select>
          </div>        
        <div class="form-group has-success">
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
