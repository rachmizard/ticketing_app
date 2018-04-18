@extends('master')

@section('content')
 <!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Profie Account</h3> </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">
                <div class="card-heading">Admin Profile Account</div>

                <div class="card-body">
                    @if (session('messages'))
                        <div class="alert alert-success">
                            {{ session('messages') }}
                        </div>
                    @endif

                    <form action="profile/update" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            @if(!Auth::user()->photo == null)
                            <img src="/img/{{ Auth::user()->photo }}" class="img-circle" width="100" height="100" alt="">
                            @else
                            <img src="/img/user.png" class="img-circle" width="100" height="100" alt="">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" placeholder="Input kan..." value="{{ Auth::user()->name }}" name="name">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" placeholder="Input kan..." value="{{ Auth::user()->email }}" name="email">
                        </div>
                        <div class="form-group">
                            <label for="">Photo</label>
                            <input type="file" class="form-control" name="photo">
                            <input type="hidden" value="{{ Auth::user()->photo }}" name="photoRequest">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
