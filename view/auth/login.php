
<?= LOGIN; ?>

<div class="login_bg">
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <div class="fadeIn first">

                <img src="https://www.starlighttv.net/images/login1.png" style="height:125px;width: 170px;" id="icon" alt="User Icon" />

            </div>

            <?php if (isset($fail)) { ?>
                <center><span style="color: red;"><b><?= $fail; ?></b></span></center>
            <?php }
            ?>

            <?php if (isset($success)) { ?>
                <center><span style="color:green;"><b><?= $success; ?></b></span></center>
            <?php }
            ?>    

            <form method="post" action="./?controller=Login&action=auth">
                <input type="text" id="login" class="fadeIn second" name="username" placeholder="login" required>
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>

            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a> |  <a class="underlineHover" href="./?controller=Login&action=getregister">Registers</a>
            </div>

        </div>
    </div>
</div> 

