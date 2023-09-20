
@if (session()->has('shopping-list-saved'))
        <!-- Modal notification -->
    <div class="modal center-modal fade" id="modal-cart-saved" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Shopping List</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        {{session()->get('shopping-list-saved')}}
                    </p>

                </div>
                <div class="modal-footer modal-footer-uniform">
                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">ok</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal -->


    <script>
        $("#modal-cart-saved").modal("show");
    </script>
@endif









