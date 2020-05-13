<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* register.html.twig */
class __TwigTemplate_1897afaa692a788e4a9a186c3b2ef7ac13576fd3b649860e34c96168aeb54b84 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"ru\">
<head>
    <title>Lamantin Framework | Register</title>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <link rel=\"stylesheet\" href=\"/public/css/main.css\">
    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css\" integrity=\"sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh\" crossorigin=\"anonymous\">
</head>
<body>
<div class=\"flex-center position-ref full-height\">
    ";
        // line 12
        if ((call_user_func_array($this->env->getFunction('auth')->getCallable(), []) == true)) {
            // line 13
            echo "        <div class=\"top-right links\">
            <a href=\"/home\">Home</a>
        </div>
    ";
        } else {
            // line 17
            echo "        <div class=\"top-right links\">
            <a href=\"/login\">Login</a>
        </div>
    ";
        }
        // line 21
        echo "    <div class=\"form\">
        <form class=\"form-horizontal\" role=\"form\" method=\"POST\" action=\"/Register\">
            <input type=\"hidden\" name=\"CSRF-TOKEN\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('csrf')->getCallable(), []), "html", null, true);
        echo "\">
            <div class=\"form-group\">
                <div class=\"form-group\">
                    <label for=\"inputEmail3\" class=\"col-sm-2 control-label\">Логин</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" class=\"form-control\" placeholder=\"Логин\" name=\"name\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label for=\"inputEmail3\" class=\"col-sm-2 control-label\">Email</label>
                    <div class=\"col-sm-10\">
                        <input type=\"email\" class=\"form-control\" placeholder=\"Email\" name=\"email\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label for=\"inputPassword3\" class=\"col-sm-2 control-label\">Пароль</label>
                    <div class=\"col-sm-10\">
                        <input type=\"password\" class=\"form-control\" placeholder=\"Пароль\" name=\"password\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <div class=\"col-sm-10\">
                        <button type=\"submit\" class=\"btn btn-primary\">Зарегистрироваться</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 23,  57 => 21,  51 => 17,  45 => 13,  43 => 12,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"ru\">
<head>
    <title>Lamantin Framework | Register</title>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <link rel=\"stylesheet\" href=\"/public/css/main.css\">
    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css\" integrity=\"sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh\" crossorigin=\"anonymous\">
</head>
<body>
<div class=\"flex-center position-ref full-height\">
    {% if auth() == true %}
        <div class=\"top-right links\">
            <a href=\"/home\">Home</a>
        </div>
    {% else %}
        <div class=\"top-right links\">
            <a href=\"/login\">Login</a>
        </div>
    {% endif %}
    <div class=\"form\">
        <form class=\"form-horizontal\" role=\"form\" method=\"POST\" action=\"/Register\">
            <input type=\"hidden\" name=\"CSRF-TOKEN\" value=\"{{ csrf() }}\">
            <div class=\"form-group\">
                <div class=\"form-group\">
                    <label for=\"inputEmail3\" class=\"col-sm-2 control-label\">Логин</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" class=\"form-control\" placeholder=\"Логин\" name=\"name\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label for=\"inputEmail3\" class=\"col-sm-2 control-label\">Email</label>
                    <div class=\"col-sm-10\">
                        <input type=\"email\" class=\"form-control\" placeholder=\"Email\" name=\"email\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label for=\"inputPassword3\" class=\"col-sm-2 control-label\">Пароль</label>
                    <div class=\"col-sm-10\">
                        <input type=\"password\" class=\"form-control\" placeholder=\"Пароль\" name=\"password\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <div class=\"col-sm-10\">
                        <button type=\"submit\" class=\"btn btn-primary\">Зарегистрироваться</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>", "register.html.twig", "G:\\OSPanel\\domains\\Lamantin\\public\\views\\register.html.twig");
    }
}
