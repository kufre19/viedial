  <!-- Modal notification -->
  <div class="modal center-modal fade" id="modal-complete-build" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Save Shopping List</h5>
                {{-- <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>
            <div class="modal-body">
                <p>
                   Awesome, now you can enjoy your meal 😋 but one more thing need from you, select the meal type below and 
                   click complete to save your meal built this can be used to track your caloric intake.
                </p>
                <h5 class="my-10">Select Meal Type</h5>
                <select class="selectpicker">
                    <option selected>BreakFast</option>
                    <option>Launch</option>
                    <option>Dinner</option>
                </select>

            </div>
            <div class="modal-footer modal-footer-uniform">
                {{-- <button type="button" class="btn btn-secondary float-right">Come Back Later</button> --}}
                <a href="{{url('build-food/complete-build')}}" class="btn btn-secondary float-right" id="show-seasons">Complete</a>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->




<script src="{{asset('view_assets/assets/vendor_components/select2/dist/js/select2.full.js')}}"></script>
<script>
$('.selectpicker').select2();
    // write js to save meal type when selection changes using ajax jquery

</script>