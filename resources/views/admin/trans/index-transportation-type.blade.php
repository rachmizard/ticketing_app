@extends('master')

@section('content')
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="home"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Type Transportation</li>
              </ul>
              <div class="m-b-md">
                <h3 class="m-b-none">Type of Transportation</h3>
              </div>
              <div class="col-md-6">
                <section class="panel panel-default">
                    <header class="panel-heading">
                      <i class="fa fa-plane"></i> Data Transportation
                      <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                    </header>
                    <div class="table-responsive">
                        @foreach($trans as $in)
                        <form action="/admin/type/deletechecked/{{ $in->id }}">
                            {{ csrf_field() }}
                        @endforeach
                        <div class="btn-group">
                            @if(count($trans) > 0)
                                <button type="submit" id="submit_prog" class="btn btn-danger">Delete for checked</button>
                            @endif
                        </div>
                        <table class="table table-hover" data-ride="datatables">
                            <thead>
                                <tr>
                                    @if(count($trans) > 0)
                                    <th><button type="button" class="checkall btn btn-primary btn-sm">Check All</button></th>
                                    @endif
                                    <th>No</th>
                                    <th>Type Transportasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @if(count($trans) > 0) 
                                @foreach($trans as $c)
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
                                    <td>{{ $c->description }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="type-transportation/delete/{{ $c->id }}" class="btn btn-danger btn-sm" onClick="return confirm('Anda yakin?')"><i class="fa fa-trash-o"></i></a>
                                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edittype{{ $c->id }}"><i class="fa fa-edit"></i></a>
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
              </div>
              <div class="col-md-6">
                <section class="panel panel-default">
                    <header class="panel-heading">
                      <i class="fa fa-plus"></i> Tambah data
                      <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                    </header>
                    <section class="panel-body">
                    <form class="form-horizontal" action="type-transportation" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Type</label>
                          <div class="col-sm-10">
                            <input type="text" name="description" class="form-control rounded" placeholder="Masukan disini...">
                          </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success btn-round"><i class=" fa fa-plus"></i> Tambah</button>
                            </div>
                        </div>
                    </form>
                    </section>
                 </section>
              </div>
            </section>



@endsection
