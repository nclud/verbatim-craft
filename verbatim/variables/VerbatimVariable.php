<?php 

namespace Craft;

class VerbatimVariable
{
	public function verbatim()
	{
		return craft()->verbatim_render->render();
	}
}