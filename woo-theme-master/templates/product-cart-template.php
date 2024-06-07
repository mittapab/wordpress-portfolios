<?php

/** Template Name: Product Cart Template  */

get_header(); 

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>




<section class="top-discount-area d-md-flex align-items-center">
            <!-- Single Discount Area -->
            <div class="single-discount-area">
                <h5>Free Shipping &amp; Returns</h5>
                <h6><a href="#">BUY NOW</a></h6>
            </div>
            <!-- Single Discount Area -->
            <div class="single-discount-area">
                <h5>20% Discount for all dresses</h5>
                <h6>USE CODE: Colorlib</h6>
            </div>
            <!-- Single Discount Area -->
            <div class="single-discount-area">
                <h5>20% Discount for students</h5>
                <h6>USE CODE: Colorlib</h6>
            </div>
        </section>
        <!-- ****** Top Discount Area End ****** -->

        <!-- ****** Cart Area Start ****** -->
        <form class="" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
        <?php do_action( 'woocommerce_before_cart_table' ); ?>
            <div class="cart_area section_padding_100 clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="cart-table clearfix">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {   
                                              
                                              $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				                              $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                                              if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                               ?>
                                                   <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
                                                        <td class="cart_product_img d-flex align-items-center">
                                                            <?php  echo $_product->get_image(array( 120, 150 )); ?>
                                                            <h6 style="margin-left:2%;"><?php echo  $_product->get_name(); ?></h6> 
                                                        </td>
                                                         
                                                        <td class="price">
                                                        <span>
                                                          <?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?>
                                                        </span></td>
                                                        <td class="qty">
                                                        <div class="quantity">
                                                        <?php
                                                            if ( $_product->is_sold_individually() ) {
                                                                $min_quantity = 1;
                                                                $max_quantity = 1;
                                                            } else {
                                                                $min_quantity = 0;
                                                                $max_quantity = $_product->get_max_purchase_quantity();
                                                            }

                                                            $product_quantity = woocommerce_quantity_input(
                                                                array(
                                                                    'input_name'   => "cart[{$cart_item_key}][qty]",
                                                                    'input_value'  => $cart_item['quantity'],
                                                                    'max_value'    => $max_quantity,
                                                                    'min_value'    => $min_quantity,
                                                                    'product_name' => $_product->get_name(),
                                                                ),
                                                                $_product,
                                                                false
                                                            );

                                                            echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
						                                ?>
                                                            <!-- <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                            <input type="number" class="qty-text" id="qty" step="1" min="1" max="99" name="quantity" value="1">
                                                            <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span> -->
                                                        </div>
                                                       </td>
                                                       <td class="total_price">
                                                       <?php
								                         echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
							                            ?>
                                                       </td>
                                                   </tr>




                                              <?php }
                                            
                                            ?>
                                           
                                        <?php  }   ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="cart-footer d-flex mt-30">
                                <div class="back-to-shop w-50">
                                    <a href="shop-grid-left-sidebar.html">Continue shooping</a>
                                </div>
                                <div class="update-checkout w-50 text-right">
                                    <a href="#">clear cart</a>
                                    <a href="#">Update cart</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="coupon-code-area mt-70">
                                <div class="cart-page-heading">
                                    <h5>Cupon code</h5>
                                    <p>Enter your cupone code</p>
                                </div>
                                <form action="#">
                                    <input type="search" name="search" placeholder="#569ab15">
                                    <button type="submit">Apply</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="shipping-method-area mt-70">
                                <div class="cart-page-heading">
                                    <h5>Shipping method</h5>
                                    <p>Select the one you want</p>
                                </div>

                                <div class="custom-control custom-radio mb-30">
                                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label d-flex align-items-center justify-content-between" for="customRadio1"><span>Next day delivery</span><span>$4.99</span></label>
                                </div>

                                <div class="custom-control custom-radio mb-30">
                                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label d-flex align-items-center justify-content-between" for="customRadio2"><span>Standard delivery</span><span>$1.99</span></label>
                                </div>

                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label d-flex align-items-center justify-content-between" for="customRadio3"><span>Personal Pickup</span><span>Free</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="cart-total-area mt-70">
                                <div class="cart-page-heading">
                                    <h5>Cart total</h5>
                                    <p>Final info</p>
                                </div>

                                <ul class="cart-total-chart">
                                    <li><span>Subtotal</span> <span>$59.90</span></li>
                                    <li><span>Shipping</span> <span>Free</span></li>
                                    <li><span><strong>Total</strong></span> <span><strong>$59.90</strong></span></li>
                                </ul>
                                <a href="checkout.html" class="btn karl-checkout-btn">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>




<?php get_footer();