<div class="one-fourth bg-left">
    <div class="entry-image" style="position:relative" id="pic-left">
        <a href="renderingplants.php">
            <img src="Fishmeal-Plant/fishmeal-left-box.jpg">
            <div class="bg_left"></div>
            <span style="position:absolute;top: 5px;left: 13px;color:#FFFFFF;font-size:15px;">Fishmeal Plants</span>
        </a>
    </div>
    <?php include 'subscribe.php'; ?>
</div>
<div class="three-fourths column-last">
    <h1 id="page-title">Disk Driers</h1>
    <section>
        <div id="cal_left">
            <?php
            $sql = "SELECT * FROM t_content WHERE content_page='r-Disk'";
            $result = $mysqli->query($sql);
            $row = $result->fetch_assoc();
            if ($row['content_detail_' . $lang] == "") {
                echo decodeToHtml($row['content_detail_EN']);
            } else {
                echo decodeToHtml($row['content_detail_' . $lang]);
            }
            $dowloadPdf = $row['pdf'];
            $urlPdf = $row['urlPDF'];
            ?>
        </div>
        <div class="right-third column-last">
            <div class="entry-image float-right">
                <a class="" href="rendering-plants/Disk-driers/01-disk.jpg" data-lightbox="ASTW-Chicken" data-title="">
                    <span class="overlay zoom"></span>
                    <img src="rendering-plants/Disk-driers/thumb/01-disk.jpg" alt="" title="">
                </a>
            </div>
            <div class="entry-image float-right">
                <a class="" href="rendering-plants/Disk-driers/02-disk.jpg" data-lightbox="ASTW-Chicken" data-title="">
                    <span class="overlay zoom"></span>
                    <img src="rendering-plants/Disk-driers/thumb/02-disk.jpg" alt="" title="">
                </a>
            </div>
            <div class="entry-image float-right">
                <a class="" href="rendering-plants/Disk-driers/03-disk.jpg" data-lightbox="ASTW-Chicken" data-title="">
                    <span class="overlay zoom"></span>
                    <img src="rendering-plants/Disk-driers/thumb/03-disk.jpg" alt="" title="">
                </a>
            </div>
        </div>
        <div class="clear"></div>
    </section>
    <p style="margin-top:30px;">
        <?php
        if ($dowloadPdf != "") {
            $dis = "block";
        } else {
            $dis = "none";
        }
        if ($urlPdf != "") {
            $dis2 = "block";
        } else {
            $dis2 = "none";
        }
        ?>
    <div>
        <div style="display: <?php echo $dis; ?>;float: left;margin-right: 10%">
            <span style="float:left;color: red">Download :</span>
            <span style="position:relative">
                <a href="file-pdf/<?php echo $dowloadPdf; ?>" target="_blank" class="tooltips">
                    <img src="img/file_pdf.png" width="18">
                    <span>Disk Driers</span>
                </a>
            </span>
        </div>
        <div style="display: <?php echo $dis2; ?>;">
            <a href="<?php echo $urlPdf; ?>"  style="float:left;" target="_blank">Link to pdf </a>
        </div>
    </div>
</p>
<div style="clear: both"></div>
<div style="margin:30px;"></div>
</div>