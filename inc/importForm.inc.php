<?php
/**
 * Created by PhpStorm.
 * User: Eyeshield
 * Date: 2018-10-24
 * Time: 10:18 PM
 */
?>
<form method="post" class="importForm" action="<?php echo $_SERVER['PHP_SELF']?>">
    <input type="file" name="importFile" value="">
    <input type="submit" name="import" value="Import" class="btn btn-primary">
</form>
<div id="importFormButtonBack">
    <button type="button"  class="btn btn-light" onclick="location.href='index.php'">Back to main menu</button>
</div>
