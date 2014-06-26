<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-06-26 
 */

namespace Example\Table;

require __DIR__ . '/../../../../vendor/autoload.php';

$tables = array();
$tables[] = new Table('black', 'heatable', '40cm', 'BSD daemon');
$tables[] = new Table('yellow', 'heatable', '40cm');
$tables[] = new Table('orange', 'fooable', '190cm', 'jens wiese');

$requirement = new IsAGoodTableRequirement();

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