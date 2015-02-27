<?php 
/*
*
* Verbatim Variable
* Author: Aaron Berkowitz (@asberk)
* https://github.com/nclud/verbatim-craft
*
*/
namespace Craft;

class VerbatimVariable
{
	public function verbatim()
	{
		return craft()->verbatim_render->render();
	}
}
