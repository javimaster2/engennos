
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 8 PDF</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h2>Detalle compra</h2>
            </div>
            
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <caption>Lista de productos</caption>
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Valor</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($datos as $item)
                      <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->value}}</td>
                    </tr>
                      @endforeach
                    </tbody>
                    TOTal: <td>{{ $suma }}</td>
                  </table>
            </div>
        </div>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
    {{-- <section class="bg-gray-100 py-10">
        <div class="max-w-5xl mx-auto py-0 md:py-16">
          <article class="shadow-none md:shadow-md md:rounded-md overflow-hidden">
            <div class="md:rounded-b-md  bg-white">
              <div class="p-9 border-b border-gray-200">
                <div class="space-y-6">
                  <div class="flex justify-between items-top">
                    <div class="space-y-4">
                      <div>
                        <img class="h-20 object-cover mb-4  " src="{{asset('LOGO-ENGENNOS.png')}}" >
                        <p class="font-bold text-lg"> Nombre del curso </p>
                        <p class="bg-red-400"> {{ $title}} </p>
                      </div>
                      <div>
                        <p class="font-medium text-sm text-gray-400"> Creado por: </p>
                        <p> {{ Auth()->user()->name }} </p>
                      </div>
                    </div>
                    <div class="space-y-2">
                      <div>
                        <p class="font-medium text-sm text-gray-400"> Invoice Number </p>
                        <p> INV-MJ0001 </p>
                      </div>
                      <div>
                        <p class="font-medium text-sm text-gray-400"> Fecha de emision </p>
                        <p> {{ Carbon\Carbon::now()->format('d-m-Y') }} </p>
                      </div>
                      
                      
                    </div>
                  </div>
                </div>
              </div>
              
              <table class="w-full divide-y divide-gray-200 text-sm">
                <thead>
                  <tr>
                    <th scope="col" class="px-9 py-4 text-left font-semibold text-gray-400"> Estudiante </th>
                    <th scope="col" class="py-3 text-left font-semibold text-gray-400">  </th>
                    <th scope="col" class="py-3 text-left font-semibold text-gray-400"> Monto </th>
                    <th scope="col" class="py-3 text-left font-semibold text-gray-400"> Fecha de creacion </th>
                    <th scope="col" class="py-3 text-left font-semibold text-gray-400"></th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                  
                  @foreach ($datos as $item)
                      <tr>
                        <td class="px-9 py-2 whitespace-nowrap space-x-1 flex items-center">
                          
                            <p class="text-sm text-gray-400"> {{ $item->name }}</p>
                          
                        </td>
                        <td class="whitespace-nowrap text-gray-600 truncate"></td>
                        <td class="whitespace-nowrap text-gray-600 truncate"> {{ $item->value }} USD</td>
                        <td class="whitespace-nowrap text-gray-600 truncate "> {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-y')}} </td>
                      </tr>
                  @endforeach
                  
                 
                </tbody>
              </table>
              
              <div class="p-9 border-b border-gray-200">
                <div class="space-y-3">
                  <div class="flex justify-between">
                    <div>
                      <p class="font-bold text-black text-lg"> Suma total: </p>
                    </div>
                    <p class="font-bold text-black text-lg"> {{ $suma }} USD</p>
                  </div>
                </div>
              </div>
            </div>
          </article>
        </div>
    </section> --}}
