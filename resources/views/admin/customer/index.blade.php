@extends('master')

@section('content')
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="home"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Customer</li>
              </ul>
              <div class="m-b-md">
                <h3 class="m-b-none">Customer</h3>
              </div>
              <section class="panel panel-default">
                <header class="panel-heading">
                  Data Customer
                  <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                </header>
                <div class="table-responsive">
                    <table class="table table-striped m-b-none" data-ride="datatables">
                        <thead>
                            <tr>
                                @if(count($customers) > 0)
                                <th><button type="button" class="checkall btn btn-primary btn-sm">Check All</button></th>
                                @endif
                                <th>No</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @if(count($customers) > 0) 
                            @foreach($customers as $c)
                            <tr>
                                <td><input type="checkbox" name="check[]" value="{{ $c->id }}" class="checkhour"></td>
                                <td>{{ $no }}</td>
                                <td>{{ $c->name }}</td>
                                <td>{{ $c->address }}</td>
                                <td>{{ $c->phone }}</td>
                                <td>{{ $c->gender }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="/customer/delete/{{ $c->id }}" class="btn btn-rounded btn-danger btn-sm" onClick="return confirm('Anda yakin?')"><i class="fa fa-trash-o"></i>/a>
                                        <a href="#" class="btn btn-primary btn-rounded btn-sm" data-toggle="modal" data-target="#editCustomer{{ $c->id }}"><i class="fa fa-edit"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php $no++; ?>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="8"><p class="text-center">No data has saved at database.</p></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
              </section>
              <section class="panel-footer">
                  <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addCustomer"><i class="fa fa-plus"></i>Tambah Customer</a>
              </section>
            </section>






















<!-- add customer modal -->
<div class="modal fade" id="addCustomer" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Customer</h4>
      </div>
      <div class="modal-body">
        <form action="/admin/customer" method="POST">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="name">Name Customer</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Customer's address">
          </div>
          <div class="form-group">
            <label for="phone">Customer's phone number</label>
            <input type="text" id="phone" class="form-control" id="phone" name="phone" placeholder="Customer's phone">
          </div>            
          <div class="form-group">
            <label for="gender">Customer's gender</label>
            <select id="gender" class="form-control" id="gender" name="gender" placeholder="Customer's gender">
                <option value="L">L</option>
                <option value="P">P</option>
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

@foreach($customers as $edit)
<!-- edit customer modal -->
<div class="modal fade" id="editCustomer{{ $edit->id }}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Customer</h4>
      </div>
      <div class="modal-body">
        <form action="/admin/customer/{{ $edit->id }}" method="POST">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="name">Name Customer</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ $edit->name }}">
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Customer's address" value="{{ $edit->address }}">
          </div>
          <div class="form-group">
            <label for="phone">Customer's phone number</label>
            <input type="text" id="phone" class="form-control" id="phone" name="phone" placeholder="Customer's phone" value="{{ $edit->phone }}">
          </div>            
          <div class="form-group">
            <label for="gender">Customer's gender</label>
            <select id="gender" class="form-control" id="gender" name="gender" placeholder="Customer's gender">
                <option value="{{ $edit->gender }}" selected disabled>{{ $edit->gender }}</option>
                <option value="L">L</option>
                <option value="P">P</option>
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
@endsection
