
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <aside class="right-side">
            <section class="content-header">
                <h1>Welcome to Dashboard</h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <a href="#">
                            <i class="livicon" data-name="home" data-size="16" data-color="#333" data-hovercolor="#333"></i>
                            Home
                        </a>
                    </li>
                </ol>
            </section>

            <section class="content">
                <div class="row">
                    <div class="panel-body">
                        <div class="demo-container">
                            <div class="col-lg-4">
                                <div id="msa" class="flotChart"></div>
                            </div>
                            <div class="col-lg-4">
                                <div id="mse" class="flotChart"></div>
                            </div>
                            <div class="col-lg-4">
                                <div id="mnv" class="flotChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-2 col-sm-6">
                        <div class="panel panel-danger">
                            <div class="panel-heading border-light">
                                <h4 class="panel-title">
                                    <i class="livicon" data-name="notebook" data-size="18" data-color="white" data-hc="white" data-l="true"></i>
                                    List of Application(s)
                                </h4>
                            </div>
                            <div class="panel-body">
                                <ul>
                                    <li><a href="#" onclick="loadtablelist(0);">All</a></li>
                                    <?php foreach($error as $row){
                                        echo '<li><a href="#" onclick="loadtablelist('.$row->rss_id.');">'.$row->rss_name.'</a></li>';
                                    }?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-10">
                        <div class="panel panel-success filterable" style="overflow:auto;">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                     <i class="livicon" data-name="users" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    List of Errors
                                </h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-bordered" width="100%" id="tblList" data-source="<?php echo base_url('C_user/Index')?>" novalidate>
                                    <thead>
                                        <tr>
                                            <th width="20%">System</th>
                                            <th width="5%">Code</th>
                                            <th width="5%">Version</th>
                                            <th width="15%">Name</th>
                                            <th width="20%">Description</th>
                                            <th width="20%">Instruction</th>
                                            <th width="5%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    
                </div>
                <div class="clearfix"></div>
                <div class="row ">
                    <!--Graph goes in here-->
                </div>
                
            </section>
        </aside>
        <!-- right-side -->
    </div>
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>
    