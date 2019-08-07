<div>
    <h3> New Artist</h3>
</div>
<?php if(isset($_SESSION['user_data']['choose'])): ?>
    <div class='bg-dark text-white text-center row p-3 '>
        <h5 class='col-12 '> Artists already added:</h5>
            <?php foreach($viewmodel as $item) : ?>
            <div class='row col-12'>
                <span class='col-10'><?php echo $item['name']. " /twitter: ".$item['twitter_handle'] ;?>  </span>
                <form class='col-2' method='post' action="<?php $_SERVER['PHP_SELF'];?>">
                    <input type="hidden" name='id' class="form-control" value='<?php echo $item['id']?>'>
                    <input type="hidden" name='name' class="form-control" value='<?php echo $item['name']?>'>
                    <input type="hidden" class="form-control"  name='artist_name' value='<?php echo $item['twitter_handle']?>' > 
                    <input class='btn btn-primary' name='added' value='added' type="submit">
                </form>
            <br/>
            </div>
            <?php endforeach; ?>
            
    </div>
    <?php endif; ?>
    <br/>
<div>
    <form method='post' action="<?php $_SERVER['PHP_SELF'];?>">
        <div class="form-group">
            <label for="artist_name">Artist name:</label>
            <input type="text" name='artist_name' class="form-control" placeholder="Ex: Deadmau">
        </div>
        <div class="form-group">
            <label for="twitter">Twitter</label>
            <input type="text" name='twitter' class="form-control" placeholder="Ex: @twitter">
        </div>
        <input class='btn btn-primary' name='submit' value='Submit' type="submit">
    </form>
</div>