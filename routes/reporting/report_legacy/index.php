<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.jpg">

    <title>Falcontrac</title>
    <link rel="stylesheet" href="../../../assets/css/font-awesome.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../../../assets/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="css/owl.carousel.min.css"> -->
    <!-- <link rel="stylesheet" href="css/owl.theme.default.css"> -->
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/widgets.css">
    <link href="../../../assets/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../../../assets/css/daterangepicker.css" />
    <!-- site font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="icon" href="../../../assets/images/favicon.png">
    
</head>

<body>
    <?php
    require_once '../../../components/navbar.php';
    ?>

    <section class="report-section">

        <div class="report">
            <div class="col-12">
                <div class="report-title">
                    <h4>Reporting</h4>
                </div>
                <div class="forms">
                    <div class="row mb-4">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Choose Report</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="report_name">
                                    <option value="0">Choose Report</option>
                                    <option value="all_properties">All properites List</option>
                                    <option value="checkpoint_report">Checkpoints List</option>
                                    <option value="checkpoint_summary">Checkpoints Summary Report</option>
                                    <option value="checkpoint_timeline">Checkpoints Timeline Report</option>
                                    <option value="daily_activity">Daily Acivites Report</option>
                                    <option value="daily_activity_compact">Daily Acivity Report(compact)</option>
                                    <option value="daily_activity_grouped">Daily Acivity Report(Grouped)</option>
                                    <option value="issues_history">Issues History (with notes) </option>
                                    <option value="issues_history_without_notes">Issues History (without notes)
                                    </option>
                                    <option value="issues_summary_report">Issues Summary Report</option>
                                    <option value="issues_summary_report_top_10">Issues Summary Report Top 10</option>
                                    <option value="login_history_customers">Login History of Customers</option>
                                    <option value="login_history_employee">Login History of Employees</option>
                                    <option value="issue_time_slice">New Issues Timeslice</option>
                                    <option value="properity_profile">Propery Profile</option>
                                    <option value="property_task">Propery Tasks Report</option>
                                    <option value="registered_devices">Registred Devices</option>
                                    <option value="resident_list">Resident List</option>
                                    <option value="user_notification">User Notification</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row form-section">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- User Modal -->
    <?php require_once '../../../components/selectModal.php'; ?>


    <script src="../../../assets/js/jquery.min.js"></script>
    <script src="../../../assets/js/bootstrap.js"></script>
    <script src="../../../assets/js/select2.min.js"></script>
    <script src="../../../assets/js/moment.min.js"></script>
    <script src="../../../assets/js/daterangepicker.js"></script>

    <!-- jquery Code Start -->
    <script>
        $(document).ready(function() {
            $("select[name='report_name']").change(function() {
                var report_val = this.value;
                if (report_val != 0) {
                    $(".form-section").html(" ");
                    $(".form-section").append("<img src='images/loader.gif'  width='300px'/>");
                    $.get("reports_forms/" + report_val + ".php", function(data,
                        status) {
                        $(".form-section").html(data);
                    }).fail(function() {
                        alert('woops!! Something went wrong !!'); // or whatever
                        $(".form-section").html(" ");
                        $(".form-section").append(
                            "<div class='alert alert-danger' role='alert'>Something went wrong, please try again later !!</div>"
                        );
                    });
                }

            });
        });
    </script>

    <!-- list of users Script -->
    <script src="../../../assets/js/userSelect.js"></script>

</body>

</html>