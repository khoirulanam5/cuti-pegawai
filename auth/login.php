<?php 
include '../config/config.php';
$pagedesc = "Login";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Sistem Informasi Cuti Karyawan Berbasis - <?php echo $pagedesc ?></title>

	<link href="<?= base_url()?>/assets/images/logo.png" rel="icon" type="images/x-icon">

	<!-- Bootstrap Core CSS -->
	<link href="<?= base_url()?>/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="<?= base_url()?>/assets/dist/css/offline-font.css" rel="stylesheet">
	<link href="<?= base_url()?>/assets/dist/css/custom.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="<?= base_url()?>/assets/fontawesome-free/css/fontawesome.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url()?>/assets/fontawesome-free/css/fontawesome.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url()?>/assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url()?>/assets/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
	
	<!-- jQuery -->
	<script src="<?= base_url()?>/assets/jquery/dist/jquery.min.js"></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body style="background-color:grey">

	<section id="main-wrapper" style="margin-top: 60px">
		<div class="container-fluid">
			
				<div id="page-wrapper" class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4" style="background-color:white; border-radius: 3px; webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05); box-shadow: 0 1px 1px rgba(0,0,0,.05)">
					<div class="row">
						<div class="col-lg-12">
							<br/>
							<center><img src="<?= base_url()?>/assets/images/logo.png" width="120" height="120"></center>
							<h2 class="text-center">Sistem Informasi Cuti Karyawan<br/> <b>Dinas Kesehatan Kabupaten Kudus</b></h2>
						</div>
					</div><!-- /.row -->
					<div class="row">
						<div class="col-lg-12">
						<?php //include("layout_alert.php"); ?>
							<div class="panel panel-default">
								<div class="panel-body">
                                    <?php
                                    if(isset($_POST['login'])){
                                        $username = $_POST['username'];
                                        $password = $_POST['password'];
                                        $akses = $_POST['akses'];

                                        $qLogin = mysqli_query($con, "SELECT * FROM user WHERE npp = '$username' AND pass = '$password' AND id_role = '$akses'") or die(mysqli_error($con));
                                        if(mysqli_num_rows($qLogin) > 0){
                                            $dtLogin = mysqli_fetch_array($qLogin);
                                            $_SESSION['user'] = $dtLogin['id_user'];
                                            if ($akses == 1) {
                                                echo "<script>window.location='" . base_url('my/pimpinan/index') . "';</script>";
                                            }
                                            if ($akses == 2) {
                                                echo "<script>window.location='" . base_url('my/admin/index') . "';</script>";
                                            }
                                            if ($akses == 3) {
                                                echo "<script>window.location='" . base_url('my/karyawan/index') . "';</script>";
                                            }
                                        }
                                        else{
                                            ?>
                                            <div class="alert alert-danger alert-dismissable" role="alert">
                                                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <span class="glyphicon glyphicon-exlamation-sign" aria-hidden="true"> </span>
                                                <strong>Login Gagal!</strong> Username / Password salah
                                            </div>
                                            <?php
                                        }
                                        
                                    }
                                    ?>
									<form action="" method="post">
										<div class="form-group">
											<input type="text" class="form-control" name="username" placeholder="Username" required>
										</div>
										<div class="form-group">
											<input type="password" class="form-control" name="password" placeholder="Password" required>
										</div>
										<div class="form-group">
											<select class="form-control" name="akses" required>
                                                <option value=""><b>Hak Akses</b></option>
                                                <?php
                                                $qRole = mysqli_query($con, "SELECT * FROM role");
                                                while($dtRole = mysqli_fetch_array($qRole)){
                                                    ?>
                                                    <option value="<?= $dtRole['id_role']?>"><?= $dtRole['role']?></option>
                                                    <?php
                                                }
                                                ?>
											</select>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-success btn-block" name="login" value="Masuk">
										</div>
									</form>
								</div>
							</div>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section>
	
	<!-- footer-bottom -->
	<div class="navbar navbar-inverse navbar-fixed-bottom footer-bottom">
		<div class="container text-center">
			<p class="text-center" style="color: #D1C4E9; margin: 0 0 5px; padding: 0"><small>Sistem Informasi Cuti Karyawan Dinas Kesehatan Kabupaten Kudus</small></p>
		</div>
	</div><!-- /.footer-bottom -->

	<!-- Bootstrap Core JavaScript -->
	<script src="<?= base_url()?>/assets/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>