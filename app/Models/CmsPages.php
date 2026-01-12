<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CmsPages extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $table = 'cms_pages';
            protected $fillable = [
                'page_title',
                'slug',
                'content',       // keep if still used
                'section_one',
                'section_two',
                'section_three',
            ];
            }
