<?php


function checkPermission($permissions){
    $userAccess = getMyPermission(auth()->user()->is_permission);
    foreach ($permissions as $key => $value) {
        if($value == $userAccess){
            return true;
        }
    }
    return false;
}


function getMyPermission($id)
{
    switch ($id) {
        case 1:
            return 'vice_chancellor';
            break;
        case 2:
            return 'registrar';
            break;
        case 3:
            return 'assistant_registrar_of_the_faculty';
            break;
        case 4:
            return 'student_affairs_division_clerk';
            break;
        case 5:
            return 'finance_division_clerk';
            break;
        default:
            return 'student';
            break;
    }
}


?>
