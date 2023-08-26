<?php



namespace App\Mail;



use Illuminate\Bus\Queueable;

use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Mail\Mailable;

use Illuminate\Queue\SerializesModels;



class VendaFeita extends Mailable

{

    use Queueable, SerializesModels;



    public $venda;



    /**

     * Create a new message instance.

     *

     * @return void

     */

    public function __construct($venda)

    {

        $this->venda = $venda;

    }



    /**

     * Build the message.

     *

     * @return $this

     */

    public function build()

    {

        return $this->view('mail.venda')->subject('Venda Cota SorteMax');

    }

}

