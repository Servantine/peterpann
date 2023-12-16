<?php 
    include 'getGroupLeader.php';
    if (isset($_POST['groupId'])) {
        $groupId = $_POST['groupId'];
        echo hasGroupLeader($groupId);
    };
?>