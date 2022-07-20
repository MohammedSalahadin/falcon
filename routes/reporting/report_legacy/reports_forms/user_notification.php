<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form">
    <form>
        <div class="form-group row">
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
            <div class="col-sm-4">
                <label for="exampleFormControlInput1">Report Type</label>
            </div>
            <div class="col-sm-8">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                        value="option1">
                    <label class="form-check-label" for="inlineRadio1">PDF</label>
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
    <h4>User Notification</h4>
    <p>user notification report
    </p>
</div>

<script>
$('input[name="dates"]').daterangepicker();
$('.select2').select2();
</script>