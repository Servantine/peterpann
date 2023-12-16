<?php
function hasGroupLeader($groupId)
{
    include '../../conn.php';
    $sql = "SELECT COUNT(*) as leader_count FROM dtl_kelompok_kkn WHERE id_kelompok = ? AND jabatan = 'Ketua Kelompok'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $groupId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['leader_count'] > 0;
}
?>