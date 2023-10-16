  <!-- Modal notification -->
  <div class="modal center-modal fade" id="modal-select-season-notification" tabindex="-1">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Select Season</h5>
                  <button type="button" class="close" data-dismiss="modal">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <p>
                      Choose foods that are affordable, currently in season and enjoyable. You can get almost every
                      type of food all year round, but the prices may increase when they are not in season.
                      At that point, you may need to consider more affordable options that fit better with your budget.
                  </p>

              </div>
              <div class="modal-footer modal-footer-uniform">
                  <a href="{{route("food-to-cook")}}" class="btn btn-secondary float-right">Next</a>
              </div>
          </div>
      </div>
  </div>
  <!-- /.modal -->

  <!-- Modal select season -->
  <div class="modal  center-modal fade" id="modal-select-season" tabindex="-1">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Select Season</h5>
                  <button type="button" class="close" data-dismiss="modal">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>

              <div class="modal-body">
                  <div class="row">
                      @foreach ($seasons as $season)
                          <div class="col-lg-4 col-sm-6 food-season">
                              <a href="{{ url('build-food/start/food-seasons') . "/". $season->id }}">
                                  <div class="card pull-up">
                                      <img class="card-img-top"
                                          src="{{ asset('view_assets/images/food-seasons') ."/".$season->image }}"
                                          alt="Card image cap">
                                      <div class="card-body">
                                          <h4 class="card-title"> {{$season->name}}</h4>

                                      </div>

                                  </div>
                              </a>
                          </div>
                      @endforeach
                  </div>
              </div>

              <div class="modal-footer modal-footer-uniform">
                  <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
              </div>
          </div>
      </div>
  </div>
  <!-- /.modal -->



  <script>
      $("#show-seasons").click(function() {

          $("#modal-select-season-notification").modal("hide");
          $("#modal-select-season").modal("show");

      });
  </script>
