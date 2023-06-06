<?php
   require_once 'config/connect.php';

   $team_id = $_GET['id'];
   $team = mysqli_query($connect, "SELECT * FROM `Matches` WHERE 'id_teams' = '$team_id'");
   $team = mysqli_fetch_assoc($team);
   print_r($team);
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
   <title>Team</title>
</head>
<body>
   <form action="view.php" method="post">
      <input type="hidden" name="id" value="<?= $matches['id'] ?>">
   </form>
   <style>
      tr, th {
         padding: 10px;
      }
      tr {
         background-color: #c9c9c9;
      }
   </style>
   <table>
      <tr>
         <th>ID</th>
         <th>Name teams</th>
         <th>Number of matches</th>
         <th>The number of goals scored all the time</th>
         <th>The number of goals conceded all the time</th>
      </tr>
      <tr>
         <th><?= $current_team[`ID`] ?></th>
         <th><?= $current_team[`Name teams`] ?></th>
         <th><?= $current_team[`Number of matches`] ?></th>
         <th><?= $current_team[`The number of goals scored all the time`] ?></th>
         <th><?= $current_team[`The number of goals conceded all the time`] ?></th>
      </tr>
   </table>
</body>
</html>