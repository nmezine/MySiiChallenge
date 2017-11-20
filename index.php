<!DOCTYPE html>
<html lang="en">
<?php require_once('controleur/LoadTwitterAndTweet.php'); ?>
<head>
  <title>MySiiChallenge</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link href="vue/css/MyCss.css" rel="stylesheet" type="text/css" />

</head>
<body>


<script src="vue/css/MyJavaScript.js"></script>

<div class="jumbotron text-center">
  <h1>MySiiChallenge</h1>
  <p>Search and Follow your favorite twitter accounts !</p> 
  <!-- DEBUT : barre de recherche -->

  <form action="index.php" id="searchForm">
      <input type="text" name="searchTwitterAccount" placeholder="Rechercher…">
      <input type="submit" value="Ok" class="btn btn-primary btn-sm">
  </form>

  <!-- FIN : barre de recherche -->
</div>
  
<div class="container">
  <div class="row" id="result">

<?php //Boucle sur la list des compte Twitter
    $id = 0; //Id du compte twitter, utilisé pour les id des div
    foreach($twAccountList as $twAccount)
      { 
        ++$id;
        ?>
        <div class="col-md-4" id="divTweet<?php echo $id; ?>">
          <h3>
            <a href="<?php echo $twAccount->getAccountUrl(); ?>"> 
              <img src="<?php echo $twAccount->getTwitterAvatar() ?>" class = "img-thumbnail">
              <?php echo $twAccount->getTwitterAccount(); ?>
            </a>
          </h3>
          
          <p> <?php echo $twAccount->getAccountDescription(); ?></p>

          
            <?php //Boucle sur la list des tweets d'un compte tweeter donné
              foreach($twAccount->getTweetList() as $items)
                 { //Liens vers le tweet  
            ?> 
                  <a href="<?php echo $twAccount->getAccountUrl()."/status/".$items->getLinkTweet(); ?>">
                     <div id="divTweet"> 
                        <?php  
                          echo $items->getDateTweet()."<br />"; //Date du tweet
                          echo $items->getTextTweet()."<br />"; //Contenu du tweet
                         // echo $items->getMediaTweet()."<br />"; //Affiche le media du tweet
                        ?> 
                        </div>
                      </a>
            <?php } ?>
        <a href="#" id="loadMore" onClick="loadMore('divTweet<?php echo $id; ?>');">Load More</a>
        </div>
<?php } ?>


  </div>




</body>
</html>