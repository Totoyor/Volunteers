<?php

class PostModel extends AppModel
{

    public function countArticles($table)
    {
        try
        {
            $query = $this->connexion->prepare('SELECT COUNT(*) FROM '.$table);
            $query->execute();
            $nbrArt = $query->fetch();
            $query->closeCursor();

            return $nbrArt;
        }
        catch (Exception $e)
        {
            return false;
        }
    }

    public function getComments($id)
    {
        try
        {
            $query = $this->connexion->prepare('SELECT * FROM blog_comments
                                                WHERE comment_post_ID = :id ');
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $comments = $query->fetchAll();
            $query->closeCursor();

            return $comments;
        }
        catch (Exception $e)
        {
            return false;
        }
    }

}