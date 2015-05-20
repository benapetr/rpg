<?

if (isset($_GET['source']))
{
    show_source(__FILE__);
    exit(0);
}

require ('psf/psf.php');
require ('pg.php');

$html = new HtmlPage('Random password generator');
$github_ribbon = new GitHub_Ribbon();
$github_ribbon->Repository = "benapetr/rpg";

# Fork me ribbon
$html->AppendHtmlLine($github_ribbon->ToHtml());

# Title
$html->AppendHtmlLine("<h1>Random password generator - RPG</h1>");

# Description
$html->AppendHtmlLine("<h2>How to use</h2>");
$html->AppendHtmlLine("<p>This page let you generate random passwords, unlike other web based password generators, this one is open source. If you don't trust it, just fork it on github and run it on your own web server.</p>");

$html->AppendHtmlLine("<h2>Some prebaked passwords for you</h2>");
$html->AppendHtmlLine("<p>Because you probably just want a random password here I prepared some for you, if you don't like them you can generate different ones by pressing f5:</p>");

$gen1 = new pg();
$html->AppendHtmlLine("Random letters and numbers (8): " . $gen1->Random() . "<br>");
$html->AppendHtmlLine("Random letters and numbers (16): " . $gen1->Random(16) . "<br>");
$gen1->letters .= "!@#$%^&*()_+{}[];',./<>";
$html->AppendHtmlLine("Random letters and numbers and special symbols (8): " . htmlspecialchars($gen1->Random(8)) . "<br>");
$html->AppendHtmlLine("Random letters and numbers and special symbols (16): " . htmlspecialchars($gen1->Random(16)) . "<br>");
$html->AppendHtmlLine("Random letters and numbers and special symbols (64): " . htmlspecialchars($gen1->Random(64)) . "<br>");

# Link to source code
$html->AppendHtmlLine("<p>Source code: <a href=\"?source\">show</a></p>");


$html->PrintHtml();
