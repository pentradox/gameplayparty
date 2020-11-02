<?php
class Reserve
{
    private $database;
    public function __construct()
    {
        $this->database = new Database;
    }

    public function getReservation($hall, $time)
    {
        $query = "SELECT * FROM hall_times WHERE id=:id";
        $this->database->prepare($query);
        $this->database->bind(":id", $time);
        $data["time"] = $this->database->getRow();

        switch ($data["time"]->time_area) {
            case '1':
                $data["time"]->time_area = "08:00 - 10:00";
                break;
            case '2':
                $data["time"]->time_area = "12:00 - 14:00";
                break;
            case '3':
                $data["time"]->time_area = "14:00 - 16:00";
                break;
        }

        $query = "SELECT * FROM packages WHERE active > 0";
        $this->database->prepare($query);
        $data["packages"] = $this->database->getArray();

        return $data;
    }

    public function reservation()
    {
        $first = $_POST["first"];
        $last = $_POST["last"];
        $mail = $_POST["mail"];
        $date = $_POST["date"];
        $time_area = $_POST["time_area"];

        $time_id = $_POST["time_id"];
        $query = "UPDATE hall_times SET reserved=1 WHERE id=:id";
        $this->database->prepare($query);
        $this->database->bind(":id", $time_id);
        $this->database->execute();

        $package_id = $_POST["packet"];
        $query = "SELECT * FROM packages WHERE id=:id";
        $this->database->prepare($query);
        $this->database->bind(":id", $package_id);
        $package = $this->database->getRow();

        $query = "INSERT INTO reservations (first_name, last_name, mail, date, time_area, package_name, package_price) VALUES (:first, :last, :mail, :date, :time_area, :package_name, :package_price)";
        $this->database->prepare($query);
        $this->database->bind(":first", $first);
        $this->database->bind(":last", $last);
        $this->database->bind(":mail", $mail);
        $this->database->bind(":date", $date);
        $this->database->bind(":time_area", $time_area);
        $this->database->bind(":package_name", $package->name);
        $this->database->bind(":package_price", $package->price);
        $this->database->execute();
        return;
    }
}
