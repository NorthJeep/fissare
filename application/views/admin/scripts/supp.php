<script type="text/javascript">
    
    function dataShow(ID,Name)
    {
        $('#ESysID').val(ID);
        $('#ESysName').val(Name);
        // alert(ID);
        // alert(Name);
    }
    
    function loadtablelist()
    {
        $('#tblList').DataTable().destroy();
        tblList = $('#tblList').DataTable({
            "processing": true,
            "ajax": $('#tblList').data('source') +"?getSystem=true",
            "columns": [
                {"data": "id"},
                {"data": "name"},
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
        $('#addSystemForm').on('submit', (function (e) {
            e.preventDefault();
            $.ajax({
                async: true,
                url: $('#addSystemForm').data('source'), 
                type: "POST",        
                data: $('#addSystemForm').serialize(), 
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
        $('#editSystemForm').on('submit', (function (e) {
            e.preventDefault();
            $.ajax({
                async: true,
                url: $('#editSystemForm').data('source'), 
                type: "POST",        
                data: $('#editSystemForm').serialize(), 
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