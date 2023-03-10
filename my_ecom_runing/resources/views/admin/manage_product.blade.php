@extends('admin/layout');
@section('title','Manage Product')
@section('product_section','active')
@section('container')
<div hidden="hidden">
   @if($id>0)
   {{ $image_required='' }}
   @else
   {{ $image_required='required' }}
   @endif
</div>
@if(session()->has('message'))
<div class="alert alert-danger" role="alert">
   {{ session('message') }}
</div>
@endif
@error('attr_image.*')
   <div class="alert alert-danger" role="alert">
      {{ $message }}
   </div>
@enderror
<h1>Manage Product</h1>
<a href="{{ route('product') }}">
<button type="button" class="btn btn-success m-3">Back</button>
</a>
<form action="{{ route('product.manage_product_process') }}" method="POST" enctype="multipart/form-data">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               @csrf
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label for="name" class="control-label mb-1">Name</label>
                        <input id="name" value="{{ $name }}" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label for="slug" class="control-label mb-1">Slug</label>
                        <input id="slug" value="{{ $slug }}" name="slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                     </div>
                     @error('slug')
                     <div class="alert alert-danger" role="alert">
                        {{ $message }}
                     </div>
                     @enderror
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-4 mt-4 mb-3">
                     <select id="categort_id" value="{{ $categort_id }}" name="categort_id" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        <option value="">Select Category</option>
                        @foreach ($category as $list)
                        @if($categort_id==$list->id)
                        <option selected value="{{ $list->id }}">
                           @else
                        <option value="{{ $list->id }}">
                           @endif   
                           {{ $list->category_name }}
                        </option>
                        @endforeach
                     </select>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                        <label for="brand" class="control-label mb-1">Brand</label>
                        <input id="brand" value="{{ $brand }}" name="brand" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                        <label for="model" class="control-label mb-1">Model</label>
                        <input id="model" value="{{ $model }}" name="model" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label for="short_desc" class="control-label mb-1">Short Description</label>
                  <input id="short_desc" value="{{ $short_desc }}" name="short_desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
               </div>
               <div class="row">
                  <div class="col-sm-4">
                     <div class="form-group">
                        <label for="desc" class="control-label mb-1">Description</label>
                        <textarea id="desc" name="desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required >{{ $desc }}</textarea>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                        <label for="keywords" class="control-label mb-1">Keywords</label>
                        <textarea id="keywords" name="keywords" type="text" class="form-control" aria-required="true" aria-invalid="false" >{{ $keywords }}</textarea>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                        <label for="technical_specification" class="control-label mb-1">Technical Specification</label>
                        <textarea id="technical_specification" name="technical_specification" type="text" class="form-control" aria-required="true" aria-invalid="false" >{{ $technical_specification }}</textarea>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-4">
                     <div class="form-group">
                        <label for="uses" class="control-label mb-1">Uses</label>
                        <input id="uses" value="{{ $uses }}" name="uses" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                        <label for="Warranty" class="control-label mb-1">Warranty</label>
                        <input id="Warranty" value="{{ $Warranty }}" name="Warranty" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                        <label for="image" class="control-label mb-1">Image</label>
                        <input id="image" value="{{ $image }}" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" {{ $image_required }}>
                     </div>
                     @error('image')
                     <div class="alert alert-danger" role="alert">
                        {{ $message }}
                     </div>
                     @enderror
                  </div>
               </div>
               <div>
                  {{--  <button id="submit_button" type="submit" class="btn btn-lg btn-info btn-block">
                  Submit
                  </button> --}}
               </div>
               <input type="hidden" name="id" value={{ $id }}>
            </div>
         </div>
      </div>
   </div>

