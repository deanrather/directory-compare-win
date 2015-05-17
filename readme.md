# Directory Compare (win)

This is a PHP script which accepts 2 directories as paths, and lists which files exist in one directory but not the other.

It uses a SHA1 hash to identify a file, and as a nice bonus warns you about duplicate files while it's doing it's thing.

It's pretty slow, but I built it to help me reconcile a couple years worth of backup HDD's.

I chose Windows 'cause [my .bat solution](https://gist.github.com/deanrather/b6e3f8600cb9071ff300) was awful.

I found this heaps old [php compile program](http://www.bambalam.se/bamcompile/) which seems pretty neat. It compiles against php 4.4.4 but it does the trick. It simply takes a `php` file and spits out an `exe`.
