@extends('layouts.user')

@section('header')
    <div class="title m-b-md">
        {{ config('app.name', 'Laravel') }}
    </div>

    <div class="links">
        <a href="https://laravel.com/docs">Docs</a>
        <a href="https://github.com/laravel/laravel">Laravel GitHub</a>
        <a href="https://github.com/80cassava/">80cassava GitHub</a>
    </div>

    <div class="links">
        <h1>Feature Below it's on Progress</h1>
    </div>

    <div class="s003" style="/*margin-top: 40px;*/">
      <form>
        @csrf
        <div class="inner-form">
          <div class="input-field first-wrap">
            <div class="input-select">
              <select data-trigger="" name="choices-single-defaul">
                <option value="">Fakultas</option>
                <option value="">Jurusan</option>
                <option value="">Ruang</option>
                <option value="">Barang</option>
              </select>
            </div>
          </div>
          <div class="input-field second-wrap">
            <input id="search" type="text" placeholder="Enter Keywords?" />
          </div>
          <div class="input-field third-wrap">
            <button class="btn-search" type="button">
              <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
              </svg>
            </button>
          </div>
        </div>
      </form>
    </div>
@stop

@section('content')
    <div style="background: #F4F6F9; padding: 20px;">
        <div class="section-body">
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-success">
                    <i class="fas fa-square"></i> 
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Total Fakultas</h4>
                    </div>
                    <div class="card-body">
                      {{$fak}}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-warning">
                    <i class="fas fa-square"></i> 
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Total Jurusan</h4>
                    </div>
                    <div class="card-body">
                      {{$jur}}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-info">
                    <i class="fas fa-square"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Total Ruangan</h4>
                    </div>
                    <div class="card-body">
                      {{$rua}}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-primary">
                    <i class="fas fa-square"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Total Barang</h4>
                    </div>
                    <div class="card-body">
                      {{$bar}}
                    </div>
                  </div>
                </div>
              </div>
            </div>  
          </div>
          <div class="section-body">
              {{-- <div class="col-12 col-md-12 col-lg-12"> --}}
                <div class="card">
                  {{-- <div class="card-header">
                    <form method="GET" class="form-inline">
                      <div class="form-group">
                        <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->get('search') }}">
                      </div>
                      &nbsp;
                      <div class="form-group">
                        <button type="submit" class="btn btn-light"><i class="fas fa-search"></i></button>
                      </div>
                    </form>
                    &nbsp;
                    <a href="{{ route('barang.index') }}" class="pull-right btn btn-outline-info">All Data</a>
                  </div> --}}
                  <div class="card-header">
                      <h1>Daftar Barang</h1>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Ruangan</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Fakultas</th>
                            <th scope="col">Total</th>
                            <th scope="col">Broken</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse($data as $barang)
                          <tr>
                            <td width="5%">{{ ++$i }}</td>
                            <td width="10%" style="padding-top: 5px; padding-bottom: 5px; padding-right: auto; padding-left: auto; "><img src="{{ url('/') }}/images/barang/{{ $barang->image }}" class="img-thumbnail" /></td>
                            <td>{{ $barang->name }}</td>
                            <td width="13%">{{ $barang->ruangan_name }}</td>
                            <td width="20%">{{ $barang->jurusan_name }}</td>
                            <td width="20%">{{ $barang->fakultas_name }}</td>
                            <td width="5%">{{ $barang->total }}</td>
                            <td width="5%">{{ $barang->broken }}</td>
                          </tr>
                          @empty
                          <tr>
                            <td colspan="8"><center>Data kosong</center></td>
                          </tr>
                          @endforelse
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      {!! $data->appends(request()->except('page'))->render() !!}
                    </nav>
                  </div>
                </div>
            {{-- </div>  --}}
          </div>
    </div>
@stop