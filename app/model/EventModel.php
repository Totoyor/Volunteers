<?php

Class EventModel extends AppModel
{
    public function createEvent($event_name, $event_location, $event_start, $event_hour_start, $event_end,
                                $event_hour_end, $event_description, $status)
    {
        try {
            $query = $this->connexion->prepare("INSERT INTO vol_events
                                        (nameEvent, startEvent, hourStartEvent, endEvent, hourEndEvent,
                                        locationEvent, descriptionEvent, statusEvent)
                                        VALUES (:name, :start, :hourStart, :end, :hourEnd,
                                        :location, :description, :status)");

            $query->bindValue(':name', $event_name, PDO::PARAM_STR);
            $query->bindValue(':location', $event_location, PDO::PARAM_STR);
            $query->bindValue(':start', $event_start, PDO::PARAM_STR);
            $query->bindValue(':hourStart', $event_hour_start, PDO::PARAM_STR);
            $query->bindValue(':end', $event_end, PDO::PARAM_STR);
            $query->bindValue(':hourEnd', $event_hour_end, PDO::PARAM_STR);
            $query->bindValue(':description', $event_description, PDO::PARAM_STR);
            $query->bindValue(':status', $status, PDO::PARAM_STR);
            $query->execute();
            $query->closeCursor();

            $lastId = $this->connexion->lastInsertId();

            return $lastId;
            //return true;

        } catch (Exception $e) {
            return false;
        }
    }

    public function getCategories()
    {
        try {
            $query = $this->connexion->prepare("SELECT * FROM vol_events_categories");
            $query->execute();

            $data = $query->fetchAll();
            $query->closeCursor();
            return $data;

        } catch (Exception $e) {
            return false;
        }
    }

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
            LEFT JOIN vol_event_questions
            ON vol_events.idEvent = vol_event_questions.vol_events_idEvent
            WHERE vol_events.idEvent = :id
            GROUP BY idEvent
            ");

            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();

            $data = $query->fetchAll();
            $query->closeCursor();
            return $data;


        } catch (Exception $e) {
            var_dump($e);
            die();
            return false;
        }
    }

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
            GROUP BY idEvent
            ");
            $query->execute();

            $data = $query->fetchAll();
            $query->closeCursor();
            return $data;

        } catch (Exception $e) {
            echo $e;
            die();
            return false;
        }
    }

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

    public function insertCoverPicture($idEvent, $coverPicture)
    {
        try {
            $query = $this->connexion->prepare("INSERT INTO vol_event_pictures
            (coverPicture, vol_events_idEvent) VALUES
            (:cover, :idEvent)");

            $query->bindValue(':cover', $coverPicture, PDO::PARAM_STR);
            $query->bindValue(':idEvent', $idEvent, PDO::PARAM_INT);

            $query->execute();

            return true;

        } catch (Exception $e) {
            return false;
        }
    }
}