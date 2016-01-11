<?php

class ProfileModel extends AppModel
{
    public function update_profile($id, $first_name, $last_name, $birth_date, $email, $location)
    {
        try {
            $query = $this->connexion->prepare("UPDATE vol_users SET FirstName = :firstn, LastName = :lastn, BirthDate = :birth, Email = :email, Location = :location WHERE idUser = :id");

            $query->bindValue(':firstn', $first_name, PDO::PARAM_STR);
            $query->bindValue(':lastn', $last_name, PDO::PARAM_STR);
            $query->bindValue(':birth', $birth_date, PDO::PARAM_STR);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->bindValue(':location', $location, PDO::PARAM_STR);
            $query->bindValue(':id', $id, PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            return true;

        }
        catch (Exception $e) {
            echo "Connexion à MYSQL impossible : ".$e->getMessage();
        }
    }
}