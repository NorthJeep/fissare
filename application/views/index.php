<!DOCTYPE html>
<html lang="en">

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

<body class="index-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
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
  </nav>
  <div class="page-header header-filter clear-filter" data-parallax="true" style="background-image: url('./resources/fissare-bg.jpg'); z-index: 1">
    <div class="container">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="row brand">
            <a href="<?php echo base_url('C_guest');?>"><img src="<?php echo base_url()?>resources/logo-fissare.png" alt="Fissare_Logo" width="50%" height="auto"/></a>
          </div>
          <form  action="#" id="searchForm" name="searchForm" data-source="<?php echo base_url('C_guest/Index');?>" novalidate>
          <div class="row container">
            <div class="col-md-12 form-inline" style="display:absolute; background-color: white;">
              <div class="col-md-10">
                <input id="searchError" name="search" type="text" placeholder="Search..." class="form-control" style="width: 500px">
              </div>
              <div class="col-md-2">
                <input type="hidden" name="act" id="act" value="search">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </div>
          </div>
          </form>
          <div style="position: absolute;">
            <div id="search-result" class="col-md-12" style="background-color:white; overflow-y: auto; max-height: 200px;"></div>
          </div>
        </div>
    </div>
  </div>
  <!-- SUPPORTED SYSTEM -->
    <div class="main ">
      <div class="section section-white">
        <div class="container">
          <div id="navigation-pills">
            <div class="title">
              <h3>Fissare : Supported Systems</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div id="SupportedPanel" class="row">
                <div class="col-md-6">
                  <ul id="GUList" class="nav nav-pills nav-pills-icons flex-column" role="tablist">
                    
                  </ul>
                </div>
                <div class="col-md-6" style="overflow-y: auto; max-height: 300px;">
                  <div id="SysList" class="tab-content">
                  </div>
                </div>
              </div>
              <nav aria-label="Page navigation">
                <ul class="pagination justify-content-end">
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END SUPPORTED SYSTEM -->
  </div>

  <!-- ERROR SEARCH MODAL -->
    <div class="modal fade" id="SearchModal" tabindex="-1" role="dialog" aria-hidden="true">
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
            <!-- <button type="button" class="btn btn-primary">Request</button> -->
          </div>
        </div>
      </div>
    </div>
  <!-- END ERROR SEARCH MODAL -->

  <!-- PATCH MODAL -->
    <form action="#" id="patchRequest" name="patchRequest" data-source="<?php echo base_url('C_guest/Index');?>" novalidate>
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
    </form>
  <!-- END PATCH MODAL -->

  <!-- SYSTEM MODAL -->
   
   <!-- Modal -->
    <div class="modal fade" id="SystemModal" tabindex="-1" role="dialog" aria-labelledby="SystemLabel" aria-hidden="true">
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
            <!-- <button type="button" class="btn btn-primary">Request</button> -->
          </div>
        </div>
      </div>
    </div>
  <!-- END SYSTEM MODAL -->

  <!-- ERROR MODAL -->
    
      <div class="modal fade" id="ErrorModal" tabindex="-1" role="dialog" aria-labelledby="ErrorLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <p>
                <label class="modal-title" id="ErrorType" style="color: red;"></label>
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
                <?php
                if($this->session->has_userdata('id'))
                {
                  echo '<a target="_blank" id="print-btn" href="#" class="btn btn-default btn-sm float-right">
                          <i class="material-icons">print</i> Print
                        </a>';
                }
                else
                {
                  echo '<a href="#" class="btn btn-default btn-sm float-right req-sign-up">
                          <i class="material-icons">print</i> Print
                        </a>';
                }
                ?>
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
                      <?php
                      if($this->session->has_userdata('id'))
                      {
                        echo '<button id="dl-btn" type="button" class="btn btn-secondary float-right" onclick="dlAttachment($(`#ErrorID`).val(),``)">Download Attachment</button>';
                      }
                      else
                      {
                        echo '<button id="dl-btn" type="button" class="btn btn-secondary float-right req-sign-up">Download Attachment</button>';
                      }
                      ?>
                    </label>
                    <form action="#" id="formComment" name="formComment" data-source="<?php echo base_url('C_guest/Index');?>" novalidate multiple enctype="multipart/form-data">
                      <div class="col-md-12">
                          <div class="col-md-4">
                            <input type="text" name="EID" id="ErrorID" hidden>
                            <input type="hidden" name="act" id="act" value="comment">
                            <textarea id="commentTxt" name="commentTxt" type="text" placeholder="Comment something..." class="form-control" style="width: 500px;" rows="5"></textarea>
                            <input id="fileUp" name="fileUp[]" type="file" placeholder="Upload something..." class="form-control" style="display:none;" multiple enctype="multipart/form-data">
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
                <!-- START COMMENTS -->
                <div id="CommentDiv" style="overflow-y: auto; max-height: 300px;">
                  
                </div>
                <!-- END COMMENTS-->
            </div>
            <div class="modal-footer">
              <input id="act" name="act" type="hidden" value="add">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              
              
            </div>
          </div>
        </div>
      </div>
  <!-- END ERROR MODAL -->

  <!-- SYSTEM ERROR MODAL -->
    <form action="#" id="ErrorForm" name="ErrorForm" data-source="<?php echo base_url('C_guest/Index');?>" novalidate>
      <div class="modal fade" id="ErrorModal" tabindex="-1" role="dialog" aria-labelledby="ErrorLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ErrorLabel">SYSTEM NAME</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <p>
                    <label>version:</label>
                </p>
                <h5>
                    Errors Name:
                </h5>
                <div>
                  <p>
                    Description:
                  </p>
                  <p>
                    Instruction:
                  </p>
                </div>
            </div>
            <div class="modal-footer">
              <input id="act" name="act" type="hidden" value="add">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-secondary">Download</button>
              <button type="button" class="btn btn-primary">Print</button>
            </div>
          </div>
        </div>
      </div>
    </form>
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

    function commentReact(CID,react){
      // alert(CID+' '+react);
      $.ajax({
        url:'<?php echo base_url('C_guest/index')?>',
        type:"post",
        dataType:'json',
        cache: false,
        data:{CID:CID,react:react,act:"commentReact"},
        success:function(data){
          if(data['mes'] == "Updated")
          {
            // alert(data['mes']);
            loadSubcomment($('#ErrorID').val());
          }
          else
          {
            // alert(data['mes']);
          }
        },
        error:function(){
          alert('error');
        }
      });
    }
    function dlAttachment(EID,CID){
      // alert(EID+' '+CID);
      $.ajax({
      url:'<?php echo base_url('C_guest/index')?>',
        type:"post",
        dataType:'json',
        cache: false,
        data:{EID:EID,CID:CID,act:"dlAttachment"},
        success:function(data){
          alert('download will start in a moment.');
        },
        error:function(){
          alert('error');
        }
      });
    }
    function printError(EID) {
        // var printError = window.open('<?php echo base_url();?>resources/print/print.php');
        // printError
        // var div = 'tempDiv';
        //  var printContents = document.getElementById(div).innerHTML;
        //  var originalContents = document.body.innerHTML;

        //  document.body.innerHTML = printContents;

        //  window.print();

        //  document.body.innerHTML = originalContents;
    }
    function loadSubcomment(ErrorID){
      $.ajax({
        url:'<?php echo base_url('C_guest/index')?>',
        type:"post",
        dataType:'json',
        cache: false,
        data:{id:ErrorID,act:"getComment"},
        success:function(data){
          // alert(data.Output);
          $('#CommentDiv').empty();
          $('#CommentDiv').html(data.DATA);
        },
        error:function(){
        }
      });
    }
    function loadError(EID){
      var ErrorID = EID;
      $.ajax({
        url:'<?php echo base_url('C_guest/index')?>',
        type:"post",
        dataType:'json',
        cache: false,
        data:{id:ErrorID,act:"getEInfo"},
        success:function(data){
          $('#ErrorID').val(data.tet_id);
          $('#ErrorSys').text(data.rss_name);
          $('#ErrorDesc').text(data.tet_description);
          $('#ErrorType').text(data.tet_error_type);
          $('#ErrorLabel').text(data.tet_name);
          $('#ErrorInstruc').text(data.tet_instruction);
          $('#ErrorVer').text(data.tet_version);
          document.getElementById('print-btn').href = '<?php echo base_url('C_guest/print');?>?ErrorID='+data.tet_id;
          if(data.tet_dlFlag == "FALSE")
          {
            $('#dl-btn').hide();
          }
          else
          {
            $('#dl-btn').show();
          }
        },
        error:function(){
        }
      });
      loadSubcomment(ErrorID);
    }
    function SubCommentAdd(CID){
      var formID = '#formSubComment'+CID+'';
      // $.ajax({
      //   url:'<?php echo base_url('C_guest/index')?>',
      //   type:"post",
      //   dataType:'json',
      //   cache: false,
      //   data:$(formID).serialize(),
      //   success:function(data){
      //     if(data['mes'] == "Success")
      //     {
      //       alert('Success');
      //       loadSubcomment($('#ErrorID').val());
      //     }
          
      //   },
      //   error:function(){
      //     alert("Failed");
      //   }
      // });
      var formData = new FormData($(formID)[0]);
      $.ajax
      ({
          url: '<?php echo base_url('C_guest/index')?>',
          type : 'POST',
          data: formData,
          async : false,
          cache : false,
          contentType : false,
          processData : false,
          success: function(data)
          {
            alert('Successfully Uploaded'); 
            // window.location.reload(); 
            loadSubcomment($('#ErrorID').val());
          },
          error:function(){
            alert("Error");
          }
      });
    }
    function passData(rss_id,sys_name){
      $('#SysText').text(sys_name);
      $.ajax({
        url:'<?php echo base_url('C_guest/index')?>',
        type:"post",
        dataType:'json',
        cache: false,
        data:{id:rss_id,act:"getEList"},
        success:function(data){
          $('#ErrorList').empty();
          $('#ErrorList').html(data.output);
        },
        error:function(){
          alert('FAILED');
        }
      });
    }

  </script>
