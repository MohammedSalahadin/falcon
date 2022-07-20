<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form">
    <form>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="exampleFormControlInput1">Report Type</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                        value="option1">
                    <label class="form-check-label" for="inlineRadio1">PDF 72 Hours</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                        value="option2" disabled>
                    <label class="form-check-label" for="inlineRadio2">CSV Not Available</label>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="exampleFormControlInput1">Start Date - End Date</label>
                <input class="form-control" type="text" name="dates">
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
    <h4>Property Checkpoint Timeline Report</h4>
    <p>This report will show a summary of the checkpoint activity on a Property within the selected amount of time. This
        report will show:
    </p>
    <ul>
        <li>Total Number of scans for each active checkpoint </li>
        <li>Total time between each checkpoint scan</li>
        <li>Total number of scans for the Property </li>
        <li>The overall checkpoint activity on a Property</li>
        <li> Address / Units </li>
        <li> Checkpoint Name </li>
        <li> Checkpoint Notes </li>
    </ul>
    <p style="color:red">
        NOTE: REQUIRES SILVERTRAC (ANDROID) V3.1x or HIGHER to REPORT CORRECTLY!
    </p>
    <p>
        Available in PDF ONLY
    </p>
</div>

<script>
$(document).ready(function() {
    $('.select2').select2();
});
$('input[name="dates"]').daterangepicker();
</script>