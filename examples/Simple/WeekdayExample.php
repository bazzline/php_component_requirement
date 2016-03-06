<?php
/**
 * @author Jens Wiese <jens@howtrueisfalse.de>
 * @since 2013-06-27
 */

namespace Example\Simple;

use Example\Simple\Items\CorrectWeekday;
use Net\Bazzline\Component\Requirement\OrCondition;
use Net\Bazzline\Component\Requirement\Requirement;

require __DIR__ . '/../../../../vendor/autoload.php';

/*
 * Example with two items wrapped in an OR-condition
 * (So mondays or tuesdays will lead to a met requirement)
 */
$condition = new OrCondition();
$condition->addItem(new CorrectWeekday('Mon'));
$condition->addItem(new CorrectWeekday('Tue'));

$requirement = new Requirement();
$requirement->addCondition($condition);

foreach (array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun') as $weekday) {
    $requirement->setActualWeekday($weekday);

    if ($requirement->isMet()) {
        printf('Current weekday "%s" meets the requirement ("Mon" or "Tue")', $weekday);
    } else {
        printf('Current weekday "%s" does not meet the requirement ("Mon" or "Tue")', $weekday) . PHP_EOL;
    }

    print PHP_EOL;
}