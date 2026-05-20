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

/* @admin/Content/layout.twig */
class __TwigTemplate_321fe7ef3ccba33334ddfeab87c33e03 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'sub_title' => [$this, 'block_sub_title'],
            'javascript' => [$this, 'block_javascript'],
            'main' => [$this, 'block_main'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doGetParent(array $context)
    {
        // line 11
        return "@admin/default_frame.twig";
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

        // line 13
        $context["menus"] = ["content", "layout"];
        // line 18
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme(($context["form"] ?? null), ["@admin/Form/bootstrap_4_horizontal_layout.html.twig"], true);
        // line 11
        $this->parent = $this->loadTemplate("@admin/default_frame.twig", "@admin/Content/layout.twig", 11);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 15
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_management"), "html", null, true);
    }

    // line 16
    public function block_sub_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.contents_management"), "html", null, true);
    }

    // line 20
    public function block_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 21
        echo "    <script>
        var sections = {
            ";
        // line 23
        echo twig_escape_filter($this->env, twig_constant("Eccube\\Entity\\Layout::TARGET_ID_UNUSED"), "html", null, true);
        echo " : '";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__unused"), "html", null, true);
        echo "',
            ";
        // line 24
        echo twig_escape_filter($this->env, twig_constant("Eccube\\Entity\\Layout::TARGET_ID_HEAD"), "html", null, true);
        echo " : '";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__head"), "html", null, true);
        echo "',
            ";
        // line 25
        echo twig_escape_filter($this->env, twig_constant("Eccube\\Entity\\Layout::TARGET_ID_BODY_AFTER"), "html", null, true);
        echo " : '";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__body_after"), "html", null, true);
        echo "',
            ";
        // line 26
        echo twig_escape_filter($this->env, twig_constant("Eccube\\Entity\\Layout::TARGET_ID_HEADER"), "html", null, true);
        echo " : '";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__header"), "html", null, true);
        echo "',
            ";
        // line 27
        echo twig_escape_filter($this->env, twig_constant("Eccube\\Entity\\Layout::TARGET_ID_CONTENTS_TOP"), "html", null, true);
        echo " : '";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__contents_top"), "html", null, true);
        echo "',
            ";
        // line 28
        echo twig_escape_filter($this->env, twig_constant("Eccube\\Entity\\Layout::TARGET_ID_SIDE_LEFT"), "html", null, true);
        echo " : '";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__side_left"), "html", null, true);
        echo "',
            ";
        // line 29
        echo twig_escape_filter($this->env, twig_constant("Eccube\\Entity\\Layout::TARGET_ID_MAIN_TOP"), "html", null, true);
        echo " : '";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__main_top"), "html", null, true);
        echo "',
            ";
        // line 30
        echo twig_escape_filter($this->env, twig_constant("Eccube\\Entity\\Layout::TARGET_ID_MAIN_BOTTOM"), "html", null, true);
        echo " : '";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__main_bottom"), "html", null, true);
        echo "',
            ";
        // line 31
        echo twig_escape_filter($this->env, twig_constant("Eccube\\Entity\\Layout::TARGET_ID_SIDE_RIGHT"), "html", null, true);
        echo " : '";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__side_right"), "html", null, true);
        echo "',
            ";
        // line 32
        echo twig_escape_filter($this->env, twig_constant("Eccube\\Entity\\Layout::TARGET_ID_CONTENTS_BOTTOM"), "html", null, true);
        echo " : '";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__contents_bottom"), "html", null, true);
        echo "',
            ";
        // line 33
        echo twig_escape_filter($this->env, twig_constant("Eccube\\Entity\\Layout::TARGET_ID_FOOTER"), "html", null, true);
        echo " : '";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__footer"), "html", null, true);
        echo "',
            ";
        // line 34
        echo twig_escape_filter($this->env, twig_constant("Eccube\\Entity\\Layout::TARGET_ID_DRAWER"), "html", null, true);
        echo " : '";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__drawer"), "html", null, true);
        echo "',
            ";
        // line 35
        echo twig_escape_filter($this->env, twig_constant("Eccube\\Entity\\Layout::TARGET_ID_CLOSE_BODY_BEFORE"), "html", null, true);
        echo " : '";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__close_body_before"), "html", null, true);
        echo "'
        };

        // use for layout_design.js
        var els = Object.keys(sections).map(function(id) {
            return '#position_' + id;
        });
    </script>
    <script src=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/layout_design.js", "admin"), "html", null, true);
        echo "\"></script>
    <script>
        \$(function(){
            \$('.block-context-menu').popover({
                placement: 'bottom',
                html: true,
                container: 'body',
                content: function () {
                    return \$('#context-menu').html();
                }
            }).on('shown.bs.popover', function () {
                \$('.block-context-menu').not(this).popover('hide');
                var \$menu = \$(this);
                var \$block = \$menu.closest('[id^=\"detail_box__layout_item\"]');
                var block = {
                    'menu': \$menu,
                    'current': \$block,
                    'prev': \$block.prev('[id^=\"detail_box__layout_item\"]'),
                    'next': \$block.next('[id^=\"detail_box__layout_item\"]')
                };
                \$('.context-moveup').on('click', block, function() {
                    if (block.prev.length) {
                        block.current.insertBefore(block.prev);
                        block.menu.popover('hide');
                        window.updateUpDown(\$block.parent('.ui-sortable').first());
                    }
                });
                \$('.context-movedown').on('click', block, function() {
                    if (block.next.length) {
                        block.current.insertAfter(block.next);
                        block.menu.popover('hide');
                        window.updateUpDown(\$block.parent('.ui-sortable').first());
                    }
                });
                \$('.context-movesection').off('click').on('click', block, function() {
                    var bootstrapModal = new bootstrap.Modal(\$('#clickStreamConfirm').get(0));
                    bootstrapModal.show();
                    \$('#target-block').val(\$(block.current).attr('id'));
                    block.menu.popover('hide');
                });
                \$('#clickStreamConfirm').off('show.bs.modal').on('show.bs.modal', function(event) {
                    \$('#move-section').children('option').remove();
                    for (var target_id in sections) {
                        \$('#move-section').append('<option value=\"' + target_id + '\">' + sections[target_id] + '</option>');
                    }
                });
                \$('#move-to-section').on('click', function() {
                    var \$position = \$('#position_' + \$('#move-section').val());
                    var \$target = \$('#' + \$('#target-block').val());
                    var \$parent = \$target.parent();

                    \$position.append(\$target);
                    window.updateUpDown(\$position);
                    window.updateUpDown(\$parent);

                    if (\$position.children('.block').length > 0) {
                        // hide placeholder
                        \$position.children('.target-placeholder').remove();
                    }
                    if (\$parent.children('.block').length <= 0) {
                        // show placeholder
                        \$parent.append(\$('#target-placeholder').html());
                    }
                });

                \$('.context-preview').off('click').on('click', block, function() {
                    var bootstrapModal = new bootstrap.Modal(\$('#codePreview').get(0));
                    bootstrapModal.show();
                    block.menu.popover('hide');
                });

                \$('#codePreview').off('show.bs.modal').on('show.bs.modal', block, function(event) {
                    var attr_id = block.current.attr('id').match(/^detail_box__layout_item--([0-9]+)/);
                    var block_id = attr_id[1];
                    var \$modal = \$(this);
                    var \$block_edit = \$modal.find('#block-edit');
                    var onclick = \$block_edit.attr('onclick').replace(/";
        // line 119
        echo twig_escape_filter($this->env, twig_constant("Eccube\\Controller\\Admin\\Content\\LayoutController::DUMMY_BLOCK_ID"), "html", null, true);
        echo "/, block_id);
                    \$block_edit.attr('onclick', onclick);

                    ace.require(\"ace/ext/language_tools\");
                    var editor = ace.edit(\"block-source-code\");
                    editor.session.setMode(\"ace/mode/twig\");
                    editor.setTheme(\"ace/theme/tomorrow\");
                    editor.setOptions({
                        readOnly: true,
                        autoScrollEditorIntoView: true,
                        minLines: 20,
                        maxLines: 20
                    });

                    \$.ajax({
                        url: '";
        // line 134
        echo $this->extensions['Eccube\Twig\Extension\IgnoreRoutingNotFoundExtension']->getUrl("admin_content_layout_view_block");
        echo "',
                        type: 'GET',
                        data: {
                            id: block_id
                        }
                    }).done(function(json, statusText, jqXHR) {
                        editor.setValue(json.source);
                        editor.gotoLine(1);
                        editor.scrollToLine(1);
                    }).fail(function(jqXHR, statusText, errorThrown) {
                        editor.setValue(statusText + ' ' + errorThrown);
                    });
                });
            });
        });
    </script>
    <script>
        // プレビューボタンクリック時
        ";
        // line 152
        if (twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "id", [], "any", false, false, true, 152)) {
            // line 153
            echo "\$('#preview-button').on('click', function(){
            var page_id = \$('#";
            // line 154
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "Page", [], "any", false, false, true, 154), "vars", [], "any", false, false, true, 154), "id", [], "any", false, false, true, 154), 154, $this->source), "html", null, true);
            echo "').val();
            if (!page_id) {
                alert(\"";
            // line 156
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_preview_select_page"), "html", null, true);
            echo "\");
                return false;
            }

            \$('#form1').attr('action', \"";
            // line 160
            echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\IgnoreRoutingNotFoundExtension']->getUrl("admin_content_layout_preview", ["id" => twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "id", [], "any", false, false, true, 160)]), "html", null, true);
            echo "\");
            \$('#form1').attr('target', '_blank');
            \$('#form1').submit();

            // submit後に元に戻す
            \$('#form1').attr('action', \"";
            // line 165
            echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\IgnoreRoutingNotFoundExtension']->getUrl("admin_content_layout_edit", ["id" => twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "id", [], "any", false, false, true, 165)]), "html", null, true);
            echo "\");
            \$('#form1').attr('target', '_self');

            return false;
        });
        ";
        }
        // line 171
        echo "
        // searchWordの実行
        \$('#search-block').on('input', function () {
            searchWord(\$(this).val(), \$('#unused-block .sort'));
        });
    </script>
";
    }

    // line 179
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 180
        echo "    ";
        $context["loop_index"] = 0;
        // line 181
        echo "    <form name=\"form1\" id=\"form1\" method=\"post\" action=\"";
        if (twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "id", [], "any", false, false, true, 181)) {
            // line 182
            echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\IgnoreRoutingNotFoundExtension']->getUrl("admin_content_layout_edit", ["id" => twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "id", [], "any", false, false, true, 182)]), "html", null, true);
        } else {
            // line 184
            echo $this->extensions['Eccube\Twig\Extension\IgnoreRoutingNotFoundExtension']->getUrl("admin_content_layout_new");
        }
        // line 185
        echo "\">
        ";
        // line 186
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "_token", [], "any", false, false, true, 186), 186, $this->source), 'widget');
        echo "
        <div class=\"c-contentsArea__cols\">
            <div class=\"c-contentsArea__primaryCol\">
                <div class=\"c-primaryCol\">
                    <div class=\"card rounded border-0 mb-4\">
                        <div class=\"card-header\">
                            <div class=\"row\">
                                <div class=\"col-8\"><span class=\"card-title\">";
        // line 193
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout__card_title"), "html", null, true);
        echo "</span></div>
                                <div class=\"col-4 text-end\"><a data-bs-toggle=\"collapse\" href=\"#layoutOverview\" aria-expanded=\"false\" aria-controls=\"layoutOverview\"><i class=\"fa fa-angle-up fa-lg\"></i></a></div>
                            </div>
                        </div>
                        <div class=\"collapse show ec-cardCollapse\" id=\"layoutOverview\">
                            <div class=\"card-body\">
                                <div class=\"row mb-2\">
                                    <div class=\"col-3 pe-0\"><span>";
        // line 200
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_name"), "html", null, true);
        echo "</span><span class=\"badge bg-primary ms-1\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.common.required"), "html", null, true);
        echo "</span></div>
                                    <div class=\"col\">
                                        ";
        // line 202
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "name", [], "any", false, false, true, 202), 202, $this->source), 'widget');
        echo "
                                        ";
        // line 203
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "name", [], "any", false, false, true, 203), 203, $this->source), 'errors');
        echo "
                                    </div>
                                </div>
                                <div class=\"row mb-2\">
                                    <div class=\"col-3 pe-0\"><span>";
        // line 207
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.common.device_type"), "html", null, true);
        echo "</span></div>
                                    <div class=\"col\">
                                        <span>
                                            ";
        // line 210
        if (twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "id", [], "any", false, false, true, 210)) {
            // line 211
            echo "                                                ";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "DeviceType", [], "any", false, false, true, 211), "vars", [], "any", false, false, true, 211), "data", [], "any", false, false, true, 211), "name", [], "any", false, false, true, 211), 211, $this->source), "html", null, true);
            echo "
                                                <input type=\"hidden\" name=\"";
            // line 212
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "DeviceType", [], "any", false, false, true, 212), "vars", [], "any", false, false, true, 212), "full_name", [], "any", false, false, true, 212), 212, $this->source), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "DeviceType", [], "any", false, false, true, 212), "vars", [], "any", false, false, true, 212), "value", [], "any", false, false, true, 212), 212, $this->source), "html", null, true);
            echo "\" />
                                            ";
        } else {
            // line 214
            echo "                                                ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "DeviceType", [], "any", false, false, true, 214), 214, $this->source), 'widget');
            echo "
                                            ";
        }
        // line 216
        echo "                                            ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "DeviceType", [], "any", false, false, true, 216), 216, $this->source), 'errors');
        echo "
                                        </span>
                                    </div>
                                </div>
                                ";
        // line 221
        echo "                                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_array_filter($this->env, ($context["form"] ?? null), function ($__f__) use ($context, $macros) { $context["f"] = $__f__; return twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["f"], "vars", [], "any", false, false, true, 221), "eccube_form_options", [], "any", false, false, true, 221), "auto_render", [], "any", false, false, true, 221); }));
        foreach ($context['_seq'] as $context["_key"] => $context["f"]) {
            // line 222
            echo "                                    ";
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["f"], "vars", [], "any", false, false, true, 222), "eccube_form_options", [], "any", false, false, true, 222), "form_theme", [], "any", false, false, true, 222)) {
                // line 223
                echo "                                        ";
                $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme($context["f"], [twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["f"], "vars", [], "any", false, false, true, 223), "eccube_form_options", [], "any", false, false, true, 223), "form_theme", [], "any", false, false, true, 223)], true);
                // line 224
                echo "                                        ";
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed($context["f"], 224, $this->source), 'row');
                echo "
                                    ";
            } else {
                // line 226
                echo "                                        <div class=\"row mb-2\">
                                            <div class=\"col-3 pe-0\"><span>";
                // line 227
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["f"], "vars", [], "any", false, false, true, 227), "label", [], "any", false, false, true, 227), 227, $this->source)), "html", null, true);
                echo "</span></div>
                                            <div class=\"col\">
                                                ";
                // line 229
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed($context["f"], 229, $this->source), 'widget');
                echo "
                                                ";
                // line 230
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed($context["f"], 230, $this->source), 'errors');
                echo "
                                            </div>
                                        </div>
                                    ";
            }
            // line 234
            echo "                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['f'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 235
        echo "                            </div>
                        </div>
                    </div>
                    <div class=\"card rounded border-0 mb-4\">
                        <div class=\"card-header\">
                            <div class=\"row\">
                                <div class=\"col-8\">
                                    <div class=\"d-inline-block\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"";
        // line 242
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("tooltip.content.layout_edit"), "html", null, true);
        echo "\"><span class=\"card-title\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_edit__card_title"), "html", null, true);
        echo "</span><i class=\"fa fa-question-circle fa-lg ms-1\"></i></div>
                                </div>
                                <div class=\"col-4 text-end\"><a data-bs-toggle=\"collapse\" href=\"#layoutBlockEdit\" aria-expanded=\"false\" aria-controls=\"layoutBlockEdit\"><i class=\"fa fa-angle-up fa-lg\"></i></a></div>
                            </div>
                        </div>
                        <div class=\"collapse show ec-cardCollapse\" id=\"layoutBlockEdit\">
                            <div class=\"card-body\">
                                <div class=\"row\">
                                    <div class=\"col p-2\">
                                        <div class=\"d-block border border-ec-gray\">
                                            ";
        // line 252
        $context["target_id"] = twig_constant("Eccube\\Entity\\Layout::TARGET_ID_HEAD");
        // line 253
        echo "                                            <div id=\"position_";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["target_id"] ?? null), 253, $this->source), "html", null, true);
        echo "\"
                                                 class=\"d-block p-3 border border-ec-gray border-top-0 border-end-0 border-start-0 ui-sortable\">
                                                <p class=\"fw-bold mb-2\">";
        // line 255
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__head"), "html", null, true);
        echo "</p>
                                                ";
        // line 256
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "getBlockPositionsByTargetId", [($context["target_id"] ?? null)], "method", false, false, true, 256));
        $context['_iterated'] = false;
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["BlockPosition"]) {
            // line 257
            echo "                                                    ";
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "@admin/Content/layout_block.twig");
            echo "
                                                    ";
            // line 258
            $context["loop_index"] = (($context["loop_index"] ?? null) + 1);
            // line 259
            echo "                                                ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 260
            echo "                                                    <div class=\"target-placeholder d-block text-center border-ec-dashed p-3\"><span class=\"text-ec-gray\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_drag_and_drop_message"), "html", null, true);
            echo "</span></div>
                                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['BlockPosition'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 262
        echo "                                            </div>
                                            ";
        // line 263
        $context["target_id"] = twig_constant("Eccube\\Entity\\Layout::TARGET_ID_BODY_AFTER");
        // line 264
        echo "                                            <div id=\"position_";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["target_id"] ?? null), 264, $this->source), "html", null, true);
        echo "\"
                                                 class=\"d-block p-3 border border-ec-gray border-top-0 border-end-0 border-start-0 ui-sortable\">
                                                <p class=\"fw-bold mb-2\">";
        // line 266
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__body_after"), "html", null, true);
        echo "</p>
                                                ";
        // line 267
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "getBlockPositionsByTargetId", [($context["target_id"] ?? null)], "method", false, false, true, 267));
        $context['_iterated'] = false;
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["BlockPosition"]) {
            // line 268
            echo "                                                    ";
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "@admin/Content/layout_block.twig");
            echo "
                                                    ";
            // line 269
            $context["loop_index"] = (($context["loop_index"] ?? null) + 1);
            // line 270
            echo "                                                ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 271
            echo "                                                    <div class=\"target-placeholder d-block text-center border-ec-dashed p-3\"><span class=\"text-ec-gray\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_drag_and_drop_message"), "html", null, true);
            echo "</span></div>
                                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['BlockPosition'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 273
        echo "                                            </div>
                                            ";
        // line 274
        $context["target_id"] = twig_constant("Eccube\\Entity\\Layout::TARGET_ID_HEADER");
        // line 275
        echo "                                            <div id=\"position_";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["target_id"] ?? null), 275, $this->source), "html", null, true);
        echo "\"
                                                 class=\"d-block p-3 border border-ec-gray border-top-0 border-end-0 border-start-0 ui-sortable\">
                                                <p class=\"fw-bold mb-2\">";
        // line 277
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__header"), "html", null, true);
        echo "</p>
                                                ";
        // line 278
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "getBlockPositionsByTargetId", [($context["target_id"] ?? null)], "method", false, false, true, 278));
        $context['_iterated'] = false;
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["BlockPosition"]) {
            // line 279
            echo "                                                    ";
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "@admin/Content/layout_block.twig");
            echo "
                                                    ";
            // line 280
            $context["loop_index"] = (($context["loop_index"] ?? null) + 1);
            // line 281
            echo "                                                ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 282
            echo "                                                    <div class=\"target-placeholder d-block text-center border-ec-dashed p-3\"><span class=\"text-ec-gray\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_drag_and_drop_message"), "html", null, true);
            echo "</span></div>
                                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['BlockPosition'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 284
        echo "                                            </div>
                                            ";
        // line 285
        $context["target_id"] = twig_constant("Eccube\\Entity\\Layout::TARGET_ID_CONTENTS_TOP");
        // line 286
        echo "                                            <div id=\"position_";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["target_id"] ?? null), 286, $this->source), "html", null, true);
        echo "\"
                                                 class=\"d-block p-3 border border-ec-gray border-top-0 border-end-0 border-start-0 ui-sortable\">
                                                <p class=\"fw-bold mb-2\">";
        // line 288
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__contents_top"), "html", null, true);
        echo "</p>
                                                ";
        // line 289
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "getBlockPositionsByTargetId", [($context["target_id"] ?? null)], "method", false, false, true, 289));
        $context['_iterated'] = false;
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["BlockPosition"]) {
            // line 290
            echo "                                                    ";
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "@admin/Content/layout_block.twig");
            echo "
                                                    ";
            // line 291
            $context["loop_index"] = (($context["loop_index"] ?? null) + 1);
            // line 292
            echo "                                                ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 293
            echo "                                                    <div class=\"target-placeholder d-block text-center border-ec-dashed p-3\"><span class=\"text-ec-gray\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_drag_and_drop_message"), "html", null, true);
            echo "</span></div>
                                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['BlockPosition'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 295
        echo "                                            </div>
                                            <div class=\"d-block ps-3 pe-3\">
                                                <div class=\"row\">
                                                    <div class=\"col align-items-start p-3 border border-ec-gray border-top-0 border-start-0\">
                                                        ";
        // line 299
        $context["target_id"] = twig_constant("Eccube\\Entity\\Layout::TARGET_ID_SIDE_LEFT");
        // line 300
        echo "                                                        <div id=\"position_";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["target_id"] ?? null), 300, $this->source), "html", null, true);
        echo "\"
                                                             class=\"d-block ui-sortable\">
                                                            <p class=\"fw-bold mb-2\">";
        // line 302
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__side_left"), "html", null, true);
        echo "</p>
                                                            ";
        // line 303
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "getBlockPositionsByTargetId", [($context["target_id"] ?? null)], "method", false, false, true, 303));
        $context['_iterated'] = false;
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["BlockPosition"]) {
            // line 304
            echo "                                                                ";
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "@admin/Content/layout_block.twig");
            echo "
                                                                ";
            // line 305
            $context["loop_index"] = (($context["loop_index"] ?? null) + 1);
            // line 306
            echo "                                                            ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 307
            echo "                                                                <div class=\"target-placeholder d-block text-center border-ec-dashed p-3\"><span class=\"text-ec-gray\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_drag_and_drop_message"), "html", null, true);
            echo "</span></div>
                                                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['BlockPosition'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 309
        echo "                                                        </div>
                                                    </div>
                                                    <div class=\"col align-items-start ps-0 pe-0 border border-ec-gray border-top-0 border-start-0 border-bottom-0\">
                                                        <div class=\"d-block h-100\">
                                                            ";
        // line 313
        $context["target_id"] = twig_constant("Eccube\\Entity\\Layout::TARGET_ID_MAIN_TOP");
        // line 314
        echo "                                                            <div id=\"position_";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["target_id"] ?? null), 314, $this->source), "html", null, true);
        echo "\"
                                                                 class=\"d-block p-3 border border-ec-gray border-top-0 border-start-0 border-end-0 ui-sortable\">
                                                                <p class=\"fw-bold mb-2\">";
        // line 316
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__main_top"), "html", null, true);
        echo "</p>
                                                                ";
        // line 317
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "getBlockPositionsByTargetId", [($context["target_id"] ?? null)], "method", false, false, true, 317));
        $context['_iterated'] = false;
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["BlockPosition"]) {
            // line 318
            echo "                                                                    ";
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "@admin/Content/layout_block.twig");
            echo "
                                                                    ";
            // line 319
            $context["loop_index"] = (($context["loop_index"] ?? null) + 1);
            // line 320
            echo "                                                                ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 321
            echo "                                                                    <div class=\"target-placeholder d-block text-center border-ec-dashed p-3\"><span class=\"text-ec-gray\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_drag_and_drop_message"), "html", null, true);
            echo "</span></div>
                                                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['BlockPosition'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 323
        echo "                                                            </div>
                                                            <div class=\"d-block p-3 border border-ec-gray border-top-0 border-start-0 border-end-0 bg-ec-lightGray\">
                                                                <div class=\"d-block text-center p-3\">
                                                                    <p class=\"fw-bold mb-2\">";
        // line 326
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__main"), "html", null, true);
        echo "</p>
                                                                </div>
                                                            </div>
                                                            ";
        // line 329
        $context["target_id"] = twig_constant("Eccube\\Entity\\Layout::TARGET_ID_MAIN_BOTTOM");
        // line 330
        echo "                                                            <div id=\"position_";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["target_id"] ?? null), 330, $this->source), "html", null, true);
        echo "\"
                                                                 class=\"d-block p-3 border border-ec-gray border-top-0 border-start-0 border-end-0 ui-sortable\">
                                                                <p class=\"fw-bold mb-2\">";
        // line 332
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__main_bottom"), "html", null, true);
        echo "</p>
                                                                ";
        // line 333
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "getBlockPositionsByTargetId", [($context["target_id"] ?? null)], "method", false, false, true, 333));
        $context['_iterated'] = false;
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["BlockPosition"]) {
            // line 334
            echo "                                                                    ";
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "@admin/Content/layout_block.twig");
            echo "
                                                                    ";
            // line 335
            $context["loop_index"] = (($context["loop_index"] ?? null) + 1);
            // line 336
            echo "                                                                ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 337
            echo "                                                                    <div class=\"target-placeholder d-block text-center border-ec-dashed p-3\"><span class=\"text-ec-gray\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_drag_and_drop_message"), "html", null, true);
            echo "</span></div>
                                                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['BlockPosition'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 339
        echo "                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=\"col align-items-start ps-0 border border-ec-gray border-top-0 border-start-0 border-end-0\">
                                                        ";
        // line 343
        $context["target_id"] = twig_constant("Eccube\\Entity\\Layout::TARGET_ID_SIDE_RIGHT");
        // line 344
        echo "                                                        <div id=\"position_";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["target_id"] ?? null), 344, $this->source), "html", null, true);
        echo "\"
                                                             class=\"d-block p-3 h-100 ui-sortable\">
                                                            <p class=\"fw-bold mb-2\">";
        // line 346
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__side_right"), "html", null, true);
        echo "</p>
                                                            ";
        // line 347
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "getBlockPositionsByTargetId", [($context["target_id"] ?? null)], "method", false, false, true, 347));
        $context['_iterated'] = false;
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["BlockPosition"]) {
            // line 348
            echo "                                                                ";
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "@admin/Content/layout_block.twig");
            echo "
                                                                ";
            // line 349
            $context["loop_index"] = (($context["loop_index"] ?? null) + 1);
            // line 350
            echo "                                                            ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 351
            echo "                                                                <div class=\"target-placeholder d-block text-center border-ec-dashed p-3\"><span class=\"text-ec-gray\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_drag_and_drop_message"), "html", null, true);
            echo "</span></div>
                                                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['BlockPosition'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 353
        echo "                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=\"d-block border border-ec-gray border-top-0 border-end-0 border-start-0\">
                                                ";
        // line 358
        $context["target_id"] = twig_constant("Eccube\\Entity\\Layout::TARGET_ID_CONTENTS_BOTTOM");
        // line 359
        echo "                                                <div id=\"position_";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["target_id"] ?? null), 359, $this->source), "html", null, true);
        echo "\"
                                                     class=\"d-block p-3 ui-sortable\">
                                                    <p class=\"fw-bold mb-2\">";
        // line 361
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__contents_bottom"), "html", null, true);
        echo "</p>
                                                    ";
        // line 362
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "getBlockPositionsByTargetId", [($context["target_id"] ?? null)], "method", false, false, true, 362));
        $context['_iterated'] = false;
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["BlockPosition"]) {
            // line 363
            echo "                                                        ";
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "@admin/Content/layout_block.twig");
            echo "
                                                        ";
            // line 364
            $context["loop_index"] = (($context["loop_index"] ?? null) + 1);
            // line 365
            echo "                                                    ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 366
            echo "                                                        <div class=\"target-placeholder d-block text-center border-ec-dashed p-3\"><span class=\"text-ec-gray\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_drag_and_drop_message"), "html", null, true);
            echo "</span></div>
                                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['BlockPosition'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 368
        echo "                                                </div>
                                            </div>
                                            <div class=\"d-block border border-ec-gray border-top-0 border-end-0 border-start-0\">
                                                ";
        // line 371
        $context["target_id"] = twig_constant("Eccube\\Entity\\Layout::TARGET_ID_FOOTER");
        // line 372
        echo "                                                <div id=\"position_";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["target_id"] ?? null), 372, $this->source), "html", null, true);
        echo "\"
                                                     class=\"d-block p-3 ui-sortable\">
                                                    <p class=\"fw-bold mb-2\">";
        // line 374
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__footer"), "html", null, true);
        echo "</p>
                                                    ";
        // line 375
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "getBlockPositionsByTargetId", [($context["target_id"] ?? null)], "method", false, false, true, 375));
        $context['_iterated'] = false;
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["BlockPosition"]) {
            // line 376
            echo "                                                        ";
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "@admin/Content/layout_block.twig");
            echo "
                                                        ";
            // line 377
            $context["loop_index"] = (($context["loop_index"] ?? null) + 1);
            // line 378
            echo "                                                    ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 379
            echo "                                                        <div class=\"target-placeholder d-block text-center border-ec-dashed p-3\"><span class=\"text-ec-gray\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_drag_and_drop_message"), "html", null, true);
            echo "</span></div>
                                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['BlockPosition'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 381
        echo "                                                </div>
                                            </div>
                                            <div class=\"d-block border border-ec-gray border-top-0 border-end-0 border-start-0\">
                                                ";
        // line 384
        $context["target_id"] = twig_constant("Eccube\\Entity\\Layout::TARGET_ID_DRAWER");
        // line 385
        echo "                                                <div id=\"position_";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["target_id"] ?? null), 385, $this->source), "html", null, true);
        echo "\"
                                                     class=\"d-block p-3 ui-sortable\">
                                                    <p class=\"fw-bold mb-2\">";
        // line 387
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__drawer"), "html", null, true);
        echo "</p>
                                                    ";
        // line 388
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "getBlockPositionsByTargetId", [($context["target_id"] ?? null)], "method", false, false, true, 388));
        $context['_iterated'] = false;
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["BlockPosition"]) {
            // line 389
            echo "                                                        ";
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "@admin/Content/layout_block.twig");
            echo "
                                                        ";
            // line 390
            $context["loop_index"] = (($context["loop_index"] ?? null) + 1);
            // line 391
            echo "                                                    ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 392
            echo "                                                        <div class=\"target-placeholder d-block text-center border-ec-dashed p-3\"><span class=\"text-ec-gray\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_drag_and_drop_message"), "html", null, true);
            echo "</span></div>
                                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['BlockPosition'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 394
        echo "                                                </div>
                                            </div>
                                            <div class=\"d-block\">
                                                ";
        // line 397
        $context["target_id"] = twig_constant("Eccube\\Entity\\Layout::TARGET_ID_CLOSE_BODY_BEFORE");
        // line 398
        echo "                                                <div id=\"position_";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["target_id"] ?? null), 398, $this->source), "html", null, true);
        echo "\"
                                                     class=\"d-block p-3 border-top-0 border-end-0 border-start-0 ui-sortable\">
                                                    <p class=\"fw-bold mb-2\">";
        // line 400
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__close_body_before"), "html", null, true);
        echo "</p>
                                                    ";
        // line 401
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "getBlockPositionsByTargetId", [($context["target_id"] ?? null)], "method", false, false, true, 401));
        $context['_iterated'] = false;
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["BlockPosition"]) {
            // line 402
            echo "                                                        ";
            echo $this->extensions['Eccube\Twig\Extension\IgnoreTwigSandboxErrorExtension']->twig_include($this->env, $context, "@admin/Content/layout_block.twig");
            echo "
                                                        ";
            // line 403
            $context["loop_index"] = (($context["loop_index"] ?? null) + 1);
            // line 404
            echo "                                                    ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 405
            echo "                                                        <div class=\"target-placeholder d-block text-center border-ec-dashed p-3\"><span class=\"text-ec-gray\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_drag_and_drop_message"), "html", null, true);
            echo "</span></div>
                                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['BlockPosition'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 407
        echo "                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=\"col-3 p-2\">
                                        ";
        // line 412
        if ((twig_get_attribute($this->env, $this->source, ($context["Layout"] ?? null), "id", [], "any", false, false, true, 412) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "Page", [], "any", false, false, true, 412), "vars", [], "any", false, false, true, 412), "choices", [], "any", false, false, true, 412)) > 0))) {
            // line 413
            echo "<div id=\"preview-block\" class=\"d-block border border-ec-gray mb-4\">
                                            <div class=\"card-body\">
                                                <div class=\"d-block text-center mb-3\">
                                                    ";
            // line 416
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "Page", [], "any", false, false, true, 416), 416, $this->source), 'widget');
            echo "
                                                </div>
                                                <div class=\"d-block text-center\">
                                                    <a id=\"preview-button\" class=\"btn w-100 btn-ec-regular\">";
            // line 419
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_preview"), "html", null, true);
            echo "</a>
                                                </div>
                                            </div>
                                        </div>
                                        ";
        }
        // line 424
        echo "                                        <div id=\"unused-block\" class=\"d-block border border-ec-gray\">
                                            ";
        // line 425
        $context["unused_target_id"] = twig_constant("Eccube\\Entity\\Layout::TARGET_ID_UNUSED");
        // line 426
        echo "                                            <div id=\"position_";
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["unused_target_id"] ?? null), 426, $this->source), "html", null, true);
        echo "\" class=\"d-block p-3 ui-sortable\">
                                                <p class=\"fw-bold mb-2\">";
        // line 427
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_section__unused"), "html", null, true);
        echo "</p>
                                                <div class=\"mb-3\">
                                                    <div class=\"row\">
                                                        <div class=\"col\">
                                                            <div class=\"input-group mb-3\">
                                                                <div class=\"input-group-text\">
                                                                    <span id=\"basic-addon1\"><i class=\"fa fa-search\"></i></span>
                                                                </div>
                                                                <input id=\"search-block\" class=\"form-control\" type=\"search\" aria-label=\"Search\">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                ";
        // line 440
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["UnusedBlocks"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["UnusedBlock"]) {
            // line 441
            echo "                                                    <div id=\"detail_box__layout_item--";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["UnusedBlock"], "id", [], "any", false, false, true, 441), 441, $this->source), "html", null, true);
            echo "\"
                                                         class=\"block sort";
            // line 442
            if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, true, 442)) {
                echo " first";
            }
            echo " border border-ec-gray bg-ec-lightGray p-2 mb-2\">
                                                        <div class=\"row justify-content-between\">
                                                            <div class=\"col\">
                                                                <i class=\"fa fa-bars text-ec-gray me-3\"></i>
                                                                <span class=\"view_readme\" data-bs-toggle=\"modal\"
                                                                   data-bs-target=\"#blockModal\"
                                                                   data-id=\"";
            // line 448
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["UnusedBlock"], "id", [], "any", false, false, true, 448), 448, $this->source), "html", null, true);
            echo "\"
                                                                   data-name=\"";
            // line 449
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["UnusedBlock"], "name", [], "any", false, false, true, 449), 449, $this->source), "html", null, true);
            echo "\"
                                                                   title=\"";
            // line 450
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["UnusedBlock"], "name", [], "any", false, false, true, 450), 450, $this->source), "html", null, true);
            echo "\"
                                                                >";
            // line 451
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["UnusedBlock"], "name", [], "any", false, false, true, 451), 451, $this->source), "html", null, true);
            echo "</span>
                                                            </div>
                                                            <div class=\"col-auto text-end\">
                                                                <div class=\"d-inline-block px-3\">
                                                                    <input type=\"hidden\" class=\"name\" name=\"name_";
            // line 455
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["loop_index"] ?? null), 455, $this->source), "html", null, true);
            echo "\"
                                                                        value=\"";
            // line 456
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["UnusedBlock"], "name", [], "any", false, false, true, 456), 456, $this->source), "html", null, true);
            echo "\"/>
                                                                    <input type=\"hidden\" class=\"id\" name=\"block_id_";
            // line 457
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["loop_index"] ?? null), 457, $this->source), "html", null, true);
            echo "\"
                                                                        value=\"";
            // line 458
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["UnusedBlock"], "id", [], "any", false, false, true, 458), 458, $this->source), "html", null, true);
            echo "\"/>
                                                                    <input type=\"hidden\" class=\"target-id\"
                                                                        name=\"section_";
            // line 460
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["loop_index"] ?? null), 460, $this->source), "html", null, true);
            echo "\"
                                                                        value=\"";
            // line 461
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["unused_target_id"] ?? null), 461, $this->source), "html", null, true);
            echo "\"/>
                                                                    <input type=\"hidden\" class=\"block-row\"
                                                                        name=\"block_row_";
            // line 463
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["loop_index"] ?? null), 463, $this->source), "html", null, true);
            echo "\"
                                                                        value=\"";
            // line 464
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["UnusedBlock"], "id", [], "any", false, false, true, 464), 464, $this->source), "html", null, true);
            echo "\"/>
                                                                    <div class=\"block-context-menu d-inline-block px-3\"><i class=\"fa fa-ellipsis-v fa-lg text-secondary\"></i></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    ";
            // line 470
            $context["loop_index"] = (($context["loop_index"] ?? null) + 1);
            // line 471
            echo "                                                ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['UnusedBlock'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 472
        echo "                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=\"modal fade\" id=\"clickStreamConfirm\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"clickStreamConfirm\" aria-hidden=\"true\">
                                    <div class=\"modal-dialog\" role=\"document\">
                                        <div class=\"modal-content\">
                                            <div class=\"modal-header\">
                                                <h5 class=\"modal-title\">";
        // line 480
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_move_to__confirm_title"), "html", null, true);
        echo "</h5>
                                                <button class=\"btn-close\" type=\"button\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                                            </div>
                                            <div class=\"modal-body\">
                                                <p>";
        // line 484
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_move_to__confirm_message"), "html", null, true);
        echo "</p>
                                                <div>
                                                    <select id=\"move-section\" class=\"form-select\">
                                                    </select>
                                                    <input type=\"hidden\" id=\"target-block\" />
                                                </div>
                                            </div>
                                            <div class=\"modal-footer\">
                                                <button class=\"btn btn-ec-regular w-25\" type=\"button\" data-bs-dismiss=\"modal\">";
        // line 492
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.common.cancel"), "html", null, true);
        echo "</button>
                                                <button id=\"move-to-section\" class=\"btn btn-ec-conversion w-25\" type=\"button\" data-bs-dismiss=\"modal\">";
        // line 493
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_move_to__execute"), "html", null, true);
        echo "</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=\"modal fade\" id=\"codePreview\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"codePreview\" aria-hidden=\"true\">
                                    <div class=\"modal-dialog\" role=\"document\">
                                        <div class=\"modal-content\">
                                            <div class=\"modal-header\">
                                                <h5 class=\"modal-title\">";
        // line 502
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_preview_code__confirm_title"), "html", null, true);
        echo "</h5>
                                                <button class=\"btn-close\" type=\"button\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                                            </div>
                                            <div class=\"modal-body\">
                                                <p>";
        // line 506
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_preview_code__confirm_message"), "html", null, true);
        echo "</p>
                                                <div id=\"block-source-code\" class=\"d-block border bg-ec-lightGray p-2\"></div>
                                            </div>
                                            <div class=\"modal-footer\">
                                                <button class=\"btn btn-ec-regular\" type=\"button\" data-bs-dismiss=\"modal\">";
        // line 510
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.common.cancel"), "html", null, true);
        echo "</button>
                                                <button id=\"block-edit\" onclick=\"location.href='";
        // line 511
        echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\IgnoreRoutingNotFoundExtension']->getUrl("admin_content_block_edit", ["id" => twig_constant("Eccube\\Controller\\Admin\\Content\\LayoutController::DUMMY_BLOCK_ID")]), "html", null, true);
        echo "'\" class=\"btn btn-ec-conversion w-25\" type=\"button\" data-bs-dismiss=\"modal\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_preview_code__confirm_move_to_block"), "html", null, true);
        echo "</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id=\"context-menu\" style=\"display: none\">
                                    <div class='list-group'>
                                        <a href='javascript:;' class='context-moveup list-group-item list-group-item-action border-0'>
                                            <i class='fa fa-long-arrow-up me-1'></i>";
        // line 519
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_up"), "html", null, true);
        echo "
                                        </a>
                                        <a href='javascript:;' class='context-movedown list-group-item list-group-item-action border-0'>
                                            <i class='fa fa-long-arrow-down me-1'></i>";
        // line 522
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_down"), "html", null, true);
        echo "
                                        </a>
                                        <a href='javascript:;' class='context-movesection list-group-item list-group-item-action border-0'>
                                            <i class='fa fa-arrows me-1'></i>";
        // line 525
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_move_to"), "html", null, true);
        echo "
                                        </a>
                                        <a href='javascript:;' class='context-preview list-group-item list-group-item-action border-0'>
                                            <i class='fa fa-code me-1'></i>";
        // line 528
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_preview_code"), "html", null, true);
        echo "
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id=\"target-placeholder\" style=\"display: none\"><div class=\"target-placeholder d-block text-center border-ec-dashed p-3\"><span class=\"text-ec-gray\">";
        // line 537
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_drag_and_drop_message"), "html", null, true);
        echo "</span></div></div>
            <div class=\"c-conversionArea\">
                <div class=\"c-conversionArea__container\">
                    <div class=\"row justify-content-between align-items-center\">
                        <div class=\"col-6\">
                            <div class=\"c-conversionArea__leftBlockItem\">
                                <a class=\"c-baseLink\" href=\"";
        // line 543
        echo $this->extensions['Eccube\Twig\Extension\IgnoreRoutingNotFoundExtension']->getUrl("admin_content_layout");
        echo "\"><i class=\"fa fa-backward\" aria-hidden=\"true\"></i><span>";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.content.layout_management"), "html", null, true);
        echo "</span></a>
                            </div>
                        </div>
                        <div class=\"col-6\">
                            <div id=\"ex-conversion-action\" class=\"row align-items-center justify-content-end\">
                                <div class=\"col-auto\">
                                    <button class=\"btn btn-ec-conversion px-5\" type=\"submit\">";
        // line 549
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.common.registration"), "html", null, true);
        echo "</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "@admin/Content/layout.twig";
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
        return array (  1548 => 549,  1537 => 543,  1528 => 537,  1516 => 528,  1510 => 525,  1504 => 522,  1498 => 519,  1485 => 511,  1481 => 510,  1474 => 506,  1467 => 502,  1455 => 493,  1451 => 492,  1440 => 484,  1433 => 480,  1423 => 472,  1409 => 471,  1407 => 470,  1398 => 464,  1394 => 463,  1389 => 461,  1385 => 460,  1380 => 458,  1376 => 457,  1372 => 456,  1368 => 455,  1361 => 451,  1357 => 450,  1353 => 449,  1349 => 448,  1338 => 442,  1333 => 441,  1316 => 440,  1300 => 427,  1295 => 426,  1293 => 425,  1290 => 424,  1282 => 419,  1276 => 416,  1271 => 413,  1269 => 412,  1262 => 407,  1253 => 405,  1240 => 404,  1238 => 403,  1233 => 402,  1215 => 401,  1211 => 400,  1205 => 398,  1203 => 397,  1198 => 394,  1189 => 392,  1176 => 391,  1174 => 390,  1169 => 389,  1151 => 388,  1147 => 387,  1141 => 385,  1139 => 384,  1134 => 381,  1125 => 379,  1112 => 378,  1110 => 377,  1105 => 376,  1087 => 375,  1083 => 374,  1077 => 372,  1075 => 371,  1070 => 368,  1061 => 366,  1048 => 365,  1046 => 364,  1041 => 363,  1023 => 362,  1019 => 361,  1013 => 359,  1011 => 358,  1004 => 353,  995 => 351,  982 => 350,  980 => 349,  975 => 348,  957 => 347,  953 => 346,  947 => 344,  945 => 343,  939 => 339,  930 => 337,  917 => 336,  915 => 335,  910 => 334,  892 => 333,  888 => 332,  882 => 330,  880 => 329,  874 => 326,  869 => 323,  860 => 321,  847 => 320,  845 => 319,  840 => 318,  822 => 317,  818 => 316,  812 => 314,  810 => 313,  804 => 309,  795 => 307,  782 => 306,  780 => 305,  775 => 304,  757 => 303,  753 => 302,  747 => 300,  745 => 299,  739 => 295,  730 => 293,  717 => 292,  715 => 291,  710 => 290,  692 => 289,  688 => 288,  682 => 286,  680 => 285,  677 => 284,  668 => 282,  655 => 281,  653 => 280,  648 => 279,  630 => 278,  626 => 277,  620 => 275,  618 => 274,  615 => 273,  606 => 271,  593 => 270,  591 => 269,  586 => 268,  568 => 267,  564 => 266,  558 => 264,  556 => 263,  553 => 262,  544 => 260,  531 => 259,  529 => 258,  524 => 257,  506 => 256,  502 => 255,  496 => 253,  494 => 252,  479 => 242,  470 => 235,  464 => 234,  457 => 230,  453 => 229,  448 => 227,  445 => 226,  439 => 224,  436 => 223,  433 => 222,  428 => 221,  420 => 216,  414 => 214,  407 => 212,  402 => 211,  400 => 210,  394 => 207,  387 => 203,  383 => 202,  376 => 200,  366 => 193,  356 => 186,  353 => 185,  350 => 184,  347 => 182,  344 => 181,  341 => 180,  337 => 179,  327 => 171,  318 => 165,  310 => 160,  303 => 156,  298 => 154,  295 => 153,  293 => 152,  272 => 134,  254 => 119,  175 => 43,  162 => 35,  156 => 34,  150 => 33,  144 => 32,  138 => 31,  132 => 30,  126 => 29,  120 => 28,  114 => 27,  108 => 26,  102 => 25,  96 => 24,  90 => 23,  86 => 21,  82 => 20,  75 => 16,  68 => 15,  63 => 11,  61 => 18,  59 => 13,  40 => 11,);
    }

    public function getSourceContext()
    {
        return new Source("", "@admin/Content/layout.twig", "/home/xs989423/cape-kaihatsu.site/public_html/ome_eccube04-ono/src/Eccube/Resource/template/admin/Content/layout.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 13, "form_theme" => 18, "if" => 152, "for" => 221);
        static $filters = array("escape" => 15, "trans" => 15, "filter" => 221, "length" => 412);
        static $functions = array("constant" => 23, "asset" => 43, "url" => 134, "form_widget" => 186, "form_errors" => 203, "form_row" => 224, "include" => 257);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'form_theme', 'if', 'for'],
                ['escape', 'trans', 'filter', 'length'],
                ['constant', 'asset', 'url', 'form_widget', 'form_errors', 'form_row', 'include']
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
