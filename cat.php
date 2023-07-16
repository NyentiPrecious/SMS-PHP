<?php
require 'config.php';
$conn = connection();
$sql = "SELECT * FROM category order by cat_name ASC";
$data = $conn->query($sql);
$conn = null;
?>

<style>
  body {

    background: linear-gradient(to right,
        rgba(76, 76, 76, 1) 0%,
        rgba(102, 102, 102, 1) 0%,
        rgba(43, 43, 43, 1) 0%,
        rgba(33, 33, 33, 1) 46%,
        rgba(33, 33, 33, 1) 59%,
        rgba(17, 17, 17, 1) 98%,
        rgba(17, 17, 17, 1) 100%);
    color: white;
    font-family: 'Cute Font', cursive;

  }
</style>


<div id="form-bp1" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-CCCCFF">
  <div class="modal-dialog custom-width">
    <div class="modal-content">
      <div style="background-color: #CCCCFF" class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span
            class="mdi mdi-close"></span></button>
        <h3 class="modal-title"><strong>ADD NEW CATEGORY</strong></h3>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <!-- <label>Category Name</label> -->
          <input type="text" id="acat_name" placeholder="enter category name" required=""
            class="form-control input-xs parsley-error">
        </div>
        <div class="form-group">
          <!-- <label>Category Description</label> -->
          <textarea class="form-control input-xs" id="acat_des" placeholder="enter category description..."></textarea>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default md-close">Cancel</button>
        <button type="submit" onclick="add_cat();" data-dismiss="modal" class="btn btn-CCCCFF md-close">Proceed</button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL CLOSE -->
<div class="col-md-12">

  <h1 style="margin-bottom: 3rem; margin-left: 2.5rem; ">Category </h1>

  <div class="col-md-12">
    <!-- <div class="panel panel-full-color panel-full-success">
      <div class="panel-heading panel-heading-contrast" style="background-color: #9F2B68;"><strong>CATEGORY
          DETAILS</strong>
      <div class="tools"><span class="icon mdi"></span></div><span class="panel-subtitle"></span>
    </div> -->
    <div class="panel-body" style="background-color: #CCCCFF">
      <div class="col-md-4">
        <!-- <label class="control-label panel-subtitle" style="color:white;font-size:20px;">Search by Name</label> -->
        <input type="text" id="scat_name" onkeyup="srch_cat();" placeholder="Enter Name..." style="margin:3rem"
          class="form-control input-xs">
      </div>
      <div class="col-md-4">
        <!-- <label class="control-label panel-subtitle" style="color:white;font-size:20px;">Search by Description</label> -->
        <input type="text" id="scat_des" onkeyup="srch_cat();" placeholder="Enter description..." style="margin:3rem"
          class="form-control input-xs">
      </div>
      <div class="col-md-4">
        <label class="control-label ">&nbsp;</label><br>
        <div class="btn-group btn-space">
          <button data-toggle="modal" data-target="#form-bp1" style="margin-left: 5rem; background-color: #9F2B68;"
            class="btn btn-space md-trigger btn-danger"><i class="icon icon-left mdi mdi-receipt"></i> ADD
            CATEGORY</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-sm-12">
  <div class="panel panel-default panel-table">
    <!-- <div class="panel-heading"><strong>CATEGORY TABLE</strong> -->
  </div>
  <div style="color: white;" class="panel-body">
    <span id="srch_cat">
      <table style="color: white;" class="table ">
        <thead>
          <tr>
            <th>
              <center>SN</center>
            </th>
            <th>
              <center>Name</center>
            </th>
            <th>
              <center>Description</center>
            </th>
            <th>
              <center></center>
            </th>
            <!--  <th><center>Status</center></th> -->
          </tr>
        </thead>

        <tbody style="color:white;">
          <?php $s = 0;
          foreach ($data as $row) {
            $s++; ?>
            <tr>
              <td>
                <center>
                  <?php echo $s; ?>
                </center>
              </td>
              <td>
                <?php echo ucwords($row['cat_name']); ?>
              </td>
              <td>
                <?php echo ucwords($row['cat_des']); ?>
              </td>
              <td><a href="delete-cat.php?cat_id=<?php echo $row["cat_id"]; ?>" class="btn btn-space md-trigger btn-CCCFF"
                  style="float: right;"><i class="icon icon-left mdi mdi-close-circle"></i></a></td>
            </tr>
          <?php } ?>
        </tbody>

      </table>
    </span>
  </div>
</div>
</div>
</div>


<script>
  function callPro(id) {
    var pro = id;
    // alert(id);
    $.ajax({
      type: "POST",
      url: 'nav.php',
      data: { pro: pro },
      success: function (msg) {
        // alert(msg);
        $('#output').html(msg);
      }
    });
  }
</script>
<script>
  function add_cat() {
    var name = $('#acat_name').val();
    var des = $('#acat_des').val();
    $.ajax({
      type: "POST",
      url: 'cat_add.php',
      data: { name: name, des: des },
      success: function (msg) {
        //alert(msg);
        $('#srch_cat').html(msg);
      }
    });
  }
</script>
<script>
  function srch_cat() {
    var sname = $('#scat_name').val();
    var sdes = $('#scat_des').val();
    $.ajax({
      type: "POST",
      url: 'srch_cat.php',
      data: { sname: sname, sdes: sdes },
      success: function (msg) {
        //alert(msg);
        $('#srch_cat').html(msg);
      }
    });
  }
</script>