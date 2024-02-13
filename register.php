<!DOCTYPE html>
<html>

<?php
include 'header.php';
?>

<body>
    <div class="row text-white">
        <div class="col-xl-7">
            <img src="https://via.placeholder.com/573x480/?text=BANNER" alt="" class="w-100">
        </div>
        <div class="col-xl-5" style="padding-top:200px">
            <div class="w-50 mx-auto">
                <form action="register.php" method="post">
                    <h1 class="text-white mb-5 bl-1 pl-4">HORRORSCOPE</h1>
                    <div>
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="username">Email:</label>
                        <input type="text" id="username" name="username" required class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="password">Confirm Password:</label>
                        <input type="password" id="password" name="password" required class="form-control">
                    </div>
                    <div class="row mt-4 justify-content-center">
                        <div class="col-xl-6 mt-2">
                            <a href="login.php">คุณลงทะเบียนไว้แล้ว ?</a>
                        </div>
                        <div class="col-xl-6">
                            <button type="submit" class="btn btn-warning text-white rounded btn-block">เข้าสู่ระบบ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        <?php echo $message; ?>
    </script>

</body>

</html>