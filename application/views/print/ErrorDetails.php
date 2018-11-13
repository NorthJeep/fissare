<!DOCTYPE html>
<html lang="en" style="background-color: white;">

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="<?php echo base_url()?>resources/logo-insignia.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Fissare - A Troubleshooting Library System
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url()?>resources/assets/css/material-kit.css?v=2.0.4" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url()?>resources/assets/demo/demo.css" rel="stylesheet" />
</head>

<body style="background-color: white;">
  <!-- <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <img src="<?php echo base_url()?>resources/logo-insignia.png" alt="Fissare_Logo" width="50px" height="auto"></img>
        <label class="navbar-brand" href="#" style="color:#669fff;">
          FISSARE - A TROUBLESHOOTING LIBRARY SYSTEM </label>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="#" class="nav-link" data-toggle="modal" data-target="#PatchModal" style="color:#669fff;">
              <i class="material-icons">report_problem</i> Request a Patch
            </a>
          </li>
            <?php
            if(!isset($_SESSION['id']))
            {
              echo '
              <li class="nav-item"><a class="nav-link" href="'.base_url("C_Login").'" style="color:#669fff;">
              <i class="material-icons">face</i> Login
            </a>
            </li>';
            }
            else
            {
              if($_SESSION['role'] <= 2)
              {
                echo '<li class="nav-item">
                      <a class="nav-link" href="'.base_url("C_user/index").'" style="color:#669fff;">
                        <i class="material-icons">face</i>'.$_SESSION['name'].'
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="'.base_url("C_login/logout").'" style="color:#669fff;">
                        <i class="material-icons">face</i>LOGOUT
                      </a>
                    </li>';
              }
              else
              {
                echo '<li class="nav-item">
                      <a class="nav-link" href="#" style="color:#669fff;">
                        <i class="material-icons">face</i>'.$_SESSION['name'].'
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="'.base_url("C_login/logout").'" style="color:#669fff;">
                        <i class="material-icons">face</i>LOGOUT
                      </a>
                    </li>';
              }
              
            }
            ?>
        </ul>
      </div>
    </div>
  </nav> -->
  <div style="min-height:100px; text-align:center;">
    <div class="navbar-translate">
        <img src="<?php echo base_url()?>resources/logo-insignia.png" alt="Fissare_Logo" width="100px" height="auto"></img>
        <h4 href="#"><b>FISSARE - A TROUBLESHOOTING LIBRARY SYSTEM</b></h4>
        <h4 href="#"><b>ERROR / ISSUE AND SOLUTION</b></h4>
      </div>
  </div>
        <div id="ErrorModal">
        <div>
          <div>
            <div>
              <h5>System:</h5>
              <h6 id="ErrorLabel"></h6>
              <p>version: <label id="ErrorVer"></label></p>
            </div>
            <div>
                <h5>
                    Error Name: <p id="ErrorName"></p>
                </h5>
                <div>
                  <h5>
                    Description: <p id="ErrorDesc"></p>
                  </h5>
                  <h5>
                    Instruction: <p id="ErrorInstruc"></p>
                  </h5>
                  <h5>
                    Attachments: <ul id="ErrorAttach"></ul>
                  </h5>
                  <h5>
                    Top Comments: <ul id="ErrorComment"></ul>
                  </h5>
                </div>
            </div>
          </div>
        </div>
      </div>

  <!-- ERROR SEARCH MODAL -->
    <!-- <div class="modal fade" id="SearchModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Search</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row"></div>
            <h3>
                Errors List:
            </h3>
            <ul id="SearchList1" class="list-group list-group-flush" style="overflow-y: auto; max-height: 250px;">
              
            </ul>
          </div>
          <div class="modal-footer">
            <input id="act" name="act" type="hidden" value="add">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div> -->
  <!-- END ERROR SEARCH MODAL -->

  <!-- PATCH MODAL -->
    <!-- <form action="#" id="patchRequest" name="patchRequest" data-source="<?php echo base_url('C_guest/Index');?>" novalidate>
      <div class="modal fade" id="PatchModal" tabindex="-1" role="dialog" aria-labelledby="PatchModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Request a Patch</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row"></div>
                <p>To: *
                    <select id="user" name="user" placeholder="Enter your Password" class="form-control select2" required>
                        <option disabled selected> Select... </option>
                        <?php foreach($user as $row){
                            echo '<option value="'.$row->su_id.'">'.$row->su_name.'</option>';
                        }?>
                    </select>
                </p>
                <p>
                    E-mail: *
                    <input id="email" name="email" type="email" class="form-control" required="">
                </p>
                <p>
                    Patch Description: *
                    <textarea id="Pdescription" name="Pdescription" type="text" class="form-control" required="" rows="5"></textarea>
                </p>
            </div>
            <div class="modal-footer">
              <input id="act" name="act" type="hidden" value="add">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Request</button>
            </div>
          </div>
        </div>
      </div>
    </form> -->
  <!-- END PATCH MODAL -->

  <!-- SYSTEM MODAL -->
   
   <!-- Modal -->
    <!-- <div class="modal fade" id="SystemModal" tabindex="-1" role="dialog" aria-labelledby="SystemLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 id="SysText" class="modal-title" id="SystemTitleLabel">GOVERNMENT UNIT:<label>System Name</label></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
            <div class="row"></div>
            <h3>
                Errors List:
            </h3>
            <ul id="ErrorList" class="list-group list-group-flush" style="overflow-y: auto; max-height: 300px;">
              
            </ul>
          </div>
          <div class="modal-footer">
            <input id="act" name="act" type="hidden" value="add">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div> -->
  <!-- END SYSTEM MODAL -->

  <!-- ERROR MODAL -->
    
     <!--  <div class="modal fade" id="ErrorModal" tabindex="-1" role="dialog" aria-labelledby="ErrorLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <p>
                <label class="modal-title" id="ErrorType"></label>
                <label class="modal-title" id="ErrorLabel" style="color: gray;">Error</label>
              </p>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <p>System:
                    <label id="ErrorSys" style="color: gray;"></label>
                </p>
                <p>version:
                    <label id="ErrorVer" style="color: gray;"></label>
                </p>
                <button type="button" class="btn btn-default btn-sm float-right" onclick="printError($('#ErrorID').val());">
                  <i class="material-icons">print</i> Print
                </button>
                <div>
                  <label>Description:
                    <p id="ErrorDesc" style="color: gray;">
                      
                    </p>
                  </label>
                  <div class="card-header">
                    <label>
                      Instruction:
                      <p id="ErrorInstruc" style="color: gray;">
                      </p>
                      <div class="clear-row"></div>
                      <button type="button" class="btn btn-secondary float-right">Download Attachment</button>
                    </label>
                    <form action="#" id="formComment" name="formComment" data-source="<?php echo base_url('C_guest/Index');?>" novalidate enctype="multipart/form-data">
                      <div class="col-md-12">
                          <div class="col-md-4">
                            <input type="text" name="EID" id="ErrorID" hidden>
                            <input type="hidden" name="act" id="act" value="comment">
                            <textarea id="commentTxt" name="commentTxt" type="text" placeholder="Comment something..." class="form-control" style="width: 500px;" rows="5"></textarea>
                          </div>
                          <?php
                          if($this->session->has_userdata('id'))
                          {
                            echo '<div class="col-md-4">
                                    <label class="btn btn-primary btn-round" for="fileUp">
                                      <i class="material-icons">attachment</i>
                                    </label>
                                    <button id="comment-btn-main" type="button" class="btn btn-primary btn-round comment-btn-main">
                                      <i class="material-icons">comment</i>
                                    </button>
                                  </div>';
                          }
                          else
                          {
                            echo '<div class="col-md-4">
                                    <button type="button" class="btn btn-primary btn-round req-sign-up">
                                      <i class="material-icons">attachment</i>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-round req-sign-up">
                                      <i class="material-icons">comment</i>
                                    </button>
                                  </div>'; 
                          }
                          ?>
                          
                      </div>
                    </form>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <input id="act" name="act" type="hidden" value="add">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              
              
            </div>
          </div>
        </div>
      </div> -->
  <!-- END ERROR MODAL -->

  <!-- SYSTEM ERROR MODAL -->
    
  <!-- END SYSTEM ERROR MODAL -->

  <!-- FOOTER -->
    <footer class="footer" data-background-color="black">
      <div class="container">
        <div class="copyright float-right">
          &copy;
          <script>
            document.write(new Date().getFullYear())
          </script>, Fissare - A Troubleshooting Library System.
        </div>
      </div>
    </footer>
  <!-- END FOOTER -->

  <!--   Core JS Files   -->
  <script src="<?php echo base_url()?>resources/assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url()?>resources/assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url()?>resources/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url()?>resources/assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="<?php echo base_url()?>resources/assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo base_url()?>resources/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--	Plugin for Sharrre btn -->
  <script src="<?php echo base_url()?>resources/assets/js/plugins/jquery.sharrre.js" type="text/javascript"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url()?>resources/assets/js/material-kit.js?v=2.0.4" type="text/javascript"></script>
  <script type="text/javascript">
    // function loadSubcomment(ErrorID)
    // {
    //   $.ajax({
    //     url:'<?php echo base_url('C_guest/index')?>',
    //     type:"post",
    //     dataType:'json',
    //     cache: false,
    //     data:{id:ErrorID,act:"getComment"},
    //     success:function(data){
    //       $('#CommentDiv').empty();
    //       $('#CommentDiv').html(data.DATA);
    //     },
    //     error:function(){
    //     }
    //   });
    // }
    function loadTopComments(EID)
    {
      $('#ErrorComment').empty();
      var ErrorID = EID;
      $.ajax({
        url:'<?php echo base_url('C_guest/index')?>',
        type:"post",
        dataType:'json',
        cache: false,
        data:{id:ErrorID,act:"getTopComment"},
        success:function(data){
          $.each(data,function(key,value){
            var Attach = '<li><small>'+value.comment+'</small><ul>';
            flag = 0;
            $.each(value.file,function(key1,value1){
              if(flag == 0)
              {
                Attach += '<small>includes:</small><li><small>'+value1+'</small></li>';
                flag = 1;
              }
              else
              {
                Attach += '<li><small>'+value1+'</small></li>';
              }
            });
            Attach += '</ul></li>';
            $('#ErrorComment').append(Attach);
          });
          window.print();
        },
        error:function(){
          alert('ALERT');
        }
      });
    }
    function loadError(EID,SID)
    {
      var ErrorID = EID;
      var flag;
      $('#ErrorAttach').empty();
      $.ajax({
        url:'<?php echo base_url('C_guest/index')?>',
        type:"post",
        dataType:'json',
        cache: false,
        data:{id:ErrorID,act:"getEDetails"},
        success:function(data){
          $('#ErrorID').val(data.tet_id);
          $('#ErrorLabel').text(data.rss_name);
          $('#ErrorDesc').text(data.tet_description);
          $('#ErrorType').text(data.tet_error_type);
          $('#ErrorName').text(data.tet_name);
          $('#ErrorInstruc').text(data.tet_instruction);
          $('#ErrorVer').text(data.tet_version);
          $.each(data.tet_dlList,function(key,value){
            var Attach = '<li>'+value+'</li>';
            $('#ErrorAttach').append(Attach);
          });
          // console.log(data.tet_dlList);
        },
        error:function(){
          alert("Error");
        }
      });
      loadTopComments(ErrorID);
      // loadSubcomment(ErrorID);
    }
    
    // function SubCommentAdd(CID)
    // {
      
    //   var formID = '#formSubComment'+CID+'';
    //   $.ajax({
    //     url:'<?php echo base_url('C_guest/index')?>',
    //     type:"post",
    //     dataType:'json',
    //     cache: false,
    //     data:$(formID).serialize(),
    //     success:function(data){
    //       if(data['mes'] == "Success")
    //       {
    //         alert('Success');
    //         loadSubcomment($('#ErrorID').val());
    //       }
          
    //     },
    //     error:function(){
    //       alert("Failed");
    //     }
    //   });
    // }
    
    // function passData(rss_id,sys_name)
    // {
    //   $('#SysText').text(sys_name);
    //   $.ajax({
    //     url:'<?php echo base_url('C_guest/index')?>',
    //     type:"post",
    //     dataType:'json',
    //     cache: false,
    //     data:{id:rss_id,act:"getEList"},
    //     success:function(data){
    //       $('#ErrorList').empty();
    //       $('#ErrorList').html(data.output);
    //     },
    //     error:function(){
    //       alert('FAILED');
    //     }
    //   });
    // }

  </script>
