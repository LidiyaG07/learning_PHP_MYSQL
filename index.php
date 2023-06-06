<?php
// Подключение к базе данных
require_once 'config/connect.php';

?>
<!-- HTML разметка -->
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Подключение стилей -->
   <link rel="stylesheet" href="css/style.css">
   <title>Matches</title>
</head>

<body>
   <div class="wrapper">
      <header class="header">
         <div class="container">
            <h1>Create matches between teams</h1>
         </div>
      </header>
      <section>
         <div class="main">
            <div class="container">
               <h3>Select the commands</h3>
               <div class="main__form">
                  <form class="main__enter" action="vendor/create.php" method="post">
                     <?php
                        $teams_1 = mysqli_query($connect, "SELECT * FROM `Number of teams`"); 
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($teams_1)){
                           $teams[$i] = $row['Name teams'];
                           $i++;
                        }
                        echo '<select name="teams_1" id="selected_team_1">';
                        foreach($teams as $comand){
                           echo ("<option value='".$comand."'>".$comand."</option>");
                        }
                        echo '</select>';
                     ?>
                     <br>
                     <br>
                     <?php
                        $teams_2 = mysqli_query($connect, "SELECT * FROM `Number of teams`");
                        echo '<select name="teams_2" id="selected_team_2">';
                        foreach($teams as $comand){
                           echo ("<option value='".$comand."'>".$comand."</option>");
                        }
                        echo '</select>';
                     ?>
                     <p>Enter how many goals the first team scored in the match</p>
                     <input type="number" name="Goals_scored_first"> <br><br>
                     <p>Enter how many goals the second team scored in the match</p>
                     <input type="number" name="Goals_scored_second">
                     <input type="submit" value="Add match">
                  </form>
               </div>
               <br>
               <br>
               <!-- Таблица для вывода значений из базы данных (шапка таблица) -->
               <table>
                  <tr>
                     <th>ID</th>
                     <th>id teams</th>
                     <th>Teams</th>
                     <th>Goals scored</th>
                     <th>Goals conceded</th>
                  </tr>
                  <!-- Получение значений из бд по индексу по столбцам в ранее созданную таблицу -->
                  <?php
                  $matches = mysqli_query($connect, "SELECT * FROM `Matches` JOIN `Number of teams` ON id=`id_teams`");
                  $matches = mysqli_fetch_all($matches);
                  foreach ($matches as $matches) {
                     ?>
                     <tr>
                        <th>
                           <?= $matches[0] ?>
                        </th>
                        <th>
                           <?= $matches[1] ?>
                        </th>
                        <th>
                           <?= $matches[2] ?>
                        </th>
                        <th>
                           <?= $matches[3] ?>
                        </th>
                        <th>
                           <?= $matches[4] ?>
                        </th>
                     </tr>
                     <?php
                  }
                  ?>
               </table> <br> <br>
               <!-- Должно было быть просмотр информации о выбранной команды. Но т.к. не разобралась как вытянуть из select выбранное значение, здесь тоже не закончила задачу. Но переключение на другую страницу есть
               где было бы информация о матчах выьранной команды -->
               <a href="view.php">View the matches of the team</a> <br>
               <form action="view.php" method="post">
                  <select name="view_team" id="current_team">
                     <option selected value="team_1">Team 1</option>
                     <option value="team_2">Team 2</option>
                     <option value="team_3">Team 3</option>
                     <option value="team_4">Team 4</option>
                  </select>
               </form>
            </div>
         </div>
      </section>
   </div>
   <!-- в скрипте функция на исключающие друг друга option`ы -->
   <script src="js/script.js"></script>
</body>

</html>