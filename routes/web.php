<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Commentcontroller;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerAuthenticationController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerPasswordResetController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\MaincategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PosterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TouchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VariationController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontendController::class, 'home'])->name('site');
Route::get('/product/details/{slug}', [FrontendController::class, 'product_details'])->name('product.details');
Route::post('/getSize', [FrontendController::class, 'getSize']);
Route::get('/product-quick-view/{id}', [FrontendController::class, 'product_quick_view']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// User
Route::get('/password/forgot', [UserController::class, 'forgot_password'])->name('forgot.password');
Route::post('/password/reset/send', [UserController::class, 'password_reset_send'])->name('password.reset.send');
Route::get('/password/reset/form/{token}', [UserController::class, 'password_reset_form'])->name('password.reset.form');
Route::post('/password/reset/set/', [UserController::class, 'password_reset_set'])->name('password.reset.set');
Route::get('user/single/delete/{user_id}', [UserController::class, 'user_single_delete'])->name('user.single.delete');
Route::get('user/single/edit/{user_id}', [UserController::class, 'user_single_edit'])->name('user.single.edit');
Route::post('user/single/update', [UserController::class, 'user_single_update'])->name('user.single.update');

// Profile
Route::get('user/profile/', [ProfileController::class, 'profile'])->name('profile');
Route::post('user/profile/update', [ProfileController::class, 'profile_update'])->name('profile.update');

// Users
Route::get('user/list/', [ProfileController::class, 'user_list'])->name('user.list');
Route::get('user/edit/{user_id}', [ProfileController::class, 'user_edit'])->name('user.edit');
Route::post('user/update/', [ProfileController::class, 'user_update'])->name('user.update');


// Category
Route::get('/category/add', [CategoryController::class, 'category'])->name('category');
Route::get('/category/list', [CategoryController::class, 'category_list'])->name('category.list');
Route::post('/category/store', [CategoryController::class, 'category_store'])->name('category.store');
Route::get('/category/edit/{category_id}', [CategoryController::class, 'category_edit'])->name('category.edit');
Route::get('/category/delete/{category_id}', [CategoryController::class, 'category_delete'])->name('category.delete');
Route::post('/category/update/', [CategoryController::class, 'category_update'])->name('category.update');

// Subcategory
Route::get('/category/subcategory/add', [SubcategoryController::class, 'subcategory'])->name('subcategory');
Route::get('/category/subcategory/list', [SubcategoryController::class, 'subcategory_list'])->name('subcategory.list');
Route::post('/subcategory/store', [SubcategoryController::class, 'subcategory_store'])->name('subcategory.store');
Route::get('/subcategory/edit/{subcategory_id}', [SubcategoryController::class, 'subcategory_edit'])->name('subcategory.edit');
Route::post('/subcategory/update/', [SubcategoryController::class, 'subcategory_update'])->name('subcategory.update');
Route::get('/subcategory/delete/{subcategory_id}', [SubcategoryController::class, 'subcategory_delete'])->name('subcategory.delete');


// Maincategory
// Route::get('/category/maincategory/add', [MaincategoryController::class, 'maincategory'])->name('maincategory');
// Route::get('/category/maincategory/list', [MaincategoryController::class, 'maincategory_list'])->name('maincategory.list');
// Route::post('/maincategory/store', [MaincategoryController::class, 'maincategory_store'])->name('maincategory.store');
// Route::get('/maincategory/edit/{maincategory_id}', [MaincategoryController::class, 'maincategory_edit'])->name('maincategory.edit');
// Route::post('/maincategory/update/', [MaincategoryController::class, 'maincategory_update'])->name('maincategory.update');
// Route::get('/maincategory/delete/{maincategory_id}', [MaincategoryController::class, 'maincategory_delete'])->name('maincategory.delete');


// Product
Route::get('/product', [ProductController::class, 'product'])->name('product');
Route::get('/product/list', [ProductController::class, 'product_list'])->name('product.list');
Route::post('/getSubcategory', [ProductController::class, 'getSubcategory'])->name('getSubcategory');
Route::post('/product/store', [ProductController::class, 'product_store'])->name('product.store');
Route::get('/product/delete/{product_id}', [ProductController::class, 'product_delete'])->name('product.delete');
Route::get('/product/status/{product_id}', [ProductController::class, 'product_status'])->name('product.status');



// Brand
Route::get('/product/brand', [BrandController::class, 'product_brand'])->name('brand');
Route::get('/brand', [BrandController::class, 'brand'])->name('brand.name');
Route::post('/product/brand/store', [BrandController::class, 'brand_store'])->name('brand.store');
Route::get('/product/brand/list', [BrandController::class, 'brand_list'])->name('brand.list');
Route::get('/product/brand/edit/{brand_id}', [BrandController::class, 'brand_edit'])->name('brand.edit');
Route::post('/brand/update/', [BrandController::class, 'brand_update'])->name('brand.update');
Route::get('/brand/delete/{brand_id}', [BrandController::class, 'brand_delete'])->name('brand.delete');

// Variation
Route::get('/product/variation', [VariationController::class, 'product_variation'])->name('variation');
Route::get('/product/variation/list', [VariationController::class, 'variation_list'])->name('variation.list');
Route::post('/color', [VariationController::class, 'color'])->name('color');
Route::get('/color/delete/{color_id}', [VariationController::class, 'color_delete'])->name('color.delete');
Route::post('/size', [VariationController::class, 'size'])->name('size');
Route::get('/size/delete/{size_id}', [VariationController::class, 'size_delete'])->name('size.delete');


// Inventory
Route::get('/product/inventory/{product_id}', [ProductController::class, 'inventory'])->name('inventory');
Route::post('/product/inventory/store', [ProductController::class, 'inventory_store'])->name('inventory.store');

// Customer Authentication
Route::get('/customer/register', [FrontendController::class, 'customer_register'])->name('customer.register');
Route::get('/customer/login', [FrontendController::class, 'customer_login'])->name('customer.login');
Route::get('/customer/logout', [FrontendController::class, 'customer_logout'])->name('customer.logout');
Route::post('/customer/register/store', [CustomerAuthenticationController::class, 'customer_register_store'])->name('customer.register.store');
Route::post('/customer/login/store', [CustomerAuthenticationController::class, 'customer_login_store'])->name('customer.login.store');
Route::get('/customer/account', [CustomerAuthenticationController::class, 'customer_account'])->name('customer.account');
Route::post('/customer/update', [CustomerAuthenticationController::class, 'customer_update'])->name('customer.update');


// Customer Email Verify
Route::get('customer/email/verify/{token}', [CustomerAuthenticationController::class, 'customer_email_verify']);
Route::get('customer/password/reset', [CustomerPasswordResetController::class, 'customer_pass_reset_req'])->name('customer.pass.reset.req');
Route::post('customer/password/send', [CustomerPasswordResetController::class, 'customer_pass_reset_send'])->name('customer.pass.reset.send');
Route::get('/customer/password/reset/form/{token}', [CustomerPasswordResetController::class, 'customer_pass_reset_form'])->name('customer.pass.reset.form');
Route::post('/customer/password/update', [CustomerPasswordResetController::class, 'customer_pass_update'])->name('customer.pass.update');


// Cart
Route::post('/cart/store', [CartController::class, 'cart_store'])->name('cart.store');
Route::post('/cart/update', [CartController::class, 'cart_update'])->name('cart.update');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/cart/single/delete/{cart_id}', [CartController::class, 'cart_single_delete'])->name('cart.single.delete');


// Coupon
Route::get('/coupon', [CouponController::class, 'coupon'])->name('coupon');
Route::get('/coupon/list', [CouponController::class, 'coupon_list'])->name('coupon.list');
Route::post('/coupon/store', [CouponController::class, 'coupon_store'])->name('coupon.store');
Route::get('/coupon/delete/{coupon_id}', [CouponController::class, 'coupon_delete'])->name('coupon.delete');


// Wishlist 
Route::get('/wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');
Route::get('/wishlist/delete/{wishlist_id}', [WishlistController::class, 'wishlist_delete'])->name('wishlist.delete');
Route::get('/cart/store/wishlist/{wishlist_id}', [WishlistController::class, 'cart_store_wishlist'])->name('cart.store.wishlist');

// Checkout
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout')->middleware('customerauth');

// Order
Route::post('/order/store', [OrderController::class, 'order_store'])->name('order.store');
Route::get('/order/success', [OrderController::class, 'order_success'])->name('order.success');
Route::get('/order/list', [OrderController::class, 'order'])->name('order');
Route::post('/order/status', [OrderController::class, 'order_status'])->name('order.status');


// Invoice download
Route::get('/invoice/download/{order_id}', [OrderController::class, 'invoice_download'])->name('download.invoice');


// Contact
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::get('/message', [ContactController::class, 'message'])->name('message');
Route::get('/message/delete/{message_id}', [ContactController::class, 'message_delete'])->name('message.delete');
Route::post('/contact/message/send', [ContactController::class, 'message_send'])->name('message.send');


// Shop
Route::get('/shop', [SearchController::class, 'shop'])->name('shop');
// Route::get('/search/btn', [SearchController::class, 'search_btn']);
Route::get('/shop/search', [SearchController::class, 'shop_search'])->name('shop.search');
// Route::post('/getmaincategories', [SearchController::class, 'getmaincategories'])->name('shop');
Route::get('/showDetails', [FrontendController::class, 'showDetails'])->name('showDetails');

// Register User
Route::get('/register/user', [UserController::class, 'user_register'])->name('user.register');
Route::post('/user/store', [UserController::class, 'user_store'])->name('user.store');

// Review
Route::get('/review', [ReviewController::class, 'review'])->name('review');
Route::get('/review/edit/{review_id}', [ReviewController::class, 'review_edit'])->name('review.edit');
Route::post('/review/store', [CustomerController::class, 'review_store'])->name('review.store');
Route::post('/review/udpate', [ReviewController::class, 'review_udpate'])->name('review.udpate');


// Faq
Route::get('/faq', [FaqController::class, 'faq'])->name('faq');
Route::get('/faq/list', [FaqController::class, 'faq_list'])->name('faq.list');
Route::get('/faq/delete/left/{faq_id}', [FaqController::class, 'faq_delete_left'])->name('faq.delete.left');
Route::get('/faq/delete/right/{faq_id}', [FaqController::class, 'faq_delete_right'])->name('faq.delete.right');
Route::get('/faq/store', [FaqController::class, 'faq_store'])->name('faq.store');
Route::post('/faq/add', [FaqController::class, 'faq_add'])->name('faq.add');
Route::post('/faq/add/right', [FaqController::class, 'faq_add_right'])->name('faq.add.r');

// About
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/about/add', [AboutController::class, 'about_add'])->name('about.add');
Route::get('/about/add/list', [AboutController::class, 'about_list'])->name('about.list');
Route::post('/about/store', [AboutController::class, 'about_store'])->name('about.store');
Route::get('/about/delete/{about_id}', [AboutController::class, 'about_delete'])->name('about.delete');

// Service
Route::get('/service', [ServiceController::class, 'service'])->name('service');
Route::post('/service/store/', [ServiceController::class, 'service_store'])->name('service.store');
Route::get('/service/delete/{service_id}', [ServiceController::class, 'service_delete'])->name('service.delete');

// Team
Route::get('/team', [TeamController::class, 'team'])->name('team');
Route::post('/team/store', [TeamController::class, 'team_store'])->name('team.store');
Route::get('/team/list', [TeamController::class, 'team_list'])->name('team.list');
Route::get('/team/delete/{team_id}', [TeamController::class, 'team_delete'])->name('team.delete');
Route::get('/team/edit/{team_id}', [TeamController::class, 'team_edit'])->name('team.edit');
Route::post('/team/update', [TeamController::class, 'team_update'])->name('team.update');


// Feature
Route::get('/feature', [FeatureController::class, 'feature'])->name('feature');
Route::get('/feature/list', [FeatureController::class, 'feature_list'])->name('feature.list');
Route::post('/feature/top', [FeatureController::class, 'feature_store_top'])->name('feature.store.top');
Route::post('/feature/bottom', [FeatureController::class, 'feature_store_bottom'])->name('feature.store.bottom');
Route::get('/feature/top/delete/{feature_id}', [FeatureController::class, 'feature_top_delete'])->name('feature.top.delete');
Route::get('/feature/bottom/delete/{feature_id}', [FeatureController::class, 'feature_bottom_delete'])->name('feature.bottom.delete');


// Setting
Route::get('/setting', [SettingController::class, 'setting'])->name('setting');
Route::get('/aboutus/delete/{about_id}', [SettingController::class, 'aboutus_delete'])->name('aboutus.delete');
Route::post('/setting/site/store', [SettingController::class, 'site_store'])->name('site.store');

// get in touch
Route::post('/setting/touch', [SettingController::class, 'touch'])->name('touch');
Route::get('/setting/touch/delete/{touch_id}', [SettingController::class, 'touch_delete'])->name('touch.delete');

// Follow us
Route::post('/setting/follow', [SettingController::class, 'follow'])->name('follow');
Route::get('/setting/follow/delete/{social_id}', [SettingController::class, 'social_delete'])->name('social.delete');


// Banner
Route::get('/banner', [BannerController::class, 'banner'])->name('banner');
Route::post('/banner/store', [BannerController::class, 'banner_store'])->name('banner.store');
Route::get('/banner/delete/{banner_id}', [BannerController::class, 'banner_delete'])->name('banner.delete');

// Footer feature
Route::get('/feature/footer/feature', [FeatureController::class, 'footer_feature'])->name('footer.feature');
Route::post('/feature/footer/store', [FeatureController::class, 'footer_feature_store'])->name('footer.feature.store');
Route::get('/feature/footer/delete/{feature_id}', [FeatureController::class, 'footer_feature_delete'])->name('feature.footer.delete');

// Payments
Route::get('/payment', [PaymentController::class, 'payment'])->name('payment');
Route::get('/payment/transaction/list', [PaymentController::class, 'transaction_list'])->name('transaction.list');
Route::post('/payment/store', [PaymentController::class, 'payment_store'])->name('payment.store');
Route::get('/payment/delete/{payment_id}', [PaymentController::class, 'payment_delete'])->name('payment.delete');
Route::get('/transaction/delete/{payment_id}', [PaymentController::class, 'transaction_delete'])->name('transaction.delete');
Route::get('/transaction/charge', [PaymentController::class, 'transaction_charge'])->name('transaction.charge');
Route::post('/transaction/charge/store', [PaymentController::class, 'transaction_charge_store'])->name('charge.store');
Route::get('/transaction/charge/delete/{charge_id}', [PaymentController::class, 'charge_delete'])->name('charge.delete');


// setting favicon
Route::get('/setting/favicon', [SettingController::class, 'favicon'])->name('favicon');
Route::get('/setting/favicon/delete/{favicon_id}', [SettingController::class, 'favicon_delete'])->name('favicon.delete');
Route::post('/setting/favicon/store', [SettingController::class, 'favicon_store'])->name('favicon.store');


//site meta details
Route::get('/setting/webdetails', [SettingController::class, 'webdetails'])->name('webdetails');
Route::post('/meta/desc/store', [SettingController::class, 'meta_desc_store'])->name('meta.desc.store');
Route::get('/meta/desc/delete/{meta_id}', [SettingController::class, 'meta_desc_delete'])->name('meta.desc.delete');

// site meta keyword
Route::post('/setting/keywords/store', [SettingController::class, 'keywords_store'])->name('keyword.store');
Route::get('/meta/keyword/delete/{meta_id}', [SettingController::class, 'meta_keyword_delete'])->name('meta.keyword.delete');

// Site name
Route::post('/setting/site/name/store', [SettingController::class, 'site_name_store'])->name('site.name.store');
Route::get('/setting/site/name/delete/{site_id}', [SettingController::class, 'site_name_delete'])->name('site.name.delete');

// Deal section
Route::get('/deal', [DealController::class, 'deal'])->name('deal');
Route::post('/deal/store', [DealController::class, 'deal_store'])->name('deal.store');
Route::get('/deal/delete/{deal_id}', [DealController::class, 'deal_delete'])->name('deal.delete');


// 
Route::get('/search/btn', [SearchController::class, 'search_btn'])->name('search.btn');

// Role management
// Route::get('/role', [RoleController::class, 'role'])->name('role');
// Route::post('/permission/store', [RoleController::class, 'permission_store'])->name('permission.store');
// Route::post('/role/store', [RoleController::class, 'role_store'])->name('role.store');
// Route::post('/role/update', [RoleController::class, 'role_update'])->name('role.update');
// Route::post('/role/assign', [RoleController::class, 'role_assign'])->name('role.assign');
// Route::get('/remove/user/role/{user_id}', [RoleController::class, 'remove_user_role'])->name('remove.user.role');
// Route::get('/edit/user/role/{role_id}', [RoleController::class, 'edit_role'])->name('edit.role');


// Offer section
Route::get('/offer', [CouponController::class, 'offer'])->name('offer');
Route::post('/offer/store', [CouponController::class, 'offer_store'])->name('offer.store');
Route::get('/offer/delete/{offer_id}', [CouponController::class, 'offer_delete'])->name('offer.delete');
Route::get('/offer/status/change/{offer_id}', [CouponController::class, 'offer_status_change'])->name('offer.status.change');

// Poster section
Route::get('/poster', [PosterController::class, 'poster'])->name('poster');
Route::post('/poster/store', [PosterController::class, 'poster_store'])->name('poster.store');
Route::get('/poster/delete/{poster_id}', [PosterController::class, 'poster_delete'])->name('poster.delete');


// Social authentication controller
Route::get('/google/redirect', [GoogleController::class, 'google_redirect'])->name('google.redirect');
Route::get('/google/callback', [GoogleController::class, 'google_callback'])->name('google.callback');
Route::get('/facebook/redirect', [FacebookController::class, 'facebook_redirect'])->name('facebook.redirect');
Route::get('/facebook/callback', [FacebookController::class, 'facebook_callback'])->name('facebook.callback');


// Blog 
Route::get('/blog/tag', [BlogController::class, 'blog_tag'])->name('blog.tag');
Route::get('/blog/list', [BlogController::class, 'blog_list'])->name('blog.list');
Route::post('/tag/store', [BlogController::class, 'tag_store'])->name('tag.store');
Route::get('/tag/delete/{tag_id}', [BlogController::class, 'tag_delete'])->name('tag.delete');
Route::get('/blog/add', [BlogController::class, 'blog_add'])->name('blog.add');
Route::post('/blog/store', [BlogController::class, 'blog_store'])->name('blog.store');
Route::get('/blog/delete/{blog_id}', [BlogController::class, 'blog_delete'])->name('blog.delete');
Route::get('/blog/edit/{blog_id}', [BlogController::class, 'blog_edit'])->name('blog.edit');
Route::post('/blog/update', [BlogController::class, 'blog_update'])->name('blog.update');
Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
Route::get('/blog/grid', [BlogController::class, 'blog_grid'])->name('blog.grid');
Route::get('/blog/details/{blog_slug}', [BlogController::class, 'blog_details'])->name('blog.details');
Route::get('/blog/comment', [BlogController::class, 'blog_comment'])->name('blog.comment');
Route::get('/blog/comment/delete/{comment_id}', [BlogController::class, 'comment_delete'])->name('comment.delete');
Route::get('/blog/search', [SearchController::class, 'blog_search'])->name('blog.search');
Route::get('/tag/search/{tag}', [SearchController::class, 'tag_search'])->name('tag.search');
Route::get('/blog/category/search/{blog_id}', [BlogController::class, 'blog_category_search'])->name('blog.category.search');
Route::get('/blog/category/grid', [BlogController::class, 'blog_category_grid'])->name('blog.category.grid');




// Blog Comment
Route::post('/blog/comment', [Commentcontroller::class, 'comment'])->name('comment');


// cart.add.single
Route::get('/cart/add/single/{product_id}', [CartController::class, 'cart_add_single'])->name('cart.add.single');
Route::post('/product/add', [CartController::class, 'product_add'])->name('product.add');

// wishlist.add.single
Route::get('/wishlist/add/single/{product_id}', [WishlistController::class, 'wishlist_add_single'])->name('wishlist.add.single');