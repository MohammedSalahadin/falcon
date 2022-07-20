<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form">
    <form>
        <div class="form-row">
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
            <div class="form-group col-md-12">
                <label for="exampleFormControlInput1">Report Type</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                        value="option1" disabled>
                    <label class="form-check-label" for="inlineRadio1">PDF Not Available</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                        value="option2">
                    <label class="form-check-label" for="inlineRadio2">CSV</label>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
    <h4>Properity Set Tasks</h4>
    <p>his report shows ALL the set tasks for each property in the system. This report is useful for identifying what
        task are currently set in the system and which property it is assigned to. The following report includes:
    </p>
    <ul>
        <li>Property Name </li>
        <li>Task Name</li>
        <li>Issue Type</li>
        <li>Name of Task</li>
        <li>Next Scheduled Issue Date</li>
        <li>Task Active or Inactive Date of Last Issued </li>
        <li>Task Days of Week</li>
        <li>Task is Set</li>
        <li> Address Associated to Set Task</li>
        <li>Created By</li>
        <li>Description of Task</li>

    </ul>
    <p> Available in CSV (Excel) ONLY
    </p>
</div>
<script>
$(document).ready(function() {
    $('.select2').select2();
});
</script>