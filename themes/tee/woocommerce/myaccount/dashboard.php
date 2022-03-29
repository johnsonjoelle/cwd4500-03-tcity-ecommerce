<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template overides the template under plugins/woocommerce/myaccount/dashboard.php.
 *
 * If the original woocommerce template is updated, this template will need
 * to be updated to maintain compatibility.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);

$user = wp_get_current_user();
$customer_id = get_current_user_id();
$allowed_roles =  array( 'editor', 'administrator', 'author', 'contributor', 'subscriber' );
$user_roles = array_intersect( $allowed_roles, $user->roles );

if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing'  => __( 'Billing address', 'woocommerce' ),
			'shipping' => __( 'Shipping address', 'woocommerce' ),
		),
		$customer_id
	);
} else {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing' => __( 'Billing address', 'woocommerce' ),
		),
		$customer_id
	);
}

$oldcol = 1;
$col    = 1;
?>

<section class="grid-x">
	<aside class="cell large-2 medium-3 small-12">
		<?php
			if ( $user ) : ?>
				<img class="tee-acc-profile-pic" src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" />
			<?php endif; ?>
	</aside>

	<!-- Profile Section -->
	<section class="cell large-7 medium-9 small-12 tee-account-main">
		<h3>User Profile</h3>
		<table>
			<tbody>
				<tr>
					<td style="font-weight: 500;">Username:</td>
					<td><?php printf( esc_html( $user->display_name ) )?></td>
				</tr>
				<tr>
					<td style="font-weight: 500;">Full Name:</td>
					<td><?php printf( esc_html( $user->user_firstname ) . ' ' . esc_html( $user->user_lastname ) )?></td>
				</tr>
				<tr>
					<td style="font-weight: 500;">Email:</td>
					<td><?php printf( esc_html( $user->user_email ) )?></td>
				</tr>
				<tr>
					<td style="font-weight: 500;">Account Type:</td>
					<td><?php printf( implode(" ", $user_roles) ) ?></td>
				</tr>
			</tbody>
		</table>
		<p><a>Edit profile</a></p>

		<!-- Billing Section -->
		<section class="wp-block-group is-style-sandwich-group">
			<h3>Payment Details</h3>
			<?php if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) : ?>
				<div class="u-columns woocommerce-Addresses col2-set addresses">
			<?php endif; ?>

			<?php foreach ( $get_addresses as $name => $address_title ) : ?>
				<?php
					$address = wc_get_account_formatted_address( $name );
					$col     = $col * -1;
					$oldcol  = $oldcol * -1;
				?>

				<div class="grid-x u-column<?php echo $col < 0 ? 1 : 2; ?> col-<?php echo $oldcol < 0 ? 1 : 2; ?> woocommerce-Address">
					<header class="woocommerce-Address-title title cell small-6">
						<strong><?php echo esc_html( $address_title ); ?></strong>
					</header>
					<address class="cell small-6">
						<?php
							echo $address ? wp_kses_post( $address ) : esc_html_e( 'You have not set up this type of address yet.', 'woocommerce' );
						?>
					</address>
					<div class="cell small-6"></div>
					<a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address', $name ) ); ?>" class="edit"><?php echo $address ? esc_html__( 'Edit', 'woocommerce' ) : esc_html__( 'Add', 'woocommerce' ); ?></a>
				</div>

			<?php endforeach; ?>

			<?php if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) : ?>
				</div>
				<?php
			endif; ?>
			<div class="cell small-6">
				<strong>Credit Card</strong>
			</div>
			<div class="cell small-6"></div>
		</section>
	</section>

	<!-- Orders Section -->
	<section class="cell large-3 medium-12 small-12 account-sidebar">
		<div class="grid-x">
			<div class="cell small-12 medium-6 large-12">
				<h3>Recent Orders</h3>
				<p class="tee-order-link"><a>View Order History</a></p>
				<?php do_action( 'woocommerce_before_account_orders', $has_orders );
				if ( $has_orders ) : ?>
					<div class="account-orders-dashboard">
					<?php for ($x=0; $x<=3; $x++) {
						$customer_order = $customer_orders[$x];
						$order      = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
						$item_count = $order->get_item_count() - $order->get_item_count_refunded(); ?>
						<p class="account-dash-order__title"><?php echo esc_html( $column_name ); ?></p>
					<?php } ?>

						<tbody>
							<?php
							foreach ( $customer_orders->orders as $customer_order ) {
								$order      = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
								$item_count = $order->get_item_count() - $order->get_item_count_refunded();
								?>
								<tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr( $order->get_status() ); ?> order">
									<?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
										<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
											<?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
												<?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>

											<?php elseif ( 'order-number' === $column_id ) : ?>
												<a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
													<?php echo esc_html( _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number() ); ?>
												</a>

											<?php elseif ( 'order-date' === $column_id ) : ?>
												<time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time>

											<?php elseif ( 'order-status' === $column_id ) : ?>
												<?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>

											<?php elseif ( 'order-total' === $column_id ) : ?>
												<?php
												/* translators: 1: formatted order total 2: total order items */
												echo wp_kses_post( sprintf( _n( '%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count ) );
												?>

											<?php elseif ( 'order-actions' === $column_id ) : ?>
												<?php
												$actions = wc_get_account_orders_actions( $order );

												if ( ! empty( $actions ) ) {
													foreach ( $actions as $key => $action ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
														echo '<a href="' . esc_url( $action['url'] ) . '" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
													}
												}
												?>
											<?php endif; ?>
										</td>
									<?php endforeach; ?>
								</tr>
								<?php
							}
							?>
						</tbody>
					</div>
				<?php else : ?>
					<div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
						<?php esc_html_e( 'No order has been made yet.', 'woocommerce' ); ?>
					</div>
				<?php endif; ?>

				<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>
			</div>
			<div class="cell small-12 medium-6 large-12">
				<h3>Recent Posts</h3>
				<!-- If user has posts then show 3 posts -->
			</div>
		</div>
	</section>
</section>

<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
