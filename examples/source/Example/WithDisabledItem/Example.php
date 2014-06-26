<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-09-16
 */

namespace Example\WithDisabledItem;

use Net\Bazzline\Component\Requirement\AndCondition;
use Net\Bazzline\Component\Requirement\Requirement;

require __DIR__ . '/../../../../vendor/autoload.php';

$requirement = new Requirement();
$willFailItem = new WillFailItem();
$andCondition = new AndCondition();

echo str_repeat('-', 40) . PHP_EOL;

$andCondition->addItem($willFailItem);

echo 'Added "will fail" item to and condition.' . PHP_EOL;

$requirement->addCondition($andCondition);

echo 'Added and condition to requirement.' . PHP_EOL;
echo str_repeat('-', 40) . PHP_EOL;
echo 'Return of requirement "isMet" call "' . var_export($requirement->isMet(), true) . '".' . PHP_EOL;
echo str_repeat('-', 40) . PHP_EOL;

$willFailItem->disable();

echo 'Requested disable for item.' . PHP_EOL;
echo 'Return of requirement "isMet" call "' . var_export($requirement->isMet(), true) . '".' . PHP_EOL;
echo str_repeat('-', 40) . PHP_EOL;
