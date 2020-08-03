<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCompany extends Model
{
    protected $fillable = ['company_name', 'company_profile', 'company_business_description', 'representative_name', 'representative_phone_number', 'company_address', 'maximum_employees', 'hp_url', 'contact_email'];
}
