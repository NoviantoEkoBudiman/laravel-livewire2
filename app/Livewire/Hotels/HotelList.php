<?php

namespace App\Livewire\Hotels;

use App\Models\Hotel;
use Illuminate\Console\View\Components\Error;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class HotelList extends Component
{
    #[Title('Hotels')]
    public $hotels;
    public $hotel_id;
    // #[Validate("required")]
    public $name;
    public $address;
    public $phone;
    public $email;
    public $check_in_time;
    public $check_out_time;
    public $stars;
    public $update_status = false;

    public function mount()
    {
        if (!auth()->check()) {
            return redirect("/login");
        }
    }
    
    public function render()
    {
        $this->hotels = Hotel::get();
        return view('livewire.hotels.hotel-list');
    }

    function store()
    {
        try {
            $rules = [
                "name"              =>  "required",
                "address"           =>  "required",
                "phone"             =>  "required",
                "email"             =>  "required|email|unique:hotels",
                "check_in_time"     =>  "required|date_format:H:i",
                "check_out_time"    =>  "required|date_format:H:i",
                "stars"             =>  "required"
            ];
            $messages = [
                "name.required"             =>  "Nama wajib diisi",
                "address.required"          =>  "Alamat wajib diisi",
                "phone.required"            =>  "No. Telepon wajib diisi",
                "email.required"            =>  "Email wajib diisi",
                "email.email"               =>  "Format email salah",
                "email.unique"              =>  "Email sudah dipakai",
                "check_in_time.required"    =>  "Check in time wajib diisi",
                "check_out_time.required"   =>  "Check out time wajib diisi",
                "stars.required"            =>  "Stars wajib diisi",
            ];
            $this->validate($rules, $messages);
            $save = [
                "name"              =>  $this->name,
                "address"           =>  $this->address,
                "phone"             =>  $this->phone,
                "email"             =>  $this->email,
                "check_in_time"     =>  $this->check_in_time,
                "check_out_time"    =>  $this->check_out_time,
                "stars"             =>  $this->stars,
            ];
            $save = Hotel::create($save);
            $this->dispatch("alert",message:"Data saved successfully");
            $this->dispatch('close-modal');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->dispatch('open-modal');
            throw $e;
        }
    }

    function closeModal()
    {
        $this->name             = null;
        $this->address          = null;
        $this->phone            = null;
        $this->email            = null;
        $this->check_in_time    = null;
        $this->check_out_time   = null;
        $this->stars            = null;
        $this->resetErrorBag();
    }

    function edit($id)
    {
        $data = Hotel::find($id);
        $this->hotel_id         = $id;
        $this->name             = $data->name;
        $this->address          = $data->address;
        $this->phone            = $data->phone;
        $this->email            = $data->email;
        $this->check_in_time    = $data->check_in_time;
        $this->check_out_time   = $data->check_out_time;
        $this->stars            = $data->stars;
        $this->update_status    = true;
    }

    function update()
    {
        try{
            $hotel = Hotel::find($this->hotel_id);
            $rules = [
                "name"              =>  "required",
                "address"           =>  "required",
                "phone"             =>  "required",
                "email"             =>  "required|email|unique:hotels,email,".$this->hotel_id,
                "check_in_time"     =>  "required|date_format:H:i:s",
                "check_out_time"    =>  "required|date_format:H:i:s",
                "stars"             =>  "required"
            ];
            $messages = [
                "name.required"             =>  "Nama wajib diisi",
                "address.required"          =>  "Alamat wajib diisi",
                "phone.required"            =>  "No. Telepon wajib diisi",
                "email.required"            =>  "Email wajib diisi",
                "email.email"               =>  "Format email salah",
                "email.unique"              =>  "Email sudah dipakai",
                "check_in_time.required"    =>  "Check in time wajib diisi",
                "check_out_time.required"   =>  "Check out time wajib diisi",
                "stars.required"            =>  "Stars wajib diisi",
            ];
            $validate = $this->validate($rules, $messages);
            $update = [
                "name"              =>  $this->name,
                "address"           =>  $this->address,
                "phone"             =>  $this->phone,
                "email"             =>  $this->email,
                "check_in_time"     =>  $this->check_in_time,
                "check_out_time"    =>  $this->check_out_time,
                "stars"             =>  $this->stars,
            ];
            $hotel->update($update);
            $this->dispatch("alert",message:"Data updated successfully");
            $this->closeModal();
            $this->hotel_id = null;
        }catch(Error $e){
            throw $e; // lempar error supaya bisa ditampilkan di view
        }
    }

    function setId($id)
    {
        $this->hotel_id = $id;
    }

    function delete()
    {
        $data = Hotel::find($this->hotel_id);
        $data->delete();
        $this->dispatch("alert", message:"Data has been deleted");
    }
}
