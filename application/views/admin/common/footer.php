  <div class="row" style="margin:2px;">
		<div class="col-md-12 text-center" style="margin:0px;">
			<p style="margin:0px;">All Rights Reserved @Busynoi 2020.</p>
		</div>
	  </div>
    </main>
    <!-- Essential javascripts for application to work-->

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/select2.min.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
	
	<script src="<?php echo base_url(); ?>assets/admin/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?php echo base_url(); ?>assets/admin/js/plugins/pace.min.js"></script>
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
          var fileName = $(this).val().split("\\").pop();
          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
    <!-- Page specific javascripts-->

 <script type="text/javascript" src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: ["autolink lists link autoresize","table", "code","image","textcolor"],
    default_link_target:"_blank",
    tools: "inserttable",
    menu: {         
        
    },

    toolbar: ' undo redo | formatselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | table | image | link | removeformat | code',
   
 });
</script> 

	    <script type="text/javascript">
      $('#sl').on('click', function(){
      	$('#tl').loadingBtn();
      	$('#tb').loadingBtn({ text : "Signing In"});
      });
      
      $('#el').on('click', function(){
      	$('#tl').loadingBtnComplete();
      	$('#tb').loadingBtnComplete({ html : "Sign In"});
      });
      
      $('#demoDate').datepicker({
      	format: "dd/mm/yyyy",
      	autoclose: true,
      	todayHighlight: true
      });
      
      $('#demoSelect').select2();
    </script>
	
    
  </body>
</html>