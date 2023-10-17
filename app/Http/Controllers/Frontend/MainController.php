<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Register\RegisterUserRequest;
use App\Http\Requests\Login\LoginUserRequest;
use App\Interfaces\Registration\RegistrationRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\CartRepositoryInterface;
use App\Interfaces\OrderRepositoryInterface;

class MainController extends Controller
{
    private RegistrationRepositoryInterface $registrationRepository;
    private ProductRepositoryInterface $productRepository;
    private CartRepositoryInterface $cartRepository;
    private OrderRepositoryInterface $orderRepository;
    public function __construct(
        RegistrationRepositoryInterface $registrationRepository,
        ProductRepositoryInterface $productRepository,
        CartRepositoryInterface $cartRepository,
        OrderRepositoryInterface $orderRepository)
    {
        $this->registrationRepository = $registrationRepository;
        $this->productRepository = $productRepository;
        $this->cartRepository = $cartRepository;
        $this->orderRepository = $orderRepository;
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
        $cartItems = $this->cartRepository->getCartItems();
        return view('cart',compact('cartItems'));
    }

    public function checkout(Request $request)
    {
        if(session()->has('id'))
        {
            $orderItem = $this->orderRepository->orderItems($request);
            if (isset($orderItem->id)) {
                return redirect()->back()->withFlashSuccess('Congratulations! Your order has been placed successfully.');
            }
            return redirect()->back()->withFlashDanger('Failed to place your order! Please try again later.');
        }else{
            return redirect()->route('login')->withFlashDanger('Please Login to your account.');
        }
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

    public function addToCart(Request $request)
    {
        if(session()->has('id'))
        {
            $cart = $this->cartRepository->saveCartItems($request);
            if (isset($cart->id)) {
                return redirect()->back()->withFlashSuccess('Congratulations! Item added into cart.');
            }
            return redirect()->back()->withFlashDanger('Failed to add item! Please try again later.');
        }else{
            return redirect()->route('login')->withFlashDanger('Please Login to your account.');
        }        
    }

    public function updateCartItem(Request $request)
    {
        if(session()->has('id'))
        {
            $cart = $this->cartRepository->updateCartItems($request);
            if ($cart != 0) {
                return redirect()->back()->withFlashSuccess('Congratulations! Item updated into cart.');
            }
            return redirect()->back()->withFlashDanger('Failed to update item! Please try again later.');
        }else{
            return redirect()->route('login')->withFlashDanger('Please Login to your account.');
        }
    }

    public function deleteCartItem(string $id)
    {
        $cartItems = $this->cartRepository->deleteCartItem($id);
        return redirect()->back()->withFlashSuccess('Item deleted from cart successfully.');
    }
}
