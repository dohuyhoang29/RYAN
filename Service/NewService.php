<?php
require_once('DatabaseService.php');
require_once('../initialize.php');

$error = [];

function checkForm()
{
  global $error;

  if (empty('Name')) {
    $error[] = 'Name must be required';
  }

  if (empty('Time')) {
    $error[] = 'Time must be required';
  }

  if (empty('Famous_Players')) {
    $error[] = 'Famous Players must be required';
  }

  if (empty('Rules')) {
    $error[] = 'Rules must be required';
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

  <title>New Service</title>

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
            <h3 class="page-header"><i class="fa fa-user-o"></i> Form Service</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
              <li><i class="icon_document_alt"></i>Forms</li>
              <li><i class="fa fa-files-o"></i>New Service</li>
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
                <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isFormValidated()) : ?>
                  <?php
                  $service = [];
                  $service['Name'] = $_POST['Name'];
                  $service['Rules'] = $_POST['Rules'];
                  $service['Time'] = $_POST['Time'];
                  $service['Famous_Players'] = $_POST['Famous_Players'];
                  $service['CategoryID'] = $_POST['CategoryID'];

                  $result = insert_service($service);
                  $newServiceID = mysqli_insert_id($db);

                  ?>
                  <h4>You have successfully created a Service</h4>
                <?php endif; ?>
                <div class="form">
                  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="form-validate form-horizontal " onsubmit="return isFormValidation()" id="register_form" method="post">
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Name <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="name" name="Name" type="text" />
                        <span id="errorName"></span>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="password" class="control-label col-lg-2">Categories <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control " id="categories" name="CategoryID">\
                          <?php
                          $categories_set = find_all_categories();
                          $count = mysqli_num_rows($categories_set);
                          for ($i = 0; $i < $count; $i++) :
                            $categories = mysqli_fetch_assoc($categories_set);
                          ?>
                            <option value="<?php echo $categories['CategoryID']; ?>" <?php if(!empty($_POST['CategoryID']) && $_POST['CategoryID'] == $categories['CategoryID']) echo 'selected'; ?>><?php echo $categories['Name']; ?></option>
                          <?php
                          endfor;
                          mysqli_free_result($categories_set);
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="password" class="control-label col-lg-2">Time <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="time" name="Time" type="text" />
                        <span id="errorTime"></span>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="email" class="control-label col-lg-2">Famous_Players <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="famous" name="Famous_Players" type="text" />
                        <span id="errorFamous"></span>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="phone" class="control-label col-lg-2">Rules <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <textarea class="form-control " id="rules" name="Rules" type="text"></textarea>
                        <span id="errorRules"></span>
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


  <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>

  <script src="../js/jquery.scrollTo.min.js"></script>
  <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>

  <script type="text/javascript" src="js/jquery.validate.min.js"></script>


  <script src="../js/form-validation-script.js"></script>

  <script src="../js/scripts.js"></script>

  <script>
    function isFormValidation() {
      // lay gia tri cua cac input
      var name = document.getElementById('name').value;
      var categories = document.getElementById('categories').value;
      var time = document.getElementById('time').value;
      var famous = document.getElementById('famous').value;
      var rules = document.getElementById('rules').value;

      // kiem tra du lieu

      if (name == '') {
        document.getElementById('errorName').innerHTML = 'Name cannot be left blank';
        document.getElementById('errorName').style.color = 'red';
        document.getElementById('name').style.border = '1px solid red';
      } else {
        document.getElementById('errorName').innerHTML = '';
        document.getElementById('name').style.border = '1px solid #ceced2';
      }
      if (time == '') {
        document.getElementById('errorTime').innerHTML = 'Time cannot be left blank';
        document.getElementById('errorTime').style.color = 'red';
        document.getElementById('time').style.border = '1px solid red';
      } else {
        document.getElementById('errorTime').innerHTML = '';
        document.getElementById('time').style.border = '1px solid #ceced2';
      }
      if (famous == '') {
        document.getElementById('errorFamous').innerHTML = 'Famous Players cannot be left blank';
        document.getElementById('errorFamous').style.color = 'red';
        document.getElementById('famous').style.border = '1px solid red';
      } else {
        document.getElementById('errorFamous').innerHTML = '';
        document.getElementById('famous').style.border = '1px solid #ceced2';
      }
      if (rules == '') {
        document.getElementById('errorRules').innerHTML = 'Famous Players cannot be left blank';
        document.getElementById('errorRules').style.color = 'red';
        document.getElementById('rules').style.border = '1px solid red';
      } else {
        document.getElementById('errorRules').innerHTML = '';
        document.getElementById('rules').style.border = '1px solid #ceced2';
      }
      if (name != '' && time != '' && famous != '' && rules != '') {

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