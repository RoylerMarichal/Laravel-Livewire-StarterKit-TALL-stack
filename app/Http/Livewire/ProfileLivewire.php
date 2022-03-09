<?php

namespace App\Http\Livewire;

use Hash;
use App\Models\User;
use App\Models\Service;
use Livewire\Component;
use App\Models\Freelancer;
use App\Models\Valoration;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProfileLivewire extends Component
{
    public $currentPass;

    public $newPass;

    public $user;

    public $avatar;

    public $phone;

    public $email;

    use WithFileUploads;

    public function render()
    {
        return view('livewire.profile-livewire');
    }

    public function mount($userID)
    {
        $user = User::findOrFail($userID);
        if ($user->id == Auth::id() || Auth::user()->staff || Auth::user()->admin) {
            $this->user = $user;
        } else {
            return abort(403);
        }
        $this->phone = $this->user->phone;
        $this->email = $this->user->email;
        $this->qvapay = $this->user->qvapay;
    }

    public function changePass()
    {
        if (Hash::check($this->currentPass, $this->user->password)) {
            $this->validate([
                'newPass' => 'min:7'
            ]);
            $current = Hash::make($this->newPass);
            $this->user->password = $current;
            $this->user->update();
            $this->sendAlert('success', 'Contraseña actualizada', 'top-end');
        } else {
            $this->sendAlert('error', 'Contraseña actual incorrecta', 'top-end');

            return;
        }
    }

    public function updatedAvatar()
    {
        $this->validate([
            'avatar' => 'max:9500kb'
        ]);

        $user = Auth::user();

        if ($this->avatar) {
            $user->avatar = self::uploadImage($this->avatar);
        }

        $user->update();
        $this->sendAlert('success', 'Avatar actualizado correctamente', 'top-end');
    }

    public function updatedPhone()
    {
        $this->validate([
            'phone' => 'max:16'
        ]);

        $user = Auth::user();

        $user->phone = $this->phone;

        $user->update();
        $this->sendAlert('success', 'Teléfono actualizado correctamente', 'top-end');
    }

    public function updatedEmail()
    {
        $this->validate([
            'email' => 'email'
        ]);

        $user = Auth::user();

        $user->email = $this->email;

        $user->update();
        $this->sendAlert('success', 'Email actualizado correctamente', 'top-end');
    }

    public static function uploadImage($path)
    {
        $image = $path;
        if (Auth::check()) {
            $avatarName = Auth::user()->name.substr(uniqid(rand(), true), 7, 7).'.webp';
            $avatarName2 = Auth::user()->name.substr(uniqid(rand(), true), 7, 7).'.jpg';
        } else {
            $avatarName = 'invitado'.substr(uniqid(rand(), true), 7, 7).'.webp';
            $avatarName2 = Auth::user()->name.substr(uniqid(rand(), true), 7, 7).'.jpg';
        }

        $img = Image::make($image->getRealPath())->encode('webp', 50)->orientate();
        $imgReal = Image::make($image->getRealPath())->encode('jpg', 100)->orientate();
        $imgReal->stream();
        $img->stream(); // <-- Key point
        Storage::disk('public')->put('/avatars'.'/'.$avatarName, $img, 'public');
        $path = '/avatars/'.$avatarName;

        return $path;
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
