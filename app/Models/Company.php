<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'email', 'website'];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}

/*
Company::all()
Company::take(3)->get()
Company::first()
Company::find(1)
Company::find([1, 2, 3])
Company::where('website', 'kreiger.net')->first()
Company::whereWebsite('kreiger.net')->first()
$company->delete()
Company::destroy(11)
Company::destroy([11, 13, 22])

# Mass assignment

## Create Company

$data = [
    'name' => 'Company 3',
    'address' => 'Address Company 3',
    'email' => 'test@company3.com',
    'website' => 'https://www.company3.com',
    'contact' => 'contact company 3'
];
Company::create(data)

### Update

$company = Company::first()
$company->update($data)
*/