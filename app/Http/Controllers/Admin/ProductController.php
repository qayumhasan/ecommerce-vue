<?php

namespace App\Http\Controllers\Admin;

use App\Checkout;
use App\CustomarAccount;
use DB;
use Image;
use App\Product;
use App\CompareProduct;
use App\wishlist;
use Carbon\Carbon;
use App\ReSubCategory;
use App\ProductLicense;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OrderPlace;
use App\RefundReason;
use App\ReturnAllProduct;

use App\FlashDealDetail;
use App\ReturnProduct;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function producttype()
    {
        return view('admin.ecommerce.product.producttype');
    }
    public function digital()
    {
        return view('admin.ecommerce.product.digital');
    }
    public function license()
    {
        return view('admin.ecommerce.product.license');
    }
    public function affiliate()
    {
        return view('admin.ecommerce.product.affiliate');
    }
    public function index()
    {
        // $allproduct = Product::where('is_deleted', 0)->where('status', 1)->get();
        $allproduct = DB::table('products')
            ->join('categories', 'products.cate_id', '=', 'categories.id')
            ->select('products.*', 'categories.cate_name')
            ->where('products.is_deleted',0)
            ->OrderBy('products.id','DESC')
            ->get();
        return view('admin.ecommerce.product.all', compact('allproduct'));
    }

    public function add()
    {
        return view('admin.ecommerce.product.add');
    }

    public function resub($subcate_id)
    {
        $resub = ReSubCategory::where('subcate_id', $subcate_id)->get();
        return json_encode($resub);
    }

    public function sku_combination(Request $request)
    {
        $options = array();
        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
            $colors_active = 1;
            array_push($options, $request->colors);
        } else {
            $colors_active = 0;
        }

        $unit_price = $request->unit_price;
        $product_name = $request->product_name;

        if ($request->has('choice_no')) {
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_' . $no;
                $my_str = implode('|', $request[$name]);
                array_push($options, explode(',', $my_str));
            }
        }
        if ($request->has('colors_active') && $request->has('choice_no')) {
            $choice_count = count($request->choice_no);
            if ($choice_count == 0) {
                $combinations = Arr::crossJoin($options[0]);
                return view('admin.ecommerce.partials.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
            } elseif ($choice_count == 1) {
                $combinations = Arr::crossJoin($options[0], $options[1]);
                return view('admin.ecommerce.partials.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
            } elseif ($choice_count == 2) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2]);
                return view('admin.ecommerce.partials.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
            } elseif ($choice_count == 3) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2], $options[3]);
                return view('admin.ecommerce.partials.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
            } elseif ($choice_count == 4) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2], $options[3], $options[4]);
                return view('admin.ecommerce.partials.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
            } elseif ($choice_count == 5) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2], $options[3], $options[4], $options[5]);
                return view('admin.ecommerce.partials.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
            }
        } elseif ($request->has('colors_active')) {

            $combinations = Arr::crossJoin($options[0]);
            return view('admin.ecommerce.partials.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
        } elseif ($request->has('choice_no')) {
            $choice_count = count($request->choice_no);
            if ($choice_count == 1) {
                $combinations = Arr::crossJoin($options[0]);
                return view('admin.ecommerce.partials.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
            } elseif ($choice_count == 2) {
                $combinations = Arr::crossJoin($options[0], $options[1]);
                return view('admin.ecommerce.partials.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
            } elseif ($choice_count == 3) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2]);
                return view('admin.ecommerce.partials.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
            } elseif ($choice_count == 4) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2], $options[3]);
                return view('admin.ecommerce.partials.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
            } elseif ($choice_count == 5) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2], $options[3], $options[4]);
                return view('admin.ecommerce.partials.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
            }
        }
    }

    // product insert
    public function insert(Request $request)
    {

        $proname=$request->product_name;
        $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $proname);
        //return $request;
        $this->validate($request, [
            'product_name' => 'required',
            'product_type' => 'required',
            'product_sku' => 'required',
            'unit_price' => 'required',
            'cate_id' => 'required',
            'product_qty' => 'required|numeric',

            'thumbnail_img' => 'required'

        ]);
        $product = new Product;
        $product->product_name = $request->product_name;
        $product->product_type = $request->product_type;
        $product->grug_type = $request->grug_type;
        $product->product_sku = $request->product_sku;
        $product->product_price = $request->unit_price;
        $product->cate_id = $request->cate_id;
        $product->subcate_id = $request->subcate_id;
        $product->resubcate_id = $request->resubcate_id;
        $product->brand = $request->brand;
        $product->product_qty = $request->product_qty;
        $product->allow_product_condition = $request->allow_product_condition;
        $product->product_condition = $request->product_condition;
        $product->allow_product_measurement = $request->allow_product_measurement;
        $product->product_measurement = $request->product_measurement;
        $product->product_description = $request->product_description;
        $product->buy_and_return_policy = $request->buy_and_return_policy;
        $product->shipping_time = $request->shipping_time;
        $product->meta_tag = $request->m_tag;
        $product->slug = $slug;
        $product->meta_description = $request->meta_description;
        $product->select_upload_type = $request->upload_type;
        $product->upload_link = $request->upload_link;
        $product->license_type = $request->license_type;
        $product->affiliate_link = $request->affiliate_link;
        $product->video = $request->video;
        // upload file
        if ($request->hasFile('pdf')) {
            $product->upload_file = $request->file('pdf')->store('public/uploads/products/file/');
        }
        // main image
        $photos = array();

        if ($request->hasFile('photos')) {
            foreach ($request->photos as $key => $photo) {
                $photoName = uniqid() . "." . $photo->getClientOriginalExtension();
                $resizedPhoto = Image::make($photo)->resize(600, 600)->save($photoName);
                Storage::disk('public')->put($photoName, $resizedPhoto);
                unlink($photoName);
                array_push($photos, $photoName);
                // $path = $photo->store('/');
                // array_push($photos,$path);
                //ImageOptimizer::optimize(base_path('public/').$path);
            }
            $product->photos = json_encode($photos);
        }
        // thumb image
        if ($request->hasFile('thumbnail_img')) {
            $image = $request->file('thumbnail_img');
            $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('public/uploads/products/thumbnail/' . $ImageName);
            Image::make($image)->resize(160, 160)->save('public/uploads/products/thumbnail/mobile/' . $ImageName);
            Image::make($image)->resize(120, 120)->save('public/uploads/products/thumbnail/smallthum/' . $ImageName);
            Image::make($image)->resize(600, 600)->save('public/uploads/products/thumbnail/productdetails/' . $ImageName);
            $product->thumbnail_img = $ImageName;
            Image::make($image)->resize(64, 64)->save('public/uploads/products/thumbnail/cartthum/' . $ImageName);
            $product->thumbnail_img = $ImageName;
        }

        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
            $product->colors = json_encode($request->colors);
        } else {
            $colors = array();
            $product->colors = json_encode($colors);
        }
        $choice_options = array();
        if ($request->has('choice')) {
            foreach ($request->choice_no as $key => $no) {
                $str = 'choice_options_' . $no;
                $item['name'] = 'choice_' . $no;
                $item['title'] = $request->choice[$key];
                $item['options'] = explode(',', implode('|', $request[$str]));
                array_push($choice_options, $item);
            }
        }
        $product->choice_options = json_encode($choice_options);
        // combination start
        $options = array();
        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
            $colors_active = 1;
            array_push($options, $request->colors);
        }

        if ($request->has('choice_no')) {
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_' . $no;
                $my_str = implode('|', $request[$name]);
                array_push($options, explode(',', $my_str));
            }
        }
        // if
        if ($request->has('colors_active') && $request->has('choice_no')) {
            $choice_count = count($request->choice_no);
            if ($choice_count == 0) {
                $combinations = Arr::crossJoin($options[0]);
                if (count($combinations[0]) > 0) {
                    foreach ($combinations as $key => $combination) {
                        $str = '';
                        foreach ($combination as $key => $item) {
                            if ($key > 0) {
                                $str .= '-' . str_replace(' ', '', $item);
                            } else {
                                if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                                    $color_name = \App\Color::where('color_code', $item)->first()->color_name;
                                    $str .= $color_name;
                                } else {
                                    $str .= str_replace(' ', '', $item);
                                }
                            }
                        }
                        $item = array();
                        $item['price'] = $request['price_' . str_replace('.', '_', $str)];
                        $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
                        $item['qty'] = $request['qty_' . str_replace('.', '_', $str)];
                        $variations[$str] = $item;
                    }
                }
            } elseif ($choice_count == 1) {
                $combinations = Arr::crossJoin($options[0], $options[1]);
                if (count($combinations[0]) > 0) {
                    foreach ($combinations as $key => $combination) {
                        $str = '';
                        foreach ($combination as $key => $item) {
                            if ($key > 0) {
                                $str .= '-' . str_replace(' ', '', $item);
                            } else {
                                if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                                    $color_name = \App\Color::where('color_code', $item)->first()->color_name;
                                    $str .= $color_name;
                                } else {
                                    $str .= str_replace(' ', '', $item);
                                }
                            }
                        }
                        $item = array();
                        $item['price'] = $request['price_' . str_replace('.', '_', $str)];
                        $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
                        $item['qty'] = $request['qty_' . str_replace('.', '_', $str)];
                        $variations[$str] = $item;
                    }
                }
            } elseif ($choice_count == 2) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2]);
                if (count($combinations[0]) > 0) {
                    foreach ($combinations as $key => $combination) {
                        $str = '';
                        foreach ($combination as $key => $item) {
                            if ($key > 0) {
                                $str .= '-' . str_replace(' ', '', $item);
                            } else {
                                if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                                    $color_name = \App\Color::where('color_code', $item)->first()->color_name;
                                    $str .= $color_name;
                                } else {
                                    $str .= str_replace(' ', '', $item);
                                }
                            }
                        }
                        $item = array();
                        $item['price'] = $request['price_' . str_replace('.', '_', $str)];
                        $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
                        $item['qty'] = $request['qty_' . str_replace('.', '_', $str)];
                        $variations[$str] = $item;
                    }
                }
            } elseif ($choice_count == 3) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2], $options[3]);
                if (count($combinations[0]) > 0) {
                    foreach ($combinations as $key => $combination) {
                        $str = '';
                        foreach ($combination as $key => $item) {
                            if ($key > 0) {
                                $str .= '-' . str_replace(' ', '', $item);
                            } else {
                                if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                                    $color_name = \App\Color::where('color_code', $item)->first()->color_name;
                                    $str .= $color_name;
                                } else {
                                    $str .= str_replace(' ', '', $item);
                                }
                            }
                        }
                        $item = array();
                        $item['price'] = $request['price_' . str_replace('.', '_', $str)];
                        $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
                        $item['qty'] = $request['qty_' . str_replace('.', '_', $str)];
                        $variations[$str] = $item;
                    }
                }
            } elseif ($choice_count == 4) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2], $options[3], $options[4]);
                if (count($combinations[0]) > 0) {
                    foreach ($combinations as $key => $combination) {
                        $str = '';
                        foreach ($combination as $key => $item) {
                            if ($key > 0) {
                                $str .= '-' . str_replace(' ', '', $item);
                            } else {
                                if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                                    $color_name = \App\Color::where('color_code', $item)->first()->color_name;
                                    $str .= $color_name;
                                } else {
                                    $str .= str_replace(' ', '', $item);
                                }
                            }
                        }
                        $item = array();
                        $item['price'] = $request['price_' . str_replace('.', '_', $str)];
                        $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
                        $item['qty'] = $request['qty_' . str_replace('.', '_', $str)];
                        $variations[$str] = $item;
                    }
                }
            } elseif ($choice_count == 5) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2], $options[3], $options[4], $options[5]);
                if (count($combinations[0]) > 0) {
                    foreach ($combinations as $key => $combination) {
                        $str = '';
                        foreach ($combination as $key => $item) {
                            if ($key > 0) {
                                $str .= '-' . str_replace(' ', '', $item);
                            } else {
                                if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                                    $color_name = \App\Color::where('color_code', $item)->first()->color_name;
                                    $str .= $color_name;
                                } else {
                                    $str .= str_replace(' ', '', $item);
                                }
                            }
                        }
                        $item = array();
                        $item['price'] = $request['price_' . str_replace('.', '_', $str)];
                        $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
                        $item['qty'] = $request['qty_' . str_replace('.', '_', $str)];
                        $variations[$str] = $item;
                    }
                }
            }
            $product->variations = json_encode($variations);
        } elseif ($request->has('colors_active')) {

            $combinations = Arr::crossJoin($options[0]);
            if (count($combinations[0]) > 0) {
                foreach ($combinations as $key => $combination) {
                    $str = '';
                    foreach ($combination as $key => $item) {
                        if ($key > 0) {
                            $str .= '-' . str_replace(' ', '', $item);
                        } else {
                            if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                                $color_name = \App\Color::where('color_code', $item)->first()->color_name;
                                $str .= $color_name;
                            } else {
                                $str .= str_replace(' ', '', $item);
                            }
                        }
                    }
                    $item = array();
                    $item['price'] = $request['price_' . str_replace('.', '_', $str)];
                    $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
                    $item['qty'] = $request['qty_' . str_replace('.', '_', $str)];
                    $variations[$str] = $item;
                }
            }
        } elseif ($request->has('choice_no')) {
            $choice_count = count($request->choice_no);
            if ($choice_count == 1) {
                $combinations = Arr::crossJoin($options[0]);
                if (count($combinations[0]) > 0) {
                    foreach ($combinations as $key => $combination) {
                        $str = '';
                        foreach ($combination as $key => $item) {
                            if ($key > 0) {
                                $str .= '-' . str_replace(' ', '', $item);
                            } else {
                                if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                                    $color_name = \App\Color::where('color_code', $item)->first()->color_name;
                                    $str .= $color_name;
                                } else {
                                    $str .= str_replace(' ', '', $item);
                                }
                            }
                        }
                        $item = array();
                        $item['price'] = $request['price_' . str_replace('.', '_', $str)];
                        $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
                        $item['qty'] = $request['qty_' . str_replace('.', '_', $str)];
                        $variations[$str] = $item;
                    }
                }
            } elseif ($choice_count == 2) {
                $combinations = Arr::crossJoin($options[0], $options[1]);
                if (count($combinations[0]) > 0) {
                    foreach ($combinations as $key => $combination) {
                        $str = '';
                        foreach ($combination as $key => $item) {
                            if ($key > 0) {
                                $str .= '-' . str_replace(' ', '', $item);
                            } else {
                                if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                                    $color_name = \App\Color::where('color_code', $item)->first()->color_name;
                                    $str .= $color_name;
                                } else {
                                    $str .= str_replace(' ', '', $item);
                                }
                            }
                        }
                        $item = array();
                        $item['price'] = $request['price_' . str_replace('.', '_', $str)];
                        $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
                        $item['qty'] = $request['qty_' . str_replace('.', '_', $str)];
                        $variations[$str] = $item;
                    }
                }
            } elseif ($choice_count == 3) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2]);
                if (count($combinations[0]) > 0) {
                    foreach ($combinations as $key => $combination) {
                        $str = '';
                        foreach ($combination as $key => $item) {
                            if ($key > 0) {
                                $str .= '-' . str_replace(' ', '', $item);
                            } else {
                                if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                                    $color_name = \App\Color::where('color_code', $item)->first()->color_name;
                                    $str .= $color_name;
                                } else {
                                    $str .= str_replace(' ', '', $item);
                                }
                            }
                        }
                        $item = array();
                        $item['price'] = $request['price_' . str_replace('.', '_', $str)];
                        $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
                        $item['qty'] = $request['qty_' . str_replace('.', '_', $str)];
                        $variations[$str] = $item;
                    }
                }
            } elseif ($choice_count == 4) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2], $options[3]);
                if (count($combinations[0]) > 0) {
                    foreach ($combinations as $key => $combination) {
                        $str = '';
                        foreach ($combination as $key => $item) {
                            if ($key > 0) {
                                $str .= '-' . str_replace(' ', '', $item);
                            } else {
                                if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                                    $color_name = \App\Color::where('color_code', $item)->first()->color_name;
                                    $str .= $color_name;
                                } else {
                                    $str .= str_replace(' ', '', $item);
                                }
                            }
                        }
                        $item = array();
                        $item['price'] = $request['price_' . str_replace('.', '_', $str)];
                        $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
                        $item['qty'] = $request['qty_' . str_replace('.', '_', $str)];
                        $variations[$str] = $item;
                    }
                }
            } elseif ($choice_count == 5) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2], $options[3], $options[4]);
                if (count($combinations[0]) > 0) {
                    foreach ($combinations as $key => $combination) {
                        $str = '';
                        foreach ($combination as $key => $item) {
                            if ($key > 0) {
                                $str .= '-' . str_replace(' ', '', $item);
                            } else {
                                if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                                    $color_name = \App\Color::where('color_code', $item)->first()->color_name;
                                    $str .= $color_name;
                                } else {
                                    $str .= str_replace(' ', '', $item);
                                }
                            }
                        }
                        $item = array();
                        $item['price'] = $request['price_' . str_replace('.', '_', $str)];
                        $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
                        $item['qty'] = $request['qty_' . str_replace('.', '_', $str)];
                        $variations[$str] = $item;
                    }
                }
            }
            $product->variations = json_encode($variations);
        }

        $product->save();

        // Product License:
        if ($request->license_key) {
            if (count($request->license_key) > 0) {
                foreach ($request->license_key as $item => $v) {
                    $data3 = array(
                        'product_id' => $product->id,
                        'license_key' => $request->license_key[$item],
                        'license_quantity' => $request->license_quantity[$item],
                        'license_duration' => $request->license_duration[$item],
                        'created_at' => Carbon::now()->toDateTimeString(),

                    );
                    ProductLicense::Insert($data3);
                }
            }
        }

        // end product licence

        if ($product->save()) {
            $notification = array(
                'messege' => 'Product Insert Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Product Insert Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // end insert
    public function updatetodaydeal(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->today_deal = $request->status;
        if ($product->save()) {
            return 1;
        }
        return 0;
    }


    public function updatepublished(Request $request)
    {
        $PRODUCTID=  $request->id;
        $product = Product::findOrFail($request->id);

        $flashdeal=FlashDealDetail::where('product_id',$PRODUCTID)->first();
        if($flashdeal){
          $flashdeal->update([
            'status'=>$request->status,
          ]);
        }



        $product->status = $request->status;

        if ($product->save()) {
            return 1;
        }
        return 0;
    }

    public function view($id)
    {
        $view = Product::where('id', $id)->first();
        return view('admin.ecommerce.product.view', compact('view'));
    }


    // multisoft delete
    public function productmultisoftdelete(Request $request)
    {

        $deleteid = $request->Input('delid');
        if ($deleteid) {
            $delet = Product::whereIn('id', $deleteid)->update([
                'is_deleted' => '1',
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
            if ($delet) {
                $notification = array(
                    'messege' => 'success',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'messege' => 'error',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'messege' => 'Nothing To Delete',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }
    }
    // restore
    public function prorecover($id)
    {
        $recover = Product::where('id', $id)->update([
            'is_deleted' => '0',
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($recover) {
            $notification = array(
                'messege' => 'Restore Success',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Faild',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    // product physical type one edit
    public function producteditone($id)
    {
        $data = Product::where('id', $id)->first();
        $tag = json_decode($data->meta_tag);
        return view('admin.ecommerce.product.editphysical', compact('data', 'tag'));
    }
    //product digital two edit
    public function productedittwo($id)
    {
        $data = Product::where('id', $id)->first();
        $tag = json_decode($data->meta_tag);
        return view('admin.ecommerce.product.editdigital', compact('data', 'tag'));
    }
    // product lincence three edit
    public function producteditthree($id)
    {
        $data = Product::where('id', $id)->first();
        $tag = json_decode($data->meta_tag);
        return view('admin.ecommerce.product.editlicense', compact('data', 'tag'));
    }
    // affiliate
    public function producteditfour($id)
    {

        $data = Product::where('id', $id)->first();
        $tag = json_decode($data->meta_tag);
        return view('admin.ecommerce.product.editaffiliate', compact('data', 'tag'));
    }
    // edit combination start
    public function sku_combination_edit(Request $request)
    {

        $product = Product::findOrFail($request->id);
        $options = array();
        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
            $colors_active = 1;
            array_push($options, $request->colors);
        } else {
            $colors_active = 0;
        }

        $product_name = $request->product_name;
        $unit_price = $request->unit_price;

        if ($request->has('choice_no')) {
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_' . $no;
                $my_str = implode('|', $request[$name]);
                array_push($options, explode(',', $my_str));
            }
        }


        if ($request->has('colors_active') && $request->has('choice_no')) {
            $choice_count = count($request->choice_no);
            if ($choice_count == 0) {
                $combinations = Arr::crossJoin($options[0]);
                return view('admin.ecommerce.partials.sku_combinations_edit', compact('combinations', 'unit_price', 'colors_active', 'product_name', 'product'));
            } elseif ($choice_count == 1) {
                $combinations = Arr::crossJoin($options[0], $options[1]);
                return view('admin.ecommerce.partials.sku_combinations_edit', compact('combinations', 'unit_price', 'colors_active', 'product_name', 'product'));
            } elseif ($choice_count == 2) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2]);
                return view('admin.ecommerce.partials.sku_combinations_edit', compact('combinations', 'unit_price', 'colors_active', 'product_name', 'product'));
            } elseif ($choice_count == 3) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2], $options[3]);
                return view('admin.ecommerce.partials.sku_combinations_edit', compact('combinations', 'unit_price', 'colors_active', 'product_name', 'product'));
            } elseif ($choice_count == 4) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2], $options[3], $options[4]);
                return view('admin.ecommerce.partials.sku_combinations_edit', compact('combinations', 'unit_price', 'colors_active', 'product_name', 'product'));
            } elseif ($choice_count == 5) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2], $options[3], $options[4], $options[5]);
                return view('admin.ecommerce.partials.sku_combinations_edit', compact('combinations', 'unit_price', 'colors_active', 'product_name', 'product'));
            }
        } elseif ($request->has('colors_active')) {

            $combinations = Arr::crossJoin($options[0]);
            return view('admin.ecommerce.partials.sku_combinations_edit', compact('combinations', 'unit_price', 'colors_active', 'product_name', 'product'));
        } elseif ($request->has('choice_no')) {
            $choice_count = count($request->choice_no);
            if ($choice_count == 1) {
                $combinations = Arr::crossJoin($options[0]);
                return view('admin.ecommerce.partials.sku_combinations_edit', compact('combinations', 'unit_price', 'colors_active', 'product_name', 'product'));
            } elseif ($choice_count == 2) {
                $combinations = Arr::crossJoin($options[0], $options[1]);
                return view('admin.ecommerce.partials.sku_combinations_edit', compact('combinations', 'unit_price', 'colors_active', 'product_name', 'product'));
            } elseif ($choice_count == 3) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2]);
                return view('admin.ecommerce.partials.sku_combinations_edit', compact('combinations', 'unit_price', 'colors_active', 'product_name', 'product'));
            } elseif ($choice_count == 4) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2], $options[3]);
                return view('admin.ecommerce.partials.sku_combinations_edit', compact('combinations', 'unit_price', 'colors_active', 'product_name', 'product'));
            } elseif ($choice_count == 5) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2], $options[3], $options[4]);
                return view('admin.ecommerce.partials.sku_combinations_edit', compact('combinations', 'unit_price', 'colors_active', 'product_name', 'product'));
            }
        }
    }

    // update product
    public function update(Request $request, $id)
    {
      // return $request->product_measurement;

      $proname=$request->product_name;
      $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $proname);

        $this->validate($request, [
            'product_name' => 'required',
            'product_type' => 'required',
            'product_sku' => 'required',
            'unit_price' => 'required',
            'cate_id' => 'required',
            'product_qty' => 'required|numeric',

        ]);
        // return $request;
        $product = Product::findOrFail($id);
        $product->product_name = $request->product_name;
        $product->product_type = $request->product_type;
        $product->grug_type = $request->grug_type;
        $product->product_sku = $request->product_sku;
        $product->product_price = $request->unit_price;
        $product->cate_id = $request->cate_id;
        $product->subcate_id = $request->subcate_id;
        $product->resubcate_id = $request->resubcate_id;
        $product->brand = $request->brand;
        $product->product_qty = $request->product_qty;
        $product->slug = $slug;
        $product->allow_product_condition = $request->allow_product_condition;
        $product->product_condition = $request->product_condition;
        $product->allow_product_measurement = $request->allow_product_measurement;
        $product->product_measurement = $request->product_measurement;
        $product->product_description = $request->product_description;
        $product->buy_and_return_policy = $request->buy_and_return_policy;
        $product->shipping_time = $request->shipping_time;
        $product->meta_tag = $request->m_tag;
        $product->meta_description = $request->meta_description;
        // digital product edit field
        $product->select_upload_type = $request->upload_type;
        $product->upload_link = $request->upload_link;

        $product->video = $request->video;
        if ($request->hasFile('pdf')) {
            $product->upload_file = $request->pdf->store('public/uploads/products/file');
        }
        // end digital product edit

        // affiliate prodact edit field
        $product->affiliate_link = $request->affiliate_link;
        // affiliate prodact edit field
        // license product edit field
        $product->license_type = $request->license_type;
        //lincense product edit end
        if ($request->has('previous_photos')) {
           $photos = $request->previous_photos;
       } else {
           $photos = array();
       }
       if ($request->hasFile('photos')) {
           foreach ($request->photos as $key => $photo) {
               $photoName = uniqid() . "." . $photo->getClientOriginalExtension();
               $resizedPhoto = Image::make($photo)->resize(600, 600)->save($photoName);
               Storage::disk('public')->put($photoName, $resizedPhoto);
               unlink($photoName);
               array_push($photos, $photoName);
               // $path = $photo->store('/');
               // array_push($photos, $path);

           }
       }
       $product->photos = json_encode($photos);



        $product->thumbnail_img = $request->previous_thumbnail_img;
        $oldimage=$request->old_img;
        if ($request->hasFile('thumbnail_img')) {
            if($oldimage){
            unlink('public/uploads/products/thumbnail/'.$oldimage);
            unlink('public/uploads/products/thumbnail/smallthum/'.$oldimage);
            unlink('public/uploads/products/thumbnail/cartthum/'.$oldimage);
            unlink('public/uploads/products/thumbnail/productdetails/'.$oldimage);
            $image = $request->file('thumbnail_img');
            $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('public/uploads/products/thumbnail/' . $ImageName);
            Image::make($image)->resize(120, 120)->save('public/uploads/products/thumbnail/smallthum/' . $ImageName);
            Image::make($image)->resize(600, 600)->save('public/uploads/products/thumbnail/productdetails/' . $ImageName);
            Image::make($image)->resize(160, 160)->save('public/uploads/products/thumbnail/mobile/' . $ImageName);
            $product->thumbnail_img = $ImageName;
            Image::make($image)->resize(64, 64)->save('public/uploads/products/thumbnail/cartthum/' . $ImageName);
            $product->thumbnail_img = $ImageName;
          }else{
            $image = $request->file('thumbnail_img');
            $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('public/uploads/products/thumbnail/' . $ImageName);
            Image::make($image)->resize(120, 120)->save('public/uploads/products/thumbnail/smallthum/' . $ImageName);
            Image::make($image)->resize(600, 600)->save('public/uploads/products/thumbnail/productdetails/' . $ImageName);
            Image::make($image)->resize(160, 160)->save('public/uploads/products/thumbnail/mobile/' . $ImageName);
            $product->thumbnail_img = $ImageName;

            Image::make($image)->resize(64, 64)->save('public/uploads/products/thumbnail/cartthum/' . $ImageName);
            $product->thumbnail_img = $ImageName;
          }

        }

        //combinations start
        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
            $product->colors = json_encode($request->colors);
        } else {
            $colors = array();
            $product->colors = json_encode($colors);
        }
        $choice_options = array();
        if ($request->has('choice')) {
            foreach ($request->choice_no as $key => $no) {
                $str = 'choice_options_' . $no;
                $item['name'] = 'choice_' . $no;
                $item['title'] = $request->choice[$key];
                $item['options'] = explode(',', implode('|', $request[$str]));
                array_push($choice_options, $item);
            }
        }
        $product->choice_options = json_encode($choice_options);
        // combination start
        $options = array();
        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
            $colors_active = 1;
            array_push($options, $request->colors);
        }

        if ($request->has('choice_no')) {
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_' . $no;
                $my_str = implode('|', $request[$name]);
                array_push($options, explode(',', $my_str));
            }
        }
        // if
        if ($request->has('colors_active') && $request->has('choice_no')) {
            $choice_count = count($request->choice_no);
            if ($choice_count == 0) {
                $combinations = Arr::crossJoin($options[0]);
                if (count($combinations[0]) > 0) {
                    foreach ($combinations as $key => $combination) {
                        $str = '';
                        foreach ($combination as $key => $item) {
                            if ($key > 0) {
                                $str .= '-' . str_replace(' ', '', $item);
                            } else {
                                if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                                    $color_name = \App\Color::where('color_code', $item)->first()->color_name;
                                    $str .= $color_name;
                                } else {
                                    $str .= str_replace(' ', '', $item);
                                }
                            }
                        }
                        $item = array();
                        $item['price'] = $request['price_' . str_replace('.', '_', $str)];
                        $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
                        $item['qty'] = $request['qty_' . str_replace('.', '_', $str)];
                        $variations[$str] = $item;
                    }
                }
            } elseif ($choice_count == 1) {
                $combinations = Arr::crossJoin($options[0], $options[1]);
                if (count($combinations[0]) > 0) {
                    foreach ($combinations as $key => $combination) {
                        $str = '';
                        foreach ($combination as $key => $item) {
                            if ($key > 0) {
                                $str .= '-' . str_replace(' ', '', $item);
                            } else {
                                if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                                    $color_name = \App\Color::where('color_code', $item)->first()->color_name;
                                    $str .= $color_name;
                                } else {
                                    $str .= str_replace(' ', '', $item);
                                }
                            }
                        }
                        $item = array();
                        $item['price'] = $request['price_' . str_replace('.', '_', $str)];
                        $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
                        $item['qty'] = $request['qty_' . str_replace('.', '_', $str)];
                        $variations[$str] = $item;
                    }
                }
            } elseif ($choice_count == 2) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2]);
                if (count($combinations[0]) > 0) {
                    foreach ($combinations as $key => $combination) {
                        $str = '';
                        foreach ($combination as $key => $item) {
                            if ($key > 0) {
                                $str .= '-' . str_replace(' ', '', $item);
                            } else {
                                if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                                    $color_name = \App\Color::where('color_code', $item)->first()->color_name;
                                    $str .= $color_name;
                                } else {
                                    $str .= str_replace(' ', '', $item);
                                }
                            }
                        }
                        $item = array();
                        $item['price'] = $request['price_' . str_replace('.', '_', $str)];
                        $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
                        $item['qty'] = $request['qty_' . str_replace('.', '_', $str)];
                        $variations[$str] = $item;
                    }
                }
            } elseif ($choice_count == 3) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2], $options[3]);
                if (count($combinations[0]) > 0) {
                    foreach ($combinations as $key => $combination) {
                        $str = '';
                        foreach ($combination as $key => $item) {
                            if ($key > 0) {
                                $str .= '-' . str_replace(' ', '', $item);
                            } else {
                                if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                                    $color_name = \App\Color::where('color_code', $item)->first()->color_name;
                                    $str .= $color_name;
                                } else {
                                    $str .= str_replace(' ', '', $item);
                                }
                            }
                        }
                        $item = array();
                        $item['price'] = $request['price_' . str_replace('.', '_', $str)];
                        $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
                        $item['qty'] = $request['qty_' . str_replace('.', '_', $str)];
                        $variations[$str] = $item;
                    }
                }
            } elseif ($choice_count == 4) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2], $options[3], $options[4]);
                if (count($combinations[0]) > 0) {
                    foreach ($combinations as $key => $combination) {
                        $str = '';
                        foreach ($combination as $key => $item) {
                            if ($key > 0) {
                                $str .= '-' . str_replace(' ', '', $item);
                            } else {
                                if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                                    $color_name = \App\Color::where('color_code', $item)->first()->color_name;
                                    $str .= $color_name;
                                } else {
                                    $str .= str_replace(' ', '', $item);
                                }
                            }
                        }
                        $item = array();
                        $item['price'] = $request['price_' . str_replace('.', '_', $str)];
                        $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
                        $item['qty'] = $request['qty_' . str_replace('.', '_', $str)];
                        $variations[$str] = $item;
                    }
                }
            } elseif ($choice_count == 5) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2], $options[3], $options[4], $options[5]);
                if (count($combinations[0]) > 0) {
                    foreach ($combinations as $key => $combination) {
                        $str = '';
                        foreach ($combination as $key => $item) {
                            if ($key > 0) {
                                $str .= '-' . str_replace(' ', '', $item);
                            } else {
                                if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                                    $color_name = \App\Color::where('color_code', $item)->first()->color_name;
                                    $str .= $color_name;
                                } else {
                                    $str .= str_replace(' ', '', $item);
                                }
                            }
                        }
                        $item = array();
                        $item['price'] = $request['price_' . str_replace('.', '_', $str)];
                        $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
                        $item['qty'] = $request['qty_' . str_replace('.', '_', $str)];
                        $variations[$str] = $item;
                    }
                }
            }
            $product->variations = json_encode($variations);
        } elseif ($request->has('colors_active')) {

            $combinations = Arr::crossJoin($options[0]);
            if (count($combinations[0]) > 0) {
                foreach ($combinations as $key => $combination) {
                    $str = '';
                    foreach ($combination as $key => $item) {
                        if ($key > 0) {
                            $str .= '-' . str_replace(' ', '', $item);
                        } else {
                            if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                                $color_name = \App\Color::where('color_code', $item)->first()->color_name;
                                $str .= $color_name;
                            } else {
                                $str .= str_replace(' ', '', $item);
                            }
                        }
                    }
                    $item = array();
                    $item['price'] = $request['price_' . str_replace('.', '_', $str)];
                    $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
                    $item['qty'] = $request['qty_' . str_replace('.', '_', $str)];
                    $variations[$str] = $item;
                }
            }
        } elseif ($request->has('choice_no')) {
            $choice_count = count($request->choice_no);
            if ($choice_count == 1) {
                $combinations = Arr::crossJoin($options[0]);
                if (count($combinations[0]) > 0) {
                    foreach ($combinations as $key => $combination) {
                        $str = '';
                        foreach ($combination as $key => $item) {
                            if ($key > 0) {
                                $str .= '-' . str_replace(' ', '', $item);
                            } else {
                                if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                                    $color_name = \App\Color::where('color_code', $item)->first()->color_name;
                                    $str .= $color_name;
                                } else {
                                    $str .= str_replace(' ', '', $item);
                                }
                            }
                        }
                        $item = array();
                        $item['price'] = $request['price_' . str_replace('.', '_', $str)];
                        $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
                        $item['qty'] = $request['qty_' . str_replace('.', '_', $str)];
                        $variations[$str] = $item;
                    }
                }
            } elseif ($choice_count == 2) {
                $combinations = Arr::crossJoin($options[0], $options[1]);
                if (count($combinations[0]) > 0) {
                    foreach ($combinations as $key => $combination) {
                        $str = '';
                        foreach ($combination as $key => $item) {
                            if ($key > 0) {
                                $str .= '-' . str_replace(' ', '', $item);
                            } else {
                                if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                                    $color_name = \App\Color::where('color_code', $item)->first()->color_name;
                                    $str .= $color_name;
                                } else {
                                    $str .= str_replace(' ', '', $item);
                                }
                            }
                        }
                        $item = array();
                        $item['price'] = $request['price_' . str_replace('.', '_', $str)];
                        $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
                        $item['qty'] = $request['qty_' . str_replace('.', '_', $str)];
                        $variations[$str] = $item;
                    }
                }
            } elseif ($choice_count == 3) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2]);
                if (count($combinations[0]) > 0) {
                    foreach ($combinations as $key => $combination) {
                        $str = '';
                        foreach ($combination as $key => $item) {
                            if ($key > 0) {
                                $str .= '-' . str_replace(' ', '', $item);
                            } else {
                                if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                                    $color_name = \App\Color::where('color_code', $item)->first()->color_name;
                                    $str .= $color_name;
                                } else {
                                    $str .= str_replace(' ', '', $item);
                                }
                            }
                        }
                        $item = array();
                        $item['price'] = $request['price_' . str_replace('.', '_', $str)];
                        $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
                        $item['qty'] = $request['qty_' . str_replace('.', '_', $str)];
                        $variations[$str] = $item;
                    }
                }
            } elseif ($choice_count == 4) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2], $options[3]);
                if (count($combinations[0]) > 0) {
                    foreach ($combinations as $key => $combination) {
                        $str = '';
                        foreach ($combination as $key => $item) {
                            if ($key > 0) {
                                $str .= '-' . str_replace(' ', '', $item);
                            } else {
                                if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                                    $color_name = \App\Color::where('color_code', $item)->first()->color_name;
                                    $str .= $color_name;
                                } else {
                                    $str .= str_replace(' ', '', $item);
                                }
                            }
                        }
                        $item = array();
                        $item['price'] = $request['price_' . str_replace('.', '_', $str)];
                        $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
                        $item['qty'] = $request['qty_' . str_replace('.', '_', $str)];
                        $variations[$str] = $item;
                    }
                }
            } elseif ($choice_count == 5) {
                $combinations = Arr::crossJoin($options[0], $options[1], $options[2], $options[3], $options[4]);
                if (count($combinations[0]) > 0) {
                    foreach ($combinations as $key => $combination) {
                        $str = '';
                        foreach ($combination as $key => $item) {
                            if ($key > 0) {
                                $str .= '-' . str_replace(' ', '', $item);
                            } else {
                                if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                                    $color_name = \App\Color::where('color_code', $item)->first()->color_name;
                                    $str .= $color_name;
                                } else {
                                    $str .= str_replace(' ', '', $item);
                                }
                            }
                        }
                        $item = array();
                        $item['price'] = $request['price_' . str_replace('.', '_', $str)];
                        $item['sku'] = $request['sku_' . str_replace('.', '_', $str)];
                        $item['qty'] = $request['qty_' . str_replace('.', '_', $str)];
                        $variations[$str] = $item;
                    }
                }
            }
            $product->variations = json_encode($variations);
        }
        //combination end







        //dd($request->license_key);

        // foreach($request->license_key as $key=>$license){
        // $updatelis=ProductLicense::where('product_id',$id)->where('id',$key)->first();
        // dd($updatelis);
        // $data3=array(
        //     'product_id'=>$updatelis,
        //     'license_key'=>$request->license_key[$key],
        //     'license_quantity'=>$request->license_quantity[$key],
        //     'license_duration'=>$request->license_duration[$key],
        //     'created_at'=>Carbon::now()->toDateTimeString(),
        //    );
        //    ProductLicense::Insert($data3);
        // $updatelis=array(
        //     'license_key'=>$request->license_key[$license],
        //     'license_quantity'=>$request->license_quantity[$license],
        //     'license_duration'=>$request->license_duration[$license],
        //     'created_at'=>Carbon::now()->toDateTimeString(),

        //    );
        //    ProductLicense::Insert($updatelis);
        // $updatelis->license_key=$license->license_key;
        // $updatelis->save();
        // $license->license_key=$request->license_key;
        // $license->license_quantity=$request->license_quantity;
        // $license->license_quantity=$request->license_quantity;
        // $license->save();
        // }

        // $updateli->save();
        $product->save();
        if ($request->license_key) {
            $prlicenseid = $request['licenseid'];
            if ($prlicenseid) {
                $ProductLicense = ProductLicense::whereIn('id', $prlicenseid)->delete();

                if (count($request->license_key) > 0) {
                    foreach ($request->license_key as $item => $v) {
                        $data4 = array(
                            'product_id' => $request->proid,
                            'license_key' => $request->license_key[$item],
                            'license_quantity' => $request->license_quantity[$item],
                            'license_duration' => $request->license_duration[$item],
                            'created_at' => Carbon::now()->toDateTimeString(),
                        );
                        ProductLicense::insert($data4);
                    }
                }
            } else {
                if (count($request->license_key) > 0) {
                    foreach ($request->license_key as $item => $v) {
                        $data4 = array(
                            'product_id' => $product->id,
                            'license_key' => $request->license_key[$item],
                            'license_quantity' => $request->license_quantity[$item],
                            'license_duration' => $request->license_duration[$item],
                            'created_at' => Carbon::now()->toDateTimeString(),
                        );
                        ProductLicense::insert($data4);
                    }
                }
            }
        }





        if ($product->save()) {
            $notification = array(
                'messege' => 'Update Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'Update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // license pro
    public function licencepro($id)
    {
        $data = ProductLicense::where('id', $id)->delete();
        return redirect()->back();
    }

    // single soft delete
    public function softdelete($id)
    {
        $softdelete = Product::where('id', $id)->update([
            'is_deleted' => '1',
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        if ($softdelete) {
            $notification = array(
                'messege' => 'SoftDelete Success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'softdelete Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // heard delete single product
    public function hearddelete($id)
    {
        $product_id = Product::where('id', $id)->first();

        $thum_image = $product_id->thumbnail_img;

        if ($thum_image) {
            unlink('public/uploads/products/thumbnail/' . $thum_image);
            unlink('public/uploads/products/thumbnail/cartthum/' . $thum_image);
            unlink('public/uploads/products/thumbnail/productdetails/' . $thum_image);
            unlink('public/uploads/products/thumbnail/smallthum/' . $thum_image);

            foreach (json_decode($product_id->photos) as  $value) {

                  unlink('storage/app/public/'.$value);
            }




            $delet = Product::where('id', $id)->delete();
            if ($delet) {
                $notification = array(
                    'messege' => 'Product Delete Success',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'messege' => 'softdelete Faild',
                    'alert-type' => 'error'
                );
                return Redirect()->back()->with($notification);
            }
        } else {
            $delet = Product::where('id', $id)->delete();
            if ($delet) {
                $notification = array(
                    'messege' => 'Product Delete Success',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'messege' => 'softdelete Fail',
                    'alert-type' => 'error'
                );
                return Redirect()->back()->with($notification);
            }
        }
    }

    // return producct area start

    public function returrnProduct()
    {
       $allproduct =ReturnProduct::all();
        $porductorderid=[];
        foreach($allproduct as $product){

            $checkout=Checkout::where('orderid',$product->orderrid)->first();
            if($checkout){
                foreach($checkout->products as $row){
                    if($row->return_product == 1){
                        $checkoutorderid =$checkout->orderid;
                        array_push($porductorderid,$checkoutorderid);
                    }
                }
            }

        }
        $allproduct=ReturnProduct::whereIn('orderrid',$porductorderid)->get();


        return view('admin.ecommerce.product.returnproduct',compact('allproduct'));


    }

    public function deletedProduct ($id)
    {
        ReturnProduct::where('orderrid',$id)->delete();
        $notification = array(
            'messege' => 'Order Deleted succesfully!',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

    // show product

    public function showProduct ($id,$userid)
    {

        $cartdata =Checkout::where('orderid',$id)->first();


        return view('admin.ecommerce.product.showreturnproduct',compact('cartdata','userid'));

    }

    // reject return product
    public function rejectReturnProduct($orderid,$id)
    {
        $allproducts = Checkout::where('orderid',$orderid)->first();
        abort_if(!$allproducts, 403);

        $totalprice=0;
        $quantity=0;
       $products =$allproducts->products;
       $productpush = [];
       foreach($products as  &$value){
           if($value->id == $id){
            $item = array();
            $item['id']=$value->id;
            $item['name']=$value->name;
            $item['name']=$value->name;
            $item['price']=$value->price;
            $item['quantity']=$value->quantity;
            $item['thumbnail_img']=$value->thumbnail_img;
            $item['colors']=$value->colors;
            $item['product_id']=$value->product_id;
            $item['sku']=$value->sku;
            $item['sku']=$value->sku;
            $item['flashdeals']=$value->flashdeals;
            $item['flashdealtype']=$value->flashdealtype;
            $item['return_product']=0;
            $item['approve_product']=1;

            $totalprice .=$value->price;
            $quantity .=$value->quantity;
            // NEW ACTION AREA START


             // store attibute name
             $sizename = [];

             $productdetails = Product::findOrFail($value->product_id);
             foreach (json_decode($productdetails->choice_options) as $key => $choice) {


                $size = $choice->title; //this reaturn size,model
                array_push($sizename, $size);
            }
            $rowcount = count($sizename);

            if($rowcount == 1){
                $sizeone =$sizename[0];
                $item[$sizeone]=$value->$sizeone;
            }elseif($rowcount == 2){
                $sizeone =$sizename[0];
                $sizetwo =$sizename[1];
                $item[$sizeone]=$value->$sizeone;
                $item[$sizetwo]=$value->$sizetwo;
            }elseif($rowcount == 3){
                $sizeone =$sizename[0];
                $sizetwo =$sizename[1];
                $sizethree =$sizename[2];
                $item[$sizeone]=$value->$sizeone;
                $item[$sizetwo]=$value->$sizetwo;
                $item[$sizethree]=$value->$sizethree;
            }elseif($rowcount == 4){
                $sizeone =$sizename[0];
                $sizetwo =$sizename[1];
                $sizethree =$sizename[2];
                $sizefour =$sizename[3];
                $item[$sizeone]=$value->$sizeone;
                $item[$sizetwo]=$value->$sizetwo;
                $item[$sizethree]=$value->$sizethree;
                $item[$sizefour]=$value->$sizefour;
            }elseif($rowcount == 5){
                $sizeone =$sizename[0];
                $sizetwo =$sizename[1];
                $sizethree =$sizename[2];
                $sizefour =$sizename[3];
                $sizefive =$sizename[4];
                $item[$sizeone]=$value->$sizeone;
                $item[$sizetwo]=$value->$sizetwo;
                $item[$sizethree]=$value->$sizethree;
                $item[$sizefour]=$value->$sizefour;
                $item[$sizefive]=$value->$sizefive;
            }


            // NEW ACTION AREA END
            array_push($productpush,$item);

           }else{
            $item = array();
            $item['id']=$value->id;
            $item['name']=$value->name;
            $item['name']=$value->name;
            $item['price']=$value->price;
            $item['quantity']=$value->quantity;
            $item['thumbnail_img']=$value->thumbnail_img;
            $item['colors']=$value->colors;
            $item['product_id']=$value->product_id;
            $item['sku']=$value->sku;
            $item['sku']=$value->sku;
            $item['flashdeals']=$value->flashdeals;
            $item['flashdealtype']=$value->flashdealtype;
            $item['return_product']=$value->return_product;
            $item['approve_product']=0;

            // NEW ACTION AREA START


             // store attibute name
             $sizename = [];

             $productdetails = Product::findOrFail($value->product_id);
             foreach (json_decode($productdetails->choice_options) as $key => $choice) {


                $size = $choice->title; //this reaturn size,model
                array_push($sizename, $size);
            }
            $rowcount = count($sizename);

            if($rowcount == 1){
                $sizeone =$sizename[0];
                $item[$sizeone]=$value->$sizeone;
            }elseif($rowcount == 2){
                $sizeone =$sizename[0];
                $sizetwo =$sizename[1];
                $item[$sizeone]=$value->$sizeone;
                $item[$sizetwo]=$value->$sizetwo;
            }elseif($rowcount == 3){
                $sizeone =$sizename[0];
                $sizetwo =$sizename[1];
                $sizethree =$sizename[2];
                $item[$sizeone]=$value->$sizeone;
                $item[$sizetwo]=$value->$sizetwo;
                $item[$sizethree]=$value->$sizethree;
            }elseif($rowcount == 4){
                $sizeone =$sizename[0];
                $sizetwo =$sizename[1];
                $sizethree =$sizename[2];
                $sizefour =$sizename[3];
                $item[$sizeone]=$value->$sizeone;
                $item[$sizetwo]=$value->$sizetwo;
                $item[$sizethree]=$value->$sizethree;
                $item[$sizefour]=$value->$sizefour;
            }elseif($rowcount == 5){
                $sizeone =$sizename[0];
                $sizetwo =$sizename[1];
                $sizethree =$sizename[2];
                $sizefour =$sizename[3];
                $sizefive =$sizename[4];
                $item[$sizeone]=$value->$sizeone;
                $item[$sizetwo]=$value->$sizetwo;
                $item[$sizethree]=$value->$sizethree;
                $item[$sizefour]=$value->$sizefour;
                $item[$sizefive]=$value->$sizefive;
            }


            // NEW ACTION AREA END
            array_push($productpush,$item);
           }


       }

       $allproducts->update([
           'products'=>$productpush,
       ]);

       $refund =RefundReason::where('product_id',$id)->where('order_id',$orderid)->first();
       if($refund){
        $refund->delete();
       }


       $notification = array(
        'messege' => 'Return Order Product Rejected!',
        'alert-type' => 'error'
    );
    return Redirect()->back()->with($notification);
    }

    // approve return products

    public function approveReturnProduct ($orderid,$id,$userid)
    {
        OrderPlace::where('order_id',$orderid)->first();
        $allproducts = Checkout::where('orderid',$orderid)->first();
        abort_if(!$allproducts, 403);
        $productpushreturn=[];
        $totalprice=0;
        $quantity=0;
       $products =$allproducts->products;
       $productpush = [];
       foreach($products as  &$value){
           if($value->id == $id){
            $item = array();
            $item['id']=$value->id;
            $item['name']=$value->name;
            $item['name']=$value->name;
            $item['price']=$value->price;
            $item['quantity']=$value->quantity;
            $item['thumbnail_img']=$value->thumbnail_img;
            $item['colors']=$value->colors;
            $item['product_id']=$value->product_id;
            $item['sku']=$value->sku;
            $item['sku']=$value->sku;
            $item['flashdeals']=$value->flashdeals;
            $item['flashdealtype']=$value->flashdealtype;
            $item['return_product']=0;
            $item['approve_product']=0;

            $totalprice .=$value->price;
            $quantity .=$value->quantity;
            // NEW ACTION AREA START


             // store attibute name
             $sizename = [];

             $productdetails = Product::findOrFail($value->product_id);
             foreach (json_decode($productdetails->choice_options) as $key => $choice) {


                $size = $choice->title; //this reaturn size,model
                array_push($sizename, $size);
            }
            $rowcount = count($sizename);

            if($rowcount == 1){
                $sizeone =$sizename[0];
                $item[$sizeone]=$value->$sizeone;
            }elseif($rowcount == 2){
                $sizeone =$sizename[0];
                $sizetwo =$sizename[1];
                $item[$sizeone]=$value->$sizeone;
                $item[$sizetwo]=$value->$sizetwo;
            }elseif($rowcount == 3){
                $sizeone =$sizename[0];
                $sizetwo =$sizename[1];
                $sizethree =$sizename[2];
                $item[$sizeone]=$value->$sizeone;
                $item[$sizetwo]=$value->$sizetwo;
                $item[$sizethree]=$value->$sizethree;
            }elseif($rowcount == 4){
                $sizeone =$sizename[0];
                $sizetwo =$sizename[1];
                $sizethree =$sizename[2];
                $sizefour =$sizename[3];
                $item[$sizeone]=$value->$sizeone;
                $item[$sizetwo]=$value->$sizetwo;
                $item[$sizethree]=$value->$sizethree;
                $item[$sizefour]=$value->$sizefour;
            }elseif($rowcount == 5){
                $sizeone =$sizename[0];
                $sizetwo =$sizename[1];
                $sizethree =$sizename[2];
                $sizefour =$sizename[3];
                $sizefive =$sizename[4];
                $item[$sizeone]=$value->$sizeone;
                $item[$sizetwo]=$value->$sizetwo;
                $item[$sizethree]=$value->$sizethree;
                $item[$sizefour]=$value->$sizefour;
                $item[$sizefive]=$value->$sizefive;
            }


            // NEW ACTION AREA END
            array_push($productpushreturn,$item);

           }else{
            $item = array();
            $item['id']=$value->id;
            $item['name']=$value->name;
            $item['name']=$value->name;
            $item['price']=$value->price;
            $item['quantity']=$value->quantity;
            $item['thumbnail_img']=$value->thumbnail_img;
            $item['colors']=$value->colors;
            $item['product_id']=$value->product_id;
            $item['sku']=$value->sku;
            $item['sku']=$value->sku;
            $item['flashdeals']=$value->flashdeals;
            $item['flashdealtype']=$value->flashdealtype;
            $item['return_product']=$value->return_product;
            $item['approve_product']=0;

            // NEW ACTION AREA START


             // store attibute name
             $sizename = [];

             $productdetails = Product::findOrFail($value->product_id);
             foreach (json_decode($productdetails->choice_options) as $key => $choice) {


                $size = $choice->title; //this reaturn size,model
                array_push($sizename, $size);
            }
            $rowcount = count($sizename);

            if($rowcount == 1){
                $sizeone =$sizename[0];
                $item[$sizeone]=$value->$sizeone;
            }elseif($rowcount == 2){
                $sizeone =$sizename[0];
                $sizetwo =$sizename[1];
                $item[$sizeone]=$value->$sizeone;
                $item[$sizetwo]=$value->$sizetwo;
            }elseif($rowcount == 3){
                $sizeone =$sizename[0];
                $sizetwo =$sizename[1];
                $sizethree =$sizename[2];
                $item[$sizeone]=$value->$sizeone;
                $item[$sizetwo]=$value->$sizetwo;
                $item[$sizethree]=$value->$sizethree;
            }elseif($rowcount == 4){
                $sizeone =$sizename[0];
                $sizetwo =$sizename[1];
                $sizethree =$sizename[2];
                $sizefour =$sizename[3];
                $item[$sizeone]=$value->$sizeone;
                $item[$sizetwo]=$value->$sizetwo;
                $item[$sizethree]=$value->$sizethree;
                $item[$sizefour]=$value->$sizefour;
            }elseif($rowcount == 5){
                $sizeone =$sizename[0];
                $sizetwo =$sizename[1];
                $sizethree =$sizename[2];
                $sizefour =$sizename[3];
                $sizefive =$sizename[4];
                $item[$sizeone]=$value->$sizeone;
                $item[$sizetwo]=$value->$sizetwo;
                $item[$sizethree]=$value->$sizethree;
                $item[$sizefour]=$value->$sizefour;
                $item[$sizefive]=$value->$sizefive;
            }


            // NEW ACTION AREA END
            array_push($productpush,$item);
           }


       }

       $allproducts->update([
        'products'=>$productpush,
        ]);



        ReturnAllProduct::insert([
            'order_id'=>$orderid,
            'products'=>json_encode($productpushreturn),
            'quantity'=>$quantity,
            'price'=>$totalprice,
            'user_id'=>$userid,
            'created_at'=>Carbon::now(),
        ]);

        $user =CustomarAccount::where('userid',$userid)->first();
        $totalprice = $totalprice * $quantity;
        $orderinfo =OrderPlace::where('order_id',$orderid)->first();
        if($orderinfo->is_paid != 0){
            $user->increment('balance',$totalprice);
        }

        $orderinfo->decrement('total_price',$totalprice);

       $notification = array(
        'messege' => 'Return Order Product Approved!',
        'alert-type' => 'success'
    );
    return Redirect()->back()->with($notification);
    }


    public function adminApproveReturnProduct()
    {



            $products = DB::table('return_all_products')
            ->join('return_products', 'return_all_products.order_id', '=', 'return_products.orderrid')
            ->select('return_all_products.*', 'return_products.user_id')
            ->get();;


        return view('admin.ecommerce.product.approved_return_product',compact('products'));
    }

    public function adminApproveReturnProductDelete ($id)
    {
        ReturnAllProduct::findOrFail($id)->delete();
        $notification = array(
            'messege' => 'Return  Product Deleted Succesfuly!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

}
