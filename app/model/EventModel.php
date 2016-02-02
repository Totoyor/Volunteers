<?php

Class EventModel extends AppModel
{
    /**
     * @param $event_name
     * @param $event_location
     * @param $event_start
     * @param $event_hour_start
     * @param $event_end
     * @param $event_hour_end
     * @param $event_description
     * @param $status
     * @param $user
     * @return bool|string
     */
    public function createEvent($event_name, $event_location, $event_start, $event_hour_start, $event_end,
                                $event_hour_end, $event_description, $status, $user)
    {
        try {
            $query = $this->connexion->prepare("INSERT INTO vol_events
                                        (nameEvent, startEvent, hourStartEvent, endEvent, hourEndEvent,
                                        locationEvent, descriptionEvent, vol_event_status_idEventStatus, vol_users_idUser)
                                        VALUES (:name, :start, :hourStart, :end, :hourEnd,
                                        :location, :description, :status, :user)");

            $query->bindValue(':name', $event_name, PDO::PARAM_STR);
            $query->bindValue(':location', $event_location, PDO::PARAM_STR);
            $query->bindValue(':start', $event_start, PDO::PARAM_STR);
            $query->bindValue(':hourStart', $event_hour_start, PDO::PARAM_STR);
            $query->bindValue(':end', $event_end, PDO::PARAM_STR);
            $query->bindValue(':hourEnd', $event_hour_end, PDO::PARAM_STR);
            $query->bindValue(':description', $event_description, PDO::PARAM_STR);
            $query->bindValue(':status', $status, PDO::PARAM_STR);
            $query->bindValue(':user', $user, PDO::PARAM_STR);
            $query->execute();
            $query->closeCursor();

            //On récupère l'id de l'insertion
            $lastId = $this->connexion->lastInsertId();

            return $lastId;
            //return true;

        } catch (Exception $e) {
            return false;
        }
    }

    public function editEvent($event_name, $event_location, $event_start, $event_hour_start, $event_end,
                              $event_hour_end, $event_description, $status, $user, $idEvent)
    {
        try {
            $query = $this->connexion->prepare("UPDATE vol_events SET
                                                nameEvent = :name,
                                                startEvent = :start,
                                                hourStartEvent = :hourStart,
                                                endEvent = :end,
                                                hourEndEvent = :hourEnd,
                                                locationEvent = :location,
                                                descriptionEvent = :description,
                                                vol_event_status_idEventStatus = :status,
                                                vol_users_idUser = :user
                                                WHERE idEvent = :idEvent");

            $query->bindValue(':name', $event_name, PDO::PARAM_STR);
            $query->bindValue(':location', $event_location, PDO::PARAM_STR);
            $query->bindValue(':start', $event_start, PDO::PARAM_STR);
            $query->bindValue(':hourStart', $event_hour_start, PDO::PARAM_STR);
            $query->bindValue(':end', $event_end, PDO::PARAM_STR);
            $query->bindValue(':hourEnd', $event_hour_end, PDO::PARAM_STR);
            $query->bindValue(':description', $event_description, PDO::PARAM_STR);
            $query->bindValue(':status', $status, PDO::PARAM_STR);
            $query->bindValue(':user', $user, PDO::PARAM_STR);
            $query->bindValue(':idEvent', $idEvent, PDO::PARAM_INT);
            $query->execute();
            $query->closeCursor();

            //On récupère l'id de l'insertion
            //$lastId = $this->connexion->lastInsertId();

            //return $lastId;
            return true;

        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @return array|bool
     */
    public function getCategories()
    {
        try {
            $query = $this->connexion->prepare("SELECT * FROM vol_events_categories");
            $query->execute();

            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            $query->closeCursor();
            return $data;

        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function getEvent($id)
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
            LEFT JOIN vol_event_questions
            ON vol_events.idEvent = vol_event_questions.vol_events_idEvent
            LEFT JOIN vol_users
            ON vol_events.vol_users_idUser = vol_users.idUser
            WHERE vol_events.idEvent = :id
            AND vol_events.vol_event_status_idEventStatus = :status
            OR vol_events.vol_event_status_idEventStatus = :premium
            GROUP BY idEvent
            ");

            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->bindValue(':status', 1, PDO::PARAM_INT);
            $query->bindValue(':premium', 2, PDO::PARAM_INT);
            $query->execute();

            $data = $query->fetch(PDO::FETCH_ASSOC);
            $query->closeCursor();
            return $data;

        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Récupère les informations d'un évènement sauvegarder
     * @param $id
     * @return bool|mixed
     */
    public function getEventForUpdate($id)
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
            LEFT JOIN vol_event_questions
            ON vol_events.idEvent = vol_event_questions.vol_events_idEvent
            LEFT JOIN vol_users
            ON vol_events.vol_users_idUser = vol_users.idUser
            WHERE vol_events.idEvent = :id
            GROUP BY idEvent
            ");

            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();

            $data = $query->fetch(PDO::FETCH_ASSOC);
            $query->closeCursor();
            return $data;

        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @return array|bool
     */
    public function getEvents()
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
            GROUP BY idEvent
            ");

            $query->bindValue(':status', 1, PDO::PARAM_INT);
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            $query->closeCursor();

            return $data;

        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @param $idCategory
     * @param $idEvent
     * @return bool
     */
    public function insertCategories($idCategory, $idEvent)
    {
        try {
            $query = $this->connexion->prepare("INSERT INTO vol_events_categories_has_vol_events
            (vol_events_categories_idCategorie, vol_events_idEvent) VALUES
            (:idCategory, :idEvent)");

            $query->bindValue(':idCategory', $idCategory, PDO::PARAM_INT);
            $query->bindValue(':idEvent', $idEvent, PDO::PARAM_INT);

            $query->execute();

            return true;

        } catch (Exception $e) {
            return false;
        }
    }

    public function editCategories($idCategory, $idEvent)
    {
        try {
            $query = $this->connexion->prepare("UPDATE vol_events_categories_has_vol_events SET
                                                vol_events_categories_idCategorie = :idCategory,
                                                vol_events_idEvent = :idEvent
                                                WHERE vol_events_idEvent = :idEvent");


            $query->bindValue(':idCategory', $idCategory, PDO::PARAM_INT);
            $query->bindValue(':idEvent', $idEvent, PDO::PARAM_INT);

            $query->execute();

            return true;

        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @param $idEvent
     * @param $missions
     * @param $nbVolunteer
     * @return bool
     */
    public function insertMissions($idEvent, $missions, $nbVolunteer)
    {
        try {
            $query = $this->connexion->prepare("INSERT INTO vol_event_missions
            (missionName, nbVolunteer, vol_events_idEvent) VALUES
            (:mission, :nbVol, :idEvent)");

            $query->bindValue(':mission', $missions, PDO::PARAM_STR);
            $query->bindValue(':nbVol', $nbVolunteer, PDO::PARAM_INT);
            $query->bindValue(':idEvent', $idEvent, PDO::PARAM_INT);

            $query->execute();

            return true;

        } catch (Exception $e) {
            return false;
        }
    }

    public function editMissions($idEvent, $missions, $nbVolunteer, $idMission)
    {
        try {
            $query = $this->connexion->prepare("UPDATE vol_event_missions SET
                                                missionName = :mission,
                                                nbVolunteer = :nbVol,
                                                vol_events_idEvent = :idEvent
                                                WHERE vol_events_idEvent = :idEvent
                                                AND idEventMission = :idMission");

            $query->bindValue(':mission', $missions, PDO::PARAM_STR);
            $query->bindValue(':nbVol', $nbVolunteer, PDO::PARAM_INT);
            $query->bindValue(':idEvent', $idEvent, PDO::PARAM_INT);
            $query->bindValue(':idMission', $idMission, PDO::PARAM_INT);

            $query->execute();

            return true;

        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @param $idEvent
     * @return array|bool
     */
    public function getMissions($idEvent)
    {
        try {
            $query = $this->connexion->prepare("SELECT * FROM vol_event_missions
            WHERE vol_events_idEvent = :id");

            $query->bindValue(':id', $idEvent, PDO::PARAM_INT);
            $query->execute();

            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            $query->closeCursor();

            return $data;

        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @param $idEvent
     * @return array|bool
     */
    public function getQuestions($idEvent)
    {
        try{

            $query = $this->connexion->prepare("SELECT * FROM vol_event_questions
            LEFT JOIN vol_events_answers
            ON vol_event_questions.idEventQuestions = vol_events_answers.vol_event_questions_idEventQuestions
            LEFT JOIN vol_users
            ON vol_event_questions.vol_users_idUser = vol_users.idUser
            WHERE vol_events_idEvent = :id");

            $query->bindValue(':id', $idEvent, PDO::PARAM_INT);
            $query->execute();

            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            $query->closeCursor();

            return $data;

        } catch (Exception $e) {
            die($e);
            return false;
        }
    }

    /**
     * @param $idEvent
     * @return array|bool
     */
    public function getNbVolunteers($idEvent)
    {
        try {
            $query = $this->connexion->prepare("SELECT SUM(nbVolunteer)
            FROM vol_event_missions
            WHERE vol_events_idEvent = :id");

            $query->bindValue(':id', $idEvent, PDO::PARAM_INT);
            $query->execute();

            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            $query->closeCursor();

            return $data;

        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @param $idEvent
     * @return array|bool
     */
    public function getMedias($idEvent) {
        try {
            $query = $this->connexion->prepare("SELECT *
            FROM vol_event_pictures
            WHERE vol_events_idEvent = :id");

            $query->bindValue(':id', $idEvent, PDO::PARAM_INT);
            $query->execute();

            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            $query->closeCursor();

            return $data;

        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @param $idEvent
     * @return array|bool
     */
    public function getVolunteers($idEvent) {
        try {

            $query = $this->connexion->prepare("SELECT *
            FROM event_has_volunteers
            LEFT JOIN vol_users
            ON event_has_volunteers.vol_event_volunteers_idEventVolunteer = vol_users.idUser
            WHERE event_has_volunteers.vol_events_idEvent = :idEvent
            GROUP BY idUser
            ");

            $query->bindValue(':idEvent', $idEvent, PDO::PARAM_INT);
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_ASSOC);

            $query->closeCursor();

            return $data;

        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @param $idEvent
     * @param $coverPicture
     * @return bool
     */
    public function insertCoverPicture($idEvent, $coverPicture)
    {
        try {
            $query = $this->connexion->prepare("UPDATE vol_events
            SET coverPicture = :cover
            WHERE idEvent = :idEvent");

            $query->bindValue(':cover', $coverPicture, PDO::PARAM_STR);
            $query->bindValue(':idEvent', $idEvent, PDO::PARAM_INT);

            $query->execute();

            return true;

        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @param $idEvent
     * @param $media
     * @return bool
     */
    public function insertMediaPicture($idEvent, $media)
    {
        try {
            $query = $this->connexion->prepare("INSERT INTO vol_event_pictures
             (eventPicture, vol_events_idEvent) VALUES (:media, :idEvent)");

            $query->bindValue(':media', $media, PDO::PARAM_INT);
            $query->bindValue(':idEvent', $idEvent, PDO::PARAM_INT);

            $query->execute();

            return true;

        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @param $recherche
     * @return array|bool
     */
    public function search($recherche)
    {
        try
        {
            $query = $this->connexion->prepare("SELECT * FROM vol_events
                                                LEFT JOIN vol_event_pictures
                                                ON vol_events.idEvent = vol_event_pictures.vol_events_idEvent
                                                LEFT JOIN vol_event_missions
                                                ON vol_events.idEvent = vol_event_missions.vol_events_idEvent
                                                LEFT JOIN vol_events_categories_has_vol_events
                                                ON vol_events.idEvent = vol_events_categories_has_vol_events.vol_events_idEvent
                                                LEFT JOIN vol_events_categories
                                                ON vol_events_categories_has_vol_events.vol_events_categories_idCategorie = vol_events_categories.idCategorie
                                                WHERE vol_events.vol_event_status_idEventStatus = :status
                                                AND vol_events.nameEvent LIKE '%$recherche%'
                                                OR vol_events.locationEvent LIKE '%$recherche%'
                                                OR vol_events.startEvent LIKE '%$recherche%'
                                                OR vol_events_categories.nameCategorie LIKE '%$recherche%'
                                                GROUP BY idEvent ");

            $query->bindValue(':status', 1, PDO::PARAM_INT);
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            $query->closeCursor();

            return $data;
        }
        catch (Exception $e)
        {
            return false;
        }
    }

    /**
     * @param $user
     * @param $event
     * @param $question
     * @return bool
     */
    public function insertQuestions($user, $event, $question) {
        try {
            $query = $this->connexion->prepare("INSERT INTO vol_event_questions
                                                (eventQuestion, vol_events_idEvent, vol_users_idUser)
                                                VALUES (:question, :event, :user)");

            $query->bindValue(':question', $question, PDO::PARAM_STR);
            $query->bindValue(':event', $event, PDO::PARAM_INT);
            $query->bindValue(':user', $user, PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @param $user
     * @param $question
     * @param $answer
     * @return bool
     */
    public function insertAnswer($user, $question, $answer) {
        try {
            $query = $this->connexion->prepare("INSERT INTO vol_events_answers
                                                (eventAnswer, vol_event_questions_idEventQuestions, vol_users_idUser)
                                                VALUES (:answer, :question , :user)");

            $query->bindValue(':answer', $answer, PDO::PARAM_STR);
            $query->bindValue(':question', $question, PDO::PARAM_INT);
            $query->bindValue(':user', $user, PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @param $category
     * @param $date
     * @return array|bool
     */
    public function sortEvents($category, $date) {
        try
        {
            $query = "SELECT * FROM vol_events
                        LEFT JOIN vol_event_pictures
                        ON vol_events.idEvent = vol_event_pictures.vol_events_idEvent
                        LEFT JOIN vol_event_missions
                        ON vol_events.idEvent = vol_event_missions.vol_events_idEvent
                        LEFT JOIN vol_events_categories_has_vol_events
                        ON vol_events.idEvent = vol_events_categories_has_vol_events.vol_events_idEvent
                        LEFT JOIN vol_events_categories
                        ON vol_events_categories_has_vol_events.vol_events_categories_idCategorie = vol_events_categories.idCategorie
                        WHERE vol_events.vol_event_status_idEventStatus = 1
                        ";

            if ($category !== '') {
                $query .= "AND vol_events_categories.nameCategorie = '".$category."'";
            }

            if ($date !== '') {
                $query .= " AND vol_events.startEvent = '".$date."'";
            }

            $query .= " GROUP BY idEvent";


            $cursor = $this->connexion->query($query);

            $data = $cursor->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        }
        catch (Exception $e)
        {
            return false;
        }
    }

    public function hireVolunteers($idEvent, $volunteer)
    {
        try {
            $query = $this->connexion->prepare("UPDATE event_has_volunteers SET
                                                vol_event_volunteer_status = :status
                                                WHERE vol_events_idEvent = :idEvent
                                                AND vol_event_volunteers_idEventVolunteer = :volunteer");

            $query->bindValue(':status', 1, PDO::PARAM_INT);
            $query->bindValue(':idEvent', $idEvent, PDO::PARAM_INT);
            $query->bindValue(':volunteer', $volunteer, PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            return true;

        } catch (Exception $e) {
            return false;
        }
    }

    public function hireSession($idEvent)
    {
        try {
            $query = $this->connexion->prepare("UPDATE vol_events SET
                                                hireSession = :status
                                                WHERE idEvent = :idEvent");

            $query->bindValue(':status', 1, PDO::PARAM_INT);
            $query->bindValue(':idEvent', $idEvent, PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            return true;

        } catch (Exception $e) {
            return false;
        }
    }

}