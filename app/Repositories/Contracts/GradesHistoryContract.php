<?php

namespace App\Repositories\Contracts;

use App\Grade;

interface GradesHistoryContract
{
    public function add(Grade $grade);
    public function update(Grade $grade);
    public function delete(Grade $grade);
}
