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

/* @admin/default_frame.twig */
class __TwigTemplate_5376b5830489a64219f30f07981b62db extends Template
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
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <meta name=\"eccube-csrf-token\" content=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(twig_constant("Eccube\\Common\\Constant::TOKEN_NAME")), "html", null, true);
        echo "\">
    <title>";
        // line 17
        $this->displayBlock("sub_title", $context, $blocks);
        echo " ";
        $this->displayBlock("title", $context, $blocks);
        echo " - ";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["BaseInfo"] ?? null), "shop_name", [], "any", false, false, true, 17), 17, $this->source), "html", null, true);
        echo "</title>
    <link rel=\"icon\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/img/favicon.ico", "admin"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v6.5.2/css/all.css\" integrity=\"sha384-PPIZEGYM1v8zp5Py7UjFb79S58UeqCL9pYVnVPURKEqvioPROaVAJKKLzvH2rDnI\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v6.5.2/css/v4-shims.css\" integrity=\"sha384-XyvK/kKwgVW+fuRkusfLgfhAMuaxLPSOY8W7wj8tUkf0Nr2WGHniPmpdu+cmPS5n\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/bootstrap.css", "admin"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/app.css", "admin"), "html", null, true);
        echo "\">
    <script src=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("admin.bundle.js", "bundle"), "html", null, true);
        echo "\"></script>
    ";
        // line 24
        $this->displayBlock('stylesheet', $context, $blocks);
        // line 25
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
        // line 35
        echo "    ";
        if (array_key_exists("plugin_assets", $context)) {
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "@admin/snippet.twig", ["snippets" => ($context["plugin_assets"] ?? null)]);
        }
        // line 36
        echo "</head>
<body id=\"page_";
        // line 37
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, true, 37), "get", ["_route"], "method", false, false, true, 37), 37, $this->source), "html", null, true);
        echo "\">
<header class=\"c-headerBar\">
    <div class=\"c-headerBar__container\">
        <div class=\"c-headerBar__logo\">
            <h1><img src=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/img/logo@2x.png", "admin"), "html", null, true);
        echo "\"></h1>
        </div>
        <a class=\"c-headerBar__toggleBtn\"><i class=\"fa fa-bars\" aria-hidden=\"true\"></i></a>
        <a class=\"c-headerBar__shopTitle\" href=\"";
        // line 44
        echo $this->extensions['Eccube\Twig\Extension\IgnoreRoutingNotFoundExtension']->getUrl("homepage");
        echo "\" target=\"_blank\"><span>";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["BaseInfo"] ?? null), "shop_name", [], "any", false, false, true, 44), 44, $this->source), "html", null, true);
        echo "</span><i class=\"fa fa-angle-right\" aria-hidden=\"true\"></i></a>
        <a class=\"c-headerBar__userMenu\"
           data-bs-container=\"body\"
           data-bs-toggle=\"popover\"
           data-bs-placement=\"bottom\"
           title=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.header.last_login"), "html", null, true);
        echo "\"
           data-bs-content=\"&lt;p&gt;";
        // line 50
        echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\IntlExtension']->date_min($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, true, 50), "login_date", [], "any", false, false, true, 50), 50, $this->source)), "html", null, true);
        echo "&lt;/p&gt;&lt;a href='";
        echo $this->extensions['Eccube\Twig\Extension\IgnoreRoutingNotFoundExtension']->getUrl("admin_change_password");
        echo "' class='btn btn-ec-regular w-100 mb-2'&gt;";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.header.change_password"), "html", null, true);
        echo "&lt;/a&gt;";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, true, 50), "two_factor_auth_enabled", [], "any", false, false, true, 50)) {
            echo "&lt;a href='";
            echo $this->extensions['Eccube\Twig\Extension\IgnoreRoutingNotFoundExtension']->getUrl("admin_setting_system_two_factor_auth_edit");
            echo "' class='btn btn-ec-regular w-100 mb-2'&gt;";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.header.two_factor_auth"), "html", null, true);
            echo "&lt;/a&gt;";
        }
        echo "&lt;a href='";
        echo $this->extensions['Eccube\Twig\Extension\IgnoreRoutingNotFoundExtension']->getUrl("admin_logout");
        echo "' class='btn btn-ec-sub w-100'&gt;";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.header.logout"), "html", null, true);
        echo "&lt;/a&gt;\"
           data-bs-html=\"true\"><i class=\"fa fa-user-circle\" aria-hidden=\"true\"></i><span>";
        // line 51
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.header.user_name", ["%name%" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, true, 51), "name", [], "any", false, false, true, 51)]), "html", null, true);
        echo "</span><i class=\"fa fa-angle-down\" aria-hidden=\"true\"></i></a>
    </div>
</header>
<div class=\"c-container\">
    <div class=\"c-mainNavArea\">
        ";
        // line 56
        echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "@admin/nav.twig");
        echo "
    </div>
    <div class=\"c-curtain\"></div>
    <div class=\"c-contentsArea\">
        <div class=\"c-pageTitle\">
            <div class=\"c-pageTitle__titles\">
                <h2 class=\"c-pageTitle__title\">";
        // line 62
        $this->displayBlock("title", $context, $blocks);
        echo "</h2><span class=\"c-pageTitle__subTitle\">";
        $this->displayBlock("sub_title", $context, $blocks);
        echo "</span>
            </div>
        </div>

        ";
        // line 66
        echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "@admin/alert.twig");
        echo "
        ";
        // line 67
        echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "@admin/info.twig");
        echo "
        ";
        // line 68
        echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "@admin/notice_debug_mode.twig");
        echo "

        ";
        // line 70
        $this->displayBlock('main', $context, $blocks);
        // line 71
        echo "
    </div>
</div>
";
        // line 74
        $this->loadTemplate("@common/lang.twig", "@admin/default_frame.twig", 74)->display($context);
        // line 75
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/function.js", "admin"), "html", null, true);
        echo "\"></script>
";
        // line 76
        $this->displayBlock('javascript', $context, $blocks);
        // line 78
        if (array_key_exists("plugin_snippets", $context)) {
            // line 79
            echo "    ";
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "@admin/snippet.twig", ["snippets" => ($context["plugin_snippets"] ?? null)]);
            echo "
";
        }
        // line 81
        echo "</body>
</html>
";
    }

    // line 24
    public function block_stylesheet($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 70
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 76
    public function block_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "@admin/default_frame.twig";
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
        return array (  244 => 76,  238 => 70,  232 => 24,  226 => 81,  220 => 79,  218 => 78,  216 => 76,  211 => 75,  209 => 74,  204 => 71,  202 => 70,  197 => 68,  193 => 67,  189 => 66,  180 => 62,  171 => 56,  163 => 51,  143 => 50,  139 => 49,  129 => 44,  123 => 41,  116 => 37,  113 => 36,  108 => 35,  97 => 25,  95 => 24,  91 => 23,  87 => 22,  83 => 21,  77 => 18,  69 => 17,  65 => 16,  57 => 12,  54 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@admin/default_frame.twig", "/home/xs989423/cape-kaihatsu.site/public_html/ome_eccube04-ono/src/Eccube/Resource/template/admin/default_frame.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("block" => 24, "if" => 35, "include" => 74);
        static $filters = array("escape" => 12, "trans" => 49, "date_min" => 50);
        static $functions = array("csrf_token" => 16, "constant" => 16, "asset" => 18, "include" => 35, "url" => 44);

        try {
            $this->sandbox->checkSecurity(
                ['block', 'if', 'include'],
                ['escape', 'trans', 'date_min'],
                ['csrf_token', 'constant', 'asset', 'include', 'url']
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
