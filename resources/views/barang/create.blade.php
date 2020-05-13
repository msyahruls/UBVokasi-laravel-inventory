@extends('layouts.adminmain')

@section('content')

<section class="section">
  <div class="section-header">
    <h1>Barang <small>Add Data</small></h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('barang.index') }}"> 
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Back
              </button>
            </a>
          </div>

          @if (count($errors) > 0)
            <div class="card col-lg-6">
                <div class="card-body">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
          @endif

          <div class="card-body">
            <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
              </div>
              <div class="form-group">
                  <label>Ruangan</label>
                  <select class="form-control" name="ruangan_id">
                    @foreach($data as $ruangan)
                      <option value="{{ $ruangan->id }}">{{ $ruangan->name }}</option>
                    @endforeach
                  </select>
              </div>
              <div class="form-group">
                <label>Total</label>
                <input type="number" name="total" class="form-control" min="0" value="0">
              </div>
              <div class="form-group">
                <label>Broken</label>
                <input type="number" name="broken" class="form-control" min="0" value="0">
              </div>
              <div class="form-group">
                  <label>Image</label>
                  {{-- <div id="image-preview" class="image-preview">
                    <label for="image-upload" id="image-label">Choose File</label>
                    <input type="file" name="image" id="customFile">
                  </div> --}}
                  <div class="custom-file">
                    <input type="file" name="image" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
              </div>
              <input type="hidden" name="created_by" class="form-control" value="{{ auth()->user()->id }}">
              <input type="hidden" name="updated_by" class="form-control" value="{{ auth()->user()->id }}">
              <div class="form-group">
                <button type="submit" class="btn btn-primary">SAVE</button>
              </div>
            </form>
          </div>
        </div>
      </div>  
  </div>
</section>

@endsection