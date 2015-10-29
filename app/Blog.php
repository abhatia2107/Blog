<?php 

namespace Blog;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{

    use SoftDeletes;
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
    protected $fillable = ['title', 'category_id', 'radio', 'b1', 'b2', 'b3', 'b4', 'b5', 'b6', 'details', 'user_id'];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    /**
     * Attributes that should be checked before storing data in database.
     *
     * @var array
     */

    public static $rules=[
        'title'=>'required',
        'category_id'=>'required',
        'radio'=>'required',
        'details'=>'required',
    ];
}
