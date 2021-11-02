@extends('admin.admin_master')
 
 @section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
              <a href="{{ route('add.slider') }}"><button class="btn btn-info">Add Slider</button></a>
                <div class="col-md-12">
                    @if (session('success'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                      <strong>{{ session('success') }}</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <h4>All slider</h4>
                    <br>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">#</th>
                                <th scope="col"width="15%">Slider Title</th>
                                <th scope="col"width="25%">Slider Description</th>
                                <th scope="col"width="15%">Slider Image</th>
                                <th scope="col"width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                ($i =1)
                            @endphp
                          @foreach($sliders as $slider)
                           <tr>
                              
                               {{-- {{ $categories->firstItem()+$loop->index }} paginate serial maintain --}}
                                <th scope="row"> {{$i++}}</th>
                                <td>{{$slider->title}}</td>
                                <td>{{$slider->description}}</td>
                                <td><img src="{{ asset($slider->image) }}" style="height: 40px; width:70px"></td>
                              
                                 <td>
                                     <a href="{{ route('slider.edit',$slider->id) }}" class="btn btn-info">Edit</a>
                                     <a href="{{ route('slider.delete',$slider->id) }}" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete ?')">Delete</a>
                                
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
