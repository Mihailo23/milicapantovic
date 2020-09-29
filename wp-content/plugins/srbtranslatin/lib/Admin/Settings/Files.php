<?php

namespace SGI\STL\Admin\Settings;

trait Files
{

    public function section_files()
    {

        add_settings_section(
            'stl_settings_file',
            __('File and Media Settings', 'srbtranslatin'),
            [&$this, 'callback_section_files'],
            'stl_settings'
        );

        add_settings_field(
            'stl_file_names',
            __('Fix Filenames', 'srbtranslatin'),
            [&$this, 'callback_option_names'],
            'stl_settings',
            'stl_settings_file',
            $this->opts['file']['names']
        );

        add_settings_field(
            'stl_file_translit',
            __('Latin speficic filenames', 'srbtranslatin'),
            [&$this, 'callback_option_translit'],
            'stl_settings',
            'stl_settings_file',
            [
                'translit' => $this->opts['file']['translit'],
                'names'    => $this->opts['file']['content']
            ]
        );

        add_settings_field(
            'stl_file_delim',
            __('Filename delimiter', 'srbtranslatin'),
            [&$this, 'callback_option_delim'],
            'stl_settings',
            'stl_settings_file',
            $this->opts['file']['delim']
        );

        // add_settings_field(
        //     'stl_core_content',
        //     __('Cookie', 'srbtranslatin'),
        //     [&$this, 'callback_option_content'],
        //     'stl_settings',
        //     'stl_settings_file',
        //     $this->opts['file']['content']
        // );

    }

    public function callback_section_files()
    {

        printf(
            '<p>%s</p>',
            __('File & Media settings control filename transliteration and media saving', 'srbtranslatin')
        );

    }

    public function callback_option_names($names)
    {

        self::checkbox(
            $names,
            'sgi/stl/opt[file][names]',
            $this->expert_enable,
            __('Transliterate filenames', 'srbtranslatin'),
            __('Enable if you want to convert cyrillic filenames to latin', 'srbtranslatin')
        );

    }

    public function callback_option_translit($opts)
    {

        self::checkbox(
            $opts['translit'],
            'sgi/stl/opt[file][translit]',
            true,
            __('Script specific filenames', 'srbtranslatin'),
            __('Enable if you want to have cyrillic and latin versions of an image ', 'srbtranslatin')
        );

        echo '<div class="stl-content-only" style="margin-top:20px;">';

        self::checkbox(
            $opts['names'],
            'sgi/stl/opt[file][content]',
            true,
            __('Script specific filenames in content only', 'srbtranslatin'),
            __('Enable if you want to limit different filenames to post/page content only', 'srbtranslatin')
        );

        echo '</div>';

    }

    public function callback_option_delim($delim)
    {

        self::input(
            $delim,
            'sgi/stl/opt[file][delim]',
            $this->expert_enable,
            '',
            __('Filename delimiter - i.e. - myfilename-cir.jpg', 'srbtranslatin')
        );

    }
    
}