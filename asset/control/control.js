 $(document).ready(function () {

          $('#chkdatestart').click(function(){
            if($(this).prop("checked") == true){
                today();
            }
            else if($(this).prop("checked") == false){
               $("#datestart_picker").val("");
            }
        }); 
         
           $('#chkdateend').click(function(){
            if($(this).prop("checked") == true){
                $("#dateend_picker").val("0000-00-00");
            }
            else if($(this).prop("checked") == false){
               $("#dateend_picker").val("");
            }
        }); 

        $(function () {
            $("#datestart_picker").datepicker({dateFormat: 'yy-mm-dd'});
            $("#dateend_picker").datepicker({dateFormat: 'yy-mm-dd'});
            $("#birthdate_picker").datepicker({dateFormat: 'yy-mm-dd'});
        });
        
    
    });
    

 

   
 
 
    function statuschange(id){
       $("#ele_status_"+id).toggle();
    }

    function updatestatus(status, ids) {  
        
        $.ajax({
            url: "./?controller=master&action=updatestatus",
            type: "POST",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                id: ids,
                status: status.value.toString(),
            },
            success: function (data) {
               // alert(data);
               window.location.reload(true);

            },
        });
    }
    
        function filechange(value) {

        var file = value.files[0];


        if (file.type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
            url = "https://i.pinimg.com/originals/26/09/15/26091578585df6a983c5dae7af5d80a0.png";
        } else if (file.type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
            url = "https://www.churchatthebutte.com/hp_wordpress/wp-content/uploads/2020/04/microsoft-word-2019-05-01.png";
        } else if (file.type == "application/pdf") {
            url = "https://pics.freeicons.io/uploads/icons/png/15519179861536080156-512.png";
        } else if (file.type.split('/')[0] == "image") {
            var url = URL.createObjectURL(file);
        } else {
            url = "https://images-na.ssl-images-amazon.com/images/I/5109SEPU79L.png";
        }

        $('#data_img').html("");
        $('#data_img').append('<table><tr>' +
                '<td><img src="' + url + '" style="width:150px;height:180px;"></td>' +
                '</tr></table>');
    }
    
    
     function filechangeedit(value) {
   

        var file = value.files[0];


        if (file.type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
            url = "https://i.pinimg.com/originals/26/09/15/26091578585df6a983c5dae7af5d80a0.png";
        } else if (file.type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
            url = "https://www.churchatthebutte.com/hp_wordpress/wp-content/uploads/2020/04/microsoft-word-2019-05-01.png";
        } else if (file.type == "application/pdf") {
            url = "https://pics.freeicons.io/uploads/icons/png/15519179861536080156-512.png";
        } else if (file.type.split('/')[0] == "image") {
            var url = URL.createObjectURL(file);
        } else {
            url = "https://images-na.ssl-images-amazon.com/images/I/5109SEPU79L.png";
        }

        $('#data_img_edit').html("");
        $('#data_img_edit').append('<table><tr>' +
                '<td><img src="' + url + '" style="width:150px;height:170px;"></td>' +
                '</tr></table>'); 
    }
    
        function hideedit() {

        $("#detail").fadeIn();
        $("#edit").hide();

        $("#btn_edit").fadeIn();
        $("#btn_cancel").hide();

    }
    
    




    function del(id) {

        $.ajax({
            url: "./?controller=master&action=deletes",
            type: "POST",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                //_token: $("#csrf").val(),
                ids: id
            },
            success: function (data) {
            
                //$("#tr_" + code).fadeOut();
            },
        });
    }

   
  function showedit() {

        $("#detail").hide();
        $("#edit").fadeIn();

        $("#btn_edit").hide();
        $("#btn_cancel").fadeIn();

    }


