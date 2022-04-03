<?php

namespace Joy\VoyagerLoginAsUser\Http\Controllers;

use Joy\VoyagerLoginAsUser\Http\Traits\LoginAsUserAction;
use TCG\Voyager\Http\Controllers\VoyagerBaseController as TCGVoyagerBaseController;

class VoyagerBaseController extends TCGVoyagerBaseController
{
    use LoginAsUserAction;
}
