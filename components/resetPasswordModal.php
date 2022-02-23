<!-- password rest modal  -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">resset password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- rest password modal start  -->
                <form class="rounded  w-100">
                    <div class="mb-3">
                        <label for="resetUsernameInput" class="form-label">username</label>
                        <input type="text" class="form-control" name="resetUsernameInput" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">phone number</label>
                        <input type="number" id="phoneNumber" class="form-control" minlength="11" name="phoneNumber"
                            placeholder="ex: 07701234567">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>

</div>
<!-- rest password modal end  --->