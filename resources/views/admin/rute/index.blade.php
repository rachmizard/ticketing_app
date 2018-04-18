@extends('master')

@section('content')
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="home"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Rute</li>
              </ul>
              <div class="m-b-md">
                <h3 class="m-b-none">Rute</h3>
              </div>
              <section class="panel panel-default">
                <header class="panel-heading">
                  <i class="fa fa-map-marker"></i> Data Rute
                  <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                </header>
                <div class="table-responsive">
                    @foreach($rutes as $in)
                    <form action="/admin/rute/deletechecked/{{ $in->id }}">
                        {{ csrf_field() }}
                    @endforeach
                    <div class="btn-group">
                        @if(count($rutes) > 0)
                            <button type="submit" id="submit_prog" class="btn btn-danger">Delete for checked</button>
                        @endif
                    </div>
                    <table class="table table-hover" data-ride="datatables">
                        <thead>
                            <tr>
                                @if(count($rutes) > 0)
                                <th><button type="button" class="checkall btn btn-primary btn-sm">Check All</button></th>
                                @endif
                                <th>No</th>
                                <th>Depart At</th>
                                <th>Rute From</th>
                                <th>Rute To</th>
                                <th>Price</th>
                                <th>Transportation</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @if(count($rutes) > 0) 
                            @foreach($rutes as $c)
                            <tr>
                                <td><!-- checkbox -->
                                <div class="col-md-offset-6 checkbox">
                                  <label class="checkbox-custom">
                                    <input type="checkbox" name="check[]" value="{{ $c->id }}">
                                    <i class="fa fa-fw fa-square-o"></i>
                                  </label>
                                </div>
                              </td>
                                <td>{{ $no }}</td>
                                <td>{{ $c->depart_at }}</td>
                                <td>{{ $c->rute_from }}</td>
                                <td>{{ $c->rute_to }}</td>
                                <td>{{ $c->price }}</td>
                                <td>
                                <a class="btn btn-default" data-toggle="modal" data-target="#showtrans{{ $c->transportation_id }}">
                                  <i class="fa fa-search text"></i> {{ $c->transportations['description'] }}
                                  <i class="fa fa-search text-active text-danger"></i>
                                </a>
                                <td>
                                    <div class="btn-group">
                                        <a href="/admin/rute/delete/{{ $c->id }}" class="btn btn-danger btn-sm" onClick="return confirm('Anda yakin?')"><i class="fa fa-trash-o"></i></a>
                                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editrute{{ $c->id }}"><i class="fa fa-edit"></i></a>
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
              </section>
              <section class="panel-footer">
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addrute"></i><i class="fa fa-plus"></i> Tambah Rute</a>
              </section>
            </section>




@include('admin.rute.add')
@include('admin.rute.edit')
@include('admin.rute.show-transportation')

@endsection
