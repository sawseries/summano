
<?= HEADER; ?>
<!--     <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>-->
<script>
    $(document).ready(function () {

        $(function () {
            $("#datestart_picker").datepicker();
        });
        $(function () {
            $("#dateend_picker").datepicker();
        });
        $(function () {
            $("#birthdate_picker").datepicker();
            ก
        });
    });
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
                '<td><img src="' + url + '" style="width:100%;height:100%;"></td>' +
                '</tr></table>');
        //$('#upload_').show();
        //$('#delete_').show();  
    }

</script>
<script>

    $(document).ready(function () {
        $("#create-form").validate();
    });

</script>
<style>
    th{
        text-align: center;
    }
</style>
<div class="container">
    <div class="row" style="border:1px solid #ADD8E6;height:auto;padding: 5em;margin-top:10%;background-color: white;">
        <form id="create-form" class="form-horizontal" enctype='multipart/form-data' method="POST" action="./?controller=Master&action=create">

            <div class="form-group">
                <label for="exampleFormControlInput1">รหัสบัตรประชาชน</label>
                <input type="text" class="form-control" id="txtiden" name="txtiden" placeholder="รหัสบัตรประชาชน" required autocomplete="off">
            </div>
            <div class="form-group">

                <label for="exampleFormControlInput1">รูป</label>
                <div id="file_upload" style="width:100%;">
                    <div id="data_img" style="width:160px;height:200px;padding: 0.5em;border: 1px dotted gray;float: left;">

                    </div>
                    <div style="float: left;padding: 0.5em;">
                        <a id='Add_file' onclick="additmfile();"><b>เพิ่มไฟล์แนบ</b></a>
                        <input type="file" onchange="filechange(this);" name="uploadedFile">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <table style="width:100%;" border="0">
                    <tr>
                        <th style="width:13%;">คำนำหน้าชื่อ (TH)</th>
                        <td style="width:10%;">
                            <input type="text" class="form-control" id="prename_TH" name="prename_TH" required value="">
                        </td>
                        <th>ชื่อ (TH) </th>
                        <td>
                            <input type="text" class="form-control" id="fname_TH" name="fname_TH" required value="">
                        </td>
                        <th>นามสกุล (TH) </th>
                        <td>
                            <input type="text" class="form-control" id="lname_TH" name="lname_TH" required value="">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="form-group">
                <table style="width:100%;" border="0">
                    <tr>
                        <th style="width:13%;">คำนำหน้าชื่อ (EN)</th>
                        <td style="width:10%;">
                            <input type="text" class="form-control" id="prename_EN" name="prename_EN" required>
                        </td>
                        <th>ชื่อ (EN) </th>
                        <td>
                            <input type="text" class="form-control" id="fname_EN" name="fname_EN" required>
                        </td>
                        <th>นามสกุล (EN) </th>
                        <td>
                            <input type="text" class="form-control" id="lname_EN" name="lname_EN" required >
                        </td>
                    </tr>
                </table>
            </div>
            <div class="form-group">
                <table style="width:100%;" border="0">
                    <tr>
                        <th>วันเกิด</th>
                        <td>
                            <input type="text" class="form-control" id="birthdate_picker" name="birthdate"  autocomplete="off">
                        </td>
                        <th>อายุ</th>
                        <td>
                            <input type="text" class="form-control" id="age" name="age">
                        </td>
                        <th>เพศ</th>
                        <td>
                            <input type="text" class="form-control" id="sex" name="sex">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">ที่อยู่</label>
                <textarea class="ckeditor form-control" name="address" style="height: 150px;" required></textarea>
            </div> 
            <div class="form-group">
                <label for="exampleFormControlInput1">เบอร์โทร</label>
                <input type="text" class="form-control" id="txtphone" name="txtphone" placeholder="เบอร์โทรศัพท์" required>
            </div>
            <div class="form-group">  
                <table style="width:100%;" border="0">
                    <tr style="height:80px;">
                        <th style="width:120px;">วันที่เริ่มต้น</th>
                        <td>
                            <input type="text" id="datestart_picker" class="form-control"  name="datestart"  required autocomplete="off">
                            <br><input type="checkbox"> วันนี้
                        </td>
                        <th style="width:120px;">วันที่สิ้นสุด</th>
                        <td>
                            <input type="text" class="form-control" id="dateend_picker" name="dateend" required autocomplete="off"> 
                            <br><input type="checkbox"> ยังไม่กำหนด
                        </td>

                        <th style="width:120px;">ประเภท </th>
                        <td>
                            <select class="form-control" id='txttype' name='txttype'>
                                <option value="บวชชี">บวชชี</option>
                                <option value="บวชชีพราหมณ์">บวชชีพราหมณ์</option>
                                <option value="ศีล5">ศีล5</option>
                                <option value="ศีล8">ศีล8</option>
                            </select>

                        </td>
                    </tr> 
                    <tr>
                        <th>ผู้สามารถ<br>ติดต่อได้</th>
                        <td>
                            <input type="text" class="form-control" id="txtcontNM" name="txtcontNM" required>
                        </td>
                        <th>เบอร์โทร</th>
                        <td>
                            <input type="text" class="form-control" id="txtcontPH" name="txtcontPH" required>
                        </td>
                        <th>ความเกี่ยวข้อง</th>
                        <td>
                            <input type="text" class="form-control" id="txtcontAbout" name="txtcontAbout" required>
                        </td>
                    </tr>
                </table>
            </div>



            <div class="form-group">
                <label for="exampleFormControlInput1">ผู้บันทึก </label>
                <input type="text" class="form-control" id="txtuser" name="txtuser" required readonly value="<?= Auth::get("fullname"); ?>">
            </div>


            <center>
                <button class="btn btn-info">บันทึก</button>
            </center>
        </form>
    </div>
</div>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">


                            CKEDITOR.editorConfig = function (config) {
                                config.language = 'es';
                                config.uiColor = '#F7B42C';
                                config.height = 300;
                                config.toolbarCanCollapse = true;
                            };
</script>




