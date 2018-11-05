	<!-- <script src="<?php echo base_url('resources')?>/jquery-2.2.3.min.js"></script>
	<script src="<?php echo base_url('resources')?>/index.js"></script> -->
	<script>
    	$(document).ready(function()
	  	{
	     	$('#fileupload').submit(function(e)
	        {
	            var formData = new FormData($('#fileupload')[0]);
	            e.preventDefault();
	            $.ajax
	            ({
	                // url : $('#fileupload').data('source'),
	                url: '<?php echo base_url('C_admin/attachment')?>',
	                type : 'POST',
	                // data : $('#fileupload').serialize(),
	                data: formData,
	                async : false,
	                cache : false,
	                contentType : false,
	                processData : false,
	                success: function(data)
	                {
                		alert('Successfully Uploaded');	
                		window.location.reload();	
	                }
	            });
	        });
	  	});
    </script>
    <script type="text/javascript">
	
	document.getElementById('UploadFile').addEventListener('click', function() {
	  document.getElementById('FileInputUpload').click();
	});

	  document.getElementById('FileInputUpload').addEventListener('change', function() {
	  document.getElementById('FileInputName').value = this.value;
	  
	  document.getElementById('UploadFileSelected').removeAttribute('disabled');
	});

	</script>
    <script src="<?php echo base_url()?>resources/vendors/select2/select2.js" type="text/javascript"></script>
    <script src="<?php echo base_url('resources')?>/js/pages/formelements.js" type="text/javascript"></script>

</body>
</html>