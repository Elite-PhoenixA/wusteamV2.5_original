<?php
include $_SERVER["DOCUMENT_ROOT"] . "/config/Database.php";
$cron_tasks = ["REFRESH_SESSION_CHECK", "CHECK_EXPIRED_PLANS","LEVEL_CHECKER","CHECK_SESSION"];
foreach ($cron_tasks as $task) {
    CronJobs($task);
}
function CronJobs($task)
{
    switch ($task) {
        case "REFRESH_TOKEN_CHECK":
            include $_SERVER["DOCUMENT_ROOT"] .
                "/layout/Web-Services/Oauth/RefreshSessionChecker.php";
            break;
        case "CHECK_EXPIRED_PLANS":
            include $_SERVER["DOCUMENT_ROOT"] .
                "/layout/Web-Services/Main/Check-Expired-Plans.php";
            break;
            case "LEVEL_CHECKER":
                include $_SERVER["DOCUMENT_ROOT"] .
                    "/layout/Web-Services/Main/Level-Checker.php";
                break;
                   case "CHECK_SESSION":
                include $_SERVER["DOCUMENT_ROOT"] .
                    "/app/module/loggin/check.php";
                break;
        default:
            break;
    }
}
echo json_encode([
    "status" => 200,
    "title" => "Task Manager Cron-Jobs",
    "total:" => count($cron_tasks),
]);
/**Made -> ThanhDieu.Com */