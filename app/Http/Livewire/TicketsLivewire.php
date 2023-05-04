<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;
use App\Models\TicketMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class TicketsLivewire extends Component
{
    use LivewireAlert;
    public $view = 'tickets';

    //Form New
    public $subjet;

    public $description;

    //View Messages
    public $messages;

    //Ticket
    public $ticket;

    //Reply
    public $comment;

    public function render()
    {
        if (Auth::user()->admin) {
            return view('livewire.tickets-livewire', [
                'tickets' => Ticket::orderBy('created_at', 'desc')->get()
            ]);
        } else {
            return view('livewire.tickets-livewire', [
                'tickets' => Ticket::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get()
            ]);
        }
    }

    //Send the ticket via user
    public function send()
    {
        DB::beginTransaction();
        $new = new Ticket();
        $new->user_id = Auth::id();
        $new->subjet = $this->subjet;
        $new->save();

        $newMessage = new TicketMessage();
        $newMessage->ticket_id = $new->id;
        $newMessage->subjet = $this->subjet;
        $newMessage->description = $this->description;
        $newMessage->via = 'client';
        $newMessage->save();
        DB::commit();

        $this->sendAlert('success', 'Ticket enviado correctamente', 'top-end');
        $this->reset('subjet', 'description');
    }

    //View a ticket
    public function viewTicket($id)
    {
        $this->view = 'messages';

        $ticket = Ticket::findOrFail($id);
        if (Auth::user()->admin && ! $ticket->admin_id) {
            $ticket->admin_id = Auth::user()->admin->id;
            $ticket->update();
        }
        $this->ticket = $ticket;
        if ($ticket->user_id == Auth::id() || Auth::user()->admin) {
            $this->messages = TicketMessage::where('ticket_id', $ticket->id)->orderBy('created_at', 'desc')->get();
        } else {
            $this->sendAlert('error', 'Este ticket no te pertenece', 'top-end');
        }
    }

    //Send new Rely a ticket
    public function newReply()
    {
        $newReply = new TicketMessage();
        $newReply->ticket_id = $this->ticket->id;
        $newReply->description = $this->comment;
        if (Auth::id() == $this->ticket->user_id) {
            $newReply->via = 'client';
        } else {
            $newReply->via = 'platform';
        }
        $newReply->save();
        $this->messages = TicketMessage::where('ticket_id', $this->ticket->id)->orderBy('created_at', 'desc')->get();
        $this->reset('comment');
    }

    //Close the ticket
    public function close()
    {
        $this->ticket->status = 'closed';
        $this->ticket->update();
        $this->sendAlert('success', 'Has cerrado este ticket correctamente', 'top-end');
    }

    public function sendAlert($tipo, $texto, $posicion)
    {
        $this->alert($tipo, $texto, [
            'position' =>  $posicion,
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
        ]);
    }
}
