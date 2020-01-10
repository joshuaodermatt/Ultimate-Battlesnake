<?php
            $user = 'snake';
            $password = 's1n2a3k4e5';
            
            require "../dbc.php";

            $stmt = $pdo->prepare('SELECT * FROM `battles` WHERE oponent = :usname');
            $stmt->execute([':usname' => $_SESSION['UsName']]);


            foreach($stmt->fetchAll() as $row) {
            $player = $row['oponent'];
            $cont = $row['id'];
            if($row['status'] === '1'){
              ?>
                  <div class="player-containertwo">
                      <p class="player-items"><?=$row['player']?></p>
                      <form method="POST" action="snake2/snake.php">
                          <input type="hidden" name="battleIdentity" value="<?=$cont?>">
                          <input type="hidden" name="player" value="<?=$player?>">
                          <button type="submit" class="player-items">play!</button>
                      </form>
                      
                  </div>
              <?php
              }
              }
            
              $stmt = $pdo->prepare('SELECT * FROM `battles` WHERE player = :usname');
              $stmt->execute([':usname' => $_SESSION['UsName']]);

            foreach($stmt->fetchAll() as $row) {
            if($row['status'] != 2){
            ?>
                <div class="player-container">
                    <p class="player-items"><?=$row['oponent']?></p>
                    <p class="player-items">waiting...</p>
                </div>
            <?php
            }
            }
