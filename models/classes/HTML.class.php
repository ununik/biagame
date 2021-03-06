<?php
class HTML
{
	private $getPage = 'home';
	private $script = '';
	private $css = '';
	private $headlineTitle = 'BIAGAME';
	private $title = 'BIAGAME';
	private $header = '';
	private $navigation = '';
	private $content = '';
	private $footer = 'footer';

	public function setGetPage($new)
	{
		$this->getPage = $new;
	}
	public function getGetPage()
	{
		return $this->getPage;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function addScript($new)
	{
		$this->script .= $new;
	}
	public function getScript()
	{
		return $this->script;
	}
	
	public function addCss($new)
	{
		$this->css .= $new;
	}
	public function getCss()
	{
		return $this->css;
	}

	public function getHeadlineTitle()
	{
		return $this->headlineTitle;
	}

	public function addToNavigation($new)
	{
		$this->navigation .= $new;
	}
	public function getNavigation()
	{
		return $this->navigation;
	}

	public function addHeader($new)
	{
		$this->header .= $new;
	}
	public function getHeader()
	{
		return $this->header;
	}

	public function addContent($new)
	{
		$this->content .= $new;
	}
	public function getContent()
	{
		return $this->content;
	}

	public function addToFooter($new)
	{
		$this->footer .= $new;
	}
	public function getFooter()
	{
		return $this->footer;
	}
}