@extends('components.template')
@section('content')


<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 d-flex justify-content-center border-success mb-3">
                <div class="card mt-2 border-success" style="width:18rem">
                    <img class="card-img-top mt-1" src=".\img\Logo.png"  style="width: auto;height: auto;" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-success border-success">Sobre la aplicación:</h5>
                        <p class="card-text text-success">Aplicación web para consultar y encontrar productos del inventario general del Microsoft Retail Management System(RMS).</p>
                        <p class="card-text text-success">La aplicación muestra los respectivos precios, descuentos, descripciones, cantidad en inventario e información afín de los productos.</p>
                        <a href="{{route('index')}}" class="btn btn-success">Comenzar a buscar</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="col-sm-12">
                    <div class="card border-success mb-3 mt-3">
                        <div class="card-header bg-success text-white">Ficha Técnica:</div>
                        <div class="card-body text-success">
                        <p class="card-text">Laravel Framework</p>
                        <p class="card-text">Bootstrap</p>
                        <p class="card-text">HTML5 & CSS</p>
                        <p class="card-text">Javascript</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="card border-success mb-3">
                        <div class="card-header bg-success text-white">Autor:</div>
                        <div class="card-body text-success">
                        <p class="card-text">Daniel Leonardo Valenzuela Calona</p>
                        <p class="card-text">Departamento de Sistemas Farmacity S. de R.L. de C.V.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="card border-success mb-3">
                        <div class="card-header bg-success text-white">*Derechos de uso exclusivos para Farmacity S. de R.L. de C.V.</div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>

@endsection