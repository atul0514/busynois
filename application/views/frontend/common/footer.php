    <!-- Footer Starts -->
  <footer class="py-2">
  <div class="container">
      <div class="row">
        <div class="col-md-12 text-center footer-menu">
        <ul class="">
        <li><a href="<?php echo base_url(); ?>blog">Blog</a></li>
        <?php
          $i=1;
              foreach($fdata as $row)
               {
          ?>
        <li><a href="<?php echo base_url(); ?>pages/page/<?php echo $row->slug; ?>"><?php echo $row->p_title; ?></a></li>
         <?php
            $i++;
           }
        ?>
        
      </ul>
      </div>
      </div>
    <div class="row social">
      <div class="col-md-12 text-center">
      <p>© 2020 by Busynoi. Proudly created in India</p>
      <ul class="py-2">
        <li><a><i class="fa fa-facebook"></i></a></li>
        <li><a><i class="fa fa-twitter"></i></a></li>
        <li><a><i class="fa fa-instagram"></i></a></li>
        
      </ul>
      <div>
    </div>
  </div>
</footer>
      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  </body>
</html>