=== Tiresias - Recommendation Engine for WooCommerce ===
Contributors: BeTechnology
Tags: tiresias tagging, woocommerce, e-commerce, ecommerce, personalization, recommendations, 
Requires at least: 3.5.0
Tested up to: 4.3.1
Stable tag: 0.0.1
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Tiresias is the easiest way to deliver your customers personalized shopping experiences - wherever they are.

== Description ==

Tiresias analyzes your customers’ behavior, learning their likes and dislikes and enables you to automatically personalize your product recommendations for each individual shopper. The result? Happier customers that buy more.

Combining patent-pending world-class technology with a core focus on ease of use, there are no complicated integrations or deep technical know-how required. And with a success-based pricing model that scales with your business, you’ll be up and running in minutes - totally risk free.


Features

Personalized Product Recommendations
-Recommend shoppers the most relevant products in real-time based on their unique user behavior.


OK, but why Tiresias?

-Pay only for the sales we help you make
We believe it’s important to be fair. That is why we only make money when you do, taking a small % of the revenue we help you generate. No setup costs. No fixed fees. No minimum contract lengths. Learn more about our pricing here.

-Easy to customize, easy to use
Tiresias makes it easy for you to create and edit recommendations with just a few clicks. With options available for advanced rules and filtering and customizable design, the control is in your hands.

-1:1 personalization
Unlike other services, Tiresias delivers tailored recommendations right down to the individual. We know the brands your customers love, the categories they shop and what they’ve bought or browsed in the past. The result? Higher conversion rates for you.

-Real-time
Tiresias’s self-learning recommendation engine works in real-time, detecting product and customer behavior updates as they happen and updating recommendations accordingly, ensuring a smooth, up-to-date and relevant user experience at all times.

-In-depth analytics
Tiresias’s Admin Panel provides in-depth analytics and reporting tools to help you keep track of your KPIs and how Tiresias is helping you reach them. Keep on top of your business, wherever you are.

== Installation ==

Before proceeding please make sure that you are running WordPress 3.5 or above and WooCommerce 2.0.0 or above.

Please refer to the WordPress documentation on how to get the plugin to appear in your installation admin section.

Once the plugin appears in your installation, you must activate it. Navigate to the "Plugins" section and locate the
"WooCommerce Tiresias Tagging" plugin. The activation is done simply by clicking the "Activate" link next to the plugin
name in the list.

The activation procedure will create a new page called "Top Sellers". This page can be found and edited under the
"Pages" section in the backend. The page contains a single div element that is used to show product recommendations. A
link to the page should appear in the shops main navigation menu.

The plugin uses the WordPress Action API to add content to the shop. However, there are a few actions that will have to
be added to the shops theme in order for the plugin to function to its full extent.

* wcnt_before_search_result
	* This action should be called above the search result list on the on search pages
	* You need to add `<?php do_action('wcnt_before_search_result'); ?>` in your themes search page template at the
	appropriate location
	* Please note that this only applies to the WordPress search and not the WooCommerce search
		* If you are using the WooCommerce search, you do not need to add any actions to the templates
* wcnt_after_search_result
	* This action should be called below the search result list on the on search pages
	* You need to add `<?php do_action('wcnt_after_search_result'); ?>` in your themes search page template at the
	appropriate location
	* Please note that this only applies to the WordPress search and not the WooCommerce search
		* If you are using the WooCommerce search, you do not need to add any actions to the templates
* wcnt_before_main_content
	* This action should be called at the beginning of every page in the shop
	* You need to add `<?php do_action('wcnt_before_main_content'); ?>` in your themes header template, inside the main
	content section
* wcnt_after_main_content
	* This action should be called at the end of every page in the shop
	* You need to add `<?php do_action('wcnt_after_main_content'); ?>` in your themes footer template, inside the main
	content section

Once you have activated the plugin and added the necessary actions, you need to configure the plugin. The plugins
configuration page can be found under the "Settings->Store" section, in the tab called "Tiresias Tagging".

The configuration page consists of three settings:

* Server address
	* This is the server address for the Tiresias marketing automation service
	* It will have the default value of "connect.tiresias.com" and you do not need to change this
* Account name
	* This is your Tiresias marketing automation service account name that you got when registering for the service
* Use default Tiresias elements
	* This setting controls if the plugin should create and output the default Tiresias elements for showing the product
	recommendations
	* You can disable the defaults if you want to use your own elements in your theme

All of the above settings are needed for the plugin to work.

The "Tiresias Tagging" widget added by the plugin for showing Tiresias elements in the shops sidebars, needs to be configured
if you wish to use it. The widget can be found under the "Appearance->Widgets" section and it works like any other
WordPress widget. After dropping the widget in the appropriate sidebar container, you need to configure its Tiresias ID.
This ID is used as the Tiresias element div ID attribute and can be whatever you decide.

== Changelog ==

= 1.0.4 =
* Initial version
== Known issues ==

* Does not support products that are sold only in a group product but NOT individually in the store
	* A group product consists of multiple simple products and the group is tagged on the product page
	while the individual simple products in the group are tagged in the cart and order
