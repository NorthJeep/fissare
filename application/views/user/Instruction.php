
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>Instruction</h1>
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
                                    Add Instruction
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable active"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" action="#" id="fileupload" name="fileupload" data-source="<?php echo base_url('C_admin/Instruction')?>" novalidate>
                                    <fieldset>
                                        <div class="box-body">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="Error">Error</label>
                                            <div class="col-md-3">
                                                <select id="error" name="error" placeholder="Enter your Password" class="form-control select2" required="true">
                                                    <option disabled selected> Error Type </option>
                                                    <?php
                                                        foreach($error as $row)
                                                        {
                                                            echo '<option value='.$row->tet_id.'> '.$row->tet_name.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="instruction">Instruction</label>
                                            <div class="col-md-8">
                                                <textarea id="code" name="code" type="textarea" placeholder="Enter Instruction" class="form-control" required="true"></textarea> 
                                            </div>
                                            <!-- <button type="button" class="btn btn-responsive btn-info btn-sm" onclick="add();">Add Field</button> -->
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
                                    <table class="table table-striped table-bordered" id="tblList" data-source="<?php echo base_url('C_admin/Instruction')?>" novalidate>
                                        <thead>
                                            <tr>
                                                <th width="2%">#</th>
                                                <th width="20%">System</th>
                                                <th width="3%">Code</th>
                                                <th width="5%">Version</th>
                                                <th width="25%">Name</th>
                                                <th width="40%">Instruction</th>
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
                    <form class="form-horizontal" action="#" id="editInstructionForm" name="editInstructionForm" data-source="<?php echo base_url('C_admin/Instruction')?>" novalidate>
                    <div class="modal fade in" id="responsive" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content md-content-green">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Edit Instruction</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>
                                                <h4>Instructions</h4>
                                            <p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="hide">
                                                <label>Instruction ID</label>
                                                <input id="InstructID" name="InstructID" type="text" placeholder="ID" class="form-control">
                                            </p>
                                            <p>
                                                <label>Error Name</label>
                                                <select id="InstructError" name="InstructError" placeholder="Error Type" class="form-control select2" required="true" disabled>
                                                    <option disabled selected> Error Type </option>
                                                    <?php
                                                        foreach($error as $row)
                                                        {
                                                            echo '<option value='.$row->tet_id.'> '.$row->tet_name.'</option>';
                                                        }
                                                    ?>
                                                </select>                                          
                                            </p>
                                            <p>
                                                <label>Error Description</label>
                                                <textarea id="InstructDesc" name="InstructDesc" type="text" placeholder="Error Description" class="form-control" rows="11"></textarea>
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