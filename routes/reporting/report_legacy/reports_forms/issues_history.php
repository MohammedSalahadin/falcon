<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form">
    <form>
        <div class="form-row">

            <div class="form-group col-md-12">
                <label for="exampleFormControlInput1">Start Date - End Date</label>
                <input class="form-control" type="text" name="dates">
            </div>
            <div class="form-group col-md-12">
                <label for="exampleFormControlSelect1">Choose property</label>
                <select class="form-control select2" multiple name="report_name" required>
                    <option value="" disabled>Choose Report</option>
                    <option value="all_properties">All propertes</option>
                    <option value="2">Alpha Patrol</option>
                    <option value="3">Article Building</option>
                    <option value="4">Artivion</option>
                    <option value="5">Austin American States Man</option>
                </select>
            </div>
            <div class="form-group col-md-12">
                <label for="exampleFormControlSelect1">property group</label>
                <select class="form-control" name="report_name" required>
                    <option value="all_properties">All propertes</option>
                    <option value="2">item 1</option>
                    <option value="2">item 2</option>
                    <option value="2">item 3</option>
                </select>
            </div>
            <div class="form-group col-md-12">
                <label for="exampleFormControlSelect1">user Name</label>

                <div class="input-group">
                    <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Username"
                        aria-describedby="validationTooltipUsernamePrepend" name="user_name" required value="">
                    <div class="input-group-prepend mr-2">
                        <button type="button" class="btn btn-danger" onclick="reset_user_input()">X</button>
                    </div>
                    <a data-toggle="modal" href="#user_modal" class="btn btn-primary">choose</a>
                </div>

                <!-- <div class="col-md-3">

                </div> -->
            </div>
            <div class="form-group col-md-12">
                <label for="exampleFormControlInput1" class="mr-2">Include Issues Levels :</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                    <label class="form-check-label" for="inlineCheckbox1">level 1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                    <label class="form-check-label" for="inlineCheckbox2">level 2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                    <label class="form-check-label" for="inlineCheckbox2">level 3</label>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="exampleFormControlInput1" class="mr-2">Include Issues Types :</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                    <label class="form-check-label" for="inlineCheckbox1">Security</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                    <label class="form-check-label" for="inlineCheckbox2">Parking</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                    <label class="form-check-label" for="inlineCheckbox2">Maintanance</label>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="exampleFormControlInput1" class="mr-2">Urgent Issues :</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                        value="option1">
                    <label class="form-check-label" for="inlineRadio1">Both</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                        value="option2">
                    <label class="form-check-label" for="inlineRadio2">Non Urgent</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                        value="option2">
                    <label class="form-check-label" for="inlineRadio2">Urgent</label>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="exampleFormControlInput1" class="mr-2">Report Type :</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="report_type" id="pdf1" value="option1">
                    <label class="form-check-label" for="pdf1">PDF (31 Days Max)</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="report_type" id="csv" value="option2" disabled>
                    <label class="form-check-label" for="csv">CSV Not Available</label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary float-right">Run Report</button>
    </form>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
    <h4>Issue History (With Notes )</h4>
    <p>This report is similar to a Daily Acitvity report with a few exceptions:
    </p>
    <ul>
        <li>Only available in CVS (Excel) Format </li>
        <li>Enables a search by a specific Username</li>
        <li>This report has the following individual search</li>
        <li>Choose: Levels 1, 2, 3 or ALL</li>
        <li>Choose: Security, Parking, Maintenance or ALL</li>
        <li>Choose: To Include Urgent or Non-Urgent Issues or Both </li>
        <li>Choose: Property Group name search Optional
            to narrow down search criteria)</li>
    </ul>

    <p>Note:</p>
    <p> Depending on the timeline chosen, this report will be limited to a maximum amount of issues per report. If you
        encounter a report that does not include ALL of your data search perameters, you will have to run another report
        and shorten the date perameters.Available in CSV (Excel) Format ONLY.
    </p>
    <p style="color:red">Maximum Issues for this Report is 20,000</p>

</div>

<script>
$(document).ready(function() {
    $('.select2').select2();
    $('input[name="dates"]').daterangepicker();
});
</script>