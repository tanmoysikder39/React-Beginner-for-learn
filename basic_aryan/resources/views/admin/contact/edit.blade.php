@extends('admin.admin_master')
 
 @section('admin')
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Edit Contact</h2>
                </div>
                <div class="card-body">
                    {{-- {{ route('store.contact') }} --}}
                   <form action="{{ route('update.contact',$Contact->id) }}" method="POST" >
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Address</label>
                            <textarea class="form-control"
                             id="exampleFormControlTextarea1"
                              rows="3" name="address">{{ $Contact->address }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input name="email" value="{{ $Contact->email }}" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Phone</label>
                            <input name="phone" type="text" value="{{ $Contact->phone }}" class="form-control" id="exampleFormControlInput1" placeholder="phone">
                        </div>
                       
                        
                        
                        
                       
                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Submit</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
 @endsection