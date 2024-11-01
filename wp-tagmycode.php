<?php

/*
  Plugin Name: WP-TagMyCode
  Plugin URI: http://tagmycode.com
  Description: WP-TagMyCode lets you to embed <a href="http://tagmycode.com/">TagMyCode</a> snippets into your posts. Insert this shortcode <code>[tagmycode SNIPPET_ID WIDTH HEIGHT]</code> where <code>WIDTH</code> and <code>HEIGHT</code> are optional.
  Author: Massimo Zappino
  Version: 0.1.3
  Author URI: http://tagmycode.com
 */

#
#  Copyright (c) 2011 Massimo Zappino
#
#  This file is part of WP-TagMyCode.
#
#  WP-TagMyCode is free software; you can redistribute it and/or modify it under
#  the terms of the GNU General Public License as published by the Free
#  Software Foundation; either version 2 of the License, or (at your option)
#  any later version.
#
#  WP-TagMyCode is distributed in the hope that it will be useful,
#  but WITHOUT ANY WARRANTY; without even the implied warranty of
#  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#  GNU General Public License for more details.
#
#  You should have received a copy of the GNU General Public License along
#  with WP-TagMyCode; if not, write to the Free Software Foundation, Inc., 59
#  Temple Place, Suite 330, Boston, MA 02111-1307 USA
#


function wp_tagmycode_filter($content)
{
    $content = preg_replace_callback("@(?:<p>\s*)?\[tagmycode*(.*?)\](?:\s*</p>)?@",
            'wp_tagmycode_replace', $content);

    return $content;
}

function wp_tagmycode_replace($captured)
{
    $data = @trim($captured[1]);

    $values = explode(' ', $data);
    $iframe = wp_tagmycode_generate_embed($values);

    return $iframe;
}

function wp_tagmycode_generate_embed($values)
{
    $tmcUrl = 'https://tagmycode.com/embed';
    $defaultWidth = '100%';
    $defaultHeight = '500px';
    $snippet = @$values[0];
    $width = isset($values[1]) ? $values[1] : $defaultWidth;
    $height = isset($values[2]) ? $values[2] : null;

    if ($width[strlen($width) - 1] != '%') {
        $width .= 'px';
    }

    $type = 'iframe';
    if ($height && $height[strlen($height) - 1] != '%') {
        $height .= 'px';
        $type = 'iframe';
    }

    $width = "width:$width;";
    $height = $height ? "height:$height;" : '';
    $url = "$tmcUrl/$type/$snippet";

    if ($type == 'iframe') {
        $style = "style=\"border:none; $width $height;\"";
        $html = "<iframe src=\"$url\" $style scrolling=\"none\"></iframe>";
    } else {
        $html = "<script src=\"$url\"></script>";
    }

    return $html;
}

add_filter('the_content', 'wp_tagmycode_filter', 0);
