<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Crear producto</h1>
        <form method="post" action="{{ route('crear.products') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="user_id" class="form-label">Nombre del vendedor</label>
                <select id="user_id" name="user_id" class="form-select" required>
                    <option value="">Seleccione el vendedor</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Nombre de la categoría</label>
                <select id="category_id" name="category_id" class="form-select" required>
                    <option value="">Seleccione la categoría</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Nombre</label>
                <input type="text" id="description" name="description" class="form-control" required />
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Precio</label>
                <input type="text" id="price" name="price" class="form-control" required pattern="\d+" title="Ingrese solo números" />
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">imagen</label>
                <input type="file" id="image" name="image[]" class="form-control" required multiple />
            </div>

            
            


            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
