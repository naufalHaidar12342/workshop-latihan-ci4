<?php

namespace App\Libraries;

use Dompdf\Dompdf;
use Dompdf\Options;

class InvoiceToPDF extends Dompdf
{
    public function __construct()
    {
        parent::__construct();
    }

    public function generate(
        $view,
        $data = array(),
        $filename = 'report',
        $paper = 'A4',
        $orientation = 'portrait'
    ) {
        $html = view($view, $data);
        $enableRemoteOption = new Options();
        $enableRemote = $enableRemoteOption->setIsRemoteEnabled(true);
        $this->loadHtml($html);
        $this->setPaper($paper, $orientation);
        $this->setOptions($enableRemote);
        $this->render();
        $this->stream($filename . ".pdf", array("Attachment" => FALSE));
    }
}
