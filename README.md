# Reason Of Development

As a php developer, i have to deal with a lot of refactoring tasks day in and day out. Refactoring includes not only code refactoring but also business logic refactoring. A team member right now had figured out a general problem and we all knew that we have to put "the chaos into a cage" because of the following reasons:

* Developers are lazy and want to call a simple method instead of rewriting complex expressions
* After we found strange parts of code, we want to put that into a sentence to spot the business logic
* We want to have a generic component where you can reuse business items
* Since business logic can became nested, the component should handle this

After we (take a look to the credits please) tied up the requirements, it took some time to get a feeling of how to put this into classes. After a while, i had a longer talk with a team member and he presented me his idea. I liked his idea but found some drawbacks. Since it this is a normal way of coding, it really isn't a fault of the team member (and i'm also not a better programmer then he), but thats how this component was initial created. While i was on my way back home, i had some ideas how to keep things simple and generic and started that project. On the next day, [jens](http://www.howtrueisfalse.de/ "jens blog - howtrueisfalse.de") joined me and we quickly made some progress and where able to tag [version 1.0.0](https://github.com/stevleibelt/php_component_requirement/tree/1.0.2 "version 1.0.2 of php component requirement") pretty soon.

The build status of the current master branch is tracked by Travis CI: 
[![Build Status](https://travis-ci.org/stevleibelt/php_component_requirement.png?branch=master)](http://travis-ci.org/stevleibelt/php_component_requirement)

# Common Terms And Names

To understand the component, it is worth to know about the used terms and names. We finally decided to use the following ones.

* Requirement: Thats the class you want to work with. Extend it or use it straightaway via a factory. This class represents the business logic with all "and's" and "or's"
* Condition: After reading and writing business logic, each is full of "or's" or '"and's". That's why we provide two condition that are used to handle collections of business items (simple rules)
* IsMetInterface: To keep it simple, when you implement a business logic or validate against one, you only want to know "is this requirement met or not", so that's what the interface is for. This interface is implemented in the Requirement as well as in the Condition and you have to implement it in your item as well
* "()" are used to represent an and condition: ("foo", "bar") is "foo and bar"
* "[]" are used to represent an or condition: ["foo", "bar"] is "foo or bar"

# Example

## General

The component is shipped with some [examples](https://github.com/stevleibelt/php_component_requirement/tree/master/examples/source/Example "examples for how to use the php component requirement"). Feel free to pull some more. Nevertheless, to use this component, you have to do the following steps (and yes, this is already the example ;-)).

* Try to sum things up by writing a sentence like: "The user mets our requirement if he is interested in OOP or big data and if he loves open source software, has no problem to read man pages or use his favorit internet searchengine or if he is already a maintainer or a contributor to an existing open source project"
* Slice out the items that matters: "OOP", "big data", "loves open source", "read man pages", "use favorite internet searchengine", "maintainer", "contributor"
* Create classes for each item that implements the IsMetInterface and that provides a unequal setter method
* Collect the items into conditions: [(["OOP", "big data"], "loves open source"["read man pages", "use favorite internet searchengine"]), ["maintainer", "contributor"]]
* Create the items and inject them to the right conditions, be aware of the fact that you even can inject conditions into conditions (meaning combine a condition with another)
* Implement this into an class that extends the Requirement class or let it be assembled via a factory

## The Simple Example

The [simple example](https://github.com/stevleibelt/php_component_requirement/tree/1.0.2/examples/source/Example/Simple "php component requirement - simple example") is dealing with a weekday problem. It defines a weekday item. You can use this item to see if the correct weekday requirement is met.

As you can see in the [weekday example implementation](https://github.com/stevleibelt/php_component_requirement/blob/1.0.2/examples/source/Example/Simple/WeekdayExample.php "php component requirement - simple example - weekday requirement implementation").
The example connections two valid weekdays ("Mon" and "Tue") with an or condition. To put this into an sentence, you could write "The requirement is met, when the current weekday is monday or tuesday".

```php
//to start the example
php examples/source/Example/Simple/Example.php
```

## The Table Example

The [table example](https://github.com/stevleibelt/php_component_requirement/tree/1.0.2/examples/source/Example/Table "php component requirement - table example") is dealing with a nested condition.

To put the requirement into an sentence, "The requirement is met, if the color of the table is green or red or brown or yellow and the table as the feature to be extendable or foldable and if the table has a height of 80 cm or if the table is developed by jens wiese or stev leibelt.
This example needs multiple items, a color item, a feature item, a height item and a developer item. This items are connect via multiple conditions and the conditions are nested together.
If we use the common terms from above to express this requirement, we can write it the following way. [([green,red,brown,yellow],[extendable,foldable],[80cm]),[jens wiese,stev leibelt]].
It will take some time to became familiar with that kind of expression but it can clearify things up.

```php
//to start the example
php examples/source/Example/Table/Example.php
```

## The Validator Example

The [validator example](https://github.com/stevleibelt/php_component_requirement/tree/1.0.4/examples/source/Example/Validator "php component requirement - table validator") is using the component as validator.

The example shows how to use the component as a validator by defining simple validators, adding them to a collection and use the requirement class as validator.
Only if all validators are returning a positive "isMet", the table has passed the validator.
Currently, no stack trace is available (check upcoming release) so the only feedback right now is, that the table is not valid.

```php
//to start the example
php examples/source/Example/Validator/Example.php
```

# Hints For Using And Developing

All in all you have to implement a setter method to your item. You can create setter methods in your requirement or simple use annotation. The requirement class and the condition classes are using the magic __call method to hand over the call from the requirement through the condition to the item.  
  
If you want to create a requirement class that assembles itself or use a factory is a decision you have to make.

# Download And Install

## Github

    git clone https://github.com/stevleibelt/php_component_requirement

## Packagist.org

    require: "net_bazzline/component_requirement": "dev-master"

# Thanks

Thanks to Mihai Andrei Cosma - this is your idea, developed by ourselves :-).

# Version History

* [next](https://github.com/stevleibelt/php_component_requirement)
    * add trigger to run through all isMet-Items and add all fails to the stack trace
    * add stack trace for retrieving the first isMet-Item that returns false
    * implement mechanism to activate or deactivate items or the whole requirement
* [1.0.4](https://github.com/stevleibelt/php_component_requirement/tree/1.0.4)
    * add example to use the component as validator
* [1.0.3](https://github.com/stevleibelt/php_component_requirement/tree/1.0.3)
    * add caching for magic __call condition in abstract method to not iterate over each item (invalid cache if new item is add)
* [1.0.2](https://github.com/stevleibelt/php_component_requirement/tree/1.0.2)
    * Refactored locking by using https://packagist.org/packages/net_bazzline/component_lock
* [1.0.1](https://github.com/stevleibelt/php_component_requirement/tree/1.0.1)
    * Added annotations to example requirement
    * Added return value $this to magic __call methods of requirement and condition
    * Added return value $this to addItem method of ConditionInterface
    * Added return value $this to addCondition method of RequirementInterface
    * Added lock and isLocked method to RequirementInterface, RuntimeException is thrown if addCollection is called and requirement is locked
    * Updated Readme with explanation of provided examples
* [1.0.0](https://github.com/stevleibelt/php_component_requirement/tree/1.0.0)
    * Finished modeling of RequirementInterface (removed addItem)
    * Finished two examples
    * Finished unittests
* [0.9.0](https://github.com/stevleibelt/php_component_requirement/tree/0.9.0)
    * Finished modeling of IsMetInterface and ConditionInterface

# Todo List

* Investigate if we can use gherkin to create requirements
* Add method to set strength of IsMet condition requirement (currently each condition has to be true)
* Updated readme
