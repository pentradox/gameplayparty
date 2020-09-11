<?php
/*
 * view
 *
 * copyright wesley van der vliet
*/
?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="view/css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body class="d-flex flex-column">

<nav class="navbar navbar-expand-sm bg-dark">
 <ul class="navbar-nav">
   <li class="nav-item">
     <a class="nav-link text-white <?php if($page == 'home') { echo 'text-primary font-weight-bold';} ?>" href="home">Home</a>
   </li>
   <li class="nav-item">
     <a class="nav-link text-white<?php if($page == 'contact') { echo 'text-primary font-weight-bold';} ?>" href="contact">Contact</a>
   </li>
   <li class="nav-item">
     <a class="nav-link text-white<?php if($page == 'info') { echo 'text-primary font-weight-bold';} ?>" href="info">Info</a>
   </li>
   <li class="nav-item">
     <a class="nav-link text-white<?php if($page == 'route') { echo 'text-primary font-weight-bold';} ?>" href="route">Route</a>
   </li>
 </ul>
</nav>
