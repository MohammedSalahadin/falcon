// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == document.getElementById("myModal")) {
      document.getElementById("myModal").style.display = "none";
    }
}
//to open the modal popup when "Add Number" button is clicked
function openModal(){
    document.getElementById('myModal').style.display = "block";
}

$(document).ready(function(){
    // when the device list is clicked, to fill up the form
    $("#devices").click(function () {
        $(this).css('background',$(this).attr('data-color'));
        handleClick()
    });
    // when the select drop down value is clicked, to fill up the form
    $('#device-selection').change(function(){ 
        var value = $(this).val();
        if(value=="(737) 346-2748 Abubaker"){
            handleClick()
        }
    });
});
// to handle display the input values of the form
function handleClick(){
        $('#status').val("Device Approved");
        $("#status").css('background',$("#status").attr('data-color'));
        $('#registered').val("Tue 3/15/2022 11:47:15 PM abdulmalek12")
        $('#lastlogin').val("Wed 3/16/2022 4:52:19 AM")
        $('#Id').val("82FFE525-9130-432B-81F7-1CF2FFFAC95A")
        $('#version').val("4.1.30")
        $('#carrier').val("AT&T")
        $('#os').val("iOS 15.4")
        $('#activation').val("Device Approved larryloera Mar 15 2022 11:49PM")
        $("#auto-focus").prop("checked", true)
        $("#barcode").prop("checked", true)
        $("#gps").prop("checked", true)
}