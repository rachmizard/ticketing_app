@extends('master')
@section('content')
           <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Cari tiket</li>
              </ul>
              <div class="m-b-md">
                <h3 class="m-b-none">Cari Tiket</h3>
                <small>Welcome back, {{ Auth::user()->name }}</small>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <!-- .crousel fade -->
                  <section class="panel bg-light">
                    <div class="carousel slide carousel-fade panel-body" id="c-fade">
                        <ol class="carousel-indicators out">
                          <li data-target="#c-fade" data-slide-to="0" class=""></li>
                          <li data-target="#c-fade" data-slide-to="1" class="active"></li>
                          <li data-target="#c-fade" data-slide-to="2" class=""></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="item">
                            <p class="text-center">
                              <em class="h4 text-mute">Save your time</em><br>
                              <small class="text-muted">Many components</small>
                            </p>
                          </div>
                          <div class="item active">
                            <p class="text-center">
                              <em class="h4 text-mute">Nice and easy to use</em><br>
                              <small class="text-muted">Full documents</small>
                            </p>
                          </div>
                          <div class="item">
                            <p class="text-center">
                              <em class="h4 text-mute">Mobile header first</em><br>
                              <small class="text-muted">Mobile/Tablet/Desktop</small>
                            </p>
                          </div>
                        </div>
                        <a class="left carousel-control" href="#c-fade" data-slide="prev">
                          <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right carousel-control" href="#c-fade" data-slide="next">
                          <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                  </section>
                  <!-- / .carousel fade -->
                </div>
                <div class="col-md-8 col-md-offset-2">
                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">Cari rute mu!</header>
                    <div class="panel-body">
                      <div>
                        <form class="form-inline" method="get" role="form">
                          <div class="col-md-12   ">
                            <div class="form-group">
                              <label class="sr-only" for="exampleInputEmail2"></label>
                              <select type="text" id="select2-option-dari" name="qfrom" style="width: 250px; height: 30px;">
                                <option selected disabled>Dari...</option>
                                @foreach($rutes as $rute)
                                <option value="{{ $rute->rute_from }}">{{ $rute->rute_from }}</option>
                                <option value="{{ $rute->rute_to }}">{{ $rute->rute_to }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                              <label class="sr-only" for="exampleInputPassword2"></label>
                              <select type="text" id="select2-option-ke" name="qto" style="width: 250px; height: 30px;">
                                <option selected disabled>Ke...</option>
                                @foreach($rutes as $rute)
                                <option value="{{ $rute->rute_to }}">{{ $rute->rute_to }}</option>
                                <option value="{{ $rute->rute_from }}">{{ $rute->rute_from }}</option>
                                @endforeach
                              </select>
                            </div>  
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Cari</button>
                            </div>
                          </div>
                        </form>        
                      </div>
                    </div>
                  </section>
                </div> 
                @if(count($hasil) > 0)
                <div class="col-md-8 col-md-offset-2">
                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">Hasil pencarian!</header>
                    <div class="panel-body">
                      <div>
                        <table class="table table-hover">
                          <tr>
                            <th>Rute dari</th>
                            <th>Menuju ke</th>
                            <th>Pilih</th>
                          </tr>
                          @foreach($hasil as $in)
                          <tr>
                            <td>{{ $in->rute_from }}</td>
                            <td>{{ $in->rute_to }}</td>
                            <td>
                              <div class="form-group">
                              <a href="pesan-tiket/{{ $in->rute_from }}-{{ $in->rute_to }}/{{ $in->id }}" class="btn btn-sm btn-rounded btn-info"><i class="fa fa-ticket"></i> Pesan tiket</a>
                              <a data-toggle="modal" data-target="#showticket{{$in->id}}" class="btn btn-sm btn-rounded btn-danger"><i class="fa fa-eye"></i> Rincian tiket</a>
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        </table>  
                      </div>
                    </div>
                  </section>
                </div>
                @else
                <div class="col-md-8 col-md-offset-2">
                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">Hasil pencarian!</header>
                    <div class="panel-body">
                      <div>
                        <table class="table table-hover">
                          <tr>
                            <th>Rute dari</th>
                            <th>Rute ke</th>
                          </tr>
                          <tr>
                            <td colspan="6">Tidak di temukan atau tidak tersedia untuk sekarang.</td>
                          </tr>
                        </table>  
                      </div>
                    </div>
                  </section>
                </div>
                @endif
              </div>
            </section>
@endsection


<!-- notification session -->
@if(session('messages'))      
      <!-- sweet alert -->
    <link href="/css/sweetalert.css" rel="stylesheet">
    <script src="/js/sweetalert.js"></script>
    <script>
        swal("{{ session('messages') }}", "", "success");
    </script>
@endif

@include('user.showrincian')
