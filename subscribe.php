<?php

session_start();

include './connect.php';

?>

  <script>
    function fnSendSubscribe() {

      var x = document.forms["myForm"]["newsletter"].value;

      var atpos = x.indexOf("@");

      var dotpos = x.lastIndexOf(".");

      if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {

        $('#newsletter').focus();

        $('#error').fadeIn();

        setTimeout(function() {

          $('#error').fadeOut();

        }, 3000);

        return false;

      } else {

        var subscribe = $("#subscribe").val();

        var newsletter = $("#newsletter").val();

        $.post('action.subscribe.php', {
          subscribe: subscribe,
          newsletter: newsletter
        }, function(data) {

          if (data == "ok") {

            $('#success').fadeIn();

            setTimeout(function() {

              $('#success').fadeOut();

            }, 3000);

          };

        });

        return true;

      }

    }
  </script>

  <div id="newsletter-wrap">

    <h2 style="font-size:13.7px;">Subscribe to our Newsletter </h2>

    <div class="notification-box notification-box-success" style="display: none;">

      <p>You have successfully subscribed to our newsletter. Look for the confirmation email.</p>

      <a href="#" class="notification-close notification-close-success">x</a>

    </div>

    <form name="myForm" id="newsletter-form" class="content-form clearfix" action="#" method="post" novalidate>

      <span id="success" style="color:green;display:none">Subscribe complete...</span>

      <span id="error" style='color:red;display:none'>Email address is not valid...</span>

      <input id="newsletter" type="email" name="newsletter" placeholder="Enter your email" class="required">

      <input id="subscribe" class="button" type="button" name="subscribe" value="Subscribe" onClick="fnSendSubscribe();">

    </form>
  </div>
  <div class="clear"></div>
  <div class="one-fourths" style="text-align:center;margin-top:5px;">
    <h2 style="font-size: 13.7px;">Download</h2>
  </div>
  <div class="clear"></div>
  <?php
$pdfImg = "";
$pdfFile = "";
$dwTitle = "";
$catPdf = "";

if($color !="4"){
    $pdfImg = "img/FishmealBrochure_16.jpg";
    $pdfFile = "file-pdf/FishmealBrochure_16_page.pdf";
    $dwTitle = "Fishmeal plants ";
    $catPdf = "ASTWFishmealPlant.pdf";
    
}else{
    $pdfImg = "img/Rendering_16_page.jpg";
    $pdfFile = "file-pdf/Rendering_16_page.pdf";
    $dwTitle = "Rendering plants ";
    $catPdf = "ASTWRenderingPlant.pdf";
}
?>

    <div class="one-half txt-center download-pdf">
      <a href="file-pdf/<?php echo $catPdf; ?>" title="Download" target="_blank">
        <div class="box-for-pdf-img">
          <div class="entry-image">
            <img src="img/FishmealEngCatOnline.jpg">
          </div>
        </div>
        <h4>Catalogue</h4>
      </a>
    </div>
    <div class="one-half column-last txt-center download-pdf">
      <a href="<?php echo $pdfFile;?>" title="Download <?php echo $dwTitle;?> Brochure" target="_blank">
        <div class="box-for-pdf-img">
          <div class="entry-image">
            <img src="<?php echo $pdfImg;?>">
          </div>
        </div>
        <h4>Brochure</h4>
      </a>

    </div>