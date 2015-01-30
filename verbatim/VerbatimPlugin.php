<?php

namespace Craft;

class VerbatimPlugin extends BasePlugin
{
	function getName()
	{
		return Craft::t('Verbatim');
	}

	function getVersion()
	{
		return '1.1';
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
			'searchContainer' => array(AttributeType::Mixed, 'default' => 'body'),
			'highlightParent' => array(AttributeType::Mixed, 'default' => "true"),
			'defaultStyling' => array(AttributeType::Mixed, 'default' => "true"),
			'animated' => array(AttributeType::Mixed, 'default' => "true"),
			'allowImages' => array(AttributeType::Mixed, 'default' => "true"),
			'animationSpeed' => array(AttributeType::Number, 'default' => 2000),
			'scrollingOffset' => array(AttributeType::Number, 'default' => 200),
			'addedClass' => array(AttributeType::Mixed, 'default' => 'verbatim-found-content'),
			'highlightedClass' => array(AttributeType::Mixed, 'default' => 'highlight'),
			'highlightColor' => array(AttributeType::Mixed, 'default' => '#FFFF00'),
			'selectedClass' => array(AttributeType::Mixed, 'default' => 'verbatim-selected-text'),
			'buttonClass' => array(AttributeType::Mixed, 'default' => 'verbatim-button-container'),
			'bitlyToken' => array(AttributeType::Mixed, 'default' => null)
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
			'defaultStyling',
			'animated'
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
