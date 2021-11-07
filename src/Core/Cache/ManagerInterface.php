<?php
/**
 * Created by PhpStorm.
 * User: isnain
 * Date: 09.08.21
 * Time: 10:14
 */

namespace Cache;

/**
 * We assume the Adapter will at least have these:
 * @method set
 * @method get
 */
interface ManagerInterface
{
    /**
     *
     * @return bool
     */
    public function connect(): bool;
}
