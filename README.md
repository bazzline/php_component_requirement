# Net Bazzline Component Requirement

This component should help you to mould business logic into simple classes

# Packagist

    require: "net_bazzline/component_requirement": "dev-master"

## ToDo's

Add opportunity for optional values.

    * each requirementItem has to provide a setObjectOne() method
    * how to deal with or collections in Requirement isMet() iteraton? Right now, only and is provided
    * add a lock mechanism to mark a requirement as finished. An exception should be thrown if an item is added when a requirement is locked
    * add same mechanism to collection if it is usefull
    * unittest my dear

Add examples

### Example

Instance of class objectOne wont change but you have multiple instances of class objectTwo that has to met the requirements.
Instance of class objectOne should be provided via initial creation of collection where the instances of class objectTwo has to be provided before each "isMet()" call.

## Help for the developer

I created this component to solve the following problem

    The table is great if it is green or red or brown or yellow AND extendable or foldable AND 80 cm high or it is developed by jens wiese or stev leibelt.

    [[green|red|brown|yellow]&[extendable|foldable]&[80cm]]or[jens wiese|stevleibelt]

    [ColorOrCollection&FeatureOrCollection&HeightItem]or[DeveloperOrCollection]

# Thanks

    * The rumanian stallion ;-) - this is your idea, developed by ourselves :-)
