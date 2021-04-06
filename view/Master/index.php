<?= HEADERS; ?>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<div class="container-fluid" style="padding-top: 5em;margin: 1em;">   

    <div class="col-md-12 col-lg-12 col-sm-12" style="background-color:transparent;padding:2em;">

        <div style="width:100%;text-align:right;padding: 1em;border: 1px solid #ADD8E6;background-color: #e4eefc;" title="เพิ่ม">
            <?= $sql; ?>
            <table style="width:100%;">
                <tr>
                    <td style="text-align:left;"> </td>
                    <td style="text-align:right;padding-right: 60px;">                      
                        <a class="btn btn-info" href="./?controller=master&action=getCreate" target="blnk"><b>+ เพิ่มรายชื่อใหม่</b></a>
                    </td>
                </tr>
            </table> 
        </div>



        <div style="width:100%;text-align:right;padding: 2em;border: 1px solid #ADD8E6;background-color:white;margin-top:10px;">
            <form enctype='multipart/form-data' method="get" action="">
                <table style="width:100%;">
                    <input type="hidden" class="form-control" id="controller"  name="controller" value="master" />
                    <input type="hidden" class="form-control" id="action"  name="action" value="search" />
                    <tr style="height:30px;">
                        <td style="text-align:center;width: 120px;">บัตรประชาชน</td>
                        <td style="text-align:right;">                      
                            <input type="text" class="form-control" id="iden"  name="iden" value="" />
                        </td>
                        <td style="text-align:center;width: 80px;">ชื่อ</td>
                        <td style="text-align:right;">                      
                            <input type="text" class="form-control" name="fname" value="">
                        </td>
                        <td style="text-align:center;width: 50px;">สกุล</td>
                        <td style="text-align:right;">                      
                            <input type="text" class="form-control" name="lname" value="">
                        </td>
                        <td style="text-align:center;width: 80px;padding: 0em;">วันที่เริ่มต้น</td>
                        <td style="text-align:right;">                      
                            <input type="text" class="form-control" name="datestart" id='datestart_picker' value="" autocomplete="off">
                        </td>
                        <td style="text-align:center;width: 80px;padding: 0em;">วันที่สิ้นสุด</td>
                        <td style="text-align:right;">                      
                            <input type="text" class="form-control" name="dateend" id='dateend_picker' value="" autocomplete="off">
                        </td>

                    </tr>
                    <tr style="height:30px;">
                        <td style="text-align:center;">ประเภทการบวช</td>
                        <td style="text-align:right;">                      
                            <select class="form-control" id='txttype' name='type'>
                                <option value="">กรุณาระบุ</option>
                                <option value="บวชชี">บวชชี</option>
                                <option value="บวชชีพราหมณ์">บวชชีพราหมณ์</option>
                                <option value="ศีล5">ศีล5</option>
                                <option value="ศีล8">ศีล8</option>
                            </select>
                        </td>
                        <td style="text-align:center;">สถานะ</td>
                        <td style="text-align:right;">                      

                            <select class="form-control" id='txtstatus' name="status">
                                <option value="0">กรุณาระบุ</option>    
                                <option value="1">อุปสมบท</option>
                                <option value="2">ลาสิกขา</option>
                            </select>
                        </td>
                        <td colspan="2"></td>

                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
                <center><input type="submit" value="ค้นหา"></center>
            </form>
        </div>





        <div style="overflow-x:auto;width:100%;background-color:transparent;">         
            <table style="width:100%;border: 1px solid #ccc;" border='1' class="styled-table">
                <thead>
                    <tr>
                        <th style="width:3%;">ลำดับ</th>
                        <th style="width:5%;">รูป</th>
                        <th style="width:10%;">บัตรปชช</th>
                        <th style="width:15%;">ชื่อ-สกุล(TH)</th>
                        <th style="width:15%;">ชื่อ-สกุล(EN)</th>
                        <th style="width:5%;">อายุ</th>
                        <th style="width:5%;">เพศ</th>

                        <th style="width:5%;">ประเภท</th>
                        <th style="width:7%;">วันที่-เวลา</th>
                        <th style="width:7%;">สถานะ</th>                           
                        <th style="width:8%;"></th>                            
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    if (!isset($_GET["page"])) {
                        $i = 1;
                    } else {
                        $i = (($_GET["page"] - 1) * 10) + 1;
                    }
                    ?>
                    <?php
                    if (count($lists) > 0)
                        foreach ($lists as $data) {
                            ?>

                            <tr id="tr_<?= $data["iden"]; ?>">
                                <td class="mobile_no"><?= $i++; ?></td>
                                <td>
                                    <div style="width:80px;height: 100px;padding: 0.5em;border: 1px dotted gray;float: left;">

                                        <?php
                                        if (file_exists("./storage/" . $data["pic"])) {
                                            $pathpic = "./storage/" . $data['pic'] . "";
                                            ?>

                                            <img src="<?= $pathpic; ?>" style="width:100%;"/>

                                        <?php } else { ?>
                                            <img src='./storage/user.jpg' style="width:100%;"/>       
                                        <?php } ?>
                                    </div>

                                </td>
                                <td><b><?= $data["iden"]; ?></b></td> 
                                <td><a href='./?controller=Master&action=getDetail&id=<?= $data["id"]; ?>' target="_blank"><?= $data["fname_TH"] . " " . $data["lname_TH"]; ?></a></td>
                                <td><a href='./?controller=Master&action=getDetail&id=<?= $data["id"]; ?>' target="_blank"><?= $data["fname_EN"] . " " . $data["lname_EN"]; ?></a></td>
                                <td><?= $data["Age"]; ?></td> 
                                <td><?= $data["sex"]; ?></td>
                                <td><?= $data["type"]; ?></td> 

                                <td><?= $data["datestart"]; ?></td>
                                <td style="padding:0em;text-align: center;">
                                    <div onclick="statuschange(<?= $data["id"]; ?>);"><?= checkstatus($data["status"]); ?> </div>
                                    <div id='ele_status_<?= $data["id"]; ?>' style="display:none;"> 
                                        <select class="form-control" id='SleStatus' onchange="updatestatus(this, '<?= $data["id"]; ?>');" name="SleStatus" style="width:90%;">           
                                            <?php
                                            for ($j = 1; $j <= 3; $j++) {
                                                if ($data["status"] == $j) {
                                                    ?>
                                                    <option value="<?= $j; ?>" selected><?= checkstatus($j); ?></option>
                                                <?php } else { ?> 
                                                    <option value="<?= $j; ?>"><?= checkstatus($j); ?></option>
                                                    <?php
                                                }
                                            }
                                            ?> 
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <a href='./?controller=Master&action=getDetail&id=<?= $data["id"]; ?>' target="_blank" class="btn btn-info">รายละเอียด</a>
                                </td>
                            </tr>
                            <?php
                        } else {
                        ?>
                        <tr>
                            <td colspan="10" style="text-align: center;">
                                <b>ไม่มีข้อมูล</b>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>       

        <?= $links; ?>


        <div style="overflow-x:auto;width:100%;background-color:transparent;">         
            <div class="col col-2">
                <div id="piechart"></div>
            </div>

            <div class="col col-2" style="height:430px;">

                <table id="q-graph">
                    <tbody>
                        <tr class="qtr" id="q1">
                            <th scope="row">Q1</th>
                            <td class="sent bar" style="height: 111px;"><p>$18,450.00</p></td>
                            <td class="paid bar" style="height: 99px;"><p>$16,500.00</p></td>
                        </tr>
                        <tr class="qtr" id="q2">
                            <th scope="row">Q2</th>
                            <td class="sent bar" style="height: 206px;"><p>$34,340.72</p></td>
                            <td class="paid bar" style="height: 194px;"><p>$32,340.72</p></td>
                        </tr>
                        <tr class="qtr" id="q3">
                            <th scope="row">Q3</th>
                            <td class="sent bar" style="height: 259px;"><p>$43,145.52</p></td>
                            <td class="paid bar" style="height: 193px;"><p>$32,225.52</p></td>
                        </tr>
                        <tr class="qtr" id="q4">
                            <th scope="row">Q4</th>
                            <td class="sent bar" style="height: 110px;"><p>$18,415.96</p></td>
                            <td class="paid bar" style="height: 195px;"><p>$32,425.00</p></td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th></th>
                            <th class="sent">Invoiced</th>
                            <th class="paid">Collected</th>
                        </tr>
                    </thead>

                </table>

                <div id="ticks">
                    <div class="tick" style="height: 59px;"><p>$50,000</p></div>
                    <div class="tick" style="height: 59px;"><p>$40,000</p></div>
                    <div class="tick" style="height: 59px;"><p>$30,000</p></div>
                    <div class="tick" style="height: 59px;"><p>$20,000</p></div>
                    <div class="tick" style="height: 59px;"><p>$10,000</p></div>
                </div>

            </div>

        </div>
    </div>
</div>

<?php require './app/Template/Footer.php'; ?>