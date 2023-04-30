<div class="row mb-3">
    <div class="col-3 d-flex justify-content-between align-items-center">
        <span class="h5">{{ $label }}</span>
        <span class="h5">:</span>
    </div>
    <div class="col-8">
        <select class="form-control" name="{{ $name }}" id="{{ $id }}">
            <option disabled selected value="">{{ $placeholder }}</option>
            @foreach ($items as $item => $it)
                @if (is_string($it))
                    <option value="{{ $it }}" @if (old($name) == $it) selected @endif>
                        {{ $it }}
                    </option>
                @else
                    <option value="{{ $it->id }}" @if (old($name) == $it->id) selected @endif>
                        {{ $it->name }}
                    </option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="col-1"></div>
</div>
