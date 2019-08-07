<h2>Your collections: </h2>
<div class='row'>

  <div class=' col'>
    <div class="list-group">
      
      <form method='post' action="<?php $_SERVER['PHP_SELF'];?>">

        <div class="input-group" >
        <select class="custom-select" name="choose">
        <?php foreach($viewmodel as $item) : ?>
          <option class="list-group-item list-group-item-action " value="<?php echo $item['name'];?>">
          <?php echo $item['name'];?>
          </option>
          
          <?php endforeach; ?>
        </select>
        <div class="input-group-append">
        <input class='btn btn-outline-secondary' name='album' value='Check Collection' type="submit">
        </div>
        </div>
       
        
    </form>
      
    </div>
    
    <?php if(isset($_SESSION['is_logged_in'])) :?>
       <div class='text-center mt-2'>
       <a href="<?php echo ROOT_PATH;?>collections/add" class='btn btn-success'>Add a new collection</a>
       <a href="<?php echo ROOT_PATH;?>albums" class='btn btn-secondary'>See our albums</a>
       <a href="<?php echo ROOT_PATH;?>artists" class='btn btn-warning'>See our artists</a>

       </div>
      <?php endif;?>
  </div>
</div>