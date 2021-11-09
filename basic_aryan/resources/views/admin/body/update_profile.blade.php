 @extends('admin.admin_master')
 
 @section('admin')
<div class="col-lg-12">
									

    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>User  Profile Update</h2>
        </div>
        @if (session('success'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                      <strong>{{ session('success') }}</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
        <div class="card-body">
            <form method="POST" action="{{ route('user.profile.update') }}" class="form-pill">
                @csrf
                
                <div class="form-group">
                    <label for="exampleFormControlInput3">User Name</label>
                    <input type="text" value="{{ $user->name }}" name="name" class="form-control" >
                   
                </div>
                {{-- {{ $user->name }} and {{ $user['name'] }} same jinis  --}}
                 <div class="form-group">
                    <label for="exampleFormControlInput3">User Email</label>
                    <input type="text" value="{{ $user['email'] }}" name="email" class="form-control" >
                   
                </div>
                
               
                
              <button type="submit" class="btn btn-success ">Update</button>
            </form>
        </div>
    </div>


</div>

 @endsection