# Strategy

Use this pattern to separate specif algorithms into classes.
When all classes in your project do the same thing in differente ways
you should build a common interface and isolate these specif algorithms.

When you have a lot of conditions into a single method it shows you that
you should build a common interface and isolate the specifc algorithms into
specific classes.

The common interface have the common methods and the classes will implement
the methods in there specif ways.

The context class use the strategies to execute an specifc algorithm
in a certain situation.