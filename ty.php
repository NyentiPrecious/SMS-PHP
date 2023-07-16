<?php
require 'config.php';
$conn = connection();
$sql = "select * from category order by cat_name";
$data = $conn->query($sql);
$data1 = $conn->query($sql);
$ty_data = "SELECT * FROM type t inner join category c on t.ty_grp = c.cat_id order by ty_name ASC";
$ty_data = $conn->query($ty_data);
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
      <div style="background-color: CCCCFF;" class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span
            class="mdi mdi-close"></span></button>
        <h3 class="modal-title"><strong>ADD NEW GROUP MEASUREMENT</strong></h3>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Measurement Name or Type</label>
          <input type="text" id="ty_name" placeholder="enter measurement name or type" required=""
            class="form-control input-xs parsley-error">
        </div>
        <div class="form-group">
          <label>Choose Group</label>
          <select class="form-control input-xs" id="ty_grp" required="">
            <option value="">Select group</option>
            <?php foreach ($data as $row) { ?>
              <option value="<?php echo $row['cat_id']; ?>"><?php echo ucwords($row['cat_name']); ?></option>
            <?php } ?>
          </select>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default md-close">Cancel</button>
        <button type="submit" onclick="add_ty();" data-dismiss="modal" class="btn btn-success md-close">Proceed</button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL CLOSE -->
<div class="col-md-12">

  <h1 style="margin-left:2rem; margin-bottom: 2rem; "> Out Of Stock </h1>

  <div class="col-md-12">
    <div class="panel panel-full-color">

      <div class="panel-body" style="background-color: #CCCCFF">
        <div style="padding-top: 2.5rem; " class="col-md-4">
          <!-- <label class="control-label panel-subtitle" style="color:white;font-size:20px;">Search by Name</label> -->
          <input type="text" value="" id="sty_name" placeholder="Enter Name..." class="form-control input-xs"
            onkeyup="srch_ty();">
        </div>
        <div style="padding-top: 2.5rem;" class=" col-md-4">
          <!-- <label class="control-label panel-subtitle" style="color:white;font-size:20px;">Search by Group</label> -->
          <select class="form-control input-xs" id="sty_grp" required="" onchange="srch_ty();">
            <option value="">Select group</option>
            <?php foreach ($data1 as $row) { ?>
              <option value="<?php echo $row['cat_id']; ?>"><?php echo ucwords($row['cat_name']); ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-md-4">
          <label class="control-label ">&nbsp;</label><br>
          <div class="btn-group btn-space">
            <button data-toggle="modal" data-target="#form-bp1" class="btn btn-space md-trigger btn-danger"><i
                class="icon icon-left mdi mdi-shape"></i> ADD MEASUREMENT</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-12">
    <div class="panel panel-default panel-table">

      <div class="panel-body">
        <span id="srch_ty">
          <table style="background: linear-gradient(to right,
        rgba(76, 76, 76, 1) 0%,
        rgba(102, 102, 102, 1) 0%,
        rgba(43, 43, 43, 1) 0%,
        rgba(33, 33, 33, 1) 46%,
        rgba(33, 33, 33, 1) 59%,
        rgba(17, 17, 17, 1) 98%,
        rgba(17, 17, 17, 1) 100%);
    color: white;
    " class="table ">
            <thead>
              <tr>
                <th>
                  <center>SN</center>
                </th>
                <th>
                  <center>Measurement Name</center>
                </th>
                <th>
                  <center>Category</center>
                </th>
                <th>
                  <center>Category Description</center>
                </th>
                <th></th>
              </tr>
            </thead>
            <tbody style="background: linear-gradient(to right,
        rgba(76, 76, 76, 1) 0%,
        rgba(102, 102, 102, 1) 0%,
        rgba(43, 43, 43, 1) 0%,
        rgba(33, 33, 33, 1) 46%,
        rgba(33, 33, 33, 1) 59%,
        rgba(17, 17, 17, 1) 98%,
        rgba(17, 17, 17, 1) 100%);
    color: white;
    ">
              <?php $s = 0;
              foreach ($ty_data as $row) {
                $s++; ?>
                <tr>
                  <td>
                    <center>
                      <?php echo $s; ?>
                    </center>
                  </td>
                  <td>
                    <?php echo ucwords($row['ty_name']); ?>
                  </td>
                  <td>
                    <?php echo ucwords($row['cat_name']); ?>
                  </td>
                  <td>
                    <?php echo ucwords($row['cat_des']); ?>
                  </td>
                  <td><a href="delete-measurement.php?ty_id=<?php echo $row["ty_id"]; ?>"
                      class="btn btn-space md-trigger btn-CCCCFF" style="float: right;"><i
                        class="icon icon-left mdi mdi-close-circle"></i></a></td>
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
  function add_ty() {
    var name = $('#ty_name').val();
    var grp = $('#ty_grp').val();
    // alert(grp);
    $.ajax({
      type: "POST",
      url: 'ty_add.php',
      data: { name: name, grp: grp },
      success: function (msg) {
        //alert(msg);
        $('#srch_ty').html(msg);
      }
    });
  }
</script>
<script>
  function srch_ty() {
    var sname = $('#sty_name').val();
    var sgrp = $('#sty_grp').val();
    // alert(sname);
    $.ajax({
      type: "POST",
      url: 'srch_ty.php',
      data: { sname: sname, sgrp: sgrp },
      success: function (msg) {
        //alert(msg);
        $('#srch_ty').html(msg);
      }
    });
  }
</script>