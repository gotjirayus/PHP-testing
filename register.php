<?php include 'template/header.php'?>;
<?php 
  if($_SESSION['username']){
    header("Location: home.php");
    exit();
  }
?>
<?php
  $action = $_GET['action'];
  if($action) {
      if($action=== 'register'){
          
          $username = $_POST['username'];
          $password = $_POST['password'];
          $name = $_POST['name'];
          $lastname = $_POST['lastname'];
          $email = $_POST['email'];
          $gender = $_POST['gender'];
        
        
          $hashPassword = hash('SHA256',$password);

          $sql="INSERT INTO `table_member` (`member_username`, `member_password`, `member_role`, `member_name`, `member_lastName`, `member_email`, `member_gender`) 
                                        VALUES (
                                              '$username',
                                              '$hashPassword',
                                              '0',
                                              '$name',
                                              '$lastname',
                                              '$email',
                                              '$gender'
                                          )";

           $result = $conn->exec($sql);    
          

          if($result){
              echo "<script>alert('ลงทะเบียนสำเร็จ !')</script>";
              echo "<script>window.location = 'login.php'</script>";
          }else{
            echo "<script>alert('ลงทะเบียนไม่สำเร็จ !')</script>";
            echo "<script>window.history.back()</script>";
          }
      }
  }


  
?>
<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">register</h1>
    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, error ipsum! Maxime facilis ipsum aspernatur possimus adipisci totam ex ad soluta rem! A quasi similique amet aspernatur voluptas maxime quod.</p>
  </div>
</div>
<!-- jumbotron -->

<div class="container">
<form action="register.php?action=register" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">name</label>
    <input type="text" class="form-control" placeholder="name"  name="name" id="" aria-describedby="emailHelp" >
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">lastname</label>
    <input type="text" placeholder="lastname" name="lastname" id="" class="form-control">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">username</label>
    <input type="text" class="form-control" placeholder="username" name="username" id="">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">password</label>
    <input type="password" placeholder="password" name="password" id="" class="form-control">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">email</label>
    <input type="text" placeholder="email" name="email" id="" class="form-control">
  </div>
  <div class="form-check">
  <input class="form-check-input position-static" type="radio" name="gender" id="" value="m">ชาย
  </div>
  <div class="form-check">
  <input class="form-check-input position-static" type="radio" name="gender" id="" value="f">หญิง
  </div><br>
  <div class="form-group">
  <button type="submit" value="register" class="btn btn-outline-success">Submit</button>
  </div>
</form>
</div>
<?php include 'template/footer.php'?>
