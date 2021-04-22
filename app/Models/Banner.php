<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;


class Banner extends Model implements HasMedia
{
    use HasMediaTrait;
    use HasFactory;
      protected $table='banners';
      protected $fillable = ['id','title','url','location','status','heading','subHeading','content'];
}

