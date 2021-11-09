@extends('admin.admin_master')
 
 @section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
              {{-- <a href="{{ route('add.contact') }}"><button class="btn btn-info">Add Contact</button></a> --}}
                <div class="col-md-12">
                    @if (session('success'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                      <strong>{{ session('success') }}</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <h4>All Message</h4>
                    <br>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">#</th>
                                <th scope="col"width="15%">Name</th>
                                <th scope="col"width="25%">Email</th>
                                <th scope="col"width="15%">Subject</th>
                                <th scope="col"width="15%">Message</th>
                                <th scope="col"width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                ($i =1)
                            @endphp
                          @foreach($allmsg as $allmsg)
                           <tr>
                              
                               {{-- {{ $categories->firstItem()+$loop->index }} paginate serial maintain --}}
                                <th scope="row"> {{$i++}}</th>
                                <td>{{$allmsg->name}}</td>
                                <td>{{$allmsg->email}}</td>
                                <td>{{$allmsg->subject}}</td>
                                <td>{{$allmsg->message}}</td>
                                
                              
                                 <td>
                                     
                                     {{-- {{ route('contact.delete',$contact->id) }} --}}
                                     {{-- <a href="{{ route('contact.edit',$contact->id) }}" class="btn btn-info">Edit</a>/ --}}
                                     <a href="{{ route('delete.message',$allmsg->id) }}" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete ?')">Delete</a>
                                
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
