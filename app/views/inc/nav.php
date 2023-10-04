<div class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo URLROOT ?>">
   <img src="<?php echo URLROOT."assets/imgs/cutie.jpg" ?>" alt="" width="30" height="30"> 
  <span class="english">Capybara House</span>
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <?php if(getUserSession() != null && getUserSession()->email=="ocha@gmail.com"): ?>
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo URLROOT.'admin/home' ?>">Admin</a>
        </li>
      <?php endif; ?>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="https://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

        <?php if(getUserSession() != false) : ?>
          <?php echo getUserSession()->name; ?>
          <?php else :  ?> 
          Member
          <?php endif; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?php if(getUserSession() != false) : ?>
            <a class="dropdown-item" href="<?php echo URLROOT . 'user/logout' ?>">Logout</a>
          <?php else :  ?>
            <a class="dropdown-item" href="<?php echo URLROOT . 'user/login' ?>">Login</a>
            <a class="dropdown-item" href="<?php echo URLROOT . 'user/register' ?>">Register</a>
          <?php endif; ?>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
</div>