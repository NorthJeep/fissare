<script type="text/javascript">
	function dataPass(uID,uName,uContact,uAddress,uEmail,uRole,uRID,uUser,uPass)
	{	
		var ID = uID;
		var Name = uName;
		var Contact = uContact;
		var Address = uAddress;
		var Email = uEmail;
		var Role = uRole;
		var RID = uRID;
		var User = uUser;
		var Pass = uPass;
		
		$('#userID').val(ID);
		$('#uName').val(Name);
		$('#uContact').val(Contact);
		$('#uAddress').val(Address);
		$('#uEmail').val(Email);
		$('#uRole').val(RID).change();
		$('#uUser').val(User);
		$('#uPass').val(Pass);

	}
	function loadtablelist()
	{
		$('#tblList').DataTable().destroy();
		tblList = $('#tblList').DataTable({
		 	"processing": true,
			"ajax": $('#tblList').data('source') +"?getUser=true",
			"columns": [
				{"data": "id"},
				{"data": "name"},
				{"data": "email"},
				{"data": "contact"},
				{"data": "role"},
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
		$('#addUserForm').on('submit', (function (e)
		{
			e.preventDefault();
			$.ajax({
                async: true,
                url: $('#addUserForm').data('source'), 
                type: "POST",        
                data: $('#addUserForm').serialize(), 
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

		$('#editUserForm').on('submit', (function (e)
		{
			e.preventDefault();
			$.ajax({
                async: true,
                url: $('#editUserForm').data('source'), 
                type: "POST",        
                data: $('#editUserForm').serialize(), 
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

		$('#UserEditSubmit').on('click', function(){
			if($('#uPass').val() == $('#uConfirm').val())
			{
				$('#editUserForm').submit();
			}
			else
			{
				alert('Passwords not equal');
			}
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

    <!-- end of page level js -->
</body>
</html>