
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>Supported System</h1>
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
                <div class="clearfix"></div>
                    <div class="col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="users" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Add Supported System
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable active"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" id="addSystemForm" name="addRoleForm" data-source="<?php echo base_url('C_admin/supported_System')?>" novalidate>
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="role">System Name *</label>
                                            <div class="col-md-8">
                                                <input id="name" name="name" type="text" placeholder="Enter System Name" class="form-control" required="true">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 text-right">
                                                <input type="hidden" value="add" id="act" name="act">
                                                <button type="submit" class="btn btn-responsive btn-info btn-sm">&nbsp; ADD &nbsp;</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="users" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Edit Supported System
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable active"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" id="editSystemForm" name="editSystemForm" data-source="<?php echo base_url('C_admin/supported_System')?>" novalidate>
                                    <fieldset>
                                        <div class="form-group hide">
                                            <label class="col-md-4 control-label" for="role">System ID *</label>
                                            <div class="col-md-8">
                                                <input id="ESysID" name="ESysID" type="text" placeholder="Enter ID" class="form-control" required="true">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="role">System Name *</label>
                                            <div class="col-md-8">
                                                <input id="ESysName" name="ESysName" type="text" placeholder="Enter System Name" class="form-control" required="true">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 text-right">
                                                <input type="hidden" value="edit" id="act" name="act">
                                                <button type="submit" class="btn btn-responsive btn-warning btn-sm">&nbsp; EDIT &nbsp;</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-success filterable" style="overflow:auto;">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                     <i class="livicon" data-name="users" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    System
                                </h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-bordered" id="tblList" data-source="<?php echo base_url('C_admin/supported_System')?>" novalidate>
                                    <thead>
                                        <tr>
                                            <th width="5%">User System ID</th>
                                            <th>System Name</th>
                                            <th width="5%">Action</th>
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