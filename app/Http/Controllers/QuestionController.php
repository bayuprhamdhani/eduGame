<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;
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
        // Mengambil ID user yang sedang login
        $userId = auth()->id();
        
        // Mengambil data soal yang hanya milik user yang sedang login dan mengelompokkan berdasarkan lesson
        $questions = Question::where('user', $userId)->get()->groupBy('lesson');
        
        return view('questions.index', compact('questions'));
    }

    public function print()
    {
        // Mengambil semua data soal dan mengelompokkan berdasarkan lesson
        $soals = Question::all();
        return view('kartu', compact('soals'));
    }

    public function simulation(Request $request)
    {
        // Mengambil data dari query string
        $question = $request->query('question');
        $time = $request->query('time');
        $answer = $request->query('answer');
        $chalenge = $request->query('chalenge'); // Pastikan chalenge diterima
    

    
        // Pass data ke view
        return view('questions.simulation', compact('question', 'time', 'answer', 'chalenge'));
    }
    

    public function preview($lesson)
    {
        // Mengambil ID user yang sedang login
        $userId = auth()->id();
        
        // Mengambil semua soal berdasarkan lesson yang diklik dan sesuai dengan user yang login
        $questions = Question::where('lesson', $lesson)->where('user', $userId)->get();
        
        // Jika tidak ada data, kembalikan ke index dengan pesan error
        if ($questions->isEmpty()) {
            return redirect()->route('questions.index')->with('error', 'Lesson not found or no questions available for this user.');
        }
        
        return view('questions.preview', compact('questions', 'lesson'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();        
        $answers = Answer::all();        
        return view('questions.create', compact('types','answers'));
    }

    public function create2()
    {
        $types = Type::all();        
        return view('questions.create2', compact('types'));
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
        return redirect()->route('index')->withSuccess('Great! You have Successfully Created');
    }
    
    public function store2(Request $request)
    {
        // Validasi input
        $request->validate([
            'questions' => 'required|array|min:1',
            'questions.*' => 'required|string',
            'times' => 'required|array|min:1',
            'times.*' => 'required|integer',
            'answers' => 'required|array|min:1',
            'answers.*' => 'required|string',
            'chalenges' => 'required|array|min:1',
            'chalenges.*' => 'required|string',
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
                'chalenge' => $request->chalenges[$index],
                'type' => $request->type,
                'user' => $request->user,
                'lesson' => $lesson, // Menambahkan nilai lesson
            ]);
        }
    
        // Mengarahkan kembali ke halaman dashboard setelah berhasil
        return redirect()->route('index')->withSuccess('Great! You have Successfully Created');
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