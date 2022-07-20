<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form">
    <form>
        <div class="form-group row">
            <div class="form-group col-md-12">
                <label for="exampleFormControlInput1">Begin Login Date - End Login Date</label>
                <input class="form-control" type="text" name="dates">
            </div>
            <div class="col-sm-4">
                <label for="exampleFormControlInput1">Report Type</label>
            </div>
            <div class="col-sm-8">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                        value="option1" disabled>
                    <label class="form-check-label" for="inlineRadio1">PDF Not Available</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                        value="option2" required>
                    <label class="form-check-label" for="inlineRadio2">CSV (Excel)</label>
                </div>
            </div>
            <div class="col-sm-12 mt-5">
                <button type="submit" class="btn btn-primary float-right">Run Report</button>
            </div>
        </div>
    </form>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
    <h4>Login History Of Customers</h4>
    <p>This report shows the log in history of ALL Customer Users in the system. This report is useful for identifying
        which Customer Users are logging in and using the system and which ones are not.
    </p>
    <p>The following report includes:
    </p>
    <ul>
        <li>Username </li>
        <li>Log in Date and Time</li>
        <li>Mobile Device Number </li>
        <li>User Type</li>
        <li> First Name</li>
        <li>Lastname </li>
        <li>Email </li>
        <li>Management Company Name </li>
    </ul>
    <p>Available in CVS (Excel) ONLY
    </p>
</div>
<script>
$('input[name="dates"]').daterangepicker();
</script>