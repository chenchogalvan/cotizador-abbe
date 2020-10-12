<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class mailCotizador extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $tabla;
    public $totalIntereses;
    public $totalPago;
    public $excel;

    // public function __construct($tabla,$totalIntereses,$totalPago)
    // {
    //     $this->tabla = $tabla;
    //     $this->totalIntereses = $totalIntereses;
    //     $this->totalPago = $totalPago;
    // }

    public function __construct($excel)
    {
        $this->excel = $excel;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this->view('mail')->attach($this->excel);
    }
}
