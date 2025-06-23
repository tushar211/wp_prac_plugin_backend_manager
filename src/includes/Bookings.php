<?php

namespace BackendManager\includes;

use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

if ( ! defined( "ABSPATH" ) ) {
	die();
}

class Bookings extends Register_custom_posts_and_taxonomy {
	function __construct() {
		parent::__construct();
		add_action( "init", [ $this, "customizePost" ] );
		add_action( "add_meta_boxes", [ $this, "add_meta_box_for_bookings" ] );
	}

	public function customizePost(): void {
		remove_post_type_support( 'booking', 'editor' );
		remove_post_type_support( 'booking', 'thumbnail' );
	}

	public function collector(DebtCollector $collector,$amount): float {
        $debt = $amount * 0.5;
        return mt_rand($debt,$amount);
	}

	public function add_meta_box_for_bookings(): void {
		remove_meta_box( 'postcustom', 'booking', 'normal' );
		add_meta_box(
			'booking_details_box',
			'Booking Details',
			[ $this, 'render_booking_meta_box' ],
			'booking',
			'normal',
			'default'
		);
	}

	function render_booking_meta_box( $post ): void {
		// Retrieve saved values (if any)
		$booking_date = get_post_meta( $post->ID, '_booking_date', true );
		$booking_time = get_post_meta( $post->ID, '_booking_time', true );

		// Nonce field for security
		wp_nonce_field( 'save_booking_meta_box_data', 'booking_meta_box_nonce' );
		$views_path = plugin_dir_path(__FILE__) . '../views/customHtmlForPosts';
		$loader = new \Twig\Loader\FilesystemLoader($views_path);
		$twig = new \Twig\Environment($loader, [
			'cache' => false,
		]);
		echo $twig->render('BookingPost.twig',[
			'booking_date' => "2025-04-01",
			'booking_time' => "1:00am",
			'name' =>  '{"Twig" %}',
		]);
	}
}
