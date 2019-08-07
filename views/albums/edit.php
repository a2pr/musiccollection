<div>
    <h3> Edit Album</h3>
</div>
<div>
    
    
    <form method='post' action="<?php $_SERVER['PHP_SELF'];?>">
    <?php
        $use=$_SESSION['user_data']['album_edit'];
    if(isset($_SESSION['user_data']['choose'])) :?>
        <div class="form-group">
            <label for="title">Album name:</label>
            <input type="text" name='title' class="form-control" placeholder="Title" value='<?php echo $use['album_name'] ;?>'>
        </div>
        <div class="form-group">
            <label for="artist">Artist name:</label>
            <input type="text" class="form-control"  name='artist_name' placeholder="Artist" value='<?php echo $use['artist_name'] ;?>'> 

        </div>
        <div class="form-group">
            <label for="year_release">Release date:</label>
            <input type="text" name='year_release' class="form-control" placeholder="2012-12-25" value='<?php echo $use['album_year_release'] ;?>'>
        </div>
        <div class="form-group">
            <label for="tracks"># tracks:</label>
            <input type="text" name='tracks' class="form-control" placeholder="1;24;26" value='<?php echo $use['tracks'] ;?>'>
        </div>
        <?php else:?>
        <div class="form-group">
            <label for="title">Album name:</label>
            <input type="text" name='title' class="form-control" placeholder="Title" value='<?php echo $use['title'] ;?>'>
        </div>
        <div class="form-group">
            <label for="artist">Artist name:</label>
            <input type="text" class="form-control"  name='artist_name' placeholder="Artist" value='<?php echo $use['artist'] ;?>'> 

        </div>
        <div class="form-group">
            <label for="year_release">Release date:</label>
            <input type="text" name='year_release' class="form-control" placeholder="2012-12-25" value='<?php echo $use['year_release'] ;?>'>
        </div>
        <div class="form-group">
            <label for="tracks"># tracks:</label>
            <input type="text" name='tracks' class="form-control" placeholder="1;24;26" value='<?php echo $use['tracks_number'] ;?>'>
        </div>
        <?php endif;?>
        <input class='btn btn-success' name='submit' value='Editing' type="submit">
        <a href="<?php echo ROOT_PATH;?>collections" class='btn btn-danger'>Go back </a>
 
    </form>
</div>