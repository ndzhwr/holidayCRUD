<?php
include('./db.php');
$query = "SELECT* FROM demo_table";
$select = mysqli_query($conn,$query) or die("<h1>Error occured</h1>".mysqli_connect_error());
while($row = mysqli_fetch_assoc($select)){
    echo "<tr>";
    if ($row['id'] == $_GET['id']) {
        echo '<form class="form-inline m-2" action="update.php" method="POST">';
        echo '<td><input type="text" class="form-control" name="name" value="'.$row['name'].'"></td>';
        echo '<td><input type="number" class="form-control" name="score" value="'.$row['score'].'"></td>';
        echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
        echo '<input type="hidden" name="id" value="'.$row['id'].'">';
        echo '</form>';
      } else {
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['score'] . "</td>";
        echo '<td><a class="btn btn-primary" href="index.php?id=' . $row['id'] . '" role="button">Update</a></td>';
        echo '<td><a class="btn btn-danger" href="delete.php?id=' . $row['id'] . '" role="button">Delete</a></td>';
        echo "</tr>";
      }
    }
    $conn->close();
  ?>