<?php

namespace Joy\VoyagerLoginAsUser\Http\Controllers;

use Joy\VoyagerLoginAsUser\Http\Traits\LoginAsUserAction;
use Joy\VoyagerCore\Http\Controllers\VoyagerBaseController as BaseVoyagerBaseController;

class VoyagerBaseController extends BaseVoyagerBaseController
{
    use LoginAsUserAction;
}
