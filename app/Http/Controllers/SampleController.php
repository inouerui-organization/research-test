<?php

namespace App\Http\Controllers;

use App\Services\SampleService;
use Illuminate\View\View;

class SampleController extends Controller
{
    private $sampleService;

    public function __construct(SampleService $sampleService)
    {
        $this->sampleService = $sampleService;
    }

    public function index(int $id) : View
    {
        $user = $this->sampleService->getAUser($id);
        $date = $this->sampleService->getDate('2025-01-31');

        return view('sample', ['name' => $user->name, 'date' => $date]);
    }
}
