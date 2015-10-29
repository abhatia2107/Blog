<?php 

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blogs';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'category_id', 'radio', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'details'];

}
