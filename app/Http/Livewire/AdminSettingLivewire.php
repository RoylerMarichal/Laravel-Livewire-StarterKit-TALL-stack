<?php

namespace App\Http\Livewire;

use App\Models\Cycle;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AdminSettingLivewire extends Component
{
    use WithFileUploads;
    //General
    public $register, $setting, $name, $currency;
    //Visual
    public $logo,$favicon,$titleOne,$subtitleOne;
    //Invoicing
    public $qvapay,$appSecret,$appId,$manual,$card,$cardInfo,$enzona,$enzonack,$enzonacs,$stripe,$stripeKey,$stripeSecret;
    //Modules
    public $moduleStats;

    public function render()
    {
       return view('livewire.admin-setting-livewire');
    }

    public function mount()
    {
        $setting = Setting::first();
        if ($setting) {
            $this->register = $setting->register_open;
            $this->name = $setting->app_name;
            $this->card = $setting->card_manual;
            $this->currency = $setting->currency;
            $this->logo = $setting->logo;
            $this->favicon = $setting->favicon;
            $this->setting = $setting;
            $this->qvapay=$this->setting->qvapay ?? false;
            $this->appSecret=$this->setting->qvapay_app_secret ?? Null;
            $this->appId=$this->setting->qvapay_app_id ?? Null;
            $this->manual=$this->setting->manual ?? false;
            $this->enzona=$this->setting->enzona ?? false;
            $this->enzona=$this->setting->enzona ?? false;
            $this->enzonack=$this->setting->enzona_client_key ?? Null;
            $this->enzonacs=$this->setting->enzona_client_secret ?? Null;
            $this->cardInfo=$this->setting->card_manual_info ?? false;
            $this->subtitleOne=$this->setting->subtitle_one;
            $this->titleOne=$this->setting->title_one;
            $this->stripe=$this->setting->stripe ?? Null;
            $this->stripeKey=$this->setting->stripe_app_key ?? Null;
            $this->stripeSecret=$this->setting->stripe_app_secret ?? Null;
            //Modules
            $this->moduleStats=$this->setting->module_stats_system;
        }
    }
    public function changeRegister()
    {
        $this->register = !$this->register;
        $this->setting->register_open = $this->register;
        $this->setting->update();
    }

    public function changeStats()
    {
        $this->moduleStats = !$this->moduleStats;
        $this->setting->module_stats_system = $this->moduleStats;
        $this->setting->update();
    }

    public function changeManual()
    {
        $this->manual = !$this->manual;
        $this->setting->manual = $this->manual;
        $this->setting->update();
    }

    public function changeEnzona()
    {
        $this->enzona = !$this->enzona;
        $this->setting->enzona = $this->enzona;
        $this->setting->update();
    }

    public function changeStripe()
    {
        $this->stripe = !$this->stripe;
        $this->setting->stripe = $this->stripe;
        $this->setting->update();
    }


    public function updatedEnzonack(){
        $this->setting->enzona_client_key = $this->enzonack;
        $this->setting->update();
        $this->sendAlert('success', 'Updated', 'top-end');
    }

    public function updatedEnzonacs(){
        $this->setting->enzona_client_secret = $this->enzonacs;
        $this->setting->update();
        $this->sendAlert('success', 'Updated', 'top-end');
    }


    public function updatedStripeKey(){
        $this->setting->stripe_app_key = $this->stripeKey;
        $this->setting->update();
        config(['app.STRIPE_KEY' => $this->stripeKey]);
        $this->sendAlert('success', 'Updated', 'top-end');
    }

    public function updatedStripeSecret(){
        $this->setting->stripe_app_secret = $this->stripeSecret;
        $this->setting->update();
        config(['app.STRIPE_SECRET' => $this->stripeSecret]);
        $this->sendAlert('success', 'Updated', 'top-end');
    }


    public function changeQvapay()
    {
        $this->qvapay = !$this->qvapay;
        $this->setting->qvapay = $this->qvapay;
        $this->setting->update();

    }


    public function updatedCard(){
        $this->setting->card_manual = $this->card;
        $this->setting->update();
        $this->sendAlert('success', 'Updated', 'top-end');
    }


    public function updatedCardInfo(){
        $this->setting->card_manual_info = $this->cardInfo;
        $this->setting->update();
        $this->sendAlert('success', 'Updated', 'top-end');
    }

    public function updatedTitleOne(){
        $this->setting->title_one = $this->titleOne;
        $this->setting->update();
        $this->sendAlert('success', 'Updated', 'top-end');
    }

    public function updatedSubtitleOne(){
        $this->setting->subtitle_one = $this->subtitleOne;
        $this->setting->update();
        $this->sendAlert('success', 'Updated', 'top-end');
    }


    public function updatedAppId(){
        $this->setting->qvapay_app_id = $this->appId;
        $this->setting->update();
        $this->sendAlert('success', 'Updated', 'top-end');
    }

    public function updatedAppSecret(){
        $this->setting->qvapay_app_secret = $this->appSecret;
        $this->setting->update();
        $this->sendAlert('success', 'Updated', 'top-end');
    }

    public function updatedName(){
        $this->validate([
            'name'=>'string|max:200'
        ]);
        $this->setting->app_name = $this->name;
        $this->setting->update();
        $this->sendAlert('success', 'Nombre Updated correctamente', 'top-end');
    }


    public function updatedCurrency(){
        $this->validate([
            'currency'=>'string|max:20'
        ]);
        $this->setting->currency = $this->currency;
        $this->setting->update();
        $this->sendAlert('success', 'Moneda actualizada correctamente', 'top-end');
    }



    public function updatedLogo()
    {
        $this->setting->logo = $this->uploadImage($this->logo);
        $this->setting->update();

        $this->sendAlert('success', 'Logo Updated correctamente', 'top-end');
    }

    public function updatedFavicon()
    {

        $this->setting->favicon = $this->uploadImage($this->favicon);
        $this->setting->update();

        $this->sendAlert('success', 'Favicon Updated correctamente', 'top-end');
    }

    public static function uploadImage($path)
    {
        $image = $path;
        if (Auth::check()) {
            $avatarName =  Auth::user()->name . substr(uniqid(rand(), true), 7, 7) . '.webp';
            $avatarName2 =  Auth::user()->name . substr(uniqid(rand(), true), 7, 7) . '.jpg';
        } else {
            $avatarName =  'invitado' . substr(uniqid(rand(), true), 7, 7) . '.webp';
            $avatarName2 =  Auth::user()->name . substr(uniqid(rand(), true), 7, 7) . '.jpg';
        }

        $img = Image::make($image->getRealPath())->encode('webp', 50)->orientate();
        $imgReal = Image::make($image->getRealPath())->encode('jpg', 100)->orientate();
        $imgReal->stream();
        $img->stream(); // <-- Key point
        Storage::disk('public')->put('/settings' . '/' . $avatarName, $img, 'public');
        $path = '/settings/' . $avatarName;

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
