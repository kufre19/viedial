@extends('layouts.dashboard.app')


@section('main-content')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xl-8">														
                        <div class="box no-shadow mb-0 bg-transparent">
                            <div class="box-header no-border px-0">
                                <h4 class="box-title">Set Your Goals</h4>							
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <a href="#" class="box pull-up">
                                    <div class="box-body">
                                        <div class="d-flex align-items-center">
                                            <div class="text-center ">											
                                                <span class="font-size-30 fa fa-apple-alt"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
                                            </div>
                                            <div class="ml-15">											
                                                <h5 class="mb-0">Build Your Meal</h5>
                                                <p class="text-fade font-size-12 mb-0">Make healthy meals to meet your healthy goals</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-12">
                                <a href="#" class="box pull-up">
                                    <div class="box-body">
                                        <div class="d-flex align-items-center">
                                            <div class=" text-center">											
                                                <span class="font-size-30 fa fa-clipboard"><span class="path1"></span><span class="path2"></span></span>
                                            </div>
                                            <div class="ml-15">											
                                                <h5 class="mb-0">Record Your Numbers</h5>
                                                <p class="text-fade font-size-12 mb-0">Keep Track of your health stats</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-12">
                                <a href="#" class="box pull-up">
                                    <div class="box-body">
                                        <div class="d-flex align-items-center">
                                            <div class="text-center">											
                                                <span class="font-size-30 fa fa-dumbbell"><span class="path1"></span><span class="path2"></span></span>
                                            </div>
                                            <div class="ml-15">											
                                                <h5 class="mb-0">Physical Activiites</h5>
                                                <p class="text-fade font-size-12 mb-0">set physical activies to help burn enough calories</p>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </a>
                            </div>
                           
                        </div>
                        
                    </div>
                </div>
                <div class="row d-flex justify-content-center text-center fx-element-overlay">
                    <div class="col-lg-6 col-12">
                        <div class="box">
                          <div class="box-header with-border">
                            <h4 class="box-title">Set Your Weight loss Goal(should be displayed if not entered before or if needed to be change)</h4>
                          </div>
                          <!-- /.box-header -->
                          <form class="form">
                              <div class="box-body">
                                  <h4 class="box-title text-info"><i class="ti-user mr-15"></i> About User</h4>
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
                                  <h4 class="box-title text-info"><i class="ti-envelope mr-15"></i> Contact Info & Bio</h4>
                                  <hr class="my-15">
                                  <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" placeholder="email">
                                  </div>
                                  <div class="form-group">
                                    <label>Website</label>
                                    <input class="form-control" type="url" placeholder="http://">
                                  </div>
                                  <div class="form-group">
                                    <label>Contact Number</label>
                                    <input class="form-control" type="tel" placeholder="Contact Number">
                                  </div>
                                  <div class="form-group">
                                    <label >Bio</label>
                                    <textarea rows="4" class="form-control" placeholder="Bio"></textarea>
                                  </div>
                              </div>
                              <!-- /.box-body -->
                              <div class="box-footer text-right">
                                  <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1">
                                    <i class="ti-trash"></i> Cancel
                                  </button>
                                  <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                                    <i class="ti-save-alt"></i> Save
                                  </button>
                              </div>  
                          </form>
                        </div>
                        <!-- /.box -->			
                  </div>

                </div>

            </section>
            <!-- /.content -->
        </div> 
    </div>
@endsection


@section('modals')
    {{-- @include('layouts.dashboard.modals.goal-settings.modal') --}}
@endsection
