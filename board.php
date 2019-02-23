<?php include 'template/header.php'?>


<?php
  $action = $_GET['action'];
  $commentId = $_GET['commentId'];
  $boardId = $_GET['boardId'];
  if($action) {
    if ($action === 'deletecomment'){
      $sql = "DELETE FROM table_comment WHERE comment_id = '$commentId' ";
      $result = $conn->exec($sql);

      if ($result) {
        echo "<script>alert('ลบสำเร็จแล้วนะ')</script>";
        echo "<script>window.location = 'board.php?boardId=$boardId'</script>";
    } else {
        echo "<script>alert('มีบางอย่างผิดพลาด')</script>";
        echo "<script>window.history.back()</script>";
    }
      exit();
    }
  }
?>

<?php
    $action = $_GET['action'];
    $boardId = $_GET['boardId'];
    $userId = $_SESSION['user_id'];
    if($action) {
        if($action === 'comment') {
            $comment = $_POST['comment'];
            $sql = "INSERT INTO table_comment (comment_content,comment_board_id,comment_member_id) VALUES ('$comment','$boardId','$userId') ";
            $result = $conn->exec($sql);
            if($result) {
                echo "<script>alert('คอมเม้นเสร็จแล้วนะ')</script>";
                echo "<script>
                        window.location = 'board.php?boardId=$boardId'
                    </script>";
            } else {
                echo "<script>alert('มีบางอย่างผิดพลาด')</script>";
                echo "<script>window.history.back()</script>";
            }
            exit();
        }else if ($action === 'deletecomment'){
            echo 'delete comment worked.';
            exit();
        }
    }
?>

<?php
$boardId = $_GET['boardId'];
$sql = "SELECT * FROM table_board WHERE board_id = '$boardId'";
$query = $conn->query($sql);
$result = $query->fetch(PDO::FETCH_ASSOC);

$sqlComment = "SELECT * FROM table_comment WHERE comment_board_id = '$boardId'";
$queryComment = $conn->query($sqlComment);
$resultsComment = $queryComment ->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">board</h1>
    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, error ipsum! Maxime facilis ipsum aspernatur possimus adipisci totam ex ad soluta rem! A quasi similique amet aspernatur voluptas maxime quod.</p>
  </div>
</div>
<!-- jumbotron -->

<div class="container">
 <h2> board ID: <?php echo $_GET['boardId'] ;?></h2>

 <h3><?php echo $result['board_topic'] ;?></h3>
 <p><?php echo $result['board_content'] ;?></p>
 <hr />
    <div class="wrap-comment">
        <?php foreach($resultsComment as $key => $comment):?> 
          <div>Comment<?php echo $key+1?></div>
          <p><?php echo $comment['comment_content']?> </p>
          <?php if($_SESSION['user_id']===$comment['comment_member_id']):?>
          <a href="#" onClick="deleteComment(<?php echo $comment['comment_id']; ?> ,<?php echo $comment['comment_board_id']; ?>)">delete comment</a>
          <?php endif; ?>
  <?php endforeach;?> 
    </div>
    <?php if($_SESSION['username']): ?>
 <hr />
 <div class="wrap-from">
        <form action="board.php?action=comment&boardId=<?php echo $result['board_id']; ?>" method="post">
            <textarea class="form-control" name="comment" id="" cols="30" rows="10"></textarea>
            <input class="btn btn-primary" type="submit" value="Comment">
        </form>
    </div>
  <?php endif; ?>
  </div>
<?php include 'template/footer.php'?>

<script>
    function deleteComment(commentId,commentboardid) {
        const cf = confirm('คุณต้องการจะลบคอมเม้นจริงหรือ');
        if(cf == true) {
            window.location = 'Board.php?action=deletecomment&commentId=' + commentId + '&boardId=' + commentboardid;
        }
    }
</script>