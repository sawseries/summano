<?= LOGIN; ?>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script>
 $(document).ready(function () {
        $("#register-form").validate();
 });
</script>

<div class="login_bg" style="margin-top: 80px;">
    <div class="wrapper fadeInDown">
        <div id="formContent_register">
            <div class="fadeIn first">

<!--        <img src="https://www.starlighttv.net/images/login1.png" style="height:160px;" id="icon" alt="User Icon" />-->

            </div>

            <form id="register-form" method="POST" action="./?controller=Login&action=register">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

                <div style="margin:0.5em;border: 1px solid #ccc;background-color: #CCCCFF;padding: 1em;">
                    <table style="width: 100%;" class="table">


                        <tr>
                            <th style="width: 30%;">Username</th>
                            <td>
                                <input id="username" type="text" class="form-control" name="username" required>
                            </td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <td>
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                            </td>
                        </tr>
                        <tr>
                            <th>Confirm-Password</th>
                            <td>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirm" required autocomplete="new-password">
                            </td>
                        </tr>
                    </table>
                </div>

                <div style="margin:0.5em;border: 1px solid #ccc;background-color:#CCCCFF;padding: 1em;">
                    <table style="width: 100%;" class="table">
                        <tr>
                            <th style="width: 30%;">ชื่อ</th>
                            <td><input id="fname" type="text" class="form-control" name="fname" required></td>
                        </tr>
                        <tr>
                            <th>นามสกุล</th>
                            <td><input id="lname" type="text" class="form-control" name="lname" required></td>
                        </tr>
                        <tr>
                            <th>ตำแหน่ง</th>
                            <td> <input id="position" type="text" class="form-control" name="position" required></td>
                        </tr>
                        <tr>
                            <th>หน่วยงาน</th>
                            <td>
                                <select  id="department" name="department" required>
                                    <option value="นายก อบจ.">นายก อบจ.</option>
                                    <option value="สำนักปลัดฯ">สำนักปลัดฯ</option>
                                    <option value="กองกิจการสภาฯ">กองกิจการสภาฯ</option>
                                    <option value="กองแผนและงบประมาณ">กองแผนและงบประมาณ</option>
                                    <option value="กองคลัง">กองคลัง</option>
                                    <option value="กองช่าง">กองช่าง</option>
                                    <option value="กองการศึกษาฯ">กองการศึกษาฯ</option>
                                    <option value="กองพัสดุ และทรัพย์สิน">กองพัสดุ และทรัพย์สิน</option>
                                    <option value="กองส่งเสริมคุณภาพชีวิต">กองส่งเสริมคุณภาพชีวิต</option>
                                    <option value="หน่วยตรวจสอบภายใน">หน่วยตรวจสอบภายใน</option>
                                    <option value="โรงเรียนนิคมพัฒนาผัง 6">โรงเรียนนิคมพัฒนาผัง 6</option>
                                    <option value="เจ้าหน้าที่อื่น ๆ">เจ้าหน้าที่อื่น ๆ</option>
                                    <option value="ผู้ดูแลระบบ">ผู้ดูแลระบบ</option>
                                </select>

                            </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>
                                <input id="email" type="text" class="form-control" name="email" required>
                            </td>
                        </tr>
                    </table>
                </div>
                <center>
                    <br>
                    <input type="submit" class="fadeIn fourth" value="ลงทะเบียน">
                </center>
            </form>
            <!-- Remind Passowrd -->


        </div>
    </div>
</div>

