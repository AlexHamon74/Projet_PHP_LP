
<?php


    $id = $_SESSION['user_id'];
    $id = $_GET['id'];


    try{
        $pdo = getConnection();
        }catch(PDOException $e) {
            redirect('equipe.php');
        }


    $query = $pdo->prepare('SELECT * FROM users WHERE id_role=2');
    $query->execute();

    $players = $query->fetchAll();

    $foundplayer = null;

    foreach ($players as $player){
        if($player['user_id']== $id) {
            $foundplayer = $player;
        }
    }

    //Si l'id du membre n'existe pas, on affiche "Membre non trouvé" sur la page profil
    if ($foundplayer === null) {
        echo "Membre non trouvé";
        exit;
    }
    ?>


<section class="player py-5">
    <div class="container text-center border">
        <div class="row">
            <div class="col-12 d-flex">
                <div class="photo border rounded-circle shadow-5 mx-auto mb-4" style="height: 180px; width:180px"> </div>
                <a href="info_profil.php" class="link-light position-absolute">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"/>
                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z"/>
                        </svg>
                </a>
            </div>
        </div>
                
        <div class="row">
            <div class="col-12">
                <div class="border">
                    <h3>  <?php echo $foundplayer['user_firstname']. ' ' . $foundplayer['user_name'];?>      </h3>
                    <h5>birthdate  </h5>
                    <p>2023-2024</p>
                    <p>Licence Number : </p>
                </div>
            </div>
        </div>

        <div class="row py-4 ">
            <div class="col-md-3 col-6">
                <div class="border mb-4">
                    Height :
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="border mb-4">
                    Weight :
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="border mb-4">
                    Position :
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="border mb-4">
                    Jersey Number :
                </div>
            </div>
        </div>
    </div>
</section>

<section class="points py-5">
    <div class="container text-center">
        <h2 class="mb-4">Statistics</h2>
        <div class="row">
            <div class="col-12">
                <div class="border mb-4">
                    points
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="border mb-4">
                    goals
                </div>
            </div>
            <div class="col-6">
                <div class="border mb-4">
                    assists
                </div>
            </div>
        </div>
    </div>
</section>

<section class="result py-5">
    <div class="container text-center">
        <h2 class="mb-4">My Results</h2>
        <div class="row">
            <div class="col-12">
                <div class="border mb-4">
                    Matchs played
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-12">
                <div class="border mb-4">
                    Win
                </div>
            </div>
            <div class="col-md-4 col-12 mb-4">
                <div class="border">
                    Draws
                </div>
            </div>
            <div class="col-md-4 col-12 mb-4">
                <div class="border">
                    Defeats
                </div>
            </div>
        </div>

    </div>
</section>