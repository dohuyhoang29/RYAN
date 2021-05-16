<header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo -->
      <a href="../home.php" class="logo"><img style="padding-bottom: 10px;" src="../img/L.png" alt=""></a>
      <!--logo end-->

      <div class="top-nav notification-row">
 
        <ul class="nav pull-right top-menu">

          <?php if (!isset($_SESSION['username'])) :
            redirect_to('Admin/LogoutRYAN.php');
          endif; ?>

          <?php include('shareadminMenu.php'); ?>

        </ul>

      </div>
    </header>

    <aside>
      <div id="sidebar" class="nav-collapse ">

        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="../home.php">
              <i class="icon_house_alt"></i>
              <span>Home</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
              <i class="icon_document_alt"></i>
              <span>Forms</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="../Service/NewService.php">Service</a></li>
              <li><a class="" href="../Pictures/NewPicture.php">Pictures</a></li>
              <li><a class="" href="../Categories/NewCategories.php">Categories</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
              <i class="icon_table"></i>
              <span>Index</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="../Admin/IndexAdmin.php">Admin</a></li>
              <li><a class="" href="../Service/IndexService.php">Service</a></li>
              <li><a class="" href="../Pictures/IndexPicture.php">Pictures</a></li>
              <li><a class="" href="../Categories/IndexCategories.php">Categories</a></li>
            </ul>
          </li>

        </ul>

      </div>
    </aside>