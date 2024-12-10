<?php

include_once './models/PatientModel.php';
include_once './models/AppointmentModel.php';

class AppointmentController {

    private $patientModel;
    private $appointmentModel;

    public function __construct(){
        $this->patientModel = new PatientModel();
        $this->appointmentModel = new AppointmentModel();
    }

    public function showAppointment($error = "", $input = [], $success = ""){
        require './views/appointment.php';
    }


    public function submitForm(){
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            // Sanitize and validate user input
            $name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);
            $phone = filter_var($_POST['phone'], FILTER_SANITIZE_SPECIAL_CHARS);
            $appointment_date = $_POST['appointment_date'];
            $department = filter_var($_POST['department'], FILTER_SANITIZE_SPECIAL_CHARS);
            $message = filter_var($_POST['message'], FILTER_SANITIZE_SPECIAL_CHARS);

            $input = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'appointment_date' => $appointment_date,
                'department' => $department,
            ];

            // Validate required fields
            if (empty($name) || empty($phone) || empty($appointment_date) || empty($email) || empty($department) || empty($message)) {
                $errorMessage =  "All fields are required!";
                $this->showAppointment($errorMessage, $input);
                return;
            }

            $patientID = $this->patientModel->findOrCreatePatient($name, $email, $phone);

            $result = $this->appointmentModel->createAppointment($patientID, $appointment_date, $department);

            if(!$result){
                $error = "Error in submitting appointment.";
                return $this->showAppointment($error, [], "");
            } 

            $success = "Appointment successfully submitted! We will send an email for you";
            return $this->showAppointment("", [], $success);

        } else {
            $this->showAppointment();
        }

    }

}
