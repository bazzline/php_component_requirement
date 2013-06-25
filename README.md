# Net Bazzline Component Requirement

This component should help you to mould business logic into simple classes

## ToDo's

Add opportunity for optional values.

### Example

Instance of class objectOne wont change but you have multiple instances of class objectTwo that has to met the requirements.
Instance of class objectOne should be provided via initial creation of collection where the instances of class objectTwo has to be provided before each "isMet()" call.

## Help for the developer

I created this component to solve the following problem

    Der tisch ist toll wenn er gruen oder rot oder braun gelb und ausziehbar oder klappbar und 80cm hoch ist

    [gruen|rot|braun|gelb][ausziehbar|klappbar][80cm]

    OrCollection|OrCollection|OrCollection