# SVG Social Menu

[Justin Tadlock](http://themehybrid.com/) have invented [social nav menu](http://justintadlock.com/archives/2013/08/14/social-nav-menus-part-2) system. Pretty much everybody is using it. It is great!

But lately I've been thinking can we use SVG icons in Social Menu instead of icon fonts. There are several articles about SVG vs icon fonts:

* [Seriously, Don’t Use Icon Fonts](http://blog.cloudfour.com/seriously-dont-use-icon-fonts/)
* [Our SVG Icon Process](http://blog.cloudfour.com/our-svg-icon-process/)
* [Inline SVG vs Icon Fonts](https://css-tricks.com/icon-fonts-vs-svg/)
* [Bulletproof Accessible Icon Fonts](https://www.filamentgroup.com/lab/bulletproof_icon_fonts.html)
* [Tips for Creating Accessible SVG](http://www.sitepoint.com/tips-accessible-svg/)

This theme is showcasing that we can use SVG icons in Social Menu. Or can we? That's where I need your help:

* Is there a better way to handle SVG than using `walker_nav_menu_start_el` filter and PHP? Check `functions.php` file.
* Is inlining SVG using `get_template_part( 'svg-icons' );` best solution? Should we use `reguire_once` instead or just `svg-icons.svg` file. Check `header.php` file.
* Is SVG social menu system accessible?
* If you forget IE6-8 does it work in all browsers?

## Demo

## Copyright and License

The following resources are not included with the theme but are external resources linked to within the theme.

* [Lato](https://www.google.com/fonts/specimen/Lato) by Łukasz Dziedzic - Licensed under the [SIL Open Font License, version 1.1](http://scripts.sil.org/OFL).

All other resources and theme elements are licensed under the [GNU GPL](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html), version 2 or later.

&copy; 2016 [Sami Keijonen](https://foxland.fi/).

## Changelog

### Version 1.0.0 - February 18, 2016

* Everything's new!