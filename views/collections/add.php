<div>
    <h3> New Collection</h3>
</div>
<div>
    <form method='post' action="<?php $_SERVER['PHP_SELF'];?>">
        <div class="form-group">
            <label for="exampleInputEmail1">Name your collection:</label>
            <input type="text" name='name' class="form-control" placeholder="EX: someCollection, no space between">
        </div>
        <input class='btn btn-primary' name='submit' value='Submit' type="submit">
    </form>
    <a href="<?php echo ROOT_PATH;?>collections" class='btn btn-danger'>Go back </a>
</div>