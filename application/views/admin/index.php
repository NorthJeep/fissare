
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>Dashboard</h1>
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
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="users" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Error / Issue and Solution Details
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable active"></i>
                                    <!-- <i class="glyphicon glyphicon-remove removepanel clickable"></i> -->
                                </span>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" action="#" id="addErrorForm" name="addErrorForm" data-source="<?php echo base_url('C_admin/Error')?>" novalidate>
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="name">System Name</label>
                                            <div class="col-md-3">
                                                <select id="system" name="system" class="form-control select2" required="true">
                                                    <option value="0" selected>Nothing Selected</option>
                                                    <?php
                                                        foreach($system as $row)
                                                        {
                                                            echo '<option value='.$row->rss_id.'> '.$row->rss_name.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <label class="col-md-2 control-label" for="name">Error Type</label>
                                            <div class="col-md-3">
                                                <select id="errorType" name="errorType" class="form-control select2" required="true">
                                                    <option>All</option>
                                                    <option>Software Error</option>
                                                    <option>Hardware Error</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="name">Error Name</label>
                                            <div class="col-md-8">
                                                <select id="error" name="error" class="form-control select2" required="true">
                                                    <option value="0" selected>Nothing Selected</option>
                                                   <!--  <?php
                                                        foreach($error as $row)
                                                        {
                                                            echo '<option value='.$row->tet_id.'> '.$row->tet_name.'</option>';
                                                        }
                                                    ?> -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 text-right">
                                                <input type="hidden" value="add" id="act" name="act">
                                                <!-- <a type="submit" class="btn btn-responsive btn-info btn-sm">Print</a> -->
                                                <a target="_blank" id="print-btn" href="#" class="btn btn-default btn-sm float-right">
                                                  <i class="material-icons">print</i>
                                                </a>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary filterable">
                            <div class="panel-heading clearfix  ">
                                <div class="panel-title pull-left">
                                    <div class="caption">
                                        <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Most Searched Application
                                    </div>
                                    
                                </div>
                                <div class="tools pull-right"></div>

                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-responsive" id="tbl-MSA" data-source="<?php echo base_url('C_admin/index')?>" novalidate>
                                    <thead>
                                        <tr>
                                            <th width="40%">System Name</th>
                                            <th width="40%">Roll-out Team</th>
                                            <th width="20%">Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary filterable">
                            <div class="panel-heading clearfix  ">
                                <div class="panel-title pull-left">
                                    <div class="caption">
                                        <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Most Searched Error
                                    </div>
                                    
                                </div>
                                <div class="tools pull-right"></div>

                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-responsive" id="tbl-MSE" data-source="<?php echo base_url('C_admin/index')?>" novalidate>
                                    <thead>
                                        <tr>
                                            <th width="20%">Error Name</th>
                                            <th width="10%">Error Type</th>
                                            <th width="20%">System Name</th>
                                            <th width="20%">System Version</th>
                                            <th width="20%">Roll-out Team</th>
                                            <th width="10%">Count</th>
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
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary filterable">
                            <div class="panel-heading clearfix  ">
                                <div class="panel-title pull-left">
                                    <div class="caption">
                                        <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Most Number of Updates
                                    </div>
                                    
                                </div>
                                <div class="tools pull-right"></div>

                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-responsive" id="tbl-MNU" data-source="<?php echo base_url('C_admin/index')?>" novalidate>
                                    <thead>
                                        <tr>
                                            <th width="40%">System Name</th>
                                            <th width="40%">Roll-out Team</th>
                                            <th width="20%">Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
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
            </section>
        </aside>
        <!-- right-side -->
    </div>
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>