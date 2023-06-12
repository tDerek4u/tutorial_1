<?php

namespace App\Http\Controllers;



use Imagick;
use Spatie\PdfToImage\Pdf;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Org_Heigl\Ghostscript\Ghostscript;

class ConvertController extends Controller
{
    public function index(){
        $pdf_file = public_path() . "\pdf\\file.pdf";
        $output_path =  storage_path() . "/app/public/images";
        Ghostscript::setGsPath("C:\Program Files\gs\gs10.01.1\bin\gswin64c.exe");
        $pdf = new Pdf($pdf_file);

        foreach (range(1, $pdf->getNumberOfPages()) as $pageNumber) {
            $pageName = time().Str::random(6).'.'.'jpg';
            $pdf->setPage($pageNumber)->saveImage($output_path.$pageName);
        }
    }
}
