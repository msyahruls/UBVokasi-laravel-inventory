@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Barang</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <form method="GET" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->get('search') }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-light">Search</button>
              </div>
            </form>
            <a href="{{ route('barang.index') }}" class="pull-right">
              <button type="button" class="btn btn-outline-info">All Data</button>
            </a>
          </div>
          @if(auth()->user()->role == 'admin')
          <div class="card-header">
            <a href="{{ route('barang.create') }}">
              <button type="button" class="btn btn-primary">Add New</button>
            </a>
          </div>
          @endif
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Ruangan</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse($data as $barang)
                <tr>
                  <td width="5%">{{ ++$i }}</td>
                  <td>{{ $barang->name }}</td>
                  <td width="35%">{{ $barang->ruangan_name }}</td>
                  <td width="15%">
                    <form action="{{ route('barang.destroy', $barang->id) }}" method="POST">
                    <a class="btn btn-sm btn-warning view_modal color" href="{{ route('barang.edit', $barang->id) }}"><i class="fas fa-pen"></i></a>
                    @if(auth()->user()->role == 'admin')
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete data?');"><i class="fas fa-trash"></i></button>
                    @endif
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
              
            </nav>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection()