


function AddressModal(PID){
    this.modal = `<!-- Users Table Model Start -->
    <div class="modal fade" id="addressModal_`+PID+`" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Choose User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick=" $('#addressModal_`+PID+`').modal('hide');">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick=" $('#addressModal_`+PID+`').modal('hide');">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Users Table Model end --> `;
    // return this.modal;
    // $('body').html(this.modal);
    // $('#addressModal_PID').modal('show');
    
}

