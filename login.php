<?php include 'template/header.php'?>
<?php 
  if($_SESSION['username']){
    header("Location: home.php");
    exit();
  }
?>

<?php 
$action = $_GET['action'];
    if($action){
        if($action === 'login'){
            $username =$_POST['username'];
            $password =$_POST['password'];

            $hashPassword = hash('sha256',$password);

            $sql = "SELECT * FROM table_member WHERE member_username = '$username' AND member_password = '$hashPassword' ";

            $query = $conn->query($sql);
            $result = $query->fetch();

            if($result){
                $_SESSION['username'] = $result['member_username'];
                $_SESSION['user_id'] = $result['member_id'] ;
                echo "<script>alert('ล็อคอินสำเร็จ !')</script>";
                echo "<script>window.location = 'home.php'</script>";

            }else{
                echo "<script>alert('ชื่อผู้ใช้ไม่ถูกต้อง !')</script>";
                echo "<script>window.history.back()</script>";
            }
            exit();
        }
    }
?>



<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Login</h1>
    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, error ipsum! Maxime facilis ipsum aspernatur possimus adipisci totam ex ad soluta rem! A quasi similique amet aspernatur voluptas maxime quod.</p>
  </div>
</div>
<!-- jumbotron -->
<form action="login.php?action=login" method="post">
<div class="container">

  <div class="form-group">
    <label for="exampleInputEmail1">username</label>
    <input type="text" class="form-control" id="username"  name="username"  placeholder="username">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">password</label>
    <input type="password" placeholder="password" name="password" id="" class="form-control">
  </div>
  <button type="submit" value="login" class="btn btn-outline-success">Submit</button>
</div>
</form>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php include 'template/footer.php'?>