@extends('admin.admin-panel')
@section('content')
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Type</th>
        <th scope="col">Arabic</th>
        <th scope="col">English</th>
      </tr>
    </thead>
    <tbody>

     <!--Establishing company-->
        <tr>
                <td>

                     Establisihing company
                    </td>

            <td> <a href="Establish/ar">
                <button type="button" class="btn btn-primary"><i class="fas fa-pen"></i>
                </button>
            </a>
           </td>

           <td>
                <a href="Establish/en">
               <button type="button" class="btn btn-primary">
               <i class="fas fa-pen"></i>
          </button>
        </a>
        </tr>
        <!--end Establishing company-->

   <!--Residence and nationality-->
        <tr>
                <td>

                Residence and nationality
                    </td>

            <td> <a href="Residence_&_nationality/ar">
                <button type="button" class="btn btn-primary"><i class="fas fa-pen"></i>
                </button>
            </a>
           </td>

           <td>
                <a href="Residence_&_nationality/en">
               <button type="button" class="btn btn-primary">
               <i class="fas fa-pen"></i>
          </button>
        </a>
           </td>
        </tr>
       
       
        <tr>
          <td>
              About Us
              </td>

      <td> <a href="About/ar">
          <button type="button" class="btn btn-primary"><i class="fas fa-pen"></i>
          </button>
      </a>
     </td>

     <td>
          <a href="About/en">
         <button type="button" class="btn btn-primary">
         <i class="fas fa-pen"></i>
    </button>
  </a>
     </td>
     

        </tr>
           

      </div>


    </tbody>
  </table>







@endsection
