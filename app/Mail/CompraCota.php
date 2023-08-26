<?php



namespace App\Mail;



use Illuminate\Bus\Queueable;

use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Mail\Mailable;

use Illuminate\Queue\SerializesModels;

use App\Models\Venda;



class CompraCota extends Mailable

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

        return $this->view('mail.compra')->subject('Compra Cota SorteMax');

    }

}

