
@extends('admin.admin_master')
 
 @section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
              
                <div class="col-md-8">
                    @if (session('success'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                      <strong>{{ session('success') }}</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <h1>All image</h1>
                  
                    <div class="card-group">
                        @foreach ($images as $multi)
                            
                            <div class="col-md-4 mt-5"> 
                                <div class="card">
                                    <img src="{{ asset($multi->image) }}" alt="image">
                                </div>
                            </div>

                        @endforeach

                    </div>
                   
                </div>
                <div class="col-md-4"> 
                    <div class="card">
                        <h3> Multi Image</h3>
                      <form action="{{ route('store.image') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                       
                         <div class="form-group">
                            <label for="exampleInputEmail1"> Image</label>
                            <input type="file"name="image[]"class="form-control" multiple="" />
                             @error('image')
                                <span class="text-danger">{{ $message }}</span>
                             @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add image</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
 @endsection