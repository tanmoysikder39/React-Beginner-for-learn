<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
              
                <div class="col-md-8">
                    @if (session('success'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>{{ session('success') }}</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <h1>All CAtegory</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">User</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                // ($i =1)
                            @endphp
                          @foreach($categories as $category)
                           <tr>
                               {{-- {{$i++}} --}}
                               {{-- {{ $categories->firstItem()+$loop->index }} paginate serial maintain --}}
                                <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->user->name}}</td>
                                <td>
                                    @if($category->created_at==NULL)
                                    <span class="text-danger">No Date Set</span>
                                    @else
                                    {{-- {{$category->created_at->diffForHumans()}} only for eom  --}}
                                    {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                                    @endif
                                </td>
                                 <td><a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-info">Edit</a></td>
                                 <td><a href="{{ url('softdelete/category/'.$category->id) }}" class="btn btn-danger">Delete</a></td>
                                  
                            </tr>
                          @endforeach
                        </tbody>
                    </table>

                    {{ $categories->links() }}
                </div>
                <div class="col-md-4"> 
                    <div class="card">
                      <form action="{{ url('/category/add') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text"name="category_name" class="form-control"
                             id="exampleInputEmail1" aria-describedby="emailHelp" />
                             @error('category_name')
                                <span class="text-danger">{{ $message }}</span>
                             @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>

 {{-- Trash Part  --}}
         <div class="container">
            <div class="row">
              
                <div class="col-md-8">
                   
                    <h1>Trash List</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">User</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                // ($i =1)
                            @endphp
                          @foreach($trachCat as $category)
                           <tr>
                               {{-- {{$i++}} --}}
                               {{-- {{ $categories->firstItem()+$loop->index }} paginate serial maintain --}}
                                <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->user->name}}</td>
                                <td>
                                    @if($category->created_at==NULL)
                                    <span class="text-danger">No Date Set</span>
                                    @else
                                    {{-- {{$category->created_at->diffForHumans()}} only for eom  --}}
                                    {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                                    @endif
                                </td>
                                 <td><a href="{{ url('category/restore/'.$category->id) }}" class="btn btn-info">Restore</a></td>
                                 <td><a href="{{ url('pdelete/category/'.$category->id) }}" class="btn btn-danger">Parmanent Delete</a></td>
                                  
                            </tr>
                          @endforeach
                        </tbody>
                    </table>

                    {{ $trachCat->links() }}
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
