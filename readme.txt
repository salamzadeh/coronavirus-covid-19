=== Coronavirus COVID-19  - Live Map WordPress Plugin ===
Contributors: Salamzadeh
Donate link: https://salamzadeh.net/donate
Tags: corona, coronavirus, covid-19, ncov, virus, chart, covid, data, disease, infection, outbreak, pandemic, prediction,
Requires at least: 3.0.1
Tested up to: 5.2
Stable tag: trunk
PHP Version: 5.6 or higher
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
The plugin provided a shortcode [COVID-19] to display Live Map and Statistics, you can use the shortcode in posts or pages.
Version: 1.1.0
== Description ==

Coronavirus COVID-19 Plugin provided a shortcode [COVID-19] to display Live Map and Statistics, you can use the shortcode in posts or pages.

== 3RD PARTY OR EXTERNAL SERVICE DISCLAIMER ==

The plugin connects to our website through an API call ([This API](https://salamzadeh.net/api/get_covid19_map_file.json "This API")) to get the last statistics of coronavirus covid 19.
The Widget ShortCode is Added with 5 Template and Darkmode style.

**Available ShortCodes**

*  [COVID-19]
*  [COVID-19-WIDGET]
You can use darkmode in (theme-1 theme-2 theme-3 and default styles)
` [COVID-19-WIDGET darkmode="true"] `
with country parameter you can get and show a specific country statistics 
` [COVID-19-WIDGET country="Iran" darkmode="true"] `
you can set the theme of widget via theme parameter ( use 1,2,3,4,5)
` [COVID-19-WIDGET country="Iran" theme="1"] `
and also you can use title,label_confirmed,label_deaths,label_recovered for set this attribute for any of widgets.
` [COVID-19-WIDGET country="Total" theme="2" darkmode="true" title="Global"] `

== Screenshots ==
1. Only Live Map
2. Live Map with Statistics
2. Country Statistics Widget


== Features ==
* Real-time update the number of confirmed cases, recovered and deaths.
* Shortcode flexible, allow display everywhere in your site.
* Display All Countries.
* Flexible customize title and description.
* Optimized speed.

IT DOES NOT SEND ANY DATA NOR DO WE COLLECT INFORMATION FROM THE REQUEST

Our privacy policy can be found at this URL [https://salamzadeh.net/privacy-policy/](https://salamzadeh.net/privacy-policy/ "https://salamzadeh.net/privacy-policy/")

The data sources include the World Health Organization, the U.S. Centers for Disease Control and Prevention, the European Center for Disease Prevention and Control, the National Health Commission of the People’s Republic of China, and the DXY, one of the world’s largest online communities for physicians, health care professionals, pharmacies and facilities.


**Support via:**

*  http://wordpress.org/tags/coronavirus-covid19
*  Contact me via my website ( https://salamzadeh.net/contact/ )

== Installation ==

1. Upload files to your `/wp-content/plugins/` directory (preserve sub-directory structure if applicable)
1. Activate the plugin through the 'Plugins' menu in WordPress

Or

1. Within your WordPress admin, go to plugins > add new
1. Search for "Coronavirus Covid-19".
1. Click Install Now for the plugin named "Coronavirus Covid-19"



== Changelog ==

Expanded list can be found at: http://salamzadeh.net/plugins/covid-19/release-history

= 1.1.0 =
* Improve API ( Update every 10 minutes )
* Add Widget via ShortCode
* Add Five Theme for Widget Mode 
* Add Dark Mode For Widget Shortcode

= 1.0.0 =
* First Public Release