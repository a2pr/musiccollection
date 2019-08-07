<h1>Albums from <?php echo $_SESSION['user_data']['album']['name']?></h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Album</th>
      <th scope="col">Year of release</th>
      <th scope="col">#tracks</th>
    </tr>
  </thead>

  <tbody>
  <?php foreach($viewmodel as $item) : ?>
    <tr>
      
      <td><?php echo $item['title'];?></td>
      <td><?php echo $item['year_release'];?></td>
      <td><?php echo $item['tracks_number'];?></td>
      <td> 
      </td>
    </tr>
    
    <?php endforeach; ?>
  </tbody>
</table>