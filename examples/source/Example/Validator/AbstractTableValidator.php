<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-12 
 */

namespace Example\Validator;

use Net\Bazzline\Component\Requirement\IsMetInterface;

/**
 * Class AbstractTableValidator
 *
 * @package Example\Validator
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-12
 */
abstract class AbstractTableValidator implements IsMetInterface
{
    /**
     * @var Table
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    protected $table;

    /**
     * @param Table $table
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-12
     */
    public function setTable(Table $table)
    {
        $this->table = $table;

        return $this;
    }
}