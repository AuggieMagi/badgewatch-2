<?php
include 'header.php';

/*
topnav is for the navbar ontop
*/
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


<div class="officer-container">

    <?php
    #Grabs the data used to create unique page url and matches the badge id with the url badge
    $last  = mysqli_real_escape_string($conn, $_GET['last']);
    $badge  = mysqli_real_escape_string($conn, $_GET['badge']);

    $sql = "SELECT * FROM officer Where badgeID = $badge";
    $result = mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);


    #Display officer info from the officer table
    if ($queryResults > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='complaint-box'>
                        <h1>Officer Details<h1>
                        <h2>Officer Name: " . $row['firstName'] . " " . $row['lastName'] . " </h2>
                        
                        <h2>Badge Number: " . $row['badgeID'] . "</h2>
                        

                      </div>";
        }
    }
    #Look for grading data in the Data table and display the information
    $gradeSQL = " SELECT * FROM data WHERE badgeID_data_fk = $badge ";
    $gradeResult = mysqli_query($conn, $gradeSQL);
    $gradeQuery = mysqli_num_rows($gradeResult);
    if ($gradeQuery > 0) {
        while ($row = mysqli_fetch_assoc($gradeResult)) {
            echo "<div class='complaint-box'>

                            <h1>Grades (Higher % is better)<h1>

                            <h2><b>Voilence Grade:</b> " . $row['violence_Grade'] . "%" . "</h2>
                            
                            <h2>Conduct Grade: " . $row['conduct_grade'] . "%" . " </h2>
                            
                            <h2>Education Grade: " . $row['education_grade'] . "%" . "</h2>
                            
                            <h2>Total Grade: " . $row['total_grade'] . "%" . "</h2>
                            
                          </div>";
        }
    }

    ?>
    <?php  #Grabs data from complaint table and displays it as a chart
    $query = " SELECT classification, count(*) as number FROM complaint WHERE badgeID_fk = $badge GROUP BY classification ";
    $connect = mysqli_query($conn, $query);

    $gradeQuery = " SELECT total_grade FROM data WHERE badgeID_data_fk = $badge ";
    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Classification', 'Number'],
                <?php
                while ($row = mysqli_fetch_array($connect)) {
                    echo "['" . $row["classification"] . "', " . $row["number"] . "],";
                }
                ?>
            ]);
            var options = {
                title: 'Percentage of Complaints',
            };
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
    <div style="width: auto;">
        <h3 align="center">Total Complaints</h3>
        <h2>
            <br />
            <div id="piechart" style="width: auto; min-height: 450px;"></div>
    </div>




</div>
</body>

</html>