{{-- product_images code start --}}
   <div class="row">
      <h2 class="m-3">Product Images</h2>
      <div class="col-lg-12" id="product_attr_box">
         @php
            $loop_count_num=1;
         @endphp
         @foreach ($productImagesArr as $key=>$value)
         @php
            $loop_count_prev=$loop_count_num;
            $pIArr=(array)$value /* Data object ke form me aya hai hence ushe array ke type kasting kiya gya h */
         @endphp
            <div class="card" id="product_images_{{ $loop_count_num++ }}">
               <input type="hidden" name="piid[]" value="{{ $pIArr['id'] }}">
               <div class="card-body">
                  <div class="row">
                     <div class="col-sm-4 ">
                        <div class="form-group">
                           <label for="images" class="control-label mb-1">Image</label>
                           <input id="images" name="images[]" type="file" class="form-control" aria-required="true" aria-invalid="false">
                        </div>
                        @error('images')
                        <div class="alert alert-danger" role="alert">
                           {{ $message }}
                        </div>
                        @enderror
                        @if($pIArr['images']!='')
                           <img width="50px" src="{{ asset('storage/media')}}/{{ $pIArr['images']}}" alt="img"/>
                        @endif
                     </div>
                     <div class="col-sm-2 mt-4">
                        @if($loop_count_num==2)
                           <button type="button" class="btn btn-success" onclick="add_image_more()">
                              <h3 style="text-align:left;float:left;color:aliceblue"> + &nbsp </h3>
                              <h3 style="text-align:right;float:right;color:aliceblue"> Add </h3>
                           </button>
                        @else
                           <a href="{{url('/admin/product/product_images_delete/')}}/{{ $pIArr['id'] }}/{{$id }}">
                              <button type="button" class="btn btn-danger" onclick="remove_more('{{$loop_count_prev }}')">
                                 <h3 style="text-align:left;float:left;color:aliceblue"> - &nbsp </h3>
                                 <h3 style="text-align:right;float:right;color:aliceblue"> Remove </h3>                             
                              </button>
                           </a>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
         @endforeach
      </div>
   </div>
{{-- product_images code End --}}


   <div class="row">
      <h2 class="m-3">Product Attribute</h2>
      <div class="col-lg-12" id="product_attr_box">
         @php
            $loop_count_num=1;
         @endphp
         @foreach ($productAttrArr as $key=>$value)
         @php
            $loop_count_prev=$loop_count_num;
            $pArr=(array)$value /* Data object ke form me aya hai hence ushe array ke type kasting kiya gya h */
         @endphp
            <div class="card" id="product_attr_{{ $loop_count_num++ }}">
               <input type="hidden" name="paid[]" value="{{ $pArr['id'] }}">
               <div class="card-body">
                  <div class="row">
                     <div class="col-sm-2">
                        <div class="form-group">
                           <label for="sku" class="control-label mb-1">SKU</label>
                           <input id="sku" name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required value="{{ $pArr['sku'] }}">
                        </div>
                     </div>
                     <div class="col-sm-2">
                        <div class="form-group">
                           <label for="mrp" class="control-label mb-1">MRP</label>
                           <input id="mrp" name="mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $pArr['mrp'] }}" required>
                        </div>
                     </div>
                     <div class="col-sm-2">
                        <div class="form-group">
                           <label for="price" class="control-label mb-1">Price</label>
                           <input id="price" name="price[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $pArr['price'] }}" required>
                        </div>
                     </div>
                     <div class="col-sm-3 mt-4">
                        <select id="size_id" name="size_id[]" type="text" class="form-control" aria-required="true" value="{{ $pArr['size_id'] }}"aria-invalid="false">
                           <option value="">Select Size</option>
                           @foreach ($sizes as $list)
                              @if($pArr['size_id']==$list->id)
                                 <option value="{{ $list->id }}" selected>{{ $list->size }}</option>  
                              @else
                                 <option value="{{ $list->id }}">{{ $list->size }}</option>             
                              @endif   
                           @endforeach
                        </select>
                     </div>
                     <div class="col-sm-3 mt-4">
                        <select id="color_id" value="{{ $colors }}" name="color_id[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $pArr['color_id'] }}">
                           <option value="">Select Color</option>
                           @foreach ($colors as $list)
                              @if($pArr['color_id']==$list->id)
                                 <option value="{{ $list->id }}" selected>{{ $list->color }}</option>  
                              @else
                                 <option value="{{ $list->id }}">{{ $list->color }}</option>             
                              @endif
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-2">
                        <div class="form-group">
                           <label for="qty" class="control-label mb-1">Qty</label>
                           <input id="qty" name="qty[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $pArr['qty'] }}" required>
                        </div>
                     </div>
                     <div class="col-sm-4 ">
                        <div class="form-group">
                           <label for="attr_image" class="control-label mb-1">Image</label>
                           <input id="attr_image" name="attr_image[]" type="file" class="form-control" aria-required="true" aria-invalid="false">
                        </div>
                        @error('attr_image')
                        <div class="alert alert-danger" role="alert">
                           {{ $message }}
                        </div>
                        @enderror
                        @if($pArr['attr_image']!='')
                           <img width="50px" src="{{ asset('storage/media')}}/{{ $pArr['attr_image']}}" alt="img">
                        @endif
                     </div>
                     <div class="col-sm-2 mt-4">
                        @if($loop_count_num==2)
                           <button type="button" class="btn btn-success" onclick="add_more()">
                              <h3 style="text-align:left;float:left;color:aliceblue"> + &nbsp </h3>
                              <h3 style="text-align:right;float:right;color:aliceblue"> Add </h3>
                           </button>
                        @else
                           <a href="{{url('/admin/product/product_attr_delete/')}}/{{ $pArr['id'] }}/{{$id }}">
                              <button type="button" class="btn btn-danger" onclick="remove_more('{{$loop_count_prev }}')">
                                 <h3 style="text-align:left;float:left;color:aliceblue"> - &nbsp </h3>
                                 <h3 style="text-align:right;float:right;color:aliceblue"> Remove </h3>                             
                              </button>
                           </a>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
         @endforeach
      </div>
   </div>
   <button id="submit_button" type="submit" class="btn btn-lg btn-info btn-block" >
      Submit
   </button>
