Verbatim for Craft CMS
===========

[Verbatim](http://verbat.im/) is a Craft plugin that allows deep-linking directly to content. When installed, website visitors will be able to highlight text content (or select images), generate a direct link to the content, and share the link via Twitter. When a user clicks on the generated link, the page will scroll and highlight the selected content. It's magic.

Verbatim was built by [Ramsay Lanier](https://github.com/ramsaylanier) and [Maxim Leyzerovich](https://github.com/duqe) from [nclud](http://nclud.com), and adapted for Craft by [Aaron Berkowitz](https://github.com/aberkie).

Verbatim is released under the [GNU GPLv3 license](http://www.gnu.org/licenses/gpl.html). 

## Installation
1 - Ensure jQuery is included in your template.
```
{% includeJsFile path/to/jquery.js first %}
```
2 - Download the Verbatim plugin folder and upload it to the Craft plugins folder on your server (craft/plugins/).

3 - Install the Verbatim plugin from your control panel (admin/settings/plugins). 

4 - Adjust any default settings (admin/settings/plugins/verbatim).

5 - Include `{{ craft.verbatim.verbatim }}` in any template you want to use Verbatim.

##Settings
Verbatim comes with the settings listed below. All settings can be easily adjusted in the plugin settings from the Craft control panel. (http://www.yoursite.com/admin/settings/plugins/verbatim)

###Search Container
**default:** 'body'

**type:** jQuery selector

Set the container that Verbatim will search for selected text. This will also limit the are in which content can be selected. If you only want a certain container to be selectable, make sure you change this setting using a jQuery selector (example: .content of #mainContainer).

###Speed of Scrolling Animation
**default:** 2000

**type:** integer

Set the animated scrolling speed in miliseconds. 

###Scrolling Offset
**default:** 200

**type:** integer

Sets the amount of offset (in pixels) from the top of found content. Verbatim will scroll to the found content's offset less the amount of offset. This allows for some spacing between the top of the window and the found content.

###CSS Class To Add to Highlighted Elements
**default:** highlight

**type:** string

Verbatim wraps the found content in a span element which is assigned a class, used to highlight the found text. You can change this class if you'd like, but make sure you update your CSS.

###CSS Class to Add to Copy Link Button
**default:** verbatim-button-container

**type:** string

###Bitly Token for Short Links
We highly recommend using Bitly to generate short links. Grab a [Bitly Authentication Token](http://dev.bitly.com/get_started.html) and add it to your settings.


##Changelog

###1.1.1
* added IE check to prevent the plugin from firing in IE.

###1.1.2
* minified JS and update Verbatim to 1.3.0

###1.1.3
* Updated documentation and code to use RGB instead of hex

###1.1.4
* Removing sepllcheck issues

###1.2.0
* Updating to Verbatim 1.4.0 with new user interface and stability
* Removed some unnecessary settings
* Updated documentation