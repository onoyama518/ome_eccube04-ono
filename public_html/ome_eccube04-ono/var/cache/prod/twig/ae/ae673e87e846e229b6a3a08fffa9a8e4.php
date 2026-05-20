<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* default_frame.twig */
class __TwigTemplate_0e22b0fa119b66893f211d6c310337ab extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'stylesheet' => [$this, 'block_stylesheet'],
            'main' => [$this, 'block_main'],
            'javascript' => [$this, 'block_javascript'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__eccube__gblobal = $this->env->getGlobals();
        $__eccube__eventDispatcher = $__eccube__gblobal['event_dispatcher'];
        $__eccube__source = $this->env->getLoader()->getSourceContext($this->getTemplateName())->getCode();
        $__eccube__event = new \Eccube\Event\TemplateEvent($this->getTemplateName(), $__eccube__source, $context);
        $__eccube__eventDispatcher->dispatch($__eccube__event, $this->getTemplateName());
        $context = $__eccube__event->getParameters();
        if ($__eccube__event->getSource() !== $__eccube__source) {
            $__eccube__newTemplate = $this->env->createTemplate($__eccube__event->getSource());
            $__eccube__newTemplate->display($__eccube__event->getParameters());
            return;
        }

        // line 1
        echo "<!doctype html>
";
        // line 12
        echo "<html lang=\"";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["eccube_config"] ?? null), "locale", [], "any", false, false, true, 12), 12, $this->source), "html", null, true);
        echo "\">
<head prefix=\"og: https://ogp.me/ns# fb: https://ogp.me/ns/fb# product: https://ogp.me/ns/product#\">
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <meta name=\"eccube-csrf-token\" content=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(twig_constant("Eccube\\Common\\Constant::TOKEN_NAME")), "html", null, true);
        echo "\">
    <title>";
        // line 17
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["BaseInfo"] ?? null), "shop_name", [], "any", false, false, true, 17), 17, $this->source), "html", null, true);
        if ((array_key_exists("subtitle", $context) &&  !twig_test_empty(($context["subtitle"] ?? null)))) {
            echo " / ";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["subtitle"] ?? null), 17, $this->source), "html", null, true);
        } elseif ((array_key_exists("title", $context) &&  !twig_test_empty(($context["title"] ?? null)))) {
            echo " / ";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 17, $this->source), "html", null, true);
        }
        echo "</title>
    ";
        // line 18
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "meta_tags", [], "any", false, false, true, 18))) {
            // line 19
            echo "        ";
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, twig_template_from_string($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "meta_tags", [], "any", false, false, true, 19), 19, $this->source)), array(), true, false, true);
            echo "
        ";
            // line 20
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "description", [], "any", false, false, true, 20))) {
                // line 21
                echo "            <meta name=\"description\" content=\"";
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "description", [], "any", false, false, true, 21), 21, $this->source), "html", null, true);
                echo "\">
        ";
            }
            // line 23
            echo "    ";
        } else {
            // line 24
            echo "        ";
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "meta.twig");
            echo "
    ";
        }
        // line 26
        echo "    ";
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "author", [], "any", false, false, true, 26))) {
            // line 27
            echo "        <meta name=\"author\" content=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "author", [], "any", false, false, true, 27), 27, $this->source), "html", null, true);
            echo "\">
    ";
        }
        // line 29
        echo "    ";
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "keyword", [], "any", false, false, true, 29))) {
            // line 30
            echo "        <meta name=\"keywords\" content=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "keyword", [], "any", false, false, true, 30), 30, $this->source), "html", null, true);
            echo "\">
    ";
        }
        // line 32
        echo "    ";
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "meta_robots", [], "any", false, false, true, 32))) {
            // line 33
            echo "        <meta name=\"robots\" content=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "meta_robots", [], "any", false, false, true, 33), 33, $this->source), "html", null, true);
            echo "\">
    ";
        }
        // line 35
        echo "    <link rel=\"icon\" href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/img/common/favicon.ico", "user_data"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v6.5.2/css/all.css\" integrity=\"sha384-PPIZEGYM1v8zp5Py7UjFb79S58UeqCL9pYVnVPURKEqvioPROaVAJKKLzvH2rDnI\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" href=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/style.css"), "html", null, true);
        echo "\">
    <script src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("front.bundle.js", "bundle"), "html", null, true);
        echo "\"></script>
    ";
        // line 39
        $this->displayBlock('stylesheet', $context, $blocks);
        // line 40
        echo "    <script>
        \$(function() {
            \$.ajaxSetup({
                'headers': {
                    'ECCUBE-CSRF-TOKEN': \$('meta[name=\"eccube-csrf-token\"]').attr('content')
                }
            });
        });
    </script>
    ";
        // line 50
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "Head", [], "any", false, false, true, 50)) {
            // line 51
            echo "        ";
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "block.twig", ["Blocks" => twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "Head", [], "any", false, false, true, 51)]);
            echo "
    ";
        }
        // line 53
        echo "    ";
        // line 54
        echo "    ";
        if (array_key_exists("plugin_assets", $context)) {
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "@admin/snippet.twig", ["snippets" => ($context["plugin_assets"] ?? null)]);
        }
        // line 55
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/customize.css", "user_data"), "html", null, true);
        echo "\">
