
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>Requests</h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <a href="#">
                            <i class="livicon" data-name="home" data-size="16" data-color="#333" data-hovercolor="#333"></i>
                            Home
                        </a>
                    </li>
                </ol>
            </section>

            <form action="#" id="patchRequest" name="patchRequest" data-source="<?php echo base_url('C_user/Request');?>" novalidate>
            <section class="content">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-success filterable" style="overflow:auto;">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                     <i class="livicon" data-name="users" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Request(s)
                                </h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-bordered" id="tblList" data-source="<?php echo base_url('C_user/Request')?>" novalidate>
                                    <thead>
                                        <tr>
                                            <th width="10%">Request ID</th>
                                            <th width="15%">E-mail</th>
                                            <th width="40%">Request Description</th>
                                            <th width="20%">Status</th>
                                            <th width="15%">Action</th>
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
                
            </section>
            <div class="modal fade in" id="responsive" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class ="modal-body">
                            <div class="row"></div>
                            <div class="box-body">
                                <h4 id="introHeader">Upload your File (<span style="color:red;">all kind of file/s</span>)</h4>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button id="UploadFile" type="button" class="btn btn-default">
                                                <span class="glyphicon glyphicon-file"></span>
                                            </button>
                                        </span>
                                    <input type="file" accept="*" id="FileInputUpload" name="FileInputUpload" style="display: none;" enctype="multipart/form-data">
                                    <input type="text" id="FileInputName" disabled="disabled" placeholder="File not selected" class="form-control">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default">
                                            <input type="hidden" value="" id="rd_id" name="rd_id">
                                            <input type="hidden" value="sent" id="act" name="act">
                                            <span class="fa fa-cloud-upload"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </aside>
        <!-- right-side -->
    </div>
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>