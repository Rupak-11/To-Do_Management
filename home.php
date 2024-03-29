<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Page</title>
    <link rel="stylesheet" href="Home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Borel&family=Caveat:wght@700&family=Dancing+Script:wght@700&family=Handjet&family=Kanit:wght@400;500;800&family=Lilita+One&family=Luxurious+Roman&family=Montserrat:wght@700&family=Mukta:wght@400;500&family=Pacifico&family=Poppins&family=Roboto+Slab:wght@500&family=Shadows+Into+Light&family=Signika:wght@600&display=swap" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">


</head>
<style>
    * {
    margin: 0;
    padding: 0;
    font-family: 'Roboto Slab', serif;
}


header{
    background: rgb(208, 225, 249);
    margin: 0px -3px;
    height: 50px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px 40px;
    border: 0;
   
    
}


header li{
    list-style: none;
    padding: 0px 20px;
    display: inline-block;
    
}

header img{
    position: relative;
    height: 100px;
    width:300px;
    right:7%;
}

header a{
    text-decoration: none;
    color: black;
    transition: all 0.3s ease 0s;
}

header a:hover{
    color: whitesmoke;
}

#nav-title{
   font-size: 2.5rem;
   margin-right: 2%;
   color: black;
}

#page-1{
    height: 100%;
    width: 100%;
}

#task-container{
    position: absolute;
    height: 30px;
    width: 130px;
    background :#f06a6a;
    display: flex;
    align-items: center;
    justify-content: center;
    right: 25%;
    top: 3%;
    padding: 5px 4px;
    border-radius: 15px;
    outline: 0;
}

#task-container p{
    margin: 0px -5px;
    padding: 3px 4px;
}

#task-container:hover{
    cursor: pointer;
}


#task-container i{
    padding: 3px 4px;
    size: 30px; 
}

#search-bar{
    position: absolute;
    width: 220px;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 30px;
    right: 7%;
    top: 3%;
    background: whitesmoke;
    padding: 7px 5px;
    border-radius: 20px;    



}

#search-bar #s-bar{
    background: transparent;
    border: 0;
    outline: 0;
    padding: 3px 4px;
   
}


<style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: center;
            padding: 10px;
        }

        th {
            background-color: #3B9EBF;
        }

        tr:nth-child(even) {
            background-color: #90EE90;
        }
        tr:nth-child(odd) {
            background-color: #cbcccb;
        }

        .search-container {
            margin: 20px 0;
        }

        input[type=text] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            background-color: #cbcccb;
            font-size: 16px;
        }

        input[type=text]:focus {
            outline: none;
            border-color: #0066cc;
        }
        .center {
  margin-left: auto;
  margin-right: auto;
}
</style>
<body>
    
    <header>
    <img src="https://adoreearth.org/assets/images/ADORE.png" alt="" id="background" >
    <nav>
        
        <div id="task-container">
            <i class="ri-add-circle-line"></i>
            <p><a href="task.php">Create Task</a></p>
        </div>
        <div class="search" id="search-bar">
            <i class="ri-search-2-line"></i>
            <input type="text" placeholder="Search" id="s-bar">

        </div>
       
    </nav>
</header>

<?php
include 'connect.php'; // Assuming this file contains your database connection

$query = "SELECT * FROM tform";
$result = mysqli_query($con, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
?>
<br>
<br>
<!-- Displaying records in a table -->
        <h2 style="text-align: center;">Task Records</h2>
        <br>
        <br>
        <table class="center">
            <thead>
                <tr>
                  
                    <th>Name</th>
                    <th>Email</th>
                    <th>Recipient Email</th>
                    <th>Task Type</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                 
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['recipient_email']}</td>";
                    echo "<td>{$row['task_type']}</td>";
                    echo "<td>{$row['message']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>


