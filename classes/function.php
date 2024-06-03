<?php
require_once __DIR__ . '/User.php';

function is_logged_in()
{
    start_session();
    return (isset($_SESSION['userDetails']));
}
function start_session()
{
    $id = session_id();
    if ($id === "") {
        session_start();
    }
}
function get_unbooked_slots($booked_slots){
    // Set the time range for the day (9:00 AM to 5:00 PM)
$start_time = strtotime('9:00 AM');
$end_time = strtotime('5:00 PM');

// Generate unbooked time slots
$appointment_length = 60; // In minutes
$current_time = $start_time;
$unbooked_slots = array();

while ($current_time < $end_time) {
    // Check if the current time slot is booked
    if (!in_array($current_time, $booked_slots)) {
        // Set the start and end time of the unbooked range
        $unbooked_start = $current_time;
        $unbooked_end = $current_time + ($appointment_length * 60);
        
        // Check if the end time falls within the time range
        if ($unbooked_end <= $end_time) {
            // Add unbooked time range to the list
            $unbooked_slots[] = date('g:i A', $unbooked_start) . ' - ' . date('g:i A', $unbooked_end);
        }
    }
    
    // Increment current time by the appointment length
    $current_time += ($appointment_length * 60);
}

    return $unbooked_slots;
}
?>