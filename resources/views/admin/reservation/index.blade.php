@extends('master')

@section('content')
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="home"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Reservasi</li>
              </ul>
              <div class="m-b-md">
                <h3 class="m-b-none">Reservasi</h3>
                @if(session('messages'))
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fa fa-ok-sign"></i><strong>Success!</strong> {{ session('messages') }}
                  </div>
                @endif
              </div>
              <section class="panel panel-default">
                <header class="panel-heading">
                  <i class="fa fa-shopping-cart"></i> Data Reservasi
                  <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                </header>
                <div class="table-responsive">
                    @foreach($reservations as $in)
                    <form action="/admin/reservation/deletechecked/{{ $in->id }}">
                        {{ csrf_field() }}
                    @endforeach
                    <div class="btn-group">
                        @if(count($reservations) > 0)
                            <button type="submit" id="submit_prog" class="btn btn-danger">Delete for checked</button>
                        @endif
                    </div>
                    <table class="table table-striped m-b-none" data-ride="datatables">
                        <thead>
                            <tr>
                                @if(count($reservations) > 0)
                                <th>
                                  <button type="button" class="checkall btn btn-primary btn-sm">Check All</button>
                                </th>
                                @endif
                                <th>No</th>
                                <th>Kode reservasi</th>
                                <th>Tanggal reservasi</th>
                                <th>Nama Customer</th>
                                <th>Rute</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @if(count($reservations) > 0) 
                            @foreach($reservations as $c)
                            <tr>
                                <td>
                                <!-- checkbox -->
                                <div class="col-md-offset-6 checkbox">
                                  <label class="checkbox-custom">
                                    <input type="checkbox" name="check[]" value="{{ $c->id }}">
                                    <i class="fa fa-fw fa-square-o"></i>
                                  </label>
                                </div>
                                </td>
                                <td>{{ $no }}</td>
                                <td>{{ $c->reservation_code }}</td>
                                <td>{{ $c->reservation_date }}</td>
                                <td>{{ $c->customers['name'] }}</td>
                                <td>
                                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#showrute{{ $c->rute_id }}">{{ $c->rutes['rute_from']}} ke {{ $c->rutes['rute_to']}}</a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ URL::to('/admin/reservation/' . $c->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></a>
                                        <a href="/admin/reservation/delete/{{ $c->id }}" class="btn btn-danger btn-sm" onClick="return confirm('Anda yakin?')"><i class="fa fa-trash-o"></i></a>
                                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editReservation{{ $c->id }}"><i class="fa fa-edit"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php $no++; ?>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </form>
                </div>
              </section>
              <section class="panel-footer">
                  <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addReservation"><i class="fa fa-plus"></i> Tambah Reservasi</a>
              </section>
            </section>
@include('admin.reservation.add')
@include('admin.reservation.edit')
@include('admin.reservation.show-rute')
@include('admin.rute.show-transportation')
@endsection