</head>
<body id=\"page_";
        // line 57
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, true, 57), "get", ["_route"], "method", false, false, true, 57), 57, $this->source), "html", null, true);
        echo "\" class=\"";
        echo twig_escape_filter($this->env, ((array_key_exists("body_class", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["body_class"] ?? null), 57, $this->source), "other_page")) : ("other_page")), "html", null, true);
        echo "\">
";
        // line 59
        if (twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "BodyAfter", [], "any", false, false, true, 59)) {
            // line 60
            echo "    ";
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "block.twig", ["Blocks" => twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "BodyAfter", [], "any", false, false, true, 60)]);
            echo "
";
        }
        // line 62
        echo "

";
        // line 64
        if (((array_key_exists("isMaintenance", $context) && ($context["isMaintenance"] ?? null)) && ($context["isDebugMode"] ?? null))) {
            // line 65
            echo "    <dev class=\"ec-twoModeAlert\">
        <div class=\"ec-maintenanceAlert\">
            <div>
                <div class=\"ec-maintenanceAlert__icon\"><img src=\"";
            // line 68
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/icon/exclamation-white.svg"), "html", null, true);
            echo "\"/></div>
                ";
            // line 69
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("メンテナンスモードが有効になっています。"), "html", null, true);
            echo "
            </div>
        </div>
        <div class=\"ec-debugModeAlert bg-danger\">
            <div>
                <div class=\"ec-debugModeAlert__icon\"><img src=\"";
            // line 74
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/icon/exclamation-white.svg"), "html", null, true);
            echo "\"/></div>
                ";
            // line 75
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("デバッグモードが有効になっています。"), "html", null, true);
            echo "
            </div>
        </div>
    </dev>
";
        } else {
            // line 80
            echo "    ";
            if (($context["isMaintenance"] ?? null)) {
                // line 81
                echo "        <div class=\"ec-maintenanceAlert\">
            <div>
                <div class=\"ec-maintenanceAlert__icon\"><img src=\"";
                // line 83
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/icon/exclamation-white.svg"), "html", null, true);
                echo "\"/></div>
                ";
                // line 84
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("メンテナンスモードが有効になっています。"), "html", null, true);
                echo "
            </div>
        </div>
    ";
            }
            // line 88
            echo "    ";
            if (($context["isDebugMode"] ?? null)) {
                // line 89
                echo "        <div class=\"ec-debugModeAlert bg-danger\">
            <div>
                <div class=\"ec-debugModeAlert__icon\"><img src=\"";
                // line 91
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/icon/exclamation-white.svg"), "html", null, true);
                echo "\"/></div>
                ";
                // line 92
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("デバッグモードが有効になっています。"), "html", null, true);
                echo "
            </div>
        </div>
    ";
            }
        }
        // line 97
        echo "
