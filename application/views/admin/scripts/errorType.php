<script type="text/javascript">
	function checkSystem()
	{
		if($('#ESystem').val() == 0)
		{
			alert('Please select a system.');
		}
		else
		{
			$('#editErrorForm').submit();
		}
	}
	function dataShow(EID,SID,ECode,EVer,EDesc,EName)
	{
		$('#ErrorID').val(EID);
		$('#ESystem').val(SID).change();
		$('#EName').val(EName);
		$('#ECode').val(ECode);
		$('#EVersion').val(EVer);
		$('#EDesc').val(EDesc);
	}
	function loadtablelist()
	{
		$('#tblList').DataTable().destroy();
		tblList = $('#tblList').DataTable({
		 	"processing": true,
			"ajax": $('#tblList').data('source') +"?getError=true",
			"columns": [
				{"data": "id"},
				{"data": "system"},
				{"data": "code"},
				{"data": "version"},
				{"data": "name"},
				{"data": "description"},
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

	$(document).ready(function (){
		loadtablelist();
		$('#addErrorForm').on('submit', (function (e)
		{
			e.preventDefault();
			$.ajax({
                async: true,
                url: $('#addErrorForm').data('source'), 
                type: "POST",        
                data: $('#addErrorForm').serialize(), 
                dataType: 'json',
                cache: false, 
				success: function(data)
				{
					if(data['mes'] == 'Success')
					{
						// alert('Success');
						window.location.reload();
					}
					else if(data['mes'] == 'Duplicate')
					{
						alert('Duplicate Data Entry');
					}
				},
				error: function(data)
				{
					
				}
			});
		}));
		$('#editErrorForm').on('submit', (function (e)
		{
			e.preventDefault();
			$.ajax({
                async: true,
                url: $('#editErrorForm').data('source'), 
                type: "POST",        
                data: $('#editErrorForm').serialize(), 
                dataType: 'json',
                cache: false, 
				success: function(data)
				{
					if(data['mes'] == 'Updated')
					{
						alert('Updated');
						window.location.reload();
					}
					else if(data['mes'] == 'Duplicate')
					{
						alert('Duplicate Data Entry');
					}
				},
				error: function(data)
				{
					
				}
			});
		}));
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