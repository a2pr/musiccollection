<div>
<h2> Collection : <?php echo $_SESSION['user_data']['choose'];?></h2>
<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Album</th>
      <th scope="col">Year of release</th>
      <th scope="col">artist</th>

      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
  <?php foreach($viewmodel as $item) : ?>
    <tr>
      <th scope="row"><?php echo $item['album_name'];?></th>
      <td><?php echo $item['album_year_release'];?></td>
      <td><?php echo $item['artist_name'];?></td>
      <td> 
      <form method='post' action="<?php $_SERVER['PHP_SELF'];?>">
      <input type="hidden" name='id' value='<?php echo $item['album_id'];?>'>
      <input type="hidden" name='album_name' value='<?php echo $item['album_name'];?>'>
      <input type="hidden" name='album_year_release' value='<?php echo $item['album_year_release'];?>'>
      <input type="hidden" name='artist_name' value='<?php echo $item['artist_name'];?>'>
      <input type="hidden" name='tracks' value='<?php echo $item['tracks'];?>'>
      <input class='btn btn-danger' name='remove' value='Remove' type="submit">
      <input class='btn btn-success' name='edit' value='Edit' type="submit">
      </form>
      
       </td>
    </tr>
    
    <?php endforeach; ?>
  </tbody>
</table>
<a href="<?php echo ROOT_PATH;?>albums/add" class='btn btn-success'>Add a new Album</a>      
<a href="<?php echo ROOT_PATH;?>artists/add" class='btn btn-secondary'>Add a new artist</a>      
<a href="<?php echo ROOT_PATH;?>collections" class='btn btn-danger'>Go back </a>      
         
          
         
          
          
</div>