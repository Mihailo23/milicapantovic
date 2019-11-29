<?php
/**
 * Plugin Name: WP.com Open Graph Tags
 * Description: Add Open Graph tags so that Facebook (and any other service that supports them) can crawl the site better and we provide a better sharing experience
 * Author: Automattic
 * License: GPLv2, baby!
 *
 * @link http://ogp.me/
 * @link http://developers.facebook.com/docs/opengraph/
 */

if ( ! function_exists( 'wpcom_og_tags' ) ) :

// Only enable for public blogs
// if( 1 == get_option( 'blog_public' ) )
	add_action( 'wp_head', 'wpcom_og_tags' );

function wpcom_og_tags() {
	$og_output = '';
	$tags = array();
	
	$image_width = apply_filters( 'wpcom_open_graph_image_width', 300 );
	$image_height = apply_filters( 'wpcom_open_graph_image_height', 300 );
	$description_length = apply_filters( 'wpcom_open_graph_description_length', 197 );
	
	if ( is_home() || is_front_page() ) {
		$site_type = get_option( 'open_graph_protocol_site_type' );
		$tags['og:type'] = ! empty( $site_type ) ? $site_type : 'blog';
		
		$tags['og:title'] = get_bloginfo( 'name' );
		$tags['og:url'] = home_url();
		$tags['og:description'] = get_bloginfo( 'description' );
		
		// Associate a blog's root path with one or more Facebook accounts
		$facebook_admins = get_option( 'facebook_admins' );
		if ( ! empty( $facebook_admins ) )
			$tags['fb:admins'] = $facebook_admins;
		
	} elseif ( is_author() ) {
		$tags['og:type'] = 'author';
	
		$author = get_queried_object();
	
		$tags['og:title'] = $author->display_name;
		$tags['og:url'] = get_author_posts_url( $author->ID );
		$tags['og:description'] = $author->description;
	
	} elseif ( is_singular() ) {
		$tags['og:type'] = 'article';

		$tags['og:title'] = get_the_title();
		$tags['og:url'] = get_permalink();
		
		// We want to avoid filters that add things like Sharing buttons, so let's scrub it ourselves
		$tags['og:description'] = trim( strip_tags( strip_shortcodes( get_the_content() ) ) );
	}
	
	if ( empty( $tags ) )
		return;
	
	$tags['og:site_name'] = get_bloginfo( 'name' );
	
	$tags['og:image'] = wpcom_og_get_image( $image_width, $image_height );
	
	// Facebook whines if you give it an empty title
	if( empty( $tags['og:title'] ) )
		$tags['og:title'] = __( '(no title)' );
	
	// Shorten the description if it's too long
	$tags['og:description'] = strlen( $tags['og:description'] ) > $description_length ? substr( $tags['og:description'], 0, $description_length ) . '...' : $tags['og:description'];

	$tags = apply_filters( 'wpcom_open_graph_tags', $tags );
	
	foreach ( (array) $tags as $tag_property => $tag_content ) {
		foreach( (array) $tag_content as $tag_content_single ) { // to accomodate multiple images			
			$og_output .= sprintf( '<meta property="%s" content="%s" />', esc_attr( $tag_property ), esc_attr( $tag_content_single ) );
			$og_output .= "\n";
		}
	}
	
	echo $og_output; 
}

function wpcom_og_get_image( $width = 50, $height = 50, $max_images = 4 ) { // Facebook requires thumbnails to be a minimum of 50x50
	$image = '';
	
	if ( is_singular() ) {
		global $post;
		
		$images = array();
		$size = array( $width, $height );
		$size_query_args = array( 'w' => $width, 'h' => $height );
		$content = $post->post_content;
		
		// If a featured image is set, use that
		if( function_exists( 'has_post_thumbnail' ) && has_post_thumbnail() ) {
			$image_src = wp_get_attachment_image_src( get_post_thumbnail_id(), $size );
			if( ! empty( $image_src ) )
				$images[] = add_query_arg( $size_query_args, $image_src[0] );
		}
		
		// If the post has a gallery, use the images from that gallery
		if( preg_match( '/\[gallery[^\]]*\]/', $content ) ) {
			$count = $max_images - count( $images );
			$gallery_images = get_posts( array(
				'post_type' => 'attachment',
				'post_mime_type' => 'image',
				'posts_per_page' => $count,
				'post_parent' => $post->ID,
			) );
			
			if( $gallery_images ) {
				foreach ( $gallery_images as $gallery_image ) {
					$image_src = wp_get_attachment_image_src( $gallery_image->ID, $size );
					if( ! empty( $image_src ) )
						$images[] = add_query_arg( $size_query_args, $image_src[0] );
				}
			}
			
		} 	
		
		// Fallback to the other images in the post
		$offset = 0;
		while( count( $images ) < $max_images ) {
			if( preg_match( '/<img[^>]*src=[\'"](.*?)[\'"][^>]*>/i', $content, $match, PREG_OFFSET_CAPTURE, $offset ) ) {
				$images[] = add_query_arg( $size_query_args, $match[1][0] );
				$offset = $match[1][1];
			} else {
				break;
			}
		}
				
		// Get rid of any duplicates
		$image = array_unique( $images );
		
	} elseif( is_author() ) {
		if( function_exists( 'get_avatar_url' ) ) {
			$author = get_queried_object();
			$avatar = get_avatar_url( $author->user_email, $width );
			
			if( ! empty( $avatar ) )
				$image = $avatar[0];
		}
	}
		
	return $image;
}

endif;