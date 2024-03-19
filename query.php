<?php
include "includes/connect.php";
class Query
{
    public function execute($id)
    {
        if (method_exists($this, $id)) {
            $this->$id();
        } else {
            $data['data'] = "Function $id does not exist.";
            echo json_encode($data);
        }
    }

    private function addEvent()
    {
        global $con;
        $add = "INSERT INTO events(title, description, start_date, end_date) VALUES('$_POST[title]', '$_POST[description]', '$_POST[start_date]', '$_POST[end_date]')";
        if($con->query($add)){
            $data['data'] = "success";
        }else{
            $data['data'] = "error";
        }
        echo json_encode($data);
    }
    
    private function getEvents()
    {
        global $con;
        $get = "SELECT * FROM events WHERE deleted = '0'";
        if($events = $con->query($get)){
            $data = $events->fetchAll();
        }else{
            $data[] = "error";
        }
        echo json_encode($data);
    }

    private function updateEvent()
    {
        global $con;
        $update = "UPDATE events SET title = '$_POST[title]', description = '$_POST[description]', start_date = '$_POST[start_date]', end_date = '$_POST[end_date]' WHERE id = '$_POST[eventId]'";
        if($con->query($update)){
            $data['data'] = "success";
        }else{
            $data['data'] = "error";
        }
        echo json_encode($data);
    }
    private function deleteEvent()
    {
        global $con;
        $delete = "UPDATE events SET deleted = 1 WHERE id = '$_POST[id]'";
        if($con->query($delete)){
            $data = "success";
        }else{
            $data = "error";
        }
        echo json_encode($data);
    }
}

if(isset($_GET['id'])){
    $query = new Query();
    echo $query->execute($_GET['id']);

}