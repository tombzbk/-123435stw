<footer id="footer">

    <div class="container">

        <!-- begin footer top -->

        <div id="footer-top">

            <?php
            $linkLang = $lang . "/AboutASTW/";

            if ($lang == "TH") {

                $footTitle1 = "เอ & เอส ไทยเวิร์ค บริษัทจำกัด";

                $footTitle2 = "เกี่ยวกับ ASTW";

                if ($color == "4") {

                    $footTitle3 = "การแสดงผลพืช";
                } else {

                    $footTitle3 = "โรงงานผลิตปลาป่น";
                }

                $footTitle4 = "คำถามที่พบบ่อย";

                $footTitle5 = "ติดตาม";

                $subFoot1 = '	<li>

											<a href="#">99/199  หมู 1</a>

										</li>

										<li>

											<a href="#">ถนนเทพารักษ์, กม. 22</a>

										</li>

										<li>

											<a href="#">บางเสาธง</a>

										</li>

										<li>

											<a href="#">สมุทรปราการ 10570</a>

										</li>

										<li>

											<a href="#">ประเทศไทย</a>

										</li>

										<li>

											<a href="#">โทร. : +66 2313 1540</a>

										</li>

										<li>

											<a href="#">แฟกซ์ : +66 2313 1550</a>

										</li>

										<li>

											<a href="#">อีเมล์ : sales@asthaiworks.com</a>

										</li> ';

                $subFoot2 = '	<li>

											<a href="' . $linkLang . '">- ข้อมูล บริษัท</a>

										</li>

										<li>

											<a href="' . $linkLang . '">- ทีมงาน</a>

										</li>

										<li>

											<a href="' . $linkLang . '">- องค์การ</a>

										</li>';
            } else {

                $footTitle1 = "A & S Thai Works Co., Ltd.";

                $footTitle2 = "About ASTW";

                if ($color == "4") {

                    $footTitle3 = "Rendering Plants";
                } else {

                    $footTitle3 = "Fishmeal Plants";
                }

                $footTitle4 = "FAQ";

                $footTitle5 = "Follow Us";

                // sub

                $subFoot1 = '<li>

											<a href="#">99/199  Moo 1</a>

										</li>

										<li>

											<a href="#">Theparak Road, Km 22</a>

										</li>

										<li>

											<a href="#">Bangsaothong</a>

										</li>

										<li>

											<a href="#">Samut Prakarn 10570</a>

										</li>

										<li>

											<a href="#">Thailand</a>

										</li>

										<li>

											<a href="#">Tel. : +66 2313 1540</a>

										</li>

										<li>

											<a href="#">Fax : +66 2313 1550</a>

										</li>

										<li>

											<a href="#">Email : sales@asthaiworks.com</a>

										</li> ';

                $subFoot2 = '	<li>

											<a href="' . $linkLang . '">- Company Profile</a>

										</li>

										<li>

											<a href="' . $linkLang . '">- Team</a>

										</li>

										<li>

											<a href="' . $linkLang . '">- Organisation</a>

										</li>';
            }
            ?>

            <div class="foot1">

                <div>

                    <h3><a href="#"><?php echo $footTitle1 ?></a></h3>

                    <ul>

<?php echo $subFoot1 ?>

                    </ul>

                </div>

            </div>

            <div class="foot2">

                <div>

                    <h3><a href="<?php echo $lang ?>/AboutASTW/"><?php echo $footTitle2 ?></a></h3>

                    <ul>

<?php echo $subFoot2; ?>

                    </ul>

                </div>

            </div>



            <div class="foot3">

                <div>

                    <h3><a href="<?php echo $lang ?>/Rendering/"><?php echo $footTitle3 ?></a></h3>

                    <ul>

