<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Register\RegisterUserRequest;
use App\Http\Requests\Login\LoginUserRequest;
use App\Interfaces\Registration\RegistrationRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;

class MainController extends Controller
{
    private RegistrationRepositoryInterface $registrationRepository;
    private ProductRepositoryInterface $productRepository;
    public function __construct(RegistrationRepositoryInterface $registrationRepository,ProductRepositoryInterface $productRepository)
    {
        $this->registrationRepository = $registrationRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $allProducts = $this->productRepository->getAllProducts();
        $newArrival = $this->productRepository->getProductByCategory('new-arrivals');
        $hotSale = $this->productRepository->getProductByCategory('sale');
        return view('index',compact('allProducts','newArrival','hotSale'));
    }

    public function cart()
    {
        return view('cart');
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function shop()
    {
        return view('shop');
    }

    public function singleProduct($id)
    {
        $product = $this->productRepository->getProductById($id);
        return view('single-product',compact('product'));
    }

    public function register()
    {
        return view('register');
    }

    public function registerUser(RegisterUserRequest $request)
    {
        $user = $this->registrationRepository->registerUser($request);
        if (isset($user->id)) {
            return redirect()->route('login')->withFlashSuccess('Congratulations! Your account has been created successfully.');
        }
        return redirect()->route('register')->withFlashDanger('Failed to create account! Please try again later.');
    }

    public function login()
    {
        return view('login');
    }

    public function loginUser(LoginUserRequest $request)
    {
        $user = $this->registrationRepository->LoginUser($request);
        if (!empty($user)) {
            session()->put('id',$user->id);
            session()->put('type',$user->type);
            return redirect()->route('index');
        }
        return redirect()->route('login')->withFlashDanger('Invalid credentials.');
    }

    public function logout()
    {
        session()->forget('id');
        session()->forget('type');
        return redirect()->route('login')->withFlashSuccess('Logout successfully.');
    }
}
