<?php
	if (!isset($_SESSION['user'])) {
		?><script>window.location='<?= base_url()?>'</script><?php
	}
	// setting tanggal
	$haries = array("Sunday" => "Minggu", "Monday" => "Senin", "Tuesday" => "Selasa", "Wednesday" => "Rabu", "Thursday" => "Kamis", "Friday" => "Jum'at", "Saturday" => "Sabtu");
	$bulans = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
	$bulans_count = count($bulans);
	// tanggal bulan dan tahun hari ini
	$hari_ini = $haries[date("l")];
	$bulan_ini = $bulans[date("n")];
	$tanggal = date("d");
	$bulan = date("m");
	$tahun = date("Y");

	$qUser = mysqli_query($con, "SELECT * FROM USER  JOIN profile ON user.id_user = profile.id_user WHERE user.id_user = '".$_SESSION['user']."'");
	$dtUser = mysqli_fetch_array($qUser);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Sistem Informasi Cuti Karyawan Berbasis Web - <?php echo $pagedesc ?></title>

	<link href="<?= base_url()?>/assets/images/logo.png" rel="icon" type="images/x-icon">

    <!-- Bootstrap Core CSS -->
	<link href="<?= base_url()?>/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="<?= base_url()?>/assets/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
	
	<!-- DataTables CSS -->
    <link href="<?= base_url()?>/assets/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?= base_url()?>/assets/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="<?= base_url()?>/assets/dist/css/sb-admin-2.css" rel="stylesheet">
	<link href="<?= base_url()?>/assets/dist/css/offline-font.css" rel="stylesheet">
	<link href="<?= base_url()?>/assets/dist/css/custom.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="<?= base_url()?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url()?>/assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- jQuery -->
	<script src="<?= base_url()?>/assets/jquery/dist/jquery.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand hidden-xs" href="index.php">
					<img src="<?= base_url()?>/assets/images/logo.png" alt="brand" width="32" class="float-left image-brand">
					<div class="float-right">&nbsp;<strong>Dinas Kesehatan Kabupaten Kudus</strong></div>
					<div class="clear-both"></div>
				</a>
				<a class="navbar-brand visible-xs" href="index.php">
					<img src="<?= base_url()?>/assets/images/logo.png" alt="brand" width="32" class="float-left image-brand">
					<div class="float-right">&nbsp;<strong>Dinas Kesehatan Kabupaten Kudus</strong></div>
					<div class="clear-both"></div>
				</a>
			</div><!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
				<li class="dropdown dropdown-right">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-user fa-fw"></i>&nbsp;<?php echo ucfirst($dtUser['nama_emp']); ?>&nbsp;<i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-user">
						<li><a href="<?= base_url()?>/my/pengaturan"><i class="fa fa-lock fa-fw"></i>&nbsp;Ubah Password</a></li>
						<li class="divider"></li>
						<li><a href="<?= base_url()?>/my/ubah_foto"><i class="fa fa-image fa-fw"></i>&nbsp;Ubah Foto</a></li>
						<li class="divider"></li>
						<li><a href="<?= base_url()?>/auth/logout"><i class="fa fa-sign-out-alt fa-fw"></i> Keluar</a></li>
					</ul><!-- /.dropdown-user -->
				</li><!-- /.dropdown -->
			</ul><!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
							<h4>Sistem Informasi Cuti Karyawan <br> <b>Dinas Kesehatan Kabupaten Kudus</b></h4>
							<h5 class="text-muted"><i class="fa fa-calendar-alt fa-fw"></i>&nbsp;<?php echo $hari_ini.", ".$tanggal." ".$bulan_ini." ".$tahun ?></h5>
						</li>
						<?php
						if ($dtUser['id_role'] == 1) {
							?>
							<li>
								<a href="<?= base_url()?>/my/pimpinan/index"><i class="fa fa-home fa-fw" class="<?= $pagedesc == 'Beranda' ? 'active' : ''?>"></i>&nbsp;Beranda</a>
							</li>
							
							<li>
								<a href="#"><i class="fa fa-download fa-fw"></i>&nbsp;Approval<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li><a href="<?= base_url()?>/my/pimpinan/app_wait" class="<?= $pagedesc == 'Approval Cuti' ? 'active' : ''?>">Approval Cuti</a></li>
									<li><a href="<?= base_url()?>/my/pimpinan/app_approve" class="<?= $pagedesc == 'Approved' ? 'active' : ''?>">Approved</a></li>
									<li><a href="<?= base_url()?>/my/pimpinan/app_all" class="<?= $pagedesc == 'Semua Data' ? 'active' : ''?>">Semua Data</a></li>
								</ul>
							</li>
							
							<?php
						}
						else if ($dtUser['id_role'] == 2) {
							?>
							<li>
								<a href="<?= base_url()?>/my/admin/index"><i class="fa fa-home fa-fw" class="<?= $pagedesc == 'Beranda' ? 'active' : ''?>"></i>&nbsp;Beranda</a>
							</li>
							<li>
								<a href="#"><i class="fa fa-group fa-fw"></i>&nbsp;Data Karyawan<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li><a href="<?= base_url()?>/my/admin/karyawan" class="<?= $pagedesc == 'Data Karyawan' ? 'active' : ''?>">Data Karyawan</a></li>
								</ul>
							</li>
							<li>
								<a href="#"><i class="fa fa-check fa-fw"></i>&nbsp;Approval<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li><a href="<?= base_url()?>/my/admin/approval_cuti" class="<?= $pagedesc == 'Approval Cuti' ? 'active' : ''?>">Approval Cuti</a></li>
									<li><a href="<?= base_url()?>/my/admin/approval_all" class="<?= $pagedesc == 'Approval All' ? 'active' : ''?>">Semua Data</a></li>
								</ul>
							</li>
							<li>
								<a href="#"><i class="fa fa-recycle fa-fw"></i>&nbsp;Pengajuan Cuti<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li><a href="<?= base_url()?>/my/admin/cuti_create" class="<?= $pagedesc == 'Buat Pengajuan' ? 'active' : ''?>">Buat Pengajuan</a></li>
									<li><a href="<?= base_url()?>/my/admin/cuti_waitapp" class="<?= $pagedesc == 'Menunggu Approval' ? 'active' : ''?>">Menunggu Approval</a></li>
									<li><a href="<?= base_url()?>/my/admin/cuti_reject" class="<?= $pagedesc == 'Rejected' ? 'active' : ''?>">Rejected</a></li>
									<li><a href="<?= base_url()?>/my/admin/cuti_app" class="<?= $pagedesc == 'Approved' ? 'active' : ''?>">Approved</a></li>
								</ul>
							</li>
							<li>
								<a href="#"><i class="fa fa-folder fa-fw"></i>&nbsp;Laporan<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li><a href="<?= base_url()?>/my/admin/laporan" class="<?= $pagedesc == 'Laporan' ? 'active' : ''?>">Laporan</a></li>
								</ul>
							</li>
							<?php
						}
						else if ($dtUser['id_role'] == 3) {
							?>
							<li>
								<a href="<?= base_url()?>/my/karyawan/index"><i class="fa fa-home fa-fw" class="<?= $pagedesc == 'Beranda' ? 'active' : ''?>"></i>&nbsp;Beranda</a>
							</li>
							<li>
								<a href="#"><i class="fa fa-recycle fa-fw"></i>&nbsp;Pengajuan Cuti<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li><a href="<?= base_url()?>/my/karyawan/cuti_create" class="<?= $pagedesc == 'Buat Pengajuan' ? 'active' : ''?>">Buat Pengajuan</a></li>
									<li><a href="<?= base_url()?>/my/karyawan/cuti_waitapp" class="<?= $pagedesc == 'Menunggu Approval' ? 'active' : ''?>">Menunggu Approval</a></li>
									<li><a href="<?= base_url()?>/my/karyawan/cuti_reject" class="<?= $pagedesc == 'Rejected' ? 'active' : ''?>">Rejected</a></li>
									<li><a href="<?= base_url()?>/my/karyawan/cuti_app" class="<?= $pagedesc == 'Approved' ? 'active' : ''?>">Approved</a></li>
								</ul>
							</li>
							<?php
						}
						?>
	                </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>