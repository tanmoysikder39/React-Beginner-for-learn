@extends('admin.admin_master')
 
 @section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
              <h4>  Edit Brand</h4>
               @if (session('success'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                      <strong>{{ session('success') }}</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                <div class="col-md-8"> 
                    <div class="card">
                      <form action="{{url ('brand/update/'.$brands->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                         <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Update Brand Name</label>
                            <input type="text"name="brand_name" value="{{ $brands->brand_name }}" class="form-control"
                             id="exampleInputEmail1" aria-describedby="emailHelp" />
                             @error('brand_name')
                                <span class="text-danger">{{ $message }}</span>
                             @enderror
                        </div>
                            <label for="exampleInputEmail1">Update Brand Image</label>
                            <input type="file"name="brand_image" value="{{ $brands->brand_image }}" class="form-control"
                             id="exampleInputEmail1" aria-describedby="emailHelp" />
                             @error('brand_image')
                                <span class="text-danger">{{ $message }}</span>
                             @enderror
                        </div>
                        <div class="form-group">
                                <img src="{{ asset($brands->brand_image) }}" style="height:60px; width:80px">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Brand</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
