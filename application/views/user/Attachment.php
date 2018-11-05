
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>Attachments</h1>
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
                                    Add Attachment
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable active"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" id="fileupload" name="fileupload" action="#" novalidate>
                                    <fieldset>
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="Error">Error</label>
                                                <div class="col-md-3">
                                                    <select id="error" name="error" class="form-control select2" required>
                                                        <option disabled selected> Error</option>
                                                        <?php
                                                            foreach($error as $row)
                                                            {
                                                                echo '<option value='.$row->tet_id.'> '.$row->tet_name.'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <noscript>
                                                <input type="hidden" name="redirect" value="">
                                            </noscript>
                                            <div class="box-body">
                                              <h4 id="introHeader">Upload File</h4>
                                              <div class="input-group">
                                                  <span class="input-group-btn">
                                                  <button id="UploadFile" type="button" class="btn btn-default">
                                                    <span class="glyphicon glyphicon-file"></span>
                                                  </button>
                                                </span>
                                                <input type="file" accept="*" id="FileInputUpload" name="FileInputUpload[]" style="display: none;" multiple enctype="multipart/form-data">
                                                <input type="text" id="FileInputName" disabled="disabled" placeholder="File not selected" class="form-control">
                                                <span class="input-group-btn">
                                                  <button type="submit" class="btn btn-default">
                                                    <span class="fa fa-cloud-upload"></span>
                                                  </button>
                                                </span>
                                              </div>
                                            </div>
                                        <!-- <div class="row fileupload-buttonbar">
                                            <div class="col-lg-7">
                                                <span class="btn btn-success fileinput-button">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                    <span>Attachments...</span> -->
                                                    <!-- <input type="file" name="files" id="files" multiple enctype="multipart/form-data"> -->
                                                    <!-- <input type="file" accept=".gif" id="FileInputUpload[]" name="FileInputUpload[]" multiple enctype="multipart/form-data">
                                                </span>
                                                <button type="reset" class="btn btn-warning cancel">
                                                    <i class="glyphicon glyphicon-ban-circle"></i>
                                                    <span>Cancel upload</span>
                                                </button>
                                                <span class="fileupload-process"></span>

                                                <div class="col-lg-5 fileupload-progress fade">
                                                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                                    </div>
                                                    <div class="progress-extended">&nbsp;</div>
                                                </div>
                                            </div>
                                        </div> -->
                                        
                                        </div>
                                        <!-- <div class="form-group">
                                            <label class="col-md-2 control-label" for="instruction">Instruction</label>
                                            <div class="col-md-8">
                                                <textarea id="code" name="code" type="textarea" placeholder="Enter Instruction" class="form-control" required="true"></textarea> 
                                            </div>
                                            <button type="button" class="btn btn-responsive btn-info btn-sm" onclick="add();">Add Field</button>
                                        </div> -->
                                        <!-- <table role="presentation" class="table table-striped">
                                            <tbody class="files"></tbody>
                                        </table> -->
                                        <div class="form-group">
                                            <div class="col-md-12 text-right">
                                                <input type="hidden" value="add" id="act" name="act">
                                                <!-- <button type="submit" class="btn btn-responsive btn-info btn-sm">Add</button> -->
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
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