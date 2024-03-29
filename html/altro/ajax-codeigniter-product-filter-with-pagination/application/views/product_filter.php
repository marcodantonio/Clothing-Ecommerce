<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.js"></script>
</head>

<body>
	<!-- header -->
	<header>
		<div class="main-header-area">
			<div class="logo">
				<span class="logo-text">Jamsr World</span>
			</div>
			<form class="search-form">
				<div class="search-container">
					<div class="search-wrapper">
						<input id="product_name" class="search-input" placeholder="Search your products..." type="text">
					</div>

					<button class="search-button">
						<svg width="20" height="20" viewBox="0 0 17 18" class="" xmlns="http://www.w3.org/2000/svg">
							<g fill="#2874F1" fill-rule="evenodd">
								<path class="_2BhAHa"
									d="m11.618 9.897l4.225 4.212c.092.092.101.232.02.313l-1.465 1.46c-.081.081-.221.072-.314-.02l-4.216-4.203">
								</path>
								<path class="_2BhAHa"
									d="m6.486 10.901c-2.42 0-4.381-1.956-4.381-4.368 0-2.413 1.961-4.369 4.381-4.369 2.42 0 4.381 1.956 4.381 4.369 0 2.413-1.961 4.368-4.381 4.368m0-10.835c-3.582 0-6.486 2.895-6.486 6.467 0 3.572 2.904 6.467 6.486 6.467 3.582 0 6.486-2.895 6.486-6.467 0-3.572-2.904-6.467-6.486-6.467">
								</path>
							</g>
						</svg>
					</button>
				</div>
			</form>
			<div class="right-area-header">
				<div class="">
					<span class="">Jamsr</span>
					<svg width="4.7" height="8" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg"
						class="drop-inactive">
						<path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#fff"
							class="_14jSvk"></path>
					</svg>
				</div>
				<div class="">
					<span>More</span>
					<svg width="4.7" height="8" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg"
						class="drop-inactive">
						<path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#fff"
							class="_14jSvk"></path>
					</svg>
				</div>
				<div class="">
					<svg class="_2fcmoV" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
						<path class="_2JpNOH"
							d="M15.32 2.405H4.887C3 2.405 2.46.805 2.46.805L2.257.21C2.208.085 2.083 0 1.946 0H.336C.1 0-.064.24.024.46l.644 1.945L3.11 9.767c.047.137.175.23.32.23h8.418l-.493 1.958H3.768l.002.003c-.017 0-.033-.003-.05-.003-1.06 0-1.92.86-1.92 1.92s.86 1.92 1.92 1.92c.99 0 1.805-.75 1.91-1.712l5.55.076c.12.922.91 1.636 1.867 1.636 1.04 0 1.885-.844 1.885-1.885 0-.866-.584-1.593-1.38-1.814l2.423-8.832c.12-.433-.206-.86-.655-.86"
							fill="#fff"></path>
					</svg>
					<span>Cart</span>
				</div>
			</div>
		</div>
	</header>
	<!-- header end -->
	<!-- Main Container -->
	<div class="container">

		<!-- Left Area Conatiner -->
		<div class="left-area-container">
			<!-- Filter Container -->
			<div class="filter-container">
				<!-- Filter text -->
				<div class="filter">
					<span class="filter-text">Filters</span>
				</div>
				<!-- Price Section -->

				<div class="filter filter-section">
					<div class="">
						<span class="heading-text">Price</span>
						<span class="price-clear">Clear</span>
					</div>
					<div class="price-slider">
						<input type="hidden" id="hidden_minimum_price" value="0" />
						<input type="hidden" id="hidden_maximum_price" value="65000" />
						<p id="price_show">1000 - 7000</p>
						<div id="price_range"></div>
					</div>
				</div>

				<!--  Brand Section -->
				<div class="filter filter-section">
					<div class="has-drop">
						<span class="heading-text">Brand</span>
						<svg class="drop-active" width="6" height="11" viewBox="0 0 16 27"
							xmlns="http://www.w3.org/2000/svg" class="_3KyMh7 _2Gnm9R">
							<path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#878787"
								class="_1ooUW7"></path>
						</svg>
					</div>
					<div class="section brand-section">
						<div class="products-brands-wrapper">
							<?php
					foreach ($brand_data->result_array() as $row) {
					?>
							<div class="brand-name-wrapper">
							    <label>
								<input type="checkbox"
									class="common_selector product_brand" value="<?php echo $row['product_brand']; ?>">
									<div class="brand-name-text"><?php echo $row['product_brand']; ?></div>
								</label>
							</div>
							<?php
					}
					?>
						</div>
					</div>
				</div>

				<!-- Ram Section -->
				<div class="filter filter-section">
					<div class="has-drop">
						<span class="heading-text">Storage</span>
						<svg class="drop-inactive" width="6" height="11" viewBox="0 0 16 27"
							xmlns="http://www.w3.org/2000/svg" class="_3KyMh7 _2Gnm9R">
							<path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#878787"
								class="_1ooUW7"></path>
						</svg>
					</div>
					<div style="display:none" class="section size-section">
						<div class="products-sizes-wrapper">

							<?php
					foreach ($product_storage->result_array() as $row) {
					?>
							<div class="size-name-wrapper">
							    	<label>
								<input type="checkbox" class="common_selector product_storage"
									value="<?php echo $row['product_storage']; ?>">
									<div class="size-name-text"><?php echo $row['product_storage']; ?> GB</div>
								</label>
							</div>
							<?php
					}
					?>
						</div>
					</div>
				</div>
				<!-- Size Section -->
				<div class="filter filter-section">
					<div class="has-drop">
						<span class="heading-text">Ram</span>
						<svg class="drop-inactive" width="6" height="11" viewBox="0 0 16 27"
							xmlns="http://www.w3.org/2000/svg" class="_3KyMh7 _2Gnm9R">
							<path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#878787"
								class="_1ooUW7"></path>
						</svg>
					</div>
					<div style="display:none" class="section size-section">
						<div class="products-sizes-wrapper">

							<?php
					foreach ($ram_data->result_array() as $row) {
					?>
							<div class="size-name-wrapper">
							    <label>
								<input  type="checkbox"
									class="common_selector product_ram" value="<?php echo $row['product_ram']; ?>">
									<div class="size-name-text"><?php echo $row['product_ram']; ?> GB</div>
								</label>
							</div>
							<?php
					}
					?>
						</div>
					</div>
				</div>


			</div>
			<!-- Filter Container Ends -->
		</div>
		<!-- Left Area Container Ends -->

		<!-- Right Area Container  -->
		<div class="right-area-container">
			<div style="background: #fff;">
				<!-- Products Container -->
				<div class="product-container">

					
				</div>
				<!-- Product Container Ends  -->
			</div>
			<div id="pagination_link"></div>
			<div>
				<!-- Right Area Container Ends -->

			</div>

			<!-- Main Conatiner Ends -->

			
			<script src="js/jquery-ui.js"></script>
			<script src="js/script.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<style>
				#loading {
					text-align: center;
					background: url('css/loader.gif') no-repeat center;
					height: 150px;
				}

			</style>
			<script>
				$(document).ready(function () {

					filter_data(1);

					function filter_data(page) {
						$('.product-container').html('<div id="loading" style="" ></div>');
						var action = 'fetch_data';
						var minimum_price = $('#hidden_minimum_price').val();
						var maximum_price = $('#hidden_maximum_price').val();
						var brand = get_filter('product_brand');
						var ram = get_filter('product_ram');
						var storage = get_filter('product_storage');
						var product_name = $('#product_name').val();
						$.ajax({
							url: "<?php echo base_url(); ?>Product_filter/fetch_data/" + page,
							method: "POST",
							dataType: "JSON",
							data: {
								action: action,
								minimum_price: minimum_price,
								maximum_price: maximum_price,
								brand: brand,
								ram: ram,
								storage: storage,
								product_name: product_name
							},
							success: function (data) {
								$('.product-container').html(data.product_list);
								$('#pagination_link').html(data.pagination_link);
							}
						})
					}

					function get_filter(class_name) {
						var filter = [];
						$('.' + class_name + ':checked').each(function () {
							filter.push($(this).val());
						});
						return filter;
					}

					$(document).on('click', '.pagination li a', function (event) {
						event.preventDefault();
						var page = $(this).data('ci-pagination-page');
						filter_data(page);
					});

					$('.common_selector').click(function () {
						filter_data(1);
					});

					$("#product_name").on('keyup keypress', function () {

						var ch = String.fromCharCode(event.which);
						if (!(/[a-zA-Z0-9 ]/.test(ch))) {
							event.returnValue = false;
						}
						filter_data(1);
					});

					$('#price_range').slider({
						range: true,
						min: 1000,
						max: 65000,
						values: [1000, 65000],
						step: 500,
						stop: function (event, ui) {
							$('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
							$('#hidden_minimum_price').val(ui.values[0]);
							$('#hidden_maximum_price').val(ui.values[1]);
							filter_data(1);
						}

					});



				});

			</script>

</body>

</html>
