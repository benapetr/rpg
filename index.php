<?php

//This program is free software: you can redistribute it and/or modify
//it under the terms of the GNU General Public License as published by
//the Free Software Foundation, either version 3 of the License, or
//(at your option) any later version.

//This program is distributed in the hope that it will be useful,
//but WITHOUT ANY WARRANTY; without even the implied warranty of
//MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//GNU General Public License for more details.


if (isset($_GET['source']))
{
    show_source(__FILE__);
    exit(0);
}

// Source code of psf can be found at http://github.com/benapetr/psf
require ('psf/psf.php');
require ('pg.php');

$html = new HtmlPage('Random password generator');

// Let's use bootstrap
bootstrap_init($html);
$html->Style->items['code']['background-color'] = '#C4F0FF';

// Put everything into a fluid container
$body = new BS_FluidContainer($html);
$html->AppendObject($body);

// Fork me ribbon
$body->AppendObject(new GitHub_Ribbon("benapetr/rpg"));

// Title
$body->AppendHeader("Random password generator - RPG");

// Description
$body->AppendHeader("How to use", 2);
$body->AppendParagraph("This page let you generate random passwords, unlike other web based password generators, this one is open source. If you don't trust it, just fork it on github and run it on your own web server.");

$body->AppendHeader("Some prebaked passwords for you", 2);
$body->AppendParagraph("Because you probably just want a random password here I prepared some for you, if you don't like them you can generate different ones by pressing f5:");

$w = new BS_Well($html);
$body->AppendObject($w);

$gen1 = new pg();
$w->AppendHtmlLine("Random letters and numbers (8): <code>" . $gen1->Random() . "</code><br>");
$w->AppendHtmlLine("Random letters and numbers (16): <code>" . $gen1->Random(16) . "</code><br>");
$gen1->letters .= "!@$%^&()_+{}[];,.#";
$w->AppendHtmlLine("Random letters and numbers and special symbols (8): <code>" . htmlspecialchars($gen1->Random(8)) . "</code><br>");
$w->AppendHtmlLine("Random letters and numbers and special symbols (16): <code>" . htmlspecialchars($gen1->Random(16)) . "</code><br>");
$w->AppendHtmlLine("Random letters and numbers and special symbols (64): <code>" . htmlspecialchars($gen1->Random(64)) . "</code><br>");
$gen1->letters .= "~-=|?\"\\*#'/<>";
$w->AppendHtmlLine("Random letters and numbers and hardcore special symbols (8): <code>" . htmlspecialchars($gen1->Random(8)) . "</code><br>");
$w->AppendHtmlLine("Random letters and numbers and hardcore special symbols (16): <code>" . htmlspecialchars($gen1->Random(16)) . "</code><br>");
$w->AppendHtmlLine("Random letters and numbers and hardcore special symbols (64): <code>" . htmlspecialchars($gen1->Random(64)) . "</code><br>");

// Link to source code
$body->AppendHtmlLine("<p>Source code: <a href=\"index.php?source\">index.php</a> <a href=\"pg.php?source\">pg.php</a></p>");

$html->PrintHtml();
