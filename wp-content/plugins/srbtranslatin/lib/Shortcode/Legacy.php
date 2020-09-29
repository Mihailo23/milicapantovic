<?php

namespace SGI\STL\Shortcode;

trait Legacy
{

    private $name;

    public function legacy_callback($atts, string $content)
    {

        trigger_error(
            __(
                sprintf('Shortcode %s will be deprecated in version 2.2, please read the documentation to see which shortcode to use',$this->name),
                'srbtranslatin'
            ),
            E_USER_DEPRECATED
        );

        return $this->shortcode_callback($atts, $content);

    }

}