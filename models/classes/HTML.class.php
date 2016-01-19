<?php
class HTML
{
	private $getPage = 'home';
	private $script = '';
	private $headlineTitle = 'BIAGAME';
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

	public function addScript($new)
	{
		$this->script .= $new;
	}
	public function getScript()
	{
		return $this->script;
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