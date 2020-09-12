<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Busynoi Dashboard">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@Busynoi">
    <meta property="twitter:creator" content="@Busynoi">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Busynoi Admin">
    <meta property="og:title" content="Busynoi Admin Dashboard">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:description" content="Busynoi Admin Dashboard.">
    <title>Busynoi Admin Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon CSS-->
    <link rel="icon" href="<?php echo base_url(); ?>assets/img/favicon.png">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="<?php echo base_url(); ?>assets/admin/js/jquery-3.3.1.min.js"></script>
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="<?php echo base_url(); ?>">Busynoi</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!--Notification Menu-->
        <li><a class="app-nav__item" href="<?php echo base_url(); ?>"><i class="fa fa-globe fa-lg"></i></a>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/dashboard/websiteinfo"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/dashboard/profile"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            
			
			
			<li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/dashboard/logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          
		  
		  </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?php echo $this->session->userdata('name'); ?></p>
          <p class="app-sidebar__user-designation">Administrator</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="<?php echo base_url(); ?>admin/dashboard"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="icon fa fa-newspaper-o"></i><span class="app-menu__label mx-1"> Blog</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?php echo base_url(); ?>admin/blog/category"><i class="icon fa fa-circle-o"></i>Category</a></li>
            <li><a class="treeview-item" href="<?php echo base_url(); ?>admin/blog"><i class="icon fa fa-circle-o"></i>Post List</a></li>
            <li><a class="treeview-item" href="<?php echo base_url(); ?>admin/blog/add_post" rel="noopener"><i class="icon fa fa-circle-o"></i> Add Post</a></li>

          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="icon fa fa-anchor"></i><span class="app-menu__label mx-1">Pages</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?php echo base_url(); ?>admin/pages"><i class="icon fa fa-circle-o"></i> Page List</a></li>
            <li><a class="treeview-item" href="<?php echo base_url(); ?>admin/pages/addnew"><i class="icon fa fa-circle-o"></i> Add Page</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="icon fa fa-bullhorn"></i><span class="app-menu__label mx-1"> Event</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?php echo base_url(); ?>admin/events"><i class="icon fa fa-circle-o"></i> Event List</a></li>
            <li><a class="treeview-item" href="<?php echo base_url(); ?>admin/events/add_event" rel="noopener"><i class="icon fa fa-circle-o"></i> Add Event</a></li>

          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="fa fa-graduation-cap"></i><span class="app-menu__label mx-1">Jobs</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?php echo base_url(); ?>admin/jobs"><i class="icon fa fa-circle-o"></i>Joblist</a></li>
            <li><a class="treeview-item" href="<?php echo base_url(); ?>admin/jobs/add"><i class="icon fa fa-circle-o"></i>Add New Job</a></li>
            <li><a class="treeview-item" href="<?php echo base_url(); ?>admin/jobs/resumesu" rel="noopener"><i class="icon fa fa-circle-o"></i> Resume List</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="icon fa fa-cog"></i><span class="app-menu__label mx-1">Job Setting</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?php echo base_url(); ?>admin/jobcategory"><i class="icon fa fa-circle-o"></i>Job Role</a></li>            
            <li><a class="treeview-item" href="<?php echo base_url(); ?>admin/jobtype" rel="noopener"><i class="icon fa fa-circle-o"></i>Job Type</a></li>
            <li><a class="treeview-item" href="<?php echo base_url(); ?>admin/location" rel="noopener"><i class="icon fa fa-circle-o"></i>Job Location</a></li>
            <li><a class="treeview-item" href="<?php echo base_url(); ?>admin/city" rel="noopener"><i class="icon fa fa-circle-o"></i>Job City</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="icon fa fa-list"></i><span class="app-menu__label mx-1"> Testimonials</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?php echo base_url(); ?>admin/testimonials"><i class="icon fa fa-circle-o"></i>Testimonial List</a></li>
            <li><a class="treeview-item" href="<?php echo base_url(); ?>admin/testimonials/add_testimonial" rel="noopener"><i class="icon fa fa-circle-o"></i> Add Testimonial</a></li>

          </ul>
        </li>
        <li><a class="app-menu__item" href="<?php echo base_url(); ?>admin/dashboard/contact_form_quries"><i class="icon fa fa-envelope-open-o"></i><span class="app-menu__label mx-1"> Form Queries</span></a></li>
        <li><a class="app-menu__item" href="<?php echo base_url(); ?>admin/dashboard/subscribers"><i class="icon fa fa-list"></i><span class="app-menu__label mx-1"> Subscriber's List</span></a></li>
        
        <li><a class="app-menu__item" href="<?php echo base_url(); ?>admin/dashboard/websiteinfo"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Web Setting</span></a></li>
        <li><a class="app-menu__item" href="<?php echo base_url(); ?>admin/dashboard/profile"><i class="icon fa fa-user"></i><span class="app-menu__label mx-1">Profile</span></a></li>

      </ul>
    </aside>
	<main class="app-content">
		<div class="app-title">
        <div>
          <h1><?php echo $title; ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item"><?php echo $title; ?></li>
        </ul>
      </div>