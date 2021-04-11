<?php
session_start();
error_reporting(E_ALL); // or E_STRICT
ini_set("display_errors",1);
ini_set("memory_limit","1024M");
include('../../Database/connect_db.php');

    $host_id=$_POST['host_id'];
    $guest_id=$_POST['guest_id'];
    $host_result=$_POST['result_1'];
    $guest_result=$_POST['result_2'];
    $match_id=$_POST['match_id'];

    // ser soccder for User 
    $result_soccer=mysqli_query($conn,"SELECT * FROM forecast WHERE match_id='$match_id'");
    $row_soccer=mysqli_fetch_assoc($result_soccer);
    if($host_result==$row_soccer['forecast_host'] and $guest_result==$row_soccer['forecast_guest']){
        $update_query_soccer=mysqli_query($conn,"UPDATE card_fans SET soccer=soccer+10 WHERE id='$row_soccer[user_id]'");
        $update_forecast=mysqli_query($conn,"UPDATE forecast SET status=1 WHERE match_id='$match_id'");

    }
    // set played 
    $update_forecast=mysqli_query($conn,"UPDATE leage_play SET played=1 WHERE id='$match_id'");

if($host_result > $guest_result){
    
    $sql_query="SELECT goal_hit,goal_eaten,games_played,score,season FROM league WHERE team_id='$host_id'";
    $result_query=mysqli_query($conn,$sql_query);
    $row_query=mysqli_fetch_assoc($result_query);
    if ($row_query==NULL) {
        $row_query['goal_hit']=0;
        $row_query['goal_eaten']=0;
        $row_query['games_played']=0;
        $row_query['score']=0;

        $goal_hit=$row_query['goal_hit']+$guest_result;
        $goal_eaten=$row_query['goal_eaten']+$host_result;
        $games_played=$row_query['games_played']+1;
        $score=$row_query['score']+3;
        $season=13;
        $sql_host="INSERT INTO league(team_id,goal_hit,goal_eaten,games_played,score) VALUES('$host_id','$goal_hit','$goal_eaten','$games_played','$score')";
        $result_host=mysqli_query($conn,$sql_host);
        // guest
       
        $goal_hit=$row_query['goal_hit']+$host_result;
        $goal_eaten=$row_query['goal_eaten']+$guest_result;
        $games_played=$row_query['games_played']+1;
        $sql_guest="INSERT INTO league(team_id,goal_hit,goal_eaten,games_played) VALUES('$guest_id','$goal_hit','$goal_eaten','$games_played')";
        $result_guest=mysqli_query($conn,$sql_guest);
        if($result_guest and $result_host){

            header("Location: ../league.php");

        }

    }else{
        $sql_query="SELECT goal_hit,goal_eaten,games_played,score,season FROM league WHERE team_id='$host_id'";
        $result_query=mysqli_query($conn,$sql_query);
        $row_query=mysqli_fetch_assoc($result_query);
            
        $goal_hit=$row_query['goal_hit']+$guest_result;
        $goal_eaten=$row_query['goal_eaten']+$host_result;
        $games_played=$row_query['games_played']+1;
        $score=$row_query['score']+3;
        $season=13;
        $sql_host="UPDATE league SET goal_hit='$goal_hit',goal_eaten='$goal_eaten',games_played='$games_played',score='$score',season='$season' WHERE team_id='$host_id'";
        $result_host=mysqli_query($conn,$sql_host);
        // guest
        $sql_query="SELECT goal_hit,goal_eaten,games_played,score,season FROM league WHERE team_id='$guest_id'";
        $result_query=mysqli_query($conn,$sql_query);
        $row_query=mysqli_fetch_assoc($result_query);
        $goal_hit=$row_query['goal_hit']+$host_result;
        $goal_eaten=$row_query['goal_eaten']+$guest_result;
        $games_played=$row_query['games_played']+1;
        $sql_guest="UPDATE league SET goal_hit='$goal_hit',goal_eaten='$goal_eaten',games_played='$games_played' WHERE team_id='$guest_id'";
        $result_guest=mysqli_query($conn,$sql_guest);
        if($result_guest and $result_host){
            header("Location: ../league.php");

        }
    }
    
}
  



//---------------------------------




