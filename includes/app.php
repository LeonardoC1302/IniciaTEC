<?php 

use Dotenv\Dotenv;
use Model\ActiveRecord;
use Classes\DatabaseConnection;
use Model\Activity;
use Model\NotificationCenter;
use Model\PublishVisitor;
use Model\ReminderVisitor;
use Model\StudentObserver;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require 'functions.php';
require 'database.php';

$db = DatabaseConnection::getInstance()->getConnection();
ActiveRecord::setDB($db);

$notificationCenter = new NotificationCenter();
$studentObserver = new StudentObserver($notificationCenter);
$notificationCenter->attach($studentObserver);

$currentDate = date('Y-m-d H:i:s');

$activities = Activity::all();
$publishVisitor = new PublishVisitor($currentDate);
$reminderVisitor = new ReminderVisitor($currentDate, $notificationCenter);


foreach ($activities as $activity) {
    $originalState = $activity->estadoId;

    $activity->accept($publishVisitor);
    $activity->accept($reminderVisitor);

    if($activity->estadoId != $originalState){
        $notificationCenter->publish($activity);
    }
}