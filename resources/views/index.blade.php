@extends('components.template')
@section('content')

<div class="section">
  <div class="container">
  </div>
</div>
<div class="section">
  <div class="container text-center">

    <form class="example py-5"  action="{{route('search')}}" method="post" id="buscadorform">
        {{ csrf_field() }}
        <div class="form-row">
          <div class="form-group col-lg-3 col-md-3 col-sm-12">
            <select class="form-control" name="store_selected" id="store_selected" required onchange="this.form.submit()" >
              @foreach ($store as $store) 
                @if ($selectedstore == $store->ID)
                <option value="{{$store->ID}}" selected>{{$store->Name}}</option> 
                @else
                <option value="{{$store->ID}}">{{$store->Name}}</option> 
                @endif
              @endforeach
            </select>
          </div>
          <div class="form-group col-lg-9 col-md-9 col-sm-12">
            <input type="text"  class="h-100 w-50" placeholder="Introduzca Busqueda..." name="search" id="search" required minlength="2" value="{{$query}}" >
            <button type="submit" class="btn btn-success" >Buscar</button>
          </div>
        </div>  
    </form>

    <table class="table table-hover table-sm table-responsive table-bordered">
      <thead class="bg-success text-white">
        <tr >
          <th scope="col" >#</th>
          <th scope="col">ItemLookUpCode</th>
          <th scope="col">Descripción</th>
          <th scope="col">Departmento</th>
          <th scope="col">Precio Etiq</th>
          <th scope="col">Precio PG</th>
          <th scope="col">Precio 3E</th>
          <th scope="col">Precio Promo</th>
          <th scope="col">Inv</th>
          <th scope="col">HQ</th>
          <th scope="col">Detalles</th>
        </tr>
      </thead>
      <tbody>
        @php
              $num = 1;
        @endphp
        @foreach($item as $item) 
        <tr>
          <th scope="row">{{$num++}}</th>
          <td class="text-left">{{$item->itemlookupcode}}</td>
          <td class="text-left">{{$item->description}}</td>
          <td class="text-left">{{$item->department}}</td>
          <td class="text-right">L. {{number_format(round($item->price,2),2)}}</td>
          <td class="text-right">L. {{number_format(round($item->price*(1-$item->dpg/100),2),2)}}</td>
          <td class="text-right">L. {{number_format(round($item->price*(1-$item->d3e/100),2),2)}}</td>

          @if(is_null($item->dpr)) 
            <td class="text-danger text-right">No</td>
          @else  
            <td class="text-right">L. {{number_format(round($item->price*(1-$item->dpr/100),2),2)}}</td>
          @endif

          @if($item->inventory < 1) 
          <td class="text-danger text-right">{{floatval($item->inventory)}}</td>
          @else  
            <td class="text-right">{{floatval($item->inventory)}}</td>
          @endif

          @if($item->hqQuantity < 1) 
            <td class="text-danger text-right">{{floatval($item->hqQuantity)}}</td>
          @else  
            <td class="text-right">{{floatval($item->hqQuantity)}}</td>
          @endif
          <td> <a class="btn btn-success btn-sm text-white" 
                  href="item-{{$item->itemlookupcode}}" 
                  role="button">Ver</a>
          </td>
        </tr>
      </tbody>
      @endforeach
    </table>
  </div>
</div>
@endsection