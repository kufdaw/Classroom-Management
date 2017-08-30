<?php

namespace App\Repositories\Contracts;

use App\Grade;

interface GradeContract
{
    public function add(string $value, int  $subjectId, int $studentId):Grade;
    public function update(Grade $grade, string $value):Grade;
    public function delete(Grade $grade);
}
