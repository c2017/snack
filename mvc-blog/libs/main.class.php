<?php
    class main{
        function __construct()
        {
            $this->session=new session();

            $this->smarty=new Smarty();
            $this->smarty->setCompileDir("compile");
            $this->smarty->setTemplateDir("template");

        }
    }

