@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mb-3">
    <label class="form-label">Brand</label>
    <input type="text" name="brand" class="form-control" value="{{ old('brand', $car['brand'] ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Model</label>
    <input type="text" name="model" class="form-control" value="{{ old('model', $car['model'] ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Year</label>
    <input type="number" name="year" class="form-control" value="{{ old('year', $car['year'] ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Color</label>
    <input type="text" name="color" class="form-control" value="{{ old('color', $car['color'] ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Price</label>
    <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $car['price'] ?? '') }}" required>
</div>
