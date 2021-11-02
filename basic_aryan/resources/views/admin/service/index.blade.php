@extends('admin.admin_master')
 
 @section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
               
              <a href=" {{ route('add.service') }}"><button class="btn btn-info">Add Service</button></a>
                <div class="col-md-12">
                    @if (session('success'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                      <strong>{{ session('success') }}</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <h4>All Service</h4>
                    <br>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">#</th>
                                <th scope="col"width="15%">Service Title</th>
                                <th scope="col"width="25%">Short Description</th>
                                <th scope="col"width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                ($i =1)
                            @endphp
                          @foreach($services as $service)
                           <tr>
                              
                               {{-- {{ $categories->firstItem()+$loop->index }} paginate serial maintain --}}
                                <th scope="row"> {{$i++}}</th>
                                <td>{{$service->title}}</td>
                                <td>{{$service->short_des}}</td>
                                
                                
                              
                                 <td>
                                     
                                     {{-- {{ route('about.delete',$about->id) }} --}}
                                     <a href="{{ route('service.edit',$service->id) }}" class="btn btn-info">Edit</a>
                                     <a href="{{ route('delete.service',$service->id) }}" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete ?')">Delete</a>
                                
                                </td>
                                
                                  
                            </tr>
                          @endforeach
                        </tbody>
                    </table>

                  
                </div>
              
            </div>
        </div>

 
        
    </div>
@endsection
