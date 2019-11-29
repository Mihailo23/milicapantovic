=== SrbTransLatin ===
Contributors: pedjas
Tags: transliteration, serbian, cyrillic, latin, multilanguage, script
Requires at least: 2.6.1
Tested up to: 5.1.1
Stable tag: trunk

SrbTransLatin handles using Serbian language Cyrillic and Latin script. For Cyrillic content, visitor may choose to view it using Cyrillic or Latin. Optionaly it can do Russian. 

== Description ==

SrbTransLatin handles using Serbian or Russian language Cyrillic and Latin script. For Cyrillic content, visitor may choose to view it using Cyrillic or Latin.

Contents of the site should be written using Cyrillic script. Then, this plugin will allow users to choose to read contents in Cyrillic or Latin script.

If some contents is entered in Latin script, it would stay in Latin even if user chooses to use Cyrillic. Transliteration occurs only from Cyrillic to Latin script.

Site owner may set default for script to show Cyrillic or Latin.

Script also may be selected manually, by adding ?script=cir or ?script=lat to document url. If parameter is not specified default script is used.

Site owner may use widget to allow visitors to choose among Cyrillic and Latin script. He may choose if script options are shown as html links or items of combo box. By default, html link are dipslayed. He also may set if widget would show title or not.

When user selects script, his choice stays permanent while he is on site. All internal links within site are altered to contain information about selected script. This means, when link is copied and pasted to some other site, it would contain information which script to use for displaying contents. 

Initially, when new article is posted using Cyrillic script in title, permalink is created with conversion to Latin script. Site owner may turn it of.

Transliteration works for all feeds too (atom, rdf, rss, rss2).

**Searching site using both scripts**

Site search is possible in both Cyrilic and Latin script. 

When user searches site, regardless what script is used for search keyword, search would be attempted in both Latin and Cyrillic form. 

Transliteration of some letters from Serbian Latin to Cyrillic is not possible to be unique, so it may happen that some Latin searches are not properly transliterated, but that is something that cannot be fixed due to very nature of the Latin and Cyrilic scripts.

**Disabling transliteration for part of page contents**

When transliteration occurs, everything in the HTML document is transliterated from Cyrillic to Latin script except if contents is placed among [lang id="skip"] and [/lang] tags. This leaves user to mark part of the text he does not want to be transliterated at all, meaning, some parts of Cyrillic text may stay Cyrillic even if user chooses to view site in Latin script.

**Changing image depending on selected script**

If you want to add image on page which contains Cyrillic text and you want it to be replaced with image that contains Latin script then add -cir- as suffix in image name. On transliteration, Image name will be changed to have -lat- as suffix.

Example: filename-cir-.jpg will be replaced with filename-lat-.jpg

You have to provide Latin version image at same path as Cyrillic image is placed, of course.

You may use other delimiter besides "-". You have to set delimiter in plugin settings. Delimiter may be more than one character long. 

Script mark may be placed anywhere in path, not just file name.

If you want to test there are two example files available in img directory of a plugin.

**Using script selector on custom places**

If you need to put script selector in site template outside widgets areas then you can use function stl_show_selector() provided with plugin. Function accepts four parameters (all optional):

stl_show_selector (selector_type, oneline_separator, cyrillic_caption, latin_caption, inactive_script_only, show_only_on_wpml_languages)

*selector_type* chooses which type of selector to display: 

- links - list of choices in form of widget items

- list - list of choices in form of dropdown selection

- oneline - list of choices as one line separated by oneline_separator
	
Default value is 'oneline'
	
	
*oneline_separator* is a string that should be inservted between script selection items. Default value is '/'.

*cirillic_caption* is a string that should be used as caption for item of cyrillic sleection. Default is 'ћирилица'

*latin_caption* is a string that should be used as caption for item of latin sleection. Default is 'латиница'

*inactive_script_only* if checked dosplays only option to select inactive script, currently active script wil not be an option

*show_only_on_wpml_languages* contains list of WPML languages comma separated for which script selection swhould be visible

To use this function just call it from place where you need code to be inserted, like:

`<?php stl_show_selector('oneline', '/', 'ћирилица', 'латиница') ?>`

Selector templates are stored in plugins 'template' directory. IF you want to customiye, you may copy template to your template directory and customize there.


**Using script info in custom code**

You may use some info about script state for customizing templates. Here are available functions:

stl_get_current_script() - returns id of currently displayed script. It returns id as set in plugin options.

stl_is_current_cyrillic() - returns true if currently displayed script is Cyrillic.

stl_is_current_latin() - returns true if currently displayed script is Latin.

stl_get_cyrillic_id() - returns id of Cyrillic script as set in plugin settings.

stl_get_latin_id() - returns id of Lating script as set in plugin settings.

stl_get_script_identificator() - returns identificator used in URL to select script as set in plugin settings.


**Using script info as shortodes**

Shortcodes available:

[stl_get_current_script] - inserts currently displayed script.

[stl_get_script_identificator] - inserts identificator of current script. 

[stl_get_cyrillic_id] - inserts id of Cyrillic script

[stl_get_latin_id] - inserts id of Latin script

[stl_is_cyrillic]_content_[/stl_is_cyrillic] - enclosed content will be displayed only if current script is Cyrillic

[stl_is_latin]_content_[/stl_is_latin] - enclosed content will be displayed only if current script is Latin

You can use these to alter behavior or looks of contents depending on durrent language inplaces where you cannot insert PHP code to call plugin functions.


** Using transliteration for custom purposes

If you need to transliterate other content by your own code (probably your plugin), you may use function stl_transliterate(). It accepts string that has to be transliterated and otuputs transliterated text. This may be used to transliterate mail before sent or text file generated or for some other purpose.

The function has two parameters:

The first parameter is a string that should be transliterated.

The second paramter is optional. It instructs if output has to be in specific script. If omited, output will be in current script selected by site visitor. 

But, if you ned to output specific script you may set it by using script identificator. You may use functions stl_get_cyrillic_id() and stl_get_latin_id() to get identificators as set in plugin configuration (idnetificators are configurable).

Examples:

echo stl_transliterate($content);

echo stl_transliterate($content, stl_get_cyrillic_id());

echo stl_transliterate($content, stl_get_latin_id());




**Using cookies**

Site admin may turn on using cookies to save user's script selection. If turned on, each time user opens page curent script selection is saved in cookie. 

When user comes back to site using url that does not contain script identificator, site would use cookie and show content accordingly. If user comes to site using url that do contain script identificator, cookie would not be used - url has priority over cookie.

If cookies are used, script indentificator would not be added to urls.


**Configuration file**

There is config_example.php in SrbTransLatin directory. User may copy that to config.php and edit new file to set some additional options. This is supposed to use some rarely needed and very specific settings not needed by ordinaru users.


**Sanitizing file names on upload**

When files are uploaded to WordPress site, it is not good to let them have Cyrillic characters in file names. SrbTransLatin has optin to clean such characters and replace them with appropriate latin characters.

**Not sanitized file names and URL-s within page**

It happens that file sanitization on upload is not turned on, and actual uploaded files do have Cyrillic characters in names. By default such files will be accessible while site is viewed in Cyrillic but when Latin is chosen, Cyrillic characters will be removed. 

If you have this issue there is option in Settings to skip transliteration of file names and URL-s. Turn it on and file names and URL-s will stay intact.

If you have xDebug and you turn on skipping transliteration of files and URL-s it may happen that you get blank page or error message saying something like: "PHP Fatal error:  Maximum function nesting level of '100' reached, aborting!". That is because of limitation of 100 nesting levels in xDebug. To overcome it, use config.php in plugin directory to set $stl_config['xdebug_max_nesting_level'] to greater number. Plugin will set xDebug nesting levels accordingly.


**Fix url collisions with other plugins**

There are some plugins that also use default identificator 'lang', which SrbTransLatin uses to pass selected script information through url. To fix this there is an option to set this identificator. If you have problems with other plugins just change this to 'script' or 'lng', or something else as you like.

Pay attention that if you change this option, all previous urls containing script selection will become invalid. It is best to set this before site is heavily indexed or externally linked.


**Fix priority collisions with other plugins**

SrbTransLatin as a rule should be the last plugin executed, so it can process page content after all content is generated by other plugins. At least it should be the last of plugins that generate content.

By default, SrbTranslatin uses priority 99 to make good chance to be at the end of executing plugin list. If for some reason it does not work well, user can change priority. 

User should edit config.php and and check line:

$stl_config['priority'] = 9999;

User may change number 9999 to any other. Greater number is lower priority, meaning exexuting after plugins with lower number.


