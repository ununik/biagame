<?php
class HTML
{
	private $script = '';
	private $headlineTitle = 'BIAGAME';
	private $content = '';
	private $footer = 'footer';

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