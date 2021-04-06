
<?= HEADERS; ?>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script>

    $(document).ready(function () {
        $("#edit-form").validate();
    });
    

</script>
<style>
    th{
  
    }
    
    tr{
        height: 50px;
    }

    #block{

    }
</style>
<div class="container">
    <div class="row" style="border:1px solid #ADD8E6;height:auto;padding: 5em;margin-top:10%;background-color: white;">
        <div style="text-align:right;">
            <form method="post" action="./?controller=master&action=deletes">
            <a onclick="showedit();" class="btn btn-info" id='btn_edit'>Edit</a>
            <a onclick="hideedit();" class="btn btn-default" style="display:none;" id='btn_cancel'>cancel</a>
            <button class="btn btn-info">Delete</button>
            <input type="hidden" class="form-control" id="ids" name="ids"   value="<?= $data["id"]; ?>">
            </form>
        </div>
        <div id="detail">

  

                <div class="form-group">
                    <label for="exampleFormControlInput1">รหัสบัตรประชาชน</label>
                    <?= $data["iden"]; ?>
                </div>
                <div class="form-group">

                    <label for="exampleFormControlInput1">รูป</label>
                    <div id="file_upload" style="width:100%;">
                        <div id="data_img" style="width:160px;height:200px;padding: 0.5em;border: 1px dotted gray;float: left;">
                              <?php
                                            if (file_exists("./storage/" . $data["pic"])) {
                                                $pathpic = "./storage/" . $data['pic'] . "";
                                                ?>

                                                <img src="<?= $pathpic; ?>" style="width:100%;"/>

                                            <?php } else { ?>
                                                <img src='./storage/user.jpg' style="width:100%;"/>       
                                            <?php } ?>
                           
                        </div>
                        <div style="float: left;padding: 0.5em;">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <table style="width:100%;" border="0">
                        <tr>
                            <th style="width:10%;">คำนำหน้าชื่อ (TH)</th>
                            <td style="width:15%;">
                                <?=$data["prename_TH"]; ?>
                            </td>
                            <th style="width:10%;">ชื่อ (TH) </th>
                            <td style="width:15%;">
                                <?=$data["fname_TH"]; ?>
                            </td>
                            <th style="width:10%;">นามสกุล (TH) </th>
                            <td style="width:15%;">
                                <?=$data["lname_TH"]; ?>
                            </td>
                        </tr>
                   
                        <tr>
                            <th style="width:13%;">คำนำหน้าชื่อ (EN)</th>
                            <td style="width:10%;">
                                <?=$data["prename_EN"]; ?>
                            </td>
                            <th>ชื่อ (EN) </th>
                            <td>
                                <?=$data["fname_EN"]; ?>
                            </td>
                            <th>นามสกุล (EN) </th>
                            <td>
                                <?= $data["lname_EN"]; ?>
                            </td>
                        </tr>
                         <tr>
                            <th>วันเกิด</th>
                            <td>
                                <?= $data["birthdate"]; ?>
                            </td>
                            <th>อายุ</th>
                            <td>
                                <?= $data["Age"]; ?>
                            </td>
                            <th>เพศ</th>
                            <td>
                                <?= $data["sex"]; ?>
                            </td>
                        </tr>
                         <tr style="height:80px;">
                            <th style="width:120px;">วันที่เริ่มต้น</th>
                            <td>
                                <?= $data["datestart"]; ?>

                            </td>
                            <th style="width:120px;">วันที่สิ้นสุด</th>
                            <td>
                                <?= $data["dateend"]; ?>
                            </td>

                            <th style="width:120px;">ประเภท </th>
                            <td>
                                <?= $data["type"]; ?>
                                

                            </td>
                        </tr> 
                        <tr>
                            <th>ผู้สามารถ<br>ติดต่อได้</th>
                            <td>
                                <?= $data["contNM"]; ?>
                            </td>
                            <th>เบอร์โทร</th>
                            <td>
                                <?= $data["contPH"]; ?>
                            </td>
                            <th>ความเกี่ยวข้อง</th>
                            <td>
                                <?= $data["contAbout"]; ?>
                            </td>
                        </tr>
                    </table>
                </div>
              
            <br><br>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">ที่อยู่</label>
                    <?= $data["Address"]; ?>
                </div> 
                <div class="form-group">
                    <label for="exampleFormControlInput1">เบอร์โทร</label>
                    <?= $data["phone"]; ?>
                </div>
               
               
               


                <div class="form-group">
                    <label for="exampleFormControlInput1">ผู้บันทึก </label>
                    <?= Auth::get("fullname"); ?>
                </div>
            <div class="form-group" style="padding:2em;background-color: #CCCCFF;">
                    <label for="exampleFormControlInput1">สถานะ</label>
                    <?= checkstatus($data["status"]); ?>
                     <select class="form-control" id='SleStatus' onchange="updatestatus(this,'<?= $data["id"]; ?>');" name="SleStatus" style="width:10%;">           
                                                <?php
                                                for ($j = 1; $j <= 3; $j++) {
                                                    if ($data["status"] == $j) {
                                                        ?>
                                                        <option value="<?=$j;?>" selected><?=checkstatus($j);?></option>
                                                    <?php } else { ?> 
                                                        <option value="<?=$j;?>"><?=checkstatus($j);?></option>
                                                        <?php
                                                    }
                                                }
                                                ?> 
                    </select>
                </div>
        </div>

        <div id="edit" style="display:none;">

            <form id="edit-form" class="form-horizontal" enctype='multipart/form-data' method="POST" action="./?controller=Master&action=edit">

                <div class="form-group">
                    <label for="exampleFormControlInput1">รหัสบัตรประชาชน</label>
                    <input type="text" class="form-control" id="txtiden" name="txtiden" placeholder="รหัสบัตรประชาชน" required value="<?= $data["iden"]; ?>" autocomplete="off">
                    <input type="hidden" class="form-control" id="hdnid" name="hdnid"  required value="<?= $data["id"]; ?>">
                    <input type="hidden" class="form-control" id="hdnfile" name="hdnfile"  required value="<?= $data["pic"]; ?>">
                </div>
                <div class="form-group">

                    <label for="exampleFormControlInput1">รูป</label>
                    <div id="file_upload" style="width:100%;">
                        <div id="data_img_edit" style="width:160px;height:200px;padding: 0.5em;border: 1px dotted gray;float: left;">
                              <?php
                                            if (file_exists("./storage/" . $data["pic"])) {
                                                $pathpic = "./storage/" . $data['pic'] . "";
                               ?>
                                            <img src="<?= $pathpic; ?>" style="width:100%;"/>
                                            <?php } else { ?>
                                                <img src='./storage/user.jpg' style="width:100%;"/>       
                                            <?php } ?>
                        </div>
                        <div style="float: left;padding: 0.5em;">
                            <a id='Add_file'><b>เพิ่มไฟล์แนบ</b></a>
                            <input type="file" onchange="filechangeedit(this);" name="uploadedFile">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <table style="width:100%;" border="0">
                        <tr>
                            <th style="width:13%;">คำนำหน้าชื่อ (TH)</th>
                            <td style="width:10%;">
                                <input type="text" class="form-control" id="prename_TH" name="prename_TH" required value="<?= $data["prename_TH"]; ?>">
                            </td>
                            <th>ชื่อ (TH) </th>
                            <td>
                                <input type="text" class="form-control" id="fname_TH" name="fname_TH" required value="<?= $data["fname_TH"]; ?>">
                            </td>
                            <th>นามสกุล (TH) </th>
                            <td>
                                <input type="text" class="form-control" id="lname_TH" name="lname_TH" required value="<?= $data["lname_TH"]; ?>">
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="form-group">
                    <table style="width:100%;" border="0">
                        <tr>
                            <th style="width:13%;">คำนำหน้าชื่อ (EN)</th>
                            <td style="width:10%;">
                                <input type="text" class="form-control" id="prename_EN" name="prename_EN" value="<?= $data["prename_EN"]; ?>" required>
                            </td>
                            <th>ชื่อ (EN) </th>
                            <td>
                                <input type="text" class="form-control" id="fname_EN" name="fname_EN" value="<?= $data["fname_EN"]; ?>" required>
                            </td>
                            <th>นามสกุล (EN) </th>
                            <td>
                                <input type="text" class="form-control" id="lname_EN" name="lname_EN" value="<?= $data["lname_EN"]; ?>" required >
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="form-group">
                    <table style="width:100%;" border="0">
                        <tr>
                            <th>วันเกิด</th>
                            <td>
                                <input type="text" class="form-control" id="birthdate_picker" name="birthdate" value="<?= $data["birthdate"]; ?>"  autocomplete="off">
                            </td>
                            <th>อายุ</th>
                            <td>
                                <input type="text" class="form-control" id="age" name="age" value="<?= $data["Age"]; ?>">
                            </td>
                            <th>เพศ</th>
                            <td>
                                <input type="text" class="form-control" id="sex" name="sex" value="<?= $data["sex"]; ?>">
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">ที่อยู่</label>
                    <textarea class="ckeditor form-control" name="address" style="height: 150px;" required><?= $data["Address"]; ?></textarea>
                </div> 
                <div class="form-group">
                    <label for="exampleFormControlInput1">เบอร์โทร</label>
                    <input type="text" class="form-control" id="txtphone" name="txtphone" value="<?= $data["phone"]; ?>" placeholder="เบอร์โทรศัพท์" required>
                </div>
                <div class="form-group">  
                    <table style="width:100%;" border="0">
                        <tr style="height:80px;">
                            <th style="width:120px;">วันที่เริ่มต้น</th>
                            <td>
                                <input type="text" id="datestart_picker" class="form-control" value="<?= $data["datestart"]; ?>" name="datestart"  autocomplete="off">
                                <br><input type="checkbox"> วันนี้
                            </td>
                            <th style="width:120px;">วันที่สิ้นสุด</th>
                            <td>
                                <input type="text" class="form-control" id="dateend_picker" name="dateend" value="<?= $data["dateend"]; ?>" autocomplete="off"> 
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
                                <input type="text" class="form-control" id="txtcontNM" value="<?= $data["contNM"]; ?>" name="txtcontNM" required>
                            </td>
                            <th>เบอร์โทร</th>
                            <td>
                                <input type="text" class="form-control" id="txtcontPH" name="txtcontPH" value="<?= $data["contPH"]; ?>" required>
                            </td>
                            <th>ความเกี่ยวข้อง</th>
                            <td>
                                <input type="text" class="form-control" id="txtcontAbout" name="txtcontAbout" value="<?= $data["contAbout"]; ?>" required>
                            </td>
                        </tr>
                    </table>
                </div>



                <div class="form-group">
                    <label for="exampleFormControlInput1">ผู้บันทึก </label>
                    <input type="text" class="form-control" id="txtuser" name="txtuser" required readonly value="<?= Auth::get("fullname"); ?>">
                </div>


                <center>
                    <button class="btn btn-info">แก้ไข</button>
                </center>
            </form>
        </div>
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




