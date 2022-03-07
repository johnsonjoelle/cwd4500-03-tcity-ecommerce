<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
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
	<section class="cell large-7 medium-9 small-12">
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
					<td></td>
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
</section>

<p>
	<?php
	printf(
		/* translators: 1: user display name 2: logout url */
		wp_kses( __( 'Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce' ), $allowed_html ),
		'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
		esc_url( wc_logout_url() )
	);
	?>
</p>

<p>
	<?php
	/* translators: 1: Orders URL 2: Address URL 3: Account URL. */
	$dashboard_desc = __( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">billing address</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' );
	if ( wc_shipping_enabled() ) {
		/* translators: 1: Orders URL 2: Addresses URL 3: Account URL. */
		$dashboard_desc = __( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' );
	}
	printf(
		wp_kses( $dashboard_desc, $allowed_html ),
		esc_url( wc_get_endpoint_url( 'orders' ) ),
		esc_url( wc_get_endpoint_url( 'edit-address' ) ),
		esc_url( wc_get_endpoint_url( 'edit-account' ) )
	);
	?>
</p>

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
