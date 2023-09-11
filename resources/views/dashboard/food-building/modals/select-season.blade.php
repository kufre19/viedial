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
                  <button type="button" class="btn btn-secondary float-right" id="show-seasons">Next</button>
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



                      <div class="col-lg-3 col-md-6 col-12">

                          <div class="box pull-up">
                              <div class="fx-card-item">
                                  <div class="fx-card-avatar fx-overlay-1">
                                      <a href="#">
                                          <img src="{{ asset('view_assets/images/food-seasons/season-tropical.jpeg') }}"
                                              alt="user" class="bbrr-0 bblr-0">

                                      </a>

                                  </div>
                                  <div class="fx-card-content d-flex align-content-center">
                                      <h4 class="box-title mb-0">
                                          <a href="#">
                                              Season Tropical
                                          </a>
                                      </h4>
                                  </div>
                              </div>
                          </div>
                          </a>
                      </div>

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
