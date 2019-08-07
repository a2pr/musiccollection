<div>
    <h3> New Album</h3>
</div>
<div>
    <?php if(isset($_SESSION['user_data']['choose'])): ?>
    <div class='bg-dark text-white text-center row p-3 '>
        <h5 class='col-12 '> Albums already added:</h5>
            <?php foreach($viewmodel as $item) : ?>
            <div class='row col-12'>
                <span class='col-10'><?php echo $item['title']. " /artist: ".$item['artist'] . " / with a number of tracks: ". $item['tracks_number']  ;?>  </span>
                <form class='col-2' method='post' action="<?php $_SERVER['PHP_SELF'];?>">
                    <input type="hidden" name='id' class="form-control" value='<?php echo $item['id']?>'>
                    <input type="hidden" name='title' class="form-control" value='<?php echo $item['title']?>'>
                    <input type="hidden" class="form-control"  name='artist_name' value='<?php echo $item['artist']?>' > 
                    <input type="hidden" name='year_release' class="form-control" value=' <?php echo $item['year_release']?>' >
                    <input type="hidden" name='tracks_number' class="form-control" value=' <?php echo $item['tracks_number']?>'>
                    <input class='btn btn-primary' name='added' value='added' type="submit">
                </form>
            <br/>
            </div>
           
            <?php endforeach; ?>
            
    </div>
    <?php endif; ?>
    <br>
    <form method='post' action="<?php $_SERVER['PHP_SELF'];?>">
        <div class="form-group">
            <label for="title">Album name:</label>
            <input type="text" name='title' class="form-control" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="artist">Artist name:</label>
            <input type="text" class="form-control"  name='artist_name' placeholder="Artist"> 

        </div>
        <div class="form-group">
            <label for="realease date">Release date:</label>
            <input type="text" name='year_release' class="form-control" placeholder="2012-12-25">
        </div>
        <div class="form-group">
            <label for="tracks"># tracks:</label>
            <input type="text" name='tracks' class="form-control" placeholder="1;24;26">
        </div>

        <input class='btn btn-primary' name='submit' value='Submit' type="submit">
    </form>
</div>