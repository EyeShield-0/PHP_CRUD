

<form class="form-inline" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <div class="form-group mx-sm-3 mb-2">
        <label for="inputPassword2" class="sr-only" >Search</label>
        <input type="text" class="form-control" name="searchEdit" placeholder="Enter ID to edit" autocomplete="off" required>
    </div>
    <button type="submit" class="btn btn-light mb-2">ID Select</button>

</form>
<form class="editForm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <p>Edit Mode</p>

    <div class="form-group mx-sm-3 mb-2">
        <label for="AC#">ID</label>
        <input type="text" class="form-control" name="ID"  autocomplete="off" value="<?php echo isset($_POST['searchEdit']) ? $_POST['searchEdit'] : " " ;?>" readonly>
    </div>

    <div class="form-group">
        <label for="AC#">AC#</label>
        <input type="text" class="form-control" name="ac#" aria-describedby="ac#"  required autocomplete="off" value="<?php echo $ac ?>">
    </div>

    <div class="form-group">
        <label for="artist">Artist</label>
        <input type="text" class="form-control" name="artist" aria-describedby="artist"  autocomplete="off" value="<?php echo $artist ?>">
    </div>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" aria-describedby="title" required autocomplete="off" value="<?php echo  $title ?>">
    </div>

    <div class="form-group">
        <label for="date">Year</label>
        <input type="text" class="form-control" name="date" aria-describedby="date" required  autocomplete="off" value="<?php echo $date ?>">
    </div>

    <div class="form-group">
        <label for="medium">Medium</label>
        <input type="text" class="form-control" name="medium" aria-describedby="medium"  autocomplete="off" value="<?php echo  $medium ?>">
    </div>

    <div class="form-group">
        <label for="dimension">Dimension</label>
        <input type="text" class="form-control" name="dimension" aria-describedby="dimension" autocomplete="off" value="<?php echo  $dimension?>">
    </div>

    <div class="form-group">
        <label for="category">Category</label>
        <input type="text" class="form-control" name="category" aria-describedby="category"  autocomplete="off" value="<?php  echo $category ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

</form>
