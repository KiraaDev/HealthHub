<?php
include_once './config/database.php';

class AppointmentModel {

    private $db;
    
    public function __construct(){
        $database = new Database();
        $this->db = $database->connectDB();
    }

    public function createAppointment($patientID, $appointment_date, $department){
        
        $stmt = $this->db->prepare("INSERT INTO Appointments (patientID, appointment_date, department) VALUES (?, ?, ?)");

        $stmt->bind_param('iss', $patientID, $appointment_date, $department);
        if (!$stmt->execute()) {
            $stmt->close();
            return false;
        }
        
        $stmt->close();
        return true;
    }

}