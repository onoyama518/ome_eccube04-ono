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

/* bootstrap_5_layout.html.twig */
class __TwigTemplate_ce57a9fa646896a52f5a20e5f8939dd3 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        // line 1
        $_trait_0 = $this->loadTemplate("bootstrap_base_layout.html.twig", "bootstrap_5_layout.html.twig", 1);
        if (!$_trait_0->isTraitable()) {
            throw new RuntimeError('Template "'."bootstrap_base_layout.html.twig".'" cannot be used as a trait.', 1, $this->source);
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            [
                'money_widget' => [$this, 'block_money_widget'],
                'date_widget' => [$this, 'block_date_widget'],
                'time_widget' => [$this, 'block_time_widget'],
                'datetime_widget' => [$this, 'block_datetime_widget'],
                'dateinterval_widget' => [$this, 'block_dateinterval_widget'],
                'percent_widget' => [$this, 'block_percent_widget'],
                'form_widget_simple' => [$this, 'block_form_widget_simple'],
                'widget_attributes' => [$this, 'block_widget_attributes'],
                'button_widget' => [$this, 'block_button_widget'],
                'submit_widget' => [$this, 'block_submit_widget'],
                'checkbox_widget' => [$this, 'block_checkbox_widget'],
                'radio_widget' => [$this, 'block_radio_widget'],
                'choice_widget_collapsed' => [$this, 'block_choice_widget_collapsed'],
                'choice_widget_expanded' => [$this, 'block_choice_widget_expanded'],
                'form_label' => [$this, 'block_form_label'],
                'checkbox_radio_label' => [$this, 'block_checkbox_radio_label'],
                'form_row' => [$this, 'block_form_row'],
                'button_row' => [$this, 'block_button_row'],
                'form_errors' => [$this, 'block_form_errors'],
                'form_help' => [$this, 'block_form_help'],
            ]
        );
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

        // line 2
        echo "
";
        // line 4
        echo "
";
        // line 5
        $this->displayBlock('money_widget', $context, $blocks);
        // line 22
        echo "
";
        // line 23
        $this->displayBlock('date_widget', $context, $blocks);
        // line 53
        echo "
";
        // line 54
        $this->displayBlock('time_widget', $context, $blocks);
        // line 92
        echo "
";
        // line 93
        $this->displayBlock('datetime_widget', $context, $blocks);
        // line 109
        echo "
";
        // line 110
        $this->displayBlock('dateinterval_widget', $context, $blocks);
        // line 165
        echo "
";
        // line 166
        $this->displayBlock('percent_widget', $context, $blocks);
        // line 176
        echo "
";
        // line 177
        $this->displayBlock('form_widget_simple', $context, $blocks);
        // line 194
        $this->displayBlock('widget_attributes', $context, $blocks);
        // line 201
        $this->displayBlock('button_widget', $context, $blocks);
        // line 206
        $this->displayBlock('submit_widget', $context, $blocks);
        // line 211
        $this->displayBlock('checkbox_widget', $context, $blocks);
        // line 235
        $this->displayBlock('radio_widget', $context, $blocks);
        // line 256
        $this->displayBlock('choice_widget_collapsed', $context, $blocks);
        // line 261
        $this->displayBlock('choice_widget_expanded', $context, $blocks);
        // line 272
        echo "
";
        // line 275
        $this->displayBlock('form_label', $context, $blocks);
        // line 294
        $this->displayBlock('checkbox_radio_label', $context, $blocks);
        // line 320
        echo "
";
        // line 323
        $this->displayBlock('form_row', $context, $blocks);
        // line 345
        $this->displayBlock('button_row', $context, $blocks);
        // line 350
        echo "
";
        // line 353
        $this->displayBlock('form_errors', $context, $blocks);
        // line 360
        echo "
