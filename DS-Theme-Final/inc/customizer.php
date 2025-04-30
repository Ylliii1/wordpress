<?php

function dstheme_customizer($wp_customize){
    // 1Copyright Section
    $wp_customize->add_section(
        'sec_copyright',
        array(
            'title' -> 'Copyright Settings',
            'description' -> 'Copyright Settings'
        )
        );

        $wp_customize->add_settings(
            'set_copyright',
            array(
                'type' => 'theme_mod',
                'default' => 'Copyright X - All Rights Reserved',
                'sanitize_callback' => 'santize_text_field'
            )
            );
            $wp_customize->add_control(
                'set_copyright',
                array(
                    'label' => 'Copyright Imformation',
                    'description'
                )
            )


}
add_action( 'customize_register', 'dstheme_customizer');

?> 