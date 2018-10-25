<?php
include 'functions.inc.php';
delete();
?>

<form class="deleteForm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <p>Enter item to be Deleted</p>
    <div class="form-group">
        <label for="ID">ID</label>
        <input type="text" class="form-control" name="deleteID" aria-describedby="deleteID" placeholder="Enter ID to Delete" required autocomplete="off">
    </div>
    <button type="submit" class="btn btn-primary">Delete</button>
</form>
