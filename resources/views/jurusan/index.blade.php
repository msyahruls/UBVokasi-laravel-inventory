@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Jurusan</h1>
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
            <a href="{{ route('jurusan.index') }}" class="pull-right btn btn-outline-info">All Data</a>
          </div>
          <div class="card-header">
            <a class="btn btn-primary" href="{{ route('jurusan.create') }}"><i class="fa fa-plus"></i> Add New</button></a>
            &nbsp;
            <a class="btn btn-success" href="{{ route('jurusan.export') }}"><i class="fa fa-print"></i> Export Data</a>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Fakultas</th>
                  <th scope="col">Ruangan</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                 @forelse($data as $jurusan)
                <tr>
                  <td width="5%">{{ ++$i }}</td>
                  <td>{{ $jurusan->name }}</td>
                  <td>{{ $jurusan->fakultas->name }}</td>
                  <td width="5%">{{ $jurusan->ruangan->count() }}</td>
                  <td width="15%">
                    <form action="{{ route('jurusan.destroy', $jurusan->id) }}" method="POST">
                      <div class="btn-group">
                      <a class="btn btn-sm btn-warning view_modal color" href="{{ route('jurusan.edit', $jurusan->id) }}"><i class="fas fa-pen"></i></a>
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
@endsection