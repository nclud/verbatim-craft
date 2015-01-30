Verbatim for Craft CMS
===========

Verbatim is a jQuery plugin that allows deep-linking directly to content. When installed, website visitors will be able to highlight text content (or select images), generate a direct link to the content, and share the link via Twitter. When a user clicks on the generated link, the page will scroll and highlight the selected content. It's magic.

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
