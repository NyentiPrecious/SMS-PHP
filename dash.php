<?php
require 'config.php';
$conn = connection();
$sql = "SELECT * FROM product p inner join category c on c.cat_id=p.pro_grpid inner join type t on t.ty_id=p.pro_typeid inner join firm f on f.firm_id=p.pro_firmid
ORDER BY cat_name ASC";
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


  /* === Main === */
  main {


    display: flex;
  }

  main section {
    height: 97vh;
  }

  .main {
    flex-basis: 55%;
    margin: 0 3rem 0 2rem;
    display: flex;
    flex-direction: column;
    /* align-items: flex-start; */
  }

  .main .baner {
    background-color: #332a7c;
    padding-left: 3rem;
    border-radius: 22px;
    width: 100%;
    height: 200px;
    box-sizing: border-box;
    margin-top: 1rem;
    justify-content: space-between;
    display: flex;
    align-items: center;
  }

  .main .baner .baner-text {
    color: var(--text-primary);
    margin: 3rem 0;
  }

  .main .baner .baner-text p {
    font-weight: 200;
  }

  .main .baner .baner-text h1 {
    font-size: 25px;
    font-weight: 400;
  }

  .main .baner .baner-png img {
    width: 150px;
    height: 200px;
  }

  .main .month {
    width: 100%;
  }

  .main .month .month-header {
    display: flex;
    height: 70px;
    justify-content: space-between;
    flex-direction: row;
    align-items: baseline;
    border-bottom: 0.5px solid #f5f5fa;
  }

  .main .month .month-header .paginate-month {
    display: flex;
    align-items: center;
  }

  .main .month .month-header .paginate-month span {
    display: flex;
    background-color: #f45564;
    border-radius: 14px;
    width: 40px;
    height: 22px;
    align-items: center;
    justify-content: center;
  }

  .main .month .month-header .paginate-month span i.fa-chevron-left {
    color: #f7858f;
  }

  .main .month .month-header .paginate-month span i {
    font-size: 9px;
    color: #fff;
    margin: 0 4px;
  }

  .main .month .month-header .paginate-month p,
  .main .weekly .weekly-header p,
  .main .update .update-header p,
  .statistics .statistics-body .function p,
  .statistics .statistics-body .cleaning p {
    margin-right: 15px;
    font-weight: 400;
    color: #332a7c;
  }

  .main .month .month-header .name-month {
    background-color: #f8f8fd;
    width: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 5px;
    box-sizing: border-box;
    padding: 5px;
    text-align: center;
  }

  .main .month .month-header .name-month i {
    font-size: 14px;
    color: white;
  }

  .main .month .month-header .name-month span {
    font-weight: 400;
    font-size: 31px;
    margin-left: 5px;
    color: #cccbdd;
  }

  .main .month .month-body {
    display: flex;
    justify-content: space-around;
    align-items: center;
    box-sizing: border-box;
    padding: 1rem 0;
    border-bottom: 0.5px solid #f5f5fa;
  }

  .main .month .month-body .month-day {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 0.25rem 0.65rem;
    border-radius: 12px;
    box-sizing: border-box;
  }

  .main .month .month-body .month-day p {
    color: white;
    font-size: 16px;
    font-weight: 300;
  }

  .main .month .month-body .month-day span {
    color: white;
    font-size: 12px;
    font-weight: 400;
  }

  .main .month .month-body .month-day span.circle {
    width: 5px;
    height: 5px;
    display: block;
    border-radius: 50%;
    color: white;
    margin-top: 5px;
  }

  .main .month .month-body .month-day.active {
    background-color: #332a7c;
    -webkit-box-shadow: 0px 3px 17px -2px rgba(249, 103, 118, 1);
    -moz-box-shadow: 0px 3px 17px -2px rgba(249, 103, 118, 1);
    box-shadow: 0px 3px 17px -2px rgba(249, 103, 118, 1);
  }

  .main .month .month-body .month-day.active span,
  .main .month .month-body .month-day.active p {
    color: #fff;
  }

  .main .weekly {
    width: 100%;
    display: flex;
    margin: 1rem 0;
    flex-direction: column;
  }

  .main .weekly .weekly-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
  }

  .main .weekly .link a {
    font-size: 12px;
    text-decoration: none;
    color: #aaa9c2;
    font-weight: 400;
  }

  .main .weekly .link a.active {
    font-size: 13px;
    color: #CCCCFF;
    font-weight: 500;
  }

  .main .weekly .weekly-body {
    width: 100%;
    display: flex;
    height: 150px;
    justify-content: space-between;
  }

  .main .weekly .weekly-body .item {
    align-items: center;
    display: flex;
    flex-direction: column;
    padding: 1rem 2rem;
    border-radius: 12px;
    border: 0.5px solid #f7f7fa;
    box-sizing: border-box;
  }

  .main .weekly .weekly-body .item span {
    padding: 0.25rem 0.5rem;
    border-radius: 12px;
    transition: background-color 0.4s ease-in-out, color 0.4s ease-in-out;
  }

  .main .weekly .weekly-body .item p {
    font-size: 11px;
    font-weight: 400;
    color: #8684a9;
  }

  .main .weekly .weekly-body .item .item-size {
    font-size: 16px;
    color: #332a7c;
    margin: 0;
    transition: transform 0.4s;
  }

  .main .weekly .weekly-body .item:hover .item-size {
    background-color: #ffaf28;
    transform: scale(1.09);
    padding: 1rem 1.5rem;
    border-radius: 12px;
    color: #fff;
  }

  .main .weekly .weekly-body .item:hover span {
    background-color: #ffaf28;
  }

  .main .weekly .weekly-body .item:nth-child(2):hover .item-size,
  .main .weekly .weekly-body .item:nth-child(2):hover span {
    background-color: #f96776;
  }

  .main .weekly .weekly-body .item:nth-child(3):hover .item-size,
  .main .weekly .weekly-body .item:nth-child(3):hover span {
    background-color: #89e0f0;
  }

  .main .weekly .weekly-body .item:nth-child(4):hover .item-size,
  .main .weekly .weekly-body .item:nth-child(4):hover span {
    background-color: #8b8de6;
  }

  .main .weekly .weekly-body .item:hover span i {
    color: #fff;
  }

  .main .update {
    width: 100%;
  }

  .main .update .update-body {
    width: 100%;
    display: flex;
    justify-content: space-between;
  }

  .main .update .update-body .system,
  .main .update .update-body .application {
    width: 45%;
    height: 100px;
    border-radius: 25px;
    display: flex;
    -webkit-box-shadow: 5px 3px 8px 0px rgba(247, 247, 250, 1);
    -moz-box-shadow: 5px 3px 8px 0px rgba(247, 247, 250, 1);
    box-shadow: 5px 3px 8px 0px rgba(247, 247, 250, 1);
    box-sizing: border-box;
    padding: 0 1rem;
    align-items: center;
  }

  .main .update .update-body .system hr,
  .main .update .update-body .application hr {
    height: 70%;
    color: #c6c2e8;
    border-width: 0.5px !important;
    opacity: 0.3;
  }

  .main .update .update-body .update-content h3 {
    font-size: 13px;
    font-weight: 400;
  }

  .main .update .update-body .update-content p {
    font-size: 10px;
  }

  .main .update .update-body .update-charts,
  .main .update .update-body .update-content {
    width: 35%;
  }

  .main .update .update-body .update-charts {
    display: flex;
    flex-direction: column;
    overflow: hidden;
    align-items: center;
    height: 100px;
    box-sizing: border-box;
    margin-left: auto;
  }

  .circle-chart__circle {
    animation: circle-chart-fill 2s reverse;
    /* 1 */
    transform: rotate(-90deg);
    /* 2, 3 */
    transform-origin: center;
    /* 4 */
  }

  .circle-chart__circle--negative {
    transform: rotate(0deg) scale(1, -1);
    /* 1, 2, 3 */
  }

  .circle-chart__info {
    animation: circle-chart-appear 2s forwards;
    opacity: 0;
    transform: translateY(0.3em);
  }

  .circle-chart__percent:nth-child(2) {
    fill: white;
  }

  .statistics {
    display: grid;
    grid-template-rows: 0.5fr 3fr;
    width: 100%;
    padding: 1rem 0 1rem 1rem;
  }

  .statistics .statistics-header {
    width: 100%;
    padding-right: 1rem;
  }

  .statistics .statistics-header div {
    display: flex;
    align-items: center;
    flex-direction: row-reverse;
    padding-right: 1rem;
    box-sizing: border-box;
  }

  .statistics .statistics-header a {
    text-decoration: none;
    color: #534f85;
    margin: 0 10px;
  }

  .statistics .statistics-header a img {
    width: 30px;
    height: 30px;
    object-fit: cover;
    border-radius: 10px;
  }

  .statistics .statistics-header a i {
    font-size: 20px;
  }

  .statistics .statistics-header a.active {
    position: relative;
  }

  .statistics .statistics-header a.active::before {
    content: "";
    position: absolute;
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background-color: #f96776;
    right: 0;
  }

  .statistics .statistics-body {
    /* background-color: #f6f6fc; */
    border-top-left-radius: 40px;
    display: grid;
    grid-template-rows: 0.8fr 1fr;
    padding-left: 2.5rem;
  }

  .statistics .statistics-body .function {
    box-sizing: border-box;
    margin-top: 1.5rem;
  }

  .statistics .statistics-body .function .fn {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 1fr 1fr;
    padding-right: 2rem;
    gap: 20px;
  }

  .statistics .statistics-body .function .fn div {
    height: 110px;
    border-radius: 23px;
    background: linear-gradient(90deg, #312b47 0%, #4e4d5d 100%);
    box-sizing: border-box;
    padding: 0.2rem 0;
  }

  .statistics .statistics-body .function .fn .last_child {
    background-color: #f6f6fc;
    border: 1px solid #cfcdee;
  }

  .statistics .statistics-body .function .fn .last_child i {
    color: #bfbdda;
  }

  .statistics .statistics-body .function .fn div .bc-fn {
    border-radius: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 40px;
    width: 85%;
    margin: 0 auto;

    padding: 0 0.5rem;
  }

  .statistics .statistics-body .function .fn div .bc-fn span {
    padding: 0.5rem;
    color: #fff;
    border-radius: 10px;
  }

  .statistics .statistics-body .function .fn div .fn-description {
    display: flex;
    justify-content: space-between;
    background-color: transparent;
    align-items: center;
    height: 50px;
    width: 85%;
    margin: 0 auto;
    padding: 0 0.5rem;
  }

  .statistics .statistics-body .function .fn div .fn-description p {
    color: #6b6896;
    font-size: 11px;
  }

  .statistics .statistics-body .function .fn div .fn-description .toggle-btn {
    width: 35px;
    height: 20px;
    background-color: #e4e4f6;
    display: flex;
    align-items: center;
    border-radius: 30px;
    padding: 5px;
    transition: all 300ms ease-in-out;
  }

  .statistics .statistics-body .function .fn div .fn-description .toggle-btn>.inner-circle {
    width: 12px;
    height: 12px;
    background-color: #bbb9d9;
    border-radius: 50%;
    transition: all 300ms ease-in-out;
  }

  .statistics .statistics-body .function .fn div .fn-description .toggle-btn:hover {
    cursor: pointer;
  }

  .statistics .statistics-body .function .fn div:last-child .fn-description .toggle-btn:hover {
    cursor: inherit;
  }

  .statistics .statistics-body .function .fn div .fn-description .toggle-btn.bc-toggle-orange {
    background-color: #ffeccc;
  }

  .statistics .statistics-body .function .fn div .fn-description .toggle-btn.bc-toggle-red {
    background-color: #fcdde1;
  }

  .statistics .statistics-body .function .fn div .fn-description .toggle-btn.bc-toggle-cyn {
    background-color: #e7f9fc;
  }

  .statistics .statistics-body .function .fn div .fn-description .toggle-btn.bc-toggle-orange>.inner-circle,
  .statistics .statistics-body .function .fn div .fn-description .toggle-btn.bc-toggle-red>.inner-circle,
  .statistics .statistics-body .function .fn div .fn-description .toggle-btn.bc-toggle-cyn>.inner-circle {
    margin-left: 12px;
  }

  .statistics .statistics-body .function .fn div .fn-description .toggle-btn.bc-toggle-red>.inner-circle {
    background-color: #f96776;
  }

  .statistics .statistics-body .function .fn div .fn-description .toggle-btn.bc-toggle-cyn>.inner-circle {
    background-color: #89e0f0;
  }

  .statistics .statistics-body .function .fn div .fn-description .toggle-btn.bc-toggle-orange>.inner-circle {
    background-color: #ffaf28;
  }

  .statistics .statistics-body .cleaning {}

  .statistics .statistics-body .cleaning .cleaning-statistic {
    /* background-color: #fff; */

    height: auto;
    -webkit-box-shadow: -5px 4px 10px -10px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: -5px 4px 10px -10px rgba(0, 0, 0, 0.75);
    box-shadow: -5px 4px 10px -10px rgba(0, 0, 0, 0.75);
    border-radius: 14px;
    height: 300px;
    width: 95%;
    box-sizing: border-box;
    padding: 1rem 2rem;
  }

  .statistics .statistics-body .cleaning .cleaning-statistic .cleaning-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .statistics .statistics-body .cleaning .cleaning-statistic .cleaning-header .cleaning-header-title p {
    font-size: 12px;
  }

  .statistics .statistics-body .cleaning .cleaning-statistic .cleaning-header .cleaning-header-title span {
    font-size: 15px;
    color: #332a7c;
  }

  .statistics .statistics-body .cleaning .cleaning-statistic .cleaning-header .cleaning-header-button {
    display: flex;
    justify-content: space-between;
    width: 17%;
    border: 1px solid #ccc;
    padding: 0.25rem;
    box-sizing: border-box;
    border-radius: 5px;
  }

  .statistics .statistics-body .cleaning .cleaning-statistic .cleaning-header .cleaning-header-button a {
    padding: 0.15rem 0.25rem;
    box-sizing: border-box;
    border-radius: 3px;
  }

  .statistics .statistics-body .cleaning .cleaning-statistic .cleaning-body {
    font-size: 12px;
    font-weight: 600;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: space-between;
  }

  .statistics .statistics-body .cleaning .cleaning-statistic #chartVertical {
    height: 180px;
    width: 350px;
    background-color: transparent;
    border-bottom: 1px solid white;
    margin-top: 10px;
  }

  .statistics .statistics-body .cleaning .cleaning-statistic #chartVertical .charts-container {
    position: relative;
  }

  .statistics .statistics-body .cleaning .cleaning-statistic #chartVertical .bar-chart--track {
    height: 170px;
  }

  .statistics .statistics-body .cleaning .cleaning-statistic #chartVertical .bar-chart--track p {
    position: absolute;
    bottom: -32px;
    text-align: center;
    left: -5px;
    color: #c1c1d3;
    font-weight: 300;
  }

  .statistics .statistics-body .cleaning .cleaning-statistic #chartVertical .charts-container .bar-chart-vertical {
    position: relative;
    display: flex;
    justify-content: space-around;
  }

  .statistics .statistics-body .cleaning .cleaning-statistic #chartVertical .charts-container .bar-chart-vertical .bar-chart--progress {
    display: inline-block;
    position: absolute;
    bottom: 0;
    width: 7px;
    background-color: #87dff0;
    -moz-animation: progressScale-vertical 1600ms 1 forwards;
    -webkit-animation: progressScale-vertical 1600ms 1 forwards;
    animation: progressScale-vertical 1600ms 1 forwards;
  }

  .statistics .statistics-body .cleaning .cleaning-statistic #chartVertical .charts-container .bar-chart-vertical .bar-chart--track {
    background-color: #efeefa;
    width: 7px;
    position: relative;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
  }

  /* Large Screens */
  @media only screen and (max-width: 1200px) {
    main {
      flex-direction: column-reverse;
    }
  }

  @media only screen and (min-width: 600px) {


    a.active {
      color: #000;
    }

    .barnd {
      align-items: center;
      height: 5rem;
      color: var(--text-primary);
      text-decoration: none;
      transition: var(--transition-speed);
    }

    .mt-8 {
      margin-top: 8rem;
    }

    .logout {
      filter: grayscale(100%) opacity(0.7);
    }
  }

  /* Small Screens */
  @media only screen and (max-width: 600px) {

    main {
      margin: 0 auto;
      flex-basis: unset;
      padding: 0;
      height: 114vh;
      flex-direction: column;
      position: relative;
      overflow-x: hidden;
      animation: transitionIn 0.75s;
    }

    .main .update .update-body {
      flex-direction: column;
      justify-content: unset;
      height: 300px;
    }

    .main .update .update-body .system,
    .main .update .update-body .application {
      width: 100%;
      margin-bottom: 1rem;
    }

    .statistics,
    .main {
      position: absolute;
      transform: translateX(112%);
      transition: 0.2s ease-in-out;
    }

    #main {
      transform: translateX(0%);
    }

    .main {
      width: 90%;
      flex-basis: 55%;
      margin: 0 0 0 2rem;
      display: flex;
      flex-direction: column;
      align-items: flex-start;
    }

    .page-transition {
      display: flex;
      justify-content: center;
      margin: 5px 0;
    }

    .page-transition .btn-box {
      border-bottom: 1px solid #ccc;
      padding: 0.5rem;
    }

    .page-transition .btn-box button {
      background-color: transparent;
      border: none;
      outline: none;
      cursor: pointer;
      font-size: 15px;
    }

    .page-transition .btn-box button i {
      color: #332a7c;
    }
  }

  @media only screen and (max-width: 375px) {
    #main {
      transform: translateX(6%);
      margin: 0px;
      position: absolute;
      height: 80vh;
    }

    #statistics {
      position: absolute;
    }

    main {
      height: 100vh;
    }

    .main .update .update-body {
      flex-direction: column;
      justify-content: inherit;
      height: 300px;
    }

    .main .update .update-body .application,
    .main .update .update-body .system {
      width: 100%;
      margin-bottom: 1rem;
    }

    .statistics .statistics-body {
      padding-left: 0.25rem;
    }

    .statistics .statistics-body .function {
      padding: 1rem;
    }

    .statistics .statistics-header div {
      justify-content: center;
    }

    .statistics .statistics-body .function .fn {
      grid-template-columns: 1fr;
      grid-template-rows: 1fr;
      width: 80%;
      margin: 0 auto;
    }

    .statistics .statistics-body .cleaning {
      width: 80%;
      margin: 0 auto;
    }

    .statistics .statistics-body .function p,
    .statistics .statistics-body .cleaning p {
      text-align: center;
    }

    .statistics .statistics-body .cleaning .cleaning-statistic .cleaning-header {
      justify-content: space-around;
    }

    .statistics .statistics-body .cleaning .cleaning-statistic .cleaning-header .cleaning-header-button {
      width: 20%;
    }

    .main .weekly .weekly-body .item {
      padding: 0 !important;
      border: unset;
    }

    .main .weekly .weekly-body .item:hover .item-size {
      transform: scale(1);
    }
  }

  @media only screen and (max-width: 280px) {
    .main .weekly .link a {
      font-size: 10px;
    }

    .main .weekly .link a.active {
      font-size: 11px;
    }

    .main .weekly .weekly-body {
      height: 355px;
      flex-direction: column;
      margin-bottom: 30px;
    }

    .statistics {
      width: inherit;
      padding: 0;
    }

    .statistics .statistics-header {
      width: inherit;
    }

    .statistics .statistics-body .function {
      padding: 3rem;
    }

    .statistics .statistics-body .function p,
    .statistics .statistics-body .cleaning p {
      text-align: left;
    }

    .statistics .statistics-body .function .fn {
      width: 70%;
      margin: 0;
    }

    .statistics .statistics-body .cleaning .cleaning-statistic {
      width: 76%;
      padding: 1rem;
    }

    .statistics .statistics-body .cleaning .cleaning-statistic .cleaning-header .cleaning-header-button {
      flex-direction: column;
    }
  }

  @keyframes circle-chart-fill {
    to {
      stroke-dasharray: 0 100;
    }
  }

  @keyframes circle-chart-appear {
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes progressScale-vertical {
    0% {
      height: 0;
    }
  }

  @keyframes transitionIn {
    from {
      opacity: 0;
      transform: rotateX(-10deg);
    }

    to {
      opacity: 1;
      transform: rotateX(0);
    }
  }
</style>



<h1 style="margin-left:
 2.5rem;">Dashboard</h1>
<main>

  <section id="main" class="main">
    <div class="baner">
      <div style="" class="baner-text">
        <h1>Hello,</h1>
        <p>welcome back to PEF</p>
      </div>
      <div class="baner-png">
        <img src="http://pngimg.com/uploads/laptop/laptop_PNG5920.png" alt="">
      </div>
    </div>
    <div class="month">
      <div class="month-header">
        <div class="paginate-month">
          <p style="color:white; margin-top: 2rem;">June 19-25</p>

        </div>

        <div class="link">
          <a style="color: #534f85; font-size: 13px;" href="#">Today</a>
          <a style="color: #534f85; font-size: 13px;" href="#">Week</a>
          <a style="color: #CCCCFF; font-size: 14px;" href="# " class="active mx-5">Month</a>

          <!-- <span>Month</span> -->
        </div>
      </div>
      <div class="month-body">
        <div class="month-day ">
          <p>Mon</p>
          <span>19</span>
          <span class="circle bc-orange"></span>
        </div>
        <div class="month-day">
          <p>Tue</p>
          <span>20</span>
          <span class="circle bc-cyn "></span>
        </div>
        <div class="month-day">
          <p>Wed</p>
          <span>21</span>
          <span class="circle bc-red"></span>
        </div>
        <div class="month-day ">
          <p>Thu</p>
          <span>22</span>
          <span class="circle bc-white"></span>
        </div>
        <div class="month-day active">
          <p>Fri</p>
          <span>23</span>
          <span class="circle bc-orange"></span>
        </div>
        <div class="month-day">
          <p>Sat</p>
          <span>24</span>
          <span class="circle bc-red"></span>
        </div>
        <div class="month-day">
          <p>Sun</p>
          <span>25</span>
          <span class="circle bc-cyn"></span>
        </div>
      </div>

      <div style="margin-top: 2rem; " class="update">
        <!-- <div class="update-header">
          <p style="color:white;">Updating Monitoring</p>
        </div> -->
        <div class="update-body">
          <div class="system">
            <div class="update-content">
              <h3 class="c-blue-dark">Revenue</h3>
              <p class="c-grey">June 2023</p>
            </div>
            <hr>
            <div class="update-charts">
              <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="200" height="200"
                xmlns="http://www.w3.org/2000/svg">
                <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431"
                  cy="16.91549431" r="10.91549431" />
                <circle class="circle-chart__circle circle-chart__circle--negative" stroke="#f25767" stroke-width="2"
                  stroke-dasharray="17,1287" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431"
                  r="10.91549431" />
                <g class="circle-chart__info">
                  <text class="circle-chart__percent" x="16.91549431" y="16.5" alignment-baseline="central"
                    text-anchor="middle" font-size="5">25%</text>
                </g>
              </svg>
            </div>
          </div>
          <div class="application bc-blue-dark">
            <div class="update-content">
              <h3 class="c-white">Profits</h3>
              <p class="c-grey">June 2023</p>
            </div>
            <hr>
            <div class="update-charts">
              <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="200" height="200"
                xmlns="http://www.w3.org/2000/svg">
                <circle class="circle-chart__background" stroke="#5c5fb2" stroke-width="2" fill="none" cx="16.91549431"
                  cy="16.91549431" r="10.91549431" />
                <circle class="circle-chart__circle circle-chart__circle--negative" stroke="#ffa000" stroke-width="2"
                  stroke-dasharray="34.226" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431"
                  r="10.91549431" />
                <g class="circle-chart__info">
                  <text class="circle-chart__percent" x="16.91549431" y="16.5" alignment-baseline="central" fill="white"
                    text-anchor="middle" font-size="5">50%</text>
                </g>
              </svg>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="weekly">
      <div class="weekly-header">
        <div style="margin-top: 1.5rem; " class="title">
          <p style="color:white;">Weekly Reports</p>
        </div>
        <div class="link">
          <a href="#">Today</a>
          <a href="#" class="active mx-5">Week</a>
          <a href="#">Month</a>
        </div>
      </div>

      <div class="weekly-body">
        <div class="item">
          <span class="bd-orange">
            <i class="fas fa-server c-orange"></i>
          </span>
          <p style="font-size: 14px;">Profit</p>
          <p style="color:white;" class="item-size">
            55K
          </p>
        </div>
        <div class="item">
          <span class="bd-red">
            <i class="fab fa-itunes-note c-red"></i>
          </span>
          <p style="font-size: 14px;">Loss</p>
          <p style="color:white;" class="item-size">
            20K
          </p>
        </div>
        <div class="item">
          <span class="bd-cyn">
            <i class="far fa-trash-alt c-cyn"></i>
          </span>
          <p style="font-size: 14px;">Credit</p>
          <p style="color:white;" class="item-size">
            10K
          </p>
        </div>
        <div class="item">
          <span class="bd-blue">
            <i class="fab fa-instagram c-blue"></i>
          </span>
          <p>Loans</p>
          <p style="color:white;" class="item-size">
            12K
          </p>
        </div>
      </div>
    </div>

  </section>
  <section id="statistics" class="statistics">

    <div class="statistics-body">

      <div class="function">
        <p style="color:white;">Overview</p>
        <div class="fn">
          <div>
            <div class="bc-fn bc-red">
              <span class="bc-span-red"><i class="far fa-chart-bar"></i></span>
              <i class="fas fa-ellipsis-v c-white"></i>
            </div>
            <div class="fn-description">
              <p style="color:white;">RESOURCES</p>
              <div class="toggle-btn " onclick="this.classList.toggle('bc-toggle-red')">
                <div class="inner-circle"></div>
              </div>
            </div>
          </div>
          <div>
            <div class="bc-fn bc-orange">
              <span class="bc-span-orange"><i class="far fa-chart-bar"></i></span>
              <i class="fas fa-ellipsis-v c-white"></i>
            </div>
            <div class="fn-description">
              <p style="color:white;">CLIENTS</p>
              <div class="toggle-btn " onclick="this.classList.toggle('bc-toggle-orange')">
                <div class="inner-circle "></div>
              </div>
            </div>
          </div>
          <div>
            <div class="bc-fn bc-cyn">
              <span class="bc-span-cyn"><i class="far fa-check-circle"></i></span>
              <i class="fas fa-ellipsis-v c-white"></i>
            </div>
            <div class="fn-description">
              <p style="color:white;">PROGRESSS</p>
              <div class="toggle-btn " onclick="this.classList.toggle('bc-toggle-cyn')">
                <div class="inner-circle "></div>
              </div>
            </div>
          </div>
          <div class="last_child">
            <div class="bc-fn">
              <span class="bc-span-white"><i class="fas fa-sync-alt"></i></span>
              <i class="fas fa-ellipsis-v c-white"></i>
            </div>
            <div class="fn-description">
              <p style="color:white;" class="c-grey">TEAM</p>
              <div class="toggle-btn">
                <div class="inner-circle"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="cleaning">
        <p style="color:white; margin-top: 2rem;">Income Statistics</p>
        <div class="cleaning-statistic">
          <div class="cleaning-header">
            <div class="cleaning-header-title">
              <p style="color:white;" class="c-grey">CURRENT/FRIDAY</p>
              <span style="color:white;">58%</span>
            </div>

          </div>
          <div class="cleaning-body">
            <section id="chartVertical">
              <div class="charts-container">
                <div class="bar-chart-vertical">
                  <div class="bar-chart--track">
                    <span class="bar-chart--progress" style="height: 25%;"></span>
                    <p>MO</p>
                  </div>
                  <div class="bar-chart--track">
                    <span class="bar-chart--progress" style="height: 65%;"></span>
                    <p>TU</p>
                  </div>
                  <div class="bar-chart--track">
                    <span class="bar-chart--progress" style="height: 95%;"></span>
                    <p>WE</p>
                  </div>
                  <div class="bar-chart--track">
                    <span class="bar-chart--progress" style="height: 25%;"></span>
                    <p>TH</p>
                  </div>
                  <div class="bar-chart--track">
                    <span class="bar-chart--progress" style="height: 65%;"></span>
                    <p>FR</p>
                  </div>
                  <div class="bar-chart--track">
                    <span class="bar-chart--progress" style="height: 95%;"></span>
                    <p>SA</p>
                  </div>
                  <div class="bar-chart--track">
                    <span class="bar-chart--progress" style="height: 95%;"></span>
                    <p>SU</p>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>



    </div>
  </section>
</main>


<!--product modal open -->
<div id="form-product" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-dark">
  <div class="modal-dialog custom-width" style="height:200px;">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title"><strong>ADD NEW PRODUCT</strong></h3>
      </div>
      <div class="modal-body">
        <!-- <div class="form-group">
              <label>Product Name</label>
              <input type="text" placeholder="enter product name" id="pro_name" required="" class="form-control input-xs parsley-error">
            </div>
            <div class="form-group">
              <label>Product Description</label>
              <input type="text" placeholder="enter product description" id="pro_des" required="" class="form-control input-xs parsley-error">
            </div> -->
        <div class="form-group">
          <label>Select Firm</label>
          <select class="form-control input-xs" id="pro_firmid" required="" onchange="get_mea()">
            <option value="">select firm</option>
            <?php foreach ($firm_data as $fd) { ?>
              <option value="<?php echo $fd['firm_id']; ?>"><?php echo ucwords($fd['firm_name']); ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label>Choose Category</label>
          <select class="form-control input-xs" id="pro_grp" required="" onchange="get_mea()">
            <option value="">select group</option>
            <?php foreach ($cat_dat as $row) { ?>
              <option value="<?php echo $row['cat_id']; ?>"><?php echo ucwords($row['cat_name']); ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label>Choose Measurement</label>
          <span id="mea_data">
            <select class="form-control input-xs" id="pro_ty" required=""></select>
        </div>
        <div class="form-group">
          <label>Price</label>
          <input type="number" min="0.00" max="" step="0.01" id="pro_price" placeholder="enter product price"
            required="" class="form-control input-xs">
        </div>
        <div class="form-group col-md-12">
          <div class="col-md-4">
            <label>CGST(%)</label>
            <input type="number" min="0.00" max="" step="0.01" id="cgst" placeholder="Enter CGST" required=""
              class="form-control input-xs">
          </div>
          <div class="col-md-4">
            <label>IGST(%)</label>
            <input type="number" min="0.00" max="" step="0.01" id="igst" placeholder="Enter IGST" required=""
              class="form-control input-xs">
          </div>
          <div class="col-md-4">
            <label>SGST(%)</label>
            <input type="number" min="0.00" max="" step="0.01" id="sgst" placeholder="Enter SGST" required=""
              class="form-control input-xs">
          </div>
        </div>
        <div class="form-group">
          <label>Quantity</label>
          <input type="number" min="0" max="" step="1" id="pro_qty" placeholder="enter quantity of product" required=""
            class="form-control input-xs">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default md-close">Cancel</button>
        <button type="submit" onclick="add_pro();" data-dismiss="modal" class="btn btn-dark md-close">Proceed</button>
      </div>
    </div>
  </div>
</div>
<!--product modal close -->
<!--category modal open-->
<div id="form-category" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-danger">
  <div class="modal-dialog custom-width">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span
            class="mdi mdi-close"></span></button>
        <h3 class="modal-title"><strong>Add new category</strong></h3>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Category Name</label>
          <input type="text" id="acat_name" placeholder="enter category name" required=""
            class="form-control input-xs parsley-error">
        </div>
        <div class="form-group">
          <label>Category Description</label>
          <textarea class="form-control input-xs" id="acat_des" placeholder="enter category description..."></textarea>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default md-close">Cancel</button>
        <button type="submit" onclick="add_cat();" data-dismiss="modal" class="btn btn-danger md-close">Proceed</button>
      </div>
    </div>
  </div>
</div>
<!-- category modal close -->
<!-- measurement modal open -->
<div id="form-measurement" tabindex="-1" role="dialog" class="modal fade colored-header">
  <div class="modal-dialog custom-width">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #FBBC05;">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span
            class="mdi mdi-close"></span></button>
        <h3 class="modal-title"><strong>Add Goods</strong></h3>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Product Name or Type</label>
          <input type="text" id="ty_name" placeholder="enter Product name or type" required=""
            class="form-control input-xs parsley-error">
        </div>
        <div class="form-group">
          <label>Choose Group</label>
          <select class="form-control input-xs" id="ty_grp" required="">
            <option value="">Select category</option>
            <?php foreach ($cat_dat1 as $row) { ?>
              <option value="<?php echo $row['cat_id']; ?>"><?php echo ucwords($row['cat_name']); ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default md-close">Cancel</button>
        <button type="submit" onclick="add_ty();" data-dismiss="modal" class="btn btn-warning md-close">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- measurement modal close -->
<!-- firm modal open -->
<div id="form-firm" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-dark">
  <div class="modal-dialog custom-width" style="height:200px;">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #00796B;">
        <h3 class="modal-title"><strong>Add new supplier</strong></h3>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Supplier Name</label>
          <input type="text" placeholder="enter Supplier name" id="firm_name"
            class="form-control input-xs parsley-error" required="required">
        </div>
        <div class="form-group">
          <label>Supplier Description</label>
          <input type="text" placeholder="enter Supplier description" id="firm_des"
            class="form-control input-xs parsley-error" required="required">
        </div>
        <div class="form-group">
          <label>Phone number</label>
          <input type="number" placeholder="enter phone number" id="firm_no" class="form-control input-xs parsley-error"
            required="required">
        </div>
        <div class="form-group">
          <label>Address</label>
          <input type="text" placeholder="enter Supplier address" id="firm_add"
            class="form-control input-xs parsley-error" required="required">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default md-close">Cancel</button>
        <button type="submit" onclick="add_firm();" data-dismiss="modal" class="btn btn-dark md-close">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- firm modal close -->





<!-- <div class="col-md-4">
  <div class="panel panel-border-color panel-border-color-primary"
    style="border-radius:50px 50px 50px 50px; border-top-color: #5d001e;  width: 300px; ">
    <div class="panel-heading"><strong>Orders</strong></div>
    <div class="panel-body">
      <div class="xs-mt-10 xs-mb-10">
        <center>
          <button class="btn btn-space btn-big" style="background-color: #5d001e; color: white;" id="bill"
            onclick="callPro(this.id);"><i class="icon mdi mdi-shopping-cart-plus"></i> ADD </button>
          <button class="btn btn-space btn-big" style="background-color: #5d001e; color: white;" id="sb"
            onclick="callPro(this.id);"><i class="icon mdi mdi-view-list"></i> View </button>
        </center>
      </div>
    </div>
  </div>
</div>
<div class="col-md-4">
  <div class="panel panel-border-color"
    style="border-radius:50px 50px 50px 50px; border-top-color: #1f216d; width: 300px;">
    <div style="color:#632C65;" class="panel-heading"><strong>Products</strong></div>
    <div class="panel-body">
      <div class="xs-mt-10 xs-mb-10">
        <center>
          <button data-toggle="modal" data-target="#form-product" class="btn btn-space md-trigger btn-big"
            style="background-color: #1f216d; color: white;"><i class="icon icon-left mdi mdi-shopping-cart-plus"></i>
            ADD </button>
          <button class="btn btn-space btn-big" style="background-color: #1f216d; color: white;" id="pro"
            onclick="callPro(this.id);"><i class="icon mdi mdi-view-list"></i> VIEW </button>
        </center>
      </div>
    </div>
  </div>
</div>
<div class="col-md-4">
  <div class="panel panel-border-color"
    style="border-radius:50px 50px 50px 50px; border-top-color: #331419; width: 300px;">
    <div class="panel-heading"><strong>Categories</strong></div>
    <div class="panel-body">
      <div class="xs-mt-10 xs-mb-10">
        <center>
          <button data-toggle="modal" data-target="#form-category" class="btn btn-space btn-big"
            style="background-color: #331419; color: white;"><i class="icon mdi mdi-shopping-cart-plus"></i> ADD
          </button>
          <button class="btn btn-space btn-big" style="background-color: #331419; color: white;" id="cat"
            onclick="callPro(this.id);"><i class="icon mdi mdi-view-list"></i> VIEW </button>
        </center>
      </div>
    </div>
  </div>
</div>
<div class="col-md-4">
  <div class="panel panel-border-color panel-border-color-primary"
    style="border-radius:50px 50px 50px 50px; border-top-color: #009688; width: 300px;">
    <div class="panel-heading"><strong>Spplier Details</strong></div>
    <div class="panel-body">
      <div class="xs-mt-10 xs-mb-10">
        <center>
          <button data-toggle="modal" data-target="#form-firm" class="btn btn-space btn-big"
            style="background-color: #009688; color: white; "><i class="icon mdi mdi-shopping-cart-plus"></i> ADD
          </button>
          <button class="btn btn-space btn-big" style="background-color: #009688; color: white;" id="firm"
            onclick="callPro(this.id);"><i class="icon mdi mdi-view-list"></i> VIEW </button>
        </center>
      </div>
    </div>
  </div>
</div>
<div class="col-md-4">
  <div class="panel panel-border-color panel-border-color-primary"
    style="border-radius:50px 50px 50px 50px; border-top-color: #9A1750; width: 300px;">
    <div class="panel-heading"><strong>Creditors Details</strong></div>
    <div class="panel-body">
      <div class="xs-mt-10 xs-mb-10">
        <center>
          <button class="btn btn-space btn-big" style="background-color: #9A1750; color: white;" id="sbill"
            onclick="callPro(this.id);"><i class="icon mdi mdi-shopping-cart-plus"></i> ADD </button>
          <button class="btn btn-space btn-big" style="background-color: #9A1750; color: white;" id="show_seller_bill"
            onclick="callPro(this.id);"><i class="icon mdi mdi-view-list"></i> VIEW </button>
        </center>
      </div>
    </div>
  </div>
</div>
<div class="col-md-4">
  <div class="panel panel-border-color"
    style="border-radius:50px 50px 50px 50px; border-top-color: #201f23; width: 300px;">
    <div class="panel-heading"><strong>Goods out of stock </strong></div>
    <div class="panel-body">
      <div class="xs-mt-10 xs-mb-10">
        <center>
          <button data-toggle="modal" data-target="#form-measurement" class="btn btn-space btn-big"
            style="background-color: #201f23;  color: white;"><i class="icon mdi mdi-shopping-cart-plus"></i> ADD
          </button>
          <button class="btn btn-space btn-big" style="background-color: #201f23; color: white;" id="ty"
            onclick="callPro(this.id);"><i class="icon mdi mdi-view-list"></i> VIEW </button>
        </center>
      </div>
    </div>
  </div>
</div> -->






<script>

</script>





<!-- add product function -->
<script type="text/javascript">
  function add_pro() {
    // var name = $('#pro_name').val();
    // var des = $('#pro_des').val();
    var firm_id = $('#pro_firmid').val();
    var grp = $('#pro_grp').val();
    var ty = $('#pro_ty').val();
    var price = $('#pro_price').val();
    var cgst = $('#cgst').val();
    var igst = $('#igst').val();
    var sgst = $('#sgst').val();
    var qty = $('#pro_qty').val();
    // alert(qty);
    $.ajax({
      type: "POST",
      url: 'pro_add.php',
      data: { firm_id: firm_id, grp: grp, ty: ty, price: price, cgst: cgst, igst: igst, sgst: sgst, qty: qty },
      success: function (msg) {
        // alert(msg);
        $('#srch_pro').html(msg);
      }
    });
    window.location = "index.php";
  }
</script>
<!-- add category function -->
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
    window.location = "cat.php";
  }
</script>
<!-- add measurement function -->
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
<!-- add firm function -->
<script>
  function add_firm() {
    var name = $('#firm_name').val();
    var des = $('#firm_des').val();
    var phone = $('#firm_no').val();
    var address = $('#firm_add').val();
    // var grp = $('#firm_grp').val();
    // alert(phone);
    // alert(address);
    $.ajax({
      type: "POST",
      url: 'firm_add.php',
      data: { name: name, des: des, phone: phone, address: address },
      success: function (msg) {
        // alert(msg);
        $('#srch_firm').html(msg);
      }
    });

  }
</script>
<!-- measurement function -->
<script>
  function get_mea() {
    var grp = $('#pro_grp').val();
    var firm = $('#pro_firmid').val();
    // alert(grp);
    $.ajax({
      type: "POST",
      url: 'get_pro_grp.php',
      data: { grp: grp, firm: firm },
      success: function (msg) {
        // alert(msg);
        $('#mea_data').html(msg);
      }
    });
  }
</script>