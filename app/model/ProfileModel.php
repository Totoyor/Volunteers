<?php

class ProfileModel extends AppModel
{
    public function getProfile($id)
    {
        try {
            $query = $this->connexion->prepare("SELECT *
                                                FROM vol_users
                                                LEFT JOIN vol_users_pictures
                                                ON idPictures = vol_users_pictures_idPictures
                                                WHERE idUser = :id
                                                GROUP BY idUser");

            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();

            $data = $query->fetch();
            $query->closeCursor();

            return $data;

        } catch (Exception $e) {
            echo "Connexion à MYSQL impossible : ".$e->getMessage();
        }
    }

    public function update_profile($id, $first_name, $last_name, $birth_date, $email, $location, $description, $skills, $school, $work, $idpicture)
    {
        try {
            $query = $this->connexion->prepare("UPDATE vol_users SET FirstName = :firstn, LastName = :lastn, BirthDate = :birth, Email = :email, Location = :location, Description = :description, Skills = :skills, School = :school, Work = :work, vol_users_pictures_idPictures = :id_pic WHERE idUser = :id");

            $query->bindValue(':firstn', $first_name, PDO::PARAM_STR);
            $query->bindValue(':lastn', $last_name, PDO::PARAM_STR);
            $query->bindValue(':birth', $birth_date, PDO::PARAM_STR);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->bindValue(':location', $location, PDO::PARAM_STR);
            $query->bindValue(':description', $description, PDO::PARAM_STR);
            $query->bindValue(':skills', $skills, PDO::PARAM_STR);
            $query->bindValue(':school', $school, PDO::PARAM_STR);
            $query->bindValue(':work', $work, PDO::PARAM_STR);
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->bindValue(':id_pic', $idpicture, PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            return true;

        }
        catch (Exception $e) {
            echo "Connexion à MYSQL impossible : ".$e->getMessage();
        }
    }

    public function insertUserPicture($imageUser)
    {
        try {
            $query = $this->connexion->prepare("INSERT INTO vol_users_pictures (Picture)
                                                VALUES (:image)");
            $query->bindValue(':image', $imageUser, PDO::PARAM_STR);
            $query->execute();
            $lastId = $this->connexion->lastInsertId();
            $query->closeCursor();

            return $lastId;

        } catch (Exception $e) {
            echo "Connexion à MYSQL impossible : ".$e->getMessage();
        }
    }
}