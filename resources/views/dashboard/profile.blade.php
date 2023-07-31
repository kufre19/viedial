@extends('layouts.dashboard.app')


@section('main-content')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row justify-content-center">
                    <div class="col-12 ">
                        <div class="box box-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-black"
                                style="background: url({{ asset('view_assets/images/gallery/full/10.jpg') }}) center center;">
                                <h3 class="widget-user-username">Michael Jorden</h3>
                                {{-- <h6 class="widget-user-desc">Designer</h6> --}}
                            </div>
                            <div class="widget-user-image">
                                <img class="rounded-circle" src="{{ asset('view_assets/images/user3-128x128.jpg') }}"
                                    alt="User Avatar">
                            </div>
                            
                        </div>
                        <div class="box">
                            <div class="box-body box-profile">
                                <div class="row">
                                    <div class="col-12">
                                        <div>
                                            <p>Email :<span class="text-gray pl-10">David@yahoo.com</span> </p>
                                            <p>Phone :<span class="text-gray pl-10">+11 123 456 7890</span></p>
                                            <p>Address :<span class="text-gray pl-10">123, Lorem Ipsum, Florida, USA</span>
                                            </p>
                                        </div>
                                    </div>
                                   
                                    <div class="col-12">
                                        <div class="box">
                                            <div class="box-header with-border">
                                              <h4 class="box-title">Edit Personal Info</h4>
                                            </div>
                                            <!-- /.box-header -->
                                            <form class="form">
                                                <div class="box-body">
                                                    <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Personal Info</h4>
                                                    <hr class="my-15">
                                                    <div class="row">
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label>First Name</label>
                                                          <input type="text" class="form-control" placeholder="First Name">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label>Last Name</label>
                                                          <input type="text" class="form-control" placeholder="Last Name">
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label >E-mail</label>
                                                          <input type="text" class="form-control" placeholder="E-mail">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label >Contact Number</label>
                                                          <input type="text" class="form-control" placeholder="Phone">
                                                        </div>
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
                            <!-- /.box-body -->
                        </div>
                      
                      

                    </div>
                </div>

            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection
