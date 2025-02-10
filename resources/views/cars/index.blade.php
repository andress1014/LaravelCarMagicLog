<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Carros</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h2>Lista de Carros</h2>

        <!-- Botón para abrir el modal de creación -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Agregar Carro</button>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Color</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cars as $car)
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->year }}</td>
                    <td>{{ $car->color }}</td>
                    <td>${{ number_format($car->price, 2) }}</td>
                    <td>
                        <!-- Botón para abrir el modal de edición -->
                        <button class="btn btn-warning btn-sm edit-btn" 
                            data-id="{{ $car->id }}" 
                            data-brand="{{ $car->brand }}" 
                            data-model="{{ $car->model }}" 
                            data-year="{{ $car->year }}" 
                            data-color="{{ $car->color }}" 
                            data-price="{{ $car->price }}" 
                            data-bs-toggle="modal" data-bs-target="#editModal">
                            Editar
                        </button>

                        <form action="{{ url('/cars/delete/'.$car->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este carro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal de Creación -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Agregar Nuevo Carro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/cars/store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Marca:</label>
                            <input type="text" name="brand" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Modelo:</label>
                            <input type="text" name="model" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Año:</label>
                            <input type="number" name="year" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Color:</label>
                            <input type="text" name="color" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Precio:</label>
                            <input type="number" step="0.01" name="price" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Edición -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Carro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Marca:</label>
                            <input type="text" name="brand" id="brand" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Modelo:</label>
                            <input type="text" name="model" id="model" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Año:</label>
                            <input type="number" name="year" id="year" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Color:</label>
                            <input type="text" name="color" id="color" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Precio:</label>
                            <input type="number" step="0.01" name="price" id="price" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para manejar la edición -->
    <script>
        $(document).ready(function(){
            $('.edit-btn').click(function(){
                let carId = $(this).data('id');
                $('#brand').val($(this).data('brand'));
                $('#model').val($(this).data('model'));
                $('#year').val($(this).data('year'));
                $('#color').val($(this).data('color'));
                $('#price').val($(this).data('price'));
                $('#editForm').attr('action', '/cars/update/' + carId);
            });
        });
    </script>

</body>
</html>