<div class=\"ec-layoutRole\">
    ";
        // line 100
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "Header", [], "any", false, false, true, 100)) {
            // line 101
            echo "        <header class=\"ec-layoutRole__header\">
            ";
            // line 102
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "block.twig", ["Blocks" => twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "Header", [], "any", false, false, true, 102)]);
            echo "
        </header>
    ";
        }
        // line 105
        echo "
    ";
        // line 107
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "ContentsTop", [], "any", false, false, true, 107)) {
            // line 108
            echo "        <div class=\"ec-layoutRole__contentTop\">
            ";
            // line 109
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "block.twig", ["Blocks" => twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "ContentsTop", [], "any", false, false, true, 109)]);
            echo "
        </div>
    ";
        }
        // line 112
        echo "
    <div class=\"ec-layoutRole__contents\">
        ";
        // line 115
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "SideLeft", [], "any", false, false, true, 115)) {
            // line 116
            echo "            <aside class=\"ec-layoutRole__left\">
                ";
            // line 117
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "block.twig", ["Blocks" => twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "SideLeft", [], "any", false, false, true, 117)]);
            echo "
            </aside>
        ";
        }
        // line 120
        echo "
        ";
        // line 121
        $context["layoutRoleMain"] = "ec-layoutRole__main";
        // line 122
        echo "        ";
        if ((twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "ColumnNum", [], "any", false, false, true, 122) == 2)) {
            // line 123
            echo "            ";
            $context["layoutRoleMain"] = "ec-layoutRole__mainWithColumn";
            // line 124
            echo "        ";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "ColumnNum", [], "any", false, false, true, 124) == 3)) {
            // line 125
            echo "            ";
            $context["layoutRoleMain"] = "ec-layoutRole__mainBetweenColumn";
            // line 126
            echo "        ";
        }
        // line 127
        echo "
        <main class=\"";
        // line 128
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["layoutRoleMain"] ?? null), 128, $this->source), "html", null, true);
        echo "\">
            ";
        // line 130
        echo "            ";
        if (twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "MainTop", [], "any", false, false, true, 130)) {
            // line 131
            echo "                <div class=\"ec-layoutRole__mainTop\">
                    ";
            // line 132
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "block.twig", ["Blocks" => twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "MainTop", [], "any", false, false, true, 132)]);
            echo "
                </div>
            ";
        }
        // line 135
        echo "
            ";
        // line 137
        echo "            ";
        $this->displayBlock('main', $context, $blocks);
        // line 138
        echo "
            ";
        // line 140
        echo "            ";
        if (twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "MainBottom", [], "any", false, false, true, 140)) {
            // line 141
            echo "                <div class=\"ec-layoutRole__mainBottom\">
                    ";
            // line 142
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "block.twig", ["Blocks" => twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "MainBottom", [], "any", false, false, true, 142)]);
            echo "
                </div>
            ";
        }
        // line 145
        echo "        </main>

        ";
        // line 148
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "SideRight", [], "any", false, false, true, 148)) {
            // line 149
            echo "            <aside class=\"ec-layoutRole__right\">
                ";
            // line 150
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "block.twig", ["Blocks" => twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "SideRight", [], "any", false, false, true, 150)]);
            echo "
            </aside>
        ";
        }
        // line 153
        echo "    </div>

    ";
        // line 156
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "ContentsBottom", [], "any", false, false, true, 156)) {
            // line 157
            echo "        <div class=\"ec-layoutRole__contentBottom\">
            ";
            // line 158
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "block.twig", ["Blocks" => twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "ContentsBottom", [], "any", false, false, true, 158)]);
            echo "
        </div>
    ";
        }
        // line 161
        echo "
    ";
        // line 163
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "Footer", [], "any", false, false, true, 163)) {
            // line 164
            echo "        <footer class=\"ec-layoutRole__footer\">
            ";
            // line 165
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "block.twig", ["Blocks" => twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "Footer", [], "any", false, false, true, 165)]);
            echo "
        </footer>
    ";
        }
        // line 168
        echo "</div><!-- ec-layoutRole -->

