<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cost;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index()
    {
        $costCenters = Cost::distinct('detail_cost_center')->pluck('detail_cost_center');
        return view('auth.register', compact('costCenters'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required',
            'role' => 'required',
        ]);

        // Buat pengguna dengan data yang diberikan
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'chain' => $request->password,
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role'], // Menggunakan nilai 'role' dari input
        ]);

        // User::create($validatedData);

        return redirect('/login')->with('success', 'Registration Successful! Please Login');
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            // 'username' => ['required', 'string', 'max:64'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required'],
        ]);
    }

    public function create(array $data)
    {
        if ($data['password'] == $data['password_repeat']) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => $data['role'],
            ]);
        }
    }
}