**WPML compatibility**

It is quote often that users of SrbTranslatin als use WPML and they meet with conflict as both plugins use the same language identificator 'lang'. SrbTransLatin has an option for user to set different language identificator to resolve conflict. It is recommend to use 'script' as identificator.

Moreover, on installation, SrbTranslatin will check if WPML is installed and it will change it's language identificator. Also, when conflict is possible, warning will be presented to user while in SrbTransLatin settings.

When setting widget, or using user have an option to set language identificators used by WPML which for widget will be invisible.


**Acknowledgements**

This plugin is developed inspired by two plugins WP Translit by Aleksandar Urošević and srlatin by Kimmo Suominen. I actually merged functionality of these two and expanded it with a lot of new functionality I needed for my site, and later with new functionality asked by plugin users.

Vanja Đurić suggested skipping transliteration of file names and URL-s and provided example code to do that, which I included with minor alterations. Vanja also suggested solution for xDebug max_nesting_level issue.



== Installation ==

1. Extract package and upload `srbtranslatin` directory to `/wp-content/plugins/srbtranslatin` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add widget `Serbian Transliteration (links)` or `Serbian Transliteration (list)` and set it's options:
    - set title for script selection wigdet (default: Избор писма)
    - set if title should be shown for script selection widgets (default: title is not shown)
    - set if script selection is displayed as web links or options of combo box

Open Settings / SrbTransLat and set parameters according to your needs:

- set default script to be used if user do not make choice of script (default: Cyrillic)
- set if you want selected script to be saved in visitor's browser cookie
- set if permalinks are autogenerated in Latin script even if title is in Cyrillic (default: conversion to Latin)


== Frequently Asked Questions ==

= Can this transliterate my blog which uses Serbian Latin script into Serbian Cyrillic? =

No. Such conversion is hard if impossible due to not unique transliteration rules. It is reccomended that you create contents on your site using Cyrillic script if you need both scripts.


= Plugin transliterates everything but page title in HEAD section of HTML? =

This happens on some installations. It seems it is dependable on template used, like some templates interfere with wp hooks regarding page title.


= I use multilanguage plugin along with SrbTransLatin, but it does not work well? =

Usually, problems with multilanguage plugins is interference with url parameter name. Try changing default script identification in SrbTransLatin options.


= When I change to non default script some images are not shown on page? =

Use Latin alphabet in image file names only. If you use Cyrillic letters in file names, they will be transliterated to rendering wrong file name.


= I have some images on page that I want to switch from Cyrillic and Latin version along with text contents? =

Prepare original image with Cyrillic contents by adding keyword -cir- in image file name, for example myimage-cir-.jpg. Prepare Latin version of the same image naming it using -lat- keyword, like myimage-lat-.jpg. When page is displayed, image will be loaded regarding selected script. Delimiter character '-' may be customly set.


= I tried to use script tags in image names but it does not work =

On some WordPress installations, when you upload images WordPress strips some characters from file names. Check if files have proper file names after upload.

If some characters are stripped you may try uploading file directly (using FTP for example). 

If file name script delimiter is stripped you may change it in plugin settings. You may use any character acceptable in file name syntax. Even better, you may set several characters for delimiter to avoid collisions. Do not forget to name all files to match new delimiter.


= I uploaded file with Cyrillic characters in file name. Plugin transliterates it to Latin so I end up with invalid file name =

You should not use Cyrillic characters in file name. It is not that just this plugin does not like it, it is wrong on multiple  levels. Always use Roman Latin characters in file names. 

However, as it frequently happens that users upload files with Cyrillic character in file names, SrbTranslatin has option to sanitize such file names. If turned on, it will replace Cyrillic characters with appropriate Latin characters and rename file on upload. That will make sure that you have proper file names.


= How to prevent part of the text to be transliterated to Latin? =

Place text you do not want to be transliterated into block surrounded by [lang id="skip"] and [/lang]. 

Example: [lang id="skip"]this text will not be transliterated[/lang]


= Some contents of the page does not work properly when SrbTransLatin is active? =

If you use some JavaScript on page and it autogenerates objects using page contents, it may hapen that JavaScript uses Cyrillic contents in object names or other language elements. When SrbTransLatin renders page it would process all Cyrillic contents including JavaScript. Make sure that IDs of objects (images especially) are not in Cyrillic script.


