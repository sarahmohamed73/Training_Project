<?php
include "Includes/header.php";
?>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">

<?php
include "Includes/sidebar.php";
?>

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

      <?php
          include "Includes/navbar.php";
      ?>

      <!-- Begin Page Content -->
      <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Categories</h1>
              <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                      class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">
              <div class="col-lg-12">
              <?php
                if(!isset($_GET["action"])) {
                  include "Design/Child Categories/veiw.php";
                } else if($_GET["action"] == "addChild") {
                  include "Design/Child Categories/add.php";
                } elseif($_GET['action'] == 'addParent') {
                  include "Design/Parent Categories/add.php";
                } else if($_GET["action"] == "editChild") {
                  include "Design/Child Categories/edit.php";
                } else if($_GET["action"] == "editParent") {
                  include "Design/Parent Categories/edit.php";
                }
              ?>
              </div>
          </div>
      </div>
      <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->
<?php
include "Includes/footer.php";
?>
</body>
</html>