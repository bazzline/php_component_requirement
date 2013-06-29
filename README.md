## Reason Of Development

As a php developer, i have to deal with a lot of refactoring tasks day in and day out. Refactoring includes not only code refactoring but also business logic refactoring. A team member right now had figured out a general problem and we all knew that we have to put "the chaos into a cage" because of the following reasons:

    * Developers are lazy and want to call a simple method instead of rewriting complex expressions
    * After we found strange parts of code, we want to put that into a sentence to spot the business logic
    * We want to have a generic component where you can reuse business items
    * Since business logic can became nested, the component should handle this

After we (take a look to the credits please) tied up the requirements, it took some time to get a feeling of how to put this into classes. After a while, i had a longer talk with a team member and he presented me his idea. I liked his idea but found some drawbacks. Since it this is a normal way of coding, it really isn't a fault of the team member (and i'm also not a better programmer then he), but thats how this component was initial created. While i was on my way back home, i had some ideas how to keep things simple and generic and started that project. On the next day, [jens](http://www.howtrueisfalse.de/ "jens blog - howtrueisfalse.de") joined me and we quickly made some progress and where able to tag [version 1.0.0](https://github.com/stevleibelt/php_component_requirement/tree/v1.0.0 "version 1.0.0 of php component requirement") pretty soon.

## Common Terms And Names

To understand the component, it is worth to know about the used terms and names. We finally decided to use the following ones.

    * Requirement: Thats the class you want to work with. Extend it or use it straightaway via a factory. This class represents the business logic with all "and's" and "or's"
    * Condition: After reading and writing business logic, each is full of "or's" or '"and's". That's why we provide two condition that are used to handle collections of business items (simple rules)
    * IsMetInterface: To keep it simple, when you implement a business logic or validate against one, you only want to know "is this requirement met or not", so that's what the interface is for. This interface is implemented in the Requirement as well as in the Condition and you have to implement it in your item as well
    * "()" are used to represent an and condition: ("foo", "bar") is "foo and bar"
    * "[]" are used to represent an or condition: ["foo", "bar"] is "foo or bar"

## Example

### General

The component is shipped with some [examples](https://github.com/stevleibelt/php_component_requirement/tree/master/examples/source/Example "examples for how to use the php component requirement"). Feel free to pull some more. Nevertheless, to use this component, you have to do the following steps (and yes, this is already the example ;-)).

    * Try to sum things up by writing a sentence like: "The user mets our requirement if he is interested in OOP or big data and if he loves open source software, has no problem to read man pages or use his favorit internet searchengine or if he is already a maintainer or a contributor to an existing open source project"
    * Slice out the items that matters: "OOP", "big data", "loves open source", "read man pages", "use favorite internet searchengine", "maintainer", "contributor"
    * Create classes for each item that implements the IsMetInterface and that provides a unequal setter method
    * Collect the items into conditions: [(["OOP", "big data"], "loves open source"["read man pages", "use favorite internet searchengine"]), ["maintainer", "contributor"]]
    * Create the items and inject them to the right conditions, be aware of the fact that you even can inject conditions into conditions (meaning combine a condition with another)
    * Implement this into an class that extends the Requirement class or let it be assembled via a factory

## Hints For Using And Developing

All in all you have to implement a setter method to your item. You can create setter methods in your requirement or simple use annotation. The requirement class and the condition classes are using the magic __call method to hand over the call from the requirement through the condition to the item.  
  
If you want to create a requirement class that assembles itself or use a factory is a decision you have to make.

## Download And Install

### Github

    git clone https://github.com/stevleibelt/php_component_requirement

### Packagist.org

    require: "net_bazzline/component_requirement": "dev-master"

## Thanks

Thanks to Mihai Andrei Cosma - this is your idea, developed by ourselves :-).
