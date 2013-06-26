# Net Bazzline Component Requirement

This component should help you to mould business logic into simple classes

## ToDo's

Add opportunity for optional values.

    * each requirementItem has to provide a setObjectOne() method
    * the collections don't have to know about that
    * how to deal with or collections in Requirement isMet() iteraton? Right now, only and is provided
    * implement usage of getItems to Requirement:
        * foreach ($collection->getItems() as $item) {
            if ($item hasMethod setRuntimeObjectOne) {
                $item->setRuntimeObjectOne($this->runtimeObjectOne)
            }
            $collection->addItem($item)
        }
    * unittest my dear

Add examples

### Example

Instance of class objectOne wont change but you have multiple instances of class objectTwo that has to met the requirements.
Instance of class objectOne should be provided via initial creation of collection where the instances of class objectTwo has to be provided before each "isMet()" call.

## Help for the developer

I created this component to solve the following problem

    The table is great if it is green or red or brown or yellow AND extendable or foldable AND 80 cm high

    [green|red|brown|yellow]&[extendable|foldable]&[80cm]

    OrCollection&OrCollection&OrCollection
