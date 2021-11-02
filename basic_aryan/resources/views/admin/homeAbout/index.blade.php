@extends('admin.admin_master')
 
 @section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
              <a href="{{ route('add.about') }}"><button class="btn btn-info">Add About</button></a>
                <div class="col-md-12">
                    @if (session('success'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                      <strong>{{ session('success') }}</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <h4>All About</h4>
                    <br>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">#</th>
                                <th scope="col"width="15%">About Title</th>
                                <th scope="col"width="25%">Short Description</th>
                                <th scope="col"width="15%">Long Description</th>
                                <th scope="col"width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                ($i =1)
                            @endphp
                          @foreach($abouts as $about)
                           <tr>
                              
                               {{-- {{ $categories->firstItem()+$loop->index }} paginate serial maintain --}}
                                <th scope="row"> {{$i++}}</th>
                                <td>{{$about->title}}</td>
                                <td>{{$about->short_des}}</td>
                                <td>{{$about->long_des}}</td>
                                
                              
                                 <td>
                                     
                                     {{-- {{ route('about.delete',$about->id) }} --}}
                                     <a href="{{ route('about.edit',$about->id) }}" class="btn btn-info">Edit</a>
                                     <a href="{{ route('delete.about',$about->id) }}" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete ?')">Delete</a>
                                
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
