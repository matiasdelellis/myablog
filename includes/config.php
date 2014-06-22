<?php
/*
 * HACK to parse error when include these file from diferents uris.
 */
if (!defined("INCLUDES_DIR")) define("INCLUDES_DIR", dirname(__FILE__));

class mya_config {
	private $settings = array();

	private function __construct () {
		/* Avoid errors */
		$contents = str_replace("<?php header(\"Status: 403\"); exit(\"Access denied.\"); ?>\n",
			                  "",
			                  file_get_contents(INCLUDES_DIR . "/config.ini.php"));
		$this->settings = parse_ini_string ($contents, TRUE);
	}

	public function get ($section, $setting) {
		return $this->settings[$section][$setting];
	}

	public static function & instance () {
		static $_instance = null;
		return $_instance = (empty($_instance)) ? new self() : $_instance;
	}
}
