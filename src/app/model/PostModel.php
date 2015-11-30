<?php

class PostModel extends AppModel
{
//    public function read_articles($offset, $limite)
//    {
//        try
//        {
//            $query = $this->connexion->prepare('SELECT * FROM blog_posts
//                                        ORDER BY post_date
//                                        LIMIT :offset, :limite');
//
//            $query->bindParam(':offset', $offset, PDO::PARAM_INT);
//            $query->bindParam(':limite', $limite, PDO::PARAM_INT);
//
//            $query->execute();
//            $results = $query->fetchAll();
//        }
//        catch (Exception $e)
//        {
//            return false;
//        }
//
//        return $results;
//    }
    
//    public function read_article($id)
//    {
//        try
//        {
//            $query = $this->connexion->prepare('SELECT * FROM blog_posts
//                                        WHERE post_ID = :id');
//
//            $query->bindParam(':id', $id, PDO::PARAM_INT);
//
//            $query->execute();
//            $article = $query->fetch();
//        }
//        catch (Exception $e)
//        {
//            return false;
//        }
//
//        return $article;
//    }


    // à refaire
    public function countArticles($table)
    {
        try
        {
            $query = $this->connexion->prepare('SELECT COUNT(*) FROM '.$table);
            $query->execute();
            $nbrArt = $query->fetch();
        }
        catch (Exception $e)
        {
            return false;
        }

        return $nbrArt;
    }
}