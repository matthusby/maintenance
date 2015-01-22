<legend class="margin-top-10">Required Information</legend>

<div class="form-group">
    <label class="col-sm-2 control-label" for="name">Name</label>

    <div class="col-md-4">
        {{ Form::text('name', (isset($asset) ? $asset->name : NULL), array('class'=>'form-control', 'placeholder'=>'ex. Ford F150')) }}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label" for="name">Condition</label>

    <div class="col-md-4">
        {{ Form::select('condition', trans('maintenance::assets.conditions'), (isset($asset) ? $asset->condition_number : NULL), array('class'=>'form-control select2')) }}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label" for="name">Category</label>

    <div class="col-md-4">
        @include('maintenance::select.asset-category', array(
            'category_name'=>(isset($asset) ? $asset->category->name : NULL),
            'category_id'=> (isset($asset) ? $asset->category->id : NULL)
        ))
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label" for="name">Location</label>

    <div class="col-md-4">
        @include('maintenance::select.location', array(
            'location_name'=> (isset($asset) ? $asset->location->name : NULL),
            'location_id' => (isset($asset) ? $asset->location->id : NULL)
        ))
    </div>
</div>

<legend class="margin-top-10">Other Information</legend>
<div class="form-group">
    <label class="col-sm-2 control-label" for="name">Vendor</label>

    <div class="col-md-4">
        {{ Form::text('vendor', (isset($asset) ? $asset->vendor : NULL), array('class'=>'form-control', 'placeholder'=>'ex. Ford')) }}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label" for="name">Make</label>

    <div class="col-md-4">
        {{ Form::text('make', (isset($asset) ? $asset->make : NULL), array('class'=>'form-control', 'placeholder'=>'ex. F')) }}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label" for="name">Model</label>

    <div class="col-md-4">
        {{ Form::text('model', (isset($asset) ? $asset->model : NULL), array('class'=>'form-control', 'placeholder'=>'ex. 150')) }}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label" for="name">Serial</label>

    <div class="col-md-4">
        {{ Form::text('serial', (isset($asset) ? $asset->serial : NULL), array('class'=>'form-control', 'placeholder'=>'ex. 153423-13432432-2342423')) }}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label" for="name">Size</label>

    <div class="col-md-4">
        {{ Form::text('size', (isset($asset) ? $asset->size : NULL), array('class'=>'form-control', 'placeholder'=>'ex. 1905 x 2463')) }}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label" for="name">Weight</label>

    <div class="col-md-4">
        {{ Form::text('weight', (isset($asset) ? $asset->weight : NULL), array('class'=>'form-control', 'placeholder'=>'ex. 1 ton')) }}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label" for="name">Aquisition Date</label>

    <div class="col-md-4">
        {{ Form::text('aquired_at', (isset($asset) ? $asset->aquired_at : NULL), array('class'=>'pickadate form-control', 'placeholder'=>'Click to Select Date')) }}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label" for="name">End of Life Date</label>

    <div class="col-md-4">
        {{ Form::text('end_of_life', (isset($asset) ? $asset->end_of_life : NULL), array('class'=>'pickadate form-control', 'placeholder'=>'Click to Select Date')) }}
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 col-md-offset-2">
        {{ Form::submit('Save', array('class'=>'btn btn-primary')) }}
    </div>
</div>