<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Notifica;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class NotificationsLivewire extends Component
{
    use LivewireAlert;
    
    public $notifications;

    public $userId;

    public $leido = 0;

    public function render()
    {
        return view('livewire.notifications-livewire');
    }

    public function mount()
    {
        $this->userId = Auth::id();
        $this->notifications = Notifica::where('user_id', $this->userId)->where('view', $this->leido)->get();
    }

    public function delete($id_noti)
    {
        $notificacion = Notifica::find($id_noti);
        if ($notificacion) {
            $notificacion->delete();
            $this->notifications = Notifica::where('user_id', $this->userId)->where('view', $this->leido)->get();
        }
    }

    public function deleteAll()
    {
        Notifica::where('user_id', $this->userId)->delete();
        $this->notifications = Notifica::where('user_id', $this->userId)->where('view', $this->leido)->get();
    }
}
