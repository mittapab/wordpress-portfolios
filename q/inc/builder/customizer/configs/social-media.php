<?php
if ( ! function_exists( 'qiupid_customizer_social_media_config' ) ) {
	function qiupid_customizer_social_media_config( $configs ) {

		$section = 'qiupid_social_media';

		$config = array(
			array(
				'name'     => 'social_media_panel',
				'type'     => 'panel',
				'priority' => 22,
				'title'    => esc_html__( 'Social Media', 'qiupid' ),
			),

			// Social Shares Tab.
			array(
				'name'  => "qiupid_social_media_shares",
				'type'  => 'section',
				'panel' => 'social_media_panel',
				'title' => esc_html__( 'Social Shares', 'qiupid' ),
			),

			array(
				'name'            => 'qiupid_social_media_shares_twitter',
				'type'            => 'checkbox',
				'section'         => 'qiupid_social_media_shares',
				'title'           => esc_html__( 'Twitter', 'qiupid' ),
			),

			array(
				'name'            => 'qiupid_social_media_shares_facebook',
				'type'            => 'checkbox',
				'section'         => 'qiupid_social_media_shares',
				'title'           => esc_html__( 'Facebook', 'qiupid' ),
			),

			array(
				'name'            => 'qiupid_social_media_shares_whatsapp',
				'type'            => 'checkbox',
				'section'         => 'qiupid_social_media_shares',
				'title'           => esc_html__( 'Whatsapp', 'qiupid' ),
			),

			array(
				'name'            => 'qiupid_social_media_shares_pinterest',
				'type'            => 'checkbox',
				'section'         => 'qiupid_social_media_shares',
				'title'           => esc_html__( 'Pinterest', 'qiupid' ),
			),

			array(
				'name'            => 'qiupid_social_media_shares_linkedin',
				'type'            => 'checkbox',
				'section'         => 'qiupid_social_media_shares',
				'title'           => esc_html__( 'Linkedin', 'qiupid' ),
			),

			array(
				'name'            => 'qiupid_social_media_shares_telegram',
				'type'            => 'checkbox',
				'section'         => 'qiupid_social_media_shares',
				'title'           => esc_html__( 'Telegram', 'qiupid' ),
			),

			array(
				'name'            => 'qiupid_social_media_shares_email',
				'type'            => 'checkbox',
				'section'         => 'qiupid_social_media_shares',
				'title'           => esc_html__( 'Email', 'qiupid' ),
			),

			// Social Links Tab.
			array(
				'name'  => "qiupid_social_media_links",
				'type'  => 'section',
				'panel' => 'social_media_panel',
				'title' => esc_html__( 'Social Links', 'qiupid' ),
			),

			array(
				'name'            => 'qiupid_social_media_links_twitter',
				'type'            => 'text',
				'section'         => 'qiupid_social_media_links',
				'title'           => esc_html__( 'Twitter', 'qiupid' ),
			),
			array(
				'name'            => 'qiupid_social_media_links_facebook',
				'type'            => 'text',
				'section'         => 'qiupid_social_media_links',
				'title'           => esc_html__( 'Facebook', 'qiupid' ),
			),
			array(
				'name'            => 'qiupid_social_media_links_youtube',
				'type'            => 'text',
				'section'         => 'qiupid_social_media_links',
				'title'           => esc_html__( 'Youtube', 'qiupid' ),
			),
			array(
				'name'            => 'qiupid_social_media_links_pinterest',
				'type'            => 'text',
				'section'         => 'qiupid_social_media_links',
				'title'           => esc_html__( 'Pinterest', 'qiupid' ),
			),
			array(
				'name'            => 'qiupid_social_media_links_linkedin',
				'type'            => 'text',
				'section'         => 'qiupid_social_media_links',
				'title'           => esc_html__( 'Linkedin', 'qiupid' ),
			),
			array(
				'name'            => 'qiupid_social_media_links_skype',
				'type'            => 'text',
				'section'         => 'qiupid_social_media_links',
				'title'           => esc_html__( 'Skype', 'qiupid' ),
			),
			array(
				'name'            => 'qiupid_social_media_links_instagram',
				'type'            => 'text',
				'section'         => 'qiupid_social_media_links',
				'title'           => esc_html__( 'Instagram', 'qiupid' ),
			),
			array(
				'name'            => 'qiupid_social_media_links_dribble',
				'type'            => 'text',
				'section'         => 'qiupid_social_media_links',
				'title'           => esc_html__( 'Dribble', 'qiupid' ),
			),
			array(
				'name'            => 'qiupid_social_media_links_vimeo',
				'type'            => 'text',
				'section'         => 'qiupid_social_media_links',
				'title'           => esc_html__( 'Vimeo', 'qiupid' ),
			),
		);

		return array_merge( $configs, $config );
	}
}

add_filter( 'qiupid/customizer/config', 'qiupid_customizer_social_media_config' );
