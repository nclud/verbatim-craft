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
* Verbatim.js 1.3.0
*
* Copyright 2014, nclud http://nclud.com
* Released under the GNU GPLv3 license
* http://www.gnu.org/licenses/gpl.html
*
* Built by Ramsay Lanier and Maxim Leyzerovich from nclud
*
* 
*/
!function(e){var t,o,n='<svg version="1.1" id="verbatimLogo" class="verbatim-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve"><path fill="#FFFFFF" d="M9,10.1c-4,0.8-6.9,3.1-7.3,6.2c-0.2,1.8,0,3.7,1.1,5.2c1.5,2,3.2,3.1,6.2,2.8c1.5-0.1,1.7-1.4,1.1-1.6c-0.5-0.2-3.1-1.7-2.8-6c0.1-1.7,0.4-3.8,2.6-4.8C10.8,11.3,10,9.9,9,10.1z"/><path fill="#FFFFFF" d="M39.7,11.1c-1.5,9-6.9,16.3-10.8,23.2c-0.1,0.1-0.3,0.1-0.3-0.1c0.7-6.5,1.8-18,1.8-19.3s0.2-5.8-7.1-5.8s-11,3.2-11.8,7.3c-0.4,1.8,0.1,3.7,1.3,5.2c1.6,1.9,4.1,2.9,7.1,2.5c1.5-0.2,2-0.9,2-1.6c0-0.6-0.5-1.3-1.8-1.5c-0.5,0-2-0.2-2.1-3.1c0-1.3,0.3-2.2,1-2.9c0.7-0.7,1.4-1.2,2.9-1.1c1.5,0.1,1.7,1.4,1.7,2.1c0,0.6-1.3,21.6-0.3,26.2c0,0.1,0.1,0.1,0.1,0.1h7.8c0,0,0.1,0,0.1-0.1c3.6-5.1,15.2-25.4,16.7-31c0-0.1,0-0.2-0.1-0.2h-7.9C39.7,11,39.7,11.1,39.7,11.1z"/></svg>',a='<svg version="1.1" id="twitterLogo" class="verbatim-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve"> <path fill="#FFFFFF" d="M45,13.2c-1.4,0.6-2.9,1-4.5,1.2c1.6-1,2.8-2.5,3.4-4.3C42.4,11,40.8,11.7,39,12c-1.4-1.5-3.4-2.5-5.7-2.5c-4.3,0-7.8,3.5-7.8,7.8c0,0.6,0.1,1.2,0.2,1.8c-6.5-0.3-12.2-3.4-16-8.1c-0.7,1.1-1.1,2.5-1.1,3.9c0,2.7,1.4,5.1,3.5,6.5c-1.3,0-2.5-0.4-3.5-1c0,0,0,0.1,0,0.1c0,3.8,2.7,6.9,6.2,7.6c-0.7,0.2-1.3,0.3-2.1,0.3c-0.5,0-1,0-1.5-0.1c1,3.1,3.9,5.3,7.3,5.4c-2.7,2.1-6,3.3-9.7,3.3c-0.6,0-1.2,0-1.9-0.1c3.4,2.2,7.5,3.5,11.9,3.5c14.3,0,22.1-11.9,22.1-22.1c0-0.3,0-0.7,0-1C42.6,16.2,43.9,14.8,45,13.2z"/></svg>',i={highlightParent:!0,searchContainer:"body",highlightedClass:"highlight",highlightColor:"rgb(255,255,0)",selectedClass:"verbatim-selected-text",buttonClass:"verbatim-button-container",animated:!0,animationSpeed:2e3,scrollingOffset:200,allowImages:!0};e.fn.verbatim=function(s){var l=window.location.hash;l=l.replace("%C2%A0","%20");var c,r,d=decodeURIComponent(l).substr(1),g=e.extend({},i,s),h="",m=!1,u=!1,f=/Firefox/.test(navigator.userAgent);"image"==d.substr(0,5)&&(d=d.substr(7),u=!0);var C=function(){var e=window.navigator.userAgent,t=e.indexOf("MSIE ");return t>0?parseInt(e.substring(t+5,e.indexOf(".",t))):0},p=function(t,o){if(u&&o.allowImages){var n=e("img[src$='"+t+"']");n.addClass(o.highlightedClass),n.css({outline:"5px solid "+o.highlightColor})}else{var a=w();for(a.collapse(document.body,0);window.find(t);)if(f){document.body.contentEditable="true",document.execCommand("HiliteColor",!1,o.highlightColor);var i=a.focusNode.parentNode;e(i).addClass(o.highlightedClass),a.collapseToEnd(),document.body.contentEditable="false"}else{document.designMode="on",document.execCommand("HiliteColor",!1,o.highlightColor);var i=a.anchorNode.parentNode;e(i).addClass(o.highlightedClass),a.collapseToEnd(),document.designMode="off"}i=a.anchorNode.parentNode,e(i).addClass(o.highlightedClass)}o.animated&&(e(function(){e("html, body").animate({scrollTop:0},0)}),e(window).load(function(){e("html, body").animate({scrollTop:e("."+o.highlightedClass).offset().top-parseInt(o.scrollingOffset)},parseInt(o.animationSpeed))})),o.highlightParent&&e("."+o.highlightedClass).parent().addClass(o.highlightedClass)},w=function(){if(window.getSelection)return window.getSelection();if(document.getSelection)return document.getSelection();var e=document.selection&&document.selection.createRange();return e.text?e.text:!1},v=function(i){function s(){var n;e(d).append(l),e('span[style*="'+g.highlightColor+'"]').addClass(g.selectedClass),n=o-t>15?0:e(d).outerWidth()/2-e("."+g.buttonClass).width()/2,e("."+g.buttonClass).css({left:n})}if(e("."+g.buttonClass).remove(),e(".verbatim-text-area").remove(),e("."+g.selectedClass).contents().unwrap(),g.allowImages&&e(i).is("img")&&!e(i).hasClass(g.selectedClass)){var l=document.createElement("div");l.setAttribute("class",g.buttonClass),l.innerHTML=n+a;var c=e(i).position();e(i).before(l),e(l).css({top:c.top,left:c.left}),h="image: "+e(i).attr("src")}else if(!e(i).hasClass(g.selectedClass)){var l=document.createElement("div");l.setAttribute("class",g.buttonClass),l.innerHTML=n+a;var r=w();if(!r.isCollapsed){if(f){document.body.contentEditable="true",document.execCommand("HiliteColor",!1,g.highlightColor);var d=r.focusNode.parentNode;s(),document.body.contentEditable="false"}else{document.designMode="on",document.execCommand("HiliteColor",!1,g.highlightColor);var d=r.anchorNode.parentNode;s(),document.designMode="off"}h=r.toString()}}},b=function(){e(".verbatim-text-area").remove(),r=h,c=window.location.origin+window.location.pathname+"#"+encodeURIComponent(r),g.bitlyToken?e.getJSON("https://api-ssl.bitly.com/v3/shorten?",{access_token:g.bitlyToken,longUrl:c},function(e){200==e.status_code&&(c=e.data.url,x())}):(c=window.location.origin+window.location.pathname+"#"+encodeURIComponent(r),x())},x=function(){if(m){r.length>112&&(r=r.substring(0,112)+"..."),r='"'+r+'"';var t=document.createElement("a");t.href="https://twitter.com/intent/tweet?url="+encodeURIComponent(c)+"&text="+encodeURIComponent(r),document.body.appendChild(t),t.click()}else{var o=document.createElement("textArea");o.setAttribute("class","verbatim-text-area"),o.setAttribute("wrap","off"),e("."+g.buttonClass).append(o),e(".verbatim-text-area").val(c),o.select()}};C()||(e(g.searchContainer).on("mousedown",function(e){t=e.offsetY}),e(g.searchContainer).on("mouseup",function(t){if(o=t.offsetY,e(t.target).is("#verbatimLogo"))m=!1,b();else if(e(t.target).is("#twitterLogo"))m=!0,b();else{if(e(t.target).hasClass("verbatim-text-area"))return!1;v(t.target)}}),d&&p(d,g))}}(window.jQuery);

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
	position: absolute;
	width: 90px;
	height: 40px;
	background-color: rgb(83, 83, 83);
	top: -50px;
	z-index: 1000;
	box-sizing: border-box;
}

.verbatim-button-container::after{
	content: '';
	position: absolute;
	width: 8px;
	height: 8px;
	background-color: rgb(83, 83, 83);
	left: 50%;
	margin-left: -4px;
	bottom: -4px;
	transform: rotate(45deg);
	box-sizing: border-box;
}

.verbatim-icon{
	width: 50%;
	height: 100%;
	padding: 5px;
	cursor: pointer;
	box-sizing: border-box;
}

.verbatim-icon circle, .verbatim-icon path{
	pointer-events:none;
}

.verbatim-icon:first-of-type{
	border-right: 1px solid white;
}

.verbatim-text-area{
	position: absolute;
	background-color: rgb(83, 83, 83);
	border: none;
	border-right: 10px solid rgb(83, 83, 83);
	color: white;
	top: -40px;
	width: 140px;
	height: 35px;
	left: 50%;
	margin-left:-75px;
	padding: 10px;
	box-sizing: border-box;
}
CSSSTRING;
		
		return $css;
	}
}
