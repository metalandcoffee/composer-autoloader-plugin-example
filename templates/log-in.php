<?php
/**
 * Login Page
 *
 * @package MetalAndCoffee\ExamplePlugin
 */

use MetalAndCoffee\ExamplePlugin\Forms\Login;

?>
<section class="my-4">
	<p class="lead fs-6">
		Need an Account? <a href="<?php echo esc_url( site_url( '/register/' ) ); ?>">Register</a>
		<br>
		Lost Password? <a href="<?php echo esc_url( site_url( '/wp-login.php?action=lostpassword' ) ); ?>">Reset</a>
	</p>
</section>

<section class="my-4">
	<div class="mb-3">
		<small><em>All fields are required.</em></small>
	</div>
	<?php Login::render_form(); ?>
</section>
