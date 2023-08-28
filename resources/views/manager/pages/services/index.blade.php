   @extends('layouts.admin')

   @section('content')
   <main>
       <div class="container-fluid disable-text-selection">
           <div class="row">
               <div class="col-12">
                   <div class="mb-2">
                       <h1>قائمة الخدمات</h1>
                       <div class="top-right-button-container">
                           @if(App\Models\Permutation::canCreate(Auth()->user()->permition)->first()->canCreate == 1)
                           <a href="{{Route('ServiceController.showTypes')}}" class="btn btn-primary btn-lg top-right-button mr-1">انشاء خدمة</a>
                           @endif
                       </div>
                   </div>

                   <div class="separator mb-5"></div>
               </div>
           </div>

           <div class="col-lg-12 col-md-12 mb-4">
               <div class="card">
                   <div class="card-body">
                       <table class="table">
                           <thead>
                               <tr>
                                   <th scope="col" class="text-center">العنوان</th>
                                   <th scope="col" class="text-center">الوصف</th>
                                   <th scope="col" class="text-center">النوع</th>
                                   @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                                   <th scope="col" class="text-center">تعديل</th>
                                   @endif
                                   @if(App\Models\Permutation::canDelete(Auth()->user()->permition)->first()->canDelete == 1)
                                   <th scope="col" class="text-center">حذف</th>
                                   @endif
                               </tr>
                           </thead>
                           <tbody>
                               @foreach($services as $service)
                               <tr>
                                   <td class="text-center">{{$service->title_ar}}</td>
                                   <td class="text-center">{{$service->description_ar}}</td>
                                   <td class="text-center">{{$service->type}}</td>
                                   @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                                   <td class="text-center"><a href="pages-services-{{$service->id}}-edit" class="btn btn-outline-info" role="button">تعديل</a></td>
                                   @endif
                                   @if(App\Models\Permutation::canDelete(Auth()->user()->permition)->first()->canDelete == 1)
                                   @if($service->isDeleted == 0)
                                   <td class="text-center">
                                       <form method="post" action="{{Route('ServiceController.isDeleted',$service->id)}}">
                                       @csrf
                                       <button type="submit" class="btn btn-sm btn-outline-danger">
                                           حذف
                                       </button>
                                       </form>
                                   </td>
                                   @endif
                                   @if($service->isDeleted == 1)
                                   <td class="text-center">
                                       <form method="post" action="{{Route('ServiceController.restore',$service->id)}}">
                                       @csrf
                                       <button type="submit" class="btn btn-sm btn-outline-primary">
                                           استرجاع
                                       </button>
                                       </form>
                                   </td>
                                   @endif
                                   @endif
                               </tr>
                               @endforeach
                           </tbody>
                       </table>
                   </div>
               </div>
           </div>



       </div>
   </main>
   @endsection
