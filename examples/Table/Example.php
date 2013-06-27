<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-26 
 */

namespace Example\Table;

require 'source/Net/Bazzline/Component/Requirement/developmentAutoloader.php';
require 'examples/Table/Table.php';
require 'examples/Table/IsAGoodTableRequirement.php';
require 'examples/Table/Items/Color.php';
require 'examples/Table/Items/Developer.php';
require 'examples/Table/Items/Feature.php';
require 'examples/Table/Items/Height.php';
require 'examples/Table/Items/BrownColor.php';
require 'examples/Table/Items/GreenColor.php';
require 'examples/Table/Items/YellowColor.php';
require 'examples/Table/Items/RedColor.php';
require 'examples/Table/Items/ExtendableFeature.php';
require 'examples/Table/Items/FoldableFeature.php';
require 'examples/Table/Items/PerfectHeight.php';
require 'examples/Table/Items/JensWieseDeveloper.php';
require 'examples/Table/Items/StevLeibeltDeveloper.php';

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