<script type="text/javascript">
    function dataShow(ID,HName,AName,AType)
    {
    	$('#eAgencyID').val(ID);
    	$('#eHName').val(HName);
    	$('#eAName').val(AName);
    	$('#eAType').val(AType).change();
    }
    function dataDelete(ID)
    {
    	var dataID = ID;
    	$.ajax({
            url: $('#editRoleForm').data('source')+"?delRole=true", 
            type: "POST",        
            data: dataID.serialize(),
            cache: false, 
			success: function(data)
			{
				// alert("here");
				if(data['mes'] == 'Deleted')
				{
					alert('Deleted');
					window.location.reload();
				}
			},
			error: function(data)
			{
				alert('Failed');
			}
		});
    }

	function loadtablelist()
	{
		$('#tblList').DataTable().destroy();
		tblList = $('#tblList').DataTable({
		 	"processing": true,
			"ajax": $('#tblList').data('source') +"?getAgency=true",
			"columns": [
				{"data": "id"},
				{"data": "HName"},
				{"data": "AName"},
				{"data": "AType"},
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

	$(document).ready(function () {
		loadtablelist();
		// loadGroupList();
		// loadUserList();
		// loadGroupLeaderList();
		$('#addAgencyForm').on('submit', (function (e) {
			e.preventDefault();
			$.ajax({
                async: true,
                url: $('#addAgencyForm').data('source'), 
                type: "POST",        
                data: $('#addAgencyForm').serialize(), 
                dataType: 'json',
                cache: false, 
				success: function(data)
				{
					if(data['mes'] == 'Success')
					{
						alert('Success');
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
		
		$('#editAgencyForm').on('submit', (function (e) {
			e.preventDefault();
			$.ajax({
                async: true,
                url: $('#editAgencyForm').data('source'), 
                type: "POST",        
                data: $('#editAgencyForm').serialize(), 
                dataType: 'json',
                cache: false, 
				success: function(data)
				{
					if(data['mes'] == 'Updated')
					{
						alert('Success');
						window.location.reload();
					}
				},
				error: function(data)
				{
					alert('Failed');
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