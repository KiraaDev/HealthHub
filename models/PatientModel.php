<?php
include_once './config/database.php';

class PatientModel {

    private $db;
    
    public function __construct(){
        $database = new Database();
        $this->db = $database->connectDB();
    }

    public function findOrCreatePatient($name, $email, $phone){

        if($stmt = $this->db->prepare("SELECT patientID FROM Patients WHERE phone = ?")){

            $stmt->bind_param('s', $phone);
            $stmt->execute();
            $result = $stmt->get_result();
            $patient = $result->fetch_assoc();
    
            if($patient){
                return $patient['patientID']; 
            }

            $stmt->close();
        }


         $stmt = $this->db->prepare("INSERT INTO Patients (name, email, phone) VALUES (?, ?, ?)");
         $stmt->bind_param('sss', $name, $email, $phone);
         $stmt->execute();
         $result = $stmt->get_result();

         $newPatientId = $this->db->insert_id;

         $stmt->close();

         return $newPatientId;
    }
}