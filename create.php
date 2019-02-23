<?php include 'template/header.php'?>
<?php 
  if(!$_SESSION['username']){
    header("Location: login.php");
    exit();
  }
?>

<?php $action = $_GET['action'];
    if($action){
        if($action === 'create'){
            $topic = $_POST['topic'];
            $content =$_POST['content'];
            $userId = $_SESSION['user_id'];
            $sql = "INSERT INTO table_board(board_topic,board_content,board_member_id) value('$topic','$content','$userId')";

            $result = $conn->exec($sql);
            if($result){
                echo "<script>alert('สร้างสำเร็จ !')</script>";
                echo "<script>window.location = 'home.php'</script>";
            }else{
                echo "<script>alert('ล้มเหลว !')</script>";
                echo "<script>window.history.back()</script>";
            }
            exit();
        }
    }
?>





<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">cerate</h1>
    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, error ipsum! Maxime facilis ipsum aspernatur possimus adipisci totam ex ad soluta rem! A quasi similique amet aspernatur voluptas maxime quod.</p>
  </div>
</div>
<!-- jumbotron -->


<div class="container">
<h2>cerate</h2>
  <form action="create.php?action=create" method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">topic</label>
    <input type="text" class="form-control" id="topic" name="topic" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">content</label>
    <textarea class="form-control" id="content" name="content" rows="10" cols="30"></textarea>
  </div>
  <input type="submit"  class="btn btn-primary  btn-lg" value="create">
  </form>
</div><br>

<?php include 'template/footer.php'?>