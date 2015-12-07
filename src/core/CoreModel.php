<?php

class CoreModel extends Core
{
    protected $connexion;

    public function __construct()
    {
        try
        {
            $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ".DB_CHARSET,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

            $this->connexion = new PDO (DB_DNS, DB_USERNAME, DB_PASSWORD, $options);
        }
        catch (Exception $e)
        {
            $this->coreDbError($e);
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
                // Si DESC
                if(isset($options['sort'])) {
                    $query .= " ".$options['sort'];
                }
            }

            if (isset($options['limite']) && isset($options['offset'])) {
                $query .= " LIMIT " . $options['offset'] . ", " . $options['limite'];
            }

            // Traitement de la requete
            $cursor = $this->connexion->query($query);
            $results = $cursor->fetchAll();
            $cursor->closeCursor();

            return $results;
        }
        catch (Exception $e)
        {
            $this->coreDbError($e);
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
            $this->coreDbError($e);
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
            $this->coreDbError($e);
            return false;
        }
    }

    public function searchArticle($options)
    {
        try
        {
            $requete = htmlspecialchars($options['keyword']);

            // Requête SQL
            $query = "SELECT * FROM ".DB_PREFIX."posts
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
            $this->coreDbError($e);
            return false;
        }
    }
}