<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{

    protected $fillable = ['image', 'title', 'content','deskripsi', 'slug'];

    // Menyimpan slug otomatis ketika membuat atau memperbarui berita
    public static function boot()
    {
        parent::boot();

        // Menggunakan event 'creating' untuk membuat slug otomatis sebelum berita disimpan
        static::creating(function ($news) {
            // Membuat slug dari judul jika slug tidak ada
            if (empty($news->slug)) {
                $news->slug = Str::slug($news->title);
            }

            // Menangani duplikasi slug
            $slug = $news->slug;
            $originalSlug = $slug;
            $count = 1;

            // Periksa apakah slug sudah ada, jika ya, tambahkan angka di belakang slug
            while (News::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            // Set slug yang unik
            $news->slug = $slug;
        });
    }

    use HasFactory;
}
