<?php
    header('Content-Type: text/html; charset=utf-8');

    // CONDITIONS NOM
    if ( (isset($_POST["nom"])) && (strlen(trim($_POST["nom"])) > 0) ) {
        $nom = stripslashes(strip_tags($_POST["nom"]));
    } else {
        echo "Merci d'écrire un nom <br />";
        $nom = "";
    }

    // CONDITIONS SUJET
    if ( (isset($_POST["telephone"])) && (strlen(trim($_POST["telephone"])) > 0) ) {
        $telephone = stripslashes(strip_tags($_POST["telephone"]));
    } else {
        echo "Merci d'écrire un sujet <br />";
        $telephone = "";
    }

    // CONDITIONS EMAIL
    if ( (isset($_POST["email"])) && (strlen(trim($_POST["email"])) > 0) && (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) ) {
        $email = stripslashes(strip_tags($_POST["email"]));
    } elseif (empty($_POST["email"])) {
        echo "Merci d'écrire une adresse email <br />";
        $email = "";
    } else {
        echo "Email invalide :(<br />";
        $email = "";
    }

    // CONDITIONS MESSAGE
    if ( (isset($_POST["message"])) && (strlen(trim($_POST["message"])) > 0) ) {
        $message = stripslashes(strip_tags($_POST["message"]));
    } else {
        echo "Merci d'écrire un message<br />";
        $message = "";
    }
    $ip           = "send.one.com";
    $hostname     = gethostbyaddr("send.one.com");
    $destinataire = "contact@driad.fr";
    $objet        = "[Site Web] " . $telephone;
    $contenu      = "Nom de l'expéditeur : " . $nom . "\r\n";
    $contenu     .= $message . "\r\n\n";
    $contenu     .= "Adresse IP de l'expéditeur : " . $ip . "\r\n";
    $contenu     .= "DLSAM : " . $hostname;

    $headers  = "CC: " . $email . " \r\n"; // ici l'expediteur du mail
    $headers .= "Content-Type: text/plain; charset=\"ISO-8859-1\"; DelSp=\"Yes\"; format=flowed /r/n";
    $headers .= "Content-Disposition: inline \r\n";
    $headers .= "Content-Transfer-Encoding: 7bit \r\n";
    $headers .= "MIME-Version: 1.0";


    // SI LES CHAMPS SONT MAL REMPLIS
    if ( (empty($nom)) && (empty($telephone)) && (empty($email)) && (!filter_var($email, FILTER_VALIDATE_EMAIL)) && (empty($message)) ) {
        echo 'echec :( <br /><h1 href="contact.html">Retour au formulaire</h1>';
    } else {
        // ENCAPSULATION DES DONNEES
        mail($destinataire, $objet, utf8_decode($contenu), $headers);
        echo '<div class="conf-modal center success">
                    <div class="title-icon">
                     <img src="http://jimy.co/res/icon-success.jpg">
                    </div>
                <div class="title-text"><h1>Success!</h1></div>
                <p>formulaire  envoyer :) </p>
                <div class="modal-footer">
                <div class="conf-but" onClick=""><a href="http://driad.fr/index.html">OK</a></div>    
              </div>
                </div>';
    }

    // Les messages d'erreurs ci-dessus s'afficheront si Javascript est désactivé
?>

<style type="text/css">  

.center {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
}

.conf-modal {
  width: 290px;
  max-width: 80%;
  height: 250px;
  background-color: #fafafa;
  border-radius: 3px;
  box-shadow: 0 12px 36px 16px rgba(0, 0, 0, 0.24);
}

.conf-modal h1 {
  font-size: 24px;
  font-weight: 500;
  line-height: 10px;
  display: inline-block;
}

.title-text {
  display: inline-block;
  height: 35px;
  line-height: 52px;
  margin-left: 72px;
  margin-top: 22px;
}

.success h1 {
  color: #26cf36;
}

.title-icon {
  width: 27px;
  height: 27px;
  display: inline-block;
  margin-right: 10px;
  margin-left: 30px;
  margin-top: 30px;
  position: absolute;
}

.conf-modal p {
  color: #737373;
  padding: 15px 30px;
  font-size: 16px;
  line-height: 24px;
}

.modal-footer {
  background: red;
}

.modal-footer .conf-but {
  display: inline-block;
  float: right;
  margin-right: 15px;
  margin-top: 5px;
  text-transform: uppercase;
  font-weight: 800;
  color: #4c4c4c;
  background: none;
  padding: 10px 15px;
  border-radius: 4px;
}

.modal-footer .conf-but:hover {
  background: #eee;
  cursor: pointer;
  opacity: .8;
}

.modal-footer .conf-but.green {
  color: #26cf36;
}
</style>