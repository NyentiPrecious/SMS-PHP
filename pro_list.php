<?php
require 'config.php';
$conn = connection();
$sql = "SELECT * FROM product p inner join category c on c.cat_id=p.pro_grpid inner join type t on t.ty_id=p.pro_typeid inner join firm f on f.firm_id=p.pro_firmid
ORDER BY cat_name ASC ";
$data = $conn->query($sql);
$cat_dat = "SELECT * FROM category order by cat_name ASC";
$cat_dat = $conn->query($cat_dat);
$cat_dat1 = "SELECT * FROM category order by cat_name ASC";
$cat_dat1 = $conn->query($cat_dat1);
$firm_data = "SELECT * FROM firm order by firm_name ASC";
$firm_data = $conn->query($firm_data);
$firm_data1 = "SELECT * FROM firm order by firm_name ASC";
$firm_data1 = $conn->query($firm_data1);
$conn = null;

?>

<style>
   body {
 
 background: linear-gradient(
   to right,
   rgba(76, 76, 76, 1) 0%,
   rgba(102, 102, 102, 1) 0%,
   rgba(43, 43, 43, 1) 0%,
   rgba(33, 33, 33, 1) 46%,
   rgba(33, 33, 33, 1) 59%,
   rgba(17, 17, 17, 1) 98%,
   rgba(17, 17, 17, 1) 100%
 );
 color: white;

}
</style>

<!--   <div class="col-md-12"> -->
<div style="" class="panel panel-full-color panel-full-danger">
  <div class="panel-heading " style="background-color: #8A2BE2;">
    <strong>PRICE LIST</strong>
    <div style="" class="tools">
      <label class="control-label panel-heading" style="color:white;">&nbsp;</label>
      <select class="form-control " id="spro_firm" onchange="get_price_list(this.value);"
        style="margin-top:-32%;  background-color: #4BOO82;height:50%; width: 247px;">
        <option value="">Select firm</option>
        <?php foreach ($firm_data1 as $fd1) { ?>
          <option value="<?php echo $fd1['firm_id']; ?>"><?php echo ucwords($fd1['firm_name']);
             ; ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
</div>
<span id="datare">

</span>
<!--   </div> -->
<!-- <div class="col-sm-12">
    <div class="panel panel-default panel-table">      
      <div class="panel-body"> -->
<!-- <span id="datare">
         
        </span> -->
<!--  </div>
    </div>
  </div> -->
</div>

<script>
  function get_price_list(id) {
    $.ajax({
      type: "POST",
      url: 'get_price_list.php',
      data: { id: id },
      success: function (msg) {
        // alert(msg);
        $('#datare').html(msg);
      }
    });
  }
</script>