<?php

namespace Craft;

class Verbatim_RenderService extends BaseApplicationComponent
{

	protected $pluginRecord;
	protected $settings;

	public function __construct($pluginRecord = null)
	{
		if(is_null($this->pluginRecord))
		{
			$this->pluginRecord = PluginRecord::model();
		}
	}

	public function render()
	{
		$condition = "class = 'Verbatim'";
		$plugin_r = $this->pluginRecord->find($condition);
		$this->settings = $plugin_r->settings;
		$css = $this->prepareCss();
		$js = $this->prepareJS();
		craft()->templates->includeCss($css);
		craft()->templates->includeJs($js);
	}

	private function prepareJS()
	{
		
		$options = json_encode($this->settings);

		$js = <<<JSSTRING
		/*!
		* Verbatim.js 1.4.0
		*
		* Copyright 2014, nclud http://nclud.com
		* Released under the GNU GPLv3 license
		* http://www.gnu.org/licenses/gpl.html
		*
		* Built by Ramsay Lanier and Maxim Leyzerovich from nclud
		*
		* 
		*/
		!function(e){var t='<svg version="1.1" id="twitterLogo" class="verbatim-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve"> <path fill="#FFFFFF" d="M45,13.2c-1.4,0.6-2.9,1-4.5,1.2c1.6-1,2.8-2.5,3.4-4.3C42.4,11,40.8,11.7,39,12c-1.4-1.5-3.4-2.5-5.7-2.5c-4.3,0-7.8,3.5-7.8,7.8c0,0.6,0.1,1.2,0.2,1.8c-6.5-0.3-12.2-3.4-16-8.1c-0.7,1.1-1.1,2.5-1.1,3.9c0,2.7,1.4,5.1,3.5,6.5c-1.3,0-2.5-0.4-3.5-1c0,0,0,0.1,0,0.1c0,3.8,2.7,6.9,6.2,7.6c-0.7,0.2-1.3,0.3-2.1,0.3c-0.5,0-1,0-1.5-0.1c1,3.1,3.9,5.3,7.3,5.4c-2.7,2.1-6,3.3-9.7,3.3c-0.6,0-1.2,0-1.9-0.1c3.4,2.2,7.5,3.5,11.9,3.5c14.3,0,22.1-11.9,22.1-22.1c0-0.3,0-0.7,0-1C42.6,16.2,43.9,14.8,45,13.2z"/></svg>',n={highlightParent:!0,searchContainer:"body",highlightedClass:"highlight",highlightColor:"rgb(255,255,0)",selectedClass:"verbatim-selected-text",buttonClass:"verbatim-button-container",animated:!0,animationSpeed:2e3,scrollingOffset:200,allowImages:!0};e.fn.verbatim=function(o){var a=window.location.hash;a=a.replace("%C2%A0","%20");var i,s,l=decodeURIComponent(a).substr(1),c=e.extend({},n,o),r="",d=!1,g=/Firefox/.test(navigator.userAgent);"image"==l.substr(0,5)&&(l=l.substr(7),d=!0);var h=function(){var e=window.navigator.userAgent,t=e.indexOf("MSIE ");return t>0?parseInt(e.substring(t+5,e.indexOf(".",t))):0},u=function(t,n){if(d&&n.allowImages){var o=e("img[src$='"+t+"']");o.addClass(n.highlightedClass),o.css({outline:"5px solid "+n.highlightColor})}else{var a=m();for(a.collapse(document.body,0);window.find(t);)if(document.body.spellcheck=!1,g){document.body.contentEditable="true",document.execCommand("HiliteColor",!1,n.highlightColor);var i=a.focusNode.parentNode;e(i).addClass(n.highlightedClass),a.collapseToEnd(),document.body.contentEditable="false"}else{document.designMode="on",document.execCommand("HiliteColor",!1,n.highlightColor);var i=a.anchorNode.parentNode;e(i).addClass(n.highlightedClass),a.collapseToEnd(),document.designMode="off"}i=a.anchorNode.parentNode,e(i).addClass(n.highlightedClass)}n.animated&&(e(function(){e("html, body").animate({scrollTop:0},0)}),e(window).load(function(){e("html, body").animate({scrollTop:e("."+n.highlightedClass).offset().top-parseInt(n.scrollingOffset)},parseInt(n.animationSpeed))})),n.highlightParent&&e("."+n.highlightedClass).parent().addClass(n.highlightedClass)},m=function(){if(window.getSelection)return window.getSelection();if(document.getSelection)return document.getSelection();var e=document.selection&&document.selection.createRange();return e.text?e.text:!1},p=function(t){function n(){setTimeout(function(){e("body").append(o),C()},310),setTimeout(function(){e(o).addClass("on-page")},320)}if(e("."+c.buttonClass).removeClass("on-page"),setTimeout(function(){e("."+c.buttonClass).remove()},300),!e(t).hasClass(c.selectedClass)){var o=document.createElement("div");if(o.setAttribute("class",c.buttonClass),o.innerHTML='<p class="verbatim-info">Share this selection:</p>',c.allowImages&&e(t).is("img")&&!e(t).hasClass(c.selectedClass))console.log("hi"),r="image: "+e(t).attr("src"),n();else{var a=m();a.isCollapsed||(r=a.toString(),n())}}},C=function(){s=r,i=window.location.origin+window.location.pathname+"#"+encodeURIComponent(s),c.bitlyToken?e.getJSON("https://api-ssl.bitly.com/v3/shorten?",{access_token:c.bitlyToken,longUrl:i},function(e){i=200==e.status_code?e.data.url:window.location.origin+window.location.pathname+"#"+encodeURIComponent(s),w()}):(i=window.location.origin+window.location.pathname+"#"+encodeURIComponent(s),w())},w=function(){var n=document.createElement("textarea");n.setAttribute("class","verbatim-text-area"),n.setAttribute("wrap","off"),e("."+c.buttonClass).append(n),e(".verbatim-text-area").text(i),s.length>112&&(s=s.substring(0,112)+"..."),s='"'+s+'"';var o=document.createElement("a");o.setAttribute("class","verbatim-twitter-link"),o.href="https://twitter.com/intent/tweet?url="+encodeURIComponent(i)+"&text="+encodeURIComponent(s),e("."+c.buttonClass).append(o),e(o).append(t)};h()||(e(c.searchContainer).on("mouseup",function(t){return e(t.target).hasClass("verbatim-text-area")?(e(t.target).select(),!1):void p(t.target)}),l&&u(l,c))}}(window.jQuery);

		$(document).verbatim($options);
JSSTRING;

		return $js;
	}

