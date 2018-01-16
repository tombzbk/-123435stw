<?php


	if(isset($_REQUEST['l'])=='Y'){

		$_SESSION['User_id']='';

                $_SESSION['Username']='';

                $_SESSION['FullName']='';

			echo "<script>

				window.location='index.php';

			</script>";		

	}

        require_once('./php/classdb/mysqliConn.php');

        $mysqli = new classDb;          

	$User_id = $_SESSION['User_id'];

	$Username = $_SESSION['Username'];

        $FullName = $_SESSION['FullName'];

	if($User_id==''){

            echo "<script>

                    window.location='index.php';

            </script>";		

	}

	if(isset($_REQUEST['language'])==""){

		$_REQUEST['language'] = "EN";

	}

?>

<div class="col-xs-6">

           

    <div class="box box-success box-form frm-boxfaq" style="display:none;min-width: 765px;">

              <div class="box-body">

                <h2 class="page-header">FAQ </h2>

                <!-- form project-->                                    

                <form class="form-horizontal" name="frmfaq" action="php/acction.faq.php" method="post" 

                      enctype="multipart/form-data" onsubmit="return dosubmit_nw();">



                            <div class="form-group">

                            <label class="control-label col-xs-4">Language for faq: </label>

                                <div class="col-xs-6">

                                    <select id="faq_language" name="faq_language" style="padding:4px;width:100%">
                                        <option value="EN" <?php if ($_REQUEST['language'] == "EN") { ?> selected<?php } ?>>English</option>
                                        <option value="TH" <?php if ($_REQUEST['language'] == "TH") { ?> selected<?php } ?>>Thailand</option>
                                        <option value="LA" <?php if ($_REQUEST['language'] == "LA") { ?> selected<?php } ?>>Laos</option>
                                        <option value="MM" <?php if ($_REQUEST['language'] == "MM") { ?> selected<?php } ?>>Myanmar</option>
                                        <option value="PK" <?php if ($_REQUEST['language'] == "PK") { ?> selected<?php } ?>>Pakistan</option>
                                        <option value="SA" <?php if ($_REQUEST['language'] == "SA") { ?> selected<?php } ?>>Saudi Arabia</option>
                                        <option value="BD" <?php if ($_REQUEST['language'] == "BD") { ?> selected<?php } ?>>Bangladesh</option>
                                        <option value="IR" <?php if ($_REQUEST['language'] == "IR") { ?> selected<?php } ?>>Iran</option>
                                        <option value="VN" <?php if ($_REQUEST['language'] == "VN") { ?> selected<?php } ?>>Vietnam</option>
                                        <option value="ID" <?php if ($_REQUEST['language'] == "ID") { ?> selected<?php } ?>>Indonesia</option>
                                        <option value="RU" <?php if ($_REQUEST[ 'language']=="RU" ) { ?> selected<?php } ?>>Russia</option>
                                    </select>  

                                </div>            

                            </div>                            

                            <div class="form-group">

                                <label class="control-label col-xs-4">Title : </label>

                                <div class="col-xs-6">

                                    <input class="form-control" name="Title" id="Title">

                                </div>            

                            </div>



                            <div class="form-group">

                                <label class="control-label col-xs-4">Description : </label>

                                <div class="col-xs-6">

                                <textarea class="form-control" rows="3" name="Detail" id="Detail"></textarea>

                                </div>

                            </div>

                            <input type='hidden' class="form-control" name="date" id="date" value="<?php echo date('Y-m-d H:s:i');?>"/>

                    <div class="box-footer" style="margin-left: 33.3%;"> 

                        <button type="submit" class="btn btn-primary">Save</button>

                        <button type="reset" class="btn btn-default">Reset</button>

                    </div>

                    <input  name="action" id="action" value="add" type="hidden">

                    <input  name="h_id" id="h_id" value="" type="hidden">

                </form>

            </div>    

         </div>