<div class=\"ec-overlayRole\"></div>
<div class=\"ec-drawerRoleClose\"><i class=\"fas fa-times\"></i></div>
<div class=\"ec-drawerRole\">
    ";
        // line 174
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "Drawer", [], "any", false, false, true, 174)) {
            // line 175
            echo "        ";
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "block.twig", ["Blocks" => twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "Drawer", [], "any", false, false, true, 175)]);
            echo "
    ";
        }
        // line 177
        echo "</div>
<div class=\"ec-blockTopBtn pagetop\">";
        // line 178
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("ページトップへ"), "html", null, true);
        echo "</div>
";
        // line 179
        $this->loadTemplate("@common/lang.twig", "default_frame.twig", 179)->display($context);
        // line 180
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/function.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 181
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/eccube.js"), "html", null, true);
        echo "\"></script>
";
        // line 182
        $this->displayBlock('javascript', $context, $blocks);
        // line 184
        if (twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "CloseBodyBefore", [], "any", false, false, true, 184)) {
            // line 185
            echo "    ";
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "block.twig", ["Blocks" => twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "CloseBodyBefore", [], "any", false, false, true, 185)]);
            echo "
";
        }
        // line 188
        if (array_key_exists("plugin_snippets", $context)) {
            // line 189
            echo "    ";
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "snippet.twig", ["snippets" => ($context["plugin_snippets"] ?? null)]);
            echo "
";
        }
        // line 191
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/customize.js", "user_data"), "html", null, true);
        echo "\"></script>
</body>
</html>
";
    }

    // line 39
    public function block_stylesheet($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 137
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 182
    public function block_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "default_frame.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  493 => 182,  487 => 137,  481 => 39,  472 => 191,  466 => 189,  464 => 188,  458 => 185,  456 => 184,  454 => 182,  450 => 181,  445 => 180,  443 => 179,  439 => 178,  436 => 177,  430 => 175,  427 => 174,  420 => 168,  414 => 165,  411 => 164,  408 => 163,  405 => 161,  399 => 158,  396 => 157,  393 => 156,  389 => 153,  383 => 150,  380 => 149,  377 => 148,  373 => 145,  367 => 142,  364 => 141,  361 => 140,  358 => 138,  355 => 137,  352 => 135,  346 => 132,  343 => 131,  340 => 130,  336 => 128,  333 => 127,  330 => 126,  327 => 125,  324 => 124,  321 => 123,  318 => 122,  316 => 121,  313 => 120,  307 => 117,  304 => 116,  301 => 115,  297 => 112,  291 => 109,  288 => 108,  285 => 107,  282 => 105,  276 => 102,  273 => 101,  270 => 100,  266 => 97,  258 => 92,  254 => 91,  250 => 89,  247 => 88,  240 => 84,  236 => 83,  232 => 81,  229 => 80,  221 => 75,  217 => 74,  209 => 69,  205 => 68,  200 => 65,  198 => 64,  194 => 62,  188 => 60,  186 => 59,  180 => 57,  174 => 55,  169 => 54,  167 => 53,  161 => 51,  158 => 50,  147 => 40,  145 => 39,  141 => 38,  137 => 37,  131 => 35,  125 => 33,  122 => 32,  116 => 30,  113 => 29,  107 => 27,  104 => 26,  98 => 24,  95 => 23,  89 => 21,  87 => 20,  82 => 19,  80 => 18,  69 => 17,  65 => 16,  57 => 12,  54 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default_frame.twig", "/home/xs989423/cape-kaihatsu.site/public_html/ome_eccube04-ono/src/Eccube/Resource/template/default/default_frame.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 17, "block" => 39, "set" => 121, "include" => 179);
        static $filters = array("escape" => 12, "default" => 57, "trans" => 69);
        static $functions = array("csrf_token" => 16, "constant" => 16, "include" => 19, "template_from_string" => 19, "asset" => 35);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'block', 'set', 'include'],
                ['escape', 'default', 'trans'],
                ['csrf_token', 'constant', 'include', 'template_from_string', 'asset']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
