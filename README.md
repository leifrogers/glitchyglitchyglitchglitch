# A Proper README

## About

Pseudo-glitch-based program that is based on applying random effects from the
imagick library for php. In short, it selects an image from the images folder
and does glitchy things to it.


## Requirements

* PHP
     * [windows php binary](https://windows.php.net/download#php-7.2)
     * linux: i assume it's already installed on most distributions however a
       `sudo apt-get install php` should do the trick for debian types `sudo dnf
       install php` for fedora
     
* Imagemagick/Imagick enabled
     * [installing php-imagick](http://php.net/manual/en/imagick.setup.php) (a
       bit convoluted through all of the comments but, for the most part, easy
       to extrapolate and apply to your use case)

* Apache/Nginx 
    * (i run it on nginx but there's no real reason for doing so over apache.
      apache will most certainly run better out of the box)
    * for most uses (windows) i'd say grab a [bitnami wampt
 stack](https://bitnami.com/stack/wamp), install and place this folder inside of
 the html folder (wherever it gets installed) however if you're running linux a
 simple `sudo apt-get install apache2` for ubuntu or a `sudo dnf install httpd`
 for fedora and you'll get hooked up.
    * NOTE: you most certainly don't need the M part of the WAMP/LAMP stack for
      this to work. The A and the P parts however...yes.

## Installation

once the requirements are met it should be a simple process of placing this
folder into the web server's root folder and then access it through the
localhost (ie. http://localhost/glitchyglitchyglitchglitch/glitch.php - also -
maybe rename the folder because that is a hassle to type in but fun when i
made it! **sigh**)

## Process

accessing glitch.php in the browser will result in a random image from the
images folder being chosen, operated on, and then displayed.

per the original design-- this doesn't save images, only displays them but this
can easily be changed.

## Miscellaneous

* I'm probably overlooking something but can't think of it at the moment.

* this is the exact process that created this: [1984](https://leifrogers.com/1984)
