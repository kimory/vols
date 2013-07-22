<?php

namespace controller;

use dao\MysqlDao;
use entity\Client;
use entity\Passager;
use \DateTime;

class EnregistrementPassagersController {

    public function action() {
        $dao = new MysqlDao();
        // Cas où la personne n'a pas choisi un vol parmi les
        // propositions sur la vue précédente :
        if (isset($_POST['volchoisi']) && strlen($_POST['volchoisi']) > 0) {
            $_SESSION['volchoisi'] = $_POST['volchoisi'];
        }

        if (!isset($_SESSION['volchoisi']) || strlen($_SESSION['volchoisi']) == 0) {
            $_SESSION['msg_vol_non_choisi'] = 'Erreur : vous devez sélectionner un vol !';
            header('Location:/propositions');
        }

        // Cas où on a déjà rempli le formulaire d'inscription des passagers :
        if (isset($_POST['civilite'], $_POST['date_de_naissance'], $_POST['nom'], $_POST['prenom'], $_SESSION['nb_passagers'])) {
            // On vérifie qu'on a récupéré toutes les informations qu'il faut

            $i = 0;
            // Cf le tableau des données que l'on récupère
            // du formulaire commence à l'indice zéro

            $messages_erreur = array();

            while ($i < $_SESSION['nb_passagers']) {
                if (strlen($_POST['civilite'][$i]) == 0 ||
                        !preg_match("/^(m|mme)$/", $_POST['civilite'][$i])) {
                    $messages_erreur[] = "La civilité n'est pas correcte pour le passager " . ($i + 1) . '.';
                }

                if (strlen($_POST['nom'][$i]) == 0 ||
                        !preg_match("/^[ A-Za-zàâäéèêëìîïôöòùûüçÀÂÄÉÈËÏÎÌÔÖÙÛÜÇ-]+$/", $_POST['nom'][$i])) {
                // Remarque : on autorise les espaces (cf "M. de XXX")
                    $messages_erreur[] = "Le nom n'est pas correct pour le passager " . ($i + 1) . '.';
                }

                if (strlen($_POST['prenom'][$i]) == 0 ||
                        !preg_match("/^[A-Za-zàâäéèêëìîïôöòùûüçÀÂÄÉÈËÏÎÌÔÖÙÛÜÇ-]+$/", $_POST['prenom'][$i])) {
                    $messages_erreur[] = "Le prénom n'est pas correct pour le passager " . ($i + 1) . '.';
                }

                if (strlen($_POST['date_de_naissance'][$i]) > 0 &&
                        preg_match("/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/", $_POST['date_de_naissance'][$i])) {
                    $tab = explode('/', $_POST['date_de_naissance'][$i]); // On récupère les différents éléments de la date
                    $jour = $tab[0];
                    $mois = $tab[1];
                    $annee = $tab[2];

                    $datedujour = new DateTime(); // On récupère la date du jour
                    $anneeCourante = $datedujour->format("Y"); // On récupère l'année courante
                    // On vérifie que la date saisie est cohérente
                    if ($jour < 1 || $jour > 31 || $mois < 1 || $mois > 12 ||
                            $annee < 1900 || $annee > $anneeCourante) {
                        $messages_erreur[] = "La date de naissance n'est pas correcte pour le passager " . ($i + 1) . ".";
                    }
                } else {
                    $messages_erreur[] = "La date de naissance n'est pas correcte pour le passager " . ($i + 1) . ". Veuillez respecter le format jj/mm/aaaa.";
                }

                $i++;
            }
            if (!empty($messages_erreur)) {
                include VIEW . "enregistrement_passagers.php";
            } else {
                // On enregitre en session les passagers
                // et on vérifie leur âge au départ du vol
                $passagers = array();
                $i = 0;
                
                // Les nombres d'adultes et d'enfants sont réinitialisés à zéro.
                // On va calculer le nombre réel d'adultes et d'enfants
                // (le prix à payer par le client au final en dépend !)           
                $_SESSION['nb_adultes'] = 0;
                $_SESSION['nb_enfants'] = 0;
                
                // Au moins une personne majeure doit voyager.
                // On initialise la variable à "false" :
                $un_vrai_adulte_present = false;

                $vol = $dao->getVolById($_SESSION['volchoisi']);

                while ($i < $_SESSION['nb_passagers']) {
                    $dt = DateTime::createFromFormat('d/m/Y', $_POST['date_de_naissance'][$i]);
                    $passager = new Passager(null, $_POST['civilite'][$i], $_POST['nom'][$i], $_POST['prenom'][$i], $dt->format('Y-m-d'));
                    $passagers[] = $passager;
                    if ($dao->payePleinTarif($passager->getDateNaissance(), $vol->getDateHeureDepart())) {
                        $_SESSION['nb_adultes']++; // la personne a au moins 3 ans
                        if ($dao->estMajeur($passager->getDateNaissance(), $vol->getDateHeureDepart())) {
                            $un_vrai_adulte_present = true; // la personne a au moins 18 ans
                        }
                    } else {
                        $_SESSION['nb_enfants']++; // la personne a moins de 3 ans
                    }
                    $i++;
                }

                if (!$un_vrai_adulte_present) {
                    $messages_erreur[] = "Désolés, il faut au minimum une personne majeure parmi les passagers.";
                    include VIEW . "enregistrement_passagers.php";
                    return; // permet de sortir de la fonction
                } else {
                    // On récupère en session un tableau d'objets 'Passager' :
                    $_SESSION['passagers'] = $passagers;

                    if (Client::isClientConnected())
                        header('Location:/SyntheseController');
                    else {
                        // Une fois qu'on aura fini l'inscription, 
                        // il faudra aller sur cette page
                        $_SESSION['pagesurlaquelleondoitaller'] = '/SyntheseController';
                        header('Location:/connexion_client');
                    }
                }
            }
        } else if (!isset($_SESSION['nb_passagers']) ||
                strlen($_SESSION['nb_passagers']) == 0) {
            $_SESSION['message_nb_passagers'] = 'Désolés ! Il y a eu une erreur lors de l\'enregistrement des passagers.' .
                    PHP_EOL . 'Merci de recommencer en indiquant le nombre de voyageurs.';
            header('Location:/recherche');
        } else {
            include VIEW . "enregistrement_passagers.php";
        }
    }

}

?>