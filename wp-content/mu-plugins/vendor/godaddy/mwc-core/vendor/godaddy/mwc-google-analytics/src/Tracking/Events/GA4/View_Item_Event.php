<?php
/**
 * Google Analytics
 *
 * This source file is subject to the GNU General Public License v3.0
 * that is bundled with this package in the file license.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.html
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@skyverge.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Google Analytics to newer
 * versions in the future. If you wish to customize Google Analytics for your
 * needs please refer to https://help.godaddy.com/help/40882 for more information.
 *
 * @author      SkyVerge
 * @copyright   Copyright (c) 2015-2023, SkyVerge, Inc.
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 */

namespace GoDaddy\WordPress\MWC\GoogleAnalytics\Tracking\Events\GA4;

use GoDaddy\WordPress\MWC\GoogleAnalytics\Tracking;
use GoDaddy\WordPress\MWC\GoogleAnalytics\Tracking\Adapters\Product_Item_Event_Data_Adapter;
use GoDaddy\WordPress\MWC\GoogleAnalytics\Tracking\Events\GA4_Event;

defined( 'ABSPATH' ) or exit;

/**
 * The "view item" event.
 *
 * @since 3.0.0
 */
class View_Item_Event extends GA4_Event {


	/** @var string the event ID */
	public const ID = 'view_item';


	/**
	 * @inheritdoc
	 */
	public function get_form_field_title(): string {

		return __( 'View Item', 'woocommerce-google-analytics-pro' );
	}


	/**
	 * @inheritdoc
	 */
	public function get_form_field_description(): string {

		return __( 'Triggered when a customer views a single product.', 'woocommerce-google-analytics-pro' );
	}


	/**
	 * @inheritdoc
	 */
	public function get_default_name(): string {

		return 'view_item';
	}


	/**
	 * @inheritdoc
	 */
	public function register_hooks() : void {

		add_action( 'woocommerce_after_single_product_summary', [ $this, 'track' ], 1 );
	}


	/**
	 * @inheritdoc
	 */
	public function track() : void {
		global $product;

		if ( Tracking::not_page_reload() ) {

			$the_product = ! $product ? wc_get_product( get_the_ID() ) : $product;

			$this->record_via_js( [
				'items'    => [ ( new Product_Item_Event_Data_Adapter( $the_product ) )->convert_from_source() ],
				'value'    => $the_product->get_price(),
				'currency' => get_woocommerce_currency(),
				'category' => 'Products',
			] );
		}
	}


}