= Some contents of the page is not transliterated to Latin? =

- Check if you used [lang id="skip"] and [/lang] on that block of text.

- Make sure your plugin is run with lowest priority so it process page contents after it is all generated by other plugins.

- Contents of the page which is dynamically generated (JavaScript or so) usually cannot be transliterated using SrbTransLatin.


= If visitor types in Latin keyword for site search would that work? =

Yes. If user types in Latin keyword search would be transliterated to Cyrillic and search would be attempted for both scripts.


= I have some content in articles in Latin script. If visitor types in Cyrillic keyword for site search would he find Latin content too? =

Yes. If user types in Cyrillic keyword search would be transliterated to Latin and search would be attempted for both scripts.


= I want to show script selection in custom template, not by widget. Is it possible? =

Yes. See description of function stl_show_selector() provided by this plugin.


= I want to customize template, based on selected script. Is it possible? =

Yes. See description of functions stl_show_selector(), stl_get_current_script(), stl_is_current_cyrillic(), stl_is_current_latin(), stl_get_cyrillic_id(), stl_get_latin_id(), and stl_get_script_identificator() provided by this plugin.


= I want to customize site, based on selected script, but I cannot insert PHP code as suggested. Is it possible? =

Yes. You may use shortcodes provided by plugin. Check plugin description.


= How to display some content only if specific script is used? =

You may use shortcodes [stl_is_cyrillic] or [stl_is_latin] to control if part of the content should be visible only if specific script is displayed.

Also, you may use PHP function stl_is_current_cyrillic() and stl_is_current_latin() it that suits your needs more.


= One of the users uploaded image with Cyrillic characters in name. When viewed in Latin, image is not visible. How can I fix that? =

This happens because SrbTransLat transliterates everything, including file names.

My strong suggestion is to disallow using Cyrillic script in file names, not just on your site but anywhere. Using non Latin characters in file names is always bad idea and just leads to all kinds of complications. 

You have option in plugin settings to turn sanitization of uploaded files which will replace all Cyrillic in file names on upload. So, even if user uploads Cyrillic named file, it will end in Latin script.

If you already have files with Cyrillic names and you are not willing to replace them with non Cyrillic file names, there is an option to skip transliteration of file names and URL-s. Turn that on, and images will be displayed correctly.


= After I turned on skipping transliteration for file names i get blank page. Help! =

Most likely you use xDebug on your site and it has default limitation of 100 nesting levels which may be to low for page with number of links. Check in plugin description how to increase xdebug_max_nesting_level.


= This is really nice script which I use on my site. Can I donate some money to the author? =

No. This is free to use script. If you want to show appreciation, spread the word, share the link to http://pedja.supurovic.net/projekti/srbtranslatin


== Changelog ==

= 1.65 =

Improved conversion from Latin to Cyrillic for search 

= 1.64 =

Fixed bug when cookies are used for script identification, image replacement based on macro in file name stopped working.


= 1.63 =

Fixed bug in search option, it searched all keywords as single keyword. Now post will be found if any of search keywords is found.


= 1.62 =

Fixed compatibility with PHP 7.2

Global function stl_transliterate() got additional optional paremeter to force output to specific script.


= 1.61 =

Improved cookie support. Now if cookies are used to keep script selection, script selection is not used in URLs.


= 1.6 =

Global function stl_transliterate() added. It allows developers to use transliteration when needed.

= 1.59 =

Renamed function get_current_scheme() due to conflict with theme kallyas which has function with the same name.

= 1.58 =

Cookies support is back! You may enable using cookies to save script selection.

= 1.57 =

New functionality: regardless what script visitor uses for site search, site will be searched for both Cyrillic and Latin variant of keyword.

= 1.56 =

Fixed issue forcing http protocol in some situations.
Fixed issue site search results always displayed in default script
Fixed issue site search not possible using Latin keywords

= 1.55 =

Fixed issue with anchors in URL-s. If url contains anchor, parameter to change script was not inserted properly.

= 1.54 =

Fixed issue with setting script parameter to internal links if http and https links are mixed on page.

Optimized for better resource usage.

= 1.53.1 =

Typo fix.

= 1.53 =

Improoved transliteration procedure.

= 1.52 =

Added shortcodes [stl_is_cyrillic], [stl_is_latin]

= 1.51 =

