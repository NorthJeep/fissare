<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Fissare</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url()?>resources/css/bootstrap.min.css" rel="stylesheet" type="text/css" 
    <link href="<?php echo base_url()?>resources/vendors/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>resources/css/styles/black.css" rel="stylesheet" type="text/css" id="colorscheme" />
    <link href="<?php echo base_url()?>resources/css/panel.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url()?>resources/css/tiles.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url()?>resources/css/metisMenu.css" rel="stylesheet" type="text/css"/>    
    <!-- end of global css -->    
	


</head>
<body style="background-image: url('<?php echo base_url('resources/fissare-bg.jpg');?>'); background-repeat: no-repeat; background-attachment: fixed;
    background-position: center; ">
    <header>
        <a href="#" class="logo">
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-right">
                <div style="padding-right: 30px;" >
					<a href="<?php echo base_url("C_login")?>"><input type="button" value="Login" class="btn btn-default"/></a>
                </div>
            </div>
        </nav>
    </header>
            
    <h3 class="black_bg">
        <a href="<?php echo base_url()?>"><img src="resources/logo-fissare.png" style="width: 525px; height:; display: block;
					margin-left: auto;
					margin-right: auto;"></a>
    <br></h3>
            
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <aside class="right-side strech">
            <!-- Main content -->
            <br>
            <section class="content">
                <br>
                
				<form class="form-horizontal" id="searchForm" name="searchForm" data-source="<?php echo base_url('C_guest/Index')?>" novalidate>
                   
				   <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-9">
                           
                                
                                <div class="panel-heading">
                                    <div class="col-md-10">
                                        <input id="search" name="search" type="text" placeholder="Search..." class="form-control" required="true">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="hidden" name="act" id="act" value="search">
                                        <button type="submit" class="btn btn-responsive btn-info btn-sm"><i class="livicon" data-name="search" data-size="18" data-color="white" data-hc="white" data-l="true"></i></button>
                                    </div>
                                    <div id="search-result" class="col-md-12" style="margin-top: 10px;">
                                        
                                    </div>
                              
                                <div class="panel-body"></div>
                            </div>
                        </div>
                    </div>
					
					<br/>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-9" id="systemDiv" >
                        <?php foreach($system as $row){
                            echo '<div class="col-sm-4" >
							<div class="panel panel-green">
							<a href="#" onclick="show('.$row->rss_id.');" class="tile" >
							  <h3 class="title">'.$row->rss_name.'</h3>
							  <p>'.$row->rss_name.'</p>
							</a>
							</div>
						</div>';
                        }?>
                        </div>
                    </div>
		            </form>
                <div class="row hidden" id="backbtn">
                    <div class="col-md-1"></div>
                    <div class="col-md-8">
                        <button type="button" class="btn btn-responsive" onclick="back();"><i class="livicon" data-name="arrow-left" data-size="18" data-loop="true" data-c="blue" data-hc="blue"></i><b>Back</b></button>
                    </div>
                </div>
                <br>
                <div class="row hidden" id="resultDiv">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                        <div class="panel">
                            <div class="panel-body">
                            <h2 id="titleresult1" style="font-weight: bold;"></h2>
                            <br>
                            <ul id="result">
                                <!-- Result goes here -->
                            </ul>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-3">
                        <div class="panel">
                            <div class="panel-body">
                                This is panel
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="clearfix"></div>
            </section>
        </aside>
        <!-- right-side -->
        

        <form action="#" id="patchRequest" name="patchRequest" data-source="<?php echo base_url('C_guest/Index');?>" novalidate>
            <div class="modal fade in" id="responsive" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="row"></div>
                            <p>
                                To: *
                                <select id="user" name="user" placeholder="Enter your Password" class="form-control select2" required>
                                    <option disabled selected> Select... </option>
                                    <?php foreach($user as $row){
                                        echo '<option value="'.$row->su_id.'">'.$row->su_name.'</option>';
                                    }?>
                                </select>
                            </p>
                            <p>
                                E-mail: *
                                <input id="email" name="email" type="email" class="form-control" required="">
                            </p>
                            <p>
                                Patch Description: *
                                <input id="Pdescription" name="Pdescription" type="text" class="form-control" required="">
                            </p>
                        </div>
                        <div class="modal-footer">
                            <input id="act" name="act" type="hidden" value="add">
                            <button type="button" data-dismiss="modal" class="btn">Cancel</button>
                            <button type="submit" class="btn btn-primary">Request</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade in" id="responsive1" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body" id="tempDiv">
                            <div class="row"></div>
                            <p>
                                <h4> <b>System: </b></h4>
                                <ul>
                                    <u><b><p id="eSystem"></p></b></u>
                                </ul>
                            </p>
                            <p>
                                <h4> <b>Version: </b></h4>
                                <ul>
                                    <u><b><p id="eVersion"></p></b></u>
                                </ul>
                            </p>
                            <p>
                                <h4> <b>Error Title: </b></h4>
                                <ul>
                                    <p id="eTitle"></p>
                                </ul>
                            </p>
                            <p>
                                <h4> <b>Description: </b></h4>
                                <ul type="disc" id="eDescription">
                                    
                                </ul>
                            </p>
                            <p>
                                <h5> <b>Instruction: </b></h5>
                                <ul id="eInstruction">
                                    
                                </ul>
                            </p>
                        </div>
                        <div class="modal-footer" id="footerDiv">
                            
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <footer>
	<div class="panel panel-green">
        <a data-href="#responsive" data-toggle="modal" href="#responsive" style="text-align: center; color: white;">
            <h3 style="padding-top: 10px;"><span class="fa fa-envelope"> Request for Patch</span></h3>
        </a>
	</div>
    </footer>
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>

    
    <!-- global js -->
    <script src="<?php echo base_url()?>resources/js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>resources/js/bootstrap.min.js" type="text/javascript"></script>
    <!--livicons-->
    <script src="<?php echo base_url()?>resources/vendors/livicons/minified/raphael-min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>resources/vendors/livicons/minified/livicons-1.4.min.js" type="text/javascript"></script>
   <script src="<?php echo base_url()?>resources/js/josh.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>resources/js/metisMenu.js" type="text/javascript"> </script>
    <script src="<?php echo base_url()?>resources/vendors/holder-master/holder.js" type="text/javascript"></script>
    

