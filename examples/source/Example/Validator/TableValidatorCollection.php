<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-12 
 */

namespace Example\Validator;

use Net\Bazzline\Component\Requirement\AndCondition;
use Net\Bazzline\Component\Requirement\Requirement;

/**
 * Class TableValidatorCollection
 *
 * @method TableValidatorCollection setTable(Table $table) sets the current table instance
 *
 * @package Example\Validator
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-08-12
 */
class TableValidatorCollection extends Requirement
{
    /**
     * @return TableValidatorCollection
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2012-08-12
     */
    public static function create()
    {
        $self = new self();

        $andCondition = new AndCondition();
        $andCondition->addItem(new ColorValidator());
        $andCondition->addItem(new HeightValidator());
        $andCondition->addItem(new LengthValidator());
        $andCondition->addItem(new WidthValidator());

        $self->addCondition($andCondition);

        return $self;
    }
}