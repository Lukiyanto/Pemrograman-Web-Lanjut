<?php include 'header.php' ?>

    <!-- form login -->
    <div class="page-login">
        
        <div class="box box-login">

            <div class="box-header text-center">
                Login
            </div>
            
            <!-- form login -->
            <div class="box-body">

                <?php
                    if(isset($_GET['msg'])){
                        echo "<div class='alert alert-error'>".$_GET['msg']."</div>";
                    } 
                ?>

                <form action="" method="POST">

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="user" placeholder="Username" class="input-control" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" placeholder="Password" class="input-control" required>
                    </div>

                    <input type="submit" name="submit" value="Login" class="button">
                </form>

                <?php
                    if(isset($_POST['submit'])) {
                        
                        $user = mysqli_real_escape_string($koneksi, $_POST['user']);
                        $pass = mysqli_real_escape_string($koneksi, $_POST['pass']);
                        
                        $cek = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username = '".$user."'");
                        if(mysqli_num_rows($cek) > 0){

                            $d = mysqli_fetch_object($cek);
                            if(md5($pass) == $d->password){

                                $_SESSION['status_login']   = true;
                                $_SESSION['uid']            = $d->id;
                                $_SESSION['uname']          = $d->nama;
                                $_SESSION['ulevel']         = $d->level;
                                $_SESSION['login']          = 1;

                                echo "<script>window.location = 'admin/index.php'</script>";
         
                            }else{
                                echo '<div class="alert alert-error">Password salah!!!</div>';
                            }

                        }else{
                            echo '<div class="alert alert-error">Username tidak ditemukan!!!</div>';
                        }
                    }
                ?>
            </div>

            <div class="box-footer text-center">
                <a href="index.php">Halaman Utama</a>
            </div>
        </div>

    </div>

<?php include 'footer.php' ?>