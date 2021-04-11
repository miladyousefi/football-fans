<?php

function get_all_leage_play($id,$fetch_assoc=false){
include('../../Database/connect_db.php');
$sql="SELECT * FROM leage_play WHERE id='$id'";
$result=mysqli_query($conn,$sql);
    if ($fetch_assoc) {
    return mysqli_fetch_assoc($result);
    }else{
        return $result;
    }
}
function get_all_forecast_by_userid($user_id,$fetch_assoc=false){
    include('../../Database/connect_db.php');
    $sql="SELECT * FROM forecast WHERE user_id='$user_id'";
    $result=mysqli_query($conn,$sql);
        if ($fetch_assoc) {
        return mysqli_fetch_assoc($result);
        }else{
            return $result;
        }
}
function get_all_forecast_by_matchid($match_id,$fetch_assoc=false){
        include('../../Database/connect_db.php');
        $sql="SELECT * FROM forecast WHERE match_id='$match_id'";
        $result=mysqli_query($conn,$sql);
            if ($fetch_assoc) {
            return mysqli_fetch_assoc($result);
            }else{
                return $result;
            }
} 
function get_user($id,$fetch_assoc=false){
include('../../Database/connect_db.php');
    $sql="SELECT * FROM card_fans WHERE id='$id'";
    $result=mysqli_query($conn,$sql);
        if ($fetch_assoc) {
        return mysqli_fetch_assoc($result);
        }else{
            return $result;
        }
    }
