<?php
/*
*
* Verbatim Render Service
* Author: Aaron Berkowitz (@asberk)
* https://github.com/nclud/verbatim-craft
*
*/
namespace Craft;

class Verbatim_RenderService extends BaseApplicationComponent
{

	public function render()
	{
		$plugin = craft()->plugins->getPlugin('verbatim');
	    $settings = $plugin->getSettings();
		craft()->templates->includeCssResource('verbatim/css/verbatim.css');
		craft()->templates->includeJsResource('verbatim/js/verbatim.js');
		$options = json_encode($settings->attributes);
		craft()->templates->includeJs("$(document).verbatim($options);");
	}
}
