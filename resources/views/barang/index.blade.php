@extends('layouts.adminmain')

@section('content')

<section class="section">
  <div class="section-header">
    <h1>Barang</h1>
  </div>

    @if ($message = Session::get('success'))
      <div class="card">
          <div class="card-body">
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
          </div>
      </div>
    @endif

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
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
          </div>
          {{-- <div class="card-header">
          @if(auth()->user()->role == 'admin')
            <a class="btn btn-primary" href="{{ route('barang.create') }}"><i class="fa fa-plus"></i> Add New</a>
            &nbsp;
          @endif
            <a class="btn btn-success" href="{{ route('barang.export') }}"><i class="fa fa-print"></i> Export Data</a>
          </div> --}}
          <div class="card-header">
            @if(auth()->user()->role == 'admin')
            <div class="col-4 col-md-4 col-lg-4">
              <a class="btn btn-primary" href="{{ route('barang.create') }}"><i class="fa fa-plus"></i> Add New</button></a>
            </div>
            <div class="col-8 col-md-8 col-lg-8">
              <div class="float-right">
                {{-- <button class="btn btn-outline-success" href="#" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-file-upload"></i> Import</button> --}}
                <a class="btn btn-outline-success" href="{{ route('barang.export') }}"><i class="fa fa-file-download"></i> Export</a>
              </div>
            </div>
            @else
            <div class="col-12 col-md-12 col-lg-12">
              <div class="float-right">
                <a class="btn btn-outline-success" href="{{ route('barang.export') }}"><i class="fa fa-file-download"></i> Export</a>
              </div>
            </div>
            @endif
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
                    <th scope="col">Total</th>
                    <th scope="col">Broken</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($data as $barang)
                  <tr>
                    <td width="5%">{{ ++$i }}</td>
                    <td width="15%" style="padding-top: 5px; padding-bottom: 5px; padding-right: auto; padding-left: auto; "><img src="{{ url('/') }}/images/barang/{{ $barang->image }}" class="img-thumbnail" /></td>
                    <td>{{ $barang->name }}</td>
                    <td width="15%">{{ $barang->ruangan->name }}</td>
                    <td width="5%">{{ $barang->total }}</td>
                    <td width="5%">{{ $barang->broken }}</td>
                    <td width="17%">{{ $barang->create_by->name }}</td>
                    <td width="17%">{{ $barang->update_by->name }}</td>
                    <td width="5%">
                      <form action="{{ route('barang.destroy', $barang->id) }}" method="POST">
                      <div class="btn-group">
                        <a class="btn btn-sm btn-warning view_modal color" href="{{ route('barang.edit', $barang->id) }}"><i class="fas fa-pen"></i></a>
                        @if(auth()->user()->role == 'admin')
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete data?');"><i class="fas fa-trash"></i></button>
                        @endif
                      </div>
                      </form>
                    </td>
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
    </div>  
  </div>
</section>

@endsection