<?php
if ($color == '4') {

    $sql = " SELECT pl.`product_id`, pl.`product_n1`, pl.`product_n2`, pl.`product_n3`, pl.`product_n4`,"
            . " pl.`product_n5`, pl.`product_n6`, pl.`product_n7`, pl.`product_n8`, pl.`cuntry_id`, pl.`status` "
            . " ,tc.cuntry_name,tc.abbreviation"
            . " FROM `t_product_language_r` pl"
            . " JOIN  `t_cuntry` tc ON(tc.cuntry_id=pl.cuntry_id)"
            . " WHERE tc.abbreviation='" . $lang . "'";

    $res = $mysqli->query($sql);

    $num = $res->num_rows;

    if ($num == 0) {
        
    } else {

        $row = $res->fetch_assoc();

        $cuntry = $row['abbreviation'];

        $_SESSION['_cuntry'] = $cuntry;

        $product_n1 = $row['product_n1'];

        $product_n2 = $row['product_n2'];

        $product_n3 = $row['product_n3'];

        $product_n4 = $row['product_n4'];

        $product_n5 = $row['product_n5'];

        $product_n6 = $row['product_n6'];

        $product_n7 = $row['product_n7'];

        $product_n8 = $row['product_n8'];
    }
    ?>

                            <li>

                                <a href="<?php echo $lang ?>/rendering/Disk-driers/">- <?php echo $product_n1; ?></a>

                            </li>

                            <li>

                                <a href="<?php echo $lang ?>/rendering/How-to-choose-a-Fishmeal-Plant/">- <?php echo $product_n2; ?></a>

                            </li>

                            <li>

                                <a href="<?php echo $lang ?>/rendering/Twin-Screw-Presses/">- <?php echo $product_n3; ?></a>

                            </li>

                            <li>

                                <a href="<?php echo $lang ?>/rendering/Fish-Coockers/">- <?php echo $product_n4; ?></a>

                            </li>

                            <li>

                                <a href="<?php echo $lang ?>/rendering/Complete-Fishmeal-Plants/">- <?php echo $product_n5; ?></a>

                            </li>

                            <li>

                                <a href="<?php echo $lang ?>/rendering/Deodoriser-smell-removal/">- <?php echo $product_n6; ?></a>

                            </li>

                            <li>

                                <a href="<?php echo $lang ?>/rendering/Energy-saving/">- <?php echo $product_n7; ?></a>

                            </li>

                            <li>

                                <a href="<?php echo $lang ?>/rendering/Accessories/">- <?php echo $product_n8; ?></a>

                            </li>

<?php
} else {

    $sql = " SELECT pl.`product_id`, pl.`product_n1`, pl.`product_n2`, pl.`product_n3`, pl.`product_n4`,"
            . " pl.`product_n5`, pl.`product_n6`, pl.`product_n7`, pl.`product_n8`, pl.`cuntry_id`, pl.`status` "
            . " ,tc.cuntry_name,tc.abbreviation"
            . " FROM `t_product_language` pl"
            . " JOIN  `t_cuntry` tc ON(tc.cuntry_id=pl.cuntry_id)"
            . " WHERE tc.abbreviation='" . $lang . "'";

    $res = $mysqli->query($sql);

    $num = $res->num_rows;

    if ($num == 0) {
        
    } else {

        $row = $res->fetch_assoc();

        $cuntry = $row['abbreviation'];

        $_SESSION['_cuntry'] = $cuntry;

        $product_n1 = $row['product_n1'];

        $product_n2 = $row['product_n2'];

        $product_n3 = $row['product_n3'];

        $product_n4 = $row['product_n4'];

        $product_n5 = $row['product_n5'];

        $product_n6 = $row['product_n6'];

        $product_n7 = $row['product_n7'];

        $product_n8 = $row['product_n8'];
    }
    ?>

                            <li>

                                <a href="<?php echo $lang ?>/Disk-driers/">- <?php echo $product_n1; ?></a>

                            </li>

                            <li>

                                <a href="<?php echo $lang ?>/How-to-choose-a-Fishmeal-Plant/">- <?php echo $product_n2; ?></a>

                            </li>

                            <li>

                                <a href="<?php echo $lang ?>/Twin-Screw-Presses/">- <?php echo $product_n3; ?></a>

                            </li>

                            <li>

                                <a href="<?php echo $lang ?>/Fish-Coockers/">- <?php echo $product_n4; ?></a>

                            </li>

                            <li>

                                <a href="<?php echo $lang ?>/Complete-Fishmeal-Plants/">- <?php echo $product_n5; ?></a>

                            </li>

                            <li>

                                <a href="<?php echo $lang ?>/Deodoriser-smell-removal/">- <?php echo $product_n6; ?></a>

                            </li>

                            <li>

                                <a href="<?php echo $lang ?>/Energy-saving/">- <?php echo $product_n7; ?></a>

                            </li>

                            <li>

                                <a href="<?php echo $lang ?>/Accessories/">- <?php echo $product_n8; ?></a>

                            </li>

<?php } ?>

                    </ul>

                </div>

            </div>

            <div class="foot4">

                <div>

                    <h3><a href="faq.php"><?php echo $footTitle4 ?></a></h3>

                    <ul>

<?php
$sql = " SELECT `Auto_id`, `Title` FROM `t_faq` WHERE faq_language='" . $lang . "' order by `Auto_id` desc LIMIT 0,5 ";

$res = $mysqli->query($sql);

if ($res->num_rows == 0) {

    $sql = " SELECT `Auto_id`, `Title` FROM `t_faq` WHERE faq_language='EN' order by `Auto_id` desc LIMIT 0,5 ";

    $res = $mysqli->query($sql);

    while ($row = $res->fetch_array()) {
        ?>

                                <li>

                                    <a href="#"><?php echo $row['Title']; ?></a>

                                </li>

                                <?php
                            }// while
                        } else {

                            while ($row = $res->fetch_array()) {
                                ?>

                                <li>

                                    <a href="#"><?php echo $row['Title']; ?></a>

                                </li>

                            <?php }// while
                        }
                        ?>



                    </ul>

                </div>

            </div>

            <div   class="foot5">

                <div>

                    <h3><a href="#p"><?php echo $footTitle5 ?></a></h3>

                    <ul style="width:200px;">



                        <li>

                            <div class="social-links">

                                <ul>

                                    <li class="twitter"><a href="https://www.facebook.com/A-S-Thai-Works-Co-Ltd-506796669361547/" title="Facebook" target="_blank">Facebook</a></li>

                                    <li class="facebook"><a href="mailto:sales@asthaiworks.com" title="Email" target="_top">Email</a></li>

                                        <!-- <li><a href="https://www.facebook.com/A-S-Thai-Works-Co-Ltd-506796669361547/" class="icoFacebook" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>

                                    <li><a href="mailto:sales@asthaiworks.com" class="email" title="Email" target="_top"><i class="fa fa-envelope" aria-hidden="true"></i></a></li> -->

                                </ul>

                            </div>

                        </li>



                    </ul>

                </div>

            </div>

        </div>

    </div>

    <!-- end footer top -->

</footer>

