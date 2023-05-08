<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    use HasFactory;

    protected $fillable = [
        "category",
        "tags",
        "image_url",
        "title",
        "intro_text",
        "content",
    ];

    // Tag relation
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    // Filter posts
    public function scopeFilter($query, array $filters) {
        // Filter by search
        if (isset($filters["search"])) {
            $query->where(function ($query) use ($filters) {
                $query
                    ->where("title", "like", "%" . $filters["search"] . "%")
                    ->orWhere(
                        "intro_text",
                        "like",
                        "%" . $filters["search"] . "%"
                    )
                    ->orWhere(
                        "content",
                        "like",
                        "%" . $filters["search"] . "%"
                    );
            });
        }

        // Filter by tags
        if (isset($filters["tag"])) {
            $tags = explode(",", $filters["tag"]);

            $query->whereHas('tags', function ($query) use ($tags) {
                $query->whereIn('name', $tags);
            });
        }

        // Filter by category
        if (isset($filters["category"])) {
            $cats = explode(",", $filters["category"]);
            $query->whereIn("category", $cats);
        }
    }
}
