<div class="row mb-3">
    <div class="col-3 d-flex justify-content-between align-items-center">
        <span class="h5">{{ $label }}</span>
        <span class="h5">:</span>
    </div>
    <div class="col-8">
        @if ($appendLabel != null)
            <div class="input-group">
                <input type="{{ $type }}" class="form-control" id="{{ $id }}" name="{{ $name }}"
                    value="{{ $value }}" placeholder="{{ $placeholder }}"
                    @if ($disable) readonly @endif>
                <div class="input-group-append">
                    <span class="input-group-text" id="{{ $id }}">{{ $appendLabel }}</span>
                </div>
            </div>
        @else
            <input type="{{ $type }}" class="form-control" id="{{ $id }}" name="{{ $name }}"
                value="{{ $value }}" placeholder="{{ $placeholder }}"
                @if ($disable) readonly @endif>
        @endif
        @error($name)
            <div class="alert alert-danger mt-2">
                <ul>
                    <li class="text-red-600">{{ $message }}</li>
                </ul>
            </div>
        @enderror
    </div>
    <div class="col-1"></div>
</div>
