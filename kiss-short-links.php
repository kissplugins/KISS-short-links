<?php
/**
 * Plugin Name:       KISS Short Links
 * Plugin URI:        https://kissplugins.com/
 * Description:       Displays a simple, short URL (?p=ID) with a copy button below the permalink in the post editor.
 * Version:           1.2.0
 * Author:            KISS Plugins
 * Author URI:        https://kissplugins.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       kiss-short-url
 */

// Exit if accessed directly for security.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Adds the short URL display below the permalink editor.
 *
 * @param string $html    The original permalink HTML.
 * @param int    $post_id The ID of the current post.
 * @return string The modified HTML.
 */
function kiss_add_short_url_display( $html, $post_id ) {
	if ( get_post_status( $post_id ) === 'auto-draft' ) {
		return $html;
	}

	$short_url = home_url( '/?p=' . $post_id );

	// Prepare the HTML with a "borderless" button, making it look like a standalone icon.
	$short_url_html = sprintf(
		'<div id="kiss-short-url-container" style="margin-top: 8px; display: flex; align-items: center;">
            <strong style="padding-right: 4px;">%1$s</strong>
            <span id="kiss-short-url-text">%2$s</span>
            <button type="button" id="kiss-copy-button" aria-label="%3$s" style="background: none; border: none; padding: 0 4px; cursor: pointer; color: #50575e; height: 24px;">
                <span class="dashicons dashicons-clipboard" style="font-size: 20px; vertical-align: middle;" aria-hidden="true"></span>
            </button>
        </div>',
		esc_html__( 'KISS Short URL:', 'kiss-short-url' ),
		esc_url( $short_url ),
		esc_attr__( 'Copy short URL to clipboard', 'kiss-short-url' )
	);

	return $html . $short_url_html;
}
add_filter( 'get_sample_permalink_html', 'kiss_add_short_url_display', 10, 2 );

/**
 * Enqueues inline JavaScript for the copy button functionality.
 *
 * @param string $hook_suffix The current admin page hook.
 */
function kiss_enqueue_admin_scripts( $hook_suffix ) {
	$screen = get_current_screen();
	if ( ! $screen || $screen->base !== 'post' ) {
		return;
	}

	// This script doesn't need changes, as it targets the button by its ID.
	$script = "
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                const copyButton = document.getElementById('kiss-copy-button');
                const urlTextSpan = document.getElementById('kiss-short-url-text');

                if (copyButton && urlTextSpan) {
                    const originalButtonHTML = copyButton.innerHTML; 

                    copyButton.addEventListener('click', function(e) {
                        e.preventDefault();
                        const urlToCopy = urlTextSpan.innerText;

                        navigator.clipboard.writeText(urlToCopy).then(function() {
                            copyButton.innerHTML = '<span style=\"vertical-align: middle; font-size: 13px;\">" . esc_js( __( 'Copied!', 'kiss-short-url' ) ) . "</span>';
                            setTimeout(function() {
                                copyButton.innerHTML = originalButtonHTML; // Restore the icon
                            }, 2000);
                        }).catch(function(err) {
                            console.error('Failed to copy: ', err);
                        });
                    });
                }
            }, 500);
        });
    ";

	wp_add_inline_script( 'wp-i18n', $script );
}
add_action( 'admin_enqueue_scripts', 'kiss_enqueue_admin_scripts' );
