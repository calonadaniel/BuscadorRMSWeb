@extends('components.template')
@section('content')

<div class="section">
  <div class="container">
  </div>
</div>
<div class="section">
  <div class="container text-center">
  
    <table class=" table-hover table-sm table-responsive">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">ItemLookUpCode</th>
          <th scope="col">Description</th>
          <th scope="col">Departmento</th>
          <th scope="col">Etiqueta</th>
          <th scope="col">PG</th>
          <th scope="col">3E</th>
          <th scope="col">Promo</th>
          <th scope="col">Inventario</th>
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
          <td>{{$item->description}}</td>
          <td>{{$item->department}}</td>
          <td>{{round($item->price,2)}}</td>
          <td>{{round($item->price*(1-$item->dpg/100),2)}}</td>
          <td>{{round($item->price*(1-$item->d3e/100),2)}}</td>

          @if(is_null($item->dpr)) 
            <td>No</td>
          @else  
            <td>{{round($item->price*(1-$item->dpr/100),2)}}</td>
          @endif

          <td>{{$item->inventory}}</td>
          <td>{{$item->hqQuantity}}</td>
          <td><button type="submit" class="btn btn-primary ">Ver</button> </td>
        </tr>
      </tbody>
      @endforeach
    </table>
  </div>
</div>
@endsection