@extends('layouts.reg_and_login.app')

@section('main-content')
    <div class="col-12">
        <div class="row justify-content-center no-gutters">
            <div class="col-lg-5 col-md-5 col-12">
                <div class="box">
                    <div class="box-header with-border">
                      <h4 class="box-title">Upload Food Items</h4>
                    </div>
                    <!-- /.box-header -->
                    <form class="form" action="{{url('unknown/upload/path')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label>Food Title</label>
                                <div class="input-group mb-3">
                                    
                                    <input type="text" name="name" class="form-control" placeholder="Food Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Food CAt</label>
                                <div class="input-group mb-3">
                                    
                                    <select name="food_category_id" class="form-control  select2" style="width: 100%;" name="" id="">
                                        <option >Select Food Category</option>
                                        @foreach ($food_cats as $food_cat)
                                            <option value="{{$food_cat->id}}">{{$food_cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Caories</label>
                                <div class="input-group mb-3">                                    
                                    <input type="text" name="calories" class="form-control" placeholder="Calories">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Carbs</label>
                                <div class="input-group mb-3">
                                    
                                    <input type="text" name="carbs" class="form-control" placeholder="Carbs">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <div class="input-group mb-3">
                                    <input type="file" name="food_image" class="form-control">
                                    
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
