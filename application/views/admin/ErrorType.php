
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>Error</h1>
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
                                    Add Error
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable active"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" action="#" id="addErrorForm" name="addErrorForm" data-source="<?php echo base_url('C_admin/Error')?>" novalidate>
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="code">Error Code</label>
                                            <div class="col-md-3">
                                                <input id="code" name="code" type="text" placeholder="Enter Code" class="form-control" required="true">
                                            </div>
                                            <label class="col-md-2 control-label" for="version">System Version</label>
                                            <div class="col-md-3">
                                                <input id="version" name="version" type="text" placeholder="Enter Version" class="form-control" required="true">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="name">Error Name</label>
                                            <div class="col-md-3">
                                                <input id="name" name="name" type="text" placeholder="Enter Error" class="form-control" required="true">
                                            </div>
                                            <label class="col-md-2 control-label" for="description">Description</label>
                                            <div class="col-md-3">
                                                <input id="description" name="description" type="text" placeholder="Enter Description" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="name">System Name</label>
                                            <div class="col-md-3">
                                                <select id="system" name="system" class="form-control select2" required="true">
                                                    <?php
                                                        foreach($system as $row)
                                                        {
                                                            echo '<option value='.$row->rss_id.'> '.$row->rss_name.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 text-right">
                                                <input type="hidden" value="add" id="act" name="act">
                                                <button type="submit" class="btn btn-responsive btn-info btn-sm">Add</button>
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
                                        Errors
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered" id="tblList" data-source="<?php echo base_url('C_admin/Error')?>" novalidate>
                                        <thead>
                                            <tr>
                                                <th width="2%">#</th>
                                                <th width="25%">System Name</th>
                                                <th width="3%">Code</th>
                                                <th width="3%">Version</th>
                                                <th width="25%">Error Name</th>
                                                <th width="40%">Description</th>
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
                    <form class="form-horizontal" action="#" id="editErrorForm" name="editErrorForm" data-source="<?php echo base_url('C_admin/Error')?>" novalidate>
                    <div class="modal fade in" id="responsive" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content md-content-green">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Edit Error</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>
                                                <h4>Error Information</h4>
                                            <p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="hide">
                                                <label>Error ID</label>
                                                <input id="ErrorID" name="ErrorID" type="text" placeholder="ID" class="form-control">
                                            </p>
                                            <p>
                                                <label>System Name</label>
                                                <select id="ESystem" name="ESys" class="form-control select2" required="true">
                                                    <option value="0">No System Selected</option>
                                                    <?php
                                                        foreach($system as $row)
                                                        {
                                                            echo '<option value='.$row->rss_id.'> '.$row->rss_name.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </p>
                                            <p>
                                                <label>Error Name</label>
                                                <input id="EName" name="EName" type="text" placeholder="Error Name" class="form-control">
                                            </p>
                                            <p>
                                                <label>Error Code</label>
                                                <input id="ECode" name="ECode" type="text" placeholder="Error Code" class="form-control">
                                            </p>
                                            <p>
                                                <label>Error System Version</label>
                                                <input id="EVersion" name="EVersion" type="text" placeholder="Error System Version" class="form-control">
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>
                                                <label>Error Description</label>
                                                <textarea id="EDesc" name="EDesc" type="text" placeholder="Error Description" class="form-control" rows="11"></textarea>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" value="edit" id="edit-btn" name="act">
                                    <button type="button" data-dismiss="modal" class="btn">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="checkSystem()">Save changes</button>
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