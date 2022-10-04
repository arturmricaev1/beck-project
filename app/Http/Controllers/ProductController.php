<?php
    
namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Discount;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Intervention\Image\Facades\Image;
    
class ProductController extends Controller { 
    /**
     * Отобразить список ресурсов.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct() {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Отобразить список ресурсов.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = Product::latest()->simplePaginate(5);
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Отобразить форму для создания нового ресурса.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user) {
        return view('products.create');
    }
    
    /**
     * Поместить только что созданный ресурс в хранилище.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $user = auth()->user()->id;

        $request->request->add(['user_id' => $user]); //add request
        $data = $request->all();
        
        $discount = $request->discount;
        $filename = $data['image']->getClientOriginalName();

        $data['image']->move(public_path().'/image/news/origin/', $filename);
        $thumbnail = Image::make(public_path().'/image/news/origin/'.$filename);
        $thumbnail->fit(150, 150);
      
        $thumbnail->save(public_path().'/image/news/thumbnail/'.$filename);
        $data['image'] = $filename;
      
        Product::create($data);
        $validator = FacadesValidator::make($request->all(), [
            'file' => 'max:5120', //5MB 
        ]);
 
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }
    
    /**
     * Отобразить указанный ресурс.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product) {
        return view('products.show',compact('product'));
    }
    
    /**
     * Отобразить форму для редактирования указанного 
     * ресурса.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product) {
        return view('products.edit',compact('product'));
    }
    
    /**
     * Обновить указанный ресурс в хранилище.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product) {
        $validatedData = $request->validated();
        $product->update($validatedData);
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }
    
    /**
     * Удалить указанный ресурс из хранилища.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product) {
        $product->delete();
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}