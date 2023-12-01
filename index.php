<?php 
    


    if(isset($_GET['homepage']))
    {
        require_once("homepage.php");
    }else if(isset($_GET['addElectionPage']))
    {
        require_once("conduct_election.php");
    }else if(isset($_GET['addCandidatePage']))
    {
        require_once("add_candidates.php");
    }else if(isset($_GET['viewResult']))
    {
        require_once("viewResults.php");
    }

?>


