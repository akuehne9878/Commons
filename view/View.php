<?php

namespace Commons\view;

class View {
	private $templateFile;
	private $childViews = array();
	
	public function __construct($templateFile) {
		$this->templateFile = $templateFile;
	}
	public function render() {
		if (file_exists ( $this->templateFile )) {
			if (!headers_sent()) {
			header('Content-Type: text/html; charset=utf-8');			
			}
			include $this->templateFile;
		} else {
			throw new \Exception ( 'no template file ' . $this->templateFile . ' available' );
		}
		
		foreach ($this->childViews as $childView) {
			$childView->render();
		}		
	}
	public function addChildView(View $childView) {
		array_push($this->childViews, $childView);
	}
}