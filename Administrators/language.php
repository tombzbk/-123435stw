<?php
include("php/function_check_logout.php");
$User_id = $_SESSION['User_id'];
$Username = $_SESSION['Username'];
$FullName = $_SESSION['FullName'];
if($User_id==''){
    echo "<script>
    window.location='index.php';
    </script>";
}
require_once('./php/classdb/mysqliConn.php');
$mysqli = new classDb;
?>
  <div class="col-xs-12" style="min-width: 800px;">
    <div class="box box-success box-form frm-cuntry" style="display: none">
      <div class="box-body">
        <h2 class="page-header">Manage Language</h2>
        <!-- form project-->
        <form class="form-horizontal" name="frmcuntry" action="php/acction.lng.class.php" method="post" enctype="multipart/form-data" onsubmit="return dosubmit_lng();">
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
                <div class="col-xs-3">
                  <label for="product_n1">Disk Driers :</label>
                  <input type="text" name="product_n1" id="product_n1" class="form-control">
                </div>
                <div class="col-xs-3">
                  <label for="product_n2">How to choose a Fishmeal Plant :</label>
                  <input type="text" name="product_n2" id="product_n2" class="form-control">
                </div>
                <div class="col-xs-3">
                  <label for="product_n3">Twin Screw Presses :</label>
                  <input type="text" name="product_n3" id="product_n3" class="form-control">
                </div>
                <div class="col-xs-3">
                  <label for="product_n4">Fish Cookers :</label>
                  <input type="text" name="product_n4" id="product_n4" class="form-control">
                </div>
              </div>
              <div class="col-xs-12" style="margin-top: 10px;">
                <div class="col-xs-3">
                  <label for="product_n5">Complete Fishmeal Plants :</label>
                  <input type="text" name="product_n5" id="product_n5" class="form-control">
                </div>
                <div class="col-xs-3">
                  <label for="product_n6">Deodoriser Smell Removal :</label>
                  <input type="text" name="product_n6" id="product_n6" class="form-control">
                </div>
                <div class="col-xs-3">
                  <label for="product_n7">Energy Saving :</label>
                  <input type="text" name="product_n7" id="product_n7" class="form-control">
                </div>
                <div class="col-xs-3">
                  <label for="product_n8">Accessories and Equipment :</label>
                  <input type="text" name="product_n8" id="product_n8" class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="reset" class="btn btn-default">Reset</button>
          </div>
          <input name="action" id="action" value="add" type="hidden">
          <input name="h_id" id="h_id" value="" type="hidden">
          <input name="cuntry" id="cuntry" value="<?php echo $_GET['cuntry']?>" type="hidden">
        </form>
      </div>
    </div>
  </div>
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">
<span class="btn btn-xs btn-success add-lng"><i class="fa fa-plus"> Add</i></span>
<span class="btn btn-xs btn-warning close-lng"><i class="fa fa-times-circle"> Cancle</i></span>
</h3>
        <span class="box-title" style="margin-left: 20%">
<?php
$_cuntry = strtoupper($_GET["cuntry"]);
if($_cuntry=="EN")  echo 'United Kingdom';
if($_cuntry=="TH")  echo 'Thailand';
if($_cuntry=="LA")  echo 'Laos';
if($_cuntry=="MM")  echo 'Myanmar';
if($_cuntry=="PK")  echo 'Pakistan';
if($_cuntry=="SA")  echo 'Saudi Arabia';
if($_cuntry=="BD")  echo 'Bangladesh';
if($_cuntry=="IR")  echo 'Iran';
if($_cuntry=="VN")  echo 'Vietnam';
if($_cuntry=="ID")  echo 'Indonesia';
if($_cuntry=="")  echo 'United Kingdom';
?>
</span>
      </div>
      <div class="box-body table-responsive no-padding ">
        <table class="table table-hover table-bordered">
          <?php
$sql =    " SELECT tpl.`Auto_id` as tlpautoid, tpl.`product_id`, tpl.`product_n1`, tpl.`product_n2`,"
. " tpl.`product_n3`, tpl.`product_n4`, tpl.`product_n5`, tpl.`product_n6`, "
. " tpl.`product_n7`, tpl.`product_n8`, tpl.`cuntry_id`,"
. " tc.`cuntry_id`, tc.`abbreviation`"
. " FROM `t_product_language` tpl"
. " INNER JOIN t_cuntry tc ON (tc.`cuntry_id`=tpl.`cuntry_id`)"
. " WHERE tc.`abbreviation`='".$_GET['cuntry']."' LIMIT 1";
$res = $mysqli->query($sql,'');
$num = $mysqli->num_rows();
if($num==0){
    $product_n1='Empty';
    $product_n2='Empty';
    $product_n3='Empty';
    $product_n4='Empty';
    $product_n5='Empty';
    $product_n6='Empty';
    $product_n7='Empty';
    $product_n8='Empty';
    $display ="none";
}
$res = $mysqli->fetch_assoc();
$i=0;
foreach($res as $row){
    ++$i;
    $product_n1=$row['product_n1'];
    $product_n2=$row['product_n2'];
    $product_n3=$row['product_n3'];
    $product_n4=$row['product_n4'];
    $product_n5=$row['product_n5'];
    $product_n6=$row['product_n6'];
    $product_n7=$row['product_n7'];
    $product_n8=$row['product_n8'];
}
?>
            <tbody>
              <tr>
                <th width="250">Fix Product title</th>
                <th> Language</th>
                <th width="50">
                    <span class="btn btn-xs btn-warning edit-proj" onclick="update_lng('<?php echo $row['product_id'];?>');" style="display: <?php echo $display;?>">
                        <i class="fa fa fa-pencil"></i> Edit
                    </span>
                </th>
                <th width="50">
                    <span class="btn btn-xs btn-danger del-new" onclick="del_lng('<?php echo $row['product_id'];?>');" style="display: <?php echo $display;?>">
                        <i class="fa fa fa-times"></i> Del
                    </span>
                </th>
              </tr>
              <tr>
                <td>Disk Driers</td>
                <td>
                  <?php echo $product_n1;?>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
              <tr>
                <td>How to choose a Fishmeal Plant </td>
                <td>
                  <?php echo $product_n2;?>
                </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Twin Screw Presses</td>
                <td>
                  <?php echo $product_n3;?>
                </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Fish Cookers</td>
                <td>
                  <?php echo $product_n4;?>
                </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Complete Fishmeal Plants</td>
                <td>
                  <?php echo $product_n5;?>
                </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Deodoriser Smell Removal</td>
                <td>
                  <?php echo $product_n6;?>
                </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Energy Saving</td>
                <td>
                  <?php echo $product_n7;?>
                </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Accessories and Equipment</td>
                <td>
                  <?php echo $product_n8;?>
                </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
        </table>
      </div>
    </div>
  </div>