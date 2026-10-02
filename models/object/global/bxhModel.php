<?php
/**
 * Author: Vương Thanh Diệu
 */
if (!class_exists('DatabaseConnection')) {
    header('location: /');
}
class TOPBXH extends DatabaseConnection
{
    public function TopFollow($limit = 10, $min = 10)
    {
        $vtd = self::ThanhDieuDB()->prepare("
            SELECT u.user_id, u.username AS user_username, u.hovaten, u.avatar, u.level, u.tieusu,
                   COUNT(f.followed_id) AS follower_count, COALESCE(p.tengoi, 'taikhoan') AS plans, v.*
            FROM ws_follower f
            JOIN users u ON f.followed_id = u.user_id
            LEFT JOIN ws_plans p ON u.username = p.taikhoan
            LEFT JOIN ws_verification v ON u.username = v.username
            WHERE u.banned = 0
            GROUP BY f.followed_id, u.user_id, u.username, u.hovaten, u.avatar, u.level, p.tengoi, v.username
            HAVING follower_count >= ?
            ORDER BY follower_count DESC
            LIMIT ?
        ");
        $vtd->bind_param("ii", $min, $limit);
        $vtd->execute();
        $result = $vtd->get_result();
    
        $TopFollow = [];
        while ($row = $result->fetch_assoc()) {
            $TopFollow[] = $row;
        }
    
        return $TopFollow;
    }
    
    
    public function TopLevel($limit = 10)
    {
        $vtd = self::ThanhDieuDB()->prepare("
            SELECT u.user_id, u.username AS user_username, u.hovaten, u.avatar, u.level, u.tieusu,
            COALESCE(p.tengoi, 'taikhoan') AS plans, v.*
            FROM users u
            LEFT JOIN ws_plans p ON u.username = p.taikhoan
            LEFT JOIN ws_verification v ON u.username = v.username
            WHERE (u.level >= 7 OR u.level LIKE 'svip%') AND u.banned = 0
            GROUP BY u.user_id, u.username, u.hovaten, u.avatar, u.level, p.tengoi, v.username
            ORDER BY CASE 
                        WHEN u.level LIKE 'svip%' THEN 1000 + CAST(SUBSTRING(u.level, 5) AS UNSIGNED)
                        ELSE CAST(u.level AS UNSIGNED)
                     END DESC
            LIMIT ?
        ");
        $vtd->bind_param("i", $limit);
        $vtd->execute();
        $result = $vtd->get_result();
    
        $TopLevel = [];
        while ($row = $result->fetch_assoc()) {
            $TopLevel[] = $row;
        }
    
        return $TopLevel;
    }

    public function TopViral($limit = 10)
    {
        $min = 30000;
        
        $vtd = self::ThanhDieuDB()->prepare("
            SELECT u.user_id, u.username AS user_username, u.hovaten, u.avatar, u.level, u.dohot, u.tieusu,
                   COALESCE(p.tengoi, 'taikhoan') AS plans, v.*
                   FROM users u
                   LEFT JOIN ws_plans p ON u.username = p.taikhoan
                   LEFT JOIN ws_verification v ON u.username = v.username
                   WHERE u.dohot >= ? AND u.banned = 0
                   ORDER BY u.dohot DESC
                   LIMIT ?
        ");
        
        $vtd->bind_param("ii", $min, $limit);
        $vtd->execute();
        $result = $vtd->get_result();
    
        $TopViral = [];
        while ($row = $result->fetch_assoc()) {
            $TopViral[] = $row;
        }
    
        return $TopViral;
    }
    
}
$topFollow = (new TOPBXH())->TopFollow();
$topLevel = (new TOPBXH())->TopLevel();
$topViral = (new TOPBXH())->TopViral();