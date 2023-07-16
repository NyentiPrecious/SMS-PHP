<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- <link rel="shortcut icon" href=""> -->
  <title>SMS-PHp</title>
  <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css" />
  <link rel="stylesheet" type="text/css"
    href="assets/lib/material-design-icons/css/material-design-iconic-font.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
  <link rel="stylesheet" type="text/css" href="custom.css">
  <style type="text/css">
    body {

      font-family: 'Dancing Script', cursive;
    }
  </style>
</head>


<body style="font-size: 18px; font-weight: bold;  " onload="dis();">
  <div class="be-wrapper be-color-header be-color-header-primary">




    <nav class="navbar navbar-default navbar-fixed-top be-top-header">
      <div class="container-fluid" style="  background: linear-gradient(
      to right,
      rgba(76, 76, 76, 1) 0%,
      rgba(102, 102, 102, 1) 0%,
      rgba(43, 43, 43, 1) 0%,
      rgba(33, 33, 33, 1) 46%,
      rgba(33, 33, 33, 1) 59%,
      rgba(17, 17, 17, 1) 98%,
      rgba(17, 17, 17, 1) 100%
    );">
        <div class="navbar-header">

        </div>
        <div class="be-right-navbar">
          <ul class="nav navbar-nav navbar-right be-user-nav">
            <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                class="dropdown-toggle"><img src="assets/img/gh-icon.png" alt="Avatar"><span
                  class="user-name">Admin</span></a>
              <ul role="menu" class="dropdown-menu">
                <li><a href="#"><span class="icon mdi mdi-face"></span> Account</a></li>
                <li><a href="#"><span class="icon mdi mdi-settings"></span> Settings</a></li>
                <li><a href="index.html"><span class="icon mdi mdi-power"></span> Logout</a></li>
              </ul>
            </li>
          </ul>
          <div class="page-title"><span>PEF</span></div>

        </div>
      </div>
    </nav>


    <div class="be-left-sidebar">
      <div style="width:250px ; background: linear-gradient(
      to right,
      rgba(76, 76, 76, 1) 0%,
      rgba(102, 102, 102, 1) 0%,
      rgba(43, 43, 43, 1) 0%,
      rgba(33, 33, 33, 1) 46%,
      rgba(33, 33, 33, 1) 59%,
      rgba(17, 17, 17, 1) 98%,
      rgba(17, 17, 17, 1) 100%
    ); border: 0; padding:30px; position: fixed;" class="left-sidebar-wrapper">
        <a href="#" class="left-sidebar-toggle"></a>
        <div class="left-sidebar-spacer">
          <div class="left-sidebar-scroll">
            <div class="left-sidebar-content">
              <ul class="sidebar-elements">
                <li class="divider" style="color: white;font-size: 18px;"></li>
                <li><a id="dash" onclick="callPro(this.id);" style="cursor: pointer; color: white;"><i
                      class="icon mdi mdi-store"></i><span>Dashboard</span></a>
                </li>

                <li><a id="cat" onclick="callPro(this.id);" style="cursor: pointer; color: white;"><i
                      class="icon mdi mdi-receipt"></i><span>Categories</span></a>
                </li>

                <li><a id="pro" onclick="callPro(this.id);" style="cursor: pointer; color: white;"><i
                      class="icon mdi mdi-local-grocery-store"></i><span>Products</span></a>
                </li>

                <li><a id="sb" onclick="callPro(this.id);" style="cursor: pointer; color: white;"><i
                      class="icon mdi mdi-assignment"></i><span>Orders</span></a>
                </li>



                <li><a id="ty" onclick="callPro(this.id);" style="cursor: pointer; color: white;"><i
                      class="icon mdi mdi-shape"></i><span>Limited</span></a>
                </li>

                <li><a id="firm" onclick="callPro(this.id);" style="cursor: pointer; color: white;"><i
                      class="icon mdi mdi-store"></i><span>Supplier</span></a>
                </li>

                <li><a id="bill" onclick="callPro(this.id);" style="cursor: pointer; color: white;"><i
                      class="icon mdi mdi-assignment"></i><span>New supply</span></a>
                </li>



                <li><a id="c_bill" onclick="callPro(this.id);" style="cursor: pointer; color: white;"><i
                      class="icon mdi mdi-assignment"></i><span>Report</span></a>
                </li>
                <li><a id="show_seller_bill" onclick="callPro(this.id);" style="cursor: pointer; color: white;"><i
                      class="icon mdi mdi-assignment"></i><span>Creditors</span></a>
                </li>






                <!-- <li><a id="pro_list" onclick="callPro(this.id);" style="cursor: pointer; color: white;"><i
                      class="icon mdi mdi-money"></i><span>Price List</span></a>
                </li> -->


                <!-- <li><a id="st" onclick="callPro(this.id);" style="cursor: pointer; color: white;"><i
                      class="icon mdi mdi-grain"></i><span style="color:#332a7c;">Stock Details</span></a>
                </li> -->





                <!-- <li><a id="sbill" onclick="callPro(this.id);" style="cursor: pointer; color: white;"><i
                      class="icon mdi mdi-assignment-returned"></i><span>new credit</span></a>
                </li> -->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="be-content">

      <div class="main-content container-fluid">
        <!--PAGE CONTENT -->
        <div id="output">



          <?php ?>