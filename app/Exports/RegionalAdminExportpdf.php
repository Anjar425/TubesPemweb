<?php

namespace App\Exports;

use App\Models\RegionalAdmin;
use Illuminate\Contracts\View\View;
use Mpdf\Mpdf;

class RegionalAdminExportPdf
{
    protected $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function view(): View
    {
        $regional_admin = RegionalAdmin::where('administrator_id', $this->userId)
            ->with('region')
            ->get();

        $data = [
            'title' => 'Data Regional Admin',
            'regional_admin' => $regional_admin,
        ];

        return view('exports.regionaladmin_pdf', $data);
    }
}
