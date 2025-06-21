<?php
namespace App\Services;

use App\Traits\HydratesProps;
use Illuminate\Support\Facades\Hash;

class UserDTO
{
    use HydratesProps;

    public ?string $email = null;
    public ?string $fio = null;
    public ?string $password = null;
    public ?int $age = null;
    public ?string $phone = null;
    public ?string $gender = null;

    public static function fromRequest($request): UserDTO
    {
        return (new self())->hydrate($request->all());
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'fio' => $this->fio,
            'password' => Hash::make($this->password) ,
            'sex' => $this->gender,
            'age' => $this->age,
            'phone' => $this->phone,
        ];
    }
}
