<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-12 
 */

namespace Example\Validator;

require __DIR__ . '/../../../../vendor/autoload.php';

Example::create()
    ->setup()
    ->andRun();

/**
 * Class Example
 *
 * @package Example\Validator
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-12
 */
class Example
{
    /**
     * @var \Net\Bazzline\Component\Requirement\Requirement
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    private $validator;

    /**
     * @var Table[]
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    private $tables;

    /**
     * @return Example
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2012-08-12
     */
    public static function create()
    {
        return new self();
    }

    /**
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    public function setup()
    {
        $this->validator = TableValidatorCollection::create();
        $this->tables = array();

        $colors = array(0 => 'red', 1 => 'green', 2 => 'blue', 3 => 'yellow', 4 => 'orange', 5 => 'black');
        $heights = array(0 => 50, 1 => 69, 2 => 70, 3 => 74, 4 => 81, 5 => 85, 6 => 89, 7 => 101);
        $lengths = array(0 => 40, 1 => 56, 2 => 71, 3 => 91, 4 => 100, 5 => 200, 6 => 210);
        $widths = array(0 => 47, 1 => 76, 2 => 82, 3 => 129, 4 => 132, 5 => 154, 6 => 179);

        $sizeOfColors = count($colors) - 1;
        $sizeOfHeight = count($heights) - 1;
        $sizeOfLengths = count($lengths) - 1;
        $sizeOfWidths = count($widths) - 1;

        $numberOfTables = 7;

        for ($iterator = 0; $iterator < $numberOfTables; $iterator++) {
            $table = new Table();

            $table->setColor($colors[rand(0, $sizeOfColors)]);
            $table->setHeight($heights[rand(0, $sizeOfHeight)]);
            $table->setLength($lengths[rand(0, $sizeOfLengths)]);
            $table->setWidth($widths[rand(0, $sizeOfWidths)]);

            $this->tables[] = $table;
        }

        return $this;
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    public function andRun()
    {
        echo str_repeat('-', 48) . PHP_EOL;
        echo 'Number of tables: ' . count($this->tables) . PHP_EOL;
        echo str_repeat('-', 48) . PHP_EOL;
        echo 'Iterating over tables.' . PHP_EOL;
        foreach ($this->tables as $table) {
            /**
             * @var Table $table
             */
            $this->validator->setTable($table);
            echo 'Is valid table: ' . ($this->validator->isMet() ? 'yes' : 'no') . PHP_EOL;
        }
        echo str_repeat('-', 48) . PHP_EOL;
    }
}