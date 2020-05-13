@extends('layouts.adminmain')

@section('content')

<section class="section">
  <div class="section-header">
    <h1>Ruangan</h1>
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
            <a href="{{ route('ruangan.index') }}" class="pull-right btn btn-outline-info">All Data</a>
          </div>
          <div class="card-header">
            <div class="col-4 col-md-4 col-lg-4">
              <a class="btn btn-primary" href="{{ route('ruangan.create') }}"><i class="fa fa-plus"></i> Add New</button></a>
            </div>
            <div class="col-8 col-md-8 col-lg-8">
              <div class="float-right">
                <button class="btn btn-outline-success" href="#" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-file-upload"></i> Import</button>
                <a class="btn btn-outline-success" href="{{ route('ruangan.export') }}"><i class="fa fa-file-download"></i> Export</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Jurusan</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               @forelse($data as $ruangan)
                <tr>
                  <td width="5%">{{ ++$i }}</td>
                  <td>{{ $ruangan->name }}</td>
                  <td width="45%">{{ $ruangan->jurusan->name }}</td>
                  <td width="15%">
                    <form action="{{ route('ruangan.destroy', $ruangan->id) }}" method="POST">
                      <div class="btn-group">
                      <a class="btn btn-sm btn-warning view_modal color" href="{{ route('ruangan.edit', $ruangan->id) }}"><i class="fas fa-pen"></i></a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete data?');"><i class="fas fa-trash"></i></button>
                    </div>
                    </form>
                  </td>
                </tr>
               @empty
                <tr>
                  <td colspan="3"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{ route('jurusan.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Jurusan <small>Import Data</small></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label>Excel File</label>
              {{-- <input type="file" name="file" class="form-control"> --}}
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" name="file" required="required">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Import</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection