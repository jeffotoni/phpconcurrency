# PHP Concurrency

PHP is single threds, unfortunately it is not designed to work in competition or parallelism.

Competition is not parallelism. Parallelism is when two or more threads are running the code simultaneously against different processors.

What I will demonstrate here is a simple example in PHP running in competition.

One way to do this is to use [class.threds](http://php.net/manual/pt_BR/class.thread.php.)  

I will use "GOTO" to compete with PHP, it is not an elegant and not the most indicated, but here we have the didactic objective and nothing else.

[Goto](http://php.net/manual/en/control-structures.goto.php) can be used to jump to another section of the program.

One can not jump into a loop or switch structure.

One can jump out of them, and one common use is to use goto in place of a multi-level break.

But in our example we will not do FOR, WHILE or better no control structure, we WILL USE OWN goto to generate OUR FOR.

We will make a FOR without using "FOR" simply with goto, and that is where our example looks very interesting when we are going to compete.

Our example will fill 2 vectors but in concorrency.

VetA and VetB with 10 random positions.


# Example of operation

![image](https://github.com/jeffotoni/phpconcurrency/blob/master/gif/phpconcurrency.gif)

[![Watch the video](https://raw.github.com/GabLeRoux/WebMole/master/ressources/WebMole_Youtube_Video.png)](http://youtu.be/vt5fpE0bzSY)
