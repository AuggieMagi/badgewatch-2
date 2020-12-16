<?php
    include 'header.php';
?>

<div class="topnav">
  <a class="active" href="http://localhost/badgewatch/index.php">Home</a>
  <a href="https://badgewatch.org/">about</a>
  <a href="#feedback">feedback</a>
  <a href="https://us.openforms.com/Form/38ab03c4-c295-43f3-8692-73a723866ae4">File a complaint</a>
  <div class="search-container">
    <form action="search.php" method="POST">
      <input type="text" name="search" placeholder="Insert Keyword...">
      <button type="submit" name="submit-search" style="background-color: #0073BD;">Search</button>
  </form>
  </div>
</div>
<h1>Search Page</h1>

<div class="officer-container">
    <?php

        /* 
            Search through the database where characters submitted match partial or all characters in the database,
            then using a loop to search through all officers and displaying the ones that contain those characters
            at that same time the loop is creating unique links based on their last name and badge ID that can be retrieved later on in complaints.php
            If nothing is found then the message, "There are no results matching your search!" ,will be displayed.
        */
        if (isset($_POST['submit-search'])) {
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            $sql = " SELECT * FROM officer WHERE firstName LIKE '%$search%' 
            OR lastName LIKE '%$search%' OR badgeID LIKE '%$search%' ";
            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);

            if($queryResult > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<a href='complaint.php?last=". $row['lastName']. "&badge=".$row['badgeID']. "'><div class='officer-box'>
                        <h3>Officer Name: " .$row['firstName'] . " " . $row['lastName']." </h3>
                        <p>Badge Identification: ".$row['badgeID']."</p>
                      </div></a>";
                }
            } else {
                echo "There are no results matching your search!";
            }
        }
    ?>
</div>