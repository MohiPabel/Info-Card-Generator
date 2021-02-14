<?php  



?>



<head>
  <meta charset="UTF-8">
  <title>Info-Card-Generator</title>
  <link rel="icon" href="img/logo.png" type="image/png">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!-- MyCss -->
  <link rel="stylesheet" type="text/css" href="./css/main.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body class="blue-grey darken-3 light-green-text text-accent-4">

  <nav class="blue-grey darken-4" role="navigation">
    <div class="nav-wrapper container">
      <a href="index.php" class="brand-logo">I<span class="light-green-text text-accent-4">G</span>C</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a class="waves-effect waves-dark light-green accent-4 btn" href="create.php">Create Your Card</a></li>
        <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>"><i class="material-icons">refresh</i></a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i
              class="material-icons">view_module</i></a></li>
      </ul>
    </div>
  </nav>

  <!-- DropDown -->
  <ul id="dropdown1" class="dropdown-content light-green accent-4">
    <li><a class="white-text" href="index.php">Home</a></li>
    <li class="divider"></li>
    <li><a class="white-text" href="<?php echo $_SERVER['PHP_SELF']; ?>#about">About</a></li>
    <li class="divider"></li>
    <li><a class="white-text" href="<?php echo $_SERVER['PHP_SELF']; ?>#contact">Contact</a></li>
  </ul>

  <!-- Mobile DropDown -->
  <ul class="sidenav" id="mobile-demo">
    <li><a class="waves-effect waves-dark light-green accent-4 btn" href="create.php">Create Your Card</a></li>
    <li><a href="index.php">Home</a></li>
    <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>#about">About</a></li>
    <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>#contact">Contact</a></li>
  </ul>







  <!-- Content -->
  <header>
    <div class="section no-pad-bot" id="index-banner">
      <div class="container">
        <h2 class="header center">Info Card Generator</h2>