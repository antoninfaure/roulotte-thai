<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Hong Thaï Rung</title>
  <meta name="keywords" CONTENT="HongThaiRung, restaurant, traiteur, thailandais, roulotte, EPFL, Lausanne, Suisse">
  <meta name="description" CONTENT="HongThaiRung, restaurant, traiteur, thailandais, roulotte, EPFL, Lausanne, Suisse">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Antonin Faure">

  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  <!-- Bootstrap -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lato&family=Lato:wght@100;300;500;900&family=Pacifico:wght@100;300;400;500;900&family=Josefin+Sans&display=swap" rel="stylesheet">

  <!-- Custom -->
  <link type="text/css" rel="stylesheet" href="./static/assets/style.css" />

</head>

<body>
  <header class="col-12 p-0 m-0 text-center">
    <nav class="navbar dark-green m-0 justify-content-center">
      <ul class="nav d-flex justify-content-center text-center m-0">
        <a class="nav-link m-2" href="#menu">Carte</a>
        <a class="nav-link m-2" href="#about">A propos</a>
        <a class="nav-link m-2" href="#contact">Contact</a>
        <a class="nav-link m-2" href="#where-to-find-us">Où nous trouver</a>
      </ul>
    </nav>
  </header>
  <main>
    <div class="row m-0 p-0">
      <div class="col-12 m-0 p-0">
        <section class="hero">
          <div class="hero-inner">
            <h1>Hong Thai Rung</h1>
            <h4 class="mt-3">Traiteur thaï depuis 1999</h4>
          </div>
        </section>

      </div>
      <div class="col-12 m-0 px-3 px-md-5 py-5 text-center dark-green" id="menu">
        <h2>Carte</h2>
        <div class="container">


          <p>Nous vous proposons une cuisine thaïlandaise de qualité, saine et variée :</p>
          <div class="row">
            <div class="mx-auto">
              <ul class="text-left" style="list-style: inside;">
                <li>plusieurs menus à choix (changement quotidien) à 11.-, servis en portions généreuses
                </li>
                <li>divers mets classiques et jus exotiques (disponibles quotidiennement)</li>
                <li>un menu végétarien est
                  proposé
                  quotidiennement (les menus à base de nouilles peuvent également être servis
                  végétariens)</li>
              </ul>
            </div>
          </div>
		  <p>Les commandes sont à faire par email à l'adresse <a href="mailto:info@roulotte-thai.ch">info@roulotte-thai.ch</a>. <br>Il faut effectuer votre commande la veille du jour souhaité et venir chercher vos plats Route de Vallaire 100, à Ecublens.<br>À toutes fins utiles, il vous est possible de vous coordonner avec d'autres personnes en rejoignant le <a href="https://chat.whatsapp.com/E0MRnyO5DCZFnVB6D6qaLV" target="_blank">groupe WhatsApp</a> dédié à cela !</p>
          <div class="col-12 p-3 my-3 m-0">
            <h3>Nous vous servirons à Ecublens cette semaine le jeudi 2 et le vendredi 3 mars</h3>
            <table class="text-left m-0 w-100">
              <thead>
                <tr>
                  <td></td>
                  <td>Prix</td>
                </tr>
              </thead>
              <tbody>
                <?php
                  // Si fichier inexistant, exit
                  if (!file_exists("menujour.json")) exit;

                  $jsonFile = file_get_contents('menujour.json', 'r');

                  // Si erreur lors de l'ouverture du fichier, exit
                  if (!$jsonFile) exit;

                  $menus = json_decode($jsonFile, true);
                  for($i=0; $i< count($menus); $i++)
                  {  
                    $item = $menus[$i];
                    if (isset($item["description"])) {
                      echo '<tr><td><span class="item">Plat '
                      .($i+1)
                      .' - ';
                      echo $item['name']
                      .'</span><br><i>'
                      .$item['description']
                      .'</i></td><td>'
                      .$item['price']
                      .' CHF</td></tr>';
                    } else {
                      echo '<tr><td><span class="item">Plat '
                      .($i+1)
                      .' - '
                      . $item['name']
                      .'</span></td><td>'
                      .$item['price']
                      .' CHF</td></tr>';
                    }
                  }
                ?>
              </tbody>
            </table>
          </div>
          <div class="col-12 p-3 my-3 m-0">
            <h3>Les spécialités</h3>
            En plus des menus du jour, nous vous invitons à déguster ...
            <table class="text-left m-0 w-100">
              <thead>
                <tr>
                  <td></td>
                  <td>Prix</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <span class="item">Brochette de poulet satay, sauce cacahuètes</span><br><i>(1 pièce)</i>
                  </td>
                  <td>3 CHF</td>
                </tr>

                <tr>
                  <td>
                    <span class="item">Brochette de poulet satay, sauce cacahuètes</span><br><i>(3 pièces + riz)</i>
                  </td>
                  <td>11 CHF</td>
                </tr>
                <tr>
                  <td>
                    <span class="item">Rouleau de printemps croustillant</span><br><i>(1 pièce)</i>
                  </td>
                  <td>2.5 CHF</td>
                </tr>
                <tr>
                  <td>
                    <span class="item">Riz nature</span><br><i>(300 gr)</i>
                  </td>
                  <td>2.5 CHF</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="col-12 p-3 my-3 m-0">
            <h3>Les boissons</h3>
            Pour accompagner vos menus ...
            <table class="text-left m-0 w-100">
              <thead>
                <tr>
                  <td></td>
                  <td>Prix</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <span class="item">Jus asiatiques (35cl)</span><br><i>Mangue, Litchi, Goyave, ...</i>
                  </td>
                  <td>2.5 CHF</td>
                </tr>
                <tr>
                  <td>
                    <span class="item">Volvic - 50cl</span><br><i>Non-gazeuse</i>
                  </td>
                  <td>2 CHF</td>
                </tr>
                <tr>
                  <td>
                    <span class="item">San Pellegrino - 50cl</span><br><i>Gazeuse</i>
                  </td>
                  <td>2.3 CHF</td>
                </tr>
                <tr>
                  <td>
                    <span class="item">Thé froid - 50cl</span><br><i>Pêche, Citron, ...</i>
                  </td>
                  <td>2.5 CHF</td>
                </tr>
                <tr>
                  <td>
                    <span class="item">Sodas - 45/50cl</span><br><i>Coca-Cola, Sinalco, ...</i>
                  </td>
                  <td>2.5 CHF</td>
                </tr>
                <tr>
                  <td>
                    <span class="item">Thé froid asiatique (oishi) - 40cl</span><br><i>Jasmin, Passion, Noir Citron, Miel
                      Citron, Extrait de riz, ...</i>
                  </td>
                  <td>2.5 CHF</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-12 m-0 px-3 px-md-5 py-5 text-center dark-green-outline" id="about">
        <h2>A propos</h2>
        <div class="container py-2">
          <p>La roulotte Hong Thaï Rong est née à l'EPFL en 1999. Elle a beaucoup grandi depuis et a acquis
            une
            clientèle fidèle.</p>

          <img class="img-fluid my-4" width="100%" src="./static/images/service.jpeg">

          <p>Nous sommes actuellement à la recherche d'un nouveau lieu où servir nos plats au quotidien,
            toutes
            vos
            remarques
            et idées sont les bienvenues !<br>
            N'hésitez pas à nous contacter à <a href="mailto:info@roulotte-thai.ch">info@roulotte-thai.ch</a> !</p>

          <p>Toute l'équipe de la roulotte Hong Thaï Rung vous souhaite un bon appétit !</p>
          <hr class="border-dark-green my-5">
          <div>
            <h4>Envie de nous aider ?</h4>
            <p>Parlez-en autour de vous !
              Le meilleur moyen de nous donner un coup de main est de nous aider à nous faire connaître !
              À
              toutes
              fins
              utiles, vous pouvez télécharger notre <a href="./static/docs/flyer-thai.pdf" target="_blank">flyer</a>.</p>
          </div>
          <hr class="border-dark-green my-5">
          <div>
            <h4>Prestations</h4>
            <p>Pour toute question ou demande de participation à un événement, n'hésitez pas à nous
              contacter
              par
              email à <a href="mailto:info@roulotte-thai.ch">info@roulotte-thai.ch</a></p>
          </div>
          <hr class="border-dark-green my-5">
          <div>
            <h4>Newsletter</h4>
            <p>Stay tuned! Vous pouvez nous donner votre adresse email afin d'être tenu·e informé·e de
              toutes
              les
              nouveautés
              concernant nos activités en remplissant ce <a href="https://docs.google.com/forms/d/e/1FAIpQLSfQ7jVZC_ZW9TtxOXQX_VxVi6e6l8UPBHhC0IOPpn-cFGLp9w/viewform" target="_blank">formulaire</a>.</p>
          </div>
        </div>
      </div>
      <div class="col-12 m-0 px-3 px-md-5 py-5 text-center dark-green" id="contact">
        <h2>Contact</h2>

        <h6>Horaires</h6>
        <p>Tous les jours, du lundi au vendredi, 11h - 14h30</p>

        <h6>Paiements acceptés</h6>
        <p>Cash, Twint (076 334 42 49)</p>

        <h6>Téléphones</h6>
        <p>076 334 42 49 <br>
          078 627 42 49 (pour toutes questions administratives)</p>

        <h6>Email</h6>
        <p><a href="mailto:info@roulotte-thai.ch">info@roulotte-thai.ch</a></p>

        <h6>Localisation</h6>
        Route de Vallaire 100, 1024 Ecublens

      </div>
    </div>
    <div class="col-12 m-0 px-3 px-md-5 py-5 text-center dark-green-outline" id="where-to-find-us">
        <h2>Où nous trouver ?</h2>
        <div class="col-12 p-3">
          <p>Suite à la cessation de notre activité à l'EPFL, nous continuons à vous servir et à partager
            notre passion !<br> Retrouvez nos plats à l'emporter à ces adresses :</p>
        </div>
        <div class="row m-0 p-1">
          <div class="col-12 col-lg-6 my-2">
            <div class="row m-0">
              <div class="col-12 col-xl-7 order-1 order-xl-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d343.1640612419767!2d6.629429628803116!3d46.52171789889717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c2e2de4c5885b%3A0x7beb84788ba49c91!2sTerrasse%20Jean-Monnet%2C%201003%20Lausanne!5e0!3m2!1sfr!2sch!4v1677100040049!5m2!1sfr!2sch" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
              <div class="col-12 col-xl-5 justify-content-center p-3 p-xl-4 order-0 order-xl-1">
                <h4 class="m-0">Terrasse Jean-Monnet, Lausanne</h4>
                <div class="row">
                  <div class="mx-auto mb-auto mt-3">
                    <div class="horaires">
                      <h5>Horaires</h5>
                      <table class="text-left">
                        <tbody>
                          <tr>
                            <th class="align-top p-2">
                              Lundi
                            </th>
                            <td class="align-top p-2">
                              11:00 - 14:30
                            </td>
                          </tr>
                          <tr>
                            <th class="align-top p-2">
                              Mardi
                            </th>
                            <td class="align-top p-2">
                              Fermé
                            </td>
                          </tr>
                          <tr>
                            <th class="align-top p-2">
                              Mercredi
                            </th>
                            <td class="align-top p-2">
                              Fermé
                            </td>
                          </tr>
                          <tr>
                            <th class="align-top p-2">
                              Jeudi
                            </th>
                            <td class="align-top p-2">
                              Fermé
                            </td>
                          </tr>
                          <tr>
                            <th class="align-top p-2">
                              Vendredi
                            </th>
                            <td class="align-top p-2">
                              Fermé
                            </td>
                          </tr>
                          <tr>
                            <th class="align-top p-2">
                              Samedi
                            </th>
                            <td class="align-top p-2">
                              Fermé
                            </td>
                          </tr>
                          <tr>
                            <th class="align-top p-2">
                              Dimanche
                            </th>
                            <td class="align-top p-2">
                              Fermé
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-6 my-2">
            <div class="row m-0">
              <div class="col-12 col-xl-7 order-1 order-xl-1">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1372.7932241584897!2d6.5474288816146675!3d46.51629595243696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c30ddc65ce36b%3A0x6d8837cd83454dbb!2sRte%20de%20Vallaire%20100%2C%201024%20Ecublens!5e0!3m2!1sfr!2sch!4v1677101503260!5m2!1sfr!2sch" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
              <div class="col-12 col-xl-5 justify-content-center p-3 p-xl-4 order-0 order-xl-0">
                <h4>Route de Vallaire 100, Ecublens</h4>
                <div class="row">
                  <div class="mx-auto mb-auto mt-3">
                    <div class="horaires">
                      <h5>Horaires</h5>
                      <table class="text-left">
                        <tbody>
                          <tr>
                            <th class="align-top p-2">
                              Lundi
                            </th>
                            <td class="align-top p-2">
                              Fermé
                            </td>
                          </tr>
                          <tr>
                            <th class="align-top p-2">
                              Mardi
                            </th>
                            <td class="align-top p-2">
                              11:00 - 14:30
                            </td>
                          </tr>
                          <tr>
                            <th class="align-top p-2">
                              Mercredi
                            </th>
                            <td class="align-top p-2">
                              Fermé
                            </td>
                          </tr>
                          <tr>
                            <th class="align-top p-2">
                              Jeudi
                            </th>
                            <td class="align-top p-2">
                              11:00 - 14:30
                            </td>
                          </tr>
                          <tr>
                            <th class="align-top p-2">
                              Vendredi
                            </th>
                            <td class="align-top p-2">
                              11:00 - 14:30
                            </td>
                          </tr>
                          <tr>
                            <th class="align-top p-2">
                              Samedi
                            </th>
                            <td class="align-top p-2">
                              Fermé
                            </td>
                          </tr>
                          <tr>
                            <th class="align-top p-2">
                              Dimanche
                            </th>
                            <td class="align-top p-2">
                              Fermé
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </main>
  <footer class="p-5">
    <div class="col-12 text-center">
      <span class="mb-3 mb-md-0 text-center">Copyright (c) 2023 Hong Thaï Rung - Tous droits réservés</span>
    </div>
  </footer>
</body>

</html>