
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
           
               
               
               
               
               @section('content')
            
               <div class="container" >
               <div class="row">
                   <div class="col-md-12">   
                      
                       <div class="card">
                           <div class="card-body ">
                                <h1 style="text-align:center;">Subir Archivo<h1>
                               <p class="card-text"></p>
                           </div>
                       </div>
                       <form action=" {{route('user_files.store')}}" method="POST"enctype="multipart/form-data" >
                        {{csrf_field()}}
           <div class="form-group">
                    

<input  class="form-control" type="file" name="file" accept="image/*" value="{{ csrf_token() }}">
<br>
                       <button class="btn btn-success"  type="submit">subir imagen </button>
                      
                      </div> </form>
                   </div>
               </div></div>
                   
               </div>