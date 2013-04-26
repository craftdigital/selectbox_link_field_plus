<?php
	/**
	 * (c) 2011
	 * Author: Owen Waterhouse
	 * Date: 29-03-13
	 * Time: 12:50
	 */



	require_once(EXTENSIONS.'/selectbox_link_field_plus/views/view.php');



	// The class name must be 'SBLPView_[filename - view. and .php (ucfirst)]':
	Class SBLPView_Simple extends SBLPView
	{
		private static $assets_loaded = false;



		public function getName(){
			return __("Simple");
		}

		public function getHandle(){
			return 'simple';
		}

		public function generateView(XMLElement &$wrapper, $fieldname, $options, fieldSelectBox_Link_plus $field){
			parent::generateView($wrapper, $fieldname, $options, $field);

			$createbtn_text = __('Create New');

			$header = new XMLElement('div', null, array('class' => 'sblp-simple-header'));

			/* Add button */
			if( $field->get('enable_create') == 1 ){
				$related_sections = $field->findRelatedSections();

				usort($related_sections, function($a, $b){
					return strcasecmp($a->get('name'), $b->get('name'));
				});
			}
			
			if( $field->get('enable_create') == 1 ) {
				$header->appendChild(Widget::Anchor($createbtn_text, URL.'/symphony/publish/'.$related_sections[0]->get('handle').'/new/', null, 'create button sblp-add'));
			}

			$wrapper->prependChild($header);

			// append assets only once
			self::appendAssets();
		}



		public static function appendAssets(){
			if( self::$assets_loaded === false
				&& class_exists('Administration')
				&& Administration::instance() instanceof Administration
				&& Administration::instance()->Page instanceof HTMLPage
			){

				self::$assets_loaded = true;

				$page = Administration::instance()->Page;

				$page->addStylesheetToHead(URL."/extensions/selectbox_link_field_plus/assets/styles/view.simple.css");
				$page->addScriptToHead(URL."/extensions/selectbox_link_field_plus/assets/libraries/sblpview_simple.js");
				$page->addScriptToHead(URL."/extensions/selectbox_link_field_plus/assets/libraries/view.simple.js");
			}
		}
	}