</div>

        <div class="col-xs-12" id="list-faq" style="display: block">

                <div class="box">

                        <div class="box-header">

                            <h3 class="box-title"> 

                                <span class="btn btn-xs btn-success add-faq"><i class="fa fa-plus"> Add</i></span> 

                                <span class="btn btn-xs btn-warning close-faq"><i class="fa fa-times-circle"> Cancle</i></span> 

                            </h3>

                            <div class="box-tools pull-left" style="margin-top: 6px;">

                                    <select id="faq-language" name="faq-language" style="padding:4px;width:100%" onChange="changeFaqLanguage(this.value);">
                                        <option value="EN" <?php if ($_REQUEST['language'] == "EN") { ?> selected<?php } ?>>English</option>
                                        <option value="TH" <?php if ($_REQUEST['language'] == "TH") { ?> selected<?php } ?>>Thailand</option>
                                        <option value="LA" <?php if ($_REQUEST['language'] == "LA") { ?> selected<?php } ?>>Laos</option>
                                        <option value="MM" <?php if ($_REQUEST['language'] == "MM") { ?> selected<?php } ?>>Myanmar</option>
                                        <option value="PK" <?php if ($_REQUEST['language'] == "PK") { ?> selected<?php } ?>>Pakistan</option>
                                        <option value="SA" <?php if ($_REQUEST['language'] == "SA") { ?> selected<?php } ?>>Saudi Arabia</option>
                                        <option value="BD" <?php if ($_REQUEST['language'] == "BD") { ?> selected<?php } ?>>Bangladesh</option>
                                        <option value="IR" <?php if ($_REQUEST['language'] == "IR") { ?> selected<?php } ?>>Iran</option>
                                        <option value="VN" <?php if ($_REQUEST['language'] == "VN") { ?> selected<?php } ?>>Vietnam</option>
                                        <option value="ID" <?php if ($_REQUEST['language'] == "ID") { ?> selected<?php } ?>>Indonesia</option>
                                        <option value="RU" <?php if ($_REQUEST['language'] == "RU") { ?> selected<?php } ?>>Russia</option>
                                    </select> 

                            </div>                            

                        </div>

                                <div class="box-body table-responsive">

                                    <table id="listnewsdata" class="table table-bordered table-hover">

                                        <thead>

                                            <tr>

                                                <th class="nosort">#</th>

                                                <th>FAQ Title</th>

                                                <th>FAQ Detail</th>

                                                <th class="nosort">Date</th>

                                                <th class="nosort">Change</th>

                                                <th class="nosort">Delete</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                        <?php

													$mysqli->where("faq_language='".$_REQUEST['language']."'");

                                            $sql =	$mysqli->query("","t_faq");

                                            if($mysqli->num_rows()!=0){

                                                $sql = $mysqli->fetch_assoc();

                                                $i=0;

                                                foreach ($sql as $row){

                                                ++$i;

                                        ?>    

                                            <tr>

                                                <td><?php echo $i;?></td>

                                                <td><?php echo $row['Title'];?></td>

                                                <td><?php echo substr_utf8($row['Detail'],0,60);?></td>

                                                <td><?php echo $row['date'];?></td>

                                                <td style="text-align: center;width: 40px;">

                                                    <span class="btn btn-xs btn-warning edit-proj" 

                                                        onclick="update_faq('<?php echo $row['Auto_id'];?>')">

                                                        <i class="fa fa fa-pencil"></i> Edit

                                                    </span>                                                

                                                </td>

                                                <td style="text-align: center;width: 40px;">

                                                    <span class="btn btn-xs btn-danger del-new" 

                                                        onclick="del_faq('<?php echo $row['Auto_id'];?>');">

                                                        <i class="fa fa fa-times"></i> Del

                                                    </span>                                                    

                                                </td>

                                            </tr>

                                        <?php

                                                }

                                            }

                                        ?>  

                                        </tbody>

                                        <tfoot>

                                            <tr>

                                                <th>#</th>

                                                <th>Title</th>

                                                <th>Detail</th>

                                                <th>Date</th>

                                                <th>Change</th>

                                                <th>Delete</th>

                                            </tr>

                                        </tfoot>

                                    </table>

                                </div><!-- /.box-body -->                    

                </div>

        </div>