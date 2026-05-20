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

/* @admin/Content/layout_block.twig */
class __TwigTemplate_59df35414d07f237853f54d53803149d extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
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

        // line 11
        echo "<div id=\"detail_box__layout_item--";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["BlockPosition"] ?? null), "Block", [], "any", false, false, true, 11), "id", [], "any", false, false, true, 11), 11, $this->source), "html", null, true);
        echo "\" class=\"block sort border border-ec-gray bg-ec-lightGray p-2 mb-2\">
    <div class=\"row justify-content-between\">
        <div class=\"col\">
            <i class=\"fa fa-bars text-ec-gray me-3\"></i>
            <span class=\"view_readme\" data-bs-toggle=\"modal\"
               data-bs-target=\"#blockModal\"
               data-id=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["BlockPosition"] ?? null), "Block", [], "any", false, false, true, 17), "id", [], "any", false, false, true, 17), 17, $this->source), "html", null, true);
        echo "\"
               data-name=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["BlockPosition"] ?? null), "Block", [], "any", false, false, true, 18), "name", [], "any", false, false, true, 18), 18, $this->source), "html", null, true);
        echo "\"
               title=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["BlockPosition"] ?? null), "Block", [], "any", false, false, true, 19), "name", [], "any", false, false, true, 19), 19, $this->source), "html", null, true);
        echo "\"
            >";
        // line 20
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["BlockPosition"] ?? null), "Block", [], "any", false, false, true, 20), "name", [], "any", false, false, true, 20), 20, $this->source), "html", null, true);
        echo "</span>
        </div>
        <div class=\"col-auto text-end\">
            <div class=\"d-inline-block px-3 sort";
        // line 23
        if (twig_get_attribute($this->env, $this->source, ($context["loop"] ?? null), "first", [], "any", false, false, true, 23)) {
            echo " first";
        }
        echo "\">
                <input type=\"hidden\" class=\"name\" name=\"name_";
        // line 24
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["loop_index"] ?? null), 24, $this->source), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["BlockPosition"] ?? null), "Block", [], "any", false, false, true, 24), "name", [], "any", false, false, true, 24), 24, $this->source), "html", null, true);
        echo "\"/>
                <input type=\"hidden\" class=\"block-id\" name=\"block_id_";
        // line 25
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["loop_index"] ?? null), 25, $this->source), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["BlockPosition"] ?? null), "Block", [], "any", false, false, true, 25), "id", [], "any", false, false, true, 25), 25, $this->source), "html", null, true);
        echo "\"/>
                <input type=\"hidden\" class=\"target-id\" name=\"section_";
        // line 26
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["loop_index"] ?? null), 26, $this->source), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["BlockPosition"] ?? null), "section", [], "any", false, false, true, 26), 26, $this->source), "html", null, true);
        echo "\"/>
                <input type=\"hidden\" class=\"block-row\" name=\"block_row_";
        // line 27
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["loop_index"] ?? null), 27, $this->source), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["BlockPosition"] ?? null), "block_row", [], "any", false, false, true, 27), 27, $this->source), "html", null, true);
        echo "\"/>
                <div class=\"block-context-menu d-inline-block px-3\"><i class=\"fa fa-ellipsis-v fa-lg text-secondary\"></i></div>
            </div>
        </div>
    </div>
</div>
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "@admin/Content/layout_block.twig";
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
        return array (  103 => 27,  97 => 26,  91 => 25,  85 => 24,  79 => 23,  73 => 20,  69 => 19,  65 => 18,  61 => 17,  51 => 11,);
    }

    public function getSourceContext()
    {
        return new Source("", "@admin/Content/layout_block.twig", "/home/xs989423/cape-kaihatsu.site/public_html/ome_eccube04-ono/src/Eccube/Resource/template/admin/Content/layout_block.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 23);
        static $filters = array("escape" => 11);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
                []
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
