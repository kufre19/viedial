@extends('layouts.dashboard.app')


@section('main-content')
    <div class="content-wrapper">
        <div class="container-full">

            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Shopping List</h3>
                        {{-- <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item" aria-current="page">e-Commerce</li>
                                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                                </ol>
                            </nav>
                        </div> --}}
                    </div>

                </div>
            </div>
            <!-- Main content -->
            <section class="content">
                <div class="row d-flex justify-content-center text-center fx-element-overlay">
                
                        <div class="col-12 col-lg-8">
                          <div class="box">
                            <div class="box-header bg-viedial-theme">
                              <h4 class="box-title text-white"><strong>Your Shopping List</strong></h4>
                            </div>
          
                            <div class="box-body">
                              <div class="table-responsive">
                                  <table class="table product-overview">
                                      <thead>
                                          <tr>
                                              <th>Food Item</th>
                                              <th>Serving Info</th>
                                              <th>Number Of Serving </th>
									          <th style="text-align:center">Total Calories</th>
                                              <th style="text-align:center">Action</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <td><img src="{{ asset('view_assets/images/food/vegetables/greenwhite-cabbage.png') }}" alt="" width="80"></td>
                                              <td>
                                                  <h5>Food Item Name</h5>
                                                  <p>maybe some info here</p>
                                              </td>
                                             
                                              <td width="70">
                                                  <input type="number" class="form-control" placeholder="1" min="0" max="5">
                                              </td>
									          <td width="100" align="center" class="font-weight-900">20 calories</td>
                                            
                                              <td align="center"><a href="javascript:void(0)" class="btn btn-circle btn-danger btn-xs" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash"></i></a></td>
                                          </tr>
                        
                                        					
                                      </tbody>
                                  </table>
                                  <a href="#" class="btn btn-success pull-right pull-up"><i class="fa fa fa-pot-food"></i> Build With This Now</a>
                                  <a href="{{ url('build-food/start/tropical') }}" class="btn btn-info pull-up"><i class="fa fa-arrow-left"></i> Keep Adding To Shopping List</a>
                              </div>
          
                            </div>
                          </div>
                        </div>
          
                       
                  
          

                </div>
               
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection


@section('modals')
    @include('dashboard.food-building.modals.select-season')
@endsection

@section('extra_js')
   
@endsection
