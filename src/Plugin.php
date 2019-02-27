<?php
declare(strict_types=1);
namespace SimplyYesNo;

use TGM_Plugin_Activation;

class Plugin
{
    /**
     * @var TGM_Plugin_Activation $tgmpa
     */
    private $tgmpa;

    /**
     * @var string $slug
     */
    private static $slug = 'simply-yes-no';

    public function __construct()
    {
        $this->tgmpa = TGM_Plugin_Activation::get_instance();
        var_dump($this->tgmpa);
    }

    public function bootstrap()
    {
        add_action('tgmpa_register', [$this, 'register_required_plugins']);
        add_action('init', [$this, 'init']);
    }

    function init() {
        if (!$this->tgmpa->is_tgmpa_complete()) {
            return;
        }

        $this->registerPostType();
    }

    function register_required_plugins()
    {
        $plugins = [
            [
                'name' => 'Advanced Custom Fields',
                'slug' => 'advanced-custom-fields',
                'required' => true,
            ]
        ];

        $config = [
            'id' => 'tgmpa',
            'dismissable' => false,
            'is_automatic' => true,
            'strings' => [
                'notice_can_install_required' => _n_noop(
                    'Simply Yes or No requires the following plugin: %1$s.',
                    'Simply Yes or No requires the following plugins: %1$s.',
                    self::$slug
                ),
                'notice_can_activate_required' => _n_noop(
                    'Simply Yes or No requires following plugin active: %1$s.',
                    'Simply Yes or No requires following plugins active: %1$s.',
                    self::$slug
                ),
            ]
        ];

        tgmpa($plugins, $config);
    }

    private function registerPostType()
    {
        register_post_type(self::$slug, [
            'label' => __('Questions', self::$slug),
            'public' => true,
            'exclude_from_search' => true,
            'publicly_queryable' => false,
        ]);
    }
}
