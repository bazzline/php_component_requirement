# Reason Of Development

Free as in freedom php component.

As a php developer, I have to deal with a lot of refactoring tasks day in and day out. Refactoring includes not only code refactoring but also business logic refactoring. A team member right now had figured out a general problem and we all knew that we have to put "the chaos into a cage" because of the following reasons:

* Developers are lazy and want to call a simple method instead of rewriting complex expressions
* After we found strange parts of code, we want to put that into a sentence to spot the business logic
* We want to have a generic component where you can reuse business items
* Since business logic can became nested, the component should handle this
* Add simple way to prevent requirement from future changes (added by locking in [1.0.1](https://github.com/bazzline/php_component_requirement/tree/1.0.1))
* Add simple way to disable requirement evaluation (added by `IsDisabledInterface` in [1.1.0](https://github.com/bazzline/php_component_requirement/tree/1.1.0))
* A Requirement should be stateless to be reused as often as possible

The build status of the current master branch is tracked by Travis CI: 
[![Build Status](https://travis-ci.org/bazzline/php_component_requirement.png?branch=master)](http://travis-ci.org/bazzline/php_component_requirement)

The scrutinizer status are:
[![code quality](https://scrutinizer-ci.com/g/bazzline/php_component_requirement/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bazzline/php_component_requirement/) | [![build status](https://scrutinizer-ci.com/g/bazzline/php_component_requirement/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bazzline/php_component_requirement/)

The versioneye status is:
[![dependencies](https://www.versioneye.com/user/projects/550986bcfa7ffc4692000002/badge.svg?style=flat)](https://www.versioneye.com/user/projects/550986bcfa7ffc4692000002)

Downloads:
[![Downloads this Month](https://img.shields.io/packagist/dm/net_bazzline/component_requirement.svg)](https://packagist.org/packages/net_bazzline/component_requirement)

# The Untold Story of Development

After we (take a look to the credits please) tied up the requirements, it took some time to get a feeling of how to put this into classes.
Time has passed and I had a longer talk with a team member and he presented me his idea. I liked the idea but found some drawbacks. Since it is a normal way of coding, it really isn't a fault of the team member (and O'm also not a better programmer then he), but that is how this component was initial created.
While I was on my way back home, I had some ideas how to keep things simple and generic and started that project. On the next day, [jens](http://www.howtrueisfalse.de/ "jens blog - howtrueisfalse.de") joined me and we quickly made some progress and where able to tag [version 1.0.0](https://github.com/bazzline/php_component_requirement/tree/1.0.2 "version 1.0.2 of php component requirement") pretty soon.

# Notes

* Proudly I like to link to a [specification](https://github.com/domnikl/DesignPatternsPHP/tree/master/Behavioral/Specification) that is a written down "why" explanation of this component

# Common Terms And Names

To understand the component, it is worth to know about the used terms and names. We finally decided to use the following ones.

* Requirement: That is the class you want to work with. Extend it or use it straightaway via a factory. This class represents the business logic with all "and's" and "or's"
* Condition: After reading and writing business logic, each is full of "or's" or '"and's". That's why we provide two condition that are used to handle collections of business items (simple rules)
* IsMetInterface: To keep it simple, when you implement a business logic or validate against one, you only want to know "is this requirement met or not", so that's what the interface is for. This interface is implemented in the Requirement as well as in the Condition and you have to implement it in your item as well
* "()" are used to represent an and condition: ("foo", "bar") is "foo and bar"
* "[]" are used to represent an or condition: ["foo", "bar"] is "foo or bar"

# Example

## General

The component is shipped with some [examples](https://github.com/bazzline/php_component_requirement/tree/master/examples/source/Example "examples for how to use the php component requirement").

Feel free to pull some more. Nevertheless, to use this component, you have to do the following steps (and yes, this is already the example ;-)).

* Try to sum things up by writing a sentence like: "The user mets our requirement if he is interested in OOP or big data and if he loves open source software, has no problem to read man pages or use his favorit internet searchengine or if he is already a maintainer or a contributor to an existing open source project"
* Slice out the items that matters: "OOP", "big data", "loves open source", "read man pages", "use favorite internet search engine", "maintainer", "contributor"
* Create classes for each item that implements the IsMetInterface and that provides a unequal setter method
* Collect the items into conditions: [(["OOP", "big data"], "loves open source"["read man pages", "use favorite internet search engine"]), ["maintainer", "contributor"]]
* Create the items and inject them to the right conditions, be aware of the fact that you even can inject conditions into conditions (meaning combine a condition with another)
* Implement this into an class that extends the Requirement class or let it be assembled via a factory

## The Simple Example

The [simple example](https://github.com/bazzline/php_component_requirement/tree/1.0.2/examples/source/Example/Simple "php component requirement - simple example") is dealing with a weekday problem. It defines a weekday item. You can use this item to see if the correct weekday requirement is met.

As you can see in the [weekday example implementation](https://github.com/bazzline/php_component_requirement/blob/1.0.2/examples/source/Example/Simple/WeekdayExample.php "php component requirement - simple example - weekday requirement implementation").
The example connections two valid weekdays ("Mon" and "Tue") with an or condition. To put this into an sentence, you could write "The requirement is met, when the current weekday is monday or tuesday".

```php
//to start the example
php examples/source/Example/Simple/Example.php
```

## The Table Example

The [table example](https://github.com/bazzline/php_component_requirement/tree/1.0.2/examples/source/Example/Table "php component requirement - table example") is dealing with a nested condition.

To put the requirement into an sentence, "The requirement is met, if the color of the table is green or red or brown or yellow and the table as the feature to be extendable or foldable and if the table has a height of 80 cm or if the table is developed by jens wiese or stev leibelt.
This example needs multiple items, a color item, a feature item, a height item and a developer item. This items are connect via multiple conditions and the conditions are nested together.
If we use the common terms from above to express this requirement, we can write it the following way. [([green,red,brown,yellow],[extendable,foldable],[80cm]),[jens wiese,stev leibelt]].
It will take some time to became familiar with that kind of expression but it can clarify things up.

This example includes a demonstration how to use the "__invoke()" method in a good way.

```php
//to start the example
php examples/source/Example/Table/Example.php
```

## The Validator Example

The [validator example](https://github.com/bazzline/php_component_requirement/tree/1.0.4/examples/source/Example/Validator "php component requirement - table validator") is using the component as validator.

The example shows how to use the component as a validator by defining simple validators, adding them to a collection and use the requirement class as validator.
Only if all validators are returning a positive "isMet", the table has passed the validator.
Currently, no stack trace is available (check upcoming release) so the only feedback right now is, that the table is not valid.

```php
//to start the example
php examples/source/Example/Validator/Example.php
```

## The Disabled Requirement Example

The [disabled requirement example](https://github.com/bazzline/php_component_requirement/tree/1.1.0/examples/source/Example/WithDisabledRequirement/Example.php "php component requirement - with disabled requirement example") is using the ability to disable a whole requirement.

This example shows how to use the implementation of the *IsDisabledInterface*.
First, the requirement is evaluated with an item, that always returns *false*. If *disable* is called for the requirement, the behavior changes and the evaluation now always returns true.

```php
//to start the example
php examples/source/Example/WithDisabledRequirement/Example.php
```

## The Disabled Condition Example

The [disabled condition example](https://github.com/bazzline/php_component_requirement/tree/1.1.0/examples/source/Example/WithDisabledCondition/Example.php "php component requirement - with disabled condition example") is using the ability to disable a condition.

This example shows how to use the implementation of the *IsDisabledInterface*.
First, the requirement is evaluated with an item, that always returns *false*. If *disable* is called for the condition, the behavior changes and the evaluation now always returns true.

```php
//to start the example
php examples/source/Example/WithDisabledCondition/Example.php
```

## The Disabled Item Example

The [disabled item example](https://github.com/bazzline/php_component_requirement/tree/1.1.0/examples/source/Example/WithDisabledItem/Example.php "php component requirement - with disabled item example") is using the ability to disable a item.

This example shows how to use the implementation of the *IsDisabledInterface*.
First, the requirement is evaluated with an item, that always returns *false*. If *disable* is called for the item, the behavior changes and the evaluation now always returns true.

```php
//to start the example
php examples/source/Example/WithDisabledCondition/Example.php
```

# Hints For Using And Developing

All in all you have to implement a setter method to your item. You can create setter methods in your requirement or simple use annotation. The requirement class and the condition classes are using the magic __call method to hand over the call from the requirement through the condition to the item.  
  
If you want to create a requirement class that assembles itself or use a factory is a decision you have to make.

# Download And Install

## Github

    git clone https://github.com/bazzline/php_component_requirement

## Packagist.org

    require: "net_bazzline/component_requirement": "dev-master"

# Thanks

Thanks to Mihai Andrei Cosma - this is your idea, developed by ourselves :-).

# Version History

* upcomming
    * @todo
        * Investigate if we can use gherkin to create requirements
        * add stack trace for retrieving the first isMet-Item that returns false
        * add trigger to run through all isMet-Items and add all fails to the stack trace
        * add documentation
        * create project in openhub
        * remove "{@inheritdoc}" and "@author"
* [1.1.5](https://github.com/bazzline/php_component_requirement/tree/1.1.5) - released at 13.09.2015
    * updated dependency
* [1.1.4](https://github.com/bazzline/php_component_requirement/tree/1.1.4) - released at 19.08.2015
    * updated dependencies
* [1.1.3](https://github.com/bazzline/php_component_requirement/tree/1.1.3) - released at 29.07.2015
    * updated dependencies
* [1.1.2](https://github.com/bazzline/php_component_requirement/tree/1.1.2) - released at 04.07.2015
    * updated dependencies
* [1.1.1](https://github.com/bazzline/php_component_requirement/tree/1.1.1) - released at 27.05.2015
    * implement "__invoke()" to use a requirement as a function
    * adapted the [table example](https://github.com/bazzline/php_component_requirement/tree/1.0.2/examples/source/Example/Table "php component requirement - table example") for usage of "__invoke()"
* [1.1.0](https://github.com/bazzline/php_component_requirement/tree/1.1.0) - released at 18.03.2015
    * added example WithDisabledCondition
    * added example WithDisabledItem
    * added getConditions() method to RequirementInterface - this easies up disabling single conditions or single items (by using condition->getItems())
    * added [migration howto](https://github.com/bazzline/php_component_requirement/blob/master/migration/1.0.5_to_1.1.0.md)
    * added version eye and scrutinizer coverage
    * covered AbstractItem and AbstractCondition with unit test
    * created AbstractItem that implements ItemInterface
    * created IsDisabledInterface
    * created ItemInterface
    * created TestCase that is extended by all phpunit tests
    * implemented IsDisabledInterface to AbstractCondition
    * implemented IsDisabledInterface to Requirement
    * refactored ConditionInterface, addItem now only accepts ItemInterface instead of IsMetInterface
    * refactored Condition::getItems() - now returns plain php array
    * renamed ConditionAbstract to AbstractCondition
    * renamed and updated previous WithShutdown example to WithDisabledRequirement
    * updated dependencies
* [1.0.5](https://github.com/bazzline/php_component_requirement/tree/1.0.5) - released at 16.09.2013
    * added mechanism to enable or disable evaluation of requirement by isMet method call by using *shutdown*
* [1.0.4](https://github.com/bazzline/php_component_requirement/tree/1.0.4) - released at 12.08.2013
    * added example to use the component as validator
* [1.0.3](https://github.com/bazzline/php_component_requirement/tree/1.0.3) - released at 22.07.2013
    * added caching for magic __call condition in abstract method to not iterate over each item (invalid cache if new item is add)
* [1.0.2](https://github.com/bazzline/php_component_requirement/tree/1.0.2) - released at 08.07.2013
    * refactored locking by using https://packagist.org/packages/net_bazzline/component_lock
* [1.0.1](https://github.com/bazzline/php_component_requirement/tree/1.0.1) - released at 29.06.2013
    * added annotations to example requirement
    * added return value $this to magic __call methods of requirement and condition
    * added return value $this to addItem method of ConditionInterface
    * added return value $this to addCondition method of RequirementInterface
    * added lock and isLocked method to RequirementInterface, RuntimeException is thrown if addCollection is called and requirement is locked
    * updated readme with explanation of provided examples
* [1.0.0](https://github.com/bazzline/php_component_requirement/tree/1.0.0) - released at 27.06.2013
    * finished modeling of RequirementInterface (removed addItem)
    * finished two examples
    * finished unittests
* [0.9.0](https://github.com/bazzline/php_component_requirement/tree/0.9.0) - released at 27.06.2013
    * finished modeling of IsMetInterface and ConditionInterface
