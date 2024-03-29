<?php

namespace SGI\STL\Admin\Settings;

trait General
{

    public function section_general()
    {

        add_settings_section(
            'stl_settings_core',
            __('General Settings', 'srbtranslatin'),
            [&$this, 'callback_section_core'],
            'stl_settings'
        );

        add_settings_field(
            'stl_core_script',
            __('Default script', 'srbtranslatin'),
            [&$this, 'callback_option_script'],
            'stl_settings',
            'stl_settings_core',
            $this->opts['core']['script']
        );

        add_settings_field(
            'stl_core_param',
            __('URL Parameter', 'srbtranslatin'),
            [&$this, 'callback_option_param'],
            'stl_settings',
            'stl_settings_core',
            $this->opts['core']['param']
        );

        add_settings_field(
            'stl_core_cookie',
            __('Cookie', 'srbtranslatin'),
            [&$this, 'callback_option_cookie'],
            'stl_settings',
            'stl_settings_core',
            $this->opts['core']['cookie']
        );

    }

    public function callback_section_core()
    {

        printf(
            '<p>%s</p>',
            __('General settings control main functionality of the plugin', 'srbtranslatin')
        );

    }

    public function callback_option_script($script)
    {

        $options = array(
            'cir' => __('Cyrillic', 'srbtranslatin'),
            'lat' => __('Latin', 'srbtranslatin')
        );

        Generator::select(
            $options,
            $script,
            'sgi/stl/opt[core][script]',
            true,
            '',
            __('Default script used for the website if user did not select a script', 'srbtranslatin'),
            ''
        );

    }

    public function callback_option_cookie($cookie)
    {

        Generator::checkbox(
            $cookie,
            'sgi/stl/opt[core][cookie]',
            $this->expert_enable,
            __('Use Cookie', 'srbtranslatin'),
            __('Enable if you want to keep script preference setting in a user cookie', 'srbtranslatin')
        );

    }

    public function callback_option_param($param)
    {

        Generator::input(
            $param,
            'sgi/stl/opt[core][param]',
            true,
            '',
            __('URL parameter used for script selector', 'srbtranslatin')
        );

    }

}