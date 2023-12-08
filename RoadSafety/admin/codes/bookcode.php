<?php

include('../../config/app.php');
include_once('../controller/BookController.php');


if(isset($_POST['delete']))
{
    $id = validateInput($db->conn, $_POST['delete']);
    $book = new BookController;
    $result = $book->delete($id);
    if($result){
        redirect("Accident Deleted Successfully","admin/add_book.php");

    }else{
        redirect("Something Went Wrong","admin/add_book.php");

    }
}

if(isset($_POST['update_book']))
{
    $id = validateInput($db->conn,$_POST['book_id']);
    $inputdata = [

        'mode' => validateInput($db->conn,$_POST['mode']),
        'casualty' => validateInput($db->conn,$_POST['casualty']),
        'minor' => validateInput($db->conn,$_POST['minor']),
        'major' => validateInput($db->conn,$_POST['major']),
        'dateof' => validateInput($db->conn,$_POST['dateof']),
    
    ];

    $book = new BookController;
    $result = $book->update($inputdata, $id);
    if($result){
        redirect("Accident Updated Successfully","admin/add_book.php");

    }else{
        redirect("Something Went Wrong","admin/viewbooks.php");

    }
}

if(isset($_POST['submit']))
{
    $inputdata = [

    'mode' => validateInput($db->conn,$_POST['mode']),
    'casualty' => validateInput($db->conn,$_POST['casualty']),
    'minor' => validateInput($db->conn,$_POST['minor']),
    'major' => validateInput($db->conn,$_POST['major']),
    'dateof' => validateInput($db->conn,$_POST['dateof']),

    ];
    
    $book = new BookController;
    $result = $book->create($inputdata);
    if($result){
        redirect("Accident Added Successfully","admin/viewbooks.php");
    }else{
        redirect("Something Went wrong","admin/add_book.php");

    }
}


?>