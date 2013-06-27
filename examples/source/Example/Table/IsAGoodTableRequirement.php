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
use Net\Bazzline\Component\Requirement\AndCollection;
use Net\Bazzline\Component\Requirement\OrCollection;
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
        $colorCollection = $this->createColorCollection();
        $featureCollection = $this->createFeatureCollection();
        $perfectHeight = new PerfectHeight();
        $developerCollection = $this->createDeveloperCollection();

        $andCollection = new AndCollection();
        $andCollection->addItem($colorCollection);
        $andCollection->addItem($featureCollection);
        $andCollection->addItem($perfectHeight);

        $orCollection = new OrCollection();
        $orCollection->addItem($developerCollection);
        $orCollection->addItem($andCollection);

        $this->addCollection($orCollection);
    }

    /**
     * @return OrCollection
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-26
     */
    private function createColorCollection()
    {
        $brown = new BrownColor();
        $green = new GreenColor();
        $red = new RedColor();
        $yellow = new YellowColor();

        $collection = new OrCollection();
        $collection->addItem($brown);
        $collection->addItem($green);
        $collection->addItem($red);
        $collection->addItem($yellow);

        return $collection;
    }

    /**
     * @return OrCollection
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-26
     */
    private function createFeatureCollection()
    {
        $extendable = new ExtendableFeature();
        $foldable = new FoldableFeature();

        $collection = new OrCollection();
        $collection->addItem($extendable);
        $collection->addItem($foldable);

        return $collection;
    }

    /**
     * @return OrCollection
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-26
     */
    private function createDeveloperCollection()
    {
        $jensWiese = new JensWieseDeveloper();
        $stevLeibelt = new StevLeibeltDeveloper();

        $collection = new OrCollection();
        $collection->addItem($jensWiese);
        $collection->addItem($stevLeibelt);

        return $collection;
    }
}
