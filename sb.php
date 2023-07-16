<!-- STOCK BILL DETAILS -->
<?php

require 'config.php';
$conn = connection();
$sql = "SELECT * FROM bill_records ORDER BY bill_entrydt DESC";
$data = $conn->query($sql);

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

<!-- MODAL OPEN -->
<div id="form-bp1" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-dark">
  <div class="modal-dialog custom-width" style="height:200px;">
    <div class="modal-content" style="width:800px;">
      <div class="modal-header" style="background-color: #90A4AE;">
        <div class="col-md-12">
          <div class="col-md-6">
            <h3 class="modal-title"><strong>ORDERS</strong></h3>
          </div>
          <div class="col-md-6">
            <div class="btn-group btn-space" style="float: right;">
              <button class="btn btn-space md-trigger btn-danger" style="width: 100px;" onclick="prints();"
                formtarget="_blank"><i class="icon icon-left mdi mdi-assignment"></i>&nbsp;Print</button>
              <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span
                  class="mdi mdi-close"></span></button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <span id="view_bill">

        </span>
      </div>
    </div>
  </div>
</div>
<!-- MODAL CLOSE -->

<div class="col-md-12">

  <h1 style="margin-bottom: 2rem;"> Orders </h1>

  <div class="col-md-12">
    <div class="panel panel-full-color panel-primary">

      <div class="panel-body" style="background-color: #CCCCFF;">
        <div class="col-md-4">
          <!-- <label class="control-label panel-subtitle" style="color:white;font-size:20px;">Search by Name</label> -->
          <input type="text" placeholder="Enter Name..." id="sfirm_name" onkeyup="srch_showbill();"
            class="form-control input-xs">
        </div>
        <!-- <div class="col-md-4">    
          <label class="control-label panel-subtitle" style="color:white;">Search by GSTIN</label>      
          <input type="text" placeholder="Enter GSTIN" id="gstin" onkeyup="srch_showbill();" class="form-control input-xs">    
        </div> -->
        <div class="col-md-4">
          <!-- <label class="control-label panel-subtitle" style="color:white;font-size:20px;">Search by Bill no.</label> -->
          <input type="text" placeholder="Enter bill no." id="bill_no" onkeyup="srch_showbill();"
            class="form-control input-xs">
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-12">
    <div class="panel panel-default panel-table">

      <div style=" background: linear-gradient(to right,
  rgba(76, 76, 76, 1) 0%,
  rgba(102, 102, 102, 1) 0%,
  rgba(43, 43, 43, 1) 0%,
  rgba(33, 33, 33, 1) 46%,
  rgba(33, 33, 33, 1) 59%,
  rgba(17, 17, 17, 1) 98%,
  rgba(17, 17, 17, 1) 100%
  );
  color: white;" class="panel-body">
        <span id="srch_showbill">
          <table class="table">
            <thead>
              <tr>
                <th>
                  <center>#</center>
                </th>
                <th>
                  <center>Bill no.</center>
                </th>
                <th>
                  <center>Name</center>
                </th>
                <th>
                  <center>Total Amount</center>
                </th>
                <th>
                  <center>GSTIN</center>
                </th>
                <th>
                  <center>Transport Charge</center>
                </th>
                <th>
                  <center>Transport no.</center>
                </th>
                <th>
                  <center>Entry Date</center>
                </th>
                <th>
                  <center></center>
                </th>
              </tr>
            </thead>
            <tbody style="color: white;">
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
                    <center><strong>
                        <?php echo $row['bill_id']; ?>
                      </strong></center>
                  </td>
                  <td><strong>
                      <?php echo ucwords($row['bill_name']); ?>
                    </strong></td>
                  <td><strong>
                      <?php echo $row['bill_amt'] . "/-"; ?>
                    </strong></td>
                  <td><strong><input type="text" name="trans_no" value="<?php echo $row['bill_gst']; ?>"
                        onkeyup="fill_gst(<?php echo $row['bill_id']; ?>, this.value);"
                        class="form-control input-xs"></strong></td>
                  <td><strong><input type="text" name="trans_no" value="<?php echo $row['bill_tchrg']; ?>"
                        onkeyup="fill_chrg(<?php echo $row['bill_id']; ?>, this.value);"
                        class="form-control input-xs"></strong></td>
                  <td><strong><input type="text" name="trans_no" value="<?php echo $row['bill_tno']; ?>"
                        onkeyup="fill_tno(<?php echo $row['bill_id']; ?>, this.value);" class="form-control input-xs">
                  </td>
                  <td><strong>
                      <?php echo $row['bill_entrydt']; ?>
                  </td>
                  <td>
                    <center><button data-toggle="modal"
                        onclick="view_bill_stock(<?php echo $row['bill_id']; ?>,<?php echo $row['bill_type']; ?>)"
                        data-target="#form-bp1" class="btn btn-danger text-center">View</button></center>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </span>
      </div>
    </div>
  </div>
</div>

<!-- <script>
  function srch_showbill()
  {
      var name = $('#sfirm_name').val();
      var gstin = $('#gstin').val();
      var bill_no = $('#bill_no').val();
       var type = 1;
      $.ajax({
      type: "POST",
      url: 'srch_showbill.php',
      data: {name:name,gstin:gstin,bill_no:bill_no,type:type},
      success:function(msg) {
             // alert(msg);
            $('#srch_showbill').html(msg);
         }
    }); 
  }
</script>
<script type="text/javascript">
  function fill_tno(id,value)
  {
    $.ajax({
      type: "POST",
      url: 'fill_tno.php',
      data: {id:id,value:value},
      success:function(msg) {
            // alert(msg);
            // $('#output').html(msg);
         }
    });
  }
</script>
<script type="text/javascript">
  function fill_gst(id,value)
  {
    $.ajax({
      type: "POST",
      url: 'fill_gst.php',
      data: {id:id,value:value},
      success:function(msg) {
            // alert(msg);
            // $('#output').html(msg);
         }
    });
  }
</script>
<script type="text/javascript">
  function fill_chrg(id,value)
  {
    // alert(value);
    $.ajax({
      type: "POST",
      url: 'fill_chrg.php',
      data: {id:id,value:value},
      success:function(msg) {
            // alert(msg);
            // $('#output').html(msg);
         }
    });
  }
</script>
<script type="text/javascript">
  function view_bill_stock(id)
  {
    // alert(id);
    $.ajax({
      type: "POST",
      url: 'view_bill.php',
      data: {id:id},
      success:function(msg) {
            // alert(msg);
            $('#view_bill').html(msg);
         }
    });
  }
</script>
   -->
<script type="text/javascript">
  function prints() {

    var m = document.getElementById('view_bill').innerHTML;
    var s = document.body.innerHTML;
    document.body.innerHTML = document.getElementById('view_bill').innerHTML;
    window.print();
    document.body.innerHTML = s;
    //   var printPage = window.open(document.getElementById('view_bill').innerHTML, '_blank');
    // setTimeout(printPage.print(), 5);
  }
</script>