<script type="text/javascript">
	
	document.getElementById('UploadFile').addEventListener('click', function() {
	  document.getElementById('FileInputUpload').click();
	});

	  document.getElementById('FileInputUpload').addEventListener('change', function() {
	  document.getElementById('FileInputName').value = this.value;
	  
	  document.getElementById('UploadFileSelected').removeAttribute('disabled');
	});
</script>

<script type="text/javascript">
	function edit(id) {
		$('#responsive').modal('show');

        $.ajax
            ({ type:"POST",
               async: true,
               url: $('#patchRequest').data('source'),
               data:{id:id, act:"getId"},
               dataType: 'json',
               cache: false,
               success: function(data)
                {
                    $('#rd_id').val(data[0]['rd_id']);
                },
                error: function(data)
                {

                }
          }); 
	}

	function loadtablelist()
	{
		$('#tblList').DataTable().destroy();
		tblList = $('#tblList').DataTable({
		 	"processing": true,
			"ajax": $('#tblList').data('source') +"?getRequest=true",
			"columns": [
				{"data": "id"},
				{"data": "email"},
				{"data": "description"},
				{"data": "status"},
				{"data": "btn"}
			],
			"fnDrawCallback": function (oSettings){
				$('[data-toggle="tooltip"]').tooltip();
			},
			"order": [[0,'asc']],
			"language": {
				"lengthMenu": '_MENU_ entries per page',
				"search": '<i class="fa fa-search"></i>',
				"paginate": {
					"previous": '<i class="fa fa-angle-left"></i>',
					"next": '<i class="fa fa-angle-right"></i>'
				}
			}
		});
	}

	$(document).ready(function()
	  	{
	  		loadtablelist();
	     	$('#patchRequest').submit(function(e)
	        {
	            var formData = new FormData($('#patchRequest')[0]);
	            e.preventDefault();
	            $.ajax
	            ({
	                // url : $('#fileupload').data('source'),
	                url: '<?php echo base_url('C_user/request')?>',
	                type : 'POST',
	                // data : $('#fileupload').serialize(),
	                data: formData,
	                async : false,
	                cache : false,
	                contentType : false,
	                processData : false,
	                success: function(data)
	                {
                		alert('Email Sent');	
                		window.location.reload();
	                }
	            });
	        });
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
</body>
</html>