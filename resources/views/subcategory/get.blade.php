<div  id="subCategories">
<select class="form-select" name="sub_category_id" id="sub_category_id">
<option value="">Select Sub Category</option>
@foreach($subCategories as $subCategory)
<option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
@endforeach
</select>
</div>