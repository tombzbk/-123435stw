<?php
if (isset($_REQUEST['l']) == 'Y') {
    $_SESSION['User_id'] = '';
    $_SESSION['Username'] = '';
    $_SESSION['FullName'] = '';
    echo "<script>window.location='index.php';</script>";

}


$Username = $_SESSION['Username'];

$FullName = $_SESSION['FullName'];

if (isset($_SESSION['User_id']) == '') {

    echo "<script>window.location='index.php';</script>";

}

require_once('./php/classdb/mysqliConn.php');

$mysqli = new classDb;

if (isset($_REQUEST['language']) == "") {

    $_REQUEST['language'] = "EN";

}

?>

  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>

  <div class="col-xs-12" style="min-width: 800px;">

    <div class="box box-success box-form frm-menuMain" style="display:">

      <div class="box-body">

        <h2 class="page-header">Setting main Menu</h2>

        <!-- form project-->

        <form class="form-horizontal" name="frm-menu" action="php/action.mainMenu.php" method="post" enctype="multipart/form-data" onsubmit="">

          <div class="box-body">

            <div class="row">

              <div class="col-xs-12">

                <div class="col-xs-3">

                  <label for="menu_about">Language for Setting Menu :</label>

                  <select id="set-language" name="set-language" style="padding:4px;" class="col-xs-12">

                    <option value="EN" <?php if (isset($_REQUEST[ 'language'])=="EN" ) { ?> selected

                      <?php } ?>>English</option>

                    <option value="TH" <?php if (isset($_REQUEST[ 'language'])=="TH" ) { ?> selected

                      <?php } ?>>Thailand</option>

                    <option value="LA" <?php if (isset($_REQUEST[ 'language'])=="LA" ) { ?> selected

                      <?php } ?>>Laos</option>

                    <option value="MM" <?php if (isset($_REQUEST[ 'language'])=="MM" ) { ?> selected

                      <?php } ?>>Myanmar</option>

                    <option value="PK" <?php if (isset($_REQUEST[ 'language'])=="PK" ) { ?> selected

                      <?php } ?>>Pakistan</option>

                    <option value="SA" <?php if (isset($_REQUEST[ 'language'])=="SA" ) { ?> selected

                      <?php } ?>>Saudi Arabia</option>

                    <option value="BD" <?php if (isset($_REQUEST[ 'language'])=="BD" ) { ?> selected

                      <?php } ?>>Bangladesh</option>

                    <option value="IR" <?php if (isset($_REQUEST[ 'language'])=="IR" ) { ?> selected

                      <?php } ?>>Iran</option>

                    <option value="VN" <?php if (isset($_REQUEST[ 'language'])=="VN" ) { ?> selected

                      <?php } ?>>Vietnam</option>

                    <option value="ID" <?php if (isset($_REQUEST[ 'language'])=="ID" ) { ?> selected

                      <?php } ?>>Indonesia</option>

                    <option value="RU" <?php if (isset($_REQUEST[ 'language'])=="RU" ) { ?> selected

                      <?php } ?>>Russia</option>

                  </select>

                </div>

              </div>

              <div class="col-xs-12" style="margin-top: 10px;">

                <div class="col-xs-3">

                  <label for="menu_about">About :</label>

                  <input type="text" name="menu_about" id="menu_about" class="form-control">

                </div>

                <div class="col-xs-3">

                  <label for="menu_news">News :</label>

                  <input type="text" name="menu_news" id="menu_news" class="form-control">

                </div>

                <div class="col-xs-3">

                  <label for="menu_rendering">Rendering Plants :</label>

                  <input type="text" name="menu_rendering" id="menu_rendering" class="form-control">

                </div>

                <div class="col-xs-3">

                  <label for="menu_fishmeal">Fishmeal Plants :</label>

                  <input type="text" name="menu_fishmeal" id="menu_fishmeal" class="form-control">

                </div>

              </div>

              <div class="col-xs-12" style="margin-top: 10px;">

                <div class="col-xs-3">

                  <label for="menu_photo">Photo of Plants :</label>

                  <input type="text" name="menu_photo" id="menu_photo" class="form-control">

                </div>

                <div class="col-xs-3">

                  <label for="menu_faq">FAQ :</label>

                  <input type="text" name="menu_faq" id="menu_faq" class="form-control">

                </div>

                <div class="col-xs-3">

                  <label for="menu_contact">Contact Us :</label>

                  <input type="text" name="menu_contact" id="menu_contact" class="form-control">

                </div>

              </div>

            </div>

          </div>

          <div class="box-footer">

            <button type="submit" class="btn btn-primary">Save</button>

            <button type="reset" class="btn btn-default">Reset</button>

          </div>

          <input name="action" id="action" value="add" type="hidden">

          <input name="h_idMenu" id="h_idMenu" type="hidden">

          <input name="cuntry" id="cuntry" value="<?php echo isset($lang); ?>" type="hidden">

        </form>

      </div>

    </div>

  </div>

  <div class="col-xs-12" style="display:">

    <div class="box">

      <div class="box-header">

        <h3 class="box-title">

