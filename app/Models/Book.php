<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['isbn', 'title', 'year', 'field_id', 'hall_id', 'author'];

    protected $searchable = [
        'isbn', 'title', 'year',
        'field.code', 'field.discipline',
        // 'hall.name', 'hall.description',
        'author'
    ];

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }

    public function scopeSearch(Builder $builder, string $term = '')
    {
        foreach ($this->searchable as $searchable) {

            if (str_contains($searchable, '.')) {
                $relation = Str::beforeLast($searchable, '.');
                $column = Str::afterLast($searchable, '.');
                $builder->orWhereRelation($relation, $column, 'like', "%$term%");
                continue;
            }
            $builder->orWhere($searchable, 'like', "%$term%");
        }

        return $builder;
    }
}
