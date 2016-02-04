<?php

class ContactModel extends AppModel
{
    public function contactUs($name, $email, $message)
    {
        try{

            $query = $this->connexion->prepare("INSERT INTO vol_contact (name, email, message)
                                      VALUES (:name, :email, :message)");

            $query->bindValue(':name', $name, PDO::PARAM_STR);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->bindValue(':message', $message, PDO::PARAM_STR);
            $query->execute();
            $query->closeCursor();

            return true;

        } catch (Exception $e) {
            return false;
        }
    }
}