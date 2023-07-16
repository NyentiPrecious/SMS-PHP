<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
</head>
<body>
<form action="validate.php" method="post">
<h1>Login</h1>
<input type="text" placeholder="Username" name="un" value="">
<input type="password" placeholder="Password" name="psw" value="">
<input class="button" type="submit" name="submit" value="Sign In">
</form>
</body>
</html>
conn.php
<?php
session_start();
$conn = "";
$conn = mysqli_connect("localhost","root","","dbase");
if (!$conn) {
    echo "Connection failed!";
}
?>
validate.php
<?php include('conn.php')?>
<?php
if (isset($_POST["submit"])) {
    $username = $_POST["un"];
    $password = $_POST["psw"];
    $res=mysqli_query($conn, "SELECT * FROM users where username='$username' AND password='$password'");
    $row = mysqli_fetch_assoc($res);
        if(($row['user_type'] == 'user') && ($row['username'] == $username)) {
            $_SESSION['user']=$row['username'];
                header("location: user.php");
        }
        else if(($row['user_type'] == 'admin') && ($row['username'] == $username)) {
            $_SESSION['user']=$row['username'];
                header("location: admin.php");
        }
        else if(($username == '') && ($password == '')) {
            echo "<script language='javascript'>";
            echo "alert('Invalid Inputs')";
            echo "</script>";
        }
        else {
            echo "<script language='javascript'>";
            echo "alert('WRONG INFORMATION')";
            echo "</script>";
            die();
        }
    }
?>
admin.php
<?php include('conn.php')?>
<h2>Welcome <?php echo $_SESSION['user'] ?><span style="font-size:15px"><i>(Admin)</i></span></h2>
<br>
<h3><i>Database Users All Details</i></h3>
<?php
$res=mysqli_query($conn, "SELECT * FROM users");
if(mysqli_num_rows($res) > 0)
{
  echo'<table border=1>
 <tr>
  <th>User Name</th>
        <th>User Type</th>
  <th>Email</th>
        <th>Password</th>
    </tr>';
    while($r = mysqli_fetch_array($res))
 {
    echo '<tr>
        <td>'.$r["username"].'</td>
        <td>'.$r["user_type"].'</td>
        <td>'.$r["email"].'</td>
        <td>'.$r["password"].'</td>
    </tr>';
    }
    echo '</table>
    <a href="logout.php">Logout</a>';
}
?>
user.php
<?php include('conn.php')?>
<h2>Welcome <?php echo $_SESSION['user'] ?> <span style="font-size:15px"><i>(user)</i></span></h2>
<a href="logout.php">Logout</a>
logout.php
<?php
session_start();
session_unset();
session_destroy();
header("Location: index.html");
?>