<span class="btn btn-success btn-xs add-m"><i class="fa fa-plus"> Add</i></span>

<span class="btn btn-warning btn-xs close-m"><i class="fa fa-times-circle"> Cancle</i></span>

</h3>

      </div>

      <div class="box-body table-responsive no-padding">

        <table class="table table-bordered table-hover dataTable">

          <thead>

            <tr class="odd">

              <th width="150">Language</th>

              <th>About</th>

              <th>News</th>

              <th>Rendering Plants</th>

              <th>Fishmeal Plants</th>

              <th>Photo of Plants</th>

              <th>FAQ</th>

              <th>Contact Us</th>

              <th width="50">Edit</th>

              <th width="50">Del</th>

            </tr>

          </thead>

          <tbody>

            <?php

$mysqli->where('1');

$res = $mysqli->query('', 't_menu');

$num = $mysqli->num_rows();

$res = $mysqli->fetch_assoc();
$i=0;
foreach ($res as $row) {

    ++$i;

    $menu_about = $row['menu_about'];

    $menu_news = $row['menu_news'];

    $menu_rendering = $row['menu_rendering'];

    $menu_fishmeal = $row['menu_fishmeal'];

    $menu_photo = $row['menu_photo'];

    $menu_faq = $row['menu_faq'];

    $menu_contact = $row['menu_contact'];

    $mLanguage = $row['menu_language'];

    if ($mLanguage == 'EN') {

        $_languages = "English";

    } else if ($mLanguage == 'TH') {

        $_languages = "Thailand";

    } else if ($mLanguage == 'LA') {

        $_languages = "Laos";

    } else if ($mLanguage == 'MM') {

        $_languages = "Myanmar";

    } else if ($mLanguage == 'PK') {

        $_languages = "Pakistan";

    } else if ($mLanguage == 'SA') {

        $_languages = "Saudi Arabia";

    } else if ($mLanguage == 'BD') {

        $_languages = "Bangladesh";

    } else if ($mLanguage == 'IR') {

        $_languages = "Iran";

    } else if ($mLanguage == 'VN') {

        $_languages = "Vietnam";

    } else if ($mLanguage == 'ID') {

        $_languages = "Indonesia";

    } else if ($mLanguage == 'RU') {

        $_languages = "Russia";

    }

    ?>

              <tr id='menu-tr-<?php echo $row['menu_ID'] ?>'>

                <td>

                  <?php echo $_languages ?>

                </td>

                <td>

                  <?php echo $menu_about ?>

                </td>

                <td>

                  <?php echo $menu_news ?>

                </td>

                <td>

                  <?php echo $menu_rendering ?>

                </td>

                <td>

                  <?php echo $menu_fishmeal ?>

                </td>

                <td>

                  <?php echo $menu_photo ?>

                </td>

                <td>

                  <?php echo $menu_faq ?>

                </td>

                <td>

                  <?php echo $menu_contact ?>

                </td>

                <td>

                  <span class="btn btn-warning btn-xs edit-proj" onclick="update_menu('<?php echo $row['menu_ID']; ?>');" style="display: <?php echo isset($display); ?>">

    <i class="fa fa fa-pencil"></i> Edit

    </span>

                </td>

                <td>

                  <span class="btn btn-danger btn-xs del-new" onclick="del_menu('<?php echo $row['menu_ID']; ?>');" style="display: <?php echo isset($display); ?>">

    <i class="fa fa fa-times"></i> Del

    </span>

                </td>

              </tr>

              <?php } ?>

          </tbody>

        </table>

      </div>

    </div>

  </div>