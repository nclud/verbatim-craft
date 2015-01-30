Verbatim for Craft CMS
===========

Verbatim is a Craft plugin that allows deep-linking directly to content. When installed, website visitors will be able to highlight text content (or select images), generate a direct link to the content, and share the link via Twitter. When a user clicks on the generated link, the page will scroll and highlight the selected content. It's magic.

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
Verbatim comes with the following default settings:

###Highlight Parent Element
**default**: true

**type**: boolean

Set Highlight Parent Element to true if you want to highlight the parent element of the text that is selected.

###Search Container
**default**: 'body'

**type**: jQuery selector

Set the container that Verbatim will search for selected text. This will also limit the area in which content can be selected. If you only want a certain container to be selectable, make sure you change this setting using a jQuery selector(example: .content or #mainContainer);

###CSS Class To Add To Highlighted Elements
**default**: 'highlight'

**type**: string

Verbatim wraps the found content in a span element which is assigned a class, used to highlight the found text. You can change this class if you'd like, but make sure you update your CSS. 


###Default Color of Highlights
**default**: '#FFFF00'

**type**: hex color string

Pretty self-explanatory: this setting allows you to change the background color of the text when it is both selected and when it is found.


###CSS Class to Add To Selected Text When Copying Link
**deault**:'verbatim-selected-text'

**type**: string

When selected text from a Verbatim enabled container, Verbatim wraps the selected text in a span element. You can change this class if you'd like, but make sure you update your CSS. 

###CSS Class to Add To Copy Link Button
**default**: 'verbatim-button-container'

**type**: string

Verbatim appends a div element with two buttons insode of the span element that wraps the selected text. You can change the class of the buttom container, but make sure you update your CSS. 

###Enable Amimated Scrolling To Content
**default**: true

**type**:boolean

Animates scrolling to the content. Set to false to prevent animated scrolling.

###Speed of Scrolling Animation
**default**: 2000

**type**: integer

Sets the scrolling speed.

###Amount of Offset in Pixels From Top of Window
**default**: 200

**type**: integer

Sets the amount of offset(in pixels) from the top of found content. Verbatim will scroll to the found content's offset less the amount of offset. This allows for some spacing between the top of the window and the found content.


###Allow Images
**default**: true

**type**: boolean

By default, Verbatim will also allow users to select and share links to images as well. If you'd like to turn this feature off, uncheck this checkbox.

##Add Bitly Token to Enable Short Links

We highly recommend using Bitly to generate short links, and Verbatim works seamlessly with Bitly! All you need to do is add a [Bitly Authentication Token](http://dev.bitly.com/get_started.html). Simply add your token to the Verbatim plugin settings in the Craft control panel.

