@extends('admin.admin_master')
 
 @section('admin')
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Edit Slider</h2>
                </div>
                <div class="card-body">
                   <form action="{{ route('update.slider',$slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                         <input type="hidden" name="old_image" value="{{ $slider->image }}">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Slider Title</label>
                            <input name="title" type="text" value="{{ $slider->title }}" class="form-control"  placeholder="Slider Title"/>
                        </div>
                       
                        
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control"
                             id="exampleFormControlTextarea1"
                              rows="3" name="description">{{ $slider->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">image</label>
                            <input type="file"name="image" value="{{$slider->image }}" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                         <div class="form-group">
                                <img src="{{ asset($slider->image) }}" style="height:60px; width:80px">
                        </div>
                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Submit</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
 @endsection