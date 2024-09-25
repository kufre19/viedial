@extends('layouts.reg_and_login.app')

@section('main-content')
    <div class="col-12">
        <div class="row justify-content-center no-gutters">
            <div class="col-lg-5 col-md-5 col-12">
                <div class="box">
                    <div class="box-header with-border">
                      <h4 class="box-title">Upload Food Category</h4>
                    </div>
                    <!-- /.box-header -->
                    <form class="form" action="{{url('unknown/upload/path/food-cat')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label>Food Category Name</label>
                                <div class="input-group mb-3">                      
                                    <input type="text" name="name" class="form-control" placeholder="Category Name">
                                </div>
                            </div>
                            
                          
                            <div class="form-group">
                                <label>Image</label>
                                <div class="input-group mb-3">
                                    <input type="file" name="category_image" class="form-control">
                                </div>
                            </div>
                           
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                           
                            <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                              <i class="ti-save-alt"></i> Save
                            </button>
                        </div>  
                    </form>
                  </div>
            </div>
        </div>
    </div>
@endsection
