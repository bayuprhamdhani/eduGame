<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::all();
        $types = Type::all();
        return view('questions.index', compact ('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();        
        return view('questions.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'questions' => 'required|array|min:1',
            'questions.*' => 'required|string',
            'times' => 'required|array|min:1',
            'times.*' => 'required|integer',
            'answers' => 'required|array|min:1',
            'answers.*' => 'required|string',
            'type' => 'required',
            'user' => 'required'
        ]);
    
        // Dapatkan user_id yang sedang login
        $userId = auth()->user()->id;
    
        // Cek apakah user ini sudah pernah mengisi soal sebelumnya
        $lastLesson = Question::where('user', $userId)->max('lesson'); // Mencari nilai lesson terakhir yang diisi oleh user tersebut
        $lesson = $lastLesson ? $lastLesson + 1 : 1; // Tentukan lesson berikutnya berdasarkan max lesson yang ada
    
        // Menyimpan data soal baru ke database
        foreach ($request->questions as $index => $question) {
            Question::create([
                'question' => $question,
                'time' => (int) $request->times[$index],  // Mengubah menjadi integer
                'answer' => $request->answers[$index],
                'type' => $request->type,
                'user' => $request->user,
                'lesson' => $lesson, // Menambahkan nilai lesson
            ]);
        }
    
        // Mengarahkan kembali ke halaman dashboard setelah berhasil
        return redirect()->route('dashboard')->withSuccess('Great! You have Successfully Created');
    }
    
    
    
    
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $product_types = ProductType::all();
        return view('products.edit', compact('product_types', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required',
            'qty' => 'required',
            'selling_price' => 'required',
            'buying_price' => 'required',
            'product_type' => 'required',
        ]);

        $product->product_name = $request->product_name;
        $product->qty = $request->qty;
        $product->selling_price = $request->selling_price;
        $product->buying_price = $request->buying_price;
        $product->product_type_id = $request->product_type;
        $product->save();

        return redirect()->route('products.index')->withSuccess('Great! You have sucessfully Update '.$product->product_name);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->withSuccess('Great! You have sucessfully Deleted '.$product->product_name);
    }
}