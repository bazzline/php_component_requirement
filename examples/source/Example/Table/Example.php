<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-06-26 
 */

namespace Example\Table;

require __DIR__ . '/../../../../vendor/autoload.php';

$tables = array(
    new Table('black', 'heatable', '40cm', 'BSD daemon'),
    new Table('yellow', 'heatable', '40cm'),
    new Table('orange', 'fooable', '190cm', 'jens wiese')
);

$requirement = new IsAGoodTableRequirement();

echo '----------------------------' . PHP_EOL;
echo '| using the "isMet" method |' . PHP_EOL;
echo '----------------------------' . PHP_EOL;
/** @var Table[] $tables */
foreach ($tables as $table) {
    $requirement->setColor($table->getColor());
    $requirement->setDeveloper($table->getDeveloper());
    $requirement->setFeature($table->getFeature());
    $requirement->setHeight($table->getHeight());

    $isMet = $requirement->isMet();

    echo 'Requirement "' . get_class($requirement) .
        '" is ' . (($isMet == true) ? 'met' : 'not met') . ' for table: ' . PHP_EOL .
        var_export($table, true) . PHP_EOL;
}

echo PHP_EOL;
echo '-------------------------------------' . PHP_EOL;
echo '| using the requirement as function |' . PHP_EOL;
echo '-------------------------------------' . PHP_EOL;
/** @var Table[] $tables */
foreach ($tables as $table) {
    $isMet = $requirement($table->getColor(), $table->getDeveloper(), $table->getFeature(), $table->getHeight());

    echo 'Requirement "' . get_class($requirement) .
        '" is ' . (($isMet == true) ? 'met' : 'not met') . ' for table: ' . PHP_EOL .
        var_export($table, true) . PHP_EOL;
}