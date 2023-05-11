<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model {
    use HasFactory;

    protected $fillable = [
        "user_id",
        "category_id",
        "image",
        "title",
        "intro_text",
        "content",
    ];

    // User relation
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Category relation
    public function category() {
        return $this->belongsTo(Category::class);
    }

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

            $query->whereHas("category", function ($query) use ($cats) {
                $query->whereIn("name", $cats);
            });
        }
    }
}
