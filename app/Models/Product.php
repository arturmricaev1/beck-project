<?php
  
namespace App\Models;



use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class Product extends Model {
    use HasFactory;

    protected $guarded = []; 
    protected $table = 'products';
    protected $fillable = [
        'name',
        'detail',
        'image',
        'price',
        'user_id',
        'code'
    ];
    protected $appends = [
        'is_favorite'
    ];
    
    public function render($request, Exception $exception) {
    if ($exception instanceof \Symfony\Component\HttpFoundation\File\Exception\FileException) {
        // create a validator and validate to throw a new ValidationException
        return FacadesValidator::make($request->all(), [
            'your_file_input' => 'required|file|size:9000',
        ])->validate();
    }
    return parent::render($request, $exception);
    }

    public function users() {
        return $this->belongsToMany(User::class, 'user_product');
    }

     /**
     * Связь «многие ко многим» таблицы `products` с таблицей `baskets`
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    // public function discounts (){
    //     return $this->hasOne(Discount::class);
    // }

    public function baskets() {
        return $this->belongsToMany(Basket::class);
    }


    public function getIsFavoriteAttribute(){
        return $this->users->contains(Auth::id());
    }
}
