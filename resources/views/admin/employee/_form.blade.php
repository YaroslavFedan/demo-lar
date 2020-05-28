@if (isset($employee) && $employee->photo)
    <img src="{{ asset($employee->photo) }}" alt="{{ $employee->full_name }}" width="150" height="150" class="mb-4">
@endif

<div class="form-group ">
    {!! Form::label('photo', 'Photo') !!}
    {!! Form::file('photo', ['class'=>'form-control-file']) !!}
    <small class="form-text text-muted">File format jpg,png up to 5MB, the minimum size of 300x300px</small>
    @error('photo')
        <span class="invalid-feedback d-block"  role="alert"><strong >{{ $message }}</strong> </span>
    @enderror
</div>

<div class="form-group maxlength mb-custom-2">
    {!! Form::label('full_name', 'Name') !!}
    <input id="full_name"
           type="text"
           class="form-control @error('full_name') is-invalid @enderror"
           name="full_name"
           value="{{ old('full_name', $employee->full_name ?? '') }}"
           maxlength="256"
    >
    <div class="col-11 float-left pl-0">
        @error('full_name')
            <span class="invalid-feedback d-block"  role="alert"><strong >{{ $message }}</strong> </span>
        @enderror
    </div>
    <div class="col-1 float-right pr-0 ">
        <div class="counter float-right " data-val-length="parent"></div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('phone','Phone') !!}
    <input id="phone"
           type="text"
           class="form-control @error('phone') is-invalid @enderror"
           name="phone"
           value="{{ old('phone',  $employee->phone ?? '')}}"
           data-mask="phone"
    >
    <div class="d-flex justify-content-between">
        <div>
        @error('phone')
            <span class="invalid-feedback d-block"  role="alert"><strong >{{ $message }}</strong> </span>
        @enderror
        </div>
        <small class="text-muted">Required format +380 (XX) XXX XX XX</small>
    </div>
</div>

<div class="form-group mb-custom-2">
    {!! Form::label('email','Email') !!}
    <input id="email"
           type="email"
           class="form-control @error('email') is-invalid @enderror"
           name="email"
           value="{{ old('email', $employee->email ?? '') }}"
    >
    @error('email')
    <span class="invalid-feedback d-block"  role="alert"><strong >{{ $message }}</strong> </span>
    @enderror
</div>

<div class="form-group mb-custom-2">
    {!! Form::label('position_id','Position') !!}
    @include('partials.positions.dropdown',[
        'class' => 'form-control select2',
        'name' => 'position_id',
        'id' => 'position_id'
    ])
    @error('position')
    <span class="invalid-feedback d-block"  role="alert"><strong >{{ $message }}</strong> </span>
    @enderror
</div>

<div class="form-group mb-custom-2">
    {!! Form::label('salary', 'Salary, $') !!}
    <input id="salary"
           type="number"
           class="form-control @error('salary') is-invalid @enderror"
           name="salary"
           value="{{ old('salary',  $employee->salary ?? '') }}"
           min="0"
           max="500"
           step="0.001"
    >
    @error('salary')
        <span class="invalid-feedback d-block"  role="alert"><strong >{{ $message }}</strong> </span>
    @enderror
</div>

<div class="form-group head">
    {!! Form::label('parent_name', 'Head') !!}
    <input type="text"
           name="parent_name"
           id="parent_name"
           value="{{ $employee->parent->full_name ?? '' }}"
           class="form-control"
    >
    <input
        type="hidden"
        name="parent_id"
        id="parent_id"
        value="{{ $employee->parent->id ?? '' }}"
    >
    <input
        type="hidden"
        id="employee_id"
        value="{{ $employee->id ?? '' }}"
    >
    <div class="d-flex justify-content-between">
        <div class="text-danger " id="ajax-error">
            @error('parent_id')
            <span class="invalid-feedback d-block"  role="alert"><strong >{{ $message }}</strong> </span>
            @enderror
        </div>
        <small class="text-muted">Enter minimum 3 characters</small>
    </div>

</div>

<div class="form-group">
    {!! Form::label('employed_at', 'Date of employment') !!}
    <input type="text"
           name="employed_at"
           value="{{ old('employed_at',  $employee->employed_at ?? \Carbon\Carbon::now()->format('d.m.Y')) }}"
           class="form-control datepicker"
    >
    @error('employed_at')
        <span class="invalid-feedback d-block"  role="alert"><strong >{{ $message }}</strong> </span>
    @enderror
</div>

<div class="form-group row">
    <div class="col-12 col-lg-6 offset-lg-6" >
        <div class="row">
            <div class="col-6">
                <a class="btn btn-block btn-light no-border-radius" href="{{ route('admin.employee.index')  }}">Cancel</a>
            </div>
            <div class="col-6">
                <button type="submit" class="submit btn btn-block btn-primary no-border-radius">
                    {{ __('Save') }}
                </button>
            </div>
        </div>
    </div>
</div>


@push('scripts')
    <script>
        $(document).ready(function() {
            $('.maxlength').maxlength({ errorMessage: "Field must be less than {max} characters" });
            $('.datepicker').datepicker({  format: 'dd.mm.yyyy' });
            var selector = $('[data-mask=phone]');
            var im = new Inputmask('{{config('phone.mask')}}',{'autoUnmask':true,  'clearIncomplete': true});
            im.mask(selector);
        });
    </script>
@endpush
