<?php include 'template/header.php'?>
<?php
  $sql = "SELECT * FROM table_board INNER JOIN table_member ON table_board.board_member_id = table_member.member_id";
  $query = $conn->query($sql);
  $results =  $query->fetchAll(PDO::FETCH_ASSOC);
  ?>

<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Home</h1>
    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, error ipsum! Maxime facilis ipsum aspernatur possimus adipisci totam ex ad soluta rem! A quasi similique amet aspernatur voluptas maxime quod.</p>
  </div>
</div>
<!-- jumbotron -->
<div class="container">
  <h2>Hello <?php echo $_SESSION['username']; ?>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Topic</th>
      <th scope="col">Date</th>
      <th scope="col">Author</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($results as $key => $value): ?>
    <tr>
      <th scope="row"><?php echo $key+1 ?></th>
      <td><a href = "board.php?boardId=<?php echo $value['board_id'];?>">
      <?php echo $value['board_topic']; ?></td>
      <td>
       <?php 
       date_default_timezone_set("Asia/Bangkok");
       $date = new Datetime($value['board_date']);
         echo $date->format('D, d-m-Y');?>
         </td>
      <td><?php echo $value['member_name']; ?></td>
    </tr>
  <?php endforeach; ?> 
  </tbody>
</table>
<?php include 'template/footer.php'?>