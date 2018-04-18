@extends('master')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-10">
            @if(session('messages'))
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Success!</strong> {{ session('messages') }}
                </div>
            @endif
            <div class="panel panel-warning">
                <div class="panel-heading">Transportation Page</div>

                <div id="showFadeIn" class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($transportations as $in)
                    <form action="/admin/transportation/deletechecked/{{ $in->id }}">
                        {{ csrf_field() }}
                    @endforeach
                    <div class="btn-group">
                        <a href="#addtransportation" class="btn btn-success" data-toggle="modal" data-target="#addtransportation" data-backdrop="static" data-keyboard="true" >Add for transportation</a>
                        @if(count($transportations) > 0)
                            <button type="submit" id="submit_prog" class="btn btn-danger">Delete for checked</button>
                        @endif
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                @if(count($transportations) > 0)
                                <th><button type="button" class="checkall btn btn-primary btn-sm">Check All</button></th>
                                @endif
                                <th>No</th>
                                <th>Kode Transportasi</th>
                                <th>Jumlah Tempat Duduk</th>
                                <th>Gambar</th>
                                <th>Jenis Transportasi</th>
                                <th>Type Transportasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @if(count($transportations) > 0) 
                            @foreach($transportations as $c)
                            <tr>
                                <td><input type="checkbox" name="check[]" value="{{ $c->id }}" class="checkhour"></td>
                                <td>{{ $no }}</td>
                                <td>{{ $c->code }}</td>
                                <td>{{ $c->seat_qty }}</td>
                                <td>
                                  <img src="/img/{{ $c->photo }}" class="img-circle" width="50" height="50">
                                </td>
                                <td>{{ $c->description }}</td>
                                <td>{{ $c->transportation_types['description'] }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="/transportation/delete/{{ $c->id }}" class="btn btn-danger btn-sm" onClick="return confirm('Anda yakin?')">Delete</a>
                                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edittransportation{{ $c->id }}">Edit</a>
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
                </form>
                </div>
                <div class="panel-footer">
                    {{ $transportations->links() }}
                </div>
            </div>
        </div>
    </div>
</div>






















<!-- add transportation modal -->
<div class="modal fade" id="addtransportation" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add transportation</h4>
      </div>
      <div class="modal-body">
        <form action="/admin/transportation" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="code">Kode Transportasi</label>
            <input type="text" name="code" class="form-control" id="code" placeholder="Masukan Kode">
          </div>
          <div class="form-group">
            <label for="seat_qty">Jumlah tempat duduk</label>
            <input type="text" class="form-control" id="seat_qty" name="seat_qty" placeholder="Masukan jumlah tempat duduk...">
          </div>
          <div class="form-group">
            <label for="description">Jenis transportasi</label>
            <input type="text" class="form-control" data-required="true" name="description"> 
          </div>
          <div class="form-group">
            <label for="type">Type</label>
            <select id="select2-option" class="form-control" data-required="true" name="transportation_type_id"> 
              @if(count($types) > 0)
              <option selected disabled>--Pilih Type Transportasi--</option>
              @else
              <option selected disabled>--Tidak ada di database--</option>
              @endif
              @foreach($types as $type)
              <option value="{{ $type->id }}">{{ $type->description }}</option>
              @endforeach
            </select>
          </div>            
          <div class="form-group">
            <label for="photo">Gambar transportasi</label>
            <input type="file" class="form-control" id="photo" name="photo" placeholder="Foto transportasi">
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

@foreach($transportations as $edit)
<!-- edit transportation modal -->
<div class="modal fade" id="edittransportation{{ $edit->id }}" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit transportation</h4>
      </div>
      <div class="modal-body">
        <form action="/admin/transportation/{{ $edit->id }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <!-- check if transportation are has a photo -->
            @if(!$edit->photo == null)
          <div class="form-group">
            <img src="/img/{{ $edit->photo }}" width="100" height="100" class="img-circle" id="gambar" alt="">
          </div>
          <div class="form-group">
            <a href="/admin/transportasi/deletephoto/{{ $edit->id }}" class="btn btn-danger">Delete Photo</a>
          </div>
            @endif
          <div class="form-group">
            <label for="code">Kode Transportasi</label>
            <input type="text" name="code" class="form-control" id="code" placeholder="Masukan Kode" value="{{ $edit->code }}" required=>
          </div>
          <div class="form-group">
            <label for="seat_qty">Jumlah tempat duduk</label>
            <input type="text" class="form-control" id="seat_qty" name="seat_qty" placeholder="Masukan jumlah tempat duduk..." value="{{ $edit->seat_qty }}" required=>
          </div>
          <div class="form-group">
            <label for="description">Jenis transportasi</label>
            <input id="description" class="form-control" id="description" name="description" placeholder="Masukan jenis transportasi..." value="{{ $edit->description }}"  required>
          </div>
          <div class="form-group">
            <label for="type">Type</label>
            <select id="select2-option" class="form-control" data-required="true" name="transportation_type_id"> 
              @if(count($types) > 0)
              <option selected disabled>--Pilih Type Transportasi--</option>
              @else
              <option selected disabled>--Tidak ada di database--</option>
              @endif
              @foreach($types as $type)
              <option value="{{ $type->id }}" @if($type->id == $edit->id) selected @endif>{{ $type->description }}</option>
              @endforeach
            </select>
          </div>                        
          <div class="form-group">
            <label for="photo">Gambar transportasi</label>
            <input type="file" class="form-control" id="photo" name="photo" placeholder="Foto transportasi">
            <input type="hidden" name="photoRequest" value="{{ $edit->photo }}">
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
