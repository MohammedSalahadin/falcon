<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form">
    <form>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="exampleFormControlInput1">Report Type</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                        value="option1">
                    <label class="form-check-label" for="inlineRadio1">PDF Qr Code Every Label 22806</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                        value="option2" required>
                    <label class="form-check-label" for="inlineRadio2">CSV (Excel)</label>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="exampleFormControlSelect1">Choose property</label>
                <select class="form-control select2" multiple id="exampleFormControlSelect1" name="report_name"
                    required>
                    <option value="" disabled>Choose Report</option>
                    <option value="all_properties">All propertes</option>
                    <option value="2">Alpha Patrol</option>
                    <option value="3">Article Building</option>
                    <option value="4">Artivion</option>
                    <option value="5">Austin American States Man</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary float-right">Run Report</button>
    </form>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
    <h4>Property Set Checkpoints</h4>
    <p>This report shows ALL the set checkpoints or QR Scan points for each property in the system. This report is
        useful for identifying what checkpoints are currently set in the system and helps further identify where the
        checkpoint markers have been placed, should one need to be replaced. The follow report includes:
    </p>
    <ul>
        <li>Property Name</li>
        <li>Checkpoint Value </li>
        <li>Code </li>
        <li>Checkpoint Issue Name </li>
        <li> Address / Units </li>
        <li> Checkpoint Name </li>
        <li> Checkpoint Notes </li>
    </ul>
    <p>
        Available in CSV (Excel) ONLY
    </p>
</div>

<script>
$(document).ready(function() {
    $('.select2').select2();
});
</script>