</body>

</html>
<script type="text/javascript">
  $(document).ready(function(){
    // function paginationNo(){
    //   $.ajax({
    //     url: '<?php echo base_url('C_guest/index')?>?paginationNo=true', 
    //     type: "GET",
    //     dataType: 'json',
    //     cache: false, 
    //     success: function(data)
    //     {

    //     },
    //     error:function(){

    //     }
    //   });
    // }
    function loadSystems(No){
      var PageNo = No;
      // var PageNo = $(".pagination > .active").text();
      $.ajax({
        url:'<?php echo base_url('C_guest/index')?>',
        type:"post",
        dataType:'json',
        cache: false,
        data:{PageNo:PageNo,act:"suppSystem"},
        success:function(data){
          $('#GUList').empty();
          $('#GUList').html(data.GovPanel);
          $('#SysList').empty();
          $('#SysList').html(data.SysPanel);
        },
        error:function(){
          alert('FAILED');
        }
      });
    }
    loadSystems(1);

    $('.pagination li').on('click', function(){
      var PNo = $(this).text();
      $(".pagination li").removeClass("active");
      $(this).addClass('active');
      loadSystems(PNo);
      return false;
    });
    $('#patchRequest').on('submit', (function (e){
        e.preventDefault();
        $.ajax({
            async: true,
            url: $('#patchRequest').data('source'), 
            type: "POST",        
            data: $('#patchRequest').serialize(), 
            dataType: 'json',
            cache: false, 
            success: function(data)
            {
                if(data['mes'] == 'Success')
                {
                    alert('Request Sent');
                    window.location.reload();
                }
                else if(data['mes'] == 'Duplicate')
                {
                    alert('Duplicate Data Entry');
                }
            },
            error: function(data)
            {
                
            }
        });
    }));
    $('#searchError').on('keyup', function(){
      var Search = $('#searchError').val();
      var act = "auto_search";

      if($('#searchError').val() != '')
      {
          $.ajax({
              async: true,
              url: $('#searchForm').data('source'), 
              type: "POST",        
              data: {search:Search,act:act}, 
              dataType: 'json',
              cache: false, 
              success: function(data)
              {
                  var SearchResult = '<ul class="list-group">';
                  $.each(data,function(index){
                      SearchResult +='<li class="list-group-item" style="color:black;">'+data[index]['tet_name']+'</li>';
                  });
                  SearchResult += '</ul>'
                  $('#search-result').html(SearchResult);
                  // alert(data[0]['tet_name']);
                  
              },
              error: function()
              {
                  alert("error");
                  return false;
              }
          });
      }
      else
      {
          $('#search-result').empty();
      }  
    });
    $(document).on('click', '#search-result li', function(){
        $('#searchError').val($(this).text());
        $('#searchForm').submit(); 
    });
    $(document).on('submit','#searchForm',function(){
      $("#SearchModal").modal('show');
      $.ajax({
        url:$('#searchForm').data('source'),
        type: "POST",        
        data: $('#searchForm').serialize(), 
        dataType: 'json',
        cache: false, 
        success: function(data)
        {
          $('#SearchList1').html(data.DATA);
          $('#searchError').empty();
          $('#search-result').empty();
        },
        error: function()
        {
            alert("error");
        }
      });
      return false;
    });
    $(document).on('click','#SearchList1 li',function(e){
      e.preventDefault();
      $('#ErrorModal').modal('toggle');
      return false;
    });
    $(document).on('click','.comment-btn-main',function(){
      // $.ajax({
      //   url:'<?php echo base_url('C_guest/Index');?>',
      //   type: "POST",        
      //   data: $('#formComment').serialize(), 
      //   dataType: 'json',
      //   cache: false, 
      //   success: function(data)
      //   {
      //     if(data['mes'] == "Success")
      //     {
      //       loadSubcomment($('#ErrorID').val());
      //       alert('Success');
      //     }
      //   },
      //   error: function()
      //   {
      //       alert("ERROR");
      //   }
      // });
      var formData = new FormData($('#formComment')[0]);
      $.ajax
      ({
          url: '<?php echo base_url('C_guest/index')?>',
          type : 'POST',
          data: formData,
          async : false,
          cache : false,
          contentType : false,
          processData : false,
          success: function(data)
          {
            alert('Successfully Uploaded'); 
            // window.location.reload(); 
            loadSubcomment($('#ErrorID').val());
          }
      });
    });
    $(document).on('click','.req-sign-up',function(){
      alert('You need to log-in to comment or download attachments.');
      return false;
    });
  });
</script>