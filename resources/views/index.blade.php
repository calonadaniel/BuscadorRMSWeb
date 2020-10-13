@extends('components.template')
@section('content')

<div class="section">
  <div class="container">
  </div>
</div>
<div class="section">
  <div class="container text-center">

  <form class="example py-5"  action="{{route('search')}}" method="post" id='buscadorform'>
        {{ csrf_field() }}
        <div class="form-row">
          <div class="form-group col-3">
            <select class="form-control" name="store_selected" id="store_selected" data-parsley-required  required >
              @foreach ($store as $store)
              <option value="{{$store->ID}}">{{$store->Name}}</option>   
              @endforeach
            </select>
          </div>
          <div class="form-group col-9">
            <input type="text" placeholder="Buscar" name="search" id="search" data-parsley-minlength="2" data-parsley-required required minlength="2" >
            <button type="submit" class="btn btn-success">Buscar</button>
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
          <td>{{$item->itemlookupcode}}</td>
          <td class="text-left">{{$item->description}}</td>
          <td>{{$item->department}}</td>
          <td class="text-left">L. {{number_format(round($item->price,2),2)}}</td>
          <td class="text-left">L. {{number_format(round($item->price*(1-$item->dpg/100),2),2)}}</td>
          <td class="text-left">L. {{number_format(round($item->price*(1-$item->d3e/100),2),2)}}</td>

          @if(is_null($item->dpr)) 
            <td class="text-danger text-left">No</td>
          @else  
            <td class="text-left">L. {{number_format(round($item->price*(1-$item->dpr/100),2),2)}}</td>
          @endif

          @if($item->inventory < 1) 
          <td class="text-danger">{{floatval($item->inventory)}}</td>
          @else  
            <td>{{floatval($item->inventory)}}</td>
          @endif

          @if($item->hqQuantity < 1) 
            <td class="text-danger">{{floatval($item->hqQuantity)}}</td>
          @else  
            <td>{{floatval($item->inventory)}}</td>
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