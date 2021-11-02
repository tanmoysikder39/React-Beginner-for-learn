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
                    <h1>All brand</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Brand Image</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                // ($i =1)
                            @endphp
                          @foreach($brands as $brand)
                           <tr>
                               {{-- {{$i++}} --}}
                               {{-- {{ $categories->firstItem()+$loop->index }} paginate serial maintain --}}
                                <th scope="row">{{ $brands->firstItem()+$loop->index }}</th>
                                <td>{{$brand->brand_name}}</td>
                                <td><img src="{{ asset($brand->brand_image) }}" style="height: 40px; width:70px"></td>
                                <td>
                                    @if($brand->created_at==NULL)
                                    <span class="text-danger">No Date Set</span>
                                    @else
                                    {{-- {{$category->created_at->diffForHumans()}} only for eom  --}}
                                    {{ Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}
                                    @endif
                                </td>
                                 <td><a href="{{ url('brand/edit/'.$brand->id) }}" class="btn btn-info">Edit</a></td>
                                 <td><a href="{{ url('brand/delete/'.$brand->id) }}" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete ?')">Delete</a></td>
                                  
                            </tr>
                          @endforeach
                        </tbody>
                    </table>

                    {{ $brands->links() }}
                </div>
                <div class="col-md-4"> 
                    <div class="card">
                        <h3> Add Brand</h3>
                      <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand Name</label>
                            <input type="text"name="brand_name" class="form-control"/>
                             @error('brand_name')
                                <span class="text-danger">{{ $message }}</span>
                             @enderror
                        </div>
                         <div class="form-group">
                            <label for="exampleInputEmail1">Brand Image</label>
                            <input type="file"name="brand_image"class="form-control" />
                             @error('brand_image')
                                <span class="text-danger">{{ $message }}</span>
                             @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add Brand</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>

 
        
    </div>
@endsection