<script type="text/javascript">


    $(document).ready(function (){
        // loadtablelist();
        // loadGroupList();
        // loadUserList();
        // loadGroupLeaderList();
        $('#patchRequest').on('submit', (function (e)
        {
            e.preventDefault();
            $.ajax({
                async: true,
                url: $('#patchRequest').data('source'), 
                type: "POST",        
                data: $('#patchRequest').serialize(), 
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

        $('#addRequestForm').on('submit', (function (e)
        {
            e.preventDefault();
            $.ajax({
                async: true,
                url: $('#addRequestForm').data('source'), 
                type: "POST",        
                data: $('#addRequestForm').serialize(), 
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
                        alert('Problem Exists!');
                    }
                },
                error: function(data)
                {
                    
                }
            });
        }));
$('#search').on('keyup', function()
        {
            var Search = $('#search').val();
            var act = "auto_search";

            if($('#search').val() != '')
            {
                $.ajax({
                    async: true,
                    url: $('#searchForm').data('source'), 
                    type: "POST",        
                    data: {search:Search,act:act}, 
                    dataType: 'json',
                    cache: false, 
                    success: function(data)
                    {
                        var SearchResult = '<ul class="list-group">';
                        $.each(data,function(index){
                            SearchResult +='<li class="list-group-item"><h5><b>'+data[index]['tet_name']+'</b></h5></li>';
                        });
                        SearchResult += '</ul>'
                        $('#search-result').html(SearchResult);
                        // alert(data[0]['tet_name']);
                    },
                    error: function()
                    {
                        alert("error");
                    }
                });
            }
            else
            {
                $('#search-result').empty();
            }
            
        });

        $(document).on('click', '#search-result li', function(){
            // alert($(this).text());
            $('#search').val($(this).text());
            $('#search-result').empty();
            $('#searchForm').submit();
        });

        $('#searchForm').on('submit', (function (e)
        {
            $('#result').html("");
            e.preventDefault();
            $.ajax({
                async: true,
                url: $('#searchForm').data('source'), 
                type: "POST",        
                data: $('#searchForm').serialize(), 
                dataType: 'json',
                cache: false, 
                success: function(data)
                {
                    $('#backbtn').removeClass('hidden');
                    $('#systemDiv').addClass('hidden');
                    if(data.length == 0 ) {
                        $('#titleresult1').text('Nothing to show...');
                    }
                    else {
                        $('#titleresult1').text('Result...');
                    }
                    $('#resultDiv').removeClass('hidden');
                        $.each(data, function(key, item){
                            $('#result').append("<div class='panel panel-green'><a onclick='getData("+data[key]['tet_id']+")' data-href='#responsive1' data-toggle='modal' href='#responsive1' href='#' class='tile'><h4 id='titleResult' style='white-space: nowrap; overflow: hidden; text-overflow: ellipsis;'> "+data[key]['tet_name']+"</h4>" +
                                        "<p id='descriptionResult' style='white-space: nowrap; overflow: hidden; text-overflow: ellipsis;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "+data[key]['tet_description']+"</p></a></div>");
                        });
                },
                error: function(data)
                {
                    
                }
            });
        }));
    });
</script>

<script type="text/javascript">

    function getData(id) {
        $('#eTitle').html("");
        $('#eDescription').html("");
        $('#eInstruction').html("");
        $('#footerDiv').html("");
        getData1(id);
        $.ajax({
            async: true,
            url: $('#patchRequest').data('source'), 
            type: "POST",        
            data: {id: id, act: 'getData'}, 
            dataType: 'json',
            cache: false, 
            success: function(data)
            {
                $('#eTitle').text(data[0]['tet_name']);

                var temp = data[0]['tet_description'].split(".");
                $.each(temp, function(key, item) {
                    $('#eDescription').append("<p>"+temp[key]+".</p>");
                });

            },
            error: function(data)
            {
                
            }
        });
    }

    function getData1(id) {
        $.ajax({
            async: true,
            url: $('#patchRequest').data('source'), 
            type: "POST",        
            data: {id: id, act: 'getData1'}, 
            dataType: 'json',
            cache: false, 
            success: function(data)
            {
                $('#eTitle').text(data[0]['tet_name']);
                $('#eSystem').text(data[0]['rss_name']);
                $('#eVersion').text(data[0]['tet_version']);

                var temp = data[0]['ti_instruction'].split(". ");
                $.each(temp, function(key, item) {
                    $('#eInstruction').append("<p>"+temp[key]+".</p>");
                });

                $('#footerDiv').append("<button type='button' data-dismiss='modal' class='btn'>Close</button>"+
                    "<a href='C_user/Index?act=download&tet_id="+id+"' target='_blank' type='button' class='btn btn-primary'><i class='livicon' data-name='download' data-size='18' data-loop='true' data-c='skyblue' data-hc='skyblue'></i> Download</a><a onclick='printDiv()' href='#' target='_blank' type='button' class='btn btn-success'><i class='livicon' data-name='printer' data-size='18' data-loop='true' data-c='skyblue' data-hc='skyblue'></i>Print</a> ");

            },
            error: function(data)
            {
                
            }
        });
    }

    function back() {
        $('#result').html("");
        $('#backbtn').addClass('hidden');
        $('#systemDiv').removeClass('hidden');
        $('#resultDiv').addClass('hidden');
        $('#noresultDiv').addClass('hidden');
    }

    function show(id) {
        $('#backbtn').removeClass('hidden');
        $('#systemDiv').addClass('hidden');
        $.ajax({
            async: true,
            url: $('#searchForm').data('source'), 
            type: "POST",        
            data: {id: id, act: 'wildsearch'}, 
            dataType: 'json',
            cache: false, 
            success: function(data)
            {
                $('#backbtn').removeClass('hidden');
                $('#systemDiv').addClass('hidden');

                if(data.length == 0) {
                    $('#titleresult1').text('Nothing to show...');
                }
                else {
                    $('#titleresult1').text('Result...');
                }
                $('#resultDiv').removeClass('hidden');
                $.each(data, function(key, item){
                    $('#result').append("<div class='panel panel-green'><a onclick='getData("+data[key]['tet_id']+")' data-href='#responsive1' data-toggle='modal' href='#responsive1' href='#' class='tile'><h4 id='titleResult' style='white-space: nowrap; overflow: hidden; text-overflow: ellipsis;'> "+data[key]['tet_name']+"</h4>" +
                                "<p id='descriptionResult' style='white-space: nowrap; overflow: hidden; text-overflow: ellipsis;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "+data[key]['tet_description']+"</p></a></div>");
                });
            },
            error: function(data)
            {
                
            }
        });
    }

    function printDiv() {
        var div = 'tempDiv';
         var printContents = document.getElementById(div).innerHTML;
         var originalContents = document.body.innerHTML;

         document.body.innerHTML = printContents;

         window.print();

         document.body.innerHTML = originalContents;
    }
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

    <!-- end of page level js -->
</body>
</html>