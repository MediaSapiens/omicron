# HTML5 Kickstart

This is just a small extension to help Typo3 being better at HTML5. I thought I share it with the world.
This extension basically sets some Typo3-Values to help you produce cleaner HTML-Output and includes modernizr.

## Instructions

Download, install and don't forget to include the extenions in your root template (static templates from extensions).

## What this extension does

- It automatically includes a minimal custom version of [modernizr](http://www.modernizr.com/) in the head area of your page.
- Removes unnecessary markup no longer needed in HTML5 (no `type="text/css"` or `type="text/javascript"` etc.)
- JavaScript will be moved to the footer, except the modernizr-script
- Adds classes to the `html`-element using conditional comments for targeting IE8 and above
- Smaller meta-charset declaration. UTF-8, of course
- Sets the doctype to html5 and provides nice HTML-Cleaning
- Wraps `<article>` around default Typo3-Content elements
- Cleaner Headers and bodytext, no useless classes
- Strips all media-attributes from link-elements. It is always a good idea to declare the media-type of your CSS in the file itself using `@media print { ... }` etc.

## Notes

I use this extension in combination with my own custom set of files to kickstart development on a Typo3-Website.
I recommend using other extensions in combination with this one, especially _sourceopt_ to clean up your code.
Have a look at my other repos and if you have any questions, feel free to contact me.

## Credits

This would not have been possible without the guys from [http://modernizr.com](http://modernizr.com) and lot's of people from the Typo3 Community.

Thanks a lot.

## Contact

Feel free to ask on Twitter: @nebelschwade
