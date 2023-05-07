<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    use HasFactory;

    // Filter posts
    public function scopeFilter($query, array $filters) {
        // Filter by tags
        if (isset($filters["tag"])) {
            $tags = explode(",", $filters["tag"]);

            $query->where(function ($query) use ($tags) {
                foreach ($tags as $tag) {
                    $query->orWhere("tags", "like", "%" . $tag . "%");
                }
            });
        }

        // Filter by category
        if (isset($filters["category"])) {
            $cats = explode(",", $filters["category"]);

            $query->whereIn("category", $cats);
        }
    }
}
