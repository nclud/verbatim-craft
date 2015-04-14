<?php
/*
*
* Verbatim Main Plugin File
* Author: Aaron Berkowitz (@asberk)
* https://github.com/nclud/verbatim-craft
*
*/
namespace Craft;

class VerbatimPlugin extends BasePlugin
{
	function getName()
	{
		return Craft::t('Verbatim');
	}

	function getVersion()
	{
		return '1.2.2';
	}

	function getDeveloper()
	{
		return 'nclud';
	}

	function getDeveloperUrl()
	{
		return 'http://nclud.com/';
	}

	public function hasCpSection()
	{
		return false;
	}

	protected function defineSettings()
	{
		return array(
			
			'highlightParent' => array(AttributeType::Mixed, 'default' => 'true'),
			'searchContainer' => array(AttributeType::Mixed, 'default' => 'body'),
			'highlightedClass' => array(AttributeType::Mixed, 'default' => 'highlight'),
			'highlightColor' => array(AttributeType::Mixed, 'default' => 'rgb(255,255,0)'),
			'selectedClass' => array(AttributeType::Mixed, 'default' => 'verbatim-selected-text'),
			'buttonClass' => array(AttributeType::Mixed, 'default' => 'verbatim-button-container'),
			'animated' => array(AttributeType::Mixed, 'default' => "true"),
			'bitlyToken' => array(AttributeType::Mixed, 'default' => ''),
			'animationSpeed' => array(AttributeType::Number, 'default' => 2000),
			'scrollingOffset' => array(AttributeType::Number, 'default' => 200),
			'allowImages' => array(AttributeType::Mixed, 'default' => "true")
		);
	}

	public function getSettingsHtml()
	{
		return craft()->templates->render('verbatim/settings', array(
			'settings' => $this->getSettings()
		));
	}

	public function prepSettings($settings)
	{

		$checkboxes = array(
			'highlightParent',
			'animated',
			'allowImages'
		);


		foreach($checkboxes as $checkbox)
		{
			if( !isset($settings[$checkbox]) )
			{
				$settings[$checkbox] = "false";
			}
		}

		return $settings;

	}

}
