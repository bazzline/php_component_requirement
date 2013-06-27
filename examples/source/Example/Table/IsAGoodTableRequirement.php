<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-26
 * @todo add annotation for setter methods
 */

namespace Example\Table;

use Example\Table\Items\BrownColor;
use Example\Table\Items\ExtendableFeature;
use Example\Table\Items\FoldableFeature;
use Example\Table\Items\GreenColor;
use Example\Table\Items\JensWieseDeveloper;
use Example\Table\Items\PerfectHeight;
use Example\Table\Items\RedColor;
use Example\Table\Items\StevLeibeltDeveloper;
use Example\Table\Items\YellowColor;
use Net\Bazzline\Component\Requirement\AndCondition;
use Net\Bazzline\Component\Requirement\OrCondition;
use Net\Bazzline\Component\Requirement\Requirement;

/**
 * Class IsAGoodTableRequirement
 *
 * @package Example\Table
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-26
 */
class IsAGoodTableRequirement extends Requirement
{
    /**
     * This requirement is testing against following properties
     * [[green|red|brown|yellow]&[extendable|foldable]&[80cm]]or[jens wiese|stevleibelt]
     *
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-26
     */
    public function __construct()
    {
        parent::__construct();
        $colorCondition = $this->createColorCondition();
        $featureCondition = $this->createFeatureCondition();
        $perfectHeight = new PerfectHeight();
        $developerCondition = $this->createDeveloperCondition();

        $andCondition = new AndCondition();
        $andCondition->addItem($colorCondition);
        $andCondition->addItem($featureCondition);
        $andCondition->addItem($perfectHeight);

        $orCondition = new OrCondition();
        $orCondition->addItem($developerCondition);
        $orCondition->addItem($andCondition);

        $this->addCondition($orCondition);
    }

    /**
     * @return OrCondition
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-26
     */
    private function createColorCondition()
    {
        $brown = new BrownColor();
        $green = new GreenColor();
        $red = new RedColor();
        $yellow = new YellowColor();

        $condition = new OrCondition();
        $condition->addItem($brown);
        $condition->addItem($green);
        $condition->addItem($red);
        $condition->addItem($yellow);

        return $condition;
    }

    /**
     * @return OrCondition
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-26
     */
    private function createFeatureCondition()
    {
        $extendable = new ExtendableFeature();
        $foldable = new FoldableFeature();

        $condition = new OrCondition();
        $condition->addItem($extendable);
        $condition->addItem($foldable);

        return $condition;
    }

    /**
     * @return OrCondition
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-26
     */
    private function createDeveloperCondition()
    {
        $condition = new OrCondition();
        $condition->addItem(new JensWieseDeveloper());
        $condition->addItem(new StevLeibeltDeveloper());

        return $condition;
    }
}
