<script type='text/javascript' src="<?php echo base_url('resources')?>/vendors/bootstrap-progressbar/bootstrap-progressbar.js"></script>
    <script type="text/javascript">
    $('.progress-bar').progressbar();
    $('.progress-bar').progressbar({
        display_text: 'center',
        use_percentage: false
    });
    </script>

<script type="text/javascript">
	function loadtablelist()
	{
		// $('#tblRoleList').DataTable().destroy();
		// tblList = $('#tblRoleList').DataTable({
		//  	"processing": true,
		// 	"ajax": $('#tblRoleList').data('source') +"?getRoles=true",
		// 	"columns": [
		// 		{"data": "id"},
		// 		{"data": "name"},
		// 		{"data": "btn"}
		// 	],
		// 	"fnDrawCallback": function (oSettings){
		// 		$('[data-toggle="tooltip"]').tooltip();
		// 	},
		// 	"order": [[0,'asc']],
		// 	"language": {
		// 		"lengthMenu": '_MENU_ entries per page',
		// 		"search": '<i class="fa fa-search"></i>',
		// 		"paginate": {
		// 			"previous": '<i class="fa fa-angle-left"></i>',
		// 			"next": '<i class="fa fa-angle-right"></i>'
		// 		}
		// 	}
		// });
	}

	$(document).ready(function (){
		$('#addMineForm').on('submit', (function (e)
		{
			e.preventDefault();
			$.ajax({
                async: true,
                url: $('#addMineForm').data('source'), 
                type: "POST",        
                data: $('#addMineForm').serialize(), 
                dataType: 'json',
                cache: false, 
				success: function(data)
				{
					$('#gatherBtn').addClass('hidden');
					$('#responsive').modal('show');
					setTimeout(function() {
						if(data['mes'] == 'Success')
						{
							$('#responsive').modal('hide');
							alert('Success');
							window.location.reload();
						}
						else if(data['mes'] == 'Duplicate')
						{
							alert('Duplicate Data Entry');
						}
					}, 1000);
				},
				error: function(data)
				{
					
				}
			});
		}));

		$('#fileupload').submit(function(e)
	        {
	            var formData = new FormData($('#fileupload')[0]);
	            e.preventDefault();
	            $.ajax
	            ({
	                // url : $('#fileupload').data('source'),
	                url: '<?php echo base_url('C_admin/migrate')?>',
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
    <script type="text/javascript" src="<?php echo base_url('resources')?>/vendors/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('resources')?>/vendors/datatables/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('resources')?>/vendors/datatables/dataTables.colReorder.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('resources')?>/vendors/datatables/dataTables.scroller.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('resources')?>/vendors/datatables/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url('resources')?>/js/pages/table-advanced.js"></script>
    <script type="text/javascript" src="<?php echo base_url('resources')?>/vendors/Buttons-master/js/vendor/scrollto.js"></script>
    <script type="text/javascript" src="<?php echo base_url('resources')?>/vendors/Buttons-master/js/main.js"></script>
    <script type="text/javascript" src="<?php echo base_url('resources')?>/vendors/Buttons-master/js/buttons.js"></script>

    <script src="<?php echo base_url()?>resources/vendors/select2/select2.js" type="text/javascript"></script>
    <script src="<?php echo base_url('resources')?>/js/pages/formelements.js" type="text/javascript"></script>
    <!-- end of page level js -->
</body>
</html>