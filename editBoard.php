<?php include 'template/header.php'?>
<?php 
  if(!$_SESSION['username']){
    header("Location: login.php");
    exit();
  }
?>
<?php
    $action = $_GET['action'];
    $boardId = $_GET['boardId'];
    if($action){
        if ($action === 'edit'){
            $topic = $_POST['topic'];
            $content = $_POST['content'];


            $sql = "UPDATE table_board
                    SET board_topic ='$topic',board_content = '$content'
                    WHERE board_id ='$boardId'";
            
            $result = $conn->exec($sql);

            if($result){
              echo "<script>alert('แก้ไขสำเร็จ')</script>";
              echo "<script>window.location='myBoard.php'</script>";
            }else{
              echo "<script>alert('มีบางอย่างผิดพลาด')</script>";
              echo "<script>window.history.back()</script>";
            }
            exit();
        }
    }
?>

<?php
    $boardId = $_GET['boardId'];
    $sql = "SELECT * FROM table_board WHERE board_id = '$boardId' ";
    $query = $conn->query($sql);
    $result = $query->fetch(PDO::FETCH_ASSOC);

    print_r($result);

?>

<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">edit</h1>
    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, error ipsum! Maxime facilis ipsum aspernatur possimus adipisci totam ex ad soluta rem! A quasi similique amet aspernatur voluptas maxime quod.</p>
  </div>
</div>
<!-- jumbotron -->


<div class="container">
<h2>edit</h2>
  <form action="editBoard.php?action=edit&boardId=<?php echo $boardId ?>" method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">topic</label>
    <input type="text" class="form-control" id="topic" value="<?php echo $result['board_topic'] ?>" name="topic" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">content</label>
    <textarea class="form-control" id="content" name="content" rows="10" cols="30"><?php echo $result['board_content'] ?></textarea>
  </div>
  <input type="submit"  class="btn btn-primary  btn-lg" value="edit">
  </form>
</div><br>



<?php include 'template/footer.php'?>