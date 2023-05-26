<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

</div><!-- .col-full -->
</div><!-- #content -->

<?php do_action('storefront_before_footer'); ?>
<!-- Remove the container if you want to extend the Footer to full width. -->
<div class="containerfluid my-5">

	<footer class="text-white text-center text-lg-start" style="background-color: #23242a;">
		<!-- Grid container -->
		<div class=" p-4">
			<!--Grid row-->
			<div class="row mt-4">
				<!--Grid column-->
				<div class="col-lg-4 col-md-12 mb-4 mb-md-0">
					<h5 class="text-uppercase mb-4">Giới Thiệu Shop</h5>

					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem adipisci distinctio explicabo deserunt nihil quia consequatur facere itaque harum, possimus magni nesciunt, est dignissimos! Voluptatibus impedit quas quis tenetur odio.</p> <br>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem adipisci distinctio explicabo deserunt nihil quia consequatur facere itaque harum, possimus magni nesciunt, est dignissimos! Voluptatibus impedit quas quis tenetur odio.</p>

					<div class="mt-4">
						<!-- Facebook -->
						<a type="button" class="btn btn-floating btn-warning btn-lg"><i class="fab fa-facebook-f"></i></a>
						<!-- Dribbble -->
						<a type="button" class="btn btn-floating btn-warning btn-lg"><i class="fab fa-dribbble"></i></a>
						<!-- Twitter -->
						<a type="button" class="btn btn-floating btn-warning btn-lg"><i class="fab fa-twitter"></i></a>
						<!-- Google + -->
						<a type="button" class="btn btn-floating btn-warning btn-lg"><i class="fab fa-google-plus-g"></i></a>
						<!-- Linkedin -->
					</div>
				</div>
				<!--Grid column-->

				<!--Grid column-->
				<div class="col-lg-4 col-md-6 mb-4 mb-md-0">
					<h5 class="text-uppercase mb-4 pb-1">Tìm Sản Phẩm</h5>

					<div class="form-outline form-white mb-4">
						<input type="text" id="formControlLg" class="form-control form-control-lg">
						<label class="form-label" for="formControlLg" style="margin-left: 0px;">Search</label>
						<div class="form-notch">
							<div class="form-notch-leading" style="width: 9px;"></div>
							<div class="form-notch-middle" style="width: 48.8px;"></div>
							<div class="form-notch-trailing"></div>
						</div>
					</div>

					<ul class="fa-ul" style="margin-left: 1.65em;">
						<li class="mb-3">
							<span class="fa-li"><i class="fas fa-home"></i></span><span class="ms-2">Huế</span>
						</li>
						<li class="mb-3">
							<span class="fa-li"><i class="fas fa-envelope"></i></span><span class="ms-2">thaihieudz@gmai.com</span>
						</li>
						<li class="mb-3">
							<span class="fa-li"><i class="fas fa-phone"></i></span><span class="ms-2">+ 01 234 567 88</span>
						</li>
						<li class="mb-3">
							<span class="fa-li"><i class="fas fa-print"></i></span><span class="ms-2">+ 01 234 567 89</span>
						</li>
					</ul>
				</div>
				<!--Grid column-->

				<!--Grid column-->
				<div class="col-lg-4 col-md-6 mb-4 mb-md-0">
					<h5 class="text-uppercase mb-4">Giờ Mở Cửa</h5>

					<table class="table text-center text-white">
						<tbody class="font-weight-normal">
							<tr>
								<td>Mon - Thu:</td>
								<td>8am - 9pm</td>
							</tr>
							<tr>
								<td>Fri - Sat:</td>
								<td>8am - 1am</td>
							</tr>
							<tr>
								<td>Sunday:</td>
								<td>9am - 10pm</td>
							</tr>
						</tbody>
					</table>
				</div>
				<!--Grid column-->
			</div>
			<!--Grid row-->
		</div>
		<!-- Grid container -->

		<!-- Copyright -->
		<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
			© 2020 Copyright: Thái Hiếu
		</div>
		<!-- Copyright -->
	</footer>

</div>
<!-- End of .container -->

<?php
/**
 * Functions hooked in to storefront_footer action
 *
 * @hooked storefront_footer_widgets - 10
 * @hooked storefront_credit         - 20
 */
?>
<?php do_action('storefront_after_footer'); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>