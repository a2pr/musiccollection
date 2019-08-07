<div>
    <h3> Edit Artist: <?php echo $_SESSION['user_data']['artist_edit']['name']?> </h3>
</div>
<div>
    
    
    <form method='post' action="<?php $_SERVER['PHP_SELF'];?>">
        <div class="form-group">
            <label for="title">Name:</label>
            <input type="text" name='artist_name' class="form-control" placeholder="Ex: Led Zepellin" value='<?php echo  $_SESSION['user_data']['artist_edit']['name'] ;?>'>
        </div>
        <div class="form-group">
            <label for="artist">Twitter:</label>
            <input type="text" class="form-control"  name='twitter' placeholder="Ex: @Twitter" value='<?php echo  $_SESSION['user_data']['artist_edit']['twitter_handle'] ;?>'> 

        </div>
        <input class='btn btn-success' name='submit' value='Editing' type="submit">
        <a href="<?php echo ROOT_PATH;?>collections" class='btn btn-danger'>Go back </a>
 
    </form>
</div>