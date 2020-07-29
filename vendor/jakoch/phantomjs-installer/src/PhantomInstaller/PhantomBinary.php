<?php

namespace PhantomInstaller;

class PhantomBinary
{
    const BIN = 'E:\localhost\www\sites\aanmeegasaaral\vendor\bin\phantomjs.exe';
    const DIR = 'E:\localhost\www\sites\aanmeegasaaral\vendor\bin';

    public static function getBin() {
        return self::BIN;
    }

    public static function getDir() {
        return self::DIR;
    }
}
