<?php

namespace Ynov\LabsBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class YnovLabsBundle extends Bundle
{
     public function getParent()
    {
      return 'FOSUserBundle';
    }
}
