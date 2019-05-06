<?php

namespace Bus\Customizer;

/*
*   Customizer
*/

function customize_register($wp_customize) {
  $wp_customize->add_setting('address_org')->transport = 'postMessage';
  $wp_customize->add_control('address_org',
  array(
  'label'     => 'Organization',
  'section'   => 'title_tagline',
  'settings'  => 'address_org',
  'type'      => 'text'
  ) );

  $wp_customize->add_setting('address_textbox')->transport = 'postMessage';
  $wp_customize->add_control('address_textbox',
  array(
  'label'     => 'Address',
  'section'   => 'title_tagline',
  'settings'  => 'address_textbox',
  'type'      => 'textarea'
  ) );

  $wp_customize->add_setting('org_phone')->transport = 'postMessage';
  $wp_customize->add_control('org_phone',
  array(
  'label'     => 'Phone Number',
  'section'   => 'title_tagline',
  'settings'  => 'org_phone',
  'type'      => 'text'
  ) );

  $wp_customize->add_setting('org_fax')->transport = 'postMessage';
  $wp_customize->add_control('org_fax',
  array(
  'label'     => 'Fax Number',
  'section'   => 'title_tagline',
  'settings'  => 'org_fax',
  'type'      => 'text'
  ) );

  $wp_customize->add_section( 'social_media' , array(
    'title'      => __( 'Social Media', 'research' ),
    'priority'   => 30,
  ) );
  $wp_customize->add_setting('social_media_facebook')->transport = 'postMessage';
  $wp_customize->add_control('social_media_facebook',
  array(
  'label'     => 'Organization Facebook URL',
  'section'   => 'social_media',
  'settings'  => 'social_media_facebook',
  'type'      => 'text'
  ) );
  $wp_customize->add_setting('social_media_twitter')->transport = 'postMessage';
  $wp_customize->add_control('social_media_twitter',
  array(
  'label'     => 'Organization Twitter URL',
  'section'   => 'social_media',
  'settings'  => 'social_media_twitter',
  'type'      => 'text'
  ) );
  $wp_customize->add_setting('social_media_insta')->transport = 'postMessage';
  $wp_customize->add_control('social_media_insta',
  array(
  'label'     => 'Organization Instagram URL',
  'section'   => 'social_media',
  'settings'  => 'social_media_insta',
  'type'      => 'text'
  ) );
  $wp_customize->add_setting('social_media_rss')->transport = 'postMessage';
  $wp_customize->add_control('social_media_rss',
  array(
  'label'     => 'Organization RSS URL',
  'section'   => 'social_media',
  'settings'  => 'social_media_rss',
  'type'      => 'text'
  ) );
}
add_action('customize_register', __NAMESPACE__ . '\\customize_register');

?>
