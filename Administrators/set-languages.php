<select id="set-language" name="set-language" onChange="javascript:changeLanguage(this.value);"  class="form-control">
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