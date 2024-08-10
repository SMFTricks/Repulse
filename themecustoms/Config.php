<?php

/**
 * @package Theme Customs
 * @author Diego Andrés <diegoandres_cortes@outlook.com>
 * @copyright Copyright (c) 2023, SMF Tricks
 * @license MIT
 */

namespace ThemeCustoms;

use ThemeCustoms\Theme\Init;

class Config extends Init
{
	/**
	 * @var string Theme Name
	 */
	protected string $name = 'Repulse';

	/**
	 * @var string Theme Version
	 */
	protected string $version = '1.2.2';

	/**
	 * @var array Theme Author
	 */
	protected string $author = 'Diego Andrés';

	/**
	 * @var int Theme Author SMF ID
	 */
	protected int $authorID = 254071;

	/**
	 * @var string Theme Default Color
	 */
	protected string $color = '#004153';

	/**
	 * @var string GitHub URL
	 */
	protected string $github = 'https://github.com/SMFTricks/Repulse';

	/**
	 * @var int SMF Customization Site ID
	 */
	protected int $customizationId = 3024;

	/**
	 * @var int Theme Support Topic ID
	 */
	protected int $customizationSupport = 585243;

	/**
	 * @var string Custom Suport URL
	 */
	protected string $supportURL = 'https://smftricks.com/index.php?topic=2271.0';

	/**
	 * @var array Color Variants
	 */
	public array $variants = [
		'red',
		'green',
		'blue',
		'yellow',
		'purple',
		'pink',
	];

	/**
	 * @var bool Dark Mode
	 */
	public bool $darkMode = true;

	/**
	 * @var bool Add the like button to the quickbuttons
	 */
	public bool $quickLikes = true;

	/**
	 * @var bool Wheter to include jQuery UI
	 */
	public bool $jqueryUI = true;

	/**
	 * Load any special hooks for the theme
	 */
	public function loadHooks() : void
	{
		// Load fonts
		add_integration_function('integrate_pre_css_output', __CLASS__ . '::fonts#', false, __FILE__);

		// Javascript
		add_integration_function('integrate_pre_javascript_output', __CLASS__ . '::js#', false, __FILE__);
	}

	/**
	 * Load fonts
	 */
	public function fonts() : void
	{
		global $settings;

		// Loading locally?
		if (empty($settings['st_fonts_source']))
		{
			// Load the fonts
			loadCSSFile('font.css', ['order_pos' => -800]);
			return;
		}

		// Roboto Font
		loadCSSFile('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap', ['external' => true, 'order_pos' => -800]);
	}

	/**
	 * Load some custom javascript
	 */
	public function js() : void
	{
		// Custom js
		loadJavascriptFile('custom.js', [
			'force_current' => true,
		], 'themecustom_js');
	}
}