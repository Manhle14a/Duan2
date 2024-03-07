<?php

namespace Admin\Mvcoop\Commons;

use eftec\bladeone\BladeOne;

class Controller
{
    public function renderViewClient($views, $data = [])
    {
        $viewsPath = __DIR__ . '/../Views/Client';

        $blade = new BladeOne($viewsPath);

        echo $blade->run($views, $data);
    }
    public function renderViewAdmin($views, $data = [])
    {
        $templatePath = __DIR__ . '/../Views/Admin';

        $blade = new BladeOne($templatePath);

        echo $blade->run($views, $data);
    }
}
