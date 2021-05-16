<?php
require_once('../Pictures/DatabasePicture.php');
require_once('../initialize.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title></title>

    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="../css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="../css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../css/font-awesome.min.css" rel="stylesheet" />
    <!-- full calendar css-->
    <link href="../assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <link href="../assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="../css/owl.carousel.css" type="text/css">
    <link href="../css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="../css/fullcalendar.css">
    <link href="../css/widgets.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/style-responsive.css" rel="stylesheet" />
    <link href="../css/xcharts.min.css" rel=" stylesheet">
    <link href="../css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <style>
        .img {
            text-align: array_multisort;
            height: 150px;
            width: 150px;
        }
    </style>
</head>

<body>

    <section id="container" class="">
        <?php include_once('../header.php'); ?>
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-user-o"></i>Admin</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="../home.php">Home</a></li>
                            <li><i class="icon_document_alt"></i>Table</li>
                            <li><i class="fa fa-files-o"></i>Index Pictures</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Pictures Table
                            </header>

                            <table class="table table-striped table-advance table-hover col-lg-12 col-sm-12">
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <th>Picture</th>
                                        <th>Sport</th>
                                    </tr>
                                    <?php
                                    $picture_set = find_all_picture();
                                    $count = mysqli_num_rows($picture_set);
                                    for ($i = 0; $i < $count; $i++) :
                                        $picture = mysqli_fetch_assoc($picture_set);
                                    ?>
                                        <tr>
                                            <td><?php echo $picture['Name']; ?></td>
                                            <td class="img"><img style="width: 100%; height: 100%;" src="<?php echo  '../img/' . $picture['URL']; ?>"></td>
                                            <!-- <td><img src="../img/cau_long1.jpg" alt=""></td> -->
                                            <td><?php echo $picture['name']; ?></td>
                                            <td>
                                                <div class="btn-group" style="float: right;">
                                                    <a class="btn btn-primary" href="NewPicture.php"><i class="icon_plus_alt2"></i></a>
                                                    <a class="btn btn-success" href="<?php echo 'EditPicture.php?PictureID=' . $picture['PictureID']; ?>"><i class="icon_pencil"></i></a>
                                                    <a class="btn btn-danger" href="<?php echo 'DeletePicture.php?PictureID=' . $picture['PictureID']; ?>"><i class="icon_close_alt2"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    endfor;
                                    mysqli_free_result($picture_set);
                                    ?>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>


            </section>
        </section>

        <!-- javascripts -->
        <script src="../js/jquery.js"></script>
        <script src="../js/jquery-ui-1.10.4.min.js"></script>
        <script src="../js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="../js/jquery-ui-1.9.2.custom.min.js"></script>
        <!-- bootstrap -->
        <script src="../js/bootstrap.min.js"></script>
        <!-- nice scroll -->
        <script src="../js/jquery.scrollTo.min.js"></script>
        <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
        <!-- charts scripts -->
        <script src="../assets/jquery-knob/js/jquery.knob.js"></script>
        <script src="../js/jquery.sparkline.js" type="text/javascript"></script>
        <script src="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
        <script src="../js/owl.carousel.js"></script>
        <!-- jQuery full calendar -->
        <script src="../js/fullcalendar.min.js">
        </script>
        <!-- Full Google Calendar - Calendar -->
        <script src="../assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
        <!--script for this page only-->
        <script src="../js/calendar-custom.js"></script>
        <script src="../js/jquery.rateit.min.js"></script>
        <!-- custom select -->
        <script src="../js/jquery.customSelect.min.js"></script>
        <script src="../assets/chart-master/Chart.js"></script>

        <!--custome script for all page-->
        <script src="../js/scripts.js"></script>
        <!-- custom script for this page-->
        <script src="../js/sparkline-chart.js"></script>
        <script src="../js/easy-pie-chart.js"></script>
        <script src="../js/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="../js/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../js/xcharts.min.js"></script>
        <script src="../js/jquery.autosize.min.js"></script>
        <script src="../js/jquery.placeholder.min.js"></script>
        <script src="../js/gdp-data.js"></script>
        <script src="../js/morris.min.js"></script>
        <script src="../js/sparklines.js"></script>
        <script src="../js/charts.js"></script>
        <script src="../js/jquery.slimscroll.min.js"></script>


</body>

</html>

<?php
db_disconnect($db);
?>