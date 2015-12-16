<?php

class BlogModel extends AppModel
{
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