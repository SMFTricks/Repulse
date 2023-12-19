<?php

/**
 * @package Theme Customs
 * @author Diego Andrés <diegoandres_cortes@outlook.com>
 * @copyright Copyright (c) 2023, SMF Tricks
 * @license GNU GPLv3
 */

namespace ThemeCustoms;

use ThemeCustoms\Config\ { Config };

class Init extends Config
{
	/**
	 * @var string Theme Name
	 */
	protected $_theme_name = 'Repulse';

	/**
	 * @var string Theme Version
	 */
	protected $_theme_version = '1.1.0';

	/**
	 * @var array Theme Author
	 */
	protected $_theme_author = [
		'name' => 'Diego Andrés',
		'smf_id' => 254071,
	];

	/**
	 * @var array Theme support details
	 */
	protected $_theme_details = [
		'support' => [
			'github_url' => 'https://github.com/SMFTricks/Repulse',
			'smf_site_id' => 3024,
			'smf_support_topic' => 585243,
			'custom_support_url' => 'https://smftricks.com/index.php?topic=2271.0',
		],
	];

	/**
	 * Color Options
	 */
	public static $_color_options = [
		'variants'=> true,
		'darkmode' => true,
	];

	/**
	 * Traditional likes style
	 */
	public static $_likes_quickbutton = false;

	/**
	 * Init::loadHooks()
	 * 
	 * @return void
	 */
	protected function loadHooks() : void
	{
		// Load fonts
		add_integration_function('integrate_pre_css_output', __CLASS__ . '::fonts', false, '$themedir/themecustoms/Init.php');

		// Javascript
		add_integration_function('integrate_pre_javascript_output', __CLASS__ . '::custom_js', false, '$themedir/themecustoms/Init.php');

		// Dark Mode
		add_integration_function('integrate_customtheme_color_darkmode', __CLASS__ . '::darkMode', false, '$themedir/themecustoms/Init.php');

		// Variants
		add_integration_function('integrate_customtheme_color_variants', __CLASS__ . '::variants', false, '$themedir/themecustoms/Init.php');
	}

	/**
	 * Init::fonts()
	 * 
	 * Load some google fonts
	 * 
	 * @return void
	 */
	public static function fonts() : void
	{
		// Roboto Font
		loadCSSFile('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap', ['external' => true, 'order_pos' => -800]);
	}

	/**
	 * Init::custom_js()
	 * 
	 * Load some custom javascript
	 * 
	 * @return void
	 */
	public static function custom_js() : void
	{
		// Custom js
		loadJavascriptFile('custom.js', [
			'force_current' => true,
		], 'themecustom_js');
	}

	/**
	 * Init::darkMode()
	 * 
	 * Enable the Dark Mode?
	 * 
	 * @param bool $darkmode
	 * @return void
	 */
	public static function darkMode(bool &$darkmode) : void
	{
		$darkmode = true;
	}

	/**
	 * Init::Variants()
	 * 
	 * Add the theme variants
	 * 
	 * @param array $variants
	 * @return void
	 */
	public static function variants(array &$variants) : void
	{
		$variants = [
			'red',
			'green',
			'blue',
			'yellow',
			'purple',
			'pink',
		];
	}
}