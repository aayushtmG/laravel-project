<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    protected $fillable=[
        'logo',
        'banner_image',
        'toll_free_number',
        'address',
        'company_email',
        'company_name',
        'company_introduction',
        'home_slider_images',
        'organization_members',
        'organization_staffs',
        'organization_branches',
        'organization_savings',
        'organization_loans',
        'organization_shares',
    ];
}
