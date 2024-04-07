<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>lista de categorias</title>
</head>
<body>


    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre del vendedor</th>
            <th scope="col">Categoria</th>
            <th scope="col">Nombre del articulo</th>
            <th scope="col">Perecio</th>
            <th scope="col">Foto</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>

          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)  
<tr>
    <th scope="row">{{$product->id}}</th>
    <td>{{$product->user->name}}</td>
    <td>{{$product->category->name}}</td>
    <td>{{$product->description}}</td>
    <td>{{$product->price}}</td>
    <td width="20%" >
            <div class="card-group">
                <div class="card">
                    <div id="carousel{{$product->id}}" class="carousel slide" data-bs-ride="false">
                        <div class="carousel-inner">
                            @foreach($images[$product->id] as $key => $image)
                            <div class="carousel-item position-relative  {{ $key === 0 ? 'active' : '' }}">
                                <img src="https://img.freepik.com/foto-gratis/hermosa-joven-delgada-haciendo-ejercicios-estiramiento-gimnasio-contra-blanco_155003-17254.jpg?size=626&ext=jpg&ga=GA1.2.100297812.1708107760&semt=ais" class="d-block w-100" alt="...">
                                <div class="position-absolute top-50 start-50 translate-middle" style="max-width: 100%; width: auto;">
                                    <img src="{{$image->image}}" class="img-overlay" width="100%">
                                </div>
                            </div>
            
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{$product->id}}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel{{$product->id}}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                  <div class="card-body">
                    <h5 class="card-title">Vendedor</h5>
                    <h6 class="card-title">{{$product->user->name}}</h6>
                    <h5 class="card-title">Categoria</h5>
                    <h6 class="card-title">{{$product->category->name}}</h6>
                    <h5 class="card-title">Descripción</h5>
                    <h6 class="card-title">{{$product->description}}</h6>
                    <h5 class="card-title">Precio</h5>
                    <h3 class="card-title">$: {{$product->price}}</h3>
                </div>
            
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{$product->id}}" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel{{$product->id}}" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </td>
    <td><a href="{{ route('products.edit', ['id' => $product->id]) }}" class="btn btn-primary">Editar</a></td>
    <td>
        <form action="{{ route('products.destroy', ['id' => $product->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
    </td>
</tr>
@endforeach

        </tbody>
      </table>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
