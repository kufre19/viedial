  <!-- Modal notification -->
  <div class="modal center-modal fade" id="modal-save-shopping-list" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Save Shopping List</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                   Great 😊, now at this point you've selected everything you need for you 
                   meal and can either build your meal now or come back later to your saved your shopping list 
                </p>

            </div>
            <div class="modal-footer modal-footer-uniform">
                <button type="button" class="btn btn-secondary float-right">Come Back Later</button>
                <a href="{{url('build-food/food-to-cook')}}" class="btn btn-secondary float-right" id="show-seasons">Build With This Now</a>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->