";
        // line 363
        $this->displayBlock('form_help', $context, $blocks);
    }

    // line 5
    public function block_money_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        $context["prepend"] =  !(is_string($__internal_compile_0 = ($context["money_pattern"] ?? null)) && is_string($__internal_compile_1 = "{{") && str_starts_with($__internal_compile_0, $__internal_compile_1));
        // line 7
        $context["append"] =  !(is_string($__internal_compile_2 = ($context["money_pattern"] ?? null)) && is_string($__internal_compile_3 = "}}") && str_ends_with($__internal_compile_2, $__internal_compile_3));
        // line 8
        if ((($context["prepend"] ?? null) || ($context["append"] ?? null))) {
            // line 9
            echo "<div class=\"input-group ";
            echo twig_escape_filter($this->env, ((array_key_exists("group_class", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["group_class"] ?? null), 9, $this->source), "")) : ("")), "html", null, true);
            echo "\">";
            // line 10
            if (($context["prepend"] ?? null)) {
                // line 11
                echo "<span class=\"input-group-text\">";
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->encodeCurrency($this->env, $this->sandbox->ensureToStringAllowed(($context["money_pattern"] ?? null), 11, $this->source));
                echo "</span>";
            }
            // line 13
            $this->displayBlock("form_widget_simple", $context, $blocks);
            // line 14
            if (($context["append"] ?? null)) {
                // line 15
                echo "<span class=\"input-group-text\">";
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->encodeCurrency($this->env, $this->sandbox->ensureToStringAllowed(($context["money_pattern"] ?? null), 15, $this->source));
                echo "</span>";
            }
            // line 17
            echo "</div>";
        } else {
            // line 19
            $this->displayBlock("form_widget_simple", $context, $blocks);
        }
    }

    // line 23
    public function block_date_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 24
        if ((($context["widget"] ?? null) == "single_text")) {
            // line 25
            $this->displayBlock("form_widget_simple", $context, $blocks);
        } else {
            // line 27
            if ( !($context["valid"] ?? null)) {
                // line 28
                echo "            ";
                $context["attr"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["attr"] ?? null), 28, $this->source), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, true, 28)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, true, 28), 28, $this->source), "")) : ("")) . " is-invalid"))]);
                // line 29
                $context["valid"] = true;
                // line 30
                echo "        ";
            }
            // line 31
            if (( !array_key_exists("datetime", $context) ||  !($context["datetime"] ?? null))) {
                // line 32
                echo "<div ";
                $this->displayBlock("widget_container_attributes", $context, $blocks);
                echo ">";
            }
            // line 34
            if ( !(($context["label"] ?? null) === false)) {
                // line 35
                echo "<div class=\"visually-hidden\">";
                // line 36
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "year", [], "any", false, false, true, 36), 36, $this->source), 'label');
                // line 37
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "month", [], "any", false, false, true, 37), 37, $this->source), 'label');
                // line 38
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "day", [], "any", false, false, true, 38), 38, $this->source), 'label');
                // line 39
                echo "</div>";
            }
            // line 41
            echo "<div class=\"input-group\">";
            // line 42
            echo twig_replace_filter($this->sandbox->ensureToStringAllowed(($context["date_pattern"] ?? null), 42, $this->source), ["{{ year }}" =>             // line 43
$this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "year", [], "any", false, false, true, 43), 43, $this->source), 'widget'), "{{ month }}" =>             // line 44
$this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "month", [], "any", false, false, true, 44), 44, $this->source), 'widget'), "{{ day }}" =>             // line 45
$this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "day", [], "any", false, false, true, 45), 45, $this->source), 'widget')]);
            // line 47
            echo "</div>";
            // line 48
            if (( !array_key_exists("datetime", $context) ||  !($context["datetime"] ?? null))) {
                // line 49
                echo "</div>";
            }
        }
    }

    // line 54
    public function block_time_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 55
        if ((($context["widget"] ?? null) == "single_text")) {
            // line 56
            $this->displayBlock("form_widget_simple", $context, $blocks);
        } else {
            // line 58
            if ( !($context["valid"] ?? null)) {
                // line 59
                echo "            ";
                $context["attr"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["attr"] ?? null), 59, $this->source), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, true, 59)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, true, 59), 59, $this->source), "")) : ("")) . " is-invalid"))]);
                // line 60
                $context["valid"] = true;
                // line 61
                echo "        ";
            }
            // line 62
            if (( !array_key_exists("datetime", $context) || (false == ($context["datetime"] ?? null)))) {
                // line 63
                echo "<div ";
                $this->displayBlock("widget_container_attributes", $context, $blocks);
                echo ">";
            }
            // line 65
            if ( !(($context["label"] ?? null) === false)) {
                // line 66
                echo "<div class=\"visually-hidden\">";
                // line 67
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "hour", [], "any", false, false, true, 67), 67, $this->source), 'label');
                // line 68
                if (($context["with_minutes"] ?? null)) {
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "minute", [], "any", false, false, true, 68), 68, $this->source), 'label');
                }
                // line 69
                if (($context["with_seconds"] ?? null)) {
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "second", [], "any", false, false, true, 69), 69, $this->source), 'label');
                }
                // line 70
                echo "</div>";
            }
            // line 72
            if ((($context["with_minutes"] ?? null) || ($context["with_seconds"] ?? null))) {
                // line 73
                echo "            <div class=\"input-group\">
        ";
            }
            // line 75
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "hour", [], "any", false, false, true, 75), 75, $this->source), 'widget');
            // line 76
            if (($context["with_minutes"] ?? null)) {
                // line 77
                echo "<span class=\"input-group-text\">:</span>";
                // line 78
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "minute", [], "any", false, false, true, 78), 78, $this->source), 'widget');
            }
            // line 80
            if (($context["with_seconds"] ?? null)) {
                // line 81
                echo "<span class=\"input-group-text\">:</span>";
                // line 82
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "second", [], "any", false, false, true, 82), 82, $this->source), 'widget');
            }
            // line 84
            if ((($context["with_minutes"] ?? null) || ($context["with_seconds"] ?? null))) {
                // line 85
                echo "            </div>
        ";
            }
            // line 87
            if (( !array_key_exists("datetime", $context) || (false == ($context["datetime"] ?? null)))) {
                // line 88
                echo "</div>";
            }
        }
    }

    // line 93
    public function block_datetime_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 94
        if ((($context["widget"] ?? null) == "single_text")) {
            // line 95
            $this->displayBlock("form_widget_simple", $context, $blocks);
        } else {
            // line 97
            if ( !($context["valid"] ?? null)) {
                // line 98
                echo "            ";
                $context["attr"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["attr"] ?? null), 98, $this->source), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, true, 98)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, true, 98), 98, $this->source), "")) : ("")) . " is-invalid"))]);
                // line 99
                $context["valid"] = true;
                // line 100
                echo "        ";
            }
            // line 101
            echo "        <div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">";
            // line 102
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "date", [], "any", false, false, true, 102), 102, $this->source), 'widget', ["datetime" => true]);
            // line 103
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "date", [], "any", false, false, true, 103), 103, $this->source), 'errors');
            // line 104
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "time", [], "any", false, false, true, 104), 104, $this->source), 'widget', ["datetime" => true]);
            // line 105
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "time", [], "any", false, false, true, 105), 105, $this->source), 'errors');
            // line 106
            echo "</div>";
        }
    }

    // line 110
    public function block_dateinterval_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 111
        if ((($context["widget"] ?? null) == "single_text")) {
            // line 112
            $this->displayBlock("form_widget_simple", $context, $blocks);
        } else {
            // line 114
            if ( !($context["valid"] ?? null)) {
                // line 115
                echo "            ";
                $context["attr"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["attr"] ?? null), 115, $this->source), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, true, 115)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, true, 115), 115, $this->source), "")) : ("")) . " is-invalid"))]);
                // line 116
                $context["valid"] = true;
                // line 117
                echo "        ";
            }
            // line 118
            echo "        <div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">";
            // line 119
            if (($context["with_years"] ?? null)) {
                // line 120
                echo "<div class=\"col-auto mb-3\">
                    ";
                // line 121
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "years", [], "any", false, false, true, 121), 121, $this->source), 'label');
                echo "
                    ";
                // line 122
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "years", [], "any", false, false, true, 122), 122, $this->source), 'widget');
                echo "
                </div>";
            }
            // line 125
            if (($context["with_months"] ?? null)) {
                // line 126
                echo "<div class=\"col-auto mb-3\">
                    ";
                // line 127
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "months", [], "any", false, false, true, 127), 127, $this->source), 'label');
                echo "
                    ";
                // line 128
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "months", [], "any", false, false, true, 128), 128, $this->source), 'widget');
                echo "
                </div>";
            }
            // line 131
            if (($context["with_weeks"] ?? null)) {
                // line 132
                echo "<div class=\"col-auto mb-3\">
                    ";
                // line 133
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "weeks", [], "any", false, false, true, 133), 133, $this->source), 'label');
                echo "
                    ";
                // line 134
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "weeks", [], "any", false, false, true, 134), 134, $this->source), 'widget');
                echo "
                </div>";
            }
            // line 137
            if (($context["with_days"] ?? null)) {
                // line 138
                echo "<div class=\"col-auto mb-3\">
                    ";
                // line 139
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "days", [], "any", false, false, true, 139), 139, $this->source), 'label');
                echo "
                    ";
                // line 140
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "days", [], "any", false, false, true, 140), 140, $this->source), 'widget');
                echo "
                </div>";
            }
            // line 143
            if (($context["with_hours"] ?? null)) {
                // line 144
                echo "<div class=\"col-auto mb-3\">
                    ";
                // line 145
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "hours", [], "any", false, false, true, 145), 145, $this->source), 'label');
                echo "
                    ";
                // line 146
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "hours", [], "any", false, false, true, 146), 146, $this->source), 'widget');
                echo "
                </div>";
            }
            // line 149
            if (($context["with_minutes"] ?? null)) {
                // line 150
                echo "<div class=\"col-auto mb-3\">
                    ";
                // line 151
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "minutes", [], "any", false, false, true, 151), 151, $this->source), 'label');
                echo "
                    ";
                // line 152
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "minutes", [], "any", false, false, true, 152), 152, $this->source), 'widget');
                echo "
                </div>";
            }
            // line 155
            if (($context["with_seconds"] ?? null)) {
                // line 156
                echo "<div class=\"col-auto mb-3\">
                    ";
                // line 157
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "seconds", [], "any", false, false, true, 157), 157, $this->source), 'label');
                echo "
                    ";
                // line 158
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "seconds", [], "any", false, false, true, 158), 158, $this->source), 'widget');
                echo "
                </div>";
            }
            // line 161
            if (($context["with_invert"] ?? null)) {
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "invert", [], "any", false, false, true, 161), 161, $this->source), 'widget');
            }
            // line 162
            echo "</div>";
        }
    }

    // line 166
    public function block_percent_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 167
        if (($context["symbol"] ?? null)) {
            // line 168
            echo "<div class=\"input-group\">";
            // line 169
            $this->displayBlock("form_widget_simple", $context, $blocks);
            // line 170
            echo "<span class=\"input-group-text\">";
            echo twig_escape_filter($this->env, ((array_key_exists("symbol", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["symbol"] ?? null), 170, $this->source), "%")) : ("%")), "html", null, true);
            echo "</span>
        </div>";
        } else {
            // line 173
            $this->displayBlock("form_widget_simple", $context, $blocks);
        }
    }

    // line 177
    public function block_form_widget_simple($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 178
        if (( !array_key_exists("type", $context) || (($context["type"] ?? null) != "hidden"))) {
            // line 179
            $context["widget_class"] = " form-control";
            // line 180
            if ((((array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "")) : ("")) == "color")) {
                // line 181
                $context["widget_class"] = ($this->sandbox->ensureToStringAllowed(($context["widget_class"] ?? null), 181, $this->source) . " form-control-color");
            } elseif ((((            // line 182
array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "")) : ("")) == "range")) {
                // line 183
                $context["widget_class"] = " form-range";
            }
            // line 185
            $context["attr"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["attr"] ?? null), 185, $this->source), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, true, 185)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, true, 185), 185, $this->source), "")) : ("")) . $this->sandbox->ensureToStringAllowed(($context["widget_class"] ?? null), 185, $this->source)))]);
        }
        // line 187
        if ((array_key_exists("type", $context) && twig_in_filter(($context["type"] ?? null), ["range", "color"]))) {
            // line 188
            echo "        ";
            // line 189
            echo "        ";
            $context["required"] = false;
            // line 190
            echo "    ";
        }
        // line 191
        $this->displayParentBlock("form_widget_simple", $context, $blocks);
    }

    // line 194
    public function block_widget_attributes($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 195
        if ( !($context["valid"] ?? null)) {
            // line 196
            echo "        ";
            $context["attr"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["attr"] ?? null), 196, $this->source), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, true, 196)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, true, 196), 196, $this->source), "")) : ("")) . " is-invalid"))]);
            // line 197
            echo "    ";
        }
        // line 198
        $this->displayParentBlock("widget_attributes", $context, $blocks);
    }

    // line 201
    public function block_button_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 202
        $context["attr"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["attr"] ?? null), 202, $this->source), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, true, 202)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, true, 202), 202, $this->source), "btn-secondary")) : ("btn-secondary")) . " btn"))]);
        // line 203
        $this->displayParentBlock("button_widget", $context, $blocks);
    }

    // line 206
    public function block_submit_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 207
        $context["attr"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["attr"] ?? null), 207, $this->source), ["class" => twig_trim_filter(((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, true, 207)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, true, 207), 207, $this->source), "btn-primary")) : ("btn-primary")))]);
        // line 208
        $this->displayParentBlock("submit_widget", $context, $blocks);
    }

    // line 211
    public function block_checkbox_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 212
        $context["attr_class"] = ((array_key_exists("attr_class", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["attr_class"] ?? null), 212, $this->source), ((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, true, 212)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, true, 212), 212, $this->source), "")) : ("")))) : (((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, true, 212)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, true, 212), 212, $this->source), "")) : (""))));
        // line 213
        $context["row_class"] = "";
        // line 214
        if (!twig_in_filter("btn-check", ($context["attr_class"] ?? null))) {
            // line 215
            $context["attr_class"] = ($this->sandbox->ensureToStringAllowed(($context["attr_class"] ?? null), 215, $this->source) . " form-check-input");
            // line 216
            $context["row_class"] = "form-check";
        }
        // line 218
        $context["attr"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["attr"] ?? null), 218, $this->source), ["class" => twig_trim_filter($this->sandbox->ensureToStringAllowed(($context["attr_class"] ?? null), 218, $this->source))]);
        // line 219
        $context["parent_label_class"] = ((array_key_exists("parent_label_class", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["parent_label_class"] ?? null), 219, $this->source), ((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, true, 219)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, true, 219), 219, $this->source), "")) : ("")))) : (((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, true, 219)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, true, 219), 219, $this->source), "")) : (""))));
        // line 220
        if (twig_in_filter("checkbox-inline", ($context["parent_label_class"] ?? null))) {
            // line 221
            $context["row_class"] = ($this->sandbox->ensureToStringAllowed(($context["row_class"] ?? null), 221, $this->source) . " form-check-inline");
        }
        // line 223
        if (twig_in_filter("checkbox-switch", ($context["parent_label_class"] ?? null))) {
            // line 224
            $context["row_class"] = ($this->sandbox->ensureToStringAllowed(($context["row_class"] ?? null), 224, $this->source) . " form-switch");
        }
        // line 226
        if ( !twig_test_empty(($context["row_class"] ?? null))) {
            // line 227
            echo "<div class=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["row_class"] ?? null), 227, $this->source), "html", null, true);
            echo "\">";
        }
        // line 229
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(($context["form"] ?? null), 229, $this->source), 'label', ["widget" => $this->renderParentBlock("checkbox_widget", $context, $blocks)]);
        // line 230
        if ( !twig_test_empty(($context["row_class"] ?? null))) {
            // line 231
            echo "</div>";
        }
    }

    // line 235
    public function block_radio_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 236
        $context["attr_class"] = ((array_key_exists("attr_class", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["attr_class"] ?? null), 236, $this->source), ((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, true, 236)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, true, 236), 236, $this->source), "")) : ("")))) : (((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, true, 236)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, true, 236), 236, $this->source), "")) : (""))));
        // line 237
        $context["row_class"] = "";
        // line 238
        if (!twig_in_filter("btn-check", ($context["attr_class"] ?? null))) {
            // line 239
            $context["attr_class"] = ($this->sandbox->ensureToStringAllowed(($context["attr_class"] ?? null), 239, $this->source) . " form-check-input");
            // line 240
            $context["row_class"] = "form-check";
        }
        // line 242
        $context["attr"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["attr"] ?? null), 242, $this->source), ["class" => twig_trim_filter($this->sandbox->ensureToStringAllowed(($context["attr_class"] ?? null), 242, $this->source))]);
        // line 243
        $context["parent_label_class"] = ((array_key_exists("parent_label_class", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["parent_label_class"] ?? null), 243, $this->source), ((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, true, 243)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, true, 243), 243, $this->source), "")) : ("")))) : (((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, true, 243)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, true, 243), 243, $this->source), "")) : (""))));
        // line 244
        if (twig_in_filter("radio-inline", ($context["parent_label_class"] ?? null))) {
            // line 245
            $context["row_class"] = ($this->sandbox->ensureToStringAllowed(($context["row_class"] ?? null), 245, $this->source) . " form-check-inline");
        }
        // line 247
        if ( !twig_test_empty(($context["row_class"] ?? null))) {
            // line 248
            echo "<div class=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["row_class"] ?? null), 248, $this->source), "html", null, true);
            echo "\">";
        }
        // line 250
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(($context["form"] ?? null), 250, $this->source), 'label', ["widget" => $this->renderParentBlock("radio_widget", $context, $blocks)]);
        // line 251
        if ( !twig_test_empty(($context["row_class"] ?? null))) {
            // line 252
            echo "</div>";
        }
    }

    // line 256
    public function block_choice_widget_collapsed($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 257
        $context["attr"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["attr"] ?? null), 257, $this->source), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, true, 257)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, true, 257), 257, $this->source), "")) : ("")) . " form-select"))]);
        // line 258
        $this->displayParentBlock("choice_widget_collapsed", $context, $blocks);
    }

    // line 261
    public function block_choice_widget_expanded($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 262
        echo "<div ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">";
        // line 263
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 264
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed($context["child"], 264, $this->source), 'widget', ["parent_label_class" => ((twig_get_attribute($this->env, $this->source,             // line 265
($context["label_attr"] ?? null), "class", [], "any", true, true, true, 265)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, true, 265), 265, $this->source), "")) : ("")), "translation_domain" =>             // line 266
($context["choice_translation_domain"] ?? null), "valid" =>             // line 267
($context["valid"] ?? null)]);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 270
        echo "</div>";
    }

    // line 275
    public function block_form_label($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 276
        if ( !(($context["label"] ?? null) === false)) {
            // line 277
            $context["parent_label_class"] = ((array_key_exists("parent_label_class", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["parent_label_class"] ?? null), 277, $this->source), ((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, true, 277)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, true, 277), 277, $this->source), "")) : ("")))) : (((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, true, 277)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, true, 277), 277, $this->source), "")) : (""))));
            // line 278
            if ((array_key_exists("compound", $context) && ($context["compound"] ?? null))) {
                // line 279
                $context["element"] = "legend";
                // line 280
                if (!twig_in_filter("col-form-label", ($context["parent_label_class"] ?? null))) {
                    // line 281
                    $context["label_attr"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["label_attr"] ?? null), 281, $this->source), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, true, 281)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, true, 281), 281, $this->source), "")) : ("")) . " col-form-label"))]);
                }
            } else {
                // line 284
                $context["row_class"] = ((array_key_exists("row_class", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["row_class"] ?? null), 284, $this->source), ((twig_get_attribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", true, true, true, 284)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", false, false, true, 284), 284, $this->source), "")) : ("")))) : (((twig_get_attribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", true, true, true, 284)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", false, false, true, 284), 284, $this->source), "")) : (""))));
                // line 285
                $context["label_attr"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["label_attr"] ?? null), 285, $this->source), ["for" => ($context["id"] ?? null)]);
                // line 286
                if (!twig_in_filter("col-form-label", ($context["parent_label_class"] ?? null))) {
                    // line 287
                    $context["label_attr"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["label_attr"] ?? null), 287, $this->source), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, true, 287)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, true, 287), 287, $this->source), "")) : ("")) . ((twig_in_filter("input-group", ($context["row_class"] ?? null))) ? (" input-group-text") : (" form-label"))))]);
                }
            }
        }
        // line 291
        $this->displayParentBlock("form_label", $context, $blocks);
    }

    // line 294
    public function block_checkbox_radio_label($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 296
        if (array_key_exists("widget", $context)) {
            // line 297
            $context["label_attr_class"] = ((array_key_exists("label_attr_class", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["label_attr_class"] ?? null), 297, $this->source), ((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, true, 297)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, true, 297), 297, $this->source), "")) : ("")))) : (((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, true, 297)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, true, 297), 297, $this->source), "")) : (""))));
            // line 298
            if (!twig_in_filter("btn", ($context["label_attr_class"] ?? null))) {
                // line 299
                $context["label_attr_class"] = ($this->sandbox->ensureToStringAllowed(($context["label_attr_class"] ?? null), 299, $this->source) . " form-check-label");
            }
            // line 301
            $context["label_attr"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["label_attr"] ?? null), 301, $this->source), ["class" => twig_trim_filter($this->sandbox->ensureToStringAllowed(($context["label_attr_class"] ?? null), 301, $this->source))]);
            // line 302
            if ( !($context["compound"] ?? null)) {
                // line 303
                $context["label_attr"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["label_attr"] ?? null), 303, $this->source), ["for" => ($context["id"] ?? null)]);
            }
            // line 305
            if (($context["required"] ?? null)) {
                // line 306
                $context["label_attr"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["label_attr"] ?? null), 306, $this->source), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, true, 306)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, true, 306), 306, $this->source), "")) : ("")) . " required"))]);
            }
            // line 308
            if (array_key_exists("parent_label_class", $context)) {
                // line 309
                $context["label_attr"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["label_attr"] ?? null), 309, $this->source), ["class" => twig_trim_filter(twig_replace_filter(((((twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, true, 309)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", false, false, true, 309), 309, $this->source), "")) : ("")) . " ") . $this->sandbox->ensureToStringAllowed(($context["parent_label_class"] ?? null), 309, $this->source)), ["checkbox-inline" => "", "radio-inline" => ""]))]);
            }
            // line 312
            echo $this->sandbox->ensureToStringAllowed(($context["widget"] ?? null), 312, $this->source);
            echo "
        <label";
            // line 313
            $__internal_compile_4 = $context;
            $__internal_compile_5 = ["attr" => ($context["label_attr"] ?? null)];
            if (!is_iterable($__internal_compile_5)) {
                throw new RuntimeError('Variables passed to the "with" tag must be a hash.', 313, $this->getSourceContext());
            }
            $__internal_compile_5 = twig_to_array($__internal_compile_5);
            $context = $this->env->mergeGlobals(array_merge($context, $__internal_compile_5));
            $this->displayBlock("attributes", $context, $blocks);
            $context = $__internal_compile_4;
            echo ">";
            // line 314
            if ( !(($context["label"] ?? null) === false)) {
                // line 315
                $this->displayBlock("form_label_content", $context, $blocks);
            }
            // line 317
            echo "</label>";
        }
    }

    // line 323
    public function block_form_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 324
        if ((array_key_exists("compound", $context) && ($context["compound"] ?? null))) {
            // line 325
            $context["element"] = "fieldset";
        }
        // line 327
        $context["widget_attr"] = [];
        // line 328
        if ( !twig_test_empty(($context["help"] ?? null))) {
            // line 329
            $context["widget_attr"] = ["attr" => ["aria-describedby" => ($this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 329, $this->source) . "_help")]];
        }
        // line 331
        $context["row_class"] = ((array_key_exists("row_class", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["row_class"] ?? null), 331, $this->source), twig_trim_filter(((twig_get_attribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", true, true, true, 331)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", false, false, true, 331), 331, $this->source), "mb-3")) : ("mb-3"))))) : (twig_trim_filter(((twig_get_attribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", true, true, true, 331)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", false, false, true, 331), 331, $this->source), "mb-3")) : ("mb-3")))));
        // line 332
        echo "<";
        echo twig_escape_filter($this->env, ((array_key_exists("element", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["element"] ?? null), 332, $this->source), "div")) : ("div")), "html", null, true);
        $__internal_compile_6 = $context;
        $__internal_compile_7 = ["attr" => twig_array_merge(($context["row_attr"] ?? null), ["class" => ($context["row_class"] ?? null)])];
        if (!is_iterable($__internal_compile_7)) {
            throw new RuntimeError('Variables passed to the "with" tag must be a hash.', 332, $this->getSourceContext());
        }
        $__internal_compile_7 = twig_to_array($__internal_compile_7);
        $context = $this->env->mergeGlobals(array_merge($context, $__internal_compile_7));
        $this->displayBlock("attributes", $context, $blocks);
        $context = $__internal_compile_6;
        echo ">";
        // line 333
        if (twig_in_filter("form-floating", ($context["row_class"] ?? null))) {
            // line 334
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(($context["form"] ?? null), 334, $this->source), 'widget', $this->sandbox->ensureToStringAllowed(($context["widget_attr"] ?? null), 334, $this->source));
            // line 335
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(($context["form"] ?? null), 335, $this->source), 'label');
        } else {
            // line 337
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(($context["form"] ?? null), 337, $this->source), 'label');
            // line 338
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(($context["form"] ?? null), 338, $this->source), 'widget', $this->sandbox->ensureToStringAllowed(($context["widget_attr"] ?? null), 338, $this->source));
        }
        // line 340
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(($context["form"] ?? null), 340, $this->source), 'help');
        // line 341
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(($context["form"] ?? null), 341, $this->source), 'errors');
        // line 342
        echo "</";
        echo twig_escape_filter($this->env, ((array_key_exists("element", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["element"] ?? null), 342, $this->source), "div")) : ("div")), "html", null, true);
        echo ">";
    }

    // line 345
    public function block_button_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 346
        echo "<div";
        $__internal_compile_8 = $context;
        $__internal_compile_9 = ["attr" => twig_array_merge(($context["row_attr"] ?? null), ["class" => twig_trim_filter(((twig_get_attribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", true, true, true, 346)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", false, false, true, 346), "mb-3")) : ("mb-3")))])];
        if (!is_iterable($__internal_compile_9)) {
            throw new RuntimeError('Variables passed to the "with" tag must be a hash.', 346, $this->getSourceContext());
        }
        $__internal_compile_9 = twig_to_array($__internal_compile_9);
        $context = $this->env->mergeGlobals(array_merge($context, $__internal_compile_9));
        $this->displayBlock("attributes", $context, $blocks);
        $context = $__internal_compile_8;
        echo ">";
        // line 347
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(($context["form"] ?? null), 347, $this->source), 'widget');
        // line 348
        echo "</div>";
    }

    // line 353
    public function block_form_errors($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 354
        if ((twig_length_filter($this->env, ($context["errors"] ?? null)) > 0)) {
            // line 355
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["errors"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 356
                echo "<div class=\"";
                if ( !Symfony\Bridge\Twig\Extension\twig_is_root_form(($context["form"] ?? null))) {
                    echo "invalid-feedback";
                } else {
                    echo "alert alert-danger";
                }
                echo " d-block\">";
                echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, true, 356), 356, $this->source), "html", null, true);
                echo "</div>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
    }

    // line 363
    public function block_form_help($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 364
        $context["row_class"] = ((twig_get_attribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", true, true, true, 364)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", false, false, true, 364), 364, $this->source), "")) : (""));
        // line 365
        echo "    ";
        $context["help_class"] = " form-text";
        // line 366
        echo "    ";
        if (twig_in_filter("input-group", ($context["row_class"] ?? null))) {
            // line 368
            $context["help_class"] = " input-group-text";
            // line 369
            echo "    ";
        }
        // line 370
        if ( !twig_test_empty(($context["help"] ?? null))) {
            // line 371
            $context["help_attr"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["help_attr"] ?? null), 371, $this->source), ["class" => twig_trim_filter(((((twig_get_attribute($this->env, $this->source, ($context["help_attr"] ?? null), "class", [], "any", true, true, true, 371)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["help_attr"] ?? null), "class", [], "any", false, false, true, 371), 371, $this->source), "")) : ("")) . $this->sandbox->ensureToStringAllowed(($context["help_class"] ?? null), 371, $this->source)) . " mb-0"))]);
        }
        // line 373
        $this->displayParentBlock("form_help", $context, $blocks);
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "bootstrap_5_layout.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  923 => 373,  920 => 371,  918 => 370,  915 => 369,  913 => 368,  910 => 366,  907 => 365,  905 => 364,  901 => 363,  884 => 356,  880 => 355,  878 => 354,  874 => 353,  870 => 348,  868 => 347,  856 => 346,  852 => 345,  846 => 342,  844 => 341,  842 => 340,  839 => 338,  837 => 337,  834 => 335,  832 => 334,  830 => 333,  817 => 332,  815 => 331,  812 => 329,  810 => 328,  808 => 327,  805 => 325,  803 => 324,  799 => 323,  794 => 317,  791 => 315,  789 => 314,  778 => 313,  774 => 312,  771 => 309,  769 => 308,  766 => 306,  764 => 305,  761 => 303,  759 => 302,  757 => 301,  754 => 299,  752 => 298,  750 => 297,  748 => 296,  744 => 294,  740 => 291,  735 => 287,  733 => 286,  731 => 285,  729 => 284,  725 => 281,  723 => 280,  721 => 279,  719 => 278,  717 => 277,  715 => 276,  711 => 275,  707 => 270,  701 => 267,  700 => 266,  699 => 265,  698 => 264,  694 => 263,  690 => 262,  686 => 261,  682 => 258,  680 => 257,  676 => 256,  671 => 252,  669 => 251,  667 => 250,  662 => 248,  660 => 247,  657 => 245,  655 => 244,  653 => 243,  651 => 242,  648 => 240,  646 => 239,  644 => 238,  642 => 237,  640 => 236,  636 => 235,  631 => 231,  629 => 230,  627 => 229,  622 => 227,  620 => 226,  617 => 224,  615 => 223,  612 => 221,  610 => 220,  608 => 219,  606 => 218,  603 => 216,  601 => 215,  599 => 214,  597 => 213,  595 => 212,  591 => 211,  587 => 208,  585 => 207,  581 => 206,  577 => 203,  575 => 202,  571 => 201,  567 => 198,  564 => 197,  561 => 196,  559 => 195,  555 => 194,  551 => 191,  548 => 190,  545 => 189,  543 => 188,  541 => 187,  538 => 185,  535 => 183,  533 => 182,  531 => 181,  529 => 180,  527 => 179,  525 => 178,  521 => 177,  516 => 173,  510 => 170,  508 => 169,  506 => 168,  504 => 167,  500 => 166,  495 => 162,  491 => 161,  486 => 158,  482 => 157,  479 => 156,  477 => 155,  472 => 152,  468 => 151,  465 => 150,  463 => 149,  458 => 146,  454 => 145,  451 => 144,  449 => 143,  444 => 140,  440 => 139,  437 => 138,  435 => 137,  430 => 134,  426 => 133,  423 => 132,  421 => 131,  416 => 128,  412 => 127,  409 => 126,  407 => 125,  402 => 122,  398 => 121,  395 => 120,  393 => 119,  389 => 118,  386 => 117,  384 => 116,  381 => 115,  379 => 114,  376 => 112,  374 => 111,  370 => 110,  365 => 106,  363 => 105,  361 => 104,  359 => 103,  357 => 102,  353 => 101,  350 => 100,  348 => 99,  345 => 98,  343 => 97,  340 => 95,  338 => 94,  334 => 93,  328 => 88,  326 => 87,  322 => 85,  320 => 84,  317 => 82,  315 => 81,  313 => 80,  310 => 78,  308 => 77,  306 => 76,  304 => 75,  300 => 73,  298 => 72,  295 => 70,  291 => 69,  287 => 68,  285 => 67,  283 => 66,  281 => 65,  276 => 63,  274 => 62,  271 => 61,  269 => 60,  266 => 59,  264 => 58,  261 => 56,  259 => 55,  255 => 54,  249 => 49,  247 => 48,  245 => 47,  243 => 45,  242 => 44,  241 => 43,  240 => 42,  238 => 41,  235 => 39,  233 => 38,  231 => 37,  229 => 36,  227 => 35,  225 => 34,  220 => 32,  218 => 31,  215 => 30,  213 => 29,  210 => 28,  208 => 27,  205 => 25,  203 => 24,  199 => 23,  194 => 19,  191 => 17,  186 => 15,  184 => 14,  182 => 13,  177 => 11,  175 => 10,  171 => 9,  169 => 8,  167 => 7,  165 => 6,  161 => 5,  157 => 363,  154 => 360,  152 => 353,  149 => 350,  147 => 345,  145 => 323,  142 => 320,  140 => 294,  138 => 275,  135 => 272,  133 => 261,  131 => 256,  129 => 235,  127 => 211,  125 => 206,  123 => 201,  121 => 194,  119 => 177,  116 => 176,  114 => 166,  111 => 165,  109 => 110,  106 => 109,  104 => 93,  101 => 92,  99 => 54,  96 => 53,  94 => 23,  91 => 22,  89 => 5,  86 => 4,  83 => 2,  30 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "bootstrap_5_layout.html.twig", "/home/xs989423/cape-kaihatsu.site/public_html/ome_eccube04-ono/vendor/symfony/twig-bridge/Resources/views/Form/bootstrap_5_layout.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("block" => 5, "set" => 6, "if" => 8, "for" => 263, "with" => 313);
        static $filters = array("escape" => 9, "default" => 9, "form_encode_currency" => 11, "merge" => 28, "trim" => 28, "raw" => 46, "replace" => 42, "length" => 354);
        static $functions = array("form_label" => 36, "form_widget" => 43, "form_errors" => 103, "form_help" => 340);

        try {
            $this->sandbox->checkSecurity(
                ['block', 'set', 'if', 'for', 'with'],
                ['escape', 'default', 'form_encode_currency', 'merge', 'trim', 'raw', 'replace', 'length'],
                ['form_label', 'form_widget', 'form_errors', 'form_help']
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