</body>

</html>
<script type="text/javascript">
  $(document).ready(function(){
    function getUrlVars() {
      var vars = {};
      var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
      vars[key] = value;
      });
      return vars;
    }
    var EID = getUrlVars()["Error"];
    var SID = getUrlVars()["Sys"];
    loadError(EID,SID);
    // function loadSystems(No){
    //   var PageNo = No;
    //   // var PageNo = $(".pagination > .active").text();
    //   $.ajax({
    //     url:'<?php echo base_url('C_guest/index')?>',
    //     type:"post",
    //     dataType:'json',
    //     cache: false,
    //     data:{PageNo:PageNo,act:"suppSystem"},
    //     success:function(data){
    //       $('#GUList').empty();
    //       $('#GUList').html(data.GovPanel);
    //       $('#SysList').empty();
    //       $('#SysList').html(data.SysPanel);
    //     },
    //     error:function(){
    //       alert('FAILED');
    //     }
    //   });
    // }
    // loadSystems(1);

    // $('.pagination li').on('click', function(){
    //   var PNo = $(this).text();
    //   $(".pagination li").removeClass("active");
    //   $(this).addClass('active');
    //   loadSystems(PNo);
    //   return false;
    // });
    // $('#patchRequest').on('submit', (function (e){
    //     e.preventDefault();
    //     $.ajax({
    //         async: true,
    //         url: $('#patchRequest').data('source'), 
    //         type: "POST",        
    //         data: $('#patchRequest').serialize(), 
    //         dataType: 'json',
    //         cache: false, 
    //         success: function(data)
    //         {
    //             if(data['mes'] == 'Success')
    //             {
    //                 alert('Request Sent');
    //                 window.location.reload();
    //             }
    //             else if(data['mes'] == 'Duplicate')
    //             {
    //                 alert('Duplicate Data Entry');
    //             }
    //         },
    //         error: function(data)
    //         {
                
    //         }
    //     });
    // }));
    // $('#searchError').on('keyup', function(){
    //   var Search = $('#searchError').val();
    //   var act = "auto_search";

    //   if($('#searchError').val() != '')
    //   {
    //       $.ajax({
    //           async: true,
    //           url: $('#searchForm').data('source'), 
    //           type: "POST",        
    //           data: {search:Search,act:act}, 
    //           dataType: 'json',
    //           cache: false, 
    //           success: function(data)
    //           {
    //               var SearchResult = '<ul class="list-group">';
    //               $.each(data,function(index){
    //                   SearchResult +='<li class="list-group-item" style="color:black;">'+data[index]['tet_name']+'</li>';
    //               });
    //               SearchResult += '</ul>'
    //               $('#search-result').html(SearchResult);
    //               // alert(data[0]['tet_name']);
                  
    //           },
    //           error: function()
    //           {
    //               alert("error");
    //               return false;
    //           }
    //       });
    //   }
    //   else
    //   {
    //       $('#search-result').empty();
    //   }  
    // });
    // $(document).on('click', '#search-result li', function(){
    //     $('#searchError').val($(this).text());
    //     $('#searchForm').submit(); 
    // });
    // $(document).on('submit','#searchForm',function(){
    //   $("#SearchModal").modal('show');
    //   $.ajax({
    //     url:$('#searchForm').data('source'),
    //     type: "POST",        
    //     data: $('#searchForm').serialize(), 
    //     dataType: 'json',
    //     cache: false, 
    //     success: function(data)
    //     {
    //       $('#SearchList1').html(data.DATA);
    //       $('#searchError').empty();
    //       $('#search-result').empty();
    //     },
    //     error: function()
    //     {
    //         alert("error");
    //     }
    //   });
    //   return false;
    // });
    // $(document).on('click','#SearchList1 li',function(e){
    //   e.preventDefault();
    //   $('#ErrorModal').modal('toggle');
    //   return false;
    // });
    // $(document).on('click','.comment-btn-main',function(){
    //   $.ajax({
    //     url:'<?php echo base_url('C_guest/Index');?>',
    //     type: "POST",        
    //     data: $('#formComment').serialize(), 
    //     dataType: 'json',
    //     cache: false, 
    //     success: function(data)
    //     {
    //       if(data['mes'] == "Success")
    //       {
    //         loadSubcomment($('#ErrorID').val());
    //         alert('Success');
    //       }
    //     },
    //     error: function()
    //     {
    //         alert("ERROR");
    //     }
    //   });
    // });
    // $(document).on('click','.req-sign-up',function(){
    //   alert('You need to log-in to comment.');
    //   return false;
    // });
  });
</script>