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
                        value="option1">
                    <label class="form-check-label" for="inlineRadio1">PDF</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                        value="option2" disabled>
                    <label class="form-check-label" for="inlineRadio2">CSV Not Available</label>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
    <h4>Properity Profile</h4>
    <p>This report shows a complete detail of ALL the property information as entered by a system administrator
        including:
    </p>
    <ul>
        <li>Property Photo </li>
        <li> Active Programs</li>
        <li>Percent of Issues Graph</li>
        <li>Property Notes/Post Order Details </li>
        <li> Property Addresses / Unit Numbers </li>
        <li>Assigned Property Issue Types </li>
        <li>Property Locations </li>
        <li> Property Tasks</li>
        <li>Property Checkpoints (OR)
            Available in PDF ONLY</li>
    </ul>
    <p>This report is NOT available to Customer Users
    </p>
</div>
<script>
$(document).ready(function() {
    $('.select2').select2();
});
</script>