</form>
<script>
   var loop_count=1;
   function add_more()
   {
      loop_count++;
      
      var html='<div class="card mt-3" id="product_attr_'+loop_count+'"> <input type="hidden" name="paid[]" value=""><div class="card-body"><div class="row">';
      
      html+='<div class="col-sm-2"><div class="form-group"><label for="sku" class="control-label mb-1">SKU</label><input id="sku" name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div></div>';
      
      html+='<div class="col-sm-2"><div class="form-group"><label for="mrp" class="control-label mb-1">MRP</label><input id="mrp" name="mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div></div>';

      html+='<div class="col-sm-2"><div class="form-group"><label for="price" class="control-label mb-1">Price</label><input id="price" name="price[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div></div>';

      html+='<div class="col-sm-3 mt-4"><select id="size_id" value="{{ $sizes }}" name="size_id[]" type="text" class="form-control" aria-required="true" aria-invalid="false"><option value="">Select Size</option>@foreach ($sizes as $list)<option value="{{ $list->id }}">{{ $list->size }}</option>@endforeach</select></div>';

      html+='<div class="col-sm-3 mt-4"><select id="color_id" value="{{ $colors }}" name="color_id[]" type="text" class="form-control" aria-required="true" aria-invalid="false"><option value="">Select Color</option>@foreach ($colors as $list)<option value="{{ $list->id }}">{{ $list->color }}</option>@endforeach</select></div></div>';

      html+='<div class="row">';
      html+='<div class="col-sm-2"><div class="form-group"><label for="qty" class="control-label mb-1">Qty</label><input id="qty" name="qty[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div></div>';

      html+='<div class="col-sm-4"><div class="form-group"><label for="attr_image" class="control-label mb-1">Image</label><input id="attr_image" name="attr_image[]" type="file" class="form-control" aria-required="true" aria-invalid="false"></div>@error('image')<div class="alert alert-danger" role="alert">{{ $message }}</div>@enderror</div>';

      html+='<div class="col-sm-3 mt-4"><button type="button" class="btn btn-danger" onclick=remove_more("'+loop_count+'")><h3 style="text-align:left;float:left;color:aliceblue"> - &nbsp </h3><h3 style="text-align:right;float:right;color:aliceblue"> Remove </h3></button></div>';
      html+='</div>';
      html+='</div></div></div>';
      jQuery('#product_attr_box').append(html)
   }
   function remove_more(loop_count){
      jQuery('#product_attr_'+loop_count).remove()
   }


</script>
@endsection{{-- 10 min. huaa hai  --}}