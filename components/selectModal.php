<!-- Users Table Model Start -->
<div class="modal fade" id="user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Choose User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="user-form mb-3">
                    <form>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Search First/Last/Username</label>
                                <input type="name" class="form-control" name="user_name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Management Company</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="company_management">
                                    <option value="">choose</option>
                                    <option value="facebook">facebook</option>
                                    <option value="twitter">twitter</option>
                                    <option value="youtube">youtube</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Include</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input user_type" type="checkbox" id="inlineCheckbox1" value="Guards" name="user_type">
                                    <label class="form-check-label" for="inlineCheckbox1">Guards</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input user_type" type="checkbox" id="inlineCheckbox2" value="admin" name="user_type">
                                    <label class="form-check-label" for="inlineCheckbox2">Sup/Admins</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input user_type" type="checkbox" id="inlineCheckbox2" value="dispatcher" name="user_type">
                                    <label class="form-check-label" for="inlineCheckbox2">Dispatcher</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input user_type" type="checkbox" id="inlineCheckbox2" value="customer" name="user_type">
                                    <label class="form-check-label" for="inlineCheckbox2">Customers</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input user_type" type="checkbox" id="inlineCheckbox2" value="inactive" name="user_type">
                                    <label class="form-check-label" for="inlineCheckbox2">Inactive</label>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <hr>
                <div class="user-table">
                    <table class="table table-striped" id="users">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"></th>
                                <th scope="col">name</th>
                                <th scope="col">type</th>
                                <th scope="col">Status</th>
                                <th scope="col">Company</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody id="testBody"></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Users Table Model end -->

