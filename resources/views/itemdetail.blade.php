@extends('components.template')
@section('content')

<div class="section">
  <div class="container">

    <div class="row">

      <div class="col-6">
        <div class="list-group">
          <a class="list-group-item">
            <div class="">
              <h6 class="mb-1">ItemlookupCode: {{$item->first()->itemlookupcode}} </h6>
            </div>
          </a>
        </div>
      </div>
      <div class="col-6">
        <div class="list-group">
          <a class="list-group-item">
            <div class="">
              <h6 class="mb-1">Departamento: {{$item->first()->department}}</h6>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="row">

      <div class="col-6">
        <div class="list-group">
          <a class="list-group-item">
            <div class="">
              <h6 class="mb-1">Descripción:</h6>
            </div>
              <p class="mb-1">{{$item->first()->description}}</p>
          </a>
        </div>
      </div>
      <div class="col-6">
        <div class="list-group">
          <a class="list-group-item">
            <div class="">
              <h6 class="mb-1">Componentes:</h6>
            </div>

              @if(is_null($item->first()->subdescription1) || $item->first()->subdescription1 == '.' ) 
              @else  
                <p class="mb-1">{{$item->first()->subdescription1}}</p>
              @endif

              @if(is_null($item->first()->subdescription2) || $item->first()->subdescription2 == '.') 
              @else  
                <p class="mb-1">{{$item->first()->subdescription2}}</p>
              @endif

              @if(is_null($item->first()->subdescription3)|| $item->first()->subdescription3 == '.') 
              @else  
                <p class="mb-1">{{$item->first()->subdescription3}}</p>
              @endif

          </a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
      
        <div class="list-group">
          <a class="list-group-item">
            <div class="d-flex w-100 justify-content-between">
              <h6 class="mb-1">Descripción Extendida:</h6>
            </div>
              @if(is_null($item->first()->extendeddescription) || $item->first()->extendeddescription == '.' ) 
              @else  
                <p class="mb-1">{{$item->first()->extendeddescription}}</p>
              @endif 
          </a>
        </div>
      </div>
    
    </div>


    <table class="table table-hover table-sm  table-responsive table-bordered pt-1 text-center">
      
      <thead class="">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Sucursal</th>
          <th scope="col">Precio Etiq</th>
          <th scope="col">Precio PG</th>
          <th scope="col">Precio 3E</th>
          <th scope="col">Precio Promo</th>
          <th scope="col">Inventario</th>
        </tr>
      </thead>
      <tbody>
      @php
            $num = 1;
      @endphp
      @foreach($item as $item) 
        <tr>
          <th scope="row">{{$num++}}</th>
          <td class="text-left">{{$item->storename}}</td>
          <td class="text-right">L. {{number_format(round($item->price,2),2)}}</td>
          <td class="text-right">L. {{number_format(round($item->price*(1-$item->dpg/100),2),2)}}</td>
          <td class="text-right">L. {{number_format(round($item->price*(1-$item->d3e/100),2),2)}}</td>

          @if(is_null($item->dpr)) 
            <td class="text-danger text-right ">No</td>
          @else  
            <td class="text-right">L. {{number_format(round($item->price*(1-$item->dpr/100),2),2)}}</td>
          @endif

          @if($item->inventory < 1) 
            <td class="text-danger">{{floatval($item->inventory)}}</td>
          @else  
            <td>{{floatval($item->inventory)}}</td>
          @endif
        </tr>
      </tbody>
      @endforeach
    </table>
  </div>
</div>
@endsection