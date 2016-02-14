<?php

class ProfileModel extends AppModel
{
    /** Modèle de récupération du profil de l'utilisateur
     * @param $id
     * @return mixed
     */
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

    /** Modèle de modification des informations de l'utilisateur
     * @param $id
     * @param $first_name
     * @param $last_name
     * @param $birth_date
     * @param $email
     * @param $location
     * @param $description
     * @param $skills
     * @param $school
     * @param $work
     * @param $idpicture
     * @return bool
     */
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

    /** Modèle d'insertion de la photo de profil de l'utilisateur
     * @param $imageUser
     * @return string
     */
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

    /** Modèle de sélection des évènements propres à un utilisateur
     * @param $idUser
     * @return array|bool
     */
    public function selectEventsUserPublished($idUser)
    {
        try {
            $query = $this->connexion->prepare("SELECT *
            FROM vol_events
            LEFT JOIN vol_event_pictures
            ON vol_events.idEvent = vol_event_pictures.vol_events_idEvent
            LEFT JOIN vol_event_missions
            ON vol_events.idEvent = vol_event_missions.vol_events_idEvent
            LEFT JOIN vol_events_categories_has_vol_events
            ON vol_events.idEvent = vol_events_categories_has_vol_events.vol_events_idEvent
            LEFT JOIN vol_events_categories
            ON vol_events_categories_has_vol_events.vol_events_categories_idCategorie = vol_events_categories.idCategorie
            WHERE vol_events.vol_event_status_idEventStatus = :status
            AND vol_events.vol_users_idUser = :id
            GROUP BY idEvent
            ");

            $query->bindValue(':status', 1, PDO::PARAM_INT);
            $query->bindValue(':id', $idUser, PDO::PARAM_INT);
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            $query->closeCursor();

            return $data;

        } catch (Exception $e) {
            return false;
        }
    }

    /** Modèle d'affichage des évenements sauvegardés de l'utilisateur
     * @param $idUser
     * @return array|bool
     */
    public function selectEventsUserSaved($idUser)
    {
        try {
            $query = $this->connexion->prepare("SELECT *
            FROM vol_events
            LEFT JOIN vol_event_pictures
            ON vol_events.idEvent = vol_event_pictures.vol_events_idEvent
            LEFT JOIN vol_event_missions
            ON vol_events.idEvent = vol_event_missions.vol_events_idEvent
            LEFT JOIN vol_events_categories_has_vol_events
            ON vol_events.idEvent = vol_events_categories_has_vol_events.vol_events_idEvent
            LEFT JOIN vol_events_categories
            ON vol_events_categories_has_vol_events.vol_events_categories_idCategorie = vol_events_categories.idCategorie
            WHERE vol_events.vol_event_status_idEventStatus = :status
            AND vol_events.vol_users_idUser = :id
            GROUP BY idEvent
            ");

            $query->bindValue(':status', 0, PDO::PARAM_INT);
            $query->bindValue(':id', $idUser, PDO::PARAM_INT);
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            $query->closeCursor();

            return $data;

        } catch (Exception $e) {
            return false;
        }
    }

    /** Modèle d'affichage des missions de l'utilisateur dans sa page profil
     * @param $idUser
     * @param $status
     * @return array|bool
     */
    public function getUserMissions($idUser, $status)
    {
        try {
            $query = $this->connexion->prepare("SELECT *
            FROM vol_events
            LEFT JOIN event_has_volunteers
            ON vol_events.idEvent = event_has_volunteers.vol_events_idEvent
            LEFT JOIN vol_event_missions
            ON vol_events.idEVent = vol_event_missions.vol_events_idEvent
            WHERE event_has_volunteers.vol_event_volunteers_idEventVolunteer = :user
            AND event_has_volunteers.vol_event_volunteer_status = :status
            GROUP BY idEvent
            ");

            $query->bindValue(':user', $idUser, PDO::PARAM_INT);
            $query->bindValue(':status', $status, PDO::PARAM_INT);
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            $query->closeCursor();

            return $data;

        } catch (Exception $e) {
            return false;
        }
    }

    /** Modèle d'insertion d'un commentaire sur un profil utilisateur
     * @param $idVolunteer
     * @param $idUser
     * @param $comment
     * @return bool
     */
    public function insertComment($idVolunteer, $idUser, $comment)
    {
        try {
            $query = $this->connexion->prepare("INSERT INTO vol_users_review
            (review, vol_event_volunteers_idEventVolunteer, id_user_review) VALUES
            (:comment, :idVolunteer, :idUser)");

            $query->bindValue(':idVolunteer', $idVolunteer, PDO::PARAM_INT);
            $query->bindValue(':comment', $comment, PDO::PARAM_STR);
            $query->bindValue(':idUser', $idUser, PDO::PARAM_INT);

            $query->execute();

            return true;

        } catch (Exception $e) {
            return false;
        }
    }

    /** Modèle d'affichage des commentaire des utiisateur sur son profil
     * @param $idVolunteer
     * @return array|bool
     */
    public function getReview($idVolunteer)
    {
        try {
            $query = $this->connexion->prepare("SELECT * FROM vol_users_review
            LEFT JOIN vol_users
            ON vol_users_review.id_user_review = vol_users.idUser
            WHERE vol_event_volunteers_idEventVolunteer = :idVolunteer");

            $query->bindValue(':idVolunteer', $idVolunteer, PDO::PARAM_INT);

            $query->execute();

            $data = $query->fetchAll(PDO::FETCH_ASSOC);

            $query->closeCursor();

            return $data;

        } catch (Exception $e) {
            return false;
        }
    }

    /** Modèle de notation de l'utilisateur
     * @param $idVolunteer
     * @param $idUser
     * @param $rate
     * @return bool
     */
    public function insertRate($idVolunteer, $idUser, $rate)
    {
        try {
            $query = $this->connexion->prepare("INSERT INTO vol_users_rating
            (rating, vol_event_volunteers_idEventVolunteer, id_user_rating) VALUES
            (:rate, :idVolunteer, :idUser)");

            $query->bindValue(':idVolunteer', $idVolunteer, PDO::PARAM_INT);
            $query->bindValue(':rate', $rate, PDO::PARAM_STR);
            $query->bindValue(':idUser', $idUser, PDO::PARAM_INT);

            $query->execute();

            return true;

        } catch (Exception $e) {
            return false;
        }
    }

    /** Modèle pour récupérer la note moyenne de l'utilisateur
     * @param $idVolunteer
     * @return array|bool
     */
    public function getAverage($idVolunteer)
    {
        try {
            $query = $this->connexion->prepare("SELECT AVG(rating) FROM vol_users_rating
            WHERE vol_event_volunteers_idEventVolunteer = :idVolunteer
            GROUP BY vol_event_volunteers_idEventVolunteer");

            $query->bindValue(':idVolunteer', $idVolunteer, PDO::PARAM_INT);

            $query->execute();

            $data = $query->fetchAll(PDO::FETCH_ASSOC);

            $query->closeCursor();

            return $data;

        } catch (Exception $e) {
            return false;
        }
    }
}