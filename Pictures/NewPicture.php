<?php
require_once('DatabasePicture.php');
require_once('../initialize.php');

$error = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (empty($_POST['Name'])) {
    $error[] = 'Name cannot be left blank';
  }

  if (empty($_POST['URL'])) {
    $error[] = 'Pictures cannot be left blank';
  }
}

function isFormValidated()
{
  global $error;

  return count($error) == 0;
}
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
  <!-- Custom styles -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet" />

</head>

<body>

  <section id="container" class="">
    <?php include_once('../header.php'); ?>

    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-o"></i> Form Pictures</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="../home.php">Home</a></li>
              <li><i class="icon_document_alt"></i>Forms</li>
              <li><i class="fa fa-files-o"></i>New Pictures</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Enter Form Admin
              </header>
              <div class="panel-body">
                <div class="form">
                  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" onsubmit="return isFormValidation();" class="form-validate form-horizontal " id="register_form" method="post">
                    <div class="form-group ">
                      <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isFormValidated()) : ?>
                        <?php
                        $picture = [];
                        $picture['Name'] = $_POST['Name'];
                        $picture['ServiceID'] = $_POST['ServiceID'];
                        $picture['URL'] = $_POST['URL'];
                        $result = insert_picture($picture);
                        $newPictureID = mysqli_insert_id($db);
                        ?>
                        <h4>you have successfully added a photo</h4>

                      <?php endif; ?>
                      <label for="fullname" class="control-label col-lg-2">Name <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="name" name="Name" type="text" />
                        <span id="errorName"></span>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="username" class="control-label col-lg-2">Picture <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="url" name="URL" type="file" />
                        <span id="errorURL"></span>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="password" class="control-label col-lg-2">Sport <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control " id="serviceID" name="ServiceID">
                          <?php
                          $service_set = find_all_service();
                          $count = mysqli_num_rows($service_set);
                          for ($i = 0; $i < $count; $i++) :
                            $service = mysqli_fetch_assoc($service_set);
                          ?>
                            <option value="<?php echo $service['ServiceID']; ?>" <?php if (!empty($_POST['ServiceID']) && $_POST['ServiceID'] == $service['ServiceID']) echo 'selected'; ?>><?php echo $service['Name']; ?></option>
                          <?php
                          endfor;
                          mysqli_free_result($service_set);
                          ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-default" type="reset">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>

      </section>
    </section>

  </section>

  <!-- javascripts -->
  <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="../js/jquery.scrollTo.min.js"></script>
  <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- jquery validate js -->
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>

  <!-- custom form validation script for this page-->
  <script src="../js/form-validation-script.js"></script>
  <!--custome script for all page-->
  <script src="../js/scripts.js"></script>

  <script>
    function isFormValidation() {
      var name = document.getElementById('name').value;
      var url = document.getElementById('url').value;

      if (name == '') {
        document.getElementById('errorName').innerHTML = 'Name cannot be left blank';
        document.getElementById('errorName').style.color = 'red';
        document.getElementById('name').style.border = '1px solid red';
      } else {
        document.getElementById('errorName').innerHTML = '';
        document.getElementById('name').style.border = '1px solid #ceced2';
      }
      if (url == '') {
        document.getElementById('errorURL').innerHTML = 'Picture cannot be left blank';
        document.getElementById('errorURL').style.color = 'red';
        document.getElementById('url').style.border = '1px solid red';
      } else {
        document.getElementById('errorURL').innerHTML = '';
        document.getElementById('url').style.border = '1px solid #ceced2';
      }

      if (name != '' && url != '') {
        return true;
      }

      return false;
    }
  </script>


</body>

</html>

<?php
db_disconnect($db);
?>