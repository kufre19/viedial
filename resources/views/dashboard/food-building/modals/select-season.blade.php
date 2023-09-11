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
          <button type="button" class="btn btn-secondary float-right" id="show-seasons" data-toggle="modal" data-target="#modal-select-season">Next</button>
        </div>
      </div>
    </div>
  </div>
<!-- /.modal -->

  <!-- Modal select season -->
  <div class="modal center-modal fade" id="modal-select-season" tabindex="-1">
    <div class="modal-dialog">
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
                <div class="box-body d-flex align-items-center">
                  <img src="{{asset('view_assets/images/food-seasons/season-tropical.jpeg')}}" alt="" class="align-self-end h-80 w-80">
                  <div class="d-flex flex-column flex-grow-1">
                    <h5 class="box-title font-size-16 mb-2">Tropical</h5>
                    <a href="#">Learn more</a>
                  </div>
                </div>
              </div>
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

  $("#show-seasons").click(function(){
      $("#modal-select-season-notification").hide();
      $("#modal-select-season").show();
      
  });

</script>