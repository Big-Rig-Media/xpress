<?php

namespace App;

if ( function_exists() ) {
    acf_add_local_field_group(array(
        'key' => 'group_5cde3521a50e5',
        'title' => 'Global',
        'fields' => array(
            array(
                'key' => 'field_5cde352bc0a04',
                'label' => 'Popup',
                'name' => 'popup_content',
                'type' => 'wysiwyg',
                'instructions' => 'This popup is used globally. Once the popup is a viewed a cookie will be set and expire in 7 days. The cookie controls how often a user is shown the popup\'s content.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 1,
            ),
        ),
        'location' => [
            [
                [
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'global-info',
                ]
            ]
        ],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => false,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5d30ebc533100',
        'title' => 'Hero Content',
        'fields' => array(
            array(
                'key' => 'field_5d30ebca2e89f',
                'label' => 'Hero Content',
                'name' => 'hero_content',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
                array(
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'views/template-splash.blade.php',
                ),
            ),
        ),
        'menu_order' => 1,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => false,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5c8f201630e14',
        'title' => 'Hero Options',
        'fields' => array(
            array(
                'key' => 'field_5c8f2e59b176c',
                'label' => 'Hero Type',
                'name' => 'hero_type',
                'type' => 'radio',
                'instructions' => 'Choose what type of hero area you want to use.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'image' => 'Image',
                    'video' => 'Video',
                    'carousel' => 'Carousel',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'default_value' => 'image',
                'layout' => 'vertical',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
            array(
                'key' => 'field_5c8f2ecacda03',
                'label' => 'Image',
                'name' => 'hero_image',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5c8f2e59b176c',
                            'operator' => '==',
                            'value' => 'image',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'w1920x800',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_5c8f20237ce45',
                'label' => 'MP4',
                'name' => 'hero_video_mp4',
                'type' => 'file',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5c8f2e59b176c',
                            'operator' => '==',
                            'value' => 'video',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'library' => 'all',
                'min_size' => '',
                'max_size' => '',
                'mime_types' => 'mp4',
            ),
            array(
                'key' => 'field_5c8f203d7ce46',
                'label' => 'WebM',
                'name' => 'hero_video_webm',
                'type' => 'file',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5c8f2e59b176c',
                            'operator' => '==',
                            'value' => 'video',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'library' => 'all',
                'min_size' => '',
                'max_size' => '',
                'mime_types' => 'webm',
            ),
            array(
                'key' => 'field_5cb535350f3bb',
                'label' => 'Carousel',
                'name' => 'hero_carousel',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5c8f2e59b176c',
                            'operator' => '==',
                            'value' => 'carousel',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'table',
                'button_label' => 'Add Image',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5cb5354a0f3bc',
                        'label' => 'Image',
                        'name' => 'hero_carousel_image',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'array',
                        'preview_size' => 'w1920x800',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
        ),
        'menu_order' => 1,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => false,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5cb8b8150aa6a',
        'title' => 'Section Components',
        'fields' => array(
            array(
                'key' => 'field_5cb8b82353478',
                'label' => 'Section Builder',
                'name' => 'section_builder',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'row',
                'button_label' => 'Add Section',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5cb8b82e53479',
                        'label' => 'Type',
                        'name' => 'section_builder_type',
                        'type' => 'radio',
                        'instructions' => 'Choose whether to go with a full width layout or split layout.',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'full' => 'Full',
                            'split' => 'Split',
                        ),
                        'allow_null' => 0,
                        'other_choice' => 0,
                        'default_value' => 'full',
                        'layout' => 'horizontal',
                        'return_format' => 'value',
                        'save_other_choice' => 0,
                    ),
                    array(
                        'key' => 'field_5cb8b85a5347a',
                        'label' => 'Background',
                        'name' => 'section_builder_background',
                        'type' => 'image',
                        'instructions' => 'Set the background image for the layout.',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'array',
                        'preview_size' => 'w960x800',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                    array(
                        'key' => 'field_5cb8b8ca5347b',
                        'label' => 'Content',
                        'name' => 'section_builder_content',
                        'type' => 'wysiwyg',
                        'instructions' => 'Set the content for the layout.',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 1,
                        'delay' => 1,
                    ),
                    array(
                        'key' => 'field_5cb8b8e306247',
                        'label' => 'Flip Order',
                        'name' => 'section_builder_split_flip',
                        'type' => 'radio',
                        'instructions' => 'Choose whether to flip the order of the split layout order.',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_5cb8b82e53479',
                                    'operator' => '==',
                                    'value' => 'split',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'flip' => 'Flip',
                            'normal' => 'Normal',
                        ),
                        'allow_null' => 0,
                        'other_choice' => 0,
                        'default_value' => 'normal',
                        'layout' => 'horizontal',
                        'return_format' => 'value',
                        'save_other_choice' => 0,
                    ),
                    array(
                        'key' => 'field_5cb8c2408cc9f',
                        'label' => 'Background Color',
                        'name' => 'section_builder_background_color',
                        'type' => 'radio',
                        'instructions' => 'Set the background color of the layout.',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'white' => 'White',
                            'primary-1' => 'Primary 1',
                            'primary-2' => 'Primary 2',
                        ),
                        'allow_null' => 0,
                        'other_choice' => 0,
                        'default_value' => 'white',
                        'layout' => 'horizontal',
                        'return_format' => 'value',
                        'save_other_choice' => 0,
                    ),
                    array(
                        'key' => 'field_5ce4719445bae',
                        'label' => 'Text Center',
                        'name' => 'section_builder_text_center',
                        'type' => 'radio',
                        'instructions' => 'Choose whether to text align center the content.',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_5cb8b82e53479',
                                    'operator' => '==',
                                    'value' => 'full',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'yes' => 'Yes',
                            'no' => 'No',
                        ),
                        'allow_null' => 0,
                        'other_choice' => 0,
                        'default_value' => 'no',
                        'layout' => 'horizontal',
                        'return_format' => 'value',
                        'save_other_choice' => 0,
                    ),
                    array(
                        'key' => 'field_5ce430f113b8b',
                        'label' => 'Flex Control',
                        'name' => 'section_builder_flex',
                        'type' => 'radio',
                        'instructions' => 'Choose whether to flex center the content.',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_5cb8b82e53479',
                                    'operator' => '==',
                                    'value' => 'full',
                                ),
                                array(
                                    'field' => 'field_5ce4719445bae',
                                    'operator' => '!=',
                                    'value' => 'yes',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'yes' => 'Yes',
                            'no' => 'No',
                        ),
                        'allow_null' => 0,
                        'other_choice' => 0,
                        'default_value' => 'no',
                        'layout' => 'horizontal',
                        'return_format' => 'value',
                        'save_other_choice' => 0,
                    ),
                    array(
                        'key' => 'field_5ce4aadbafc4f',
                        'label' => 'Action',
                        'name' => 'section_builder_action',
                        'type' => 'radio',
                        'instructions' => 'Choose whether to set the layout as an action to add more spacing.',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_5cb8b82e53479',
                                    'operator' => '==',
                                    'value' => 'full',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'yes' => 'Yes',
                            'no' => 'No',
                        ),
                        'allow_null' => 0,
                        'other_choice' => 0,
                        'default_value' => 'no',
                        'layout' => 'horizontal',
                        'return_format' => 'value',
                        'save_other_choice' => 0,
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
        ),
        'menu_order' => 2,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => false,
        'description' => '',
    ));
}
