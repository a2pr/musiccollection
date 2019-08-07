<h1>Artists available</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Artist</th>
      <th scope="col">Twitter</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>       
  <?php foreach($viewmodel as $item) : ?>
    <tr>
      
      <td><?php echo $item['name'];?></td>
      <td><a href="https://twitter.com/<?php echo $item['twitter_handle'];?>"><?php echo $item['twitter_handle'];?></a></td>
      <td> 
      <form method='post' action="<?php $_SERVER['PHP_SELF'];?>">
      <input type="hidden" name='id' value='<?php echo $item['id'];?>'>
      <input type="hidden" name='name' value='<?php echo $item['name'];?>'>
      <input type="hidden" name='twitter_handle' value='<?php echo $item['twitter_handle'];?>'>
      <input class='btn btn-danger' name='remove' value='Remove' type="submit">
      <input class='btn btn-success' name='edit' value='Edit' type="submit">
      <input class='btn btn-secondary' name='show' value='Show albums' type="submit">
      </form>
    </tr>
    
    <?php endforeach; ?>
  </tbody>
</table>
<a href="<?php echo ROOT_PATH;?>artists/add" class='btn btn-success'>Add a new artist</a>      
<a href="<?php echo ROOT_PATH;?>collections" class='btn btn-danger'>Go back </a>
<!-- <?php foreach($viewmodel as $item): ?>

    <h2><?php   echo $item['title']  ;  ?></h2>

<?php endforeach; ?> -->