<div>
    <div class="form-floating mb-3">
        <select class="form-select" name="category_id" id="floatingSelect">
            <option selected>choose category</option>
            @foreach ($cat as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
</div>