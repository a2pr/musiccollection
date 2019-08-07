<h1>Albums available</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Album</th>
      <th scope="col">artist</th>
      <th scope="col">Year of release</th>
      <th scope="col">#tracks</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
  <?php foreach($viewmodel as $item) : ?>
    <tr>
      
      <td><?php echo $item['title'];?></td>
      <td><?php echo $item['artist'];?></td>
      <td><?php echo $item['year_release'];?></td>
      <td><?php echo $item['tracks_number'];?></td>
      <td> 
      <form method='post' action="<?php $_SERVER['PHP_SELF'];?>">
        <input type="hidden" name='id' value='<?php echo $item['id'];?>'>
        <input type="hidden" name='title' value='<?php echo $item['title'];?>'>
        <input type="hidden" name='artist' value='<?php echo $item['artist'];?>'>
        <input type="hidden" name='year_release' value='<?php echo $item['year_release'];?>'>
        <input type="hidden" name='tracks_number' value='<?php echo $item['tracks_number'];?>'>
        <input class='btn btn-danger' name='remove' value='Remove' type="submit">
      <input class='btn btn-success' name='edit' value='Edit' type="submit">
      </form>
      </td>
    </tr>
    
    <?php endforeach; ?>
  </tbody>
</table>
<a href="<?php echo ROOT_PATH;?>albums/add" class='btn btn-success'>Add a new Album</a>      
<a href="<?php echo ROOT_PATH;?>collections" class='btn btn-danger'>Go back </a>
<!-- <?php foreach($viewmodel as $item): ?>

    <h2><?php   echo $item['title']  ;  ?></h2>

<?php endforeach; ?> -->