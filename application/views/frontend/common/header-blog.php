<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="<?php echo $brow->p_meta_title; ?>">
    <meta name="description" content="<?php echo $brow->p_meta_desc; ?>">
    <meta name="keywords" content="<?php echo $brow->p_meta_keywords; ?>">
    <meta name="author" content="Busynoi">

   <title>Home | Busynoi</title>
   <link rel="canonical" href="https://www.busynoi.com">
   <meta property="og:title" content="Home | Busynoi">
   <meta property="og:url" content="https://www.busynoi.com">
   <meta property="og:site_name" content="Busynoi">
   <meta property="og:type" content="website">
    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <script src="https://use.fontawesome.com/ea10b723c7.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    
   <script type="text/javascript">
    $(window).on('load',function(){
        $('#searchModal').modal('show');
    });
</script>
  </head>
  <body>
  <section class="eader pt-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12 logo text-center">
          <a class="" href="#"><img src="<?php echo base_url(); ?>assets/img/blogo.png"></a><br><br>
          <p style="color:#E68E94; font-size:18px; font-weight:500;">New features coming soon!</p>
        </div>
      </div>
    </div>
  </section>
  <section class="">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
      <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url(); ?>/get-listed">List Yourself</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url(); ?>/events">Business Events</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url(); ?>/membership">Membership</a>
      </li>
      <li class="nav-item"><b>
      <a class="nav-link login" href="<?php echo base_url(); ?>/login">Login/Register</a></b>
      </li>
    </ul>
    </div>
  </nav>
</section>

    <!-- Header ends -->