Improoved transliteration procedure for better resource usage.

Documentation and translation updates.

Minor bugfixes.

= 1.50 =

Added shortcodes [stl_get_script_identificator], [stl_get_current_script], [stl_get_cyrillic_id] and [stl_get_latin_id]

Fixed bug reporting invalid variable name.

Fixed possible issue with xDebug max nesting levels.

Documentation updated.

= 1.49 =

Removed paragaph tag in one line script selection template and replaced with span to allow better blending in page design. span tag has css class name stl_oneline so it may be visually set by css.

Images icon-cir-.png and icon-lat-.png added to img directory for demonstration purposes.

= 1.48 =

Added functionality suggested by Vanja Djuric not to transliterate file names and urls. Vanja provided code.

Removed saving current display language to cookie.

Added Reset button in Settings form to allow reseting to default.

Fixed plugin did not remove settings from database at deinstallation. Now, when plugin is deinstalled, it clears settings too.

= 1.47 =

Vulnerability fix.

= 1.46 =

Changed priority of hooks so it should better catch page contents to transliterate. Might solve issues some sites have not translating head titles.

Added option to use Russian transliteration instead of Serbian.

= 1.45 =

HTML code extracted to external template files for easier customization.

= 1.44 =

Fixed url handling when default language is Latin.

= 1.43 =

Fixed constructor warning with PHP 7.

= 1.42 =

Added globaly available functions:
stl_get_current_script(), stl_is_current_cyrillic(), stl_is_current_latin(), stl_get_cyrillic_id(), stl_get_latin_id(), stl_get_script_identificator().

= 1.41 =

New option to sanitize Cyrillic characters from file name on file name upload.

Default file script delimiter is now '-'. From some version, Wordpress made earlier delimiter '=' unusable, so there is no point of using it any more.

= 1.40 =

Removed language query parameter adding to image urls in src, srcset and background as unnecessary overhead.

= 1.39 =

Fixed bug with option to check if user web browser supports Cyrilic. Option removed.

Fixed bug with inserting language identificator in links when not necessary.

= 1.38 =

More fixes parsing file name tags in links within page.

Added new option. User now can set delimiter used for marking language in file name or path.

= 1.37 =

Additional fix parsing img tags for Cyrillic and Latin image replacement.

= 1.36 =

Fixed bug with parsing [lang] tags, and also parsing img tags for Cyrillic and Latin image replacement.

= 1.35 =

Altered tansliteration procedure, which should now allow transliterated posts to be used even with javascript/ajax.

= 1.34 =

Fixed bug on handling before widget and after widget.

Fixed bug transliterating blog header title.

= 1.33 =

Added option to display only option to select non current script

Addedd option for WPML users to set if thez want SrbTransLatin Widget to be invisible on specific languages.

= 1.31 =

Fixed bug with transliterating title to permalink option in settings

Added helper for conflicts with WPML. WPML uses 'lang' as language identificator which is the same as default for SrbTransLatin. Now if WPML is installed default changes to 'script', and if identificator is set to 'lang' warning is shown to user.


= 1.30 =

Fixed bug with transliterating title to permalink


= 1.29 =

Added external configuration using config.php


= 1.28 =

Fixed displaying cookie using state setting option.


= 1.27 =

Function stl_show_selector() expanded with two new parameters allowing setting captions for script selection items.

= 1.26 =

Added option to let user change script identificator in url.

Added option to switch image on script change. If you use filename=cir=.jpg as image name, if latin script is selected, then image named filename=lat=.jpg will be used instead.

= 1.25 =

Changed priority of the plugin so it allows other plugins to alter contents before transliteration.


= 1.24 =

Added option which allows user to customize title for Cyril and Latin options in widget.


= 1.23 =

Minor fix. Title of 'latinica' was displayed using Cyrillic script. Changed to Latin script.

= 1.22 =

Fixed permalink transliteration issues with the latest WordPress version.

Added function stl_show_selector() which may be used to insert script selector anywhere in template.


= 1.21 =

Added full support for exernal language files and Serbian translation included.


= 1.20 =

Partially rewritten code according to new WordPress API. Also, some new functionality added.


== Upgrade Notice ==

= 1.20 =

Widget is rewritten. Widget settings are separated from plugin options to widget options form. Thus, after update you will loose widget settings. Do not forget to check them out after upgrade.