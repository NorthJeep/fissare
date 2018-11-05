<script type="text/javascript">
	// function add() {
	// 	$('#static').append('<div class="form-group">'+
 //                                '<label class="col-md-2 control-label" for="instruction"></label>'+
 //                                '<div class="col-md-8">'+
 //                                    '<input id="code[]" name="code[]" type="text" placeholder="Enter Instruction" class="form-control" required="true">'+
 //                                '</div>'+
 //                            '</div>');
	// }
	function dataShow(ID,ErrorID,Instruction)
	{
		$('#InstructID').val(ID);
		$('#InstructError').val(ErrorID).change();
		$('#InstructDesc').val(Instruction);
	}
	function loadtablelist()
	{
		$('#tblList').DataTable().destroy();
		tblList = $('#tblList').DataTable({
		 	"processing": true,
			"ajax": $('#tblList').data('source') +"?getInstruction=true",
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
		$('#fileupload').on('submit', (function (e)
		{
			e.preventDefault();
			$.ajax({
                async: true,
                url: $('#fileupload').data('source'), 
                type: "POST",        
                data: $('#fileupload').serialize(), 
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

		$('#editInstructionForm').on('submit', (function (e)
		{
			e.preventDefault();
			$.ajax({
                async: true,
                url: $('#editInstructionForm').data('source'), 
                type: "POST",        
                data: $('#editInstructionForm').serialize(), 
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
</body>
</html>