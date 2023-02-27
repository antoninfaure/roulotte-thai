<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=480" />
    <title>Hong Thaï Rung - Admin</title>
    <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<!-- Bootstrap -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>
<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
?>
<body>
<a id="logout-btn" class="btn btn-danger m-3" href="logout.php">Logout</a>
    <div class="col-12 m-0 py-5 px-2 px-md-5 text-center">
            <?php
            // Nos options définies dans un tableau (plus facile à coder et à maintenir)
            // Ouverture du fichier en lecture seule
            $jsonFile = file_get_contents('list_menus.json', 'r');

            // Si erreur lors de l'ouverture du fichier, exit
            if (!$jsonFile) exit;

            $menus = json_decode($jsonFile, true);

            for($i=0; $i< count($menus); $i++)
            {  
                if (isset($menus[$i]["name"])) {
                    $options[] = $menus[$i];
                }
            }


            // Affichage de la sélection seulement si le formulaire a été validé
            if (isset($_POST['menus'])) {
                echo "Menus sélectionnés:";
                for ($i = 0, $c = count($_POST['menus']); $i < $c; $i++) {
                    // ID du menu dans la liste $menus stocké dans la value de l'option
                    $menuId = $_POST['menus'][$i];

                    // Print le name du menu
                    echo '<br/><b>' . $menus[$menuId]["name"] . '</b>';

                    // Ajout du menu dans les selected menus
                    $menusSelected[] = $menus[$menuId];
                }
                echo '<br><br>';

                // On output les selected menus dans menujour.json
                $jsonString = json_encode($menusSelected, JSON_UNESCAPED_UNICODE);
                $fp = fopen('menujour.json', 'w');
                fwrite($fp, $jsonString);
                fclose($fp);
            }


            function est_selectionne($option)
            {
                for ($i = 0, $c = count($_POST['menus']); $i < $c; $i++) {
                    if ($_POST['menus'][$i] == $option) {
                        return TRUE;
                    }
                }
                return FALSE;
            }

            ?>
            Sélectionner les menus du jour
            <div class="d-flex">
            <form class="mx-auto" method="POST">
                <select class="form-control" name="menus[]" size="20" multiple>
                    <?php
                    $i = 0;
                    foreach ($options as $k) {
                        if (isset($_POST['menus']) && est_selectionne($k)) {
                            echo '<option value="'.$i.'" selected>' . $k["name"] . '</option>';
                        } else {
                            // Si la ligne contient -- alors disable l'option
                            if (1 == preg_match('/--/i', $k["name"])) {
                                echo '<option value="'.$i.'" disabled>' . $k["name"] . '</option>';
                            } else {
                                echo '<option value="'.$i.'">' . $k["name"] . '</option>';
                            }
                        }
                        $i++;
                    }
                    ?>
                </select>
                <br>
                <input class="btn btn-primary mt-3 w-100" type="submit" value="Valider" />
            </form>
            </div>
</body>
<style>
    #logout-btn {
        top: 0;
        right: 0;
        position: absolute;
        z-index: 20;
    }
</style>

</html>