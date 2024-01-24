<div class="">
    <div class="">
        <input type="hidden" name="department_id" value="{{$dept->id}}">

        <div class="form-group">

            {{ Form::label('sub_department') }}

            <select name="sub_department_id"  class="form-control" >
                <option value="">Select Sub Department</option>
                @foreach($subDepartments as $sub)
                <option value="{{$sub->id}}">{{$sub->name}}</option>
                @endforeach

            </select>

        </div>
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $unit->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
