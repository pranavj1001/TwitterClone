<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    
    <link rel="stylesheet" href="http://localhost/TwitterClone/views/css/styles.css">
    <link rel="stylesheet" href="http://localhost/TwitterClone/views/css/footerStyle.css">
      
  </head>
  <body>
      
      <nav class="navbar navbar-light bg-faded">
          <a class="navbar-brand" href="http://localhost/TwitterClone/">Twitter</a>
          <ul class="nav navbar-nav">
            <!--Don't require the Home, but kept the code here so that in future if needed then it can be easily accessed.
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>-->
            <li class="nav-item">
              <a class="nav-link" href="?page=feed">Your Feed</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?page=tweets">Tweets</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?page=users">Users</a>
            </li>
            <!-- Don't require the dropdown, but kept the code here so that in future if needed then it can be easily accessed.
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="http://example.com" id="supportedContentDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
              <div class="dropdown-menu" aria-labelledby="supportedContentDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>-->
          </ul>
          <div class="form-inline float-xs-right">
            <!-- Don't require the Search, but kept the code here so that in future if needed then it can be easily accessed.
            <input class="form-control" type="text" placeholder="Search">-->
            <?php if(isset($_SESSION['id'])){ ?>   
              <a class="btn btn-outline-success" href="?function=logout">Logout</a>
            <?php }else{ ?>
            <button class="btn btn-outline-success" data-toggle="modal" data-target="#myModal">Login or Signup</button>
            <?php } ?>  
          </div>
      </nav>