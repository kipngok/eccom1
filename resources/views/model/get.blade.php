<div  id="models">
<select class="form-select" name="model_id" id="model_id">
<option value="">Select Model</option>
@foreach($models as $model)
<option value="{{$model->id}}">{{$model->name}}</option>
@endforeach
</select>
</div>