# Directory Compare (win)

This is a PHP script which accepts 2 directories as paths, and lists which files exist in one directory but not the other.

It uses a SHA1 hash to identify a file, and as a nice bonus warns you about duplicate files while it's doing it's thing.

It's pretty slow, but I built it to help me reconcile a couple years worth of backup HDD's.

I chose Windows 'cause [my .bat solution](https://gist.github.com/deanrather/b6e3f8600cb9071ff300) was awful.

I found this heaps old [php compile program](http://www.bambalam.se/bamcompile/) which seems pretty neat. It compiles against php 4.4.4 but it does the trick. It simply takes a `php` file and spits out an `exe`.


## Usage Instructions

	compare-directories.exe "C:\path\to\folder one" "D:\path\to\folder two"

Output will look like:

		
	Getting list of files in [C:\path\to\folder one]

	C:\path\to\folder one												# Each folder is listed, recursively, as it indexes them.
	C:\path\to\folder one/sub dir...........							# A Single dot is displayed for each indexed file in the folder.
	C:\path\to\folder one/other sub dir
	C:\path\to\folder one/other sub dir/some folder
	C:\path\to\folder one/other sub dir/some folder/sub dir...

	Getting list of files in [D:\path\to\folder two]

	D:\path\to\folder two
	D:\path\to\folder two/boring folder
	D:\path\to\folder two/boring folder/a..................
	D:\path\to\folder two/boring folder/b........
	WARNING: [D:\path\to\folder two/boring folder/b/some file.zip] is a duplicate of [D:\path\to\folder two/boring folder/a/file with same contents.zip]

	Listing files in [C:\path\to\folder one] but not in [D:\path\to\folder two]
	C:\path\to\folder one/sub dir/foo.png
	C:\path\to\folder one/other sub dir/some folder/sub dir/bar.gif


## Development Instructions

1. Edit `compare-directories.php`
2. Run `bamcompile.exe compare-directories.php`

I've provided a `compare-directories.bat` which runs the above, then tests the script on some folders I was using.