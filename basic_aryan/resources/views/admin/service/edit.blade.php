@extends('admin.admin_master')
 
 @section('admin')
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Edit Service</h2>
                </div>
                <div class="card-body">
                   <form action="{{ route('update.service',$services->id) }}" method="POST" >
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Service Title</label>
                            <input name="title" value="{{ $services->title }}" type="text" class="form-control" id="exampleFormControlInput1" placeholder="about Title">
                        </div>
                       
                        
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Short Description</label>
                            <textarea class="form-control"
                             id="exampleFormControlTextarea1"
                              rows="3" name="short_des">{{ $services->short_des }}</textarea>
                        </div>
                       
                       
                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default">update</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
 @endsection