if($host_result < $guest_result){
    $sql_query="SELECT goal_hit,goal_eaten,games_played,score,season FROM league WHERE team_id='$guest_id'";
    $result_query=mysqli_query($conn,$sql_query);
    $row_query=mysqli_fetch_assoc($result_query);

    if ($row_query==NULL) {
        $row_query['goal_hit']=0;
        $row_query['goal_eaten']=0;
        $row_query['games_played']=0;
        $row_query['score']=0;

        $goal_hit=$row_query['goal_hit']+$host_result;
        $goal_eaten=$row_query['goal_eaten']+$guest_result;
        $games_played=$row_query['games_played']+1;
        $score=$row_query['score']+3;
        $season=13;
        $sql_guest="INSERT INTO league(team_id,goal_hit,goal_eaten,games_played,score,season) VALUES('$guest_id','$goal_hit','$goal_eaten','$games_played','$score','$season')";
        $result_guest=mysqli_query($conn,$sql_guest);
        // host
       
        $goal_hit=$row_query['goal_hit']+$guest_result;
        $goal_eaten=$row_query['goal_eaten']+$host_result;
        $games_played=$row_query['games_played']+1;
        $score=$row_query['score'];
        $sql_host="INSERT INTO league(team_id,goal_hit,goal_eaten,games_played,score,season) VALUES('$host_id','$goal_hit','$goal_eaten','$games_played','$score','$season')";
        $result_host=mysqli_query($conn,$sql_host);
        if($result_guest && $result_host){
            header("Location: ../league.php");

        }

    }else{
        
        $sql_query="SELECT goal_hit,goal_eaten,games_played,score,season FROM league WHERE team_id='$guest_id'";
        $result_query=mysqli_query($conn,$sql_query);
        $row_query=mysqli_fetch_assoc($result_query);
        $goal_hit=$row_query['goal_hit']+$host_result;
        $goal_eaten=$row_query['goal_eaten']+$guest_result;
        $games_played=$row_query['games_played']+1;
        $score=$row_query['score']+3;
        $season=13;
        $sql_host="UPDATE league SET goal_hit='$goal_hit',goal_eaten='$goal_eaten',games_played='$games_played',score='$score' WHERE team_id='$guest_id'";
        $result_guest=mysqli_query($conn,$sql_host);
        // host
        $sql_query="SELECT goal_hit,goal_eaten,games_played,score FROM league WHERE team_id='$host_id'";
        $result_query=mysqli_query($conn,$sql_query);
        $row_query=mysqli_fetch_assoc($result_query);
        $goal_hit=$row_query['goal_hit']+$guest_result;
        $goal_eaten=$row_query['goal_eaten']+$host_result;
        $games_played=$row_query['games_played']+1;
        $sql_host="UPDATE league SET team_id='$host_id',goal_hit='$goal_hit',goal_eaten='$goal_eaten',games_played='$games_played' WHERE team_id='$host_id'";
        $result_host=mysqli_query($conn,$sql_host);
        if($result_guest && $result_host){
            header("Location: ../league.php");

        }
    }
    
}



 //------------------------------------------






if ($host_result==$guest_result) {
    $sql_query="SELECT goal_hit,goal_eaten,games_played,score,season FROM league WHERE team_id='$guest_id'";
    $result_query=mysqli_query($conn,$sql_query);
    $row_query=mysqli_fetch_assoc($result_query);
    if ($row_query==NULL) {
        $row_query['goal_hit']=0;
        $row_query['goal_eaten']=0;
        $row_query['games_played']=0;
        $row_query['score']=0;

        $goal_hit=$row_query['goal_hit']+$host_result;
        $goal_eaten=$row_query['goal_eaten']+$guest_result;
        $games_played=$row_query['games_played']+1;
        $score=$row_query['score']+1;
        $season=13;
        $sql_guest="INSERT INTO league(team_id,goal_hit,goal_eaten,games_played,score) VALUES('$guest_id','$goal_hit','$goal_eaten','$games_played','$score')";
        $result_guest=mysqli_query($conn,$sql_guest);
        // host
        $goal_hit=$row_query['goal_hit']+$guest_result;
        $goal_eaten=$row_query['goal_eaten']+$host_result;
        $games_played=$row_query['games_played']+1;
        $score=$row_query['score']+1;
        $sql_host="INSERT INTO league(team_id,goal_hit,goal_eaten,games_played,score) VALUES('$host_id','$goal_hit','$goal_eaten','$games_played','$score')";
        $result_host=mysqli_query($conn,$sql_host);
        if($result_guest && $result_host){
            header("Location: ../league.php");

        }

    }else{
        $sql_query="SELECT goal_hit,goal_eaten,games_played,score,season FROM league WHERE team_id='$guest_id'";
        $result_query=mysqli_query($conn,$sql_query);
        $row_query=mysqli_fetch_assoc($result_query);
        $goal_hit=$row_query['goal_hit']+$host_result;
        $goal_eaten=$row_query['goal_eaten']+$guest_result;
        $games_played=$row_query['games_played']+1;
        $score=$row_query['score']+1;
        $season=13;
        $sql_host="UPDATE league SET goal_hit='$goal_hit',goal_eaten='$goal_eaten',games_played='$games_played',score='$score' WHERE team_id='$guest_id'";
        $result_guest=mysqli_query($conn,$sql_host);
        // host
        $sql_query="SELECT goal_hit,goal_eaten,games_played,score,season FROM league WHERE team_id='$host_id'";
        $result_query=mysqli_query($conn,$sql_query);
        $row_query=mysqli_fetch_assoc($result_query);
        $goal_hit=$row_query['goal_hit']+$guest_result;
        $goal_eaten=$row_query['goal_eaten']+$host_result;
        $games_played=$row_query['games_played']+1;
        $score=$row_query['score']+1;
        $sql_host="UPDATE league SET goal_hit='$goal_hit',goal_eaten='$goal_eaten',games_played='$games_played',score='$score' WHERE team_id='$host_id'";
        $result_host=mysqli_query($conn,$sql_host);
        if($result_guest && $result_host){
            header("Location: ../league.php");

        }

    }
    
}