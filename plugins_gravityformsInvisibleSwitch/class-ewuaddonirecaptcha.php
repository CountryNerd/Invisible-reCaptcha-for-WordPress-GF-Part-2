<?php
GFForms::include_addon_framework();

class GFEWUAddOnIrecaptcha extends GFAddOn {

	protected $_version = GF_EWU_ADDON_VERSION;
	protected $_min_gravityforms_version = '1.9';
	protected $_slug = 'ewuaddonirecaptcha';
	protected $_path = 'ewuaddonirecaptcha/ewuaddonirecaptcha.php';
	protected $_full_path = __FILE__;
	protected $_title = 'Gravity Forms EWU Add-On Invisible Recaptcha';
	protected $_short_title = 'Invisible Recaptcha';

	private static $_instance = null;

	public static function get_instance() {
		if ( self::$_instance == null ){
			self::$_instance = new GFEWUAddOnIrecaptcha();
		}

		return self::$_instance;
	}

	public function init() {
		parent::init();
	}

	public function scripts() {
		$scripts = array(
			array(
				'handle'	=> 'my_script_js',
				'src'		=> $this->get_base_url() . '/js/my_script.js',
				'version'	=> $this->_version,
				'deps'		=> array( 'jquery' ),
				'strings'	=> array(),
				'enqueue' => array(
					array(
						'admin_page'	=> array( 'form_settings' ),
						'tab'		=> 'ewuaddon',
					)
				)
			),


		);

		return array_merge( parent::scripts(), $scripts );
	}

	public function styles() {
		$styles = array(
			array(
				'handle'	=> 'my_styles_css',
				'src'		=> $this->get_base_url() . '/css/my_styles.css',
				'version'	=> $this->_version,
				'enqueue'	=> array(
					array('field_types' => array( 'poll' ) )
				)
			)
		);

		return array_merge( parent::styles(), $styles );
	}


	public function plugin_settings_fields() {
		return array();
	}

	public function form_settings_fields( $form ) {
		return array(
			array(
				'title'  => esc_html__( 'Google Invisible Recaptcha', 'simpleaddon' ),
				'fields' => array(
					array(
                         'label'   => 'Invisible Recaptcha',
                         'type'    => 'checkbox',
                         'name'    => 'enabled',
                         'tooltip' => 'Needs to be enabled for Invisible Recaptcha to work on this form',
                         'choices' => array(
			 	array(
			       		'label' => 'Enabled on this form',
			                'name'  => 'enabled'
			       )
			 )
                     ),
				)
			),
		);
	}

	public function is_valid_setting( $value ) {
		return strlen( $value ) < 100;
	}
}
