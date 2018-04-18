<!-- add reservation modal -->
<div class="modal fade" id="addReservation" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Reservation</h4>
      </div>
      <div class="modal-body">
        <form action="/admin/reservation" data-validate="parsley" method="POST">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="reservation_code">Reservation Code</label>
            <input type="text" name="reservation_code" class="form-control" id="reservation_code" placeholder="Reservation code" value="{{ rand() }}" data-required="true">
          </div>
          <div class="form-group">
            <label for="reservation_date">Reservation Date</label>
            <input type="date" id="reservation_date" class="form-control" id="reservation_date" name="reservation_date" placeholder="Reservation Date" data-required="true">
          </div>            
          <div class="form-group">
            <label for="customer_id">Customer Name</label>
            <select id="select2-option" class="form-control" name="customer_id" placeholder="Customer Name" required>
              <option selected disabled=>-- Pilih Customer --</option>
              @foreach($customers as $customer)
                <option value="{{$customer->id}}">{{$customer->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="seat_code">Seat Code</label>
            <input type="text" id="seat_code" class="form-control" id="seat_code" name="seat_code" placeholder="Seat Code" data-required="true">
          </div>
          <div class="form-group">
            <label for="rute_id">Rute</label>
            <select id="select2-option-rute" class="form-control" id="rute_id" name="rute_id" placeholder="Rute" data-required="true">
              <option selected disabled>--Pilih Rute--</option>
              @foreach($rutes as $rute)
                <option value="{{$rute->id}}">{{$rute->rute_from}} to {{$rute->rute_to}}</option>
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
