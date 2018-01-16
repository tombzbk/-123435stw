<?php
$menu = '0';
include './rendering-header.php';
$_type = "f";
if ($page2 == '1') {
    $_type = "f";
} else if ($page2 == '4') {
    $_type = "r";
}

function page_navigator($before_p, $plus_p, $total, $total_p, $chk_page, $urlThisPage) {
    global $urlquery_str;
    $pPrev = $chk_page - 1;
    $pPrev = ($pPrev >= 0) ? $pPrev : 0;
    $pNext = $chk_page + 1;
    $pNext = ($pNext >= $total_p) ? $total_p - 1 : $pNext;
    $lt_page = $total_p - 4;
    if ($chk_page > 0) {
        echo "<a  href='" . $urlThisPage . "/" . $pPrev . "/" . $urlquery_str . "' class='naviPN'>&laquo;</a>";
    }
    if ($total_p >= 11) {
        if ($chk_page >= 4) {
            echo "<a $nClass href='" . $urlThisPage . "/" . '0' . "/" . $urlquery_str . "'>1</a><a class='SpaceC'>. . .</a>";
        }
        if ($chk_page < 4) {
            for ($i = 0; $i < $total_p; $i++) {
                $nClass = ($chk_page == $i) ? "class='active'" : "";
                if ($i <= 4) {
                    echo "<a $nClass href='" . $urlThisPage . "/" . $i . "/" . $urlquery_str . "'>" . intval($i + 1) . "</a> ";
                }
                if ($i == $total_p - 1) {
                    echo "<a class='SpaceC'>. . .</a><a $nClass href='" . $urlThisPage . "/" . $i . "/" . $urlquery_str . "'>" . intval($i + 1) . "</a> ";
                }
            }
        }
        if ($chk_page >= 4 && $chk_page < $lt_page) {
            $st_page = $chk_page - 3;
            for ($i = 1; $i <= 5; $i++) {
                $nClass = ($chk_page == ($st_page + $i)) ? "class='active'" : "";
                echo "<a $nClass href='" . $urlThisPage . "/" . intval($st_page + $i) . "'>" . intval($st_page + $i + 1) . "</a> ";
            }
            for ($i = 0; $i < $total_p; $i++) {
                if ($i == $total_p - 1) {
                    $nClass = ($chk_page == $i) ? "class='active'" : "";
                    echo "<a class='SpaceC'>. . .</a><a $nClass href='" . $urlThisPage . "/" . $i . "/" . $urlquery_str . "'>" . intval($i + 1) . "</a> ";
                }
            }
        }
        if ($chk_page >= $lt_page) {
            for ($i = 0; $i <= 4; $i++) {
                $nClass = ($chk_page == ($lt_page + $i - 1)) ? "class='active'" : "";
                echo "<a $nClass href='" . $urlThisPage . "/" . intval($lt_page + $i - 1) . "'>" . intval($lt_page + $i) . "</a> ";
            }
        }
    } else {
        for ($i = 0; $i < $total_p; $i++) {
            $nClass = ($chk_page == $i) ? "class='active'" : "";
            echo "<a href='" . $urlThisPage . "/" . $i . "/" . $urlquery_str . "' $nClass  >" . intval($i + 1) . "</a> ";
        }
    }
    if ($chk_page < $total_p - 1) {
        echo "<a href='" . $urlThisPage . "/" . $pNext . "/" . $urlquery_str . "'  class='naviPN'>&raquo;</a>";
    }
}
?>

