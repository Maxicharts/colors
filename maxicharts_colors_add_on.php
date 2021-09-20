<?php
/*
 * Plugin Name: MaxiCharts Colors Add-on
 * Plugin URI: https://maxicharts.com
 * Description: Extends MaxiCharts' available color sets
 * Version: 1.1.0
 * Author: MaxiCharts
 * Author URI: http://www.termel.fr
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: maxicharts_c
 * Domain Path: /languages
 */
if (! defined('ABSPATH')) {
    exit();
}

if (! class_exists('maxicharts_colors_addon')) {

    class maxicharts_colors_addon
    {

        public static function init()
        {
            $class = __CLASS__;
            new $class();
        }

        function __construct()
        {
            if (! class_exists('MAXICHARTSAPI')) {
                $msg = __('Please install MaxiCharts before');
                return $msg;
            }
            self::getLogger()->debug("Adding Module : " . __CLASS__);
        }

        function add_hooks()
        {
            add_filter("mcharts_available_color_sets", array(
                $this,
                "mcharts_add_new_color_sets"
            ));
        }

        function mcharts_add_new_color_sets($available_color_sets)
        {
            self::getLogger()->debug("mcharts_add_new_color_sets");
            // http://nivo.rocks/#/guides/colors
            // https://learnui.design/tools/data-color-picker.html
            
            $new_color_sets = array(
                'heat' => array(
                    '#de000d',
                    '#e53501',
                    '#eb5000',
                    '#f06700',
                    '#f47c00',
                    '#f88f00',
                    '#faa200',
                    '#fcb501'
                ),
                'purple_yellow' => array(
                    '#003f5c',
                    '#2f4b7c',
                    '#665191',
                    '#a05195',
                    '#d45087',
                    '#f95d6a',
                    '#ff7c43',
                    '#ffa600'
                ),
                'nivo' => array(
                    '#a6cee3',
                    '#1f78b4',
                    '#b2df8a',
                    '#33a02c',
                    '#fb9a99',
                    '#e31a1c',
                    '#fdbf6f',
                    '#ff7f00',
                    '#cab2d6',
                    '#6a3d9a',
                    '#ffff99',
                    '#b15928'
                ),
                'd310' => array(
                    "#1f77b4",
                    "#ff7f0e",
                    "#2ca02c",
                    "#d62728",
                    "#9467bd",
                    "#8c564b",
                    "#e377c2",
                    "#7f7f7f",
                    "#bcbd22",
                    "#17becf"
                ),
                'd320' => array(
                    "#1f77b4",
                    "#aec7e8",
                    "#ff7f0e",
                    "#ffbb78",
                    "#2ca02c",
                    "#98df8a",
                    "#d62728",
                    "#ff9896",
                    "#9467bd",
                    "#c5b0d5",
                    "#8c564b",
                    "#c49c94",
                    "#e377c2",
                    "#f7b6d2",
                    "#7f7f7f",
                    "#c7c7c7",
                    "#bcbd22",
                    "#dbdb8d",
                    "#17becf",
                    "#9edae5"
                ),
                'd320b' => array(
                    "#393b79",
                    "#5254a3",
                    "#6b6ecf",
                    "#9c9ede",
                    "#637939",
                    "#8ca252",
                    "#b5cf6b",
                    "#cedb9c",
                    "#8c6d31",
                    "#bd9e39",
                    "#e7ba52",
                    "#e7cb94",
                    "#843c39",
                    "#ad494a",
                    "#d6616b",
                    "#e7969c",
                    "#7b4173",
                    "#a55194",
                    "#ce6dbd",
                    "#de9ed6"
                ),
                'd320c' => array(
                    "#3182bd",
                    "#6baed6",
                    "#9ecae1",
                    "#c6dbef",
                    "#e6550d",
                    "#fd8d3c",
                    "#fdae6b",
                    "#fdd0a2",
                    "#31a354",
                    "#74c476",
                    "#a1d99b",
                    "#c7e9c0",
                    "#756bb1",
                    "#9e9ac8",
                    "#bcbddc",
                    "#dadaeb",
                    "#636363",
                    "#969696",
                    "#bdbdbd",
                    "#d9d9d9"
                ),
                'Greys' => array(
                    "#ffffff",
                    "#f0f0f0",
                    "#d9d9d9",
                    "#bdbdbd",
                    "#969696",
                    "#737373",
                    "#525252",
                    "#252525",
                    "#000000"
                ),
                
                'accent' => array(),
                'dark2' => array(
                    "#1b9e77",
                    "#d95f02",
                    "#7570b3",
                    "#e7298a",
                    "#66a61e",
                    "#e6ab02",
                    "#a6761d",
                    "#666666"
                ),
				/*
				 'paired' => array(),
				 'pastel1' => array(),
				 'pastel2' => array(),
				 */
				'set1' => array(
                    "#e41a1c",
                    "#377eb8",
                    "#4daf4a",
                    "#984ea3",
                    "#ff7f00",
                    "#ffff33",
                    "#a65628",
                    "#f781bf",
                    "#999999"
                ),
				/*
				 'set2' => array(),
				 'set3' => array(),
				 */
				'BrBG' => array(
                    "#543005",
                    "#8c510a",
                    "#bf812d",
                    "#dfc27d",
                    "#f6e8c3",
                    "#f5f5f5",
                    "#c7eae5",
                    "#80cdc1",
                    "#35978f",
                    "#01665e",
                    "#003c30"
                ),
                'PiYG' => array(
                    "#8e0152",
                    "#c51b7d",
                    "#de77ae",
                    "#f1b6da",
                    "#fde0ef",
                    "#f7f7f7",
                    "#e6f5d0",
                    "#b8e186",
                    "#7fbc41",
                    "#4d9221",
                    "#276419"
                ),
                'PRGn' => array(
                    "#40004b",
                    "#762a83",
                    "#9970ab",
                    "#c2a5cf",
                    "#e7d4e8",
                    "#f7f7f7",
                    "#d9f0d3",
                    "#a6dba0",
                    "#5aae61",
                    "#1b7837",
                    "#00441b"
                ),
                
                'PuOr' => array(
                    "#7f3b08",
                    "#b35806",
                    "#e08214",
                    "#fdb863",
                    "#fee0b6",
                    "#f7f7f7",
                    "#d8daeb",
                    "#b2abd2",
                    "#8073ac",
                    "#542788",
                    "#2d004b"
                ),
                
                'RdBu' => array(
                    "#67001f",
                    "#b2182b",
                    "#d6604d",
                    "#f4a582",
                    "#fddbc7",
                    "#f7f7f7",
                    "#d1e5f0",
                    "#92c5de",
                    "#4393c3",
                    "#2166ac",
                    "#053061"
                ),
                'RdGy' => array(
                    "#67001f",
                    "#b2182b",
                    "#d6604d",
                    "#f4a582",
                    "#fddbc7",
                    "#ffffff",
                    "#e0e0e0",
                    "#bababa",
                    "#878787",
                    "#4d4d4d",
                    "#1a1a1a"
                ),
                
                'RdYlBu' => array(
                    "#a50026",
                    "#d73027",
                    "#f46d43",
                    "#fdae61",
                    "#fee090",
                    "#ffffbf",
                    "#e0f3f8",
                    "#abd9e9",
                    "#74add1",
                    "#4575b4",
                    "#313695"
                ),
                
                'Spectral' => array(
                    "#a50026",
                    "#d73027",
                    "#f46d43",
                    "#fdae61",
                    "#fee08b",
                    "#ffffbf",
                    "#d9ef8b",
                    "#a6d96a",
                    "#66bd63",
                    "#1a9850",
                    "#006837"
                ),
                'RdYlGn' => array(
                    "#9e0142",
                    "#d53e4f",
                    "#f46d43",
                    "#fdae61",
                    "#fee08b",
                    "#ffffbf",
                    "#e6f598",
                    "#abdda4",
                    "#66c2a5",
                    "#3288bd",
                    "#5e4fa2"
                )
            );
            self::getLogger()->debug("Adding " . count($new_color_sets) . " new color sets");
            self::getLogger()->debug(array_keys($new_color_sets));
            return array_merge($new_color_sets, $available_color_sets);
        }

        static function getLogger()
        {
            if (class_exists('MAXICHARTSAPI')) {
                return MAXICHARTSAPI::getLogger('COLORS');
            }
        }
    }
}
// add_action( 'plugins_loaded', array( 'maxicharts_colors_addon', 'init' ) );
$color_add_on = new maxicharts_colors_addon(__FILE__);
if ($color_add_on) {
    call_user_func(array(
        $color_add_on,
        'add_hooks'
    ));
}