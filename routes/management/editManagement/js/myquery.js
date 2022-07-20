//Dummy data to populate edit mgt tab
$(document).ready(function(){
    $('#editCompany').change(function() { 
        let id = $(this).val();
        
        let mgtCompanyName = document.getElementById("mgtCompanyName");
        let tel = document.getElementById("tel");
        let fax = document.getElementById("fax");
        let url = document.getElementById("url");

        if(id === 'Choose') {
           $('#btn-addModal').hide();
           $('#btn-editModal').hide();
        }

        if(id === 'Hotel XYZ'){ 
            mgtCompanyName.value = 'Hotel XYZ';
            tel.value = '123456789'; 
            fax.value = '456782642';
            url.value = 'www.hotelxyz.com';
            $('.btn-addModal').show();
            $('.btn-editModal').show();  

        } else if(id === 'ABC Inc.') {
            mgtCompanyName.value = 'ABC Inc.';
            tel.value = '845789548'; 
            fax.value = '464563162';
            url.value = 'www.abcincorporated.com';
            $('.btn-addModal').show();
            $('.btn-editModal').show();  
        } else if(id === 'Sample Company') {
            mgtCompanyName.value = 'Sample Company';
            tel.value = '123456123'; 
            fax.value = '888888888';
            url.value = 'www.samplecompany.com';
            $('.btn-addModal').show();
            $('.btn-editModal').show();  
        }
    });
});

 