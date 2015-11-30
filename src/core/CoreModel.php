<?php

class CoreModel extends Core
{
    protected $connexion;

    public function __construct()
    {
        try
        {
            $dns = DB_DNS;
            $utilisateur = DB_USERNAME;
            $motDePasse = DB_PASSWORD;

            $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

            $this->connexion = new PDO ($dns, $utilisateur, $motDePasse, $options);

        }
        catch (Exception $e)
        {
            define('TITLE_HEAD', 'Erreur de connexion BDD');
            include('views/view_error.php');
            die();
        }
    }

    public function readAll($options)
    {
        try
        {
            // Requete SELECT
            $query = "SELECT ";

            // Traitement des colonnes
            if (isset($options['columns'])) {
                $query .= $options['columns'];
            } else {
                $query .= "*";
            }

            // Choix de la table
            $query .= " FROM " . DB_PREFIX . $options['table'];

            // Traitement des options
            if (isset($options['orderBy'])) {
                $query .= " ORDER BY " . $options['orderBy'];
            }
            if (isset($options['limite']) && isset($options['offset'])) {
                $query .= " LIMIT " . $options['offset'] . "," . $options['limite'];
            }

            // Traitement de la requete
            $cursor = $this->connexion->query($query);
            $results = $cursor->fetchAll();
            $cursor->closeCursor();

            return $results;
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function readOne($options)
    {
        try
        {
            // Requete SELECT
            $query = "SELECT ";

            // Traitement des colonnes
            if (isset($options['columns'])) {
                $query .= $options['columns'];
            } else {
                $query .= "*";
            }

            // Choix de la table
            $query .= " FROM " . DB_PREFIX . $options['table'];

            // Close WHERE
            $query .= " WHERE ".$options['column_id']." = ".$options['id'];

            // Traitement de la requete
            $cursor = $this->connexion->query($query);
            $results = $cursor->fetch();
            $cursor->closeCursor();

            return $results;
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function deleteOne($options) // à checker
    {
        try
        {
            // Requête DELETE
            $query = "DELETE FROM ";

            // Nom de la table
            $query .= DB_PREFIX.$options['table'];

            // Close WHERE
            $query .= " WHERE ".$options['column_id']." = ".$options['id'];

            var_dump($query);
            die();

            // Traitement de la requete
            $cursor = $this->connexion->query($query);
            $results = $cursor->fetch();
            $cursor->closeCursor();

            return true;
        }
        catch (Exception $e)
        {
            return false;
        }
    }

    public function searchArticle($options)
    {
        try
        {
            $requete = htmlspecialchars($options['search']);

            // Requête SQL
            $query = "SELECT * FROM blog_posts
                                        WHERE post_content LIKE '%$requete%'
                                        OR post_title LIKE '%$requete%'
                                        ORDER BY post_ID DESC";

            $cursor = $this->connexion->query($query);
            $results = $cursor->fetchAll();
            $cursor->closeCursor();

            return $results;
        }
        catch (Exception $e)
        {
            return false;
        }
    }
}