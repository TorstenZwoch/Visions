<?php

namespace Libetto\DataGridBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class LibettoDataGridBundle extends Bundle
{
    public function getParent(){
        return 'APYDataGridBundle';
    }
}
