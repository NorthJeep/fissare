

<script type="text/javascript">
	function loadtablelist(id)
	{
		$('#tblList').DataTable().destroy();
		tblList = $('#tblList').DataTable({
		 	"processing": true,
			"ajax": $('#tblList').data('source') +"?getError=true&id="+id,
			"columns": [
				{"data": "system"},
				{"data": "code"},
				{"data": "version"},
				{"data": "name"},
				{"data": "description"},
				{"data": "instruction"},
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

		return tblList;
	}

	// window.onload = loadtablelist;


	$(document).ready(function (){
		loadtablelist();
		MostSearchError();
		MostSearchApp();
		MostNumberOfVisit();
		// loadGroupList();
		// loadUserList();
		// loadGroupLeaderList();
		// $('#patchRequest').on('submit', (function (e)
		// {
		// 	e.preventDefault();
		// 	$.ajax({
  //               async: true,
  //               url: $('#patchRequest').data('source'), 
  //               type: "POST",        
  //               data: $('#patchRequest').serialize(), 
  //               dataType: 'json',
  //               cache: false, 
		// 		success: function(data)
		// 		{
		// 			if(data['mes'] == 'Success')
		// 			{
		// 				alert('Success');
		// 				window.location.reload();
		// 			}
		// 			else if(data['mes'] == 'Duplicate')
		// 			{
		// 				alert('Duplicate Data Entry');x
		// 			}
		// 		},
		// 		error: function(data)
		// 		{
					
		// 		}
		// 	});
		// }));
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

    <script src="<?php echo base_url('resources')?>/hc/code/highcharts.js"></script>
	<script src="<?php echo base_url('resources')?>/hc/code/modules/data.js"></script>
	<script src="<?php echo base_url('resources')?>/hc/code/modules/drilldown.js"></script>
	
	<script src="<?php echo base_url('resources')?>/hc/code/modules/exporting.js"></script>
	<script src="<?php echo base_url('resources')?>/hc/code/highcharts-3d.js"></script>

	<script type="text/javascript">
		

		function MostSearchError() {
			var d1 = <?php echo json_encode($chart2)?>;
	        d2 = new Array();
	        $.each(d1, function (i, elem)
	        {
	            d2[i] = [elem['name'], parseInt(elem['y'])];
	            console.log(d2[i]);
	        });

			Highcharts.chart('mse', {
                chart: {
		            plotBackgroundColor: null,
		            plotBorderWidth: null,
		            plotShadow: false,
		            type: 'pie'
		        },
		        title: {
		            text: 'Most Searched Error'
		        },
		        tooltip: {
		            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		        },
		        plotOptions: {
		            pie: {
		                allowPointSelect: true,
		                cursor: 'pointer',
		                dataLabels: {
		                    enabled: false
		                },
		                showInLegend: true
		            }
		        },
		        series: [{
		            name: 'Total',
		            colorByPoint: true,
		            data: d2
		        }]
		    });
		}

		function MostSearchApp() {
			var d1 = <?php echo json_encode($chart)?>;
	        d2 = new Array();
	        $.each(d1, function (i, elem)
	        {
	            d2[i] = [elem['name'], parseInt(elem['y'])];
	            console.log(d2[i]);
	        });

			Highcharts.chart('msa', {
                chart: {
		            plotBackgroundColor: null,
		            plotBorderWidth: null,
		            plotShadow: false,
		            type: 'pie'
		        },
		        title: {
		            text: 'Most Searched Application '
		        },
		        tooltip: {
		            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		        },
		        plotOptions: {
		            pie: {
		                allowPointSelect: true,
		                cursor: 'pointer',
		                dataLabels: {
		                    enabled: false
		                },
		                showInLegend: true
		            }
		        },
		        series: [{
		            name: 'Total',
		            colorByPoint: true,
		            data: d2
		        }]
		    });
		}

		function MostNumberOfVisit() {
			var d1 = <?php echo json_encode($chart3)?>;
	        d2 = new Array();
	        $.each(d1, function (i, elem)
	        {
	            d2[i] = [elem['name'], parseInt(elem['y'])];
	            console.log(d2[i]);
	        });

			Highcharts.chart('mnv', {
		        chart: {
		            plotBackgroundColor: null,
		            plotBorderWidth: null,
		            plotShadow: false,
		            type: 'pie'
		        },
		        title: {
		            text: 'Most Number of Updates '
		        },
		        tooltip: {
		            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		        },
		        plotOptions: {
		            pie: {
		                allowPointSelect: true,
		                cursor: 'pointer',
		                dataLabels: {
		                    enabled: false
		                },
		                showInLegend: true
		            }
		        },
		        series: [{
		            name: 'Total',
		            colorByPoint: true,
		            data: d2
		        }]
		    });
		}
	</script>
</body>
</html>