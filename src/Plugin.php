<?php
declare(strict_types=1);
namespace SimplyYesNo;

class Plugin
{
    public function bootstrap()
    {
        add_action('init', [$this, 'register_question_post_type']);
    }

    public function register_question_post_type()
    {
        register_post_type('simply-yes-no', [
            'label' => __('Questions', 'simply-yes-no'),
            'public' => true,
            'exclude_from_search' => true,
            'publicly_queryable' => false,
        ]);
    }
}
