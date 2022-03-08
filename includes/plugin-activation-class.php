<?php

/*
* @ basic plugim
*/


class activate
{
    public static function activation()
    {
        echo 'this';
        flush_rewrite_rules();
    }
}
