<?php

include("php/function_check_logout.php");
if (isset($_SESSION['User_id']) == '') {

    echo "<script>

    window.location='index.php';

    </script>";

}

require_once('./php/classdb/mysqliConn.php');

$mysqli = new classDb;

?>

<div class="col-xs-6" style="min-width: 800px;">

    <div class="box box-success box-form frm-slider" style="display: none">

        <div class="box-header ui-sortable-handle">

            <h3 class="box-title">Manage Front Page Image Gallery</h3>

        </div>

        <!-- /.box-header -->

        <div class="box-body">

            <!-- form project-->

            <form class="form-horizontal" name="frmslider" action="php/slider.class.php" method="post" enctype="multipart/form-data" onsubmit="return dosubmit_sl();">

                <div class="form-group">

                    <label class="control-label col-xs-4">Caption for English : </label>

                    <div class="col-xs-6">

                        <input class="form-control" name="Caption_EN" id="Caption_EN">

                    </div>

                </div>

                <div class="form-group">

                    <label class="control-label col-xs-4">Caption for Thailand : </label>

                    <div class="col-xs-6">

                        <input class="form-control" name="Caption_TH" id="Caption_TH">

                    </div>

                </div>

                <div class="form-group">

                    <label class="control-label col-xs-4">Caption for Laos : </label>

                    <div class="col-xs-6">

                        <input class="form-control" name="Caption_LA" id="Caption_LA">

                    </div>

                </div>

                <div class="form-group">

                    <label class="control-label col-xs-4">Caption for Myanmar : </label>

                    <div class="col-xs-6">

                        <input class="form-control" name="Caption_MM" id="Caption_MM">

                    </div>

                </div>

                <div class="form-group">

                    <label class="control-label col-xs-4">Caption for Pakistan : </label>

                    <div class="col-xs-6">

                        <input class="form-control" name="Caption_PK" id="Caption_PK">

                    </div>

                </div>

                <div class="form-group">

                    <label class="control-label col-xs-4">Caption for Saudi Arabia : </label>

                    <div class="col-xs-6">

                        <input class="form-control" name="Caption_SA" id="Caption_SA">

                    </div>

                </div>

                <div class="form-group">

                    <label class="control-label col-xs-4">Caption for Bangladesh : </label>

                    <div class="col-xs-6">

                        <input class="form-control" name="Caption_BD" id="Caption_BD">

                    </div>

                </div>

                <div class="form-group">

                    <label class="control-label col-xs-4">Caption for Iran : </label>

                    <div class="col-xs-6">

                        <input class="form-control" name="Caption_IR" id="Caption_IR">

                    </div>

                </div>

                <div class="form-group">

                    <label class="control-label col-xs-4">Caption for Vietnam : </label>

                    <div class="col-xs-6">

                        <input class="form-control" name="Caption_VN" id="Caption_VN">

                    </div>

                </div>

                <div class="form-group">

                    <label class="control-label col-xs-4">Caption for Indonesia : </label>

                    <div class="col-xs-6">

                        <input class="form-control" name="Caption_ID" id="Caption_ID">

                    </div>

                </div>

                <div class="form-group">

                    <label class="control-label col-xs-4">

                        Upload Image for slide:</label>

                    <div class="col-xs-3">

                        <div class='input-group'>

                            <input type='file' name="Image_name" id="Image_name" />

                            <span style="color: red;font-size: 10px;">

                                *Fixed size 1000px * 340px

                            </span>

                        </div>

                    </div>

                </div>

                <input type='hidden' class="form-control" name="Date_new" id="Date_new" value="<?php echo date('Y-m-d H:s:i'); ?>" />

                <div class="box-footer">

                    <button type="submit" value="submit" class="btn btn-primary">Save</button>

                    <button type="reset" class="btn btn-default">Reset</button>

                </div>

                <input name="action" id="action" value="add" type="hidden">

                <input name="h_id" id="h_id" value="" type="hidden">

                <input type="hidden" id="h_Pic_new" name="h_Pic_new">

            </form>

        </div>

    </div>

