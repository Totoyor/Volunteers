<?php

Class EventModel extends AppModel
{
    public function create_event($event_name, $event_location, $event_start, $event_hour_start, $event_end,
                                 $event_hour_end, $event_description, $status)
    {
        try {

            $query = $this->pdo->prepare("INSERT INTO vol_events
                                        (nameEvent, locationEvent, startEvent, hourStartEvent, endEvent, hourEndEvent,
                                        descriptionEvent, statusEvent)
                                        VALUES (:name, :location, :start, :hourStart, :end, :hourEnd,
                                        :description, :status)");

            $query->bindValue(':name', $event_name, PDO::PARAM_STR);
            $query->bindValue(':location', $event_location, PDO::PARAM_STR);
            $query->bindValue(':start', $event_start, PDO::PARAM_STR);
            $query->bindValue(':hourStart', $event_hour_start, PDO::PARAM_STR);
            $query->bindValue(':end', $event_end, PDO::PARAM_STR);
            $query->bindValue(':hourEnd', $event_hour_end, PDO::PARAM_STR);
            $query->bindValue(':description', $event_description, PDO::PARAM_STR);
            $query->bindValue(':status', $status, PDO::PARAM_STR);

            $query->execute();

            return true;

        } catch (Exception $e) {
            return false;
        }
    }
}