<article id="box-article">
    <?php
    $sql = sprintf("SELECT id, header  FROM t_refurbished  WHERE _type='%s' AND status <>'B' ORDER BY  sort DESC ", $_type);
    $query = $mysqli->query($sql);
    $total = $query->num_rows;
    $e_page = 11;
    if (!isset($arr[6])) {
        $arr[6] = 0;
    } else {
        $chk_page = $arr[6];
        $arr[6] = $arr[6] * $e_page;
    }
    $sql .= " LIMIT " . $arr[6] . ",$e_page";
    $sql .= " ";
    $query = $mysqli->query($sql);
    if ($query->num_rows >= 1) {
        $plus_p = ($chk_page * $e_page) + $query->num_rows;
    } else {
        $plus_p = ($chk_page * $e_page);
    }
    $total_p = ceil($total / $e_page);
    $before_p = ($chk_page * $e_page) + 1;

    while ($row = $query->fetch_assoc()) {
        ?>
        <div class="add-margin-top inxed-box">
            <!--<a href="javascript:void(0);" class="show-article-popup" data-role="<?php echo $row["id"]; ?>" title="Click me to read more...">-->
            <div class="one-fourth thumbnail-article col-1">
                <div class="entry-image">
                    <?php
                    $sqlCover = sprintf("SELECT name FROM t_content_files WHERE status <> 'B' AND id_content='%s' AND _type='cover'", $row["id"]);
                    $result = $mysqli->query($sqlCover);
                    $Cover = $result->fetch_assoc();
                    ?>
                    <a href="javascript:void(0);" class="show-article-popup" data-role="<?php echo $row["id"]; ?>" title="Click me to read more..." data-active="cover">
                        <img src="images/upload-files-contents/<?php echo $Cover["name"]; ?>" alt="">
                    </a>
                </div>
            </div>
            <div class="one-half thumbnail-article col-2">
                <a href="javascript:void(0);" class="show-article-popup" data-role="<?php echo $row["id"]; ?>" title="Click me to read more..." data-active="null">
                    <h2><?php echo $row["header"]; ?></h2>	
                    <?php
                    $sqlExc = sprintf("SELECT content FROM  t_excerpt_content WHERE status <> 'B' AND id_content='%s' AND lang_code='%s'", $row["id"], $lang);
                    $resExc = $mysqli->query($sqlExc);
                    if ($resExc->num_rows == 0) {
                        $sqlContent = sprintf("SELECT detail FROM t_content_detail WHERE status <> 'B' AND mainId='%s' AND lang_code='%s'", $row["id"], $lang);
                        $resContent = $mysqli->query($sqlContent);
                        $rowCon = $resContent->fetch_assoc();
                        echo decodeToHtml($rowCon["detail"]);
                    } else {
                        $rowExc = $resExc->fetch_assoc();
                        echo '<p>' . $rowExc["content"] . '</p>';
                    }
                    ?>
                    <p style="margin-top: 1%;"></p>
                    <?php
                    $sqlInfo = sprintf("SELECT lebel FROM t_content_info WHERE status <> 'B' AND content_id='%s' and lang='%s'", $row["id"], $lang);
                    $queryInfo = $mysqli->query($sqlInfo);
                    if ($queryInfo->num_rows >= 1) {
                        while ($rowInfo = $queryInfo->fetch_assoc()) {
                            echo '<p>Price in Thai baht : <b> ' . decodeToHtml($rowInfo["lebel"]) . '</b></p>';
                        }
                    } else {
                        
                    }
                    ?>

                </a>
            </div>
            <div class="one-third thumbnail-article col-3 column-last">
                <div class="entry-image">
                    <?php
                    $sqlImg1 = sprintf("SELECT name FROM t_content_files WHERE status <> 'B' AND id_content='%s' AND _type='img1'", $row["id"]);
                    $result = $mysqli->query($sqlImg1);
                    $img1 = $result->fetch_assoc();
                    ?>                        
                    <a href="javascript:void(0);" class="show-article-popup" data-role="<?php echo $row["id"]; ?>" title="Click me to read more..." data-active="img1">
                        <img src="images/upload-files-contents/<?php echo $img1["name"]; ?>" alt="">
                    </a>
                </div>
                <div class="entry-image">
                    <?php
                    $sqlImg2 = sprintf("SELECT name FROM t_content_files WHERE status <> 'B' AND id_content='%s' AND _type='img2'", $row["id"]);
                    $result = $mysqli->query($sqlImg2);
                    $img2 = $result->fetch_assoc();
                    ?>                        
                    <a href="javascript:void(0);" class="show-article-popup" data-role="<?php echo $row["id"]; ?>" title="Click me to read more..." data-active="img2">
                        <img src="images/upload-files-contents/<?php echo $img2["name"]; ?>" alt="">
                    </a>
                </div>
            </div>
            <!--</a>-->            
        </div>
        <div class="clear"></div>
        <!--        <div style="    width: 96%;     margin-left: 2.9%;">
                    <hr>
                </div>-->
    <?php } ?>

</article>
<div class="clear"></div>
<?php if ($total > 0) { ?>
    <div class="center">
        <div class="pagination">
            <?php
            page_navigator($before_p, $plus_p, $total, $total_p, $chk_page, $urlThisPage);
            ?>
        </div>

    </div>
<?php } ?>

<?php include './rendering-footer.php'; ?>

