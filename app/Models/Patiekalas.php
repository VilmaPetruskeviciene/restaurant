<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Patiekalas extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'price', 'restoranas_id'];

    const SORT_SELECT = [
        ['price_asc', 'Price 1 - 9'],
        ['price_desc', 'Price 9 - 1'],
    ];

    public function getRestoranas()
    {
       return $this->belongsTo(Restoranas::class, 'restoranas_id', 'id');
    }

    public function getPhotos()
    {
        return $this->hasMany(PatiekalasImage::class, 'patiekalas_id', 'id');
    }

    public function lastImageUrl()
    {
        return $this->getPhotos()->orderBy('id', 'desc')->first()->url;
    }

    public function addImages(?array $photos) : self
    {
        if ($photos) {
            $patiekalasImage = [];
            $time = Carbon::now();
            foreach($photos as $photo) {
                $ext = $photo->getClientOriginalExtension();
                $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
                $file = $name. '-' . rand(100000, 999999). '.' . $ext;
                $photo->move(public_path().'/images', $file);
                $patiekalasImage[] = [
                    'url' => asset('/images') . '/' . $file, 
                    'patiekalas_id' => $this->id,
                    'created_at' => $time,
                    'updated_at' => $time
                ];
            }
            PatiekalasImage::insert($patiekalasImage);
        }
        return $this;
    }

    public function removeImages(?array $photos) : self
    {
        if ($photos) {
            $toDelete = PatiekalasImage::whereIn('id', $photos)->get();
            foreach ($toDelete as $photo) {
                $file = public_path().'/images/' .pathinfo($photo->url, PATHINFO_FILENAME).'.'.pathinfo($photo->url, PATHINFO_EXTENSION);
                if (file_exists($file)) {
                    unlink($file);
                }
            }
            PatiekalasImage::destroy($photos);
        }
        return $this;
    }

}
