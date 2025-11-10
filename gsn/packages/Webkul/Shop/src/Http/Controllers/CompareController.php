<?php

namespace Webkul\Shop\Http\Controllers;

use Webkul\Attribute\Repositories\AttributeFamilyRepository;
use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Product\Repositories\ProductRepository;

class CompareController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected AttributeFamilyRepository $attributeFamilyRepository,
        protected AttributeRepository $attributeRepository,
        protected ProductRepository $productRepository
    ) {}

    /**
     * Address route index page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('shop::compare.index');
    }
}
