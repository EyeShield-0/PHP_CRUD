<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 2018-10-15
 * Time: 12:06 PM
 */

//open mo new handle tas loop ka then inistore mo mga id sa isang array variable
//gawa ka variable nag nag sstore lahat ng id
// tapos gamitin mo yung max function
// tas i plus plus mo nalang yung nakuha mong value gamit yung value
include'functions.inc.php';
add();
?>
<form class="addForm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <p>Enter item to be added</p>
    <div class="form-group">
        <label for="AC#">AC#</label>
        <input type="text" class="form-control" name="ac#" aria-describedby="ac#" placeholder="Enter AC#" required autocomplete="off">
    </div>

    <div class="form-group">
        <label for="artist">Artist</label>
        <input type="text" class="form-control" name="artist" aria-describedby="artist" placeholder="Enter Artist" autocomplete="off">
    </div>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" aria-describedby="title" placeholder="Enter Title" required autocomplete="off">
    </div>

    <div class="form-group">
        <label for="date">Year</label>
        <input type="text" class="form-control" name="date" aria-describedby="date" required placeholder="Enter Year" autocomplete="off">
    </div>

    <div class="form-group">
        <label for="medium">Medium</label>
        <input type="text" class="form-control" name="medium" aria-describedby="medium" placeholder="Enter Medium" autocomplete="off">
    </div>

    <div class="form-group">
        <label for="dimension">Dimension</label>
        <input type="text" class="form-control" name="dimension" aria-describedby="dimension" placeholder="Enter Dimension" autocomplete="off">
    </div>

    <div class="form-group">
        <label for="category">Category</label>
        <input type="text" class="form-control" name="category" aria-describedby="category" placeholder="Enter Category" autocomplete="off">
    </div>




    <button type="submit" class="btn btn-primary">Submit</button>

</form>
<div id="addFormButtonBack">
<button type="button"  class="btn btn-light" onclick="location.href='index.php'">Back to main menu</button>
</div>



