
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>Welcome to User Role Management</h1>
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
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="users" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Add Agency
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable active"></i>
                                    <!-- <i class="glyphicon glyphicon-remove removepanel clickable"></i> -->
                                </span>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" id="addAgencyForm" name="addAgencyForm" data-source="<?php echo base_url('C_admin/Agency')?>" novalidate>
                                    <fieldset>
                                        <div class="form-group">
                                                <div class="col-md-6">
                                                    <label class="col-md-4 control-label" for="HeadAgency">Head Agency *</label>
                                                    <div class="col-md-8">
                                                        <input id="HeadAgency" name="HeadAgency" type="text" placeholder="Enter Head Agency" class="form-control" required="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-md-4 control-label" for="Agency"> Agency Name *</label>
                                                    <div class="col-md-8">
                                                        <input id="Agency" name="Agency" type="text" placeholder="Enter Agency" class="form-control" required="true">
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="col-md-2 control-label" for="AgencyType"> Agency Type *</label>
                                                <div class="col-md-3">
                                                    <select id="AgencyType" name="AgencyType" class="form-control select2">
                                                    <option value="1" selected> National </option>
                                                    <option value="2"> Local </option>
                                                    <option value="3"> GOCC </option>
                                                </select>
                                                </div>
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
                    <!-- <div class="col-md-6">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="users" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Edit User Role
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable active"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" id="editRoleForm" name="editRoleForm" data-source="<?php echo base_url('C_admin/Role')?>" novalidate>
                                    <fieldset>
                                        <div class="form-group hide">
                                            <label class="col-md-4 control-label" for="role">User ID *</label>
                                            <div class="col-md-8">
                                                <input id="roleEditID" name="roleEditID" type="text" placeholder="User Role ID" class="form-control" required="true">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="role">User Role *</label>
                                            <div class="col-md-8">
                                                <input id="roleEdit" name="roleEdit" type="text" placeholder="User Role" class="form-control" required="true">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 text-right">
                                                <input type="hidden" value="edit" id="edit-btn" name="act">
                                                <button type="submit" class="btn btn-responsive btn-warning btn-sm">&nbsp; EDIT &nbsp;</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div> -->
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-success filterable" style="overflow:auto;">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                     <i class="livicon" data-name="users" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    System Users Roles
                                </h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-bordered" id="tblList" data-source="<?php echo base_url('C_admin/Agency')?>" novalidate>
                                    <thead>
                                        <tr>
                                            <th width="10%">Agency ID</th>
                                            <th>Head Agency</th>
                                            <th>Agency</th>
                                            <th>Agency Type</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
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
                <form class="form-horizontal" action="#" id="editAgencyForm" name="editAgencyForm" data-source="<?php echo base_url('C_admin/Agency')?>" novalidate>
                    <div class="modal fade in" id="responsive" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content md-content-green">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Edit Agency</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>
                                                <h4>Agency Information</h4>
                                            <p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="hide">
                                                <label>Agency ID</label>
                                                <input id="eAgencyID" name="eAgencyID" type="text" placeholder="ID" class="form-control">
                                            </p>
                                            <p>
                                                <label>Head Agency Name</label>
                                                <input id="eHName" name="eHName" type="text" placeholder="Head Agency Name" class="form-control">
                                            </p>
                                            <p> 
                                                <label>Agency Name</label>
                                                <input id="eAName" name="eAName" type="text" placeholder="Agency Name" class="form-control">
                                            </p>
                                            <p>
                                                <label>Agency Type</label>
                                                <select id="eAType" name="eAType" class="form-control select2" required="true">
                                                    <option value="1" selected> National </option>
                                                    <option value="2"> Local </option>
                                                    <option value="3"> GOCC </option>
                                                </select>
                                            </p>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" value="edit" id="edit-btn" name="act">
                                    <button type="button" data-dismiss="modal" class="btn">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
            </section>
        </aside>
        <!-- right-side -->
    </div>
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>
    