</div>

<div class="col-xs-6" style="min-width: 800px;">

    <div class="box box-success box-form frm-slider" style="display: none">

        <div class="box-header ui-sortable-handle">

            <h3 class="box-title">Image</h3>

        </div>

        <!-- /.box-header -->

        <div class="box-body" id='box-image'>

        </div>

    </div>

</div>

<div class="col-xs-12">

    <div class="box">

        <div class="box-header">

            <h3 class="box-title"> Manage Front Page Image Gallery&nbsp;&nbsp;

                <span class="btn btn-xs btn-success add-img"><i class="fa fa-plus"> Add</i></span>

                <span class="btn btn-xs btn-warning close-img"><i class="fa fa-times-circle"> Cancle</i></span>

            </h3>

        </div>

        <div class="box-body table-responsive no-padding">

            <table id="table-slider-f" class="table table-hover table-bordered">

                <thead>

                    <tr>

                        <th width='250'>English </th>

                        <th width='250'>Thailand </th>

                        <th width='250'>Laos </th>

                        <th width='250'>Myanmar </th>

                        <th width='250'>Pakistan </th>

                        <th width='250'>Saudi Arabia</th>

                        <th width='250'>Bangladesh</th>

                        <th width='250'>Iran</th>

                        <th width='250'>Vietnam</th>

                        <th width='250'>Indonesia</th>

                        <th width="150">Image</th>

                        <th width='25'></th>

                        <th width='25'></th>

                    </tr>

                </thead>

                <tbody>

                    <?php

                    $mysqli->order('sort_oder', 'ASC');

                    $mysqli->where("status_type='F'");

                    $sql = $mysqli->query('', 't_image_slide');

                    if ($mysqli->num_rows() == 0) {

                        ?>

                        <tr>

                            <td colspan="13">Empty</td>

                        </tr>

                        <?php

                    } else {

                        $sql = $mysqli->fetch_assoc();

                        $i = 0;

                        foreach ($sql as $row) {

                            ++$i;

                            ?>

                            <tr id="<?php echo $row ['AutoIid'] ?>">

                                <td>

                                    <?php echo $row ['Caption_EN'] ?>

                                </td>

                                <td>

                                    <?php echo $row ['Caption_TH'] ?>

                                </td>

                                <td>

                                    <?php echo $row ['Caption_LA'] ?>

                                </td>

                                <td>

                                    <?php echo $row ['Caption_MM'] ?>

                                </td>

                                <td>

                                    <?php echo $row ['Caption_PK'] ?>

                                </td>

                                <td>

                                    <?php echo $row ['Caption_SA'] ?>

                                </td>

                                <td>

                                    <?php echo $row ['Caption_BD'] ?>

                                </td>

                                <td>

                                    <?php echo $row ['Caption_IR'] ?>

                                </td>

                                <td>

                                    <?php echo $row ['Caption_VN'] ?>

                                </td>

                                <td>

                                    <?php echo $row ['Caption_ID'] ?>

                                </td>

                                <td>

                                    <a href="../Slider/<?php echo $row['Image_name']; ?>" data-toggle="lightbox-slider" data-gallery="multiimages" data-title="Front Page Image  Slider">

                                        <img src="../Slider/small/<?php echo $row ['Image_name'] ?>">

                                    </a>

                                </td>

                                <td>

                                    <span class="btn btn-xs btn-warning edit-slider" onclick="edit_slider('<?php echo $row['AutoIid']; ?>');">

                                        <i class="fa fa fa-pencil"></i> Edit

                                    </span>

                                </td>

                                <td>

                                    <span class="btn btn-xs btn-danger del-slider" onclick="del_slider('<?php echo $row['AutoIid']; ?>');">

                                        <i class="fa fa fa-times"></i> Del

                                    </span>

                                </td>

                            </tr>

                        <?php

                        }

                    }

                    ?>

                </tbody>

            </table>

        </div>

    </div>

</div>