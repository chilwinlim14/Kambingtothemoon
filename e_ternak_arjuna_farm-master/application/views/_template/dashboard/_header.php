<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>E-TERNAK - <?= $judul ?></title>
    <meta content="E-ternak adalah aplikasi recording untuk peternakan kambing dan domba" name="description">
    <meta content="peternakan digital, digitalisasi peternakan, eternak, farm, goat,sheep" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url() ?>assets2/img/favicon.png" rel="icon">
    <link href="<?= base_url() ?>assets2/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets2/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets2/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets2/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets2/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets2/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>assets2/css/style.css" rel="stylesheet">


    <!-- Required CSS -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/select2/css/select2.min.css">
    <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css"> -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/skin-purple.min.css"> -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/pace/pace-theme-flash.css">

    <!-- Datatables Buttons -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/plugins/Buttons-1.5.6/css/buttons.bootstrap.min.css">

    <!-- Select Search -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dselect/css/dselect.css">

    <!-- textarea editor -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/codemirror/lib/codemirror.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/froala_editor/css/froala_editor.pkgd.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/froala_editor/css/froala_style.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/froala_editor/css/themes/royal.min.css">
    <!-- /texarea editor; -->


    <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<!-- Must Load First -->
<script src="<?= base_url() ?>assets/bower_components/jquery/jquery-3.3.1.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/select2/js/select2.full.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url() ?>assets/dist/js/tinymce/tinymce.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>


<script type="text/javascript">
    let base_url = '<?= base_url() ?>';
</script>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <?php require_once("_topmenu.php"); ?>
    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php require_once("_sidebar.php"); ?>
    <!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1><b><?= $judul; ?></b></h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=""><?= $judul; ?></a></li>
                    <li class="breadcrumb-item active"><?= $subjudul; ?></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->