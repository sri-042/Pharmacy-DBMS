<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid" style=" background-color: rgba(45, 115, 245, 0.1); padding:10px 10px">
    <a class="navbar-brand px-3" href="#">SS Medicals</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active px-3" aria-current="page" href="online.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle px-3" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="profile.php">Your Profile</a></li>
            <li><a class="dropdown-item" href="Oldorder.php">Your Orders</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active px-3" aria-current="page" href="aboutus.php">About Us</a>
        </li>
        <li class="nav-item">    
        <a href="order.php" class="nav-link px-3"><i class="fa fa-shopping-cart" aria-hidden="true" class="nav-link"></i></a>
        
        </li>
      </ul>
      
      <form class="d-flex" action="display.php">
        <input class="form-control me-2" type="search" name='k' placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      
    </div>
  </div>
</nav>