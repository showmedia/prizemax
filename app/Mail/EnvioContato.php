<?php



namespace App\Mail;



use Illuminate\Bus\Queueable;

use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Mail\Mailable;

use Illuminate\Queue\SerializesModels;



class EnvioContato extends Mailable

{

    use Queueable, SerializesModels;



    public $contato;



    /**

     * Create a new message instance.

     *

     * @return void

     */

    public function __construct($contato)

    {

        $this->contato = $contato;

    }



    /**

     * Build the message.

     *

     * @return $this

     */

    public function build()

    {

        return $this->view('mail.contato')->subject('Contato via sistema web SorteMax');

    }

}

