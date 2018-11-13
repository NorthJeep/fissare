
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>Welcome to System User Management</h1>
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
                                    Add User
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable active"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" action="#" id="addUserForm" name="addUserForm" data-source="<?php echo base_url('C_admin/User')?>" novalidate>
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="username">User Name *</label>
                                            <div class="col-md-3">
                                                <input id="username" name="username" type="text" placeholder="Enter your Username" class="form-control" required="true">
                                            </div>
                                            <label class="col-md-2 control-label" for="email">Email Address *</label>
                                            <div class="col-md-3">
                                                <input id="email" name="email" type="text" placeholder="Enter Email Address" class="form-control" required="true">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="password">Password *</label>
                                            <div class="col-md-3">
                                                <input id="password" name="password" type="password" placeholder="Enter Password" class="form-control" required="true">
                                            </div>
                                            <label class="col-md-2 control-label" for="contact">Contact No.</label>
                                            <div class="col-md-3">
                                                <input id="contact" name="contact" type="text" placeholder="Enter Contact Number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="name">Name *</label>
                                            <div class="col-md-3">
                                                <input id="name" name="name" type="text" placeholder="Enter Name" class="form-control" required="true"></div>
                                            <label class="col-md-2 control-label" for="role">Role *</label>
                                            <div class="col-md-3">
                                                <select id="role" name="role" class="form-control select2">

                                                    <option disabled selected> Select Role </option>
                                                    <?php
                                                        foreach($role as $row)
                                                        {
                                                            echo '<option value='.$row->sur_id.'> '.$row->sur_name.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="profile">Logo*</label>
                                            <div class="col-md-3">
                                                <input id="profile" name="image_file" type="file" placeholder="Insert Picture" class="form-control" enctype="multipart/form-data" required="true">
                                            </div>
                                            <label class="col-md-2 control-label" for="role">Agency *</label>
                                            <div class="col-md-3">
                                                <select id="Agency" name="Agency" class="form-control select2">

                                                    <option disabled selected> Select Role </option>
                                                    <?php
                                                        foreach($agency as $row)
                                                        {
                                                            echo '<option value='.$row->agency_id.'> '.$row->agency_name.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 text-right">
                                                <input type="hidden" value="add" id="act" name="act">
                                                <button type="submit" class="btn btn-responsive btn-info btn-sm">Add User</button>
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
                                        System Users
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered" id="tblList" data-source="<?php echo base_url('C_admin/User')?>" novalidate>
                                        <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th width="5%">Logo</th>
                                                <th width="25%">Name</th>
                                                <th width="25%">Email Address</th>
                                                <th width="10%">Contact No.</th>
                                                <th width="10%">Agency</th>
                                                <th width="15%">User Role</th>
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
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form class="form-horizontal" action="#" id="editUserForm" name="editUserForm" data-source="<?php echo base_url('C_admin/User')?>" novalidate>
                    <div class="modal fade in" id="responsive" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content md-content-green">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Edit User</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>
                                                <h4>User Information</h4>
                                            <p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="hide">
                                                <label>ID</label>
                                                <input id="userID" name="userID" type="text" placeholder="ID" class="form-control">
                                            </p>
                                            <p>
                                                <label>Name</label>
                                                <input id="uName" name="uName" type="text" placeholder="Name" class="form-control">
                                            </p>
                                            <p>
                                                <label>User Role</label>
                                                <select id="uRole" name="uRole" class="form-control select2">

                                                    <option disabled selected> Select Role </option>
                                                    <?php
                                                        foreach($role as $row)
                                                        {
                                                            echo '<option value='.$row->sur_id.'> '.$row->sur_name.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </p>
                                            <p>
                                                <label>Contact No.</label>
                                                <input id="uContact" name="uContact" type="text" placeholder="Contact" class="form-control">
                                            </p>
                                            <p>
                                                <label>Address</label>
                                                <input id="uAddress" name="uAddress" type="text" placeholder="Address" class="form-control">
                                            </p>
                                            <p>
                                                <label>Email Address</label>
                                                <input id="uEmail" name="uEmail" type="text" placeholder="Email" class="form-control">
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>
                                                <label>User Name</label>
                                                <input id="uUser" name="uUser" type="text" placeholder="Username" class="form-control">
                                            </p>
                                            <p>
                                                <label>Password</label>
                                                <input id="uPass" name="uPass" type="password" placeholder="Password" class="form-control">
                                            </p>
                                            <p>
                                                <label>Confirm Password</label>
                                                <input id="uConfirm" name="uConfirm" type="password" placeholder="Confirm Password" class="form-control">
                                            </p>
                                            <p>
                                                <label>Change Profile</label>
                                                <input id="eProfile" name="eProfile" type="file" placeholder="eProfile" class="form-control"  enctype="multipart/form-data" >
                                            </p>
                                            <p>
                                                <label class="control-label" for="role">Agency *</label>
                                                <select id="uAgency" name="uAgency" class="form-control select2">

                                                    <option disabled selected> Select Role </option>
                                                    <?php
                                                        foreach($agency as $row)
                                                        {
                                                            echo '<option value='.$row->agency_id.'> '.$row->agency_name.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" value="edit" id="edit-btn" name="act">
                                    <button type="button" data-dismiss="modal" class="btn">Close</button>
                                    <button id="UserEditSubmit" type="button" class="btn btn-primary">Save changes</button>
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