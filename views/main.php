<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo ROOT_URL;?>/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo ROOT_URL;?>/assets/css/style.css">
  <title>Music Collections</title>
</head>

<body class='py-5'>
  <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-dark navbar-light ">
    <a class="navbar-brand text-uppercase font-weight-bold text-white" href="<?php echo ROOT_PATH;?>">Music Collection
      project</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link text-uppercase font-weight-bold text-white" href="<?php echo ROOT_PATH;?>collections">Collections <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-uppercase font-weight-bold text-white" href="<?php echo ROOT_PATH;?>artists">Artists</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-uppercase font-weight-bold text-white" href="<?php echo ROOT_PATH;?>albums">Albums</a>
        </li>

        <?php if(isset($_SESSION['is_logged_in'])): ?>
        <li class="nav-item">
          <span class="nav-link text-uppercase font-weight-bold text-white" >Welcome, <?php echo $_SESSION['user_data']['username'];?> </span>
        </li>
        <li class="nav-item">
          <a class="nav-link text-uppercase font-weight-bold text-white" href="<?php echo ROOT_URL;?>users/logout">logut</a>
        
        </li>
        <?php else: ?>
        <li class="nav-item">
          <a class="nav-link text-uppercase font-weight-bold text-white" href="<?php echo ROOT_PATH;?>users/login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-uppercase font-weight-bold text-white" href="<?php echo ROOT_PATH;?>users/register">Register</a>

        <?php endif; ?>
      </ul>
      
    </div>
  </nav>
  <div class='container py-5'>
    <?php Messages::display()?>
    <?php require($view);?>
  </div>
  <footer class='mx-auto fixed-bottom text-center bg-dark text-white mt-5 '>
    <p>Project made for <a href="https://www.madesimplegroup.com/">Made Simple Group</a>, by <a
        href="https://github.com/a2pr">@a2pr</a>.</p>
  </footer>
</body>

</html>