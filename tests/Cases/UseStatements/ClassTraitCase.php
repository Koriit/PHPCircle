<?php
/**
 * @copyright 2018 Aleksander Stelmaczonek <al.stelmaczonek@gmail.com>
 * @license   MIT License, see license file distributed with this source code
 */

use Vendor\Library\Module1\SomeClass;
use Vendor\Library\Module2\Package\SomeTrait;

class FakeClass {
    use SomeTrait;

    public function someMethod() {
        return true;
    }
}
