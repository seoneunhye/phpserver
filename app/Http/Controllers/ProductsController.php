<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductsController extends Controller
{
    // 제품 목록 가져오기
    public function index()
    {
        $products = Product::all(); // Product 모델에 있는 테이블에 있는 모든 상품 조회
        return response()->json($products);
    }

    // 제품 개별 목록 가져오기
    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json($product);
    }

    // 새 상품 추가(상품 등록하고 해시태그와 연결한다)
    public function store(ProductRequest $request)
    {
        $validatedData = $request->validate();
        $product = Product::create($validatedData);

        return response()->json($product, 201);
    }

    // 제품 정보 수정
    public function update(ProductRequest $request, $id)
    {
        // 유효성 검사
        $validatedData = $request->validate();

        // 제품 찾기, 없으면 404 응답
        $product = Product::findOrFail($id);

        // 제품 정보 업데이트
        $product->update($validatedData);

        // 업데이트된 제품 정보 반환
        return response()->json($product, 200);
    }

    // 제품 삭제
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => '상품이 성공적으로 삭제되었습니다.']);
    }
}
