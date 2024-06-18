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

$currentDate = date('2024-06-20');

$notificationCenter = new NotificationCenter();
$studentObserver = new StudentObserver($notificationCenter, $currentDate);
$notificationCenter->attach($studentObserver);


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