<!-- Device Form content -->
<div class="device-bform">
    <div class="device-form row">
        <div class="label-div">
            <label class="device-label">Status</label>
        </div>
        <input type="text" class="device-input" id="status" data-color="green">
    </div>
    <div class="device-form">
        <div class="label-div">
            <label class="device-label">Registered</label>
        </div>
        <input type="text" class="device-input" id="registered">
    </div>
    <div class="device-form">
        <div class="label-div">
            <label class="device-label">Last Login</label>
        </div>
        <input type="text" class="device-input" id="lastlogin">
    </div>
    <div class="device-form">
        <div class="label-div">
            <label class="device-label">Phone Number</label>
        </div>
        <input type="text" class="device-input">
    </div>
    <div class="device-form">
        <div class="label-div">
            <label class="device-label">Name</label>
        </div>
        <input type="text" class="device-input">
    </div>
    <div class="device-form">
        <div class="label-div">
            <label class="device-label">ID</label>
        </div>
        <input type="text" class="device-input" id="Id">
    </div>
    <div class="device-form">
        <div class="label-div">
            <label class="device-label">Mobiletrac Version</label>
        </div>
        <input type="text" class="device-input" id="version">
    </div>

    <div class="device-form">
        <div class="label-div">
            <label class="device-label">Carrier Name</label>
        </div>
        <input type="text" class="device-input" id="carrier">
    </div>
    <div class="device-form">
        <div class="label-div">
            <label class="device-label">OS</label>
        </div>
        <input type="text" class="device-input" id="os">
    </div>
    <div class="device-form">
        <div class="label-div">
            <label class="device-label">Activation History</label>
        </div>
        <input type="text" class="device-input" id="activation">
    </div>
    <div class="device-form">
        <div class="label-div">
            <label class="device-label">Friendly Name</label>
        </div>
        <input type="text" class="device-input">
    </div>

    <div class="device-form checker">
        <div class="label-div">
            <label class="device-label">Use Zebra Printer</label>
        </div>
        <input type="checkbox" class="my-check">
        <label class="imp"> (Only for Parking Program) </label>
    </div>
    <div class="device-form checker">
        <div class="label-div">
            <label class="device-label">Require GPS</label>
        </div>
        <input type="checkbox" class="my-check" id="gps">
        <label class="imp"> (Prevents device use when GPS disabled) </label>
    </div>
    <div class="device-form checker">
        <div class="label-div">
            <label class="device-label">Use Autofocus</label>
        </div>
        <input type="checkbox" class="my-check" id="auto-focus">
        <label class="imp"> (Increases nighttime photo quality) </label>
    </div>
    <div class="device-form checker">
        <div class="label-div">
            <label class="device-label">Use Integrated <br> Barcode Scanner</label>
        </div>
        <input type="checkbox" class="my-check" id="barcode">
    </div>
    <label id="imp2"> WARNING Some device cameras maynot work with this turned on! </label>
    <div class="btn-5">
        <button class="save-button" id="btn4" type="button">Save Device</button>
        <button class="save-button" id="btn4" type="button">Deactivate Device</button>
    </div>
</div>
</div>