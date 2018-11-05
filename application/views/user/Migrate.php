
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>Import Data</h1>
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
                <div class="clearfix"></div>
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="users" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Upload Excel File
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
                                                <label class="col-md-2 control-label" for="Error">System</label>
                                                <div class="col-md-3">
                                                    <select id="system" name="system" class="form-control select2" required>
                                                        <option disabled selected> Select... </option>
                                                        <?php
                                                            foreach($system as $row)
                                                            {
                                                                echo '<option value='.$row->rss_id.'> '.$row->rss_name.'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
												 <div class="col-md-6">
                                                    <label class="col-md-6 control-label" for="Instruction Format">Excel Format</label>
                                                    <div class="col-md-6">
                                                        <a id="formatBtn" href="<?=base_url()?>resources/file/Fissare_Library_Format.xlsx" class="btn btn-responsive btn-info">Download</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                              <h4 id="introHeader">Upload Excel File</h4>
                                              <div class="input-group">
                                                  <span class="input-group-btn">
                                                  <button id="UploadFile" type="button" class="btn btn-default">
                                                    <span class="glyphicon glyphicon-file"></span>
                                                  </button>
                                                </span>
                                                <input type="file" accept=".xlsx" id="FileInputUpload" name="FileInputUpload" style="display: none;" enctype="multipart/form-data">
                                                <input type="text" id="FileInputName" disabled="disabled" placeholder="File not selected" class="form-control">
                                                <span class="input-group-btn">
                                                  <button type="submit" class="btn btn-default">
                                                    <span class="fa fa-cloud-upload"></span>
                                                  </button>
                                                </span>
                                              </div>
                                            </div>
                                        
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 text-right">
                                                <input type="hidden" value="add" id="act" name="act">
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