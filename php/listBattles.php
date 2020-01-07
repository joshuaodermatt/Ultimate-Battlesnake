<?php
            $user = 'snake';
            $password = 's1n2a3k4e5';
            
            $pdo = new PDO('mysql:host=localhost;dbname=snake_v2', $user, $password, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            ]);

            $stmt = $pdo->prepare('SELECT * FROM `battles` WHERE oponent = :usname');
            $stmt->execute([':usname' => $_SESSION['UsName']]);


            foreach($stmt->fetchAll() as $row) {
            $cont = $row['id']

              ?>
                  <div class="player-containertwo">
                      <p class="player-items"><?=$row['player']?></p>
                      <form method="POST" action="snake2/snake.php">
                          <input type="hidden" name="battleIdentity" value="<?=$cont?>">
                          <button type="submit" class="player-items">play!</button>
                      </form>
                      
                  </div>
              <?php
              }
            
              $stmt = $pdo->prepare('SELECT * FROM `battles` WHERE player = :usname');
              $stmt->execute([':usname' => $_SESSION['UsName']]);

            foreach($stmt->fetchAll() as $row) {
            ?>
                <div class="player-container">
                    <p class="player-items"><?=$row['oponent']?></p>
                    <p class="player-items">waiting...</p>
                </div>
            <?php
            }
