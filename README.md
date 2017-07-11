# PHP Concurrency

PHP is single threds, unfortunately it is not designed to work in competition or parallelism.

Competition is not parallelism. Parallelism is when two or more threads are running the code simultaneously against different processors.

What I will demonstrate here is a simple example in PHP running in competition.

One way to do this is to use c[lass.threds](http://php.net/manual/pt_BR/class.thread.php.)  

I will use "GOTO" to compete with PHP, it is not an elegant and not the most indicated, but here we have the didactic objective and nothing else.
