<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class UserLivewire extends Component
{
    use LivewireAlert;
    use  WithFileUploads;

    public $profile;

    public $view = false;

    //Edit
    public $username;

    public $about;

    public $avatar;

    public function render()
    {
        return view('livewire.user-livewire');
    }

    public function mount($userID)
    {
        $this->profile = User::where('id', $userID)->firstOrFail();
        $this->username = $this->profile->slug;
    }

    public function updateProfile()
    {
        $this->validate([
            'avatar' => 'max:9500kb'
        ]);
        $user = User::find(Auth::user()->user->id);

        if ($this->avatar) {
            $user->avatar = self::uploadImage($this->avatar);
        }

        if ($this->cover) {
            $user->cover = self::uploadImage($this->cover);
        }

        $slug = $this->username;

        while (User::where('slug', $slug)->first()) {
            $partes = explode('-v', $slug);
            if (isset($partes[1]) == true) {
                $nuevonumero = $partes[1] + 1;
                $slug = $partes[0].'-v'.$nuevonumero;
            } else {
                $slug = $slug.'-v1';
            }
        }

        //Si el username  es igual al Slug actual del frelancer quiere decir que no lo modifico y
        //por tanto solo lo guardaremos si es diferente
        if (! $slug == Auth::user()->user->slug) {
            $user->slug = $slug;
        }
        $user->description = $this->description;
        $user->update();
        $this->alerta('sendAlert', 'Perfil actualizado correctamente', 'top-end');
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
