<?php

class Qiupid_Builder_Footer_Item_Social_Icons extends Qiupid_Builder_Item_Social_Icons {
	public $id;
	public $section;
	public $class;
	public $selector;
	public $panel;

	function __construct() {
		$this->id      = 'footer-social-icons';
		$this->section = 'footer_social_icons';
		$this->class   = 'footer-social-icons';
		$this->panel   = 'footer_settings';
		parent::__construct();
	}
}

Qiupid_Customize_Layout_Builder()->register_item( 'footer', new Qiupid_Builder_Footer_Item_Social_Icons() );
