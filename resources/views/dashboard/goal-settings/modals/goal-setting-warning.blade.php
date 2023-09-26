  <!-- Modal -->
  <div class="modal center-modal fade" id="modal-weight-goal-error" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Weight Goal</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    We recommend that you set a realistic weight loss goal. Don’t make it too low and don’t
                    make it too high. We recommend that you should not exceed more than 1.5 kg/week. This is because
                    there are lot of factors that affect your ability to lose weight as planned. Setting a very high
                    target for
                    weight loss may put your body under undue stress. It also makes it difficult for you to build
                    healthy habits that will enable you sustain this weight loss for the rest of your life.
                </p>

            </div>
            <div class="modal-footer modal-footer-uniform">
                <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Change</button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->

<!-- Modal -->
<div class="modal center-modal fade" id="modal-goal-setting-warning" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Goal Settings</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                <ul>
                    <li>
                        Your healthy weight should be xxxx
                    </li>
                    <li>
                        We encourage you to lose at least 10% of your current weight to reduce your cardiovascular 
                        risk factors as soon as possible. Losing at least 10% of your current weight will reduce your 
                        blood pressure, your blood sugar, and your blood cholesterol. 
                        It will also improve your chances of living longer in good health. 
                    </li>
                    <li>
                        As soon as you achieve this, we encourage you to work hard to achieve your healthy weight to 
                        further reduce these risk factors and stay healthier for a long time. 
                    </li>
                </ul>
                </p>
               
            </div>
            <div class="modal-footer modal-footer-uniform">
                <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->



<script>
$(document).ready(function(){
    // Show the modal when the page is loaded
    $('#modal-goal-setting-warning').modal("show");

    
});
</script>
