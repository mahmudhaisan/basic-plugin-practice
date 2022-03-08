<?php

/*
* @ basic plugim
*/


class activate
{
    public static function deactivation()
    {
        echo 'this';
        flush_rewrite_rules();
    }
}