	private function prepareCSS()
	{
		$css = <<<CSSSTRING
.verbatim-selected-text{
	position: relative;
}

.verbatim-button-container{
	position: fixed;
	width: 100%;
	background-color: rgb(83, 83, 83);
	bottom: 0px;
	left: 0px;
	padding: 5px;
	z-index: 10000000;
	text-align: center;
	box-sizing: border-box;
	transition: all 300ms ease-out;
	-webkit-transition: all 300ms ease-out;
	-moz-transition: all 300ms ease-out;
	transform: translateY(100px);
	-webkit-transform: translateY(100px);
	-moz-transform: translateY(100px);
}

.verbatim-button-container.on-page{
	transform: translateY(0px);
	-webkit-transform: translateY(0px);
	-moz-transform: translateY(0px);
} 

.verbatim-icon{
	height: 100%;
	padding: 5px;
	cursor: pointer;
	box-sizing: border-box;
}

.verbatim-icon circle, .verbatim-icon path{
	pointer-events:none;
}

.verbatim-wrapper{
	max-width: 400px;
	position: relative;
	margin: 0 auto;
}

.verbatim-text-area{
	position: relative;
	background-color: rgb(83, 83, 83);
	border: 2px solid white;
	color: white;
	max-width: 140px;
	height: 40px;
	padding: 10px;
	box-sizing: border-box;
}

.verbatim-info{
	color: white;
	font-size: .8rem;
	margin: 0;
}

.verbatim-twitter-link{
	height: 40px;
	display: inline-block;
	margin-left: 1rem;
} 
CSSSTRING;
		
		return $css;
	}
}
