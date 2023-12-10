<?php

namespace App\Http\Controllers\App\IndicadorDesempenho;

use App\Actions\IndicadorDesempenho\IndicadorDesempenhoStoreAction;
use App\DTO\IndicadorDesempenho\IndicadorDesempenhoStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\IndicadorDesempenho\IndicadorDesempenhoStoreRequest;
use App\Models\IndicadorDesempenho;

class IndicadorDesempenhoStoreController extends Controller
{
    public function __construct(
        protected IndicadorDesempenhoStoreAction $action
    ) { }

    public function store(IndicadorDesempenhoStoreRequest $indicadorDesempenhoStoreRequest)
    {
        
        $this->action->exec(IndicadorDesempenhoStoreDTO::makeFromRequest($indicadorDesempenhoStoreRequest));

        return redirect